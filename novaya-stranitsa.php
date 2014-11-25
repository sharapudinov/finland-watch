<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent(
	"bitrix:iblock.vote", 
	"stars", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"ELEMENT_ID" => "320",
		"ELEMENT_CODE" => "",
		"MAX_VOTE" => "5",
		"VOTE_NAMES" => array(
			0 => "0",
			1 => "1",
			2 => "2",
			3 => "3",
			4 => "4",
			5 => "",
		),
		"SET_STATUS_404" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"DISPLAY_AS_RATING" => "vote_avg"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>