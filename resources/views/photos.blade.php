<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('venobox/venobox.min.css')}}" type="text/css" media="screen"/>

    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=630f5ce90b5e930012a9c3c7&product=sop'
            async='async'></script>
</head>
<body>

@include('navbar')

{{--Main--}}
<div class="main">

    <div class="container my-4">
        <div class="row">

            @foreach($galleries as $gallery)
                <div class="col-lg-3 col-sm-4 col-6 pb-4">
                    <a class="venobox" data-maxwidth="100%" href="{{asset($gallery->image_path)}}" data-gall="myGallery">
                        <img class="img-fluid w-100 h-100" src="{{asset($gallery->image_path)}}" style="max-height: 200px;" alt="image alt"/>
                    </a>
                </div>
            @endforeach

        </div>

    </div>
</div>´

<footer class="container-fluid bg-top-2">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{asset('image/logo.png')}}" alt="">
            </div>
            <div class="col-md-5 offset-md-4">
                <p>iletişim</p>
                <p><span><i class="fas fa-envelope"></i> info@profdrhaydarbasenstitusu.org</span></p>
                <p class="social-top">
                    <a href="" class="circle"><span><i class="fab fa-facebook-f"></i></span></a>
                    <a href=""><span><i class="fab fa-twitter"></i></span></a>
                    <a href=""><span><i class="fab fa-instagram"></i></span></a>
                    <a href=""><span><i class="fab fa-tiktok"></i></span></a>
                    <a href=""><span><i class="fab fa-youtube"></i></span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="copyright bg-dark text-center w-100 p-2">
            HBE 2022. Tüm Hakları Saklıdır
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('venobox/venobox.min.js')}}"></script>

<script src="{{asset('frontend/js/app.js')}}"></script>
<script>
    $('.venobox').venobox();
</script>
</body>
</html>
