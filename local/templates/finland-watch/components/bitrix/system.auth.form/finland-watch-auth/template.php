<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$frame = $this->createFrame()->begin();
?>
	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	ShowMessage($arResult['ERROR_MESSAGE']);
	?>
	<?/*if($arResult["AUTH_SERVICES"]):*/?><!--
	<h2><?/*echo GetMessage("AUTH_TITLE")*/?></h2>
	<?/*endif*/?>
	--><?/*if($arResult["AUTH_SERVICES"]):
		$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
			array(
				"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
				"CURRENT_SERVICE"=>$arResult["CURRENT_SERVICE"],
				"AUTH_URL"=> ($arParams["BACKURL"] ? $arParams["BACKURL"] : $arResult["BACKURL"]),
				"POST"=>$arResult["POST"],
				"SUFFIX" => RandString(8),
			),
			$component,
			array("HIDE_ICONS"=>"Y")
		);
	endif;*/?>
	<form id="contact" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=SITE_DIR?>auth/<?//=$arResult["AUTH_URL"]?>">
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arParams["BACKURL"]) > 0 || strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=($arParams["BACKURL"] ? $arParams["BACKURL"] : $arResult["BACKURL"])?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

        <p>
            <label for="USER_LOGIN"><?=GetMessage("AUTH_LOGIN")?> *</label><br/>

            <input id="USER_LOGIN" class="txt" type="text" name="USER_LOGIN" maxlength="255" value="<?= $arResult["LAST_LOGIN"] ?>"/>
        </p>
        <p>
            <label for="USER_PASSWORD"><?= GetMessage("AUTH_PASSWORD")?> *</label><br/>

            <input id="USER_PASSWORD" class="txt" type="password" name="USER_PASSWORD" maxlength="255"/>
        </p>

		<?if($arResult["CAPTCHA_CODE"]):?>
			<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:
			<input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
		<?endif;?>

        <p class="check-keep remember-forgot">
            <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                <input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" checked/>
                <label for="USER_REMEMBER"><?= GetMessage("AUTH_REMEMBER_ME") ?></label>
            <? endif ?>

            <? if ($arParams["NOT_SHOW_LINKS"] != "Y"): ?>
            <noindex>
                <a href="<?= $arParams["AUTH_FORGOT_PASSWORD_URL"] ? $arParams["AUTH_FORGOT_PASSWORD_URL"] : $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
                        rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a>
            </noindex>
        </p>
		<?endif?>
        <p class="text-feedback submit">
            <input type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />
        </p>


    </form>
<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>

