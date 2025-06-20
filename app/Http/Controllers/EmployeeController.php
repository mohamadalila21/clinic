<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number'=>'required|string|unique:employees',
            'name'=>'required|string|min:3|max:30',
            'level'=>'required|string|min:3|max:30',
            'job'=>'required|string|min:1|max:300',
            'pay'=>'required|string|min:1|max:300',
        ],[
            'number.required'=>'قم باضافة رقم الموظف',
            'name.required'=>'قم باضافة اسم الموظف',
            'level.required'=>'قم باضافة مستوى تعليمي',
            'job.required'=>'قم باضافة عمل الموظف',
            'pay.required'=>'قم باضافة راتب الموظف',
        ]);
        $employee=new Employee;
        $employee->number=$request->number;
        $employee->name=$request->name;
        $employee->level=$request->level;
        $employee->job=$request->job;
        $employee->pay=$request->pay;
        $isSaved =$employee->save();
        if($isSaved){
            session()->flash('message','employee create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit' ,compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->number=$request->number;
        $employee->name=$request->name;
        $employee->level=$request->level;
        $employee->job=$request->job;
        $employee->pay=$request->pay;
        $employee->save();
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back();
    }
}
