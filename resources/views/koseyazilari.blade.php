<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Köşe Yazıları - {{config('app.name')}}</title>

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
        <div class="position-absolute bottom-0 start-0 w-100">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col-6 bottom-100 d-flex justify-content-end">
                        <img src="{{asset('image/hb-slider.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 slider-center">
                        <h1>Prof. Dr. Haydar Baş Enstitüsü</h1>
                        <p>
                            Hoş geldin Atatürk eserleriyle Türkiye'yi bütünleştiren fikir dehası,
                            Ehl-i Beyt külliyatı ile İslam dünyasını birleştiren yegane insan,
                            Milli Ekonomi Modeli ile dünyadaki gidişata yön vererek çığır açan
                            lider ve şahsiyet...
                        </p>
                        <a class="btn btn-slider px-5" role="button" aria-disabled="true">DEVAM ET</a>

                    </div>
                </div>
            </div>


        </div>
        <img src="{{asset('image/slider1.jpg')}}" alt="">
    </div>

</div>


{{--Main--}}
<div class="main">

    {{--    Makale başlık--}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 bg-top-2 d-flex justify-content-center align-items-center fw-bold p-2">
                KÖŞE YAZILARI
            </div>
            <div class="col-lg-9 bg-top">
            </div>
        </div>
    </div>
    {{--Makale item--}}
    <div class="container mt-4">
        <div class="row ">
            <div class="col-lg-8 authors-category">
                <div class="author-container horizontal">
                    <div class="author">
                        <a href="/hayati" title="Haydar Baş">
                            <figure>
                                <img alt="Haydar Baş" class="black-white" src="{{asset('image/haydar-bas.jpg')}}">
                            </figure>
                            <div class="info">
                                <span class="name">Haydar Baş</span>
                                <span class="last-article-title">BTP Genel Başkanı</span>
                                <span class="last-article-description"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="author-other-articles" id="AuthorOtherArticles">
                    <ul>
                        @foreach($makale as $item)
                        <li>
                            <a href="/kose-yazisi/{{$item->slug}}" class="gtm-tracker">
                                <span class="title">{{$item->title}}</span>
                                <span class="description">{!! Str::words(strip_tags($item->description), $limit = 44, $end = '...') !!}</span>
                                <span class="block">
                                <span class="date">{{$item->created_at->format('d/m/Y')}}</span>
                                <span class="readmore">Yazının Devamı</span>
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="title-box d-flex bg-top-2 justify-content-center align-items-center p-2 fw-bold">
                    En Çok Okunanlar
                </div>

                <div class="related-article my-3">
                    <ul class="sidebar-item">

                        @foreach($related as $article)

                            <li>
                                <div class="item">
                                    <a href="{{asset("kose-yazisi/".$article->slug)}}" title="{{$article->title}}" rel="bookmark">
                                        <div class="post-thumbnail t-effect h-shine">
                                            <img  src="{{asset('image/haydar-bas-kose-yazisi.jpg')}}"  width="297" height="220" class="">
                                        </div>
                                        <!-- post-thumbnail /-->

                                        <h3>{{$article->title}}</h3>
                                        <span class="overlay"></span>
                                    </a>

                                    <div class="posts-information">

                                        <ul>
                                            <li><i class="far fa-calendar-alt"></i>{{$article->updated_at->format('d/m/Y')}}</li>
                                        </ul>

                                    </div><!-- .posts-information -->

                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>


            </div>

            {{ $makale->links('pagination::bootstrap-5') }}
{{--            @foreach($makale as $item)--}}
{{--                <div class="col-sm-12 col-md-6 col-lg-4 d-flex align-self-stretch my-3">--}}

{{--                    <div class="card shadow-sm">--}}
{{--                        <img src="{{asset('image/haydar-bas-kose-yazisi.jpg')}}" width="100%" height="225" class="card-img-top" alt="">--}}
{{--                        <div class="card-body d-flex flex-column">--}}
{{--                            <a href="kose-yazisi/{{$item->slug}}"><p class="fs-3 fw-bold lh-1">{{$item->title}}</p></a>--}}
{{--                            <p class="text-muted position-relative">{!! Str::words(strip_tags($item->description), $limit = 22, $end = '...') !!}</p>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
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
        <div class="copyright bg-dark text-center w-100 p-2">
            HBE 2022. Tüm Hakları Saklıdır
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('frontend/js/app.js')}}"></script>
</body>
</html>
