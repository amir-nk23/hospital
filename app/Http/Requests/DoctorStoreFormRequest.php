<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Nationalcode;

class DoctorStoreFormRequest extends FormRequest
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

            'mobile'=>'required|numeric|digits:11|',
            'name'=>'required|min:4|unique:doctors,name',
            'speciality_id'=>'required',
            'national_code'=> ['nullable',new Nationalcode()],
            'medical_number'=>'nullable|digits:5|bail|unique:doctors,medical_number',
            'password'=>'required|confirmed|min:6'
        ];
    }
}
