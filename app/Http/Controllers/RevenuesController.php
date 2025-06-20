<?php

namespace App\Http\Controllers;

use App\Models\Revenues;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues=Revenues::all();
        return view('admin.revenues.index',compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.revenues.create');

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
            'number'=>'required|string|unique:revenues',
            'name'=>'required|string|min:3|max:300',
            'amount'=>'required|string|min:1|max:300',
            'reason'=>'required|string|min:1|max:300',

        ],[
            'number.required'=>'قم باضافة رقم العملية',
            'name.required'=>'قم باضافة اسم مسدد',
            'amount.required'=>'قم باضافة مبلغ',
            'reason.required'=>'قم باضافة ذالك عن',

        ]);
        $revenues=new Revenues;
        $revenues->number=$request->number;
        $revenues->name=$request->name;
        $revenues->amount=$request->amount;
        $revenues->reason=$request->reason;
        $isSaved =$revenues->save();
        if($isSaved){
            session()->flash('message','revenues create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function show(Revenues $revenues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function edit(Revenues $revenue)
    {
        return view('admin.revenues.edit',compact('revenue'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revenues $revenue)
    {
        $revenue->number=$request->number;
        $revenue->name=$request->name;
        $revenue->amount=$request->amount;
        $revenue->reason=$request->reason;
        $revenue->save();
        return redirect()->route('revenues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revenues $revenue)
    {
        $revenue->delete();
        return redirect()->back();


    }
}
