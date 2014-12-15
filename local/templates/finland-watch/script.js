jQuery.noConflict();
jQuery(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() != 0) {
            jQuery('#toTop').fadeIn();
        } else {
            jQuery('#toTop').fadeOut();
        }
    });
    jQuery('#toTop').click(function () {
        jQuery('body,html').animate({scrollTop: 0}, 800);
    });

});

jQuery(document).ready(function () {
    var city_cookie = jQuery.cookie('city');
    if (city_cookie) jQuery('a.modal-city').html(city_cookie);
    jQuery('.modal-city').fancybox({
        afterShow: function () {
            jQuery('.city').on('click', function (e) {
                e.preventDefault();
                jQuery.fancybox.close();
                var current_city = jQuery(this).html();
                jQuery('a.modal-city').html(current_city);
                jQuery.cookie('city', current_city, {
                    expires: 365
                });
            })
        }
    });

    jQuery('.fancybox').fancybox();

    jQuery('.one-cleek').fancybox();
    jQuery('.two-cleek').fancybox();
    jQuery(".modalbox").fancybox();
    jQuery(".modalbox-two").fancybox();
    jQuery(".modal-card").fancybox({
            afterShow: function () {
                jQuery('#lofslidecontent45').lofJSidernews({
                    interval: 2000,
                    //easing:'easeOutBounce',
                    duration: 0,
                    maxItemDisplay: 4,
                    navigatorHeight: 75,
                    navigatorWidth: 90,
                    auto: false
                });
                jQuery('.accordion-tabs').children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
                jQuery('.accordion-tabs').on('click', 'li > a', function (event) {
                    if (!jQuery(this).hasClass('is-active')) {
                        event.preventDefault();
                        jQuery('.accordion-tabs .is-open').removeClass('is-open').hide();
                        jQuery(this).next().toggleClass('is-open').toggle();
                        jQuery('.accordion-tabs').find('.is-active').removeClass('is-active');
                        jQuery(this).addClass('is-active');
                    } else {
                        event.preventDefault();
                    }
                });
                var jcarousel = jQuery('.jcarousel.slider-two');

                jcarousel
                    .on('jcarousel.slider-two:reload jcarousel.slider-two:create', function () {
                        var width = jcarousel.innerWidth();

                        //if (width >= 600) {
                        //  width = width / 4;
                        //} else if (width >= 350) {
                        //    width = width / 2;
                        // }

                        jcarousel.jcarousel('items').css('width', width + 'px');
                    })
                    .jcarousel({
                        wrap: 'circular'
                    });

                jQuery('.jcarousel-control-prev')
                    .jcarouselControl({
                        target: '-=1'
                    });

                jQuery('.jcarousel-control-next')
                    .jcarouselControl({
                        target: '+=1'
                    });

                jQuery('.jcarousel-pagination')
                    .on('jcarouselpagination:active', 'a', function () {
                        jQuery(this).addClass('active');
                    })
                    .on('jcarouselpagination:inactive', 'a', function () {
                        jQuery(this).removeClass('active');
                    })
                    .on('click', function (e) {
                        e.preventDefault();
                    })
                    .jcarouselPagination({
                        perPage: 1,
                        item: function (page) {
                            return '<a href="#' + page + '">' + page + '</a>';
                        }
                    });
            }
        }
    );
    jQuery(".modal-login").fancybox();
});


jQuery(document).ready(function () {


// фильтрация ввода в поля
    jQuery('input#minCost, input#minCost').keypress(function (event) {
        var key, keyChar;
        if (!event) var event = window.event;

        if (event.keyCode) key = event.keyCode;
        else if (event.which) key = event.which;

        if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39) return true;
        keyChar = String.fromCharCode(key);

        if (!/\d/.test(keyChar))    return false;

    });

    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() != 0) {
                jQuery('#phone-top').fadeIn();
            } else {
                jQuery('#phone-top').fadeOut();
            }
        });
        /*jQuery('#toTop').click(function() {
         jQuery('body,html').animate({scrollTop:0},800);
         });*/

    });

    jQuery('.basket-home, .link-sm a').on('click',function(e){
        e.preventDefault();
        add2basket(jQuery(this).attr('id'));
    })
});
var add2basketUrl='/personal/cart/add2basket.php';
function add2basket(id){
    id=parseInt(id);
    var basketParams={"ID": id}
    BX.ajax.loadJSON(
        add2basketUrl,
        basketParams,
        BasketResult
    );
}

function BasketResult(arResult){
    if (arResult.STATUS === 'OK')
    {
        BX.onCustomEvent('OnBasketChange');
    }
    else alert (arResult.ERROR)
}
