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
    <div class="page-title bg-top">
        <div class="container mt-3 ">
            <div class="row">
                <div class="bg-top  d-flex justify-content-start align-items-center fs-4 fw-bold p-2">
                    {{$videos->title}}
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 entry">

                <div class="content mb-3">

                    <?php
                    $convertedURL = str_replace("watch?v=", "embed/", $videos->embed);
                    ?>
                    <div class="sizer">
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="<?php  echo $convertedURL ?>"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="meta-info mt-2">
                        <span class="me-4"><i class="fas fa-clock"></i> {{$videos->created_at->format('d/m/Y')}}</span>

                        <span class="me-4"><i class="fas fa-eye"></i> {{$videos->hit}}</span>
                    </div>
{{--                    {!! $videos->description !!}--}}
                </div>
                <div class="share">
                    <div class="title fw-bold my-3">Paylaş:</div>
                    <!-- ShareThis BEGIN -->
                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="title-box d-flex bg-top-2 justify-content-center align-items-center p-2 fw-bold">
                    Editörün Seçtikleri
                </div>

                                <div class="related-article my-3">
                                    <ul class="sidebar-item">

                                        @foreach($related as $article)

                                            <li>
                                                <div class="item">
                                                    <a href="{{asset("video/".$article->slug)}}" title="{{$article->title}}" rel="bookmark">
                                                        <div class="post-thumbnail t-effect h-shine">
                                                            <img src="{{asset($article->cover)}}"  width="297" height="220" class="">
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
                                            {{--                        <div class="card mb-2">--}}
                                            {{--                            <div class="card-img">--}}
                                            {{--                                <img src="{{asset($article->cover)}}" alt="" class="img-fluid">--}}
                                            {{--                            </div>--}}
                                            {{--                            <a href="/video/{{$article->slug}}">--}}
                                            {{--                                <div class="card-title p-2 m-0 fs-3 lh-1">--}}
                                            {{--                                    {{$article->title}}--}}
                                            {{--                                </div>--}}
                                            {{--                            </a>--}}
                                            {{--                            <div class="card-description p-2">--}}
                                            {{--                                {!! Str::words(strip_tags($article->description), $limit = 22, $end = '...') !!}--}}
                                            {{--                            </div>--}}
                                            {{--                        </div>--}}
                                        @endforeach
                                    </ul>
                                </div>

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
