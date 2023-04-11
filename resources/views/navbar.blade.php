{{--Navbar--}}
<nav class="navbar  bg-top d-flex" id="desktop" >
    <div class="container justify-content-md-end justify-content-center">
        <span><i class="fas fa-envelope"></i> info@profdrhaydarbasenstitusu.org</span>
        <span class="ms-3 social-top">
            <a href="https://www.facebook.com/haydarbas.e" class="circle"><span><i class="fab fa-facebook-f"></i></span></a>
            <a href="https://twitter.com/haydarbas_e"><span><i class="fab fa-twitter"></i></span></a>
            <a href="https://www.instagram.com/haydarbas.e/"><span><i class="fab fa-instagram"></i></span></a>
            <a href="https://www.tiktok.com/@haydarbas.e"><span><i class="fab fa-tiktok"></i></span></a>
            <a href="https://www.youtube.com/channel/UChic02LYqebgOGju_jA7t7g"><span><i class="fab fa-youtube"></i></span></a>
            <a href="https://open.spotify.com/artist/0VzijyAg7UBeXeEhw0jzuy"><span><i class="fab fa-spotify"></i></span></a>
        </span>
    </div>
</nav>

<section id="search-blog" style="">
    <div class="container">
        <div class="form-group">
            <div id="search_form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input id="typeahead" type="text" name="query" class="form-control" onkeydown="searchs()" placeholder="Aranacak Kelimeyi Giriniz">


                    <a href="#" class="btn btn-primary search-button close-search">


                        <i class="fas fa-times"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>

<nav class="navbar navbar-expand-lg navbar-light bg-top-2">
    <div class="container">
        <a class="navbar-brand" href="/#"><img src="{{asset('image/logo.png')}}" class="img-fluid" alt=""></a>
        <a href="javascript:void(0)" class="menumobile" onclick="menumobile()"><img src="{{asset('image/menu.png')}}" id="mobile" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

               <!--- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">ENSTİTÜ</a>
                    <ul class="dropdown-menu bg-top-2">
                        <li><a class="dropdown-item" href="/">TÜZÜK</a></li>

                    </ul>
                </li> --->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">PROF. DR. HAYDAR BAŞ</a>
                    <ul class="dropdown-menu bg-top-2">
                        <li><a class="dropdown-item" href="/hayati">HAYATI</a></li>
                        <li><a class="dropdown-item" href="/kose-yazilari">KÖŞE YAZILARI</a></li>
                        <li class="nav-item">
                            <a class="dropdown-item"  aria-current="page" href="/kategori/fotograflari">FOTOĞRAFLARI</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">SOHBETLER</a>
                    <ul class="dropdown-menu bg-top-2">
                        <li><a class="dropdown-item" href="/kategori/dini-yasam">DİNİ YAŞAM</a></li>
                        <li><a class="dropdown-item" href="/kategori/sosyal-hayat">SOSYAL HAYAT</a></li>
                        <li><a class="dropdown-item" href="/kategori/ekonomi">EKONOMİ</a></li>
                        <li><a class="dropdown-item" href="/kategori/siyaset">SİYASET</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/videolar">VİDEOLAR</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/iletisim">İLETİŞİM</a>
                </li>
                <li id="mobile_search_menu" class="search-button search-bg" >
                    <a class="nav-link" aria-current="page" href="/#"><i class="fas fa-search"></i></a>
                </li>
            </ul>
        </div>

    </div>

</nav>


<div  id="mobileMenu" class="justify-content-center align-items-center flex-column">

    <p>
        <a href="javascript:void(0)" class="menumobile" onclick="menumobile()"> <img src="{{asset('image/close.png')}}" width="50" class="m-3" alt=""></a>
    </p>
   <div class="clearfix"></div>
    <div class="row">
        <fieldset>
            <div class="search">
                <div class="input-group mb-3">
                    <input type="text" id="querymobile" name="querymobile" class="form-control" class="form-control" placeholder="Ara">
                    <button class="btn btn-outline-secondary" type="button" id="buttonSearch"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </fieldset>
        <ul class="mobilemenu">

           <!---  <li class="dropdown">
                <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ENSTİTÜ</a>
                <ul class="dropdown-menu bg-top">
                    <li><a class="dropdown-item" href="/">TÜZÜK</a></li>

                </ul>
            </li>  ---!>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">PROF. DR. HAYDAR BAŞ</a>
                <ul class="dropdown-menu bg-top">
                    <li><a class="dropdown-item" href="/hayati">HAYATI</a></li>
                    <li><a class="dropdown-item" href="/kose-yazilari">KÖŞE YAZILARI</a></li>
                    <li class="">
                        <a class="dropdown-item" aria-current="page" href="/kategori/fotograflari">FOTOĞRAFLARI</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SOHBETLER</a>
                <ul class="dropdown-menu bg-top">
                    <li><a class="dropdown-item" href="/kategori/dini-yasam">DİNİ YAŞAM</a></li>
                    <li><a class="dropdown-item" href="/kategori/sosyal-hayat">SOSYAL HAYAT</a></li>
                    <li><a class="dropdown-item" href="/kategori/ekonomi">EKONOMİ</a></li>
                    <li><a class="dropdown-item" href="/kategori/siyaset">SİYASET</a></li>
                </ul>
            </li>
            <li class="">
                <a class="nav-link" aria-current="page" href="/videolar">VİDEOLAR</a>
            </li>

            <li class="">
                <a class="nav-link" aria-current="page" href="/iletisim">İLETİŞİM</a>
            </li>
        </ul>

    </div>


{{--    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">--}}

{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"--}}
{{--               data-bs-toggle="dropdown" aria-expanded="false">ENSTİTÜ</a>--}}
{{--            <ul class="dropdown-menu bg-top-2">--}}
{{--                <li><a class="dropdown-item" href="/">TÜZÜK</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"--}}
{{--               data-bs-toggle="dropdown" aria-expanded="false">PROF. DR. HAYDAR BAŞ</a>--}}
{{--            <ul class="dropdown-menu bg-top-2">--}}
{{--                <li><a class="dropdown-item" href="/hayati">HAYATI</a></li>--}}
{{--                <li><a class="dropdown-item" href="/kose-yazilari">KÖŞE YAZILARI</a></li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="dropdown-item"  aria-current="page" href="/kategori/fotograflari">FOTOĞRAFLARI</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" aria-current="page" href="/#" role="button"--}}
{{--               data-bs-toggle="dropdown" aria-expanded="false">SOHBETLER</a>--}}
{{--            <ul class="dropdown-menu bg-top-2">--}}
{{--                <li><a class="dropdown-item" href="/kategori/dini-yasam">DİNİ YAŞAM</a></li>--}}
{{--                <li><a class="dropdown-item" href="/kategori/sosyal-hayat">SOSYAL HAYAT</a></li>--}}
{{--                <li><a class="dropdown-item" href="/kategori/ekonomi">EKONOMİ</a></li>--}}
{{--                <li><a class="dropdown-item" href="/kategori/siyaset">SİYASET</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" aria-current="page" href="/videolar">VİDEOLAR</a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" aria-current="page" href="/iletisim">İLETİŞİM</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" aria-current="page" href="/#"><i class="fas fa-search"></i></a>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <div class="container d-flex flex-column justify-content-center text-center text-white m-4">
        <p>
            <span><i class="fas fa-envelope"></i> info@profdrhaydarbasenstitusu.org</span>
        </p>
        <p>
                <span class="ms-3 social-top">
            <a href="/" class="circle"><span><i class="fab fa-facebook-f"></i></span></a>
            <a href="/"><span><i class="fab fa-twitter"></i></span></a>
            <a href="/"><span><i class="fab fa-instagram"></i></span></a>
            <a href="/"><span><i class="fab fa-tiktok"></i></span></a>
            <a href="/"><span><i class="fab fa-youtube"></i></span></a>
            <a href="/"><span><i class="fab fa-spotify"></i></span></a>
        </span>
        </p>

    </div>
</div>
