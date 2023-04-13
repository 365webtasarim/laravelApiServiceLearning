<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
</head>
<body >
{{--Navbar--}}

@include('navbar')
<div id="app">
    <slyt></slyt>

</div>
{{--Slider--}}
<div id="sync1" class="owl-carousel owl-theme">
    <div class="item">
        <img src="{{asset('image/enstitu-slider.jpg')}}" alt="">
    </div>
    <div class="item">
        <img src="{{asset('image/slider1.jpg')}}" alt="">
    </div>
    <div class="item">
        <img src="{{asset('image/sliderhde2.jpg')}}" alt="">
    </div>

</div>
{{--Slider--}}
<div id="sync1mobile" class="owl-carousel owl-theme">
      <div class="item">
        <img src="{{asset('image/mobile-hbe-slider.jpg')}}" alt="">
    </div>
    <div class="item">
        <img src="{{asset('image/slidermobile1.jpg')}}" alt="">
    </div>
    <div class="item">
        <img src="{{asset('image/slidermobile2.jpg')}}" alt="">
    </div>
</div>

{{--Main--}}
<div class="main">

    {{--    Makale başlık--}}
    <div class="container-fluid baslik-bg">
        <div class="container">
            <div class="row ">
                SOHBETLER
            </div>
        </div>
    </div>

    {{--Makale item Desktop--}}
    <div class="container mt-4" id="desktop">
        <div class="row">


            <ul class="home-sohbet" >
                @foreach($makale as $key => $item)
                    @if($key<3)
                        <li>
                                <div class="item">
                                    <a href="makale/{{$item->slug}}">

                                    <div class="post-thumbnail">
                                        <img src="{{asset($item->cover)}}" alt="" >
                                        <br>
                                        <span></span>
                                    </div>
                                       <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                    </a>

                                </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="row">

            @foreach($makale as $key=>$item)
                @if($key>=3 and $key<=5)
                    <div class="col-lg-4">


                        <div class="card shadow-sm h-100">
                            <img src="{{asset($item->cover)}}" width="100%" height="225" class="card-img-top" alt="">
                            <div class="card-body d-flex flex-column">
                                <a href="makale/{{$item->slug}}">
                                    <p class="fs-3 fw-bold lh-1">{{$item->title}}</p>
                                </a>
                                <p class="text-muted position-relative">
                                    {!! Str::words(strip_tags($item->description), $limit = 22, $end = '...') !!}
                                </p>
                                <div class="card-link  mt-auto d-inline-flex justify-content-between">
                                   <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                    <a  href="makale/{{$item->slug}}" class="btn btn-dvm">DEVAMINI OKU</a>
                                </div>
                            </div>
                        </div>

            </div>

                @endif
            @endforeach

        </div>

    </div>
    {{--Makale item Mobile--}}
    <div class="container mt-4" id="mobile">
        <div class="row" >


            <ul class="mobile-home-sohbet" >
                @foreach($makale as $key=>$item)
                    @if($key<4)
                        <li>
                            <div class="item">
                                <a href="makale/{{$item->slug}}">

                                    <div class="post-thumbnail">
                                        <img src="{{asset($item->cover)}}" alt="" width="100" height="70" >
                                    </div>

                                   <h3><p>{{$item->title}}</p></h3>
                                    <p>
                                    <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                    </p>
                                </a>

                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>

    {{--Videolar Başlık--}}
    <div class="container-fluid baslik-bg">
        <div class="container">
            <div class="row ">
                VİDEOLAR
            </div>
        </div>
    </div>

    {{-- Videolar İtem--}}
    <div class="container my-4" id="desktop">
        <div class="row">


            <ul class="home-sohbet video">
                @foreach($video as $key=>$item)
                    @if($key<3)
                        <li>
                            <div class="item">
                                <a href="video/{{$item->slug}}">

                                    <div class="post-thumbnail">
                                        <img src="{{asset($item->cover)}}" alt="" >
                                    </div>
                                    <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                    <div  class="playicon" >
                                        <img src="{{asset('image/play.png')}}" alt="">
                                    </div>

                                </a>

                            </div>
                        </li>
                    @endif
                @endforeach
<div class="clearfix">

</div>
                    @foreach($video as $key=>$item)
                        @if($key>=3 and $key<=5)
                            <li>
                                <div class="item">
                                    <a href="video/{{$item->slug}}">

                                        <div class="post-thumbnail">
                                            <img src="{{asset($item->cover)}}" alt="" >
                                        </div>
                                        <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                        <div  class="playicon" >
                                            <img src="{{asset('image/play.png')}}" alt="">
                                        </div>

                                    </a>

                                </div>
                            </li>

                        @endif
                    @endforeach
            </ul>
        </div>


    </div>

    {{-- Videolar İtem--}}
    <div class="container my-4" id="mobile">
        <div class="row">


            <ul class="video">
                @foreach($video as $key=>$item)
                    @if($key<5)
                        <li>
                            <div class="item">
                                <a href="video/{{$item->slug}}">

                                    <div class="post-thumbnail">
                                        <img src="{{asset($item->cover)}}" alt="" >
                                    </div>
                                    <span class="date">
                                           <i class="far fa-calendar-alt"></i> {{$item->updated_at->format('d/m/Y')}}
                                       </span>
                                    <div  class="playicon" >
                                        <img src="{{asset('image/play.png')}}" alt="">
                                    </div>

                                </a>

                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>


    </div>


</div>


<footer class="container-fluid bg-top-2">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3  ">
                <img src="{{asset('image/logo.png')}}" alt="" class="py-3">
            </div>
            <div class="col-md-5 offset-md-4">
                <p>İLETİŞİM</p>
                <p><span><i class="fas fa-envelope"></i> info@profdrhaydarbasenstitusu.org</span></p>
                <p class="social-top">
                     <a href="https://www.facebook.com/haydarbas.e" class="circle"><span><i class="fab fa-facebook-f"></i></span></a>
            <a href="https://twitter.com/haydarbas_e"><span><i class="fab fa-twitter"></i></span></a>
            <a href="https://www.instagram.com/haydarbas.e/"><span><i class="fab fa-instagram"></i></span></a>
            <a href="https://www.tiktok.com/@haydarbas.e"><span><i class="fab fa-tiktok"></i></span></a>
            <a href="https://www.youtube.com/channel/UChic02LYqebgOGju_jA7t7g"><span><i class="fab fa-youtube"></i></span></a>
            <a href="https://open.spotify.com/artist/0VzijyAg7UBeXeEhw0jzuy"><span><i class="fab fa-spotify"></i></span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="copyright bg-black text-center w-100 p-2">
            Copyright © HBE 2022 Tüm Hakları Saklıdır.
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function menumobile() {
        var x = document.getElementById("mobileMenu");
        if (x.style.display === "flex") {
            x.style.display = "none";
        } else {
            x.style.display = "flex";
        }
    }
</script>
<script src="{{asset('frontend/js/app.js')}}"></script>

</body>
</html>
