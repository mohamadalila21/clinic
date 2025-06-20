@extends('web.layout')
@section('content')
        <section>
            <div class="container" >
                <div class="title-call-us">
                    <h1>أطلب حجز</h1>
                </div>
                <div class="content-call-us">
                <form method="post" action="{{route('rev.store')}}">
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
                <h5><i class="pe-7s-check"></i> تم حجز موعد انتظر منا اتصال</h5>
                نتمنى لك السلامة
                </div>
                @endif
                    <div class="gruop-input-call-us">
                        <label for="">الاسم :-</label>
                        <input type="text" name="name" id="" placeholder="الرجاء ادخال الاسم">
                    </div>
                    <div class="gruop-input-call-us" >
                        <label for="">البريد الالكتروني :-</label>
                        <input type="text" name="email" id="" placeholder="الرجاء ادخال البريد الالكتروني">
                    </div>
                    <div class="gruop-input-call-us">
                    <label for="">رقم الموبايل :-</label>
                    <input type="text" name="phone" id="" placeholder="الرجاء ادخال رقم الموبايل">
                    </div>
                    <div class="gruop-inp/ut-call-us">
                        <label for="">رسالتك :-</label>
                        <textarea name="message" id="" cols="30" rows="10" placeholder="ادخل رسالتك"></textarea>
                    </div>
                    <div class="gruop-input-call-us">
                        <label for="">تاريخ الحجز  :-</label>
                        <input type="date" name="date" id="" placeholder=" حدد تاريخ الحجز">
                    </div>
                    <div class="col-md-6" data-select2-id="44">
                    <div class="form-group" data-select2-id="43">
                    <label>الحالة</label>
                    <select class="form-control select2 select2-hidden-accessible" name="selection" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="45">تبييض</option>
                    <option data-select2-id="46">خلع</option>
                    <option data-select2-id="47">زرع</option>
                    <option data-select2-id="48">جسر</option>
                    <option data-select2-id="49">وجع</option>
                    <option data-select2-id="50">تسويس</option>
                    </select>
                    </div>                                                                                                       
                    </div>
                    <div class="content-call-us-submit">
                       <input type="submit" value="أرسل طلبك">
                    </div>
                </div>
                </form>
                </div>
            </div>
        </section>




@endsection
