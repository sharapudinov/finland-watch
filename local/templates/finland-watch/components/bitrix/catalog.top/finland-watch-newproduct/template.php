<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
$this->setFrameMode(true);?>
<div class="jcarousel-wrapper wrap">
    <div class="jcarousel slider-two">
        <ul class="">
            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <li>
                    <div class="bg">
                        <span class="browsing">
                            <a href="#">просмотр</a>
                        </span>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" width="219" height="219"/>
                        </a>

                        <div class="lines"></div>
                        <p class="name-goods">
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                        </p>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:iblock.vote",
                            "finland-watch-stars",
                            array(
                                "IBLOCK_TYPE" => "catalog",
                                "IBLOCK_ID" => "2",
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
                            false
                        );?>
                        <!-- <div id="rating_2" class="rating-one">
                             <input type="hidden" name="val" value="2.75"/>
                             <input type="hidden" name="votes" value="2"/>
                             <input type="hidden" name="vote-id" value="2"/>
                             <input type="hidden" name="cat_id" value="2"/>
                         </div>-->
                        <div class="lines"></div>
                        <p class="summ-goods">
                         <span class="black"><?= $arItem['PRICES']['BASE']['PRINT_VALUE'] ?>
                             <span class="rouble">a</span>
                         </span>
                         <span class="red"><?= $arItem['PRICES']['BASE']["PRINT_DISCOUNT_VALUE"] ?>
                             <span class="rouble">a</span>
                         </span>
                        </p>

                        <p class="profit">Выгода <span
                                class="red"><?= $arItem['PRICES']['BASE']['PRINT_DISCOUNT_DIFF'] ?><span class="rouble">a</span> (<?= $arItem['PRICES']['BASE']['DISCOUNT_DIFF_PERCENT'] ?>
                                )</span></p>
                        <span class="basket-home"></span>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
    <a href="#" class="jcarousel-control-prev"></a>
    <a href="#" class="jcarousel-control-next"></a>
</div>


