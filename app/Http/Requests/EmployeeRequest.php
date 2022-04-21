<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'company_id' => 'required|exists:' . (new Company())->getTable() . ',id',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|size:13',
        ];
    }

    public function messages()
    {
        return [
            'company_id.exists' => 'Company not found'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email address'
        ];
    }
}
