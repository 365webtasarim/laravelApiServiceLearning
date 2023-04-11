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
<body onload="htmlTableOfContents();">
@include('navbar')

{{--Main--}}
<div class="main">

    {{--    Makale başlık--}}
    <div class="page-title bg-top">
        <div class="container mt-3 ">
            <div class="row">
                <div class="bg-top  d-flex justify-content-start align-items-center fs-4 fw-bold p-2">
                    {{$makale->title}}
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 entry">
                <img src="{{asset($makale->cover)}}" alt="" class="img-fluid entry-img">
                <div class="meta-info mt-2">
                    <span class="me-4 fw-bold"><i class="far fa-calendar-alt"></i> {{$makale->updated_at->format('d/m/Y')}}</span>
                    <span class="me-4"><i class="fas fa-folder"></i>
                        @foreach($makale->catagory as $cat)
                            <a href="/kategori/{{$cat->slug}}"> {{$cat->title}}</a>
                        @endforeach
                    </span>
                    <span class="me-4"><i class="fas fa-eye"></i> {{$makale->hit}}</span>
                </div>
                <ul id="toc" class="border my-2 p-3">
                    <p class="h1"><img src="{{asset('image/icindekiler-icon.png')}}" alt="">Neler Okuyacaksınız</p>
                </ul>
                <div class="content my-3">
                    {!! $makale->description !!}
                    <div class="share">
                        <div class="title fw-bold my-3">Paylaş:</div>
                        <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                    </div>

                    @if(isset($makale) && $makale->embed != "")
                        <p class="v-izle">
                            Bu sohbeti video olarak izlemek için play butonuna basınız
                        </p>
                            <?php
                            $videoURL = $makale->embed;
                            $convertedURL = str_replace("watch?v=", "embed/", $videoURL);
                            ?>
                        <div class="sizer">
                            <div class="ratio ratio-16x9">
                                <iframe w class="embed-responsive-item" src="<?php  echo $convertedURL ?>"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                        <hr>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 position-relative">
                            @if(isset($l_makale))
                                <a href="/makale/{{$l_makale->slug}}">
                                    <img src="{{asset($l_makale->cover)}}" class="img-fluid">
                                    <span class="onceki">ÖNCEKİ SOHBET</span>
                                </a>
                            @endif
                        </div>
                        <div class="col-lg-6 position-relative">
                            @if(isset($n_makale))
                                <a href="/makale/{{$n_makale->slug}}">
                                    <img src="{{asset($n_makale->cover)}}" class="img-fluid">
                                    <span class="sonraki">SONRAKİ SOHBET</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <hr>


                </div>

                <div id="comments" class="comments-area">
                    <ol class="comment-list" style="height: auto !important;">
                        @if($makale->comment!="")
                        @foreach($makale->comment as $comment)
                        <li id="comment-{{$comment->id}}" class="comment odd alt thread-odd thread-alt depth-1">
                            <article id="div-comment-{{$comment->id}}" class="comment-body">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt=""
                                             src="https://secure.gravatar.com/avatar/80ce3e508289601a8aeb1645bb53e25f?s=32&amp;d=mm&amp;r=g"
                                             srcset="https://secure.gravatar.com/avatar/80ce3e508289601a8aeb1645bb53e25f?s=64&amp;d=mm&amp;r=g 2x"
                                             class="avatar avatar-32 photo" height="32" width="32" loading="lazy"
                                             decoding="async"> <b class="fn">{{$comment->name}}</b> <span
                                            class="says">dedi ki:</span></div><!-- .comment-author -->

                                    <div class="comment-metadata">

                                            <time datetime="{{$comment->created_at->format('d/m/Y H:i')}}">{{$comment->created_at->format('d/m/Y H:i')}}</time>
                                  </div><!-- .comment-metadata -->

                                </footer><!-- .comment-meta -->

                                <div class="comment-content">
                                    <p>{{$comment->comment}}</p>
                                </div><!-- .comment-content -->

                            </article><!-- .comment-body -->
                        </li><!-- #comment-## -->
                        @endforeach
                        @endif
                    </ol>
                    <div id="respond" class="comment-respond">
                        <div id="reply-title" class="comment-reply-title">Bir cevap yazın</div>
                        <form action="{{route('postcomment',$makale->id)}}" method="post" class="comment-form">
                            <p class="comment-notes"><span id="email-notes">E-posta hesabınız yayımlanmayacak.</span>
                                <span class="required-field-message">Gerekli alanlar <span class="required">*</span> ile işaretlenmişlerdir</span>
                            </p>
                            <p class="comment-form-comment"><label for="comment">Yorum <span
                                        class="required">*</span></label> <textarea id="comment" name="comment"
                                                                                    cols="45" rows="8" maxlength="65525"
                                                                                    required></textarea></p>
                            <p class="comment-form-author"><label for="author">İsim <span
                                        class="required">*</span></label> <input id="author" name="name" type="text"
                                                                                 value="" size="30" maxlength="245"
                                                                                 autocomplete="name" required/></p>
                            <p class="comment-form-email"><label for="email">E-posta <span
                                        class="required">*</span></label> <input id="email" name="mail" type="email"
                                                                                 value="" size="30" maxlength="100"
                                                                                 aria-describedby="email-notes"
                                                                                 autocomplete="email" required/></p>
                            <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
                                                          value="Yorum gönder"/>
                            </p>

                        </form>
                    </div><!-- #respond -->

                </div><!-- #comments -->
                @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>

            <div class="col-lg-4">
                <div class="title-box d-flex bg-top-2 justify-content-center align-items-center p-2 fw-bold">
                    Benzer Sohbetler
                </div>

                <div class="related-article my-3">
                    <ul class="sidebar-item">

                        @foreach($related as $article)

                            <li>
                                <div class="item">
                                    <a href="{{asset("makale/".$article->slug)}}" title="{{$article->title}}" rel="bookmark">
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
                        @endforeach
                    </ul>

                </div>
            {{-- Benzer Videolar --}}
                <div class="title-box d-flex bg-top-2 justify-content-center align-items-center p-2 fw-bold">
                    Benzer Videolar
                </div>

                <div class="related-article my-3">
                    <ul class="sidebar-item">

                    @foreach($relatedvideo as $article)

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
