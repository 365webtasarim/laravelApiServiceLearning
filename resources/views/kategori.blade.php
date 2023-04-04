<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

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

    {{--    Makale başlık--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 bg-top-2 d-flex justify-content-center align-items-center fw-bold p-2">
                {{$catData->title}}
            </div>
            <div class="col-lg-9 bg-top">
            </div>
        </div>
    </div>
    {{--Makale item--}}
    <div class="container mt-4">
        <div class="row">
            @if(isset($catData->post))
                @foreach($catData->post as $item)
                    <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-self-stretch my-3">
                        <div class="card shadow-sm">
                            <img src="{{asset($item->cover)}}" width="100%" height="225" class="card-img-top" alt="">
                            <div class="card-body d-flex flex-column">
                                <a href="/makale/{{$item->slug}}">
                                    <p class="fs-3 fw-bold lh-1">{{$item->title}}</p>
                                </a>
                                <p class="text-muted position-relative">
                                    {!! Str::words(strip_tags($item->description), $limit = 22, $end = '...') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
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
    <script src="{{asset('frontend/js/app.js')}}"></script>
</body>
</html>
