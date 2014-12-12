<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);?>


<ul>

    <? if (!empty($arResult['ITEMS'])):
    $counter = 0;
    foreach ($arResult['ITEMS'] as $key => $arItem) {
        $counter++;
        ?>
        <li id=<?="present_" . $counter ?>>
            <a href="#"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"/></a>

            <p class="red">+ подарок</p>
        </li>
    <?
    }
    endif;
    ?>
</ul>




