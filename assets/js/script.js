/********************************************************
 ThemeTim
 Version:   1.0
 ********************************************************/
jQuery(function(){

    /*******************************************************************************
     * Camera Slider Load
     *******************************************************************************/
    if (jQuery('.main-slider').length) {
        jQuery('.main-slider').camera({
            height: '50%',
            loader: 'bar',
            margin:'',
            alignment: 'center',
            minHeight: '600px',
            barPosition: 'top',
            thumbnails: true,
            playPause: false,
            loaderColor: '#f9f9f9',
            loaderBgColor: '#ddd',
            hover: true,
            opacityOnGrid: false
        });
    }
    /*******************************************************************************
     * Carousel Slider
     *******************************************************************************/
    if(jQuery('.related').length){
        jQuery('.related .products').owlCarousel({
            loop:true,
            margin:30,
            items:4,
            autoplay:false,
            animateOut: true,
            nav: true,
            navText: ["<span><i class='fa fa-angle-left fa-2x'></i></span>","<span><i class='fa fa-angle-right  fa-2x'></i></span>"],
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
                667:{
                    items:2
                },
                768:{
                    items:3
                },
                1024:{
                    items:4
                },
                1366:{
                    items:4
                }
            }

        });
    }
    if(jQuery('.thumbnails').length){
        jQuery('.images .thumbnails').owlCarousel({
            loop:true,
            margin:10,
            items:4,
            autoplay:true,
            nav: true,
            navText: ["<span><i class='fa fa-angle-left fa-2x'></i></span>","<span><i class='fa fa-angle-right  fa-2x'></i></span>"],
            responsiveClass:true,
            responsive:{
                0:{
                    items:2
                },
                480:{
                    items:3
                },
                667:{
                    items:4
                },
                768:{
                    items:4
                },
                1024:{
                    items:4
                },
                1366:{
                    items:4
                }
            }
        });
    }
    /*******************************************************************************
     * Brand Slider
     *******************************************************************************/

    if(jQuery('.brand-carousel').length){
        var brand = jQuery('.brand-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:3
                },
                768:{
                    items:4
                },
                1024:{
                    items:5
                },
                1366:{
                    items:6
                }
            }
        });
        jQuery('.next').click(function () {
            brand.trigger('next.owl.carousel', [1000]);
        });
        jQuery('.prev').click(function () {
            brand.trigger('prev.owl.carousel', [1000]);
        });
    }

    var head = jQuery( 'header' ).height();
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > head){
            jQuery('.header').addClass("sticky");
        }
        else{
            jQuery('.header').removeClass("sticky");
        }
    });
    /*******************************************************************************
     * Body Animation
     *******************************************************************************/
    if(jQuery('.animsition').length){
        jQuery(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 1500,
            outDuration: 800,
            linkElement: 'header a',
            // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
            loading: true,
            loadingParentElement: 'body', //animsition wrapper element
            loadingClass: 'animsition-loading',
            loadingInner: '', // e.g '<img src="loading.svg" />'
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: [ 'animation-duration', '-webkit-animation-duration'],
            // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
            // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
            overlay : false,
            overlayClass : 'animsition-overlay-slide',
            overlayParentElement : 'body',
            transition: function(url){ window.location.href = url; }
        });
    }
    /*******************************************************************************
     * Smooth Scroll
     *******************************************************************************/
    jQuery.srSmoothscroll({
        step: 95,
        speed: 600,
        ease: 'swing',
        target: jQuery('body'),
        container: jQuery(window)
    });

    /*******************************************************************************
     * Menu
     *******************************************************************************/

    var $ = jQuery;
    window.prettyPrint && prettyPrint();
    $(document).on('click', '.primary-menu .xs-dropdown-menu', function(e) {
        e.stopPropagation();
    });
    $('.primary-menu .xs-dropdown-menu').parent().hover(function() {
        var menu = $(this).find("ul");
        var menupos = $(menu).offset();
        if (menupos.left + menu.width() > $(window).width()) {
            var newpos = -$(menu).width();
            menu.css({ left: newpos });
        }
    });
    $(document).on('click', '.primary-menu .xs-angle-down', function(e) {
        e.preventDefault();
        $(this).parents('.xs-dropdown').find('.xs-dropdown-menu').toggleClass('active');
    });

});