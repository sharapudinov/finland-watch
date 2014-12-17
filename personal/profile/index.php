<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Настройки пользователя");
?>
    <div class="content">
        <section class="main_block">
            <?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"eshop_adapt", 
	array(
		"SET_TITLE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"USER_PROPERTY" => array(
		),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => "",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
        </section>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>