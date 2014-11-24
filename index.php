<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?><!--=========== Мини слайдер ========-->
<section>
    <div class="minislider-home">

        <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "finland-watch-mini-slider-old", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "2",
	"ELEMENT_SORT_FIELD" => "",
	"ELEMENT_SORT_ORDER" => "",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "3",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_FIELD_CODE" => array(
		0 => "PREVIEW_PICTURE",
		1 => "",
	),
	"OFFERS_PROPERTY_CODE" => array(
		0 => "ARTNUMBER",
		1 => "COLOR_REF",
		2 => "SIZES_SHOES",
		3 => "SIZES_CLOTHES",
		4 => "MORE_PHOTO",
		5 => "",
	),
	"OFFERS_SORT_FIELD" => "sort",
	"OFFERS_SORT_ORDER" => "asc",
	"OFFERS_SORT_FIELD2" => "id",
	"OFFERS_SORT_ORDER2" => "desc",
	"OFFERS_LIMIT" => "5",
	"ROTATE_TIMER" => "30",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N",
	"DISPLAY_COMPARE" => "N",
	"CACHE_FILTER" => "Y",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"CONVERT_CURRENCY" => "N",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"USE_PRODUCT_QUANTITY" => "N",
	"ADD_PROPERTIES_TO_BASKET" => "N",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"OFFERS_CART_PROPERTIES" => array(
	)
	),
	false
);?>
    </div>
</section>
<!-- ==============Мини слайдер конец ============== -->
<!--=========== Главный слайдер ========-->
<section>
    <div id="main-slider">
        <?$APPLICATION->IncludeComponent(
            "webvbi:furniture.catalog.index",
            "finland-watch-actions-slider",
            Array(
                "IBLOCK_TYPE" => "news",
                "IBLOCK_ID" => "4",
                "IBLOCK_BINDING" => "element",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000",
                "CACHE_GROUPS" => "N"
            )
        );?>
        <div class="block-advantages">
            <div class="shadow"></div>
            <div class="advantages">
                <ul>
                    <li class="cl">
                        <a href="#">Только оригинальные<br/> финские часы,<br/> никаких подделок!</a>
                    </li>
                    <li class="d">
                        <a href="#">БЕСПЛАТНАЯ<br/> доставка</a>
                    </li>
                    <li class="ga">
                        <a href="#">Гарантия качества.<br/> Обмен и возврат в<br/> течении 15 дней</a>
                    </li>
                    <li class="di">
                        <a href="#">Лучшие цены и<br/> большие скидки!</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>