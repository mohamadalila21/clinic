<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookeds=Booked::all();
        return view('admin.booked.index',compact('bookeds'));
    }

    public function formatdate(Request $request)
    {
        $bookeds=Booked::whereBetween('date',[$request->fromdata,$request->data])->get();
        $process=Booked::where('date', now()->format('Y-m-d') )->get();
        return view('admin.proces.index',compact('process' , 'bookeds'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booked.create');

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

            'name'=>'required|string|min:3|max:30',
            'email'=>'required|email',
            'phone'=>'required|string',
            'message'=>'required|string|min:3|max:300',
            'date'=>'required|string|min:3|max:300',
        ],[

            'name.required'=>'قم باضافة اسم',
            'email.required'=>'قم باضافة البريد الالكتروني',
            'phone.required'=>'قم باضافة رقم الموبايل',
            'message.required'=>'قم باضافة رسالتك',
            'date.required'=>'قم باضافة تاريخ حجز',
        ]);
        $booked=new Booked;
        $booked->name=$request->name;
        $booked->email=$request->email;
        $booked->phone=$request->phone;
        $booked->message=$request->message;
        $booked->date=$request->date;
        $isSaved =$booked->save();
        if($isSaved){
            session()->flash('message','booked create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function day()
    {
        $bookeds=Booked::all();
        $process=Booked::where('date', now()->format('Y-m-d') )->get();
        return view('admin.proces.index',compact('process' , 'bookeds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
public function edit(Booked $booked)
    {
        return view('admin.proces.edit',compact('booked'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booked $booked)
    {

        $booked->name=$request->name;
        $booked->email=$request->email;
        $booked->phone=$request->phone;
        $booked->message=$request->message;
        $booked->date=$request->date;
        $booked->save();
        return redirect()->route('day');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booked $booked)
    {
        $booked->delete();
        return redirect()->back();
    }


}
