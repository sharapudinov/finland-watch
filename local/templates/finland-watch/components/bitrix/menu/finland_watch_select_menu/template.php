<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="select-option">
    <form action="" method="post">
        <div class="box visible">
            <div class="section">
                <div class="sec">
                    <select class="select-section" data-placeholder="Выберите вид спорта">
                        <option></option>
                        <? foreach ($arResult as $itemIndex => $arItem): ?>
                            <option value="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
