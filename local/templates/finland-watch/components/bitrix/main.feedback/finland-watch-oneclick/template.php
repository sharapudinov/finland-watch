<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="form-block">
    <h1 class="h-one">Купить в один клик</h1>
    <p class="top-text">Заполните форму и мы обязательно свяжемся с вами!</p>
    <? if (!empty($arResult["ERROR_MESSAGE"])) {
        foreach ($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
    }
    if (strlen($arResult["OK_MESSAGE"]) > 0) {
        ?>
        <div class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div><?
    }
    ?>

    <form action="<?= POST_FORM_ACTION_URI ?>" method="POST">
        <?= bitrix_sessid_post() ?>
        <p><label>Введите Ваше имя:</label><br/>
            <input type="text" name="user_name" value="<?= $arResult["AUTHOR_NAME"] ?>">
        </p>

        <p><label>Введите e-mail: <span class="red">*</span></label><br/>
            <input type="text" name="user_email" value="<?= $arResult["AUTHOR_EMAIL"] ?>"
            placeholder="info@mail.ru"/>
        </p>

        <p><label>Введите телефон: <span class="red">*</span></label><br/>
            <input type="text" name="MESSAGE" placeholder="+7 (___) ___-__-__"/>
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
        <p class="button-submit"><input type="submit" name="submit" value="отпр" /></p>
    </form>

    <div class="clear"></div>
</div>