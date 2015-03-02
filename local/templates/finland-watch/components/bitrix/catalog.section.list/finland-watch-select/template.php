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

$strTitle = "";
?>
    <div class="select-option one">
        <div class="box visible">
            <div class="section">
                <div class="sec">
                    <select class="select-sport" data-placeholder="Выберите серию">
                        <option></option>
                        <?
                        $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
                        $CURRENT_DEPTH = $TOP_DEPTH;
                        foreach ($arResult["SECTIONS"] as $arSection) {
                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                            if ($arSection['DEPTH_LEVEL'] == 1):?>
                                <option value="<?= $arSection['CODE'] ?>"><?= $arSection['NAME'] ?></option>
                            <?endif;
                        }?>
                    </select>
                </div>
            </div>
        </div>
    </div>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function () {
        jQuery('.select-sport').styler({
            selectSearch: true
        });
    });
</script>
