<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationUpdateRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'لطفا اسم عمل را وارد کنید',
            'price.required'=>'لطفا اسم قیمت عمل را وارد کنید',
            'price.numeric'=>'لطفا قیمت را با فورمت صحیح وارد کنید',

        ];
    }
}
