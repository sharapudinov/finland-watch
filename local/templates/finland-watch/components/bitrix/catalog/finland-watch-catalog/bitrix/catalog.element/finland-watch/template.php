<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);
?>

<div class="block-slider-img-card-item-price card-product">
<div class="slider-img">

    <!-- Start photosgallery-vertical -->
    <div id="lofslidecontent45" class="lof-slidecontent lof-snleft">
        <div class="preload">
            <div></div>
        </div>
        <!-- MAIN CONTENT -->
        <div class="lof-main-outer">
            <ul class="lof-main-wapper">
                <li>
                    <span class="discounts"></span>
                    <span class="gifts"></span>
                    <img src="<?= $arResult["RESIZED_MAIN_PREVIEW"]["src"] ?>"
                         width="<?= $arResult['RESIZED_MAIN_REVIEW']['width'] ?>"
                         height="<?= $arResult['RESIZED_MAIN_PREVIEW']['heigth'] ?>" alt="<?= $arResult["NAME"] ?>"
                         title="<?= $arResult["NAME"] ?>"/>
                </li>
                <? if (count($arResult["RESIZED_MAIN_PHOTOS"]) > 0): ?>
                    <? foreach ($arResult["RESIZED_MAIN_PHOTOS"] as $PHOTO): ?>
                        <li>
                            <img src="<?= $PHOTO['src'] ?>" width="<?= $PHOTO['width'] ?>"
                                 height="<?= $PHOTO['height'] ?>" alt="<?= $arResult["NAME"] ?>"
                                 title="<?= $arResult["NAME"] ?>"/>
                        </li>
                    <? endforeach ?>
                <? endif ?>
            </ul>
        </div>
        <!-- END MAIN CONTENT -->
        <!-- NAVIGATOR -->

        <div class="lof-navigator-outer">
            <ul class="lof-navigator">
                <li>
                    <div>
                        <img src="<?= $arResult['RESIZED_PREVIEW']['src'] ?>"
                             width="<?= $arResult['RESIZED_PREVIEW']['width'] ?> height="<?= $arResult['RESIZED_PREVIEW']['heigth'] ?>
                             alt="<?= $arResult['NAME'] ?>" title="<?= $arResult['NAME'] ?>"/>
                    </div>
                </li>
                <? if (count($arResult["RESIZED_PHOTOS"]) > 0): ?>
                    <? foreach ($arResult["RESIZED_PHOTOS"] as $PHOTO): ?>
                        <li>
                            <div>
                                <img src="<?= $PHOTO['src'] ?>" width="<?= $PHOTO['width'] ?>"
                                     height="<?= $PHOTO['height'] ?>" alt="<?= $arResult["NAME"] ?>"
                                     title="<?= $arResult["NAME"] ?>"/>
                            </div>
                        </li>
                    <? endforeach ?>
                <? endif ?>

            </ul>
        </div>

    </div>
</div>
<div class="card-item-price">


    <div class="item-price">
        <?$APPLICATION->IncludeComponent(
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
            false
        );?>
        <h1><a href="#"><?= $arResult['NAME'] ?></a></h1>
        <ul class="cheaply-gift">
            <? if ($arResult["CAN_BUY"]): ?>
                <li class="icon-v">В наличии</li>
            <? endif ?>
            <li class="icon-s"><a href="#inline-two" class="one-cleek">Нашли дешевле?</a></li>
            <li class="icon-p"><a href="#buy-two-cleek" class="two-cleek">Хочу в подарок</a></li>
        </ul>
        <div class="clear"></div>
        <div class="lines-card"></div>
        <? if ($arResult["CAN_BUY"]): ?>
            <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
                <div class="card-price">
                    <p>Цена:
                        <span class="summ-card">
                            <?= $arResult['PRICES']['BASE']["DISCOUNT_VALUE"] ?>
                            <span class="rouble">a</span>
                        </span>
                        <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                        <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
                        <input class="buy-card" type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>"
                               value="<? echo GetMessage("CATALOG_BUY") ?>">

                </div>
            </form>
            <div class="no-price-link">
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
                                    (<?= $arResult['PRICES']['BASE']["DISCOUNT_DIFF_PERCENT"] ?>)
                                </span>
                            </span>
                        </span>
                    <a href="#buy-one-cleek" class="buy-card one-cleek">купить в 1 клик</a>

                </p>
            </div>
        <? endif ?>
    </div>
    <div class="block-discount-gift-timer">
        <div class="slider-discount">
            <div class="jcarousel-wrapper wrap">
                <p class="radio"><input id="pass-card" type="radio" name="radio-card" value=""/>
                    <label for="pass-card"></label></p>
                <div class="corner white"></div>
                <div class="jcarousel slider-two">
                    <?            $APPLICATION->IncludeComponent(
                        "bitrix:catalog.recommended.products",
                        "finland-watch-presents",
                        array(
                            "LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                            "TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
                            "ID" => $arResult['ID'],
                            "PROPERTY_LINK" => "PRESENTS",
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
                    <div class="clear"></div>
                </div>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
                <p class="jcarousel-pagination" style="display: none"></p>
            </div>
        </div>
        <div class="slider-discount">
            <div class="jcarousel-wrapper wrap">
                <p class="radio"><input id="pass-card2" type="radio" name="radio-card" value=""/>
                    <label for="pass-card2"></label></p>
                <div class="corner blue"></div>
                <div class="jcarousel slider-two slider-blue">
                    <ul class="">
                        <li>
                            <p class="nums">5099</p>

                            <p class="text-star">рублей</p>

                            <div class="gradient">
                                <p>скидка на второй товар</p>

                            </div>
                        </li>
                        <li>
                            <p class="nums">5300</p>

                            <p class="text-star">рублей</p>

                            <div class="gradient">
                                <p>скидка на второй товар</p>

                            </div>
                        </li>
                        <li>
                            <p class="nums">5120</p>

                            <p class="text-star">рублей</p>

                            <div class="gradient">
                                <p>скидка на второй товар</p>

                            </div>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            </div>
        </div>
        <div class="block-timer">
            <p>До конца акции:</p>
            <div class="timer" style="border: 1px solid #cccccc;">
            </div>
        </div>
        <div class="clear"></div>
    </div>
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

    <ul class="safeguards-card">
        <li class="icon-b"><span class="blue">БЕСПЛАТНАЯ </span><br/>доставка</li>
        <li class="icon-g"><span class="blue">ГАРАНТИЯ КАЧЕСТВА</span><br/> Обмен и возврат в течении 15 дней</li>
        <li class="icon-k"><a href="#">КУПИТЬ В КРЕДИТ</a><br/> на выгодных условиях</li>
    </ul>

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
                        <h5 class="icon-d"><a href="#">Скачайте инструкцию для ваших часов</a></h5>
                        <? if ($arResult["PREVIEW_TEXT"]): ?>
                            <?= $arResult["PREVIEW_TEXT"] ?>
                        <? elseif ($arResult["DETAIL_TEXT"]): ?>
                            <?= $arResult["DETAIL_TEXT"] ?>
                        <?endif; ?>
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
                            <?endif ?><br/>
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
                                            <?$APPLICATION->IncludeComponent(
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
                                                false
                                            );?>
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
                                    <h5>Suunto Ambit со встроенным прибором GPS</h5>

                                    <div class="block-video-card">
                                        <div class="video">
                                            <iframe width="560" height="315" src="//www.youtube.com/embed/5qanlirrRWs"
                                                    frameborder="0" allowfullscreen></iframe>
                                        </div>


                                        <h5>Suunto Ambit со встроенным прибором GPS</h5>

                                        <div class="video">
                                            <iframe width="560" height="315" src="//www.youtube.com/embed/5qanlirrRWs"
                                                    frameborder="0" allowfullscreen></iframe>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </li>
            </ul>

        </div>
    </div>


                <?            $APPLICATION->IncludeComponent(
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



<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function () {
        jQuery('#lofslidecontent45').lofJSidernews({
            interval: 2000,
            //easing:'easeOutBounce',
            duration: 0,
            maxItemDisplay: 4,
            navigatorHeight: 75,
            navigatorWidth: 90,
            auto: false
        });
    });

</script>
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


<!--	<? /* if (count($arResult["LINKED_ELEMENTS"])>0): */ ?>
<br/><b><? /*= $arResult["LINKED_ELEMENTS"][0]["IBLOCK_NAME"] */ ?>:</b>
<ul>
    <? /* foreach ($arResult["LINKED_ELEMENTS"] as $arElement): */ ?>
    <li><a href="<? /*= $arElement["DETAIL_PAGE_URL"] */ ?>"><? /*= $arElement["NAME"] */ ?></a></li>
    <? /* endforeach; */ ?>
</ul>
--><? /* endif */ ?>


