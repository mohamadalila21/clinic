@extends('web.layout')
@section('content')

<!-- start artical  -->
    <!-- start section  -->
    <section>
        <div class="container">
            <div class="title-latest-articles" data-aos="fade-up">
                <h1>أحدث المقالات</h1>
            </div>
            <article class="all-latest-articles all-latest-articles-custem">
            @foreach($articless as $articles)
                <div class="card" data-aos="fade-up">
                    <img src="{{asset('images/'.$articles->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <h4>{{$articles->title}}</h4>
                        </h5>
                        <p class="card-text"> {{$articles->message}}</p>
                        <a href="showarticles/{{$articles->id}}" class="btn btn-primary">إقرأ المزيد</a>
                    </div>
                </div>
                @endforeach

            </article>
        </div>
    </section>

    <!-- start appointment-booking -->
    <section>
        <div class="bg-appointment-booking">
            <div class="container">
                <div class="contact-info">
                    <article>
                        <div class="call-phone" data-aos="fade-left">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <p>اتصل بنا الآن</p>
                            <h6>0567-670707</h6>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-up">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>فلسطين - غزة -خان يونس</p>
                            <h6>خان يونس - دولار السنية -مقابل شاورما سنابل</h6>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-up">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>ساعات العمل</p>
                            <h6>السبت – الخميس: ٣:٣٠ – ٩:٣٠</h6>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-right">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <p>إحجز موعد</p>
                            <h6>عبر الإنترنت أو عبر الهاتف</h6>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
