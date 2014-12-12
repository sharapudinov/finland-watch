<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
?>
<? if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0): ?>
    <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
        <div class="block-video-pages">
            <div class="video">
                <iframe width="560" height="315" src="//<?= $arItem['PREVIEW_TEXT'] ?>" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <h5> <?= $arItem['NAME'] ?></h5>
            <div class="clear"></div>
        </div>

    <? endforeach; ?>
<? endif; ?>
