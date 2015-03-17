<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arParams);

$APPLICATION->AddHeadScript($templateFolder . "script.js");
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<!-- Заказать обратный звонок -->
<div id="inline" class="feedback">

    <h1 class="tetle-feedback">Заказать обратный звонок</h1>




        <p><?
            if (strlen($arResult["OK_MESSAGE"]) > 0) {
                ?>
                <?= $arResult["OK_MESSAGE"] ?><?
                die();
            }

            if (!empty($arResult["ERROR_MESSAGE"])) {
                foreach ($arResult["ERROR_MESSAGE"] as $v){
                    echo " <div class='error'>" ;
                    ShowError($v);
                    echo '</div>';
                }

            } else {?>
             <p class="text-feedback">Заполните форму и мы обязательно свяжемся с вами!</p>
            <?}?>

            </p>

    <form id="callback_form" name="callback_form" action="/ajax/callback.php" method="post">
        <?= bitrix_sessid_post() ?>

        <input type="hidden" name="submit" value="отпр">

        <p><label for="user_name">Введите Ваше имя</label><br/>
            <input type="text" name="user_name" value="<?= $arResult["AUTHOR_NAME"] ?>" class="txt">

        <p><label for="MESSAGE">Введите телефон</label><span class="red">*</span><br/>
            <input type="text" name="MESSAGE" placeholder="+7 (___) ___-__-__" class="txt"/>
        </p>

        <p>
            <label for="user_email">Ваш E-mail</label><br/>
            <input type="text" name="user_email" value="<?= $arResult["AUTHOR_EMAIL"] ?>" class="txt"/>
        </p>

        <p>

            <label for="email">Удобное время для звонка</label><br/>
            <input type="text" name="name" class="txt" placeholder="с   ___-___   до   ___-___"/>
        </p>

        <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
            <div class="mf-captcha">
                <div class="mf-text"><?= GetMessage("MFT_CAPTCHA") ?></div>
                <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>" width="180" height="40"
                     alt="CAPTCHA">

                <div class="mf-text"><?= GetMessage("MFT_CAPTCHA_CODE") ?><span class="mf-req">*</span></div>
                <input type="text" name="captcha_word" size="30" maxlength="50" value="">
            </div>
        <? endif; ?>
        <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">


        <p class="text-feedback submit"><input id="callback_form_submit" type="submit" name="" value="отправить"/></p>

        <div class="clear"></div>
    </form>
    <p class="text-feedback">или позвоните нам по телефону<br/>
        <span class="phone">+7 (495) 597-79-00</span></p>
</div>


</div>
