<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Jobs\SendNotification;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $payments = Cache::rememberForever('payment',function (){

            return Payment::query()->with(['invoices','invoices.surgeries','invoices.surgeries.operation'])->Paginate(5);

        });

        return view('payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('payment.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentStoreRequest $request)
    {




        DB::beginTransaction();

        $name =   Storage::disk('public')->put('/payment',$request->receipt);

        $payment = Payment::query()->create([

            'invoice_id'=>$request->invoice_id,
            'amount'=>$request->amount,
            'pay_type'=>$request->pay_type,
            'due_date'=>$request->due_date,
            'receipt'=>$name,

        ]);

        $paymentSum = 0;

        if (!Payment::query()->where('invoice_id',$request->invoice_id)->get()->isEmpty()){

            $paymentSum = Payment::query()->where('invoice_id',$request->invoice_id)->sum('amount');

        }

        $invoice = Invoice::query()->where('id',$request->invoice_id)->first();

        if($paymentSum==$invoice->amount){



            $invoice->update([

                'status'=>1

            ]);
        }
        DB::commit();

        Cache::forget('invoice');
            toastr()->success('پرداخت با موفقیت انجام شد');
            return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {


        return view('payment.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {

        $name = $payment->receipt;



        if($request->hasFile('receipt')){

            File::delete($name);

            $name =   Storage::disk('public')->put('/payment',$request->receipt);
        }

        $amount = str_replace(",", "", $request->amount);

        $payment->update([

            'amount'=>$amount,
            'pay_type'=>$request->pay_type,
            'status'=>$request->status,
            'receipt'=>$name,

        ]);

        toastr()->info('پرداختی با موفقیت ویرایش شد');

        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
