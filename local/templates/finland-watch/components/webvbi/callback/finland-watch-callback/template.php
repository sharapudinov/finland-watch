<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
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
<?CJSCore::Init(array("jquery"));?>


<pre><?//print_r($_SESSION["CMPT_PARAMS"]);?></pre>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
?>

<div id="inline" class="feedback">
    <h3 class="tetle-feedback"><?= GetMessage("MFT_HEADER") ?></h3>

    <p class="text-feedback">Заполните форму и мы обязательно свяжемся с вами!</p>

    <form id="call_ord" name="contact" action="<?=$componentPath?>/script/senddata.php" method="post">
        <?= bitrix_sessid_post() ?>
        <p><label for="v_name">Введите Ваше ФИО</label><br/>
            <input type="text" id="v_name" name="v_name" class="txt" placeholder="Иванов Иван Иванович"/></p>

        <p><label for="v_phone">Введите телефон</label><br/>
            <input id="v_phone" type="text" name="v_phone" class="txt" placeholder="+7 (___) ___-__-__"/></p>

        <p><label for="v_time">Удобное время для звонка</label><br/>
            <input id="v_time" type="text" name="v_time" class="txt" placeholder="с   ___-___   до   ___-___"/></p>
        <?if($arParams["USE_MESSAGE_FIELD"] == "Y"):?>
            <div>
                <textarea name="v_mess" id="v_mess" maxlength="150"><?=GetMessage("MFT_MESSAGE")?></textarea>
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
            </div>
        <?endif;?>
        <?if($arParams["USE_CAPTCHA"] == "Y"):?>
            <div class="mf-captcha">
                <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
                <input type="hidden" name="captcha_sid" id="captcha_sid" value="<?=$arResult["capCode"]?>">
                <div class="mf-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA"></div>
                <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span>
                    <input type="text" name="captcha_word" id="captcha_word" size="30" maxlength="10" value="" />
                </div>
            </div>
        <?endif;?>
        <p class="text-feedback submit"><input type="submit" name="sord_call" value="<?=GetMessage("MFT_SUBMIT")?>"/></p>
    </form>
    <p class="text-feedback">или позвоните нам по телефону<br/>
            <span class="phone">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR . "include/telephone2.php",
                        "EDIT_TEMPLATE" => "standard.php"
                    ),
                    false
                );?>
            </span>
    </p>
</div>



