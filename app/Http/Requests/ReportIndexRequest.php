<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Nette\Schema\ValidationException;

class ReportIndexRequest extends FormRequest
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
            'doctor_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ];
    }

    protected function passedValidation()
    {

        if ($this->input('end_date') <= $this->input('start_date')){

            throw \Illuminate\Validation\ValidationException::withMessages(['dateErr'=>'تاریخ مقصد نمی تواند بزرگ تر یا مساوی تاریخ مبدا باشد']);

        }


    }
}
