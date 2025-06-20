<?php

namespace App\Http\Controllers;

use App\Models\ClinicReservations;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ClinicReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $ClinicReservations=ClinicReservations::all();
        return view('admin.ClinicReservations.index',compact('ClinicReservations' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ClinicReservations = new ClinicReservations();
        $ClinicReservations->name=$request->name;
        $ClinicReservations->mobile=$request->mobile;
        $ClinicReservations->datetime=$request->date;
        $ClinicReservations->save();
        return Redirect()->Route('ClinicReservations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClinicReservations  $clinicReservations
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicReservations $clinicReservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClinicReservations  $clinicReservations
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicReservations $clinicReservations , $id)
    {

        $ClinicReservations = ClinicReservations::find($id);
        return view('admin.ClinicReservations.edit',compact('ClinicReservations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClinicReservations  $clinicReservations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicReservations $clinicReservations, $id)
    {
        $ClinicReservations = ClinicReservations::find($id);
        $ClinicReservations->name=$request->name;
        $ClinicReservations->mobile=$request->mobile;
        $ClinicReservations->datetime=$request->date;
        $ClinicReservations->save();
        return Redirect()->Route('ClinicReservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClinicReservations  $clinicReservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicReservations $clinicReservations, $id)
    {
        ClinicReservations::destroy($id);
        return Redirect()->Route('ClinicReservations.index');
    }
}
