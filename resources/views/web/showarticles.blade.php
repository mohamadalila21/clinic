@extends('web.layout')
@section('content')
<section>
    <div class="container">
        <div class="img-view-article">
            <img src="{{asset('images/'.$articles->image)}}" alt="" srcset="">
        </div>
        <div class="title-view-article">
            <h3>{{$articles->title}}</h3>
            <p>{{$articles->message}}</p>
        </div>
    </div>
</section>
@endsection
