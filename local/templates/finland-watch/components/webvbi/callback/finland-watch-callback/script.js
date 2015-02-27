
 jQuery('a.call_btn').click(function(event){
 jQuery('#overlay').fadeIn(500);
 jQuery('#form_wrapper_call').show();
 //ajustScrollTop('#form_wrapper_call');
 event.preventDefault();
 });

 // закрываем блоки с формами
 jQuery('span.wr_close').click(function(event){
 jQuery('#overlay').fadeOut(500);
 jQuery(this).parents('#form_wrapper_call').hide();
 event.preventDefault();
 });

jQuery.noConflict();
(function ($) {
    //alert('it works!');
    // поля формы фокус
    jQuery('#v_name').on('focus', function () {
        if (jQuery(this).val() == '' || jQuery(this).val() == 'Введите ФИО' || jQuery(this).val() == 'Поле ФИО не заполнено!') jQuery(this).val('').css({
            'color': '#b4b4b4',
            'border-color': '#b4b4b4'
        });
    });
    jQuery('#v_phone').on('focus', function () {
        if (jQuery(this).val() == '' || jQuery(this).val() == 'Введите телефон' || jQuery(this).val() == 'Поле Телефон не заполнено!') jQuery(this).val('').css({
            'color': '#b4b4b4',
            'border-color': '#b4b4b4'
        });
    });
    jQuery('#v_time').on('focus', function () {
        if (jQuery(this).val() == '' || jQuery(this).val() == 'Удобное время для звонка' || jQuery(this).val() == 'Поле не заполнено!') jQuery(this).val('').css({
            'color': '#b4b4b4',
            'border-color': '#b4b4b4'
        });
    });
    jQuery('#v_mess').on('focus', function () {
        if (jQuery(this).val() == '' || jQuery(this).val() == 'Сообщение' || jQuery(this).val() == 'Поле Сообщение не заполнено!') jQuery(this).val('').css({
            'color': '#b4b4b4',
            'border-color': '#b4b4b4'
        });
    });

    jQuery('#call_ord').on('submit', function (event) {
        var canSend = 1;

        if (jQuery('#v_name').val() == '') {
            jQuery('#v_name').css({'border': '1px solid #f00', 'color': '#f00'});
            canSend = 0;
        }
        if (jQuery('#v_phone').val() == '') {
            jQuery('#v_phone').css({'border': '1px solid #f00', 'color': '#f00'});
            canSend = 0;
        }
        if (jQuery('#v_time').val() == 'Удобное время для звонка') {
            jQuery('#v_time').css({'border': '1px solid #f00', 'color': '#f00'}).val('Поле не заполнено!');
            canSend = 0;
        }
        if (jQuery('#v_mess').val() == '') {
            jQuery('#v_mess').css({'border': '1px solid #f00', 'color': '#f00'});
            canSend = 0;
        }

        if (canSend != 0) {
            //подготавливаем и отправляем данные…

            var form = jQuery(this);
            var url = form.attr('action');

            var type = jQuery(this).attr('id');
            var sessid = jQuery('#sessid').val();
            var name = jQuery('#v_name').val();
            var phone = jQuery('#v_phone').val();
            var time = jQuery('#v_time').val();
            var usemess = jQuery('#use_mess').val();
            var message = jQuery('#v_mess').val();
            var captcha_sid = jQuery('#captcha_sid').val();
            var captcha_word = jQuery('#captcha_word').val();
            var PARAMS_HASH = jQuery('#PARAMS_HASH').val();

            // если поле Сообщение активно
            if (typeof message !== 'undefined') {
                jQuery.post(url,
                    {
                        form_type: type,
                        sessid: sessid,
                        v_name: name,
                        v_phone: phone,
                        v_time: time,
                        v_mess: message,
                        captcha_sid: captcha_sid,
                        captcha_word: captcha_word,
                        PARAMS_HASH: PARAMS_HASH
                    },
                    function (data) {
                        form.parent('#inline').empty().html(data);
                    }
                );
            }
            else {
                jQuery.post(url,
                    {
                        form_type: type,
                        sessid: sessid,
                        v_name: name,
                        v_phone: phone,
                        v_time: time,
                        captcha_sid: captcha_sid,
                        captcha_word: captcha_word,
                        PARAMS_HASH: PARAMS_HASH
                    },
                    function (data) {
                        form.parent('#inline').empty().html(data);
                    }
                );
            }
            event.preventDefault();
        }
        else {
            return false;
        }

    });
})(jQuery);