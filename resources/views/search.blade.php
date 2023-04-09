<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
</head>
<body>
{{--Navbar--}}

@include('navbar')


{{--Slider--}}
<div id="sync1" class="owl-carousel owl-theme">
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
        <img src="{{asset('image/slidermobile1.jpg')}}" alt="">
    </div>
    <div class="item">
        <img src="{{asset('image/slidermobile2.jpg')}}" alt="">
    </div>
</div>

{{--Main--}}
<div class="main container">

<div class="row search-results m-2">

    <h1 class="title"><i class="fa fa-angle-right"></i> Arama Sonuçları: {{$query}} </h1>
    <div class="clearfix"></div>
    @foreach($results as $result)
        <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-self-stretch my-3">
            <div class="card shadow-sm">
            @if($result->type=="post")
                <a href="/makale/{{$result->slug}}">
                    @elseif($result->type=="video")
                        <a href="/video/{{$result->slug}}">
                            @else
                                <a href="/kose-yazisi/{{$result->slug}}">
                                    @endif

                @if($query!="")
                    @if($result->cover)
                                            <img src="{{asset($result->cover)}}" width="100%" height="225" class="card-img-top" alt="">

                                        @else
                                            <img src="/image/haydar-bas-kose-yazisi.jpg" width="100%" height="225" class="card-img-top" alt="">

                                        @endif
                    <div class="card-body d-flex flex-column">
                        <p class="fs-3 fw-bold lh-1">
    {!! preg_replace("/\b([a-z]*${query}[a-z]*)\b/i","<strong>$1</strong>",$result->title) !!}
</p>
                    </div>
@else

@endif

</a>
</div>

{{--  {!! preg_replace("/\b([a-z]*${query}[a-z]*)\b/i","<strong>$1</strong>",$result->content) !!}  --}}
</div>
@endforeach
<div class="clearfix"></div>
{{ $results->links('pagination::bootstrap-5') }}


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
