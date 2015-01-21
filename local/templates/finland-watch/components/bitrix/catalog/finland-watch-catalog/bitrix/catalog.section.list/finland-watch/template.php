<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="catalog-home-link">

    <ul>
        <?
        foreach ($arResult['SECTIONS'] as $key => &$arSection) {
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

        ?>
        <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
                <? echo $arSection['NAME']; ?>
            </a>
            <?if ($arParams["COUNT_ELEMENTS"]) {
                ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
            }
            ?>
        </li>
        <?if ($key == 8): ?>
    </ul>
    <ul>
        <?endif ?>
        <?
        }
        ?>
    </ul>

    ?>
</div>