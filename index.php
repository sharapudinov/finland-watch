<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?><!--=========== Мини слайдер ========-->
<section xmlns="http://www.w3.org/1999/html">
    <div class="minislider-home">
        <? $arFilter = array("PROPERTY_SPECIALOFFER" => 3) ?>
        <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "finland-watch-specialoffer", array(
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
                "PRODUCT_PROPERTIES" => array(),
                "OFFERS_CART_PROPERTIES" => array()
            ),
            false
        );?>
    </div>
</section>
<!-- ==============Мини слайдер конец ============== -->
<!--=========== Главный слайдер ========-->
<section>
    <div id="main-slider">
        <?$APPLICATION->IncludeComponent("webvbi:furniture.catalog.index", "finland-watch-actions-slider", array(
                "IBLOCK_TYPE" => "news",
                "IBLOCK_ID" => "4",
                "IBLOCK_BINDING" => "element",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000",
                "CACHE_GROUPS" => "N"
            ),
            false
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
</section>
<div id="main-content">
    <div class="content">
        <section>
            <div class="block-option">
                <div class="select-option one">
                    <form action="" method="post">
                        <div class="box visible">
                            <div class="section">
                                <div class="sec">
                                    <select class="select-style" data-placeholder="Выберите серию часов">
                                        <option></option>
                                        <option>ВСЕ МОДЕЛИ</option>
                                        <option>СМАРТ ЧАСЫ</option>
                                        <option>ТУЗИЗМ</option>
                                        <option>ФИТНЕЛ</option>
                                        <option>БЕГ</option>
                                        <option>ВЕЛОСПОРТ</option>
                                        <option>ДАЙВИНГ</option>
                                        <option>СКАЛОЛАЗАНИЕ</option>
                                        <option>ГОРНЫЕ ЛЫЖИ / СНОУБОРД</option>
                                        <option>ЯХТИНГ</option>
                                        <option>ПЛАВАНИЕ</option>
                                        <option>АКСЕССУАРЫ</option>
                                        <option>КОМАНДНЫЕ СИСТЕМЫ</option>
                                        <option>КОМПАСЫ</option>
                                        <option>СПОРТИВНЫЕ НАБОРЫ</option>
                                        <option>ПОДАРКИ</option>
                                        <option>АРХИВ МОДЕЛЕЙ</option>
                                    </select>
                                </div>
                                <!-- .sec -->
                            </div>
                            <!-- .box -->
                        </div>
                    </form>

                </div>
                <div class="select-option">
                    <form action="" method="post">
                        <div class="box visible">
                            <div class="section">
                                <div class="sec">
                                    <select class="select-style" data-placeholder="Выберите вид спорта">
                                        <option></option>
                                        <option>ВСЕ МОДЕЛИ</option>
                                        <option>СМАРТ ЧАСЫ</option>
                                        <option>ТУЗИЗМ</option>
                                        <option>ФИТНЕЛ</option>
                                        <option>БЕГ</option>
                                        <option>ВЕЛОСПОРТ</option>
                                        <option>ДАЙВИНГ</option>
                                        <option>СКАЛОЛАЗАНИЕ</option>
                                        <option>ГОРНЫЕ ЛЫЖИ / СНОУБОРД</option>
                                        <option>ЯХТИНГ</option>
                                        <option>ПЛАВАНИЕ</option>
                                        <option>АКСЕССУАРЫ</option>
                                        <option>КОМАНДНЫЕ СИСТЕМЫ</option>
                                        <option>КОМПАСЫ</option>
                                        <option>СПОРТИВНЫЕ НАБОРЫ</option>
                                        <option>ПОДАРКИ</option>
                                        <option>АРХИВ МОДЕЛЕЙ</option>
                                    </select>
                                </div>
                                <!-- .sec -->
                            </div>
                            <!-- .box -->
                        </div>
                    </form>

                </div>

                <div class="select-option">
                    <form action="" method="post">
                        <div class="box visible">
                            <div class="section">
                                <div class="sec">
                                    <select class="select-style" data-placeholder="Часы на каждый день">
                                        <option></option>
                                        <option>ВСЕ МОДЕЛИ</option>
                                        <option>СМАРТ ЧАСЫ</option>
                                        <option>ТУЗИЗМ</option>
                                        <option>ФИТНЕЛ</option>
                                        <option>БЕГ</option>
                                        <option>ВЕЛОСПОРТ</option>
                                        <option>ДАЙВИНГ</option>
                                        <option>СКАЛОЛАЗАНИЕ</option>
                                        <option>ГОРНЫЕ ЛЫЖИ / СНОУБОРД</option>
                                        <option>ЯХТИНГ</option>
                                        <option>ПЛАВАНИЕ</option>
                                        <option>АКСЕССУАРЫ</option>
                                        <option>КОМАНДНЫЕ СИСТЕМЫ</option>
                                        <option>КОМПАСЫ</option>
                                        <option>СПОРТИВНЫЕ НАБОРЫ</option>
                                        <option>ПОДАРКИ</option>
                                        <option>АРХИВ МОДЕЛЕЙ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>

        <!-- Стильный селект -->
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.formstyler.js"></script>
        <script>
            jQuery.noConflict();
            jQuery(document).ready(function () {
                jQuery('.select-style').styler();
            });
        </script>
        <section>
            <div class="bread-crumbs home">
                <ul class="bread-crumbs-link">
                    <li class="icon-link-home"><a href="#"></a></li>
                    <li>НОВИНКИ МАГАЗИНА</li>

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
                        "PRODUCT_PROPERTIES" => array(),
                        "OFFERS_CART_PROPERTIES" => array()
                    ),
                    false
                );?>
            </div>
        </section>
        <section>
            <div class="bread-crumbs home">
                <ul class="bread-crumbs-link">
                    <li class="icon-link-home"><a href="#"></a></li>
                    <li>ТОВАР ПО АКЦИЯМ</li>

                </ul>
            </div>
            <div class="slider-home">
                <? $arFilter = array("PROPERTY_ACTION" => 2) ?>
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
                        "PRODUCT_PROPERTIES" => array(),
                        "OFFERS_CART_PROPERTIES" => array()
                    ),
                    false
                );?>
            </div>
        </section>
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
	false
);?>


    </section>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>