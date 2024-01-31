<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperAdminUpdateRequest extends FormRequest
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
            'name'=>'min:3',
            'mobile'=>'digits:11|numeric',
            'email'=>'email',
            'password'=>'confirmed|'
        ];
    }

    public function messages()
    {
        return [
            'name.min'=>'نام و نام خانوادگی نباید کم تر از 3 کاراکتر باشد',
            'email.email'=>'لطفا ایمیل خود را به صورت صحیح وارد کنید',
            'password.confirmed'=>'رمز عبور با تکرار ان مطابقت ندارد',
            'mobile.numeric'=>'شماره تلفن خود را به صورت صحیح وارد کنید',
            'mobile.digits'=>'شماره تلفن باید 11 کاراکتر باشد',
        ];
    }
}
