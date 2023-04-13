import 'bootstrap'
import 'owl.carousel'
import axios from 'axios'
import { createApp } from 'vue';
import slider from "./slider.vue";
const app=createApp({});
app.component('slyt',slider);
app.mount('#app');
$(document).ready(function () {

    var sync1 = $("#sync1");
    var sync1mobile = $("#sync1mobile");
    var slidesPerPage = 3; //globaly define number of elements per page
    var syncedSecondary = true;
    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: false,
        dots: true,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<span class="fas fa-chevron-circle-left fa-2x"></span>', '<span class="fas fa-chevron-circle-right fa-2x"></span>'],
    });
    sync1mobile.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<span class="fas fa-chevron-circle-left fa-2x"></span>', '<span class="fas fa-chevron-circle-right fa-2x"></span>'],
    });
});


$("#search-blog").hide();

$(".search-button").click(function () {

    $("#search-blog").slideToggle("normal");
    return false;
});

$(document).ready(function () {
    $(".search-button-result").click(function () {

        var lang = wiy_page_data["Dil"];
        var tbl = wiy_page_data["DilAnah"];
        var query = $("#typeahead").val();

        window.location.href = "/arama-sonuclari/" + query;

    });
    $("#buttonSearch").click(function () {


        var query = $("#querymobile").val();

        window.location.href = "/arama-sonuclari/" + query;

    });

    $("#contactFormPost").click(function () {

        const formData = new FormData();
        var message = $("#message").val();
        var name = $("#name").val();
        var emailAddress = $("#emailAddress").val();

        formData.append('message', message);
        formData.append('name', name);
        formData.append('emailAddress', emailAddress);
        const {data} = axios.post('iletisim', formData, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                }
            }
        ).then((reponse)=>{
            if (reponse.data.success=="success"){
                $("#contactForm").hide();
                $("#response").html('Mesajınız Başarı ile Gönderildi...');
            }else{
                $("#contactForm").hide();
                $("#response").html('Mesajınız Gönderilirken Sorun Oluştu Lütfen Tekrar Deneyiniz...');
            }
            console.log(reponse);
        })
        return false;
    });
});

$(document).ready(function () {
    $('#search_form').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var query = $("#typeahead").val();
            location.href = "/arama-sonuclari/" + query;
            return false;

        }
    });
});

function htmlTableOfContents(documentRef) {
    var documentRef = documentRef || document;
    var toc = documentRef.getElementById('toc');
    var headings = [].slice.call(documentRef.body.querySelectorAll('.content > h1, .content > h2, .content > h3, .content > h4, .content > h5, .content > h6'));
    headings.forEach(function (heading, index) {
        var anchor = documentRef.createElement('a');
        anchor.setAttribute('name', 'toc' + index);
        anchor.setAttribute('id', 'toc' + index);

        var link = documentRef.createElement('a');
        link.setAttribute('href', '#toc' + index);
        link.textContent = heading.textContent;

        var div = documentRef.createElement('li');
        div.setAttribute('class', heading.tagName.toLowerCase());

        div.appendChild(link);
        toc.appendChild(div);
        heading.parentNode.insertBefore(anchor, heading);
    });
}

htmlTableOfContents();

