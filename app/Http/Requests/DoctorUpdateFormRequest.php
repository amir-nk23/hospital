<?php

namespace App\Http\Requests;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateFormRequest extends FormRequest
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
            'name'=>'required|min:4',
            'speciality_id'=>'required',
            'national_code'=> [new Nationalcode()],
            'medical_number'=>'nullable|digits:5',
            'password'=>'nullable|confirmed|min:6'
        ];
    }
}
