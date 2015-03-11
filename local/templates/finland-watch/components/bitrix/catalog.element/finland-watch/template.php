<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
/*CModule::IncludeModule('catalog');
$dbDisc=CCatalogDiscount::GetDiscount(
    $arResult['ID'],
    2,
    array(),
    array(),
    "N",
    false,
    false,
    true,
    false
);

user_dump($dbDisc);*/

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
<style>
    .MagicScroll {
        float: left;
    }

    .MagicScrollItem {
        padding: 2px;
    }
</style>

<div class="block-slider-img-card-item-price card-product">
    <div class="slider-img">
        <div class="clearfix block-zoom">
            <div class="clearfix small">
                <div class="MagicScroll" id="outside">

                    <a class="selector" href="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" rel="zoom-id: zoom;"
                       rev="<?= $arResult["RESIZED_MAIN_PREVIEW"]["src"] ?>">
                        <img src="<?= $arResult["RESIZED_PREVIEW"]["src"] ?>"/>
                    </a>

                    <!-- Thumbnails -->
                    <? foreach ($arResult["MORE_PHOTO"] as $key => $PHOTO): ?>

                        <a href="<?= $PHOTO['SRC'] ?>" rel="zoom-id: zoom;"
                           rev="<?= $arResult['RESIZED_MAIN_PHOTOS'][$key]['src'] ?>">
                            <img src="<?= $arResult["RESIZED_PHOTOS"][$key]["src"] ?>"/>
                        </a>

                    <? endforeach ?>
                </div>

                <a href="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" class="MagicZoomPlus" id="zoom">
                    <img src="<?= $arResult["RESIZED_MAIN_PREVIEW"]["src"] ?>"/>
                </a>
                <span class="discounts"></span>
                <span class="gifts"></span>

            </div>
        </div>
    </div>
    <div class="card-item-price">


        <div class="item-price">
            <? $APPLICATION->IncludeComponent(
                "bitrix:iblock.vote",
                "finland-watch-stars",
                array(
                    "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                    "ELEMENT_ID" => $arResult["ID"],
                    "ELEMENT_CODE" => "",
                    "MAX_VOTE" => "5",
                    "VOTE_NAMES" => array(
                        0 => "0",
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                    ),
                    "SET_STATUS_404" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "DISPLAY_AS_RATING" => "rating"
                ),
                $component
            ); ?>
            <h1><a href="#"><?= $arResult['NAME'] ?></a></h1>
            <? if ($arResult["CAN_BUY"]): ?>
            <ul class="cheaply-gift">

                <li class="icon-v">В наличии</li>
                <li class="icon-s"><a href="#inline-two" class="one-cleek">Нашли дешевле?</a></li>
                <li class="icon-p"><a href="#buy-two-cleek" class="two-cleek">Хочу в подарок</a></li>
            </ul>
            <div class="clear"></div>
            <div class="lines-card"></div>

            <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
                <div class="card-price">
                    <p>Цена:
                        <span class="summ-card">
                            <?= $arResult['PRICES']['BASE']["PRINT_DISCOUNT_VALUE"] ?>
                            <span class="rouble">a</span>
                        </span>
                        <input type="hidden" name="<? echo $arParams["ACTION_VARIABLE"] ?>" value="BUY">
                        <input type="hidden" name="<? echo $arParams["PRODUCT_ID_VARIABLE"] ?>"
                               value="<? echo $arResult["ID"] ?>">
                        <input class="buy-card" type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>"
                               value="<? echo GetMessage("CATALOG_BUY") ?>">

                </div>
            </form>
            <div class="no-price-link">
                <? if ($arResult['PRICES']['BASE']["PRINT_DISCOUNT_DIFF"]): ?>
                <p>Старая цена: <br/>
                        <span class="summ-card red">
                            <?= $arResult['PRICES']['BASE']["PRINT_VALUE"] ?>
                            <span class="rouble">a</span>
                        </span>
                        <span class="savings">Вы экономите:<br/>
                            <span class="red">
                                <?= $arResult['PRICES']['BASE']["PRINT_DISCOUNT_DIFF"] ?>
                                <span class="rouble">a</span>
                                <span class="percent">
                                    (<?= $arResult['PRICES']['BASE']["DISCOUNT_DIFF_PERCENT"] ?>%)
                                </span>
                            </span>
                        </span>
                    <? endif ?>
                    <a href="/ajax/one_click.php?name=<?=str_replace(' ','+',$arResult['NAME'])?>&price=<?=$arResult['PRICES']['BASE']["DISCOUNT_VALUE"]?>&picture=<?=$arResult["RESIZED_MAIN_PREVIEW"]["src"]?>" class="buy-card one-cleek">купить в 1 клик</a>

                </p>
            </div>
        </div>
        <div class="discount-login-not">
            <?if (!$USER->IsAuthorized()):?>
                <?$arPrice = CCatalogProduct::GetOptimalPrice($arResult['ID'], 1, array(5), 'N');?>
                <? if ($arResult['PROPERTIES']['ACTIONS']['VALUE'] && is_array($arPrice ["RESULT_PRICE"])): ?>
                <span class="discount-login-not-bg"></span> <!-- Белая подложка -->
                <p class="login-not-text"><span class="red">Только сегодня!</span> Цена при регистрации:</p>
                <p class="login-not-price-num"> <?= round($arPrice["RESULT_PRICE"]["DISCOUNT_PRICE"])?> <span class="rouble">a</span></p>

                    <?$day=date('d').'.'.date('m').'.'.date('Y');
                    $APPLICATION->IncludeComponent(
                        "orion:trigger.deadline",
                        "finland-watch",
                        array(
                            "IBLOCK_TYPE" => "catalog",
                            "IBLOCK_ID" => "2",
                            "IBLOCK_ELEMENT_ID" => $arResult['ID'],
                            "ACTION_BEGIN_PROP" => "",
                            "ACTION_END_PROP" => "",
                            "ACTION_BEGIN_VAL" => $day." 00:00:00",
                            "ACTION_END_VAL" => $day." 23:59:59",
                            "ACTION_INTERVAL" => "N",
                            "VIEW_CAP_NAME" => "До окончания акции:",
                            "VIEW_CAP_END_NAME" => "Акция завершена:",
                            "VIEW_CAP_POS" => "UP",
                            "VIEW_DESC" => "N",
                            "VIEW_DESC_POS" => "DOWN",
                            "VIEW_FORMAT" => "3",
                            "VIEW_SIZE_PROP" => "SMALL",
                            "VIEW_TYPE_PROP" => "2",
                            "START_UNTIL_BEGIN_ACTION" => "N",
                            "COMPONENT_ID" => "",
                            "IN_CACHE_CONT" => "N",
                            "VIEW_COLOR_PROP" => "BLACK",
                            "VIEW_SPEED" => "1",
                            "ACTION_INTERVAL_VALUE" => "1",
                            "ACTION_INTERVAL_TYPE" => "d",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "0"
                        ),
                        $component
                    );?>
                <? endif ?>
            <?endif?>
        </div>
        <? endif ?>

        </form>
        <div class="lines-card"></div>
    </div>
    <div class="clear"></div>

    <div class="block-social-vantage-link">
        <ul class="social-card">
            <li class="vk"><a href="#"></a></li>
            <li class="f"><a href="#"></a></li>
            <li class="tw"><a href="#"></a></li>
            <li class="od"><a href="#"></a></li>
            <li class="live"><a href="#"></a></li>
            <li class="goo"><a href="#"></a></li>
            <li class="mail"><a href="#"></a></li>
            <li class="ya"><a href="#"></a></li>
        </ul>
        <? if ($arResult["CAN_BUY"]): ?>

            <ul class="safeguards-card">
                <li class="icon-b"><a href="/about/delivery/"><span class="blue"> БЕСПЛАТНАЯ </span><br/>доставка</a>
                </li>
                <li class="icon-g"><a href="/about/guaranty/"><span class="blue">ГАРАНТИЯ КАЧЕСТВА</span></a><br/> Обмен
                    и возврат в течении 15 дней
                </li>
                <li class="icon-k"><a href="#">КУПИТЬ В КРЕДИТ</a><br/> на выгодных условиях</li>
            </ul>
        <? endif ?>
        <div class="clear"></div>
    </div>

</div>
<div class="clear"></div>
<div class="block-tab-article-sitebar-card">
    <div class="block-tab-article">
        <div class="container-tab">

            <ul class="accordion-tabs">
                <li class="tab-head-cont">
                    <a href="#" class="is-active a-tab">Обзор</a>

                    <div class="text-tabs">
                        <h5 class="icon-d"><a target="_blank" href="<?= CFile::GetPath($arResult['PROPERTIES']['MANUAL']['VALUE']) ?>">Скачайте
                                инструкцию для ваших часов</a></h5>
                        <? if ($arResult["PREVIEW_TEXT"]): ?>
                            <?= $arResult["PREVIEW_TEXT"] ?>
                        <? elseif ($arResult["DETAIL_TEXT"]): ?>
                            <?= $arResult["DETAIL_TEXT"] ?>
                        <? endif; ?>
                    </div>
                </li>
                <li class="tab-head-cont">
                    <a href="#" class="a-tab">Характеристики</a>

                    <div class="text-tabs">
                        <h5>Характеристики</h5>
                        <? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
                            <b><?= $arProperty["NAME"] ?>:</b>&nbsp;<?
                            if (is_array($arProperty["DISPLAY_VALUE"])):
                                echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
                            elseif ($pid == "MANUAL"):
                                ?><a href="<?= $arProperty["VALUE"] ?>"><?= GetMessage("CATALOG_DOWNLOAD") ?></a><?
                            else:
                                echo $arProperty["DISPLAY_VALUE"];?>
                            <? endif ?><br/>
                        <? endforeach ?>
                    </div>
                </li>
                <li class="tab-head-cont">
                    <a href="#" class="a-tab">Отзывы</a>

                    <div class="text-tabs">
                        <section>
                            <div class="comment-card-form">
                                <h5>НАПИСАТЬ ОТЗЫВ</h5>

                                <div class="comment-form">
                                    <form action="#" method="POST" name="">
                                        <p><input type="text" name="name" placeholder="Имя *"/><input type="text"
                                                                                                      name="name"
                                                                                                      class="tems"
                                                                                                      placeholder="Тема сообщения"/>
                                        </p>

                                        <p><input type="text" name="email" placeholder="E-mail"/> <span
                                                class="rating-text">Рейтинг товара </span>
                                        </p>

                                        <div id="rating_3" class="rating-main">
                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:iblock.vote",
                                                "finland-watch-stars",
                                                array(
                                                    "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                                                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                                                    "ELEMENT_ID" => $arResult["ID"],
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
                                                    "DISPLAY_AS_RATING" => "rating"
                                                ),
                                                $component
                                            ); ?>
                                        </div>

                                        <p><textarea cols="25" rows="2" placeholder="Отзыв *"></textarea></p>

                                        <p class="submit-card"><input type="submit" name="submit-card"
                                                                      value="отправить отзыв"/></p>
                                    </form>


                                </div>

                            </div>

                        </section>

                        <section>
                            <h5>Покупка Suunto Ambit Sliver <span class="date-card">12.10.2014</span></h5>

                            <p>Suunto Elementum Terra – это модель, которая объединяют десятилетия опыта аутдор с целой
                                жизнью в искусстве точности, образуя жизненно важный инструмент, без которого не сможет
                                обойтись настоящий любитель приключений. Модель Terra снабжена всем необходимым –
                                альтиметром для измерения высоты, барометром, который поможет предсказать изменение
                                погодных условий и компасом, который определит направление движения. Часы обеспечат вас
                                информацией, которая придаст вам максимальную уверенность как в городе, так и на
                                природе.</p>

                            <div class="block-social-vantage-link">
                                <ul class="social-card">
                                    <li class="vk"><a href="#"></a></li>
                                    <li class="f"><a href="#"></a></li>
                                    <li class="tw"><a href="#"></a></li>
                                    <li class="od"><a href="#"></a></li>

                                </ul>


                                <div class="clear"></div>
                            </div>
                        </section>
                        <li class="tab-head-cont">
                            <a href="#" class="a-tab">Видео</a>

                            <div class="text-tabs">
                                <section>
                                    <div class="block-video-card">
                                        <? if (!empty($arResult['VIDEO'])):
                                            $counter = 0;
                                            foreach ($arResult['VIDEO'] as $key => $arItem) {
                                                ?>
                                                <h5><?= $arItem['NAME'] ?></h5>
                                                <div class="video">
                                                    <iframe width="560" height="315"
                                                            src="//<?= $arItem['PREVIEW_TEXT'] ?>"
                                                            frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            <?
                                            }
                                        endif;
                                        ?>
                                    </div>
                                </section>
                            </div>
                        </li>
            </ul>

        </div>
    </div>


    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog.recommended.products",
        "finland-watch-vertical",
        array(
            "LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
            "TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
            "ID" => $arResult['ID'],
            "PROPERTY_LINK" => ($arRecomData['IBLOCK_LINK'] != '' ? $arRecomData['IBLOCK_LINK'] : $arRecomData['ALL_LINK']),
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "BASKET_URL" => $arParams["BASKET_URL"],
            "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
            "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
            "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
            "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
            "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
            "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
            "PAGE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
            "SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
            "SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
            "PRODUCT_SUBSCRIPTION" => 'N',
            "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
            "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
            "SHOW_NAME" => "Y",
            "SHOW_IMAGE" => "Y",
            "MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
            "MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
            "MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
            "MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
            "SHOW_PRODUCTS_" . $arParams["IBLOCK_ID"] => "Y",
            "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
            "OFFER_TREE_PROPS_" . $arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
            "OFFER_TREE_PROPS_" . $arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
            "ADDITIONAL_PICT_PROP_" . $arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
            "ADDITIONAL_PICT_PROP_" . $arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
            "PROPERTY_CODE_" . $arRecomData['OFFER_IBLOCK_ID'] => array(),
            "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
            "CURRENCY_ID" => $arParams["CURRENCY_ID"]
        ),
        $component,
        array("HIDE_ICONS" => "Y")
    );
    ?>
</div>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function () {
        jQuery('.accordion-tabs').children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
        jQuery('.accordion-tabs').on('click', 'li > a', function (event) {
            if (!jQuery(this).hasClass('is-active')) {
                event.preventDefault();
                jQuery('.accordion-tabs .is-open').removeClass('is-open').hide();
                jQuery(this).next().toggleClass('is-open').toggle();
                jQuery('.accordion-tabs').find('.is-active').removeClass('is-active');
                jQuery(this).addClass('is-active');
            } else {
                event.preventDefault();
            }
        });
    });
</script>
<script type="text/javascript">
    MagicZoomPlus.options = {
        'hint': false,
        'selectors-mouseover-delay': 200,
        'zoom-width': 400,
        'zoom-height': 400,
        'zoom-distance': 5,
        'show-title': 'false',
        'opacity': 20,
        'selectors-class': 'selected',
        'drag-mode': 'false',
        'slideshow-effect': 'fade',
        'expand-size': 'original'

    };
    MagicScroll.options = {
        'duration': 500,
        'step': 2,
        'step': 2,
        'items': <?=count($arResult['MORE_PHOTO'])>=3?4:count($arResult['MORE_PHOTO'])+1?>,
        'direction': 'top'
    };
    MagicScroll.extraOptions.outside = {
        'arrows': 'outside',
        'arrows-opacity': 100
    };

</script>
