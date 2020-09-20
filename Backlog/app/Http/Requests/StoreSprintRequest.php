<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSprintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Year' => 'required|date_format:"Y"',
            'Week' => 'required|integer|between:1,52',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'Year.required' => 'Укажите корректный год. Пример: 2000',
            'Week.required' => 'Укажите номер недели. Пример: 22',
        ];
    }

}
 
