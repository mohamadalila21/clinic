<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel="icon" type="image/png" href="imges/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media-query.css">
    <title>مركز نسمة لعلاج الاسنان</title>
    @yield('title')
</head>
<body>


    <!-- start nav bar  -->
    <section>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{url('/')}}">
                  <img src="./assest/imges/logo.png" alt="" srcset="">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('services')}}">خداماتنا</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">من نحن</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('condition')}}">قبل وبعد</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('articles')}}">مدونة</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('booked')}}">اتصل بنا</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </section>

    <section>
    <div class="contenter">
        <div class="bundel">
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:23;"></span>
            <span style="--i:18;"></span>
            <span style="--i:16;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <span style="--i:22;"></span>
            <span style="--i:25;"></span>
            <span style="--i:18;"></span>
            <span style="--i:21;"></span>
            <span style="--i:15;"></span>
            <span style="--i:13;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:13;"></span>
            <span style="--i:28;"></span>
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:23;"></span>
            <span style="--i:18;"></span>
            <span style="--i:16;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <span style="--i:22;"></span>
            <span style="--i:25;"></span>
            <span style="--i:18;"></span>
            <span style="--i:21;"></span>
            <span style="--i:15;"></span>
            <span style="--i:13;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:13;"></span>
            <span style="--i:28;"></span>
        </div>
    </div>
</section>


@yield('content')




    <!-- start footer -->
    <footer >
        <div class="back-grund-footer">
            <div class="container">
                <div class="content-footer">
                    <article class="footer-informations" data-aos="fade-up">
                        <div>
                            <h3>لدينا معلومات</h3>
                        </div>
                        <div>
                            <ul>
                                <li>الموقع | خان يونس البلد مقابل شاورما سنابل</li>
                                <li>رقم الموبايل | 0567670707
                                </li>
                                <li>البريد الإلكتروني | zidanabood18@gmail.com
                                </li>
                                <li>تواصل اجتماعي

                                <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>

                            </ul>
                        </div>
                    </article>
                    <article class="footer-quick-list" data-aos="fade-up">
                        <div>
                            <h3>قائمة سريعة</h3>
                        </div>
                        <div>
                            <ul>
                                <li><a href="{{url('/')}}">الرئيسية</a></li>
                                <li><a href="{{url('services')}}">خدماتنا</a></li>
                                <li><a href="{{url('about')}}">من نحن</a></li>
                                <li><a href="{{url('condition')}}">قبل وبعد</a></li>
                                <li><a href="{{url('articles')}}">مدونة</a></li>
                                <li><a href="{{url('booked')}}">اتصل بنا</a></li>
                            </ul>
                        </div>
                    </article>
                    <article class="footer-who-are-we" data-aos="fade-up">
                        <div>
                            <h3>عن المركز</h3>
                        </div>
                        <div>
                            <p>نقدم خدمات في طب الأسنان من أجل تزويد مرضانا بأغلى جودة من الخدمات الصحية بالطريقة المثالية ونحت نواصل جهودنا للوفاء بجميع متطلبات طب الأسنان الحديثة
                                مهمتنا هي التأكد من أن مرضانا يغادرون عيادتنا بأسنان صحية وابتسامة سعيدة


                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/aos.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>
