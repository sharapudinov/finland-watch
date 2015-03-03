<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
GLOBAL $arFilter;
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
$this->setFrameMode(true);

?>
<div class="content">
    <section>
        <div class="bread-crumbs home">
            <ul class="bread-crumbs-link">
                <li class="icon-link-home"><a href="#"></a></li>
                <li>ПОДБЕРИТЕ СВОЮ МОДЕЛЬ</li>
            </ul>
        </div>
        <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"finland-watch-visual", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"INSTANT_RELOAD" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"XML_EXPORT" => "N",
		"SECTION_TITLE" => "-",
		"SECTION_DESCRIPTION" => "-",
		"TEMPLATE_THEME" => ""
	),
	$component
);?>


    </section>
    <section>
        <div class="bread-crumbs home">
            <ul class="bread-crumbs-link">
                <li class="icon-link-home"><a href="#"></a></li>
                <li><a href="/catalog/specialoffers/">СПЕЦПЕРДЛОЖЕНИЯ</a></li>
            </ul>

        </div>
        <div class="slider-home">
            <? $arFilter = array("PROPERTY_SPECIALOFFER" => 3) ?>
            <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"finland-watch-newproduct", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"ELEMENT_COUNT" => "5",
		"LINE_ELEMENT_COUNT" => "5",
		"PROPERTY_CODE" => array(
			0 => "SPECIALOFFER",
			1 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
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
		"CACHE_GROUPS" => "Y",
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
		"OFFERS_CART_PROPERTIES" => ""
	),
	$component
);?>
        </div>
    </section>
    <section>
        <div class="bread-crumbs home">
            <ul class="bread-crumbs-link">
                <li class="icon-link-home"><a href="#"></a></li>
                <li><a href="/catalog/newproducts/">НОВИНКИ</a></li>
            </ul>
        </div>
        <div class="slider-home">
            <? $arFilter = array("PROPERTY_NEWPRODUCT" => 1) ?>
            <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "finland-watch-newproduct", array(
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "2",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "arFilter",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "ELEMENT_COUNT" => "5",
                    "LINE_ELEMENT_COUNT" => "5",
                    "PROPERTY_CODE" => array(
                        0 => "NEWPRODUCT",
                        1 => "",
                    ),
                    "OFFERS_FIELD_CODE" => array(
                        0 => "PREVIEW_PICTURE",
                        1 => "",
                    ),
                    "OFFERS_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
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
                    "CACHE_GROUPS" => "Y",
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
                    "PRODUCT_PROPERTIES" => array(),
                    "OFFERS_CART_PROPERTIES" => array()
                ),
                $component
            );?>
        </div>
    </section>
    <section>
        <div class="bread-crumbs home">
            <ul class="bread-crumbs-link">
                <li class="icon-link-home"><a href="#"></a></li>
                <li><a href="/catalog/saleleads/">ХИТЫ ПРОДАЖ</a></li>
            </ul>
        </div>
        <div class="slider-home">
            <? $arFilter = array("PROPERTY_SALELEAD" => 20) ?>
            <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"finland-watch-newproduct", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"ELEMENT_COUNT" => "5",
		"LINE_ELEMENT_COUNT" => "5",
		"PROPERTY_CODE" => array(
			0 => "SALELEAD",
			1 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "0",
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
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
		"OFFERS_CART_PROPERTIES" => ""
	),
	$component
);?>
        </div>
    </section>
</div>
<div id="block-main-news-about" class="catalog">
    <div id="dynamic-block" class="catalog-home">
        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "finland-watch",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
                "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
            ),
            $component,
            array("HIDE_ICONS" => "Y")
        );
        ?>
    </div>
    <div class="block-home-news catalog-home">
        <div class="text-catalog">
            <p>Первые в мире часы с GPS, сочетающие в себе современные функции для тренировок и активных занятий спортом на открытом воздухе.
                Они особенно ценятся за потрясающую механическую прочность, надежное измерение высоты и водонепроницаемость.
                В этих часах есть все функциональные возможности для занятий спортом на открытом воздухе,
                и вы даже можете самостоятельно создавать новые функции для грядущих приключений.<br/>
                Suunto Ambit2 HR - встроенный GPS-навигатор с возможностью регистрации частоты сердцебиения,
                информацией о погоде и поддержкой приложений Suunto Apps для всех видов спорта на открытом воздухе.</p>
            <div class="link-social-news">
                <ul class="link-social">
                    <?$curPage='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>
                    <li class="vk"><a target="_blank" href="http://vk.com/share.php?url=<?=$curPage?>"></a></li>
                    <li class="f"><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?=$curPage?>"></a></li>
                    <li class="tw"><a target="_blank" href="https://twitter.com/intent/tweet?url=<?=$curPage?>"></a></li>
                    <li class="od"><a target="_blank" href="http://odnoklassniki.ru/dk?st.cmd=addShare&st._surl=<?=$curPage?>"></a></li>
                </ul>
            </div>
        </div>
        <img src="<?=SITE_TEMPLATE_PATH?>/img/clock-c.png" width="391" height="242" title="" alt="" />
        <div class="clear"></div>
    </div>
</div>
