<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationStoreRequest extends FormRequest
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
            'name'=>'required|unique:operations',
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [

            'name.required'=>'لطفا اسم عمل را وارد کنید',
            'name.unique'=>'این عمل قبلا ثیت شده است',
            'price.required'=>'لطفا اسم قیمت عمل را وارد کنید',
            'price.numeric'=>'لطفا قیمت را با فورمت صحیح وارد کنید',


        ];
    }
}
