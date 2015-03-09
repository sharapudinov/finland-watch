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
?>


<ul>


    <?
    if (!$arResult["NavShowAlways"]) {
        if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
            return;
    }

    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
    ?>

    <? if ($arResult["NavPageNomer"] > 1): ?>

        <? if ($arResult["bSavePage"]): ?>
            <li class="prev">
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a>
            </li>

        <? else: ?>

            <? if ($arResult["NavPageNomer"] > 2): ?>
                <li class="prev">
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a>
                </li>
            <? else: ?>
                <li class="prev">
                    <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"></a>
                </li>
            <?endif ?>

        <?endif ?>

    <? else: ?>
        <li class="prev"></li>
    <?endif ?>

    <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>
        <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
            <li class="link-p active">
                <a href="">
                    <?= $arResult["nStartPage"] ?>
                </a>
            </li>
        <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
            <li class="link-p"><a
                    href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
            </li>
        <?
        else: ?>
            <li class="link-p"><a
                    href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
            </li>
        <?endif ?>
        <? $arResult["nStartPage"]++ ?>
    <? endwhile ?>


    <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
        <li class="next">
            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"></a>
        </li>

    <? else: ?>
        <li class="next"></li>
    <?endif ?>


</ul>