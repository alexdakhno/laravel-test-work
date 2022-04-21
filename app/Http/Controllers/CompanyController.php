<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{

    protected array $formFields;

    public function __construct()
    {
        $this->middleware('auth');

        $this->formFields = (new Company())->fillable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('pages.company.list', [
            'companies' => Company::query()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('pages.company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company($request->only($this->formFields));
        $company->logo = $request->logo->store('public/companies');

        try {
            $company->save();
        } catch (\Exception $e) {
            //  Save to log and remove saved file if error
            Storage::delete($company->logo);
            return $e->getMessage();
        }
        return response()->redirectToRoute('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->view('pages.company.detail', ['company' => Company::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return $company === null ?
            response()->redirectToRoute('company.index') :
            response()->view('pages.company.edit', [
                'company' => $company
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        if ($company === null) {
            return response()->redirectToRoute('company.index');
        }
        $updatedFields = $company->prepareDataForUpdate($request, $company->getAttributes());

        try {
            $company->update($updatedFields);
        } catch (\Exception $e) {
            //  Save to log and remove saved file
            if (Str::length($updatedFields['logo'])) {
                Storage::delete($updatedFields['logo']);
            }
            return $e->getMessage();
        }

        return back()->with(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company !== null) {
            $company->delete();
        }
        return redirect()->route('company.index');
    }
}
