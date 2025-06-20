<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $daley = Booked::latest()->first();
        return view('admin.layout',compact('daley'));
    }  
}
