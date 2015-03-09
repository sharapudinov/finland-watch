<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
//test_dump($arResult);
?>
    <section class="main-block">
        <div class="news-block">
            <?
            if (count($arResult["ITEMS"]) < 1)
                return;
            ?>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_ELEMENT_DELETE_CONFIRM'))); ?>
                <div class="news">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news-a modal-news"><!-- ////////////////////////-->
                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" width="231" height="153" alt=""/>
                        <p class="dates-news"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></p>
                        <p class="title-news"><? echo $arItem["NAME"] ?></p>
                    </a>
                    <div class="lines-news"></div>
                    <ul class="social-card">
                        <li class="vk"><a href="#"></a></li>
                        <li class="f"><a href="#"></a></li>
                        <li class="tw"><a href="#"></a></li>
                        <li class="od"><a href="#"></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            <? endforeach; ?>
            <div class="clear"></div>
        </div>
    </section>

<section>
    <div class="page-next-link">
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
    </div>
</section>