<?php
/**
 * Created by PhpStorm.
 * User: Шамиль
 * Date: 26.02.2015
 * Time: 10:31
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

?>

<div class="buy-one-cleek">
    <div class="clock-block">
        <img src="<?= $_REQUEST['picture'] ?>" width="219" height="219" title="" alt=""/>

        <p class="clock">Часы Suunto <br/><?= $_REQUEST['name'] ?></p>

        <p class="modal-summ"><?= $_REQUEST['price'] ?><span class="rouble">a</span></p>
    </div>

        <? $APPLICATION->IncludeComponent("bitrix:main.feedback", "finland-watch-oneclick", Array(
                "USE_CAPTCHA" => "Y",
                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                "EMAIL_TO" => "my@email.com",
                "REQUIRED_FIELDS" => Array("NAME", "EMAIL", "MESSAGE"),
                "EVENT_MESSAGE_ID" => Array("5")
            )
        ); ?>
    <div class="clear"></div>
</div>
