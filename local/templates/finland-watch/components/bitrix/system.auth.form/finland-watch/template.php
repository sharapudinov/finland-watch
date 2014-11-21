<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

CJSCore::Init(array("popup"));
?>
<!--<div class="bx_login_block">-->
<!--	<span id="login-line">-->
<ul class="login">

	<?
	$frame = $this->createFrame("login-line", false)->begin();
		if ($arResult["FORM_TYPE"] == "login")
		{
		?>
			<li>
                <a class="modal-login" href="javascript:void(0)<?//=$arResult["AUTH_URL"]?>" onclick="openAuthorizePopup()"><?=GetMessage("AUTH_LOGIN")?></a>
            </li>
			<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
			<li>
                <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" ><?=GetMessage("AUTH_REGISTER")?></a>
            </li>
			<?endif;
		}
		else
		{
			$name = trim($USER->GetFullName());
			if (strlen($name) <= 0)
				$name = $USER->GetLogin();
		?>
            <li class="login-y active">
                <a class="modal-login" href="<?= $APPLICATION->GetCurPageParam("logout=yes", Array("logout")) ?>"><?= GetMessage("AUTH_LOGOUT") ?></a>
            </li>
            <li >
                <a href="<?= $arResult['PROFILE_URL'] ?>"><?= htmlspecialcharsEx($name); ?></a>
            </li>

		<?
		}
	$frame->beginStub();
		?>
		<li>
            <a href="javascript:void(0)<?//=$arResult["AUTH_URL"]?>" onclick="openAuthorizePopup()"><?=GetMessage("AUTH_LOGIN")?></a>
        </li>
		<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
            <li>
                <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" ><?=GetMessage("AUTH_REGISTER")?></a>
            </li>
		<?endif;
	$frame->end();
	?>
</ul>
<!--	</span>-->
<!--</div>-->

<?if ($arResult["FORM_TYPE"] == "login"):?>
	<div id="inline-login" style="display:none;" class="feedback">
        <h1 class="tetle-feedback">Вход в личный кабинет?</h1>
        <p class="text-feedback">Для зарегистрированных пользователей</p>
        <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "finland-watch-auth",
		array(
			"BACKURL" => $arResult["BACKURL"],
			"AUTH_FORGOT_PASSWORD_URL" => $arResult["AUTH_FORGOT_PASSWORD_URL"],
		),
		false
	);
	?>
	</div>

	<script>
		function openAuthorizePopup()
		{
			var authPopup = BX.PopupWindowManager.create("AuthorizePopup", null, {
				autoHide: true,
				//	zIndex: 0,
				offsetLeft: 0,
				offsetTop: 0,
				overlay : true,
				draggable: {restrict:true},
				closeByEsc: true,
				closeIcon: { right : "12px", top : "10px"},
				content: '<div style="width:400px;height:400px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
				events: {
					onAfterPopupShow: function()
					{
						this.setContent(BX("inline-login"));
					}
				}
			});

			authPopup.show();
		}
	</script>
<?endif?>