<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperAdminCreateRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=>'unique:App\Models\User,email|email',
            'mobile'=>'unique:App\Models\User,mobile|required|digits:11|numeric',
            'password'=>'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'لطفا نام و نام خانواردگی خود را وارد کنید',
          'name.min'=>'نام و نام خانوادگی نباید کم تر از 3 کاراکتر باشد',
          'email.email'=>'لطفا ایمیل خود را به صورت صحیح وارد کنید',
           'email.unique'=>'این ایمیل قبلا ثبت شده است',
          'password.confirmed'=>'رمز عبور با تکرار ان مطابقت ندارد',
          'password.required'=>'لطفا رمز عبور خود را وارد کنید',
          'password.min'=>'رمز عبور نباید کم تر از 6 کاراکتر باشد',
          'mobile.required'=>'لطفا شماره تلفن خود را وارد کنید',
          'mobile.unique'=>'این شماره تلفن قبلا ثبت شده',
          'mobile.numeric'=>'شماره تلفن خود را به صورت صحیح وارد کنید',
          'mobile.digits'=>'شماره تلفن باید 11 کاراکتر باشد',

        ];
    }
}
