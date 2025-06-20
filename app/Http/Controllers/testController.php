<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Waiting;
class testController extends Controller
{
    
   
    public function store(Request $request)
    {
      
        {
            $request->validate([

                'name'=>'required|string|min:3|max:30',
                'email'=>'required|email',
                'phone'=>'required|string',
                'message'=>'required|string|min:3|max:300',
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
}
