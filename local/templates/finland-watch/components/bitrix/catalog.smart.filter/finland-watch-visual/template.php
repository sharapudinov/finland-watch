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
<div class="calculator-main">
<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>"
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
            </div>
            <div class="select-option">

                <div class="box visible">
                    <div class="section">
                        <div class="sec">
                            <select>
                                <option>Мужские</option>
                                <option>Женские</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box visible">
                    <div class="section">
                        <div class="sec">
                            <select>
                                <option>Сноуборд</option>
                                <option>Другие часы</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?foreach ($arResult["ITEMS"] as $key => $arItem):
            $key = md5($key);
            if (isset($arItem["PRICE"])):
                if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
                    continue;
                ?>

                <div class="slider-namber">
                    <p class="price">По цене:</p>

                    <div class="main">

                        <div class="formCost">
                    		<span class="cost left"><label for="minCost"></label>
                            <input
                                class="min-price"
                                type="text"
                                name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
                                size="5"
                                onkeyup="smartFilter.keyup(this)"
                                />
                            <span class="cost right"><label for="maxCost">_</label>
                            <input
                                class="max-price"
                                type="text"
                                name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
                                size="5"
                                onkeyup="smartFilter.keyup(this)"
                                />
                        </div>

                        <div class="sliderCont">
                            <div id="slider"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?
            $arJsParams = array(
                "leftSlider" => 'left_slider_' . $key,
                "rightSlider" => 'right_slider_' . $key,
                "tracker" => "drag_tracker_" . $key,
                "trackerWrap" => "drag_track_" . $key,
                "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
                "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
                "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                "precision" => 2
            );
            ?>
                <script type="text/javascript">
                    BX.ready(function () {
                        var trackBar<?=$key?> = new BX.Iblock.SmartFilter.Horizontal(<?=CUtil::PhpToJSObject($arJsParams)?>);
                    });
                </script>
            <?endif;
        endforeach;?>

        <?
        foreach ($arResult["ITEMS"] as $key => $arItem):
            if ($arItem["PROPERTY_TYPE"] == "N"):
                if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
                    continue;
                ?>
                <div class="bx_filter_container price">
                    <span class="bx_filter_container_title"><?= $arItem["NAME"] ?></span>

                    <div class="bx_filter_param_area">
                        <div class="bx_filter_param_area_block">
                            <div class="bx_input_container">
                                <input
                                    class="min-price"
                                    type="text"
                                    name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                    id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                    value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
                                    size="5"
                                    onkeyup="smartFilter.keyup(this)"
                                    />
                            </div>
                        </div>
                        <div class="bx_filter_param_area_block">
                            <div class="bx_input_container">
                                <input
                                    class="max-price"
                                    type="text"
                                    name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                    id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                    value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
                                    size="5"
                                    onkeyup="smartFilter.keyup(this)"
                                    />
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="bx_ui_slider_track" id="drag_track_<?= $key ?>">
                        <div class="bx_ui_slider_range" style="left: 0; right: 0%;" id="drag_tracker_<?= $key ?>"></div>
                        <a class="bx_ui_slider_handle left" href="javascript:void(0)" style="left:0;"
                           id="left_slider_<?= $key ?>"></a>
                        <a class="bx_ui_slider_handle right" href="javascript:void(0)" style="right:0%;"
                           id="right_slider_<?= $key ?>"></a>
                    </div>
                    <div class="bx_filter_param_area">
                        <div class="bx_filter_param_area_block"
                             id="curMinPrice_<?= $key ?>"><?= $arItem["VALUES"]["MIN"]["VALUE"] ?></div>
                        <div class="bx_filter_param_area_block"
                             id="curMaxPrice_<?= $key ?>"><?= $arItem["VALUES"]["MAX"]["VALUE"] ?></div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            <?
            $arJsParams = array(
                "leftSlider" => 'left_slider_' . $key,
                "rightSlider" => 'right_slider_' . $key,
                "tracker" => "drag_tracker_" . $key,
                "trackerWrap" => "drag_track_" . $key,
                "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
                "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
                "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                "precision" => 0
            );
            ?>
                <script type="text/javascript" defer="defer">
                    BX.ready(function () {
                        var trackBar<?=$key?> = new BX.Iblock.SmartFilter.Horizontal(<?=CUtil::PhpToJSObject($arJsParams)?>);
                    });
                </script>
            <? elseif (!empty($arItem["VALUES"]) && !isset($arItem["PRICE"])): ?>
                <div class="bx_filter_container">
                    <span class="bx_filter_container_title"
                          onclick="smartFilter.hideFilterProps(this)"><?= $arItem["NAME"] ?></span>

                    <div class="bx_filter_block" style="opacity: 0; height: 0px; overflow:hidden;">
                        <? foreach ($arItem["VALUES"] as $val => $ar): ?>
                            <span class="<? echo $ar["DISABLED"] ? 'disabled' : '' ?>">
							<input
                                type="checkbox"
                                value="<? echo $ar["HTML_VALUE"] ?>"
                                name="<? echo $ar["CONTROL_NAME"] ?>"
                                id="<? echo $ar["CONTROL_ID"] ?>"
                                <? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                                onclick="smartFilter.click(this)"
                                />
							<label for="<? echo $ar["CONTROL_ID"] ?>"><? echo $ar["VALUE"]; ?></label>
						</span>
                        <? endforeach; ?>
                    </div>
                </div>
            <?endif;
        endforeach;?>
        <div style="clear: both;"></div>
        <div class="bx_filter_control_section">
            <span class="icon"></span><input class="bx_filter_search_button" type="submit" id="set_filter"
                                             name="set_filter" value="<?= GetMessage("CT_BCSF_SET_FILTER") ?>"/>
            <input class="bx_filter_search_button" type="submit" id="del_filter" name="del_filter"
                   value="<?= GetMessage("CT_BCSF_DEL_FILTER") ?>"/>

            <div class="bx_filter_popup_result"
                 id="modef" <? if (!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"'; ?>
                 style="display: inline-block;top: 75px;left: 25px;right: 25px;">
                <? echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">' . intval($arResult["ELEMENT_COUNT"]) . '</span>')); ?>
                <a href="<? echo $arResult["FILTER_URL"] ?>"><? echo GetMessage("CT_BCSF_FILTER_SHOW") ?></a>
                <!--<span class="ecke"></span>-->
            </div>
        </div>
</form>
</div>
<script>
    var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>');
</script>