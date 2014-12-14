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
    var city_cookie=jQuery.cookie('city');
    if (city_cookie) jQuery('a.modal-city').html(city_cookie);
    jQuery('.fancybox').fancybox();
    jQuery('.modal-city').fancybox({
        hideOnContentClick: false,
        afterShow: function(){
            jQuery('.city').on('click',function(e){
                e.preventDefault();
                jQuery.fancybox.close();
                var current_city=jQuery(this).html();
                jQuery('a.modal-city').html(current_city);
                jQuery.cookie('city', current_city, {
                    expires: 365
                });
            })
        }
    });
    jQuery('.one-cleek').fancybox();
    jQuery('.two-cleek').fancybox();
    jQuery(".modalbox").fancybox();
    jQuery(".modalbox-two").fancybox();
    jQuery(".modal-card").fancybox();
    jQuery(".modal-login").fancybox();
});



jQuery(document).ready(function(){


// фильтрация ввода в поля
    jQuery('input#minCost, input#minCost').keypress(function(event){
        var key, keyChar;
        if(!event) var event = window.event;

        if (event.keyCode) key = event.keyCode;
        else if(event.which) key = event.which;

        if(key==null || key==0 || key==8 || key==13 || key==9 || key==46 || key==37 || key==39 ) return true;
        keyChar=String.fromCharCode(key);

        if(!/\d/.test(keyChar))	return false;

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

});


