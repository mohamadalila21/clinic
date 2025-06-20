<?php

namespace App\Http\Controllers;

use App\Models\Enter;
use Illuminate\Http\Request;

class EnterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enters=Enter::all();
        return view('admin.enter.index',compact('enters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enter.create');

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
            'number'=>'required|string|unique:enters',
            'name'=>'required|string|min:3|max:30',
            'phone'=>'required|string|min:3|max:30',
            'age'=>'required|string|min:1|max:300',
            'total'=>'required|string|min:1|max:300',
            'payments'=>'required|string|min:1|max:300',
        ],[
            'number.required'=>'قم باضافة رقم مريض',
            'name.required'=>'قم باضافة اسم',
            'phone.required'=>'قم باضافة رقم جوال',
            'age.required'=>'قم باضافة العمر',
            'total.required'=>'قم باضافة مبلغ كلي',
            'payments.required'=>'قم باضافة مدفوعات',
        ]);
       $enter=new Enter;
       $enter->number=$request->number;
       $enter->name=$request->name;
       $enter->phone=$request->phone;
       $enter->age=$request->age;
       $enter->total=$request->total;
       $enter->payments=$request->payments;
       $isSaved =$enter->save();
       if($isSaved){
           session()->flash('message','enter create successfully');
       return redirect()->back();
   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function show(Enter $enter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function edit(Enter $enter)
    {
        return view('admin.enter.edit',compact('enter'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enter $enter)
    {

        $enter->number=$request->number;
        $enter->name=$request->name;
        $enter->phone=$request->phone;
        $enter->age=$request->age;
        $enter->total=$request->total;
        $enter->payments=$request->payments;
        $enter->save();
        return redirect()->route('enter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enter $enter)
    {
        $enter->delete();
        return redirect()->back();
    }
}
