<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected array $formFields;

    public function __construct()
    {
        $this->middleware('auth');

        $this->formFields = (new Employee())->fillable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('pages.employee.list', [
            'employees' => Employee::query()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('pages.employee.add', ['companyList' => Employee::getAllCompanies()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee($request->only($this->formFields));
        $employee->save();

        return response()->redirectToRoute('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->view('pages.employee.detail', [
            'employee' => Employee::find($id)->with('company')->get()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return $employee === null ?
            response()->redirectToRoute('employee.index') :
            response()->view('pages.employee.edit', [
                'employee' => $employee->with('company')->get()->first(),
                'companyList' => Employee::getAllCompanies()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee === null) {
            return response()->redirectToRoute('employee.index');
        }

        try {
            $employee->update(array_diff(
                $request->only($this->formFields),
                $employee->getAttributes()
            ));
        } catch (\Exception $e) {
            //  Save to log and remove saved file
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
        $employee = Employee::find($id);
        if ($employee !== null) {
            $employee->delete();
        }
        return redirect()->route('employee.index');
    }
}
