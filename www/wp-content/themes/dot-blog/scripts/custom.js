(function ($) {
    'use strict';

    function slickNav() {

        $('#aside-menu-btn').sidr({
            side: 'right'
        });

        if(jQuery(".sf-menu").length != 0) {

           jQuery('.sf-menu').slicknav({
                prependTo: "#sidr",
               allowParentLinks:true
            });

            jQuery('ul.sf-menu').superfish();
        }
    }


    function initHoverClass() {
        jQuery('.blocks-slider .slide').on("mouseover", function () {
            if (jQuery(this).siblings().hasClass("active")) {
                jQuery(this).siblings().removeClass('active');
                jQuery(this).addClass("active");
            } else {
                jQuery(this).addClass("active");
            }
        });
    }

    function initFitVid() {
        jQuery(".videobox").fitVids();
    }


    function initAddClass() {
        jQuery(".icon-menu, .close").click(function (event) {
            event.preventDefault();
            jQuery("body").toggleClass("sidenav-active");
        });
    }

    function initSlickSlider() {

        jQuery('.image-slider').slick({
            dots: false,
            autoplay: true,
            arrows: true,
            adaptiveHeight: true
        });
        jQuery('.carousel').slick({
            dots: false,
            autoplay: true,
            arrows: true,
            adaptiveHeight: true
        });
        jQuery('.center-slider').slick({
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 3,
            speed: 400,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        centerMode: true,
                        centerPadding: '0',
                        adaptiveHeight: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

        jQuery('.slideshow').slick({
            fade: true,
            speed: 900,
            dots: false,
            arrows: false,
            infinite: true,
            asNavFor: '.switcher .switcher-mask'
        });
        jQuery('.switcher .switcher-mask').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slideshow',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {slidesToShow: 3}
                },
                {
                    breakpoint: 991,
                    settings: {slidesToShow: 2}
                },
                {
                    breakpoint: 767,
                    settings: {slidesToShow: 1}
                }
            ]
        });
    }

    function initTabs() {
        jQuery('header.tab-head').tabset({
            tabLinks: 'a',
            defaultTab: false
        });
    }

    function initbackTop() {
        var jQuerybackToTop = jQuery("#back-top");
        jQuery(window).on('scroll', function () {
            if (jQuery(this).scrollTop() > 100) {
                jQuerybackToTop.addClass('active');
            } else {
                jQuerybackToTop.removeClass('active');
            }
        });
        jQuerybackToTop.on('click', function (e) {
            jQuery("html, body").animate({scrollTop: 0}, 500);
        });
    }

    slickNav();
    initTabs();
    initFitVid();
    initbackTop();
    initAddClass();
    initHoverClass();

    jQuery(window).on('load', function () {
        jQuery(".loader-holder").hide();
        initSlickSlider();
        $('.sf-menu').slicknav('open');

    });


})(jQuery);