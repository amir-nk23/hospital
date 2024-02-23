<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class PaymentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        ];
    }
    protected function passedValidation()
    {

        $payment = 0;

        if (!Payment::query()->where('invoice_id',$this->input('invoice_id'))->get()->isEmpty()){

            $payment = Payment::query()->where('invoice_id',$this->input('invoice_id'))->sum('amount');

        }

        $invoice = Invoice::query()->where('id',$this->input('invoice_id'))->first();

        if($payment+$this->input('amount')>$invoice->amount){

            throw ValidationException::withMessages(['payment' => 'مبلغ پرداختی بیش تر از مبلغ مانده می باشد']);

        }


    }
}
