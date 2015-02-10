<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
$this->setFrameMode(true); ?>

<div id="container-mini">
    <? //test_dump($arResult);?>
    <div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
    <div id="slider-mini">
        <ul>
            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <li>
                    <div class="content-mini">
                        <img src="<?= $arItem['RESIZED_PREVIEW']['src'] ?>" width="148px"/>

                        <p class="title-mini">
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                <?= $arItem["NAME"] ?>
                            </a>
                        </p>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:iblock.vote",
                            "finland-watch-stars",
                            array(
                                "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                                "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                                "ELEMENT_ID" => $arItem["ID"],
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

                        <div class="new-price-slider">
                            <p class="new-price-p">
                                Новая цена:
                            </p>

                            <p class="new-summ red">
                                <?= $arItem['MIN_PRICE']["PRINT_DISCOUNT_VALUE"] ?>
                                <span class="rouble">a</span>
                            </p>
                        </div>

                        <p class="old-price">
                            <? if ($arItem['MIN_PRICE']['DISCOUNT_DIFF']): ?>
                                Старая цена: <br/>
                                <span class="summ red">
                                 <?= $arItem['MIN_PRICE']['PRINT_VALUE'] ?>
                                    <span class="rouble">a</span>
                             </span>
                            <? endif ?>
                        </p>

                        <p class="old-price">
                            <? if ($arItem['MIN_PRICE']['DISCOUNT_DIFF']): ?>

                                Вы экономите: <br/>
                                <span class="summ red-two">
                                <?= $arItem['MIN_PRICE']['DISCOUNT_DIFF'] ?>
                                    <span class="rouble">a</span>
                             </span>
                            <? endif ?>
                        </p>

                        <p class="link-sm"><a href="#buy-one-cleek" class="one-cleek">купить в 1 клик</a><a
                                id="<?= $arItem['ID'] . '_' . rand() ?>" href="#" class="buy">купить</a></p>

                        <p class="catch red">Успей заказать сегодня!</p>

                        <div class="clear"></div>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
    <ul id="pagination" class="pagination">
        <? for ($i = 0; $i < count($arResult["ITEMS"]); $i++): ?>
            <li onclick="slideshow.pos(<?= $i ?>)"></li>
        <? endfor ?>
    </ul>
</div>
<script type="text/javascript">
    var slideshow = new TINY.slider.slide('slideshow', {
        id: 'slider-mini',
        auto: 0,
        resume: false,
        vertical: false,
        //navid:'pagination',
        activeclass: 'current',
        position: 0,
        rewind: false,
        elastic: true,
        left: 'slideleft',
        right: 'slideright'
    });
</script>