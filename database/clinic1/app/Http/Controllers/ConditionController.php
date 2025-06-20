<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions=Condition::all();
        return view('admin.condition.index',compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.condition.create');

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
            'before'=>'required|string|min:1|max:300',
            'distance'=>'required|string|min:3|max:300',
            'image'=>'required|nullable',
           
        ],[
            'before.required'=>'قم باضافة قبل',
            'distance.required'=>'قم باضافة بعد',
            'image.required'=>'قم باضافة صورة',
         
        ]);
        $condition=new Condition;
        $condition->before=$request->before;
        $condition->distance=$request->distance;
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $condition->image=$imageName;         
        }
        $isSaved =$condition->save();
        if($isSaved){
            session()->flash('message','condition create successfully');
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function edit(Condition $condition)
    {
        return view('admin.condition.edit',compact('condition'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condition $condition)
    {
        $condition->before=$request->before;
        $condition->distance=$request->distance;
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $condition->image=$imageName;         
        }
        $condition->save();
        return redirect()->route('condition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        $condition->delete();
        return redirect()->back();
    }
}
