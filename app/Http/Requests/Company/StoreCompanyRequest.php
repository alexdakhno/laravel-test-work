<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|size:13',
            'website' => 'min:4',
            'logo' => 'required|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'logo.dimensions' => 'The file size must be 200 x 200'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email address'
        ];
    }
}
