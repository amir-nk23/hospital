<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorRole;
use App\Models\DoctorSurgery;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index(){


        return view('preinvoice.index',[

            'doctors'=>Doctor::query()->where('status',1)->get(),

        ]);

    }

    public function search(Request $request){



        $s_date = $request->start_date;
        $e_date = $request->end_date;

           $doctor_surgeries =  DoctorSurgery::query()->where('doctor_id',$request->doctor_id)

               ->with(['surgery','doctors'])
               ->whereHas('surgery',function ($query) use ($s_date){

               return $query->where('surgeried_at','>=',$s_date);

           })
               ->whereHas('surgery',function ($query) use ($e_date){

                   return $query->where('released_at','<=',$e_date);

               })

               ->get();



           return view('preinvoice.show',compact('doctor_surgeries'));



    }

    public function store(Request $request)
    {

       $DRs = DoctorSurgery::query()->whereIn('id',$request->doctor_surgery_id)->get();


      $invoice = Invoice::query()->create([
           'doctor_id'=>$request->doctor_id,
           'amount'=>$DRs->sum('amount'),
       ]);


      foreach ($DRs as $DR){


          $DR->update([

              'invoice_id'=>$invoice->id,
          ]);

      }

      toastr()->success('تسویه با موفقیت انجام شد');
      return redirect()->route('preinvoice.index');

    }
}
