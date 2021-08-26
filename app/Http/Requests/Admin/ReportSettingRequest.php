<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReportSettingRequest extends FormRequest
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
            'margin-top'=>'required|numeric|min:0',
            'margin-right'=>'required|numeric|min:0',
            'margin-bottom'=>'required|numeric|min:0',
            'margin-left'=>'required|numeric|min:0',
            'font-size'=>'required|numeric|min:1',
            'font-family'=>'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'margin-top'=>'margin top',
            'margin-right'=>'margin right',
            'margin-bottom'=>'margin bottom',
            'margin-left'=>'margin left',
        ];
    }
}
