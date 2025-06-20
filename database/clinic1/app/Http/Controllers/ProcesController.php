<?php

namespace App\Http\Controllers;

use App\Models\Proces;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ClinicReservations;
use Illuminate\Support\Facades\DB;

class ProcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = DB::table('clinic_reservations')->where('datetime', '2022-07-01')->first();
        // $process=ClinicReservations::where('datetime','2022-07-01')->get();
        return view('admin.proces.index',compact('process'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proces.create');

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
            'name'=>'required|string|min:1|max:300',
            'message'=>'required|string|min:3|max:300',
            'time'=>'required|string|min:3|max:300',


        ],[
            'name.required'=>'قم باضافة الاسم',
            'message.required'=>'قم باضافة رسالة',
            'time.required'=>'قم باضافة وقت عملية',


        ]);
        $proces=new Proces;
        $proces->name=$request->name;
        $proces->message=$request->message;
        $proces->time=$request->time;
        $isSaved =$proces->save();
        if($isSaved){
            session()->flash('message','proces create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proces  $proces
     * @return \Illuminate\Http\Response
     */
    public function show(Proces $proces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proces  $proces
     * @return \Illuminate\Http\Response
     */
    public function edit(Proces $proce)
    {
        return view('admin.proces.edit',compact('proce'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proces  $proces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proces $proce)
    {

        $proce->name=$request->name;
        $proce->message=$request->message;
        $proce->time=$request->time;
        $proce->save();
        return redirect()->route('proces.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proces  $proces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proces $proce)
    {
        $proce->delete();
        return redirect()->back();
    }
}
