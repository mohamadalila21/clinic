@extends('web.layout')
@section('content')
<section class="contenet-title-decs-test">
            <div class="container">
                <div class="content-title-decs">
                    <article>
                        <div class="text-title-desc" data-aos="fade-left"
                        data-aos-anchor="#example-anchor"
                        data-aos-offset="500"
                        data-aos-duration="500">
                            <h2>نعيد لإبتسامتك رونقها</h2>
                            <p>عزز من شخصية ابتسامتك والمظهر الذي يناسب وجهك من خلال علاجاتنا المتقدمة في رسم الابتسامة</p>
                            <div class="btn-appointment-booking">
                            <a href="{{url('booked')}}">إحجز موعد</a>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="img-title-dec"  >
                            <img src="./assest/imges/clear-aligners-290x290.jpg" alt="" srcset="">
                        </div>
                    </article>
                </div>
            </div>
    </section>
  
        <section >
            <div class="container">
                <div class="title-call-us" data-aos="fade-up">
                    <h1>أطلب حجز</h1>
                </div>
                <div class="content-call-us">
                <form method="post" action="{{route('booked.store')}}">
                @csrf 
                <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                <h5><i class="pe-7s-info"></i> خطأ!</h5>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                <h5><i class="pe-7s-check"></i> تم حجز موعد انتضر منا اتصال</h5>
                نتمنى لك السلامة
                </div>
                @endif
                    <div class="gruop-input-call-us" data-aos="fade-up">
                        <label for="">الاسم :-</label>
                        <input type="text" name="name" id="" placeholder="الرجاء ادخال الاسم">
                    </div>
                    <div class="gruop-input-call-us" data-aos="fade-up">
                        <label for="">البريد الالكتروني :-</label>
                        <input type="text" name="email" id="" placeholder="الرجاء ادخال البريد الالكتروني">
                    </div>
                    <div class="gruop-input-call-us" data-aos="fade-up">
                        <label for="">رقم الموبايل :-</label>
                        <input type="text" name="phone" id="" placeholder="الرجاء ادخال رقم الموبايل">
                    </div>
                    <div class="gruop-input-call-us" data-aos="fade-up">
                        <label for="">رسالتك :-</label>
                        <textarea name="message" id="" cols="30" rows="10" placeholder="ادخل رسالتك"></textarea>
                    </div>
                    <div class="gruop-input-call-us" data-aos="fade-up">
                        <label for="">تاريخ الحجز  :-</label>
                        <input type="date" name="date" id="" placeholder=" حدد تاريخ الحجز">
                    </div>
                    <div class="content-call-us-submit" data-aos="fade-up">
                       <input type="submit" value="أرسل طلبك">
                    </div>
                </form>
                </div>
            </div>
        </section>




@endsection
