<?php
/**
 * Created by PhpStorm.
 * User: Шамиль
 * Date: 26.02.2015
 * Time: 10:31
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

?><!-- Заказать обратный звонок -->
<?$APPLICATION->IncludeComponent(
    "webvbi:main.feedback",
    "finland-watch-callback",
    array(
        "USE_CAPTCHA" => "N",
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "EMAIL_TO" => "sharapudinov@mail.ru",
        "USE_MESSAGE_FIELD" => "Y",
        "SAVE_FORM_DATA" => "Y",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "MESSAGE",
        ),
        "EVENT_MESSAGE_ID" => "7"
    ),
    false
);?>
<!-- Заказать обратный звонок конец -->