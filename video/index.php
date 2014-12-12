<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Видео");
?>
    <div class="content content-video">
        <?$APPLICATION->IncludeComponent(
	"webvbi:furniture.catalog.index", 
	"finland-watch-video", 
	array(
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID" => "8",
		"IBLOCK_BINDING" => "element",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"CACHE_GROUPS" => "Y"
	),
	false
);?>


        </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>