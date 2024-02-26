<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $payments = Payment::query()->with(['invoices','invoices.surgeries','invoices.surgeries.operation'])->get();


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


        $name =   Storage::disk('public')->put('/payment',$request->receipt);

        $paydate = null;

        if ($request->pay_type == 'cheque'){

            $paydate = now();

        }

        $payment = Payment::query()->create([

            'invoice_id'=>$request->invoice_id,
            'amount'=>$request->amount,
            'pay_type'=>$request->pay_type,
            'due_date'=>$paydate,
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
