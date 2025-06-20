<?php

namespace App\Http\Controllers;

use App\Models\Waiting;
use Illuminate\Http\Request;

class WaitingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waitings=Waiting::all();
        return view('admin.waiting.index',compact('waitings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.waiting.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        {
            $request->validate([

                'name'=>'required|string|min:3|max:30',
                'email'=>'required|email',
                'phone'=>'required|string',
                'message'=>'required|string|min:3|max:300',
                'date'=>'required|string|min:3|max:300',
                'selection'=>'required|string|min:3|max:300',
            ],[

                'name.required'=>'قم باضافة اسم',
                'email.required'=>'قم باضافة البريد الالكتروني',
                'phone.required'=>'قم باضافة رقم الموبايل',
                'message.required'=>'قم باضافة رسالتك',
                'date.required'=>'قم باضافة حجز',
                'selection.required'=>'قم باضافة حالة',
            ]);
            $waiting=new Waiting;
            $waiting->name=$request->name;
            $waiting->email=$request->email;
            $waiting->phone=$request->phone;
            $waiting->message=$request->message;
            $waiting->date=$request->date;
            $waiting->selection=$request->selection;
            $isSaved =$waiting->save();
            if($isSaved){
                 session()->flash('message','waiting create successfully');
            return redirect()->back();

        }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waiting  $waiting
     * @return \Illuminate\Http\Response
     */
    public function show(Waiting $waiting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waiting  $waiting
     * @return \Illuminate\Http\Response
     */
    public function edit(Waiting $waiting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waiting  $waiting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waiting $waiting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waiting  $waiting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waiting $waiting)
    {
        $waiting->delete();
        return redirect()->back();
    }
}
