<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::all();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');

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
            'number'=>'required|string|unique:payments',
            'batch'=>'required|string|min:1|max:300',
            'number_b'=>'required|string|min:3|max:300',
            'invoice_date'=>'required|string|min:1|max:300',
            'condition'=>'required|string|min:1|max:300',

        ],[
            'number.required'=>'قم باضافة رقم العملية',
            'batch.required'=>'قم باضافة نوع الدفعات ',
            'number_b.required'=>'قم باضافة رقم الفاتورة',
            'invoice_date.required'=>'قم باضافة تاريخ تاريخ الفاتورة',
            'condition.required'=>'قم باضافة الحالة',

        ]);
        $payment=new Payment;
        $payment->number=$request->number;
        $payment->batch=$request->batch;
        $payment->number_b=$request->number_b;
        $payment->invoice_date=$request->invoice_date;
        $payment->condition=$request->condition;
        $isSaved =$payment->save();
        if($isSaved){
            session()->flash('message','payment create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payment.edit',compact('payment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->number=$request->number;
        $payment->batch=$request->batch;
        $payment->number_b=$request->number_b;
        $payment->invoice_date=$request->invoice_date;
        $payment->condition=$request->condition;
        $payment->save();
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back();
    }
}
