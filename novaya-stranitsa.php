<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");


?><div class="content">
 <section class="main_block">
<?$APPLICATION->IncludeComponent(
	"orion:trigger.deadline", 
	"finland-watch", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"IBLOCK_ELEMENT_ID" => "335",
		"ACTION_BEGIN_PROP" => "",
		"ACTION_END_PROP" => "",
		"ACTION_BEGIN_VAL" => "10.03.2015 12:42:00",
		"ACTION_END_VAL" => "10.03.2015 23:42:00",
		"ACTION_INTERVAL" => "Y",
		"VIEW_CAP_NAME" => "До окончания акции осталось:",
		"VIEW_CAP_END_NAME" => "Акция завершена!",
		"VIEW_CAP_POS" => "UP",
		"VIEW_DESC" => "N",
		"VIEW_DESC_POS" => "DOWN",
		"VIEW_FORMAT" => "3",
		"VIEW_SIZE_PROP" => "MIDDLE",
		"VIEW_TYPE_PROP" => "2",
		"START_UNTIL_BEGIN_ACTION" => "N",
		"COMPONENT_ID" => "",
		"IN_CACHE_CONT" => "N",
		"VIEW_COLOR_PROP" => "BLACK",
		"VIEW_SPEED" => "1",
		"ACTION_INTERVAL_VALUE" => "1",
		"ACTION_INTERVAL_TYPE" => "h",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	),
	false
);?> </section>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>