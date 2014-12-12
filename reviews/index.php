<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы о магазине");
?>

    <div class="content">
        <section class="main_block">
            <?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews", 
	"finland-watch-shop-reviews", 
	array(
		"FORUM_ID" => "2",
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID" => "6",
		"ELEMENT_ID" => "322",
		"URL_TEMPLATES_READ" => "",
		"URL_TEMPLATES_DETAIL" => "",
		"URL_TEMPLATES_PROFILE_VIEW" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"MESSAGES_PER_PAGE" => "10",
		"PAGE_NAVIGATION_TEMPLATE" => "finland-watch",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"NAME_TEMPLATE" => "",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"EDITOR_CODE_DEFAULT" => "Y",
		"SHOW_AVATAR" => "N",
		"SHOW_RATING" => "N",
		"RATING_TYPE" => "",
		"SHOW_MINIMIZED" => "Y",
		"USE_CAPTCHA" => "Y",
		"PREORDER" => "N",
		"SHOW_LINK_TO_FORUM" => "N",
		"FILES_COUNT" => "2",
		"AJAX_POST" => "Y"
	),
	false
);?>
        </section>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>