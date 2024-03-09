<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportIndexRequest;
use App\Models\Doctor;
use App\Models\DoctorSurgery;
use App\Models\Insurance;
use App\Models\Invoice;
use App\Models\Surgery;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function filter(){

        $doctors = Doctor::query()->select('id','name')->get();

        return view('report.invoice.filter',compact('doctors'));

    }

    public function invoiceIndex(ReportIndexRequest $request){

        $startDateshow =$request->start_date_show;
        $endDateshow =$request->end_date_show;
        $startDate = $request->start_date;
        $endDate  = $request->end_date ?:today() ;
        $doctor_id = $request->doctor_id;


        $DoctorSurgeries = DoctorSurgery::query()->with(['surgery','surgery.operation','doctors','invoice','invoice.payments'])
            ->where('doctor_id',$doctor_id)
            ->whereHas('surgery',function($query) use ($startDate,$endDate){

                $query->where('surgeried_at','>=',$startDate)->
                where('surgeried_at','<=',$endDate);;


            })
        ->get();

        $pay =0;
        foreach ($DoctorSurgeries as $doctorSurgery){

            if ($doctorSurgery->invoice){

                foreach ($doctorSurgery->invoice->payments as $payment){

                    $pay += $payment->amount;

                }

            }

        }


        return view('report.invoice.index',compact(['DoctorSurgeries','startDateshow','endDateshow','pay']));

    }

    public function invoiceShow(Invoice $invoice){



        return view('report.invoice.show',compact('invoice'));

    }


    public function insuranceFilter(){


        $insurances = Insurance::query()->select('id','name','type')->get();

        return view('report.insurance.filter',compact(['insurances']));


    }


    public function insuranceIndex(Request $request){

        $startDateshow =$request->start_date_show;
        $endDateshow =$request->end_date_show;
        $startDate = $request->start_date;
        $endDate  = $request->end_date ?:today() ;
        $insurnceId =$request->insuranceId;
        $insuranceType = $request->insuranceType;
        $seperateInsurance = explode('-',$insurnceId);
        $id = $seperateInsurance[0];
        $name = $seperateInsurance[1];

        $surgeries = Surgery::query()
            ->with(['basicInsurance','suppinsurance','operation','doctors',])
            ->whereHas('basicInsurance',function ($query)use ($id,$insuranceType){

                 if ($insuranceType == 'basic'){

                     $query->where('id',$id);

                 }

            })
            ->whereHas('basicInsurance',function ($query)use ($id,$insuranceType){

                if ($insuranceType == 'supplementary'){

                    $query->where('id',$id);

                }

            })
            ->when($startDate,function($query) use ($startDate,$endDate){

                $query->where('released_at','>=',$startDate)
                    ->where('released_at','<=',$endDate);



            })
            ->get();

//        dd($surgeries);

        $totalPrice =0;
        foreach ($surgeries as $surgery) {
            // Loop through each associated operation
            foreach ($surgery->operation as $operation) {
                // Add the price of the operation to the total price
                $totalPrice += $operation->price;
            }
        }



        return view('report.insurance.index',compact('surgeries','startDateshow','endDateshow','name','id','totalPrice','insuranceType'));
    }


}
