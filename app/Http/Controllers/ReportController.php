<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportIndexRequest;
use App\Models\Doctor;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function filter(){

        $doctors = Doctor::query()->select('id','name')->get();

        return view('report.invoice.filter',compact('doctors'));

    }

    public function invoiceIndex(ReportIndexRequest $request){

        $startDate = $request->start_date;
        $endDate  = $request->end_date;
        $doctor_id = $request->doctor_id;


        $invoice = Invoice::query()
            ->where('doctor_id',$doctor_id)
            ->whereIn(,function($query) use ($startDate){

                $query->where('created_at','>=',$startDate);

            })
//            ->whereIn($startDate,function ($query) use ($endDate){
//
//                $query->where('created_at','<=',$endDate)->get();
//
//            })
        ->get();

        dd($invoice);

        return view('report.invoice.index');

    }


}
