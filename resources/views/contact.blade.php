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

    <div class="col-lg-12 search-results m-2">
        <!-- Wrapper container -->
        <div class="container py-4">

            <!-- Bootstrap 5 starter form -->
            <form id="contactForm">

                <!-- Name input -->
                <div class="mb-3">
                    <label class="form-label" for="name">Adınız Soyadız</label>
                    <input class="form-control" id="name" type="text" placeholder="Adınız Soyadız" />
                </div>

                <!-- Email address input -->
                <div class="mb-3">
                    <label class="form-label" for="emailAddress">Mail Adresiniz</label>
                    <input class="form-control" id="emailAddress" type="email" placeholder="Mail Adresiniz" />
                </div>

                <!-- Message input -->
                <div class="mb-3">
                    <label class="form-label" for="message">Mesajınız</label>
                    <textarea class="form-control" id="message" type="text" placeholder="Mesajınız" style="height: 10rem;"></textarea>
                </div>

                <!-- Form submit button -->
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Gönder</button>
                </div>

            </form>

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
