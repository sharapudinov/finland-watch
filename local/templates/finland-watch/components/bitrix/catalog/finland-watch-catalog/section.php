<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//добавляем название раздела

$dbRes = CIBlockSection::GetList(
    array(),
    array("CODE" => $arResult['VARIABLES']["SECTION_CODE"]),
    false,
    Array("NAME", "PICTURE", "DESCRIPTION"),
    false
);
$res = $dbRes->GetNext();
$arResult['SECTION'] = $res;
$arResult['SECTION']['RESIZED_PICTURE'] = CFile::ResizeImageGet($res['PICTURE'], array("width" => 391, "height" => 242), BX_RESIZE_IMAGE_PROPORTIONAL);


//test_dump($arResult);

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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
$section_code=isset($_REQUEST['SECTION_CODE'])?$_REQUEST['SECTION_CODE']:'all';

GLOBAL ${$arParams['FILTER_NAME']};
GLOBAL $main_filter;
${$arParams['FILTER_NAME']} = array();
$this->setFrameMode(true); ?>
<section>
    <div class="bread-crumbs">
        <ul class="bread-crumbs-link">
            <li class="icon-link-home">
                <a href="'.SITE_DIR.'index.php"></a>
            </li>
            <li>
                <a href="/">
                    Главная
                </a>
            </li>
            <li>
                <a href="/catalog/">
                    Каталог
                </a>
            </li>
            <li>

                <?

                if (isset($arResult['SECTION']['NAME'])) {
                    $section = $arResult['SECTION']['NAME'];
                    $APPLICATION->SetPageProperty('title', 'Suunto ' . $arResult['SECTION']['NAME'] . ' — Каталог умных часов Suunto —
купить часы ' . $arResult['SECTION']['NAME'] . ' в Москве с доставкой по всей России ');

                } else {
                    switch ($arResult['VARIABLES']["SECTION_CODE"]):
                        case 'all':
                            $section = "Все модели";
                            $APPLICATION->SetPageProperty('title', 'Каталог часов – все модели');
                            break;
                        case 'saleleads':
                            $main_filter = array("PROPERTY_SALELEAD" => 20);
                            $APPLICATION->SetPageProperty('title', 'Каталог часов – Хиты продаж');
                            $section = "Хиты продаж";
                            break;
                        case 'newproducts':
                            $main_filter = array("PROPERTY_NEWPRODUCT" => 1);
                            $APPLICATION->SetPageProperty('title', 'Каталог часов – Новинки');
                            $section = 'Новинки';
                            break;
                        case 'specialoffers':
                            $main_filter = array("PROPERTY_SPECIALOFFER" => 3);
                            $APPLICATION->SetPageProperty('title', 'Каталог часов – Спецпредложения');
                            $section = 'Спецпредложения';
                            break;
                        case 'discounts':
                            $main_filter=array("PROPERTY_DISCOUNT" => 37);
                            $APPLICATION->SetPageProperty('title', 'Каталог часов – Товары со скидками');
                            $section = 'Товары со скидками';
                    endswitch;
                $arResult["VARIABLES"]["SECTION_CODE"] = $section_code;
                }
                ?>
                <?= $section ; ?>
            </li>
        </ul>
    </div>

</section>
<div class="content content-catalog">
    <?
    if ($arParams['USE_FILTER'] == 'Y') {
    $arFilter = array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ACTIVE" => "Y",
        "GLOBAL_ACTIVE" => "Y",
    );
    if (0 < intval($arResult["VARIABLES"]["SECTION_ID"])) {
        $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
    } elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"]) {
        $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
    }

    $obCache = new CPHPCache();
    if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
        $arCurSection = $obCache->GetVars();
    } elseif ($obCache->StartDataCache()) {
        $arCurSection = array();
        if (Loader::includeModule("iblock")) {
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

            if (defined("BX_COMP_MANAGED_CACHE")) {
                global $CACHE_MANAGER;
                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->Fetch()) {
                    $CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);
                }
                $CACHE_MANAGER->EndTagCache();
            } else {
                if (!$arCurSection = $dbRes->Fetch())
                    $arCurSection = array();
            }
        }
        $obCache->EndDataCache($arCurSection);
    }
    if (!isset($arCurSection)) {
        $arCurSection = array();
    }
    if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y') {
        $basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '');
    } else {
        $basketAction = (isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '');
    }
    ?>
    <div class="sitebar-right">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.smart.filter",
            "finland-watch-visual-vertical",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_ID" => $arCurSection['ID'],
                "FILTER_NAME" => $arParams["FILTER_NAME"],
                "PRICE_CODE" => $arParams["PRICE_CODE"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "SAVE_IN_SESSION" => "Y",
                "XML_EXPORT" => "Y",
                "SECTION_TITLE" => "NAME",
                "SECTION_DESCRIPTION" => "DESCRIPTION",
                'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"]
            ),
            $component,
            array('HIDE_ICONS' => 'Y')
        );

        ?>
        <? } ?>
    </div>
    <div class="content-left">
        <section>
            <div class="catalog-slider-cleek-buy">
                <!--=========== Мини слайдер в каталоге ========-->
                <?GLOBAL $arFilter;
                $arFilter = array("PROPERTY_SPECIALOFFER" => 3);
                $APPLICATION->IncludeComponent("bitrix:catalog.top", "finland-watch-specialoffer-catalog", array(
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
                    "OFFERS_CART_PROPERTIES" => array(),
                ),
                    $component
                );
                ?>
            </div>
            <div class="goods-day-catalog">
                <ul>
                    <li class="goods-day-title">Товар дня!</li>
                    <li class="fch">ФИНСКИЕ ЧАСЫ <br/><span class="mini">Никаких подделок!</span></li>
                    <li class="bd">БЕСПЛАТНАЯ <br/><span class="mini">доставка</span></li>
                    <li class="ga">ГАРАНТИЯ КАЧЕСТВА <br/><span class="mini">Обмен и возврат!</span></li>
                    <li class="bp">ЛУЧШИЕ ЦЕНЫ <br/><span class="mini">и большие скидки!</span></li>
                </ul>

            </div>
        </section>
        <section>
            <div class="title-tab-link">
                <h1><?= $arResult['SECTION']['NAME'] ?></h1>
                <ul>
                    <? $sort = $_REQUEST['SORT']; ?>
                    <li>Сортировать по:</li>
                    <li <?= ($sort == 'price') ? 'class="active"' : '' ?>><a
                            href="<?= requestUriAddGetParams(array("SORT" => 'price')) ?>">цене</a></li>
                    <li <?= ($sort == 'rating') ? 'class="active"' : '' ?>><a
                            href="<?= requestUriAddGetParams(array("SORT" => 'rating')) ?>">рейтингу</a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>

        </section>



        <?
        switch ($sort) {
            case 'rating':
                $sort = "PROPERTY_rating";
                break;
            case 'price':
                $sort = 'CATALOG_PRICE_1';
                break;
        }

        $page_element_count = !is_set($_REQUEST['PAGE_ELEMENT_COUNT']) ? 15 : $_REQUEST['PAGE_ELEMENT_COUNT'];
        $page_element_count = $page_element_count == 'all' ? 1000 : $page_element_count;

        if (is_set($_REQUEST['SPORT'])) $main_filter['PROPERTY_SPORT'] = $_REQUEST['SPORT'];
        if ($_REQUEST['PRESENTS'] == 'Y') $main_filter['!PROPERTY_PRESENTS'] = false;
        $intSectionID = 0;
        $intSectionID = $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "finland-watch",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "ELEMENT_SORT_FIELD" => $sort ? $sort : $arParams["ELEMENT_SORT_FIELD"],
                "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
                "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                "BASKET_URL" => $arParams["BASKET_URL"],
                "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                "FILTER_NAME" => is_set($main_filter) ? 'main_filter' : $arParams["FILTER_NAME"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                "PAGE_ELEMENT_COUNT" => $page_element_count,
                "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                "PRICE_CODE" => $arParams["PRICE_CODE"],
                "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

                "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

                "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
                "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

                "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"] != 'all' ? $arResult["VARIABLES"]["SECTION_CODE"] : '',
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

                'LABEL_PROP' => $arParams['LABEL_PROP'],
                'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
                'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

                'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
                'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
                'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
                'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
                'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
                'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
                'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
                'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
                'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

                'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
                "ADD_SECTIONS_CHAIN" => "N",
                'ADD_TO_BASKET_ACTION' => $basketAction,
                'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
                'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
                "SHOW_ALL_WO_SECTION" => 'Y'
            ),
            $component
        ); ?>
        <section class="floatleft">
            <div class="page-nav-count-link">

                <ul>
                    <li class="po">показывать по</li>
                    <li class="link-more left <?= $page_element_count == '15' ? 'active' : '' ?>"><a
                            href="<?= requestUriAddGetParams(array('PAGE_ELEMENT_COUNT' => 15)) ?>">15</a></li>
                    <li class="link-more <?= $page_element_count == '30' ? 'active' : '' ?>"><a
                            href="<?= requestUriAddGetParams(array('PAGE_ELEMENT_COUNT' => 30)) ?>">30</a></li>
                    <li class="link-more <?= $page_element_count == '45' ? 'active' : '' ?>"><a
                            href="<?= requestUriAddGetParams(array('PAGE_ELEMENT_COUNT' => 45)) ?>">45</a></li>
                    <li class="link-more <?= $page_element_count == '90' ? 'active' : '' ?>"><a
                            href="<?= requestUriAddGetParams(array('PAGE_ELEMENT_COUNT' => 90)) ?>">90</a></li>
                    <li class="link-more right <?= $page_element_count == '' ? 'active' : '' ?>"><a
                            href="<?= requestUriAddGetParams(array('PAGE_ELEMENT_COUNT' => 'all')) ?>">Все</a></li>
                </ul>

                <div class="clear"></div>
            </div>

        </section>
    </div>

    <div class="clear"></div>
</div>
<section class="background-color">

    <div id="block-main-news-about" class="catalog">
        <div id="dynamic-block" class="catalog-home">
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list",
                "finland-watch",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_ID" => "",//$arResult["VARIABLES"]["SECTION_ID"],
                    "SECTION_CODE" => "",//$arResult["VARIABLES"]["SECTION_CODE"],
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
    </div>
    <div class="block-home-news catalog-home">
        <div class="text-catalog">
            <p><?= $arResult['SECTION']['DESCRIPTION'] ?></p>

            <div class="link-social-news">
                <ul class="link-social">
                    <? $curPage = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>
                    <li class="vk"><a target="_blank" href="http://vk.com/share.php?url=<?= $curPage ?>"></a></li>
                    <li class="f"><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= $curPage ?>"></a>
                    </li>
                    <li class="tw"><a target="_blank" href="https://twitter.com/intent/tweet?url=<?= $curPage ?>"></a>
                    </li>
                    <li class="od"><a target="_blank"
                                      href="http://odnoklassniki.ru/dk?st.cmd=addShare&st._surl=<?= $curPage ?>"></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="<?= $arResult['SECTION']['RESIZED_PICTURE']['src'] ?>" title="<?= $arResult['SECTION']['NAME'] ?>"
             alt=""/>

        <div class="clear"></div>
    </div>
</section>

