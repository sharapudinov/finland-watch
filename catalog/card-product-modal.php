<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");?>
<style>


</style>
<div id="card-product-modal" class="main-block-card-product-modal">

    <?

    $APPLICATION->IncludeComponent(
        "bitrix:catalog.element",
        "finland-watch",
        array(
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_ID" => "2",
            "PROPERTY_CODE" => array(
                0 => "TITLE",
                1 => "KEYWORDS",
                2 => "META_DESCRIPTION",
                3 => "ARTNUMBER",
                4 => "NEWPRODUCT",
                5 => "ACTION",
                6 => "SPECIALOFFER",
                7 => "SALELEAD",
                8 => "GENDER",
                9 => "SPORT",
                10 => "FUNCTIONS",
                11 => "BLOG_POST_ID",
                12 => "BLOG_COMMENTS_CNT",
                13 => "FORUM_MESSAGE_CNT",
                14 => "vote_count",
                15 => "rating",
                16 => "RECOMMEND",
                17 => "vote_sum",
                18 => "FORUM_TOPIC_ID",
                19 => $arParams["DETAIL_PROPERTY_CODE"],
                20 => "",
            ),
            "META_KEYWORDS" => "-",
            "META_DESCRIPTION" => "-",
            "BROWSER_TITLE" => "-",
            "BASKET_URL" => "/personal/cart/",
            "ACTION_VARIABLE" => "action",
            "PRODUCT_ID_VARIABLE" => "code",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "CHECK_SECTION_ID_VARIABLE" => "Y",
            "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
            "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "360000000",
            "CACHE_GROUPS" => "N",
            "SET_TITLE" => "Y",
            "SET_STATUS_404" => "N",
            "PRICE_CODE" => array(
                0 => "BASE",
            ),
            "USE_PRICE_COUNT" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "PRICE_VAT_INCLUDE" => "Y",
            "PRICE_VAT_SHOW_VALUE" => "N",
            "USE_PRODUCT_QUANTITY" => "N",
            "PRODUCT_PROPERTIES" => array(),
            "ADD_PROPERTIES_TO_BASKET" => "N",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "LINK_IBLOCK_TYPE" => "catalog",
            "LINK_IBLOCK_ID" => "2",
            "LINK_PROPERTY_SID" => "RECOMMEND",
            "LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],
            "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
            "OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
            "OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
            "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
            "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
            "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
            "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
            "ELEMENT_ID" => $_REQUEST["ID"],
            "ELEMENT_CODE" => $_REQUEST["CODE"],
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
            "SECTION_URL" => "#SECTION_CODE_PATH#",
            "DETAIL_URL" => "#SECTION_CODE_PATH##CODE#",
            "CONVERT_CURRENCY" => "N",
            "CURRENCY_ID" => $arParams["CURRENCY_ID"],
            "HIDE_NOT_AVAILABLE" => "N",
            "USE_ELEMENT_COUNTER" => "N",
            "ADD_PICT_PROP" => "-",
            "LABEL_PROP" => "-",
            "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
            "OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
            "PRODUCT_SUBSCRIPTION" => "N",
            "SHOW_DISCOUNT_PERCENT" => "Y",
            "SHOW_OLD_PRICE" => "Y",
            "SHOW_MAX_QUANTITY" => "N",
            "MESS_BTN_BUY" => $arParams["MESS_BTN_BUY"],
            "MESS_BTN_ADD_TO_BASKET" => $arParams["MESS_BTN_ADD_TO_BASKET"],
            "MESS_BTN_SUBSCRIBE" => $arParams["MESS_BTN_SUBSCRIBE"],
            "MESS_BTN_COMPARE" => $arParams["MESS_BTN_COMPARE"],
            "MESS_NOT_AVAILABLE" => $arParams["MESS_NOT_AVAILABLE"],
            "USE_VOTE_RATING" => "Y",
            "VOTE_DISPLAY_AS_RATING" => "rating",
            "USE_COMMENTS" => "Y",
            "BLOG_USE" => "N",
            "BLOG_URL" => (isset($arParams["DETAIL_BLOG_URL"]) ? $arParams["DETAIL_BLOG_URL"] : ""),
            "BLOG_EMAIL_NOTIFY" => (isset($arParams["DETAIL_BLOG_EMAIL_NOTIFY"]) ? $arParams["DETAIL_BLOG_EMAIL_NOTIFY"] : ""),
            "VK_USE" => "N",
            "VK_API_ID" => (isset($arParams["DETAIL_VK_API_ID"]) ? $arParams["DETAIL_VK_API_ID"] : "API_ID"),
            "FB_USE" => "N",
            "FB_APP_ID" => (isset($arParams["DETAIL_FB_APP_ID"]) ? $arParams["DETAIL_FB_APP_ID"] : ""),
            "BRAND_USE" => "N",
            "BRAND_PROP_CODE" => (isset($arParams["DETAIL_BRAND_PROP_CODE"]) ? $arParams["DETAIL_BRAND_PROP_CODE"] : ""),
            "DISPLAY_NAME" => "N",
            "ADD_DETAIL_TO_SLIDER" => "N",
            "TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"]) ? $arParams["TEMPLATE_THEME"] : ""),
            "ADD_SECTIONS_CHAIN" => "N",
            "ADD_ELEMENT_CHAIN" => "N",
            "DISPLAY_PREVIEW_TEXT_MODE" => "S",
            "DETAIL_PICTURE_MODE" => "IMG",
            "ADD_TO_BASKET_ACTION" => array(
                0 => "BUY",
            ),
            "SHOW_CLOSE_POPUP" => "N",
            "DISPLAY_COMPARE" => "N",
            "COMPARE_PATH" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["compare"],
            "SHOW_BASIS_PRICE" => (isset($arParams["DETAIL_SHOW_BASIS_PRICE"]) ? $arParams["DETAIL_SHOW_BASIS_PRICE"] : "Y"),
            "OFFERS_LIMIT" => "0",
            "SET_BROWSER_TITLE" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_META_DESCRIPTION" => "Y"
        ),
        false
    );?>
</div>