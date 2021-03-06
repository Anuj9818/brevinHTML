$(document).ready(function () {

//Hover Menu Dropdown in Bootstrap

    jQuery('ul.navbar-nav li.dropdown').hover(function () {

        jQuery(this).find('.dropdown-menu').stop(true, true).show();

        jQuery(this).addClass('open');

    }, function () {

        jQuery(this).find('.dropdown-menu').stop(true, true).hide();

        jQuery(this).removeClass('open');

    });

// Scroll to top

    $(window).scroll(function () {

        if ($(this).scrollTop() > 100) {

            $('.scrollup').fadeIn();

        } else {

            $('.scrollup').fadeOut();

        }

    });



    $('.scrollup').click(function () {

        $("html, body").animate({

            scrollTop: 0

        }, 600);

        return false;

    });



    $(".slide-toggle").click(function () {

        $(".box").animate({

            width: "toggle"

        });

    });



});



// Banner

$('.owl-carousel1').owlCarousel({

    loop: true,

    margin: 0,

    nav: false,

    dots: false,

    autoplay: true,

    video: true,

    lazyLoad: true,

    center: true,

    videoHeight: 450,

    videoWidth: 100 + '%',

    // navText: ["<span class='icon icon-arrow-left7 hvr-forward'></span>", "<span class='icon icon-arrow-right7 hvr-backward'></span>"],

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 1

        }

    }

});

$('.owl-carousel2').owlCarousel({

    loop: true,

    margin: 30,

    nav: true,

    dots: false,

    autoplay: true,

    lazyLoad: true,

    center: true,

    navText: ["<span class='fa fa fa-arrow-circle-left'></span>","<span class='fa fa-arrow-circle-right'></span>"],

    responsive: {

        0: {

            items: 2

        },

        600: {

            items: 2

        },

        1000: {

            items: 2

        }

    }

});



$(document).ready(function() {

	

	setTimeout(function(){

		$('body').addClass('loaded');

		//$('h1').css('color','#222222');

	}, 3000);

	

});

$('body').toggleClass('loaded');



// Fixed menu

$("header").waypoint(function () {

    $(".btm-header").toggleClass("navbar-fixed-top ");

    $(".btm-header.js-toggleClass").toggleClass("js-toggleClass");

    return false;

}, {offset: '-0.1px'});



$(document).ready(function () {



    // video controls

    $('#state').on('click', function () {

        var video = $('#my-video').get(0);

        var icons = $('#state > span');

        $('#overlay').toggleClass('fadev');

        if (video.paused) {

            video.play();

            icons.removeClass('fa-play').addClass('fa-pause');

        } else {

            video.pause();

            icons.removeClass('fa-pause').addClass('fa-play');

        }

    });

});

// Counter animation

// inViewport jQuery plugin

// http://stackoverflow.com/a/26831113/383904

$(function ($, win) {

    $.fn.inViewport = function (cb) {

        return this.each(function (i, el) {

            function visPx() {

                var H = $(this).height(),

                        r = el.getBoundingClientRect(), t = r.top, b = r.bottom;

                return cb.call(el, Math.max(0, t > 0 ? H - t : (b < H ? b : H)));

            }

            visPx();

            $(win).on("resize scroll", visPx);

        });

    };

}(jQuery, window));

jQuery(function ($) { // DOM ready and $ in scope



    $(".counter-no").inViewport(function (px) { // Make use of the `px` argument!!!

        // if element entered V.port ( px>0 ) and

        // if prop initNumAnim flag is not yet set

        //  = Animate numbers

        if (px > 0 && !this.initNumAnim) {

            this.initNumAnim = true; // Set flag to true to prevent re-running the same animation

            $(this).prop('Counter', 0).animate({

                Counter: $(this).text()

            }, {

                duration: 10000,

                step: function (now) {

                    $(this).text(Math.ceil(now));

                }

            });

        }

    });

});

// button aniamte move


// display year js
var yearDis = new Date().getFullYear();
document.getElementById("displayYear").innerHTML = yearDis;
