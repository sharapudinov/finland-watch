<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
?>
<div class="clientage-block">
    <? if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0): ?>
            <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                <div class="clientage-text <?=($key % 2 == 0) ? 'left' : 'right' ?>">
                    <img src="<?= $arItem['PICTURE']['src'] ?>" title="" alt=""/>
                    <span class="title-clientage"><?= $arItem['NAME'] ?></span>
                    <p><?= $arItem['PREVIEW_TEXT'] ?> </p>
                </div>
            <? endforeach; ?>
    <? endif; ?>
    <div class="clear"></div>
</div>
