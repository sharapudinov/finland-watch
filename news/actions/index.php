<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции");
?><?$APPLICATION->IncludeComponent("webvbi:furniture.catalog.index", "finland-watch-actions", Array(
	"IBLOCK_TYPE" => "news",	// Тип инфо-блока
		"IBLOCK_ID" => "5",	// Инфо-блок
		"IBLOCK_BINDING" => "element",	// Показывать
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>