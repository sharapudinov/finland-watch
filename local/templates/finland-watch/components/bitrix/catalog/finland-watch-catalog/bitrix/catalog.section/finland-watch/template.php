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
$this->setFrameMode(true);
$cell=0;
?>
<? foreach ($arResult["ITEMS"] as $cell => $arElement): ?>
    <?
    $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
    ?>
    <? if ($cell % $arParams["LINE_ELEMENT_COUNT"] == 0): ?>
        <section>

        <div class="slider-home catalog">

        <div class="wrap-catalog">
        <div class="slider-two">
        <ul class="">
    <? endif; ?>
    <li id="<?= $this->GetEditAreaId($arElement['ID']); ?>">
        <div class="bg two">
            <span class="browsing">
                <a href="#">просмотр</a>
            </span>
            <span class="gifts"></span>
            <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                <img src="<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>" width="219" height="219"/>
            </a>

            <div class="lines"></div>
            <p class="name-goods"><a href="#"><?= $arElement["NAME"] ?></a></p>

            <?$APPLICATION->IncludeComponent(
                "bitrix:iblock.vote",
                "finland-watch-stars",
                array(
                    "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                    "ELEMENT_ID" => $arElement["ID"],
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
            <? foreach ($arElement["PRICES"] as $code => $arPrice): ?>
                <? if ($arPrice["CAN_ACCESS"]): ?>
                    <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
                        <p class="summ-goods">
                            <span class="black">
                                <?= $arPrice["PRINT_VALUE"] ?>
                                <span class="rouble">a</span>
                            </span>
                            <span class="red">
                                <?= $arPrice["PRINT_DISCOUNT_VALUE"] ?>
                                <span class="rouble">a</span>
                            </span>
                        </p>
                        <p class="profit">
                            Выгода
                        <span class="red">
                            <?= $arPrice["PRINT_DISCOUNT_VALUE"] ?>
                            <span class="rouble">a</span> (15%)
                        </span>
                        </p>
                    <? else: ?>
                        <span class="red">
                        <?= $arPrice["PRINT_DISCOUNT_VALUE"] ?>
                            <span class="rouble">a</span>
                        </span>
                    <?endif; ?>
                <? endif; ?>
                <? if ($arElement["CAN_BUY"]): ?>
                    <noindex>
                        <!--<a href="<? /* echo $arElement["BUY_URL"] */ ?>"
                   rel="nofollow"><? /* echo GetMessage("CATALOG_BUY") */ ?></a>&nbsp;-->
                        <a class="basket-home" href="<? echo $arElement["ADD_URL"] ?>"
                           rel="nofollow"></a>
                    </noindex>
                <? elseif ((count($arResult["PRICES"]) > 0) || is_array($arElement["PRICE_MATRIX"])): ?>
                    <?= GetMessage("CATALOG_NOT_AVAILABLE") ?>
                <?endif ?>
            <? endforeach; ?>

        </div>

    </li>
    <?$cell++;
    if ($cell % $arParams["LINE_ELEMENT_COUNT"] == 0):?>
        </ul>
        </div>
        </div>
        </div>
        </section>
    <? endif ?>

<? endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

<? if ($cell % $arParams["LINE_ELEMENT_COUNT"] != 0): ?>
    <? while (($cell++) % $arParams["LINE_ELEMENT_COUNT"] != 0): ?>
        <li>&nbsp;</li>
    <? endwhile; ?>
    </ul>
    </div>
    </div>
    </div>
    </section>
<? endif ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <section class="floatleft">
        <div class="page-next-link">
            <?= $arResult["NAV_STRING"] ?>
        </div>
    </section>
<? endif; ?>
