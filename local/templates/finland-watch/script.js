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
function init() {
    var geolocation = ymaps.geolocation;
    if (geolocation) {
        jQuery("a.modal-city").html(/*geolocation.country + ', ' + geolocation.region + ', ' + */geolocation.city);
    } else {
        console.log('Не удалось установить местоположение');
    }
}
jQuery(document).ready(function () {
    var city_cookie = jQuery.cookie('city');
    if (!!city_cookie) {
        jQuery('a.modal-city').html(city_cookie)
    }
    else {
        ymaps.ready(init);
    }
    jQuery('.modal-city').fancybox({
        afterShow: function () {
            jQuery('.city').on('click', function (e) {
                e.preventDefault();
                jQuery.fancybox.close();
                var current_city = jQuery(this).html();
                jQuery('a.modal-city').html(current_city);
                jQuery.cookie('city', current_city, {
                    expires: 365,
                    path: '/'
                });
            })
        }
    });

    jQuery('.fancybox').fancybox();


    jQuery('.two-cleek').fancybox();

    var recCallback = function () {
        jQuery("#callback_form_submit").on('click', function (e) {
            e.preventDefault();
            var msg = jQuery('#callback_form').serialize();
            jQuery.ajax({
                type: 'POST',
                url: '/ajax/callback.php',
                data: msg,
                success: function (data) {
                    jQuery('.fancybox-inner').html(data).height('auto').width('auto');

                    recCallback();
                },
                error: function (xhr, str) {
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });
        })
    }

    jQuery(".modalbox").fancybox({
        type: 'ajax',
        afterShow: recCallback
    });

    jQuery(".modalbox-two").fancybox();
    jQuery(".modal-card").fancybox({
            afterShow: function () {
                MagicScroll.init();
                MagicZoomPlus.start();
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

    jQuery('.basket-home, .link-sm a.add_to_basket, .link-buy').on('click', function (e) {
        e.preventDefault();
        add2basket(jQuery(this).attr('id'));
    })
});
var add2basketUrl = '/personal/cart/add2basket.php';
function add2basket(id) {
    id = parseInt(id);
    var basketParams = {"ID": id}
    BX.ajax.loadJSON(
        add2basketUrl,
        basketParams,
        BasketResult
    );
}

function BasketResult(arResult) {
    if (arResult.STATUS === 'OK') {
        BX.onCustomEvent('OnBasketChange');
        window.location = "/personal/cart/?backurl=" + window.location.pathname;
    }
    else alert(arResult.ERROR)
}
