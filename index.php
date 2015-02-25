<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин спортивных часов 'Suunto'");
GLOBAL $arFilter;
?><!--=========== Мини слайдер ========-->
<section>
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
        <?$APPLICATION->IncludeComponent(
            "webvbi:furniture.catalog.index",
            "finland-watch-slider",
            array(
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
                        <a href="/about/delivery">БЕСПЛАТНАЯ<br/> доставка</a>
                    </li>
                    <li class="ga">
                        <a href="/about/guaranty">Гарантия качества.<br/> Обмен и возврат в<br/> течении 15 дней</a>
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
        <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"finland-watch-select", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"ADD_SECTIONS_CHAIN" => "Y"
	),
	false
);?>
        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"finland_watch_select_menu", 
	array(
		"ROOT_MENU_TYPE" => "catalog",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"USE_EXT" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MENU_THEME" => "site"
	),
	false
);?>
        <div class="select-option">
            <div class="box visible">
                <div class="section">
                    <div class="sec">
                        <select class="select-section" data-placeholder="Часы на каждый день">
                            <option></option>
                            <option>Серия-1</option>
                            <option>Серия-2</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery.noConflict();
    jQuery('.select-sport').on("change", function () {
        window.location = '/catalog/' + jQuery(this).val();
    });
    jQuery('.select-section').on("change", function () {
        window.location = jQuery(this).val();
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
			0 => "NEWPRODUCT",
			1 => "ACTIONS",
			2 => "SPECIALOFFER",
			3 => "",
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
		"CACHE_TYPE" => "Y",
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
		"OFFERS_CART_PROPERTIES" => ""
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
		"PRODUCT_PROPERTIES" => array(
		),
		"OFFERS_CART_PROPERTIES" => ""
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
		"SECTION_ID" => "",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
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
<div id="block-main-news-about">
    <section>
        <div id="dynamic-block">
            <div class="dynamic-block dynamic-one-left">
                <span class="pickup news">Новости</span>

                <div class="clear"></div>
            </div>
        </div>
        <div class="block-home-news">
            <div class="bg-news"><img src="<?= SITE_TEMPLATE_PATH ?>/images/bg-news.png" width="489" height="393"/>
            </div>
            <div class="jcarousel-wrapper wrap">
                <div class="jcarousel slider-two slider-news">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "finland-watch-news-list",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "news",
                            "IBLOCK_ID" => "1",
                            "NEWS_COUNT" => "10",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "ID",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "DESCRIPTION",
                                2 => "",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_STATUS_404" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        ),
                        false
                    );?>

                    <div class="clear"></div>
                </div>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            </div>
        </div>
    </section>
    <section>
        <div class="main-block-about">
            <div class="dynamic-block dynamic-one-left">
                <span class="pickup lines">О магазине</span>

                <div class="clear"></div>
            </div>
            <div class="about-left">
                <p>Мы рады приветствовать Вас на нашем сайте, сайте официального дилера в РФ известной финской компании
                    <span class="blue">Suunto.</span></p>

                <p> У нас Вы всегда сможете купить продукцию данного производителя. В ассортименте представлены надежные
                    <span class="blue">компасы, электронные спортивные часы,</span> а также <span class="blue">функциональные компьютеры</span>
                    и навигационные приборы с GPS Suunto.</p>

                <p>Вся эта продукция – то, без чего сложно представить современного человека, активно занимающегося
                    спортом, ценящего новые впечатления и постоянно находящегося в погоне за новыми эмоциями и
                    ощущениями. Человека, для которого жизнь и спорт не просто сопутствующие формы существования, а
                    синонимы.</p>

                <p>Чем же сегодня занимается <span class="blue">компания Suunto</span>?<br/>
                    Данный производитель – не просто один из мировых лидеров в изготовлении удивительных и
                    многофункциональных устройств. Компания Suunto так же, как и её изделия, давно уже стала надежным
                    спутником и верным другом для многих искателей приключений. Используют её и дайверы, и лыжники, и
                    сноубордисты, и велосипедисты, и скалолазы. Список можно продолжать очень долго.</p>

                <p><span class="blue">Навигационные устройства с GPS,</span> а также <span class="blue">спортивные электронные часы, компасы</span>
                    и <span class="blue">наручные компьютеры Suunto</span> часто становятся воплощением особого стиля.
                </p>

            </div>
            <div class="about-right">

                <p><span class="blue">Suunto (Сунто) в России:</span> общая информация<br/>
                    Сегодня приобрести оригинальную продукцию данного производителя не так просто. Финские спортивные
                    часы Suunto или система навигации с GPS – товары, которые реализуются малым числом дилеров. Да и
                    само название компании многие пишут с ошибкой. Сунто. На самом деле, в слове две «У». Не будем
                    углубляться в лингвистические дебри.</p>

                <p>Важно уже то, что существует наш магазин, и здесь <span class="blue">Вы сможете купить оригинальную продукцию компании Suunto (Сунто). </span>Кроме
                    того, Вы сможете получить и официальную гарантию на свою покупку.<br/>
                    Как приобрести продукцию Suunto? Всё очень просто. Чтобы заказать часы с GPS или классические Suunto
                    (<span class="blue">электронные спортивные часы</span>), компас или наручный компьютер, достаточно
                    лишь позвонить по указанному телефону или воспользоваться услугами нашего современного
                    интернет-магазина.</p>

                <div class="questions">
                    <span class="quest">Возникли вопросы?</span>

                    <p> Задать их Вы всегда сможете опытным менеджерам. Они проконсультируют Вас по продукции Suunto,
                        расскажут о том, как использовать её в практикуемом Вами спорте, будь то дайвинг или
                        сноубординг. </p>
                </div>
            </div>
            <div class="clear"></div>
            <div class="bg-about">
                <img src="<?= SITE_TEMPLATE_PATH ?>/images/bg-about.png" width="361" height="342"/>
            </div>
        </div>
    </section>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>