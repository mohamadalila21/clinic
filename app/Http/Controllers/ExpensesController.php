<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expenses::all();
        return view('admin.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expenses.create');

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
            'number'=>'required|string|unique:expenses',
            'amount'=>'required|string|min:3|max:300',
            'reason'=>'required|string|min:1|max:300',
            'name'=>'required|string|min:3|max:300',

        ],[
            'number.required'=>'قم باضافة رقم العملية',
            'amount.required'=>'قم باضافة مبلغ',
            'reason.required'=>'قم باضافة سبب',
            'name.required'=>'قم باضافة اسم',

        ]);
       $expenses=new Expenses;
       $expenses->number=$request->number;
       $expenses->amount=$request->amount;
       $expenses->reason=$request->reason;
       $expenses->name=$request->name;
       $isSaved =$expenses->save();
       if($isSaved){
           session()->flash('message','expenses create successfully');
       return redirect()->back();
   }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Expenses $expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expense)
    {
        return view('admin.expenses.edit',compact('expense'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expense)
    {
        $expense->number=$request->number;
        $expense->amount=$request->amount;
        $expense->reason=$request->reason;
        $expense->name=$request->name;
        $expense->save();
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expense)
    {
        $expense->delete();
        return redirect()->back();

    }
}
