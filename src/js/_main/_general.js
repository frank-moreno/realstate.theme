
var $ = jQuery;

$(document).ready(function () {

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

