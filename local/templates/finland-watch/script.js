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
    jQuery('.fancybox').fancybox();
    jQuery('.modal-city').fancybox();
    jQuery('.one-cleek').fancybox();
    jQuery('.two-cleek').fancybox();
    jQuery(".modalbox").fancybox();
    jQuery(".modalbox-two").fancybox();
    jQuery(".modal-card").fancybox();
    jQuery(".modal-login").fancybox();
});

<!-- Стильный селект -->
(function(jQuery) {
    jQuery(function() {
        jQuery('select').styler({
            //selectSearch: true
        });
    });
})(jQuery);

jQuery(document).ready(function(){

    /* слайдер цен */

    jQuery("#slider").slider({
        min: 0,
        max: 50000,
        values: [0,50000],
        range: true,
        step: 100,
        stop: function(event, ui) {
            jQuery("input#minCost").val(jQuery("#slider").slider("values",0));
            jQuery("input#maxCost").val(jQuery("#slider").slider("values",1));

        },
        slide: function(event, ui){
            jQuery("input#minCost").val(jQuery("#slider").slider("values",0));
            jQuery("input#maxCost").val(jQuery("#slider").slider("values",1));
        }
    });

    jQuery("input#minCost").change(function(){

        var value1=jQuery("input#minCost").val();
        var value2=jQuery("input#maxCost").val();

        if(parseInt(value1) > parseInt(value2)){
            value1 = value2;
            jQuery("input#minCost").val(value1);
        }
        jQuery("#slider").slider("values",0,value1);
    });


    jQuery("input#maxCost").change(function(){

        var value1=jQuery("input#minCost").val();
        var value2=jQuery("input#maxCost").val();

        if (value2 > 50000) { value2 = 50000; jQuery("input#maxCost").val(50000)}

        if(parseInt(value1) > parseInt(value2)){
            value2 = value1;
            jQuery("input#maxCost").val(value2);
        }
        jQuery("#slider").slider("values",1,value2);
    });

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

});


