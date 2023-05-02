<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hayatı - {{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
</head>
<body>
{{--Navbar--}}

@include('navbar')

{{--Main--}}
<div class="main container">

    <div class="row entry m-2">
        <h1 class="title my-2"><i class="fa fa-angle-right"></i> <strong>PROF. DR. HAYDAR BAŞ'IN BİYOGRAFİSİ</strong></h1>
        <div class="clearfix"></div>
        {!! $results->description  !!}
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
                    <a href="https://www.facebook.com/haydarbas.e" class="circle"><span><i
                                class="fab fa-facebook-f"></i></span></a>
                    <a href="https://twitter.com/haydarbas_e"><span><i class="fab fa-twitter"></i></span></a>
                    <a href="https://www.instagram.com/haydarbas.e/"><span><i class="fab fa-instagram"></i></span></a>
                    <a href="https://www.tiktok.com/@haydarbas.e"><span><i class="fab fa-tiktok"></i></span></a>
                    <a href="https://www.youtube.com/channel/UChic02LYqebgOGju_jA7t7g"><span><i
                                class="fab fa-youtube"></i></span></a>
                    <a href="https://open.spotify.com/artist/0VzijyAg7UBeXeEhw0jzuy"><span><i
                                class="fab fa-spotify"></i></span></a>
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
<style>
    .entry{
        line-height:1.5;
        font-size:1em;
    }
    .entry li{
        padding: 10px 0;
    }
    .entry h1,h2,h3,h4,h5{
        padding: 20px 0;
    }
</style>
<script src="{{asset('frontend/js/app.js')}}"></script>
</body>
</html>
