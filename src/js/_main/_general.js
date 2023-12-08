
var $ = jQuery;

$(document).ready(function () {

    // add class on scroll down to add styles to header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
    }
    );

    // add class to homepages header to add styles to header

    if ($('body').hasClass('home')) {
        $('.wp-block-navigation__responsive-container ul li').addClass('homepage-menu');
        $('.wp-block-site-title a').addClass('homepage-logo');
    }

    $(window).scroll(startCounter);

    function startCounter() {
    let scrollY = (window.pageYOffset || document.documentElement.scrollTop) + window.innerHeight;
    let divPos = document.querySelector('#counter-box').offsetTop;

    if (scrollY > divPos) {
        $(window).off("scroll", startCounter);

        $('.count').each(function() {
        var $this = $(this);
        jQuery({
            Counter: 0
        }).animate({
            Counter: $this.text().replace(/,/g, '')
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
            $this.text(commaSeparateNumber(Math.floor(this.Counter)));
            },
            complete: function() {
            $this.text(commaSeparateNumber(this.Counter));
            //alert('finished');
            }
        });
        });

        function commaSeparateNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
    }

});

