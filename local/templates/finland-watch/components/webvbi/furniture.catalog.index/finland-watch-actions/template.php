<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
?>
<?
if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0):
    ?>
    <?
foreach ($arResult['ITEMS'] as $arItem):
    ?>
    <section>
        <div class="block-action action-top">
            <div class="block-img-action-text">
                <div class="img-action">
                    <img src="<?= $arItem['PICTURE']['src'] ?>" class="main-img"/>
                </div>
                <div class="action-text">
                    <h4><?= $arItem['PREVIEW_TEXT'] ?></h4>
                    <p><?= $arItem['DETAIL_TEXT'] ?></p>
                </div>
                <div class="clear"></div>
            </div>

        </div>
    </section>
    <?$APPLICATION->IncludeComponent(
    "bitrix:catalog.recommended.products",
    "finland-watch-actions",
    array(
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "5",
        "ID" => $arItem['ID'],
        "CODE" => $_REQUEST["PRODUCT_CODE"],
        "PROPERTY_LINK" => "RECOMMEND",
        "OFFERS_PROPERTY_LINK" => "RECOMMEND",
        "HIDE_NOT_AVAILABLE" => "N",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "PRODUCT_SUBSCRIPTION" => "N",
        "SHOW_NAME" => "Y",
        "SHOW_IMAGE" => "Y",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "PAGE_ELEMENT_COUNT" => "30",
        "LINE_ELEMENT_COUNT" => "",
        "TEMPLATE_THEME" => "blue",
        "DETAIL_URL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "86400",
        "SHOW_OLD_PRICE" => "Y",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "BASKET_URL" => "/personal/cart",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "N",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "USE_PRODUCT_QUANTITY" => "N",
        "SHOW_PRODUCTS_2" => "Y",
        "PROPERTY_CODE_2" => array(
            0 => "",
            1 => "",
        ),
        "ADDITIONAL_PICT_PROP_2" => "MORE_PHOTO",
        "LABEL_PROP_2" => "-",
        "PROPERTY_CODE_3" => array(
            0 => "",
            1 => "",
        ),
        "ADDITIONAL_PICT_PROP_3" => "MORE_PHOTO",
        "OFFER_TREE_PROPS_3" => array(
            0 => "-",
        ),
        "CART_PROPERTIES_2" => array(
            0 => "",
            1 => "",
        ),
        "CART_PROPERTIES_3" => array(
            0 => "",
            1 => "",
        )
    ),
    $component
);?>

<?
endforeach;

endif;
?>
