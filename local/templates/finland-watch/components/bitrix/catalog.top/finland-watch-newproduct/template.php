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
$this->setFrameMode(true);?>
<div class="jcarousel-wrapper wrap">
    <div class="jcarousel slider-two">
        <ul class="">
            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <li>
                    <div class="bg two">
                        <span class="browsing">
                            <a class="modal-card" href="/catalog/card-product-modal.php?ID=<?= $arItem['ID'] ?>"
                               data-fancybox-type="ajax">просмотр</a>
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
                            false
                        );?>
                        <div class="lines"></div>
                        <? if ($arItem["CAN_BUY"]): ?>
                            <p class="summ-goods">
                                <span class="black">
                                    <?= $arItem['PRICES']['BASE']['PRINT_VALUE'] ?>
                                    <span class="rouble">a</span>
                                </span>
                                <span class="red">
                                    <?= $arItem['PRICES']['BASE']["PRINT_DISCOUNT_VALUE"] ?>
                                    <span class="rouble">a</span>
                                </span>
                            </p>
                            <p class="profit">
                                Выгода
                                <span class="red">
                                    <?= $arItem['PRICES']['BASE']['PRINT_DISCOUNT_DIFF'] ?>
                                    <span class="rouble">a</span>
                                    (<?= $arItem['PRICES']['BASE']['DISCOUNT_DIFF_PERCENT'] ?>%)
                                </span>
                            </p>
                            <span id="<?=$arItem['ID'].'_'.rand()?>" class="basket-home"></span>
                        <? endif ?>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
    <a href="#" class="jcarousel-control-prev"></a>
    <a href="#" class="jcarousel-control-next"></a>
</div>


