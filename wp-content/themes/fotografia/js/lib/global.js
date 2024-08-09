jQuery.noConflict();
jQuery(document).ready(function ($) {

    $('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		const el = $($(this).attr('href'));
		el.length && $('html, body').animate({ scrollTop: el.offset().top - 90 }, 500);
		return false;
	});
    
    $(window).scroll(function () {
        if ($(window).scrollTop() > 10) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });  
    $(window).scroll();
  
      // Swiper Hero
      var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });


    //Animacion
    function buildwaypoints() {
        $('[data-waypoint]').each(function () {
            let options = {
                threshold: 0,
                rootMargin: '-' + ( $(this).data('waypoint') ? $(this).data('waypoint') : .25 ) * 100 + '% 0px'
            } 
            if ( this.waypointObserver ) this.waypointObserver.disconnect();
            this.waypointObserver = new IntersectionObserver((entries, observer) => {
                let element = entries[0].target;
                if (entries[0].isIntersecting) {
                    $( element ).addClass('in').removeAttr('data-waypoint');
                    if ( $(element).data('function') ) {
                        window[ $(element).data('function') ]();
                    }
                    element.waypointObserver.disconnect();
                }
            }, options);
            this.waypointObserver.observe( $(this)[0] );
        });
    }

    $(window).on('resize',function () {
        buildwaypoints();
    });

    $('[data-in]').each(function () {
        var t = this; 
        setTimeout(() => {
            jQuery(t).addClass('in');
            if ( $(t).data('function') ) {
                window[ $(t).data('function') ]();
            }
        }, $(this).data('in'));
    });

    var CSSloadcheck = setInterval(function () {
        if ( $('html').css('box-sizing') == 'border-box') {
            buildwaypoints();
            clearInterval(CSSloadcheck);
        }
    }, 100);
});