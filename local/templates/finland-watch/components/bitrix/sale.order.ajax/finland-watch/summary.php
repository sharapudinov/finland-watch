<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$bDefaultColumns = $arResult["GRID"]["DEFAULT_COLUMNS"];
$colspan = ($bDefaultColumns) ? count($arResult["GRID"]["HEADERS"]) : count($arResult["GRID"]["HEADERS"]) - 1;
$bPropsColumn = false;
$bUseDiscount = false;
$bPriceType = false;
$bShowNameWithPicture = ($bDefaultColumns) ? true : false; // flat to show name and picture column in one column
?>
<div class="block-no-bg">
    <p><?= GetMessage("SALE_PRODUCTS_SUMMARY") ?></p>
</div>
<div class="teble-name">
<table>
<tbody>

<tr>
    <?
    $bPreviewPicture = false;
    $bDetailPicture = false;
    $imgCount = 0;

    // prelimenary column handling
    foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn) {
        if ($arColumn["id"] == "PROPS")
            $bPropsColumn = true;

        if ($arColumn["id"] == "NOTES")
            $bPriceType = true;

        if ($arColumn["id"] == "PREVIEW_PICTURE")
            $bPreviewPicture = true;

        if ($arColumn["id"] == "DETAIL_PICTURE")
            $bDetailPicture = true;
    }

    if ($bPreviewPicture || $bDetailPicture)
        $bShowNameWithPicture = true;


    foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn):

        if (in_array($arColumn["id"], array("PROPS", "TYPE", "NOTES"))) // some values are not shown in columns in this template
            continue;

        if ($arColumn["id"] == "PREVIEW_PICTURE" && $bShowNameWithPicture)
            continue;

        if ($arColumn["id"] == "NAME" && $bShowNameWithPicture):
            ?>
            <th class="item" colspan="2">
            <?
            echo GetMessage("SALE_PRODUCTS");
        elseif ($arColumn["id"] == "NAME" && !$bShowNameWithPicture):
            ?>
            <th class="item">
            <?
            echo $arColumn["name"];
        elseif ($arColumn["id"] == "PRICE"):
            ?>
            <th class="price">
            <?
            echo $arColumn["name"];
        else:
            ?>
            <th class="custom">
            <?
            echo $arColumn["name"];
        endif;
        ?>
        </th>
    <? endforeach; ?>
</tr>



<? foreach ($arResult["GRID"]["ROWS"] as $k => $arData): ?>
    <tr class="clock-one">
    <?
    if ($bShowNameWithPicture):
        ?>
        <td  class="img-one">
                <?
                if (strlen($arData["data"]["PREVIEW_PICTURE_SRC"]) > 0):
                    $url = $arData["data"]["PREVIEW_PICTURE_SRC"];
                elseif (strlen($arData["data"]["DETAIL_PICTURE_SRC"]) > 0):
                    $url = $arData["data"]["DETAIL_PICTURE_SRC"];
                else:
                    $url = $templateFolder . "/images/no_photo.png";
                endif;

                if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?><a
                    href="<?= $arData["data"]["DETAIL_PAGE_URL"] ?>"><? endif; ?>
                    <img src="<?= $url ?>">
                    <? if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0): ?></a><? endif; ?>

        </td>
    <?
    endif;

    // prelimenary check for images to count column width
    foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn) {
        $arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];
        if (is_array($arItem[$arColumn["id"]])) {
            foreach ($arItem[$arColumn["id"]] as $arValues) {
                if ($arValues["type"] == "image")
                    $imgCount++;
            }
        }
    }

    foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn):

        $class = ($arColumn["id"] == "PRICE_FORMATED") ? "price" : "";

        if (in_array($arColumn["id"], array("PROPS", "TYPE", "NOTES"))) // some values are not shown in columns in this template
            continue;

        if ($arColumn["id"] == "PREVIEW_PICTURE" && $bShowNameWithPicture)
            continue;

        $arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];

        if ($arColumn["id"] == "NAME"):
            $width = 40 - ($imgCount * 20);
            ?>
            <td class="item" style="width:<?= $width ?>%">


                    <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?><a
                        href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? endif; ?>
                        <?= $arItem["NAME"] ?>
                        <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?></a><? endif; ?>

                    <?
                    if ($bPropsColumn):
                        foreach ($arItem["PROPS"] as $val):
                            echo $val["NAME"] . ":&nbsp;<span>" . $val["VALUE"] . "<span><br/>";
                        endforeach;
                    endif;
                    ?>
                <?
                if (is_array($arItem["SKU_DATA"])):
                    foreach ($arItem["SKU_DATA"] as $propId => $arProp):

                        // is image property
                        $isImgProperty = false;
                        foreach ($arProp["VALUES"] as $id => $arVal) {
                            if (isset($arVal["PICT"]) && !empty($arVal["PICT"])) {
                                $isImgProperty = true;
                                break;
                            }
                        }

                        $full = (count($arProp["VALUES"]) > 5) ? "full" : "";

                        if ($isImgProperty): // iblock element relation property
                            ?>

													<?= $arProp["NAME"] ?>:





\
                        <?
                        else:
                            ?>

													<?= $arProp["NAME"] ?>:


                        <?
                        endif;
                    endforeach;
                endif;
                ?>
            </td>
        <?
        elseif ($arColumn["id"] == "PRICE_FORMATED"):
            ?>
            <td class="price right">
                <div class="current_price"><?= $arItem["PRICE_FORMATED"] ?></div>
                <div class="old_price right">
                    <?
                    if (doubleval($arItem["DISCOUNT_PRICE"]) > 0):
                        echo SaleFormatCurrency($arItem["PRICE"] + $arItem["DISCOUNT_PRICE"], $arItem["CURRENCY"]);
                        $bUseDiscount = true;
                    endif;
                    ?>
                </div>

                <? if ($bPriceType && strlen($arItem["NOTES"]) > 0): ?>
                    <div style="text-align: left">
                        <div class="type_price"><?= GetMessage("SALE_TYPE") ?></div>
                        <div class="type_price_value"><?= $arItem["NOTES"] ?></div>
                    </div>
                <? endif; ?>
            </td>
        <?
        elseif ($arColumn["id"] == "DISCOUNT"):
            ?>
            <td class="custom right">
                <span><?= getColumnName($arColumn) ?>:</span>
                <?= $arItem["DISCOUNT_PRICE_PERCENT_FORMATED"] ?>
            </td>
        <?
        elseif ($arColumn["id"] == "DETAIL_PICTURE" && $bPreviewPicture):
            ?>
            <td class="itemphoto">
                <div class="bx_ordercart_photo_container">
                    <?
                    $url = "";
                    if ($arColumn["id"] == "DETAIL_PICTURE" && strlen($arData["data"]["DETAIL_PICTURE_SRC"]) > 0)
                        $url = $arData["data"]["DETAIL_PICTURE_SRC"];

                    if ($url == "")
                        $url = $templateFolder . "/images/no_photo.png";

                    if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?><a
                        href="<?= $arData["data"]["DETAIL_PAGE_URL"] ?>"><? endif; ?>
                        <div class="bx_ordercart_photo" style="background-image:url('<?= $url ?>')"></div>
                        <? if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0): ?></a><? endif; ?>
                </div>
            </td>
        <?
        elseif (in_array($arColumn["id"], array("QUANTITY", "WEIGHT_FORMATED", "DISCOUNT_PRICE_PERCENT_FORMATED", "SUM"))):
            ?>
            <td class="custom right">
                <span><?= getColumnName($arColumn) ?>:</span>
                <?= $arItem[$arColumn["id"]] ?>
            </td>
        <?
        else: // some property value

            if (is_array($arItem[$arColumn["id"]])):

                foreach ($arItem[$arColumn["id"]] as $arValues)
                    if ($arValues["type"] == "image")
                        $columnStyle = "width:20%";
                ?>
                <td class="custom" style="<?= $columnStyle ?>">
                    <span><?= getColumnName($arColumn) ?>:</span>
                    <?
                    foreach ($arItem[$arColumn["id"]] as $arValues):
                        if ($arValues["type"] == "image"):
                            ?>
                            <div class="bx_ordercart_photo_container">
                                <div class="bx_ordercart_photo"
                                     style="background-image:url('<?= $arValues["value"] ?>')"></div>
                            </div>
                        <?
                        else: // not image
                            echo $arValues["value"] . "<br/>";
                        endif;
                    endforeach;
                    ?>
                </td>
            <?
            else: // not array, but simple value
                ?>
                <td class="custom" style="<?= $columnStyle ?>">
                    <span><?= getColumnName($arColumn) ?>:</span>
                    <?
                    echo $arItem[$arColumn["id"]];
                    ?>
                </td>
            <?
            endif;
        endif;

    endforeach;
    ?>
    </tr>
<? endforeach; ?>
<tr><td></td><td></td><td><?= GetMessage("SOA_TEMPL_SUM_SUMMARY") ?></td><td></td><td></td><td><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"] ?><span class="rouble">a</span></td></tr>
<tr><td></td><td></td><td><?= GetMessage("SOA_TEMPL_SUM_DELIVERY") ?></td><td></td><td></td><td><?= $arResult["DELIVERY_PRICE_FORMATED"] ?> <span class="rouble">a</span></td></tr>
<tr><td></td><td></td><td><?= GetMessage("SOA_TEMPL_SUM_IT") ?> </td><td></td><td></td><td><?= $arResult["ORDER_PRICE_FORMATED"] ?>  <span class="rouble">a</span></td></tr>
</tbody>
</table>
</div>


<div class="title-head-login">
    <p><?= GetMessage("SOA_TEMPL_SUM_COMMENTS") ?></p>
</div>
<p class="text-info">
    <textarea name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION"
                               style="max-width:100%;min-height:120px"><?= $arResult["USER_VALS"]["ORDER_DESCRIPTION"] ?></textarea>
</p>

        <input type="hidden" name="" value="">

