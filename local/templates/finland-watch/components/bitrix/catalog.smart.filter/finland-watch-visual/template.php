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
<div class="calculator-main">
    <form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="/catalog/all/"
          method="get">
        <? foreach ($arResult["HIDDEN"] as $arItem): ?>
            <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>"
                   value="<? echo $arItem["HTML_VALUE"] ?>"/>
        <? endforeach; ?>
        <div class="calculator-block-top">
            <div class="calculator-select">
                <div class="text-sel">
                    <p>Я хочу:</p>

                    <p>Часы для:</p>

                    <p>Серия:</p>

                </div>
                <div class="select-option">
                    <div class="box visible">
                        <div class="section">
                            <div class="sec">
                                <select>
                                    <option value="">-----</option>
                                    <? foreach ($arResult['ITEMS'][8]["VALUES"] as $val => $ar): ?>
                                        <option
                                            value="<? echo $ar["HTML_VALUE"] ?>"
                                            name="<? echo $ar["CONTROL_NAME"] ?>"
                                            id="<? echo $ar["CONTROL_ID"] ?>"
                                            <? echo $ar["CHECKED"] ? 'selected="selected"' : '' ?>
                                            >
                                            <? echo $ar["VALUE"]; ?>
                                        </option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box visible">
                        <div class="section">
                            <div class="sec">
                                <select>
                                    <option value="">-----</option>
                                    <? foreach ($arResult['ITEMS'][49]["VALUES"] as $val => $ar): ?>
                                        <option
                                            value="<? echo $ar["HTML_VALUE"] ?>"
                                            name="<? echo $ar["CONTROL_NAME"] ?>"
                                            id="<? echo $ar["CONTROL_ID"] ?>"
                                            <? echo $ar["CHECKED"] ? 'selected="selected"' : '' ?>
                                            >
                                            <? echo $ar["VALUE"]; ?>
                                        </option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "finland-watch-select-filter",
                        array(
                            "IBLOCK_TYPE" => "catalog",
                            "IBLOCK_ID" => "2",
                            "SECTION_ID" => "",
                            "SECTION_CODE" => "",
                            "COUNT_ELEMENTS" => "Y",
                            "TOP_DEPTH" => "2",
                            "SECTION_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SECTION_URL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "Y",
                            "ADD_SECTIONS_CHAIN" => "Y"
                        ),
                        $component
                    ); ?>
                    <script type="text/javascript">
                        jQuery.noConflict();
                        jQuery(document).ready(function () {
                            jQuery("select").on("change", function () {
                                jQuery(this).attr('name', jQuery(this).find('option:selected').attr('name'));
                            });
                        });
                    </script>
                </div>
            </div>
            <? foreach ($arResult["ITEMS"] as $key => $arItem):
                $key = md5($key);
                if (isset($arItem["PRICE"])):
                    if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
                        continue;
                    ?>
                    <div class="slider-namber">
                        <p class="price">По цене:</p>

                        <div class="main">
                            <div class="formCost">
                    		<span class="cost left"><label
                                    for="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"></label>
                            <input
                                class="min-price"
                                type="text"
                                name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
                                size="5"
                                />
                            <span class="cost right"><label
                                    for="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>">_</label>
                            <input
                                class="max-price"
                                type="text"
                                name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
                                size="5"
                                />
                            </div>
                            <div class="sliderCont">
                                <div id="slider"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <script>
                        /* слайдер цен */
                        jQuery.noConflict();
                        jQuery(document).ready(function () {
                            jQuery("#slider").slider({
                                min:  <?=$arItem["VALUES"]["MIN"]["VALUE"]?>,
                                max: <?=$arItem["VALUES"]["MAX"]["VALUE"]?>,
                                values: [<?=$arItem["VALUES"]["MIN"]["VALUE"]?>, <?=$arItem["VALUES"]["MAX"]["VALUE"]?>],
                                range: true,
                                step: 1,
                                stop: function (event, ui) {
                                    jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").val(jQuery("#slider").slider("values", 0));
                                    jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val(jQuery("#slider").slider("values", 1));

                                },
                                slide: function (event, ui) {
                                    jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").val(jQuery("#slider").slider("values", 0));
                                    jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val(jQuery("#slider").slider("values", 1));
                                }
                            });

                            jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").change(function () {

                                var value1 = jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").val();
                                var value2 = jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val();

                                if (parseInt(value1) > parseInt(value2)) {
                                    value1 = value2;
                                    jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").val(value1);
                                }
                                jQuery("#slider").slider("values", 0, value1);
                            });


                            jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").change(function () {

                                var value1 = jQuery("input#<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>").val();
                                var value2 = jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val();

                                if (value2 > <?=$arItem["VALUES"]["MAX"]["VALUE"]?>) {
                                    value2 = <?=$arItem["VALUES"]["MAX"]["VALUE"]?>;
                                    jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val(<?=$arItem["VALUES"]["MAX"]["VALUE"]?>);
                                }

                                if (parseInt(value1) > parseInt(value2)) {
                                    value2 = value1;
                                    jQuery("input#<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>").val(value2);
                                }
                                jQuery("#slider").slider("values", 1, value2);
                            });

                        });

                    </script>
                <?endif;
            endforeach; ?>
            <div class="clear"></div>
            <div class="lines-main"></div>
        </div>
        <div class="clear"></div>
        <div class="calculator-block-bottom">
            <div class="text-sel">
                <p>C функцией:</p>
            </div>
            <div class="check-calculator">

                <?
                foreach ($arResult["ITEMS"] as $key => $arItem):
                    if (!empty($arItem["VALUES"]) && $arItem["CODE"] == "FUNCTIONS"): ?>
                        <ol>
                        <? foreach ($arItem["VALUES"] as $val => $ar): ?>
                            <li>
                                <p class="check-calcul">
                                    <input
                                        type="checkbox"
                                        value="<? echo $ar["HTML_VALUE"] ?>"
                                        name="<? echo $ar["CONTROL_NAME"] ?>"
                                        id="<? echo $ar["CONTROL_ID"] ?>"
                                        <? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                        />
                                    <label for="<? echo $ar["CONTROL_ID"] ?>"></label><? echo $ar["VALUE"]; ?></p>
                            </li>
                            <? if ($val % 2 ==0 && $val!= 0): ?>
                                </ol>
                                <ol>
                            <? endif ?>
                        <? endforeach; ?>
                        </ol>
                    <?endif;
                endforeach; ?>

                <div class="clear"></div>
                <div class="arrow-button">
                    <p>
                        <input type="submit" id="set_filter"
                               name="set_filter" value="<?= GetMessage("CT_BCSF_SET_FILTER") ?>"/>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
