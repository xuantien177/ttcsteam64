$(window).on("load", function() {
    "use strict";

    // Preloader
        //var prealoaderOption = $(window);
       // prealoaderOption.on("load", function () {
            var preloader = jQuery('.preloader');
            var preloaderArea = jQuery('.preloader');
            preloader.fadeOut();
            preloaderArea.delay(350).fadeOut('slow');
        //});

        //  $('.counter').counterUp({
        //     delay: 10,
        //     time: 1000
        // });


    // =============== SIDE PANEL FUNCTION ===================

    $(".side-panel-sec > a").on("click", function() {
        $(this).parent().toggleClass('active');
        return false;
    });

    $(".boxed-style").on("click", function() {
        $(".wrapper").addClass("boxed");
    });

    $(".full-width").on("click", function() {
        $(".wrapper").removeClass("boxed");
    });


    // =============== CART MENU FUNCTION ===================

    $(document).on('click','.cart-open',function (){
        $(".cart-dropdown").slideToggle();
    });
    // $(".cart-open").on("click", function() {
    //
    // });


    // =============== MOBILE MENU OPEN FUNCTION ===================

    $(".menu-btn, .mobile-men-btn > a").on("click", function() {
        $(".responsive-mobile-menu").addClass("active");
    });
    $(".close-menu-btn, html").on("click", function() {
        $(".responsive-mobile-menu").removeClass("active");
    });
    $(".menu-btn, .mobile-men-btn > a, .responsive-mobile-menu").on("click", function(e) {
        e.stopPropagation();
    });


    // =============== QUESTIONS TABS FUNCTIONALITY ===================

    $('.tbs-qs-list li').on("click", function() {
        var tab_id = $(this).attr('data-tab');
        $('.tbs-qs-list li').removeClass('active animated fadeOut');
        $('.tab-pane').removeClass('active animated fadeOut');
        $(this).addClass('active animated fadeIn');
        $("#" + tab_id).addClass('active animated fadeIn');
    });

    // =============== ACCORDING FUNCTION ===================

    $(".toggle").each(function() {
        $(this).find('.content').hide();
        $(this).find('h2:first').addClass('active').next().slideDown(500).parent().addClass("activate");
        $('h2', this).on("click", function() {
            if ($(this).next().is(':hidden')) {
                $(this).parent().parent().find("h2").removeClass('active').next().slideUp(500).removeClass('animated fadeInUp').parent().removeClass("activate");
                $(this).toggleClass('active').next().slideDown(500).addClass('animated fadeInUp').parent().toggleClass("activate");
            }
        });
    });


    // =============== MENU MAKING FUNCTION ===================

    $(".widget-categories ul ul, .responsive-mobile-menu ul ul").parent().addClass("menu-has-items");
    $(".widget-categories ul li.menu-has-items > a, .responsive-mobile-menu ul li.menu-has-items > a").on("click", function() {
        $(this).parent().toggleClass("active").siblings().removeClass("active");
        $(this).next("ul").slideToggle();
        $(this).parent().siblings().find("ul").slideUp();
        return false;
    });

    // =============== TABS FUNCTIONALITY ===================

    $('.descp-list ul li').on("click", function() {
        var tab_id = $(this).attr('data-tab');
        $('.descp-list ul li').removeClass('current');
        $('.description_text, .login-reg-form').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
    });


    // =============== PRODUCTS TABS FUNCTIONALITY ===================

    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }


    // =============== PRODUCTS TABS FUNCTIONALITY ===================

    $('.tabs-crumbs ul li').on("click", function() {
        var tab_id = $(this).attr('data-tab');
        $('.tabs-crumbs ul li').removeClass('current');
        $('.items-show-sec').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#" + tab_id).addClass('current animated fadeIn');
    });


    // =============== MENU HAS ITEMS CLASS ===================

    $("nav ul ul ul, .navigations ul ul ul, .navigation-links ul ul ul").parent().addClass("sub-items");


    // =============== SEARCH MENU OPEN FUNCTION ===================

    $(".open-search").on("click", function() {
        $(".search-page").addClass("active");
    });
    $(".close-search").on("click", function() {
        $(".search-page").removeClass("active");
    });


    // =============== GET HEIGHT OF DIV AND APPLY TO OTHER ===================

    if ($(window).width() > 991) {
        var feature_height = $(".feature-content-info").innerHeight();
        $(".feature-content-img").css({
            "height": feature_height
        });
    };

    // =============== SCROLL TOP FUNCTIONALITY ===================

    $('.scrollToTop').on("click", function() {
        $('html, body').animate({ scrollTop: 0 }, 600);
        return false;
    });

    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 700) {
            $(".scrollToTop").addClass("active");
        } else {
            $(".scrollToTop").removeClass("active");
        }
    });

    // =============== MASONARY SLIDER ===================

    $('.portfolio-carousel').slick({
        slidesToShow: 4,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 577,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    // =============== PARTNER LOGOS CAROUSEL SLIDER ===================

    $('.partner-carousel').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        autoplaySpeed: 1000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 577,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    // =============== FASHION CAROUSEL SLIDER ===================

    $('.fashion-carousel').slick({
        slidesToShow: 1,
        slck: true,
        slidesToScroll: 1,
        autoplay: true,
        dots: true,
        autoplaySpeed: 2000
    });

    // =============== ARRIVAL CAROUSEL SLIDER ===================

    $('.arrival-carousel').slick({
        slidesToShow: 3,
        slck: true,
        slidesToScroll: 2,
        autoplay: true,
        dots: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 577,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    // =============== TESTIMONiALS CAROUSEL SLIDER ===================

    $('.testimonial-carousel').slick({
        slidesToShow: 1,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000
    });

    // =============== ITEMS CAROUSEL SLIDER ===================

    $('.items-carousel').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        speed: 500,
        arrows: true,
        fade: true,
        cssEase: 'linear'
    });

    $('.items-thumb').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.items-carousel',
        dots: false,
        focusOnSelect: true,
        infinite: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


});