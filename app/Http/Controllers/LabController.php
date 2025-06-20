<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs=Lab::all();
        return view('admin.lab.index',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lab.create');

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
            'number'=>'required|string|unique:labs',
            'type'=>'required|string|min:1|max:300',
            'number_b'=>'required|string|min:1|max:300',
            'price'=>'required|string|min:1|max:300',
            'received_date'=>'required|string|min:1|max:300',
            'payments'=>'required|string|min:1|max:300',
        ],[
            'number.required'=>'قم باضافة رقم العملية',
            'type.required'=>'قم باضافة نوع التلبيسة',
            'number_b.required'=>'قم باضافة العدد',
            'price.required'=>'قم باضافة السعر',
            'received_date.required'=>'قم باضافة تاريخ الاستلام',
            'payments.required'=>'قم باضافة الدفعات',
        ]);
        $lab=new Lab;
        $lab->number=$request->number;
        $lab->type=$request->type;
        $lab->number_b=$request->number_b;
        $lab->price=$request->price;
        $lab->received_date=$request->received_date;
        $lab->payments=$request->payments;
        $isSaved =$lab->save();
        if($isSaved){
            session()->flash('message','lab create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        return view('admin.lab.edit',compact('lab'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        $lab->number=$request->number;
        $lab->type=$request->type;
        $lab->number_b=$request->number_b;
        $lab->price=$request->price;
        $lab->received_date=$request->received_date;
        $lab->payments=$request->payments;
        $lab->save();
        return redirect()->route('lab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();
        return redirect()->back();
    }
}
