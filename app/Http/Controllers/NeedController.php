<?php

namespace App\Http\Controllers;

use App\Models\Need;
use Illuminate\Http\Request;

class NeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $needs=Need::all();
        return view('admin.need.index',compact('needs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.need.create');

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
            'number'=>'required|string|unique:needs',
            'item'=>'required|string|min:1|max:300',
            'price'=>'required|string|min:1|max:300',
            'invoice'=>'required|string|min:1|max:300',
            'invoice_date'=>'required|string|min:1|max:300',
        ],[
            'number.required'=>'قم باضافة رقم العملية',
            'item.required'=>'قم باضافة الصنف',
            'price.required'=>'قم باضافة سعر الواحد',
            'invoice.required'=>'قم باضافة تاريخ رقم الفاتورة',
            'invoice_date.required'=>'قم باضافة تاريخ تاريخ الفاتورة',
        ]);
        $need=new Need;
        $need->number=$request->number;
        $need->item=$request->item;
        $need->number_b=$request->number_b;
        $need->price=$request->price;
        $need->invoice=$request->invoice;
        $need->invoice_date=$request->invoice_date;
        $isSaved =$need->save();
        if($isSaved){
            session()->flash('message','need create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Need  $need
     * @return \Illuminate\Http\Response
     */
    public function show(Need $need)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Need  $need
     * @return \Illuminate\Http\Response
     */
    public function edit(Need $need)
    {
        return view('admin.need.edit',compact('need'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Need  $need
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Need $need)
    {
        $need->number=$request->number;
        $need->item=$request->item;
        $need->number_b=$request->number_b;
        $need->price=$request->price;
        $need->invoice=$request->invoice;
        $need->invoice_date=$request->invoice_date;
        $need->save();
        return redirect()->route('need.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Need  $need
     * @return \Illuminate\Http\Response
     */
    public function destroy(Need $need)
    {
        $need->delete();
        return redirect()->back();


    }
}
