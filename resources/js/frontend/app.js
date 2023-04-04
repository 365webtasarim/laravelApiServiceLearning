import 'bootstrap'
import 'owl.carousel'
var htmlTableOfContents = require('html-table-of-contents');



$(document).ready(function(){

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

htmlTableOfContents();



