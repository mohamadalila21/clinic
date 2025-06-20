<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Booked;
use App\Models\Condition;
use App\Models\Show;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ShowController extends Controller
{

    public function home()
    {
        $articless=Articles::take(4)->get();
        return view('web.home',compact('articless'));

    }


    public function articles()
    {
        $articless=Articles::take(20)->get();
        return view('web.articles',compact('articless'));

    }


    public function booked()
    {
        $bookeds=Booked::take(5)->get();
        return view('web.booked',compact('bookeds'));

    }


    public function condition()
    {
        $conditions=Condition::take(20)->get();
        return view('web.condition',compact('conditions'));

    }

    public function showarticles($id)
    {
        $articles=Articles::where('id',$id)->first();
        return view('web.showarticles',compact('articles'));

    }


}
