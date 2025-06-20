@extends('web.layout')
@section('content')

        <!-- start  content-title-decs-->
        <section class="contenet-title-decs-test">
            <div class="container">
                <div class="content-title-decs">
                    <article>
                        <div class="text-title-desc" data-aos="fade-left"
                        data-aos-anchor="#example-anchor"
                        data-aos-offset="500"
                        data-aos-duration="500">
                            <h2>صور الحالات</h2>
                            <p>عزز من شخصية ابتسامتك والمظهر الذي يناسب وجهك من خلال علاجاتنا المتقدمة في رسم الابتسامة</p>
                            <div class="btn-appointment-booking">
                                <a href="">إحجز موعد</a>
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
    <!-- start before and after -->
    <section>
        <div class="container">
            <article class="title-before-and-after" data-aos="fade-up">
                <h2>صور الحالات</h2>
                <p>بعض من صور تجميل الاسنان قبل و بعد زراعة الاسنان .</p>
            </article>
            <article class="all-content-img-before-and-after">
            @foreach($conditions as $condition)
                <div class="content-img-before-and-after">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn img-before-and-after" data-bs-toggle="modal" data-bs-target="#exampleModal" data-aos="fade-up">
                        <img src="{{asset('images/'.$condition->image)}}" alt="" srcset="">
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-body">
                            <img src="{{asset('images/'.$condition->image)}}" alt="" srcset="">
                            </div>
                        </div>
                        </div>
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
                            <a href="">0567-670707</a>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-up">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>فلسطين - غزة -خان يونس</p>
                            <a href="">خان يونس - دولار السنية -مقابل شاورما سنابل</a>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-up">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <p>ساعات العمل</p>
                            <a href="">السبت – الخميس: ٣:٣٠ – ٩:٣٠</a>
                        </div>
                    </article>
                    <article>
                        <div class="call-phone" data-aos="fade-right">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <p>إحجز موعد</p>
                            <a href="">عبر الإنترنت أو عبر الهاتف</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>







@endsection
