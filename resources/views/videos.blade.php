<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Videolar</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=630f5ce90b5e930012a9c3c7&product=sop'
            async='async'></script>
</head>
<body>

@include('navbar')

{{--Main--}}
<div class="main">

    <div class="container mt-4">
        <div class="row">

                @foreach($videos as $video)
                    <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-self-stretch my-3">
                        <div class="card shadow-sm">
                            <a href="/video/{{$video->slug}}">
                                <img src="{{asset($video->cover)}}" width="100%" height="225" class="card-img-top" alt="">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <a href="/video/{{$video->slug}}">
                                    <p class="fs-3 fw-bold lh-1">{{$video->title}}</p>
                                </a>
{{--                                <p class="text-muted position-relative">--}}
{{--                                    {!! Str::words(strip_tags($video->description), $limit = 22, $end = '...') !!}--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    </div>
                @endforeach

                    {{ $videos->links('pagination::bootstrap-5') }}

        </div>
    </div>
</div>

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
