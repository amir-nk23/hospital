<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorRole;
use App\Models\DoctorSurgery;
use App\Models\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class InvoiceController extends Controller
{

    public function filter(){

      $doctors =  Cache::rememberForever('invoiceDoctor',function (){

            return Doctor::query()->where('status',1)->get();

        });

        return view('preinvoice.index',compact(   'doctors'));

    }

    public function search(Request $request){





        $s_date = $request->start_date;
        $e_date = $request->end_date;


            $doctor_surgeries =  DoctorSurgery::query()->where('doctor_id',$request->doctor_id)->whereNull('invoice_id')

                ->with(['surgery','doctors'])
                ->whereHas('surgery',function ($query) use ($s_date){

                    if ($s_date!=null){

                        return $query->where('surgeried_at','>=',$s_date);
                    }

                })
                ->whereHas('surgery',function ($query) use ($e_date){

                    if ($e_date!=null){

                        return $query->where('released_at','<=',$e_date);

                    }

                })->get()
            ;

            if ($doctor_surgeries->isEmpty()){

                throw ValidationException::withMessages(['data'=>'هیچ دیتایی یافت نشد']);

            }



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
      return redirect()->route('invoice.index');

    }

    public function index()
    {
        $invoices = Cache::rememberForever('invoice',function (){
           return Invoice::query()->with(['doctors','payments'])->paginate(10);
        });


        return view('invoice.index',compact('invoices',));

    }

    public function show(Invoice $invoice){

        $invoice->surgeries();

        return view('invoice.show',compact('invoice'));

    }

    public function edit(Invoice $invoice)
    {


        return view('invoice.edit',compact('invoice'));

    }

    public function update(Request $request,Invoice $invoice)
    {
        $invoice->update(
          [

              'description' => $request->description
          ]

        );


        toastr()->info('صورتحساب با موفقیت ویرایش شد');

        return redirect()->route('invoice.index');
    }

    public function destroy(Invoice $invoice)
    {



       if (count($invoice->payments)==0){

           $DR = DoctorSurgery::query()->where('invoice_id',$invoice->id);


           $DR->update([

               'invoice_id'=>null

           ]);

           $invoice->delete();


           toastr()->error('صورتحساب با موفقیت حذف شد');

       }else{


           toastr()->error('این صورت حساب دارای مبلغ پرداحتی میباشد');

       }



        return redirect()->route('invoice.index');


    }
}
