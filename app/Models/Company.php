<?php

namespace App\Models;

use App\Http\Requests\EditCompanyRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Company extends Model
{
    use HasFactory;

    public $fillable = ['name', 'email', 'phone', 'website', 'logo'];

    public $timestamps = false;

    public function prepareDataForUpdate(EditCompanyRequest $request, array $companyAttributes): array
    {
        $updatedFields = array_diff(
            $request->only($this->fillable),
            $companyAttributes
        );

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $updatedFields['logo'] = $request->logo->store('public/companies');
        }
        return $updatedFields;
    }
}
