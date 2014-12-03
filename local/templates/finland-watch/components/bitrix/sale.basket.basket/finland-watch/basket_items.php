<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
echo ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn = false;
$bPriceType = false;

if ($normalCount > 0):
    ?>
    <table id="basket_items">
        <tr><?
            foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
                $arHeader["name"] = (isset($arHeader["name"]) ? (string)$arHeader["name"] : '');
                if ($arHeader["name"] == '')
                    $arHeader["name"] = GetMessage("SALE_" . $arHeader["id"]);
                $arHeaders[] = $arHeader["id"];

                // remember which values should be shown not in the separate columns, but inside other columns
                if (in_array($arHeader["id"], array("TYPE"))) {
                    $bPriceType = true;
                    continue;
                } elseif ($arHeader["id"] == "PROPS") {
                    $bPropsColumn = true;
                    continue;
                } elseif ($arHeader["id"] == "DELAY") {
                    $bDelayColumn = true;
                    continue;
                } elseif ($arHeader["id"] == "DELETE") {
                    $bDeleteColumn = true;
                    continue;
                } elseif ($arHeader["id"] == "WEIGHT") {
                    $bWeightColumn = true;
                }

                if ($arHeader["id"] == "NAME"):
                    ?>
                    <th id="col_<?= $arHeader["id"]; ?>">
                <?
                elseif ($arHeader["id"] == "PRICE"):
                    ?>
                    <th  id="col_<?= $arHeader["id"]; ?>">
                <?
                else:
                    ?>
                    <th  id="col_<?= $arHeader["id"]; ?>">
                <?
                endif;
                ?>
                <?= $arHeader["name"]; ?>
                </th>
            <?
            endforeach;?>
        </tr>
        <?
        foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):

            if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
                ?>
                <tr class="clock-one" id="<?= $arItem["ID"] ?>">

                    <td class="img-one">
                        <?
                        if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
                            $url = $arItem["PREVIEW_PICTURE_SRC"];
                        elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
                            $url = $arItem["DETAIL_PICTURE_SRC"];
                        else:
                            $url = $templateFolder . "/images/no_photo.png";
                        endif;
                        ?>
                        <img src="<?= $url ?>" width="219" height="219" title="" alt=""/>

                        <div class="table-text"><p class="name-clock"><?= $arItem['NAME'] ?></p>

                            <p class="text-clock">В наличии</p>
                        </div>
                    </td>
                    <td class="discount"><?= $arItem['DISCOUNT_PRICE_PERCENT_FORMATED'] ?></td>
                    <td class="price">
                <span class="border">
                    <span class="no-summ">
                        <?= $arItem['FULL_PRICE_FORMATED'] ?>
                        <span class="rouble">a</span>
                    </span>
                </span>
                <span class="yes-summ">
                    <?= $arItem['PRICE_FORMATED'] ?>
                    <span class="rouble">a</span>
                </span>
                    </td>
                    <td>
                      <span class="number-yes-no">
                         <div class="quantity-block" style="margin-top:5px;">
                             <div class="quantity">
                                 <?
                                 $ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
                                 $max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"" . $arItem["AVAILABLE_QUANTITY"] . "\"" : "";
                                 $useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
                                 $useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
                                 ?><?= $arItem["QUANTITY"] ?>
                                 <input
                                     id="QUANTITY_INPUT_<?= $arItem["ID"] ?>"
                                     name="QUANTITY_INPUT_<?= $arItem["ID"] ?>"
                                     class="count" name="count" type="text" value="1"
                                     value="<?= $arItem["QUANTITY"] ?>"
                                     onchange="updateQuantity('QUANTITY_INPUT_<?= $arItem["ID"] ?>', '<?= $arItem["ID"] ?>', <?= $ratio ?>, <?= $useFloatQuantityJS ?>)"
                                     />
                                 <input
                                     type="hidden"
                                     id="QUANTITY_<?= $arItem['ID'] ?>"
                                     name="QUANTITY_<?= $arItem['ID'] ?>"
                                     value="<?= $arItem["QUANTITY"] ?>"
                                     />
                                 <?
                                 if (!isset($arItem["MEASURE_RATIO"])) {
                                     $arItem["MEASURE_RATIO"] = 1;
                                 }
                                 ?>
                                 <input class="plus" type="button"
                                        onclick="setQuantity(<?= $arItem["ID"] ?>, <?= $arItem["MEASURE_RATIO"] ?>, 'up', <?= $useFloatQuantityJS ?>)"/>
                                 <input class="minus" type="button"
                                        onclick="setQuantity(<?= $arItem["ID"] ?>, <?= $arItem["MEASURE_RATIO"] ?>, 'down', <?= $useFloatQuantityJS ?>)"/>
                             </div>

                         </div>
                      </span>
                    </td>
                    <td id="sum_<?= $arItem["ID"] ?>" class="summ">
                        <?= $arItem['SUM'] ?>
                        <span class="rouble">a</span>
                        <a href="<?= str_replace("#ID#", $arItem["ID"], $arUrls["delete"]) ?>" class="close"></a>
                    </td>
                </tr>
            <? endif ?>
        <? endforeach ?>

        <input type="hidden" id="column_headers" value="<?= CUtil::JSEscape(implode($arHeaders, ",")) ?>"/>
        <input type="hidden" id="offers_props" value="<?= CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ",")) ?>"/>
        <input type="hidden" id="action_var" value="<?= CUtil::JSEscape($arParams["ACTION_VARIABLE"]) ?>"/>
        <input type="hidden" id="quantity_float" value="<?= $arParams["QUANTITY_FLOAT"] ?>"/>
        <input type="hidden" id="count_discount_4_all_quantity"
               value="<?= ($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="price_vat_show_value"
               value="<?= ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="hide_coupon" value="<?= ($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="coupon_approved" value="N"/>
        <input type="hidden" id="use_prepayment" value="<?= ($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N" ?>"/>


        <?
        if ($arParams["HIDE_COUPON"] != "Y"):

        $couponClass = "";
        if (array_key_exists('VALID_COUPON', $arResult)) {
            $couponClass = ($arResult["VALID_COUPON"] === true) ? "good" : "bad";
        } elseif (array_key_exists('COUPON', $arResult) && !empty($arResult["COUPON"])) {
            $couponClass = "good";
        }

        ?>
        <tr>
            <td colspan="3" rowspan="3" class="block">
                <div class="code-personal">
                    <p class="code-text">Получите дополнительную скидку</p>

                    <p class="code-input"><input type="text" id="coupon" name="COUPON"
                                                 value="<?= $arResult["COUPON"] ?>"
                                                 onchange="enterCoupon();" size="21" class="<?= $couponClass ?>"
                                                 placeholder="<?= GetMessage("STB_COUPON_PROMT") ?>"/>
                    </p>
                    <? else: ?>
                        &nbsp;
                    <?
                    endif; ?>
                </div>

            </td>

            <td class="tleft">Товаров на:</td>
            <td id="allSum_wVAT_FORMATED" class="tright">
                <?= $arResult["allSum_wVAT_FORMATED"] ?>
                <span class="rouble">a</span>
            </td>
        </tr>
        <tr>
            <td class="tleft">НДС:</td>
            <td id="allVATSum_FORMATED" class="tright">
                <?= $arResult["allVATSum_FORMATED"] ?>
                <span class="rouble">a</span>
            </td>
        </tr>
        <tr>
            <td class="tleft itog">Итого:</td>
            <td id="allSum_FORMATED" class="itog-summ">
                <?=$arResult["allSum_FORMATED"]?>
                <span class="rouble">a</span>
            </td>
        </tr>
    </table>
<?
else:
    ?>
    <table>
        <tbody>
        <tr>
            <td colspan="<?= $numCells ?>" style="text-align:center">
                <div class=""><?= GetMessage("SALE_NO_ITEMS"); ?></div>
            </td>
        </tr>
        </tbody>
    </table>
<?
endif;
?>