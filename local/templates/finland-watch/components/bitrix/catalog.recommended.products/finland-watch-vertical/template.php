<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);?>

    <div class="sitebar-card">
        <section>
            <div class="bread-crumbs home">
                <ul class="bread-crumbs-link">
                    <li class="icon-link-home"><a href="#"></a></li>
                    <li>C этим покупают</li>

                </ul>

            </div>

            <div class="slider-sitebar">
                <div class="jcarousel-wrapper wrap">
                    <div class="jcarousel slider-two">
                        <ul class="">

                            <? if (!empty($arResult['ITEMS'])): ?>

                                <?
                                foreach ($arResult['ITEMS'] as $key => $arItem) {
                                    ?>
                                    <li>
                         <span class="hover-block">
                               <a rel="group" class="modal-img" href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                                                               width="200" height="200"
                                                                                               title="" alt=""/></a>
                                <p class="name-cl-v"><?=$arItem['NAME']?></p>
                                <div class="nal-yes">
                                    <?if ($arItem['CAN_BUY']):?>
                                        <span class="nal"> В наличии</span>
                                    <?endif?>

                                    <?if ($arItem['PRICES']['BASE']['DISCOUNT_DIFF']>0):?>
                                        <p class="profit">Выгода <span class="red">
                                                <?=$arItem['PRICES']['BASE']['DISCOUNT_DIFF']?>
                                                <span class="rouble">a</span>
                                                (<?=$arItem['PRICES']['BASE']['DISCOUNT_DIFF']?>)
                                            </span>
                                        </p>
                                   <?endif?>

                                </div>
                                    <?if ($arItem['PRICES']['BASE']['PRINT_VALUE']>0):?>
                                        <p class="summ-h red">
                                            <?=$arItem['PRICES']['BASE']['PRINT_VALUE']?>
                                            <span class="rouble">a</span>
                                        </p>
                                    <?endif?>
                                    <?if ($arItem['CAN_BUY']):?>
                                        <p class="link-buy"><a href="#">купить</a></p>
                                    <?endif?>

                           </span>
                                    </li>
                                <?

                                }
                            endif ?>
                        </ul>
                        <div class="clear"></div>
                    </div>

                    <a href="#" class="jcarousel-control-prev"></a>
                    <a href="#" class="jcarousel-control-next"></a>

                    <p class="jcarousel-pagination"></p>
                </div>
            </div>
        </section>
        <section>
            <div class="slider-sitebar">
                <div class="jcarousel-wrapper wrap">
                    <div class="jcarousel slider-two">
                        <ul class="">

                            <? if (!empty($arResult['ITEMS'])): ?>

                                <?
                                foreach ($arResult['ITEMS'] as $key => $arItem) {
                                    ?>
                                    <li>
                         <span class="hover-block">
                               <a rel="group" class="modal-img" href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                                                                                            width="200" height="200"
                                                                                                            title="" alt=""/></a>
                                <p class="name-cl-v"><?=$arItem['NAME']?></p>
                                <div class="nal-yes">
                                    <?if ($arItem['CAN_BUY']):?>
                                        <span class="nal"> В наличии</span>
                                    <?endif?>

                                    <?if ($arItem['PRICES']['BASE']['DISCOUNT_DIFF']>0):?>
                                        <p class="profit">Выгода <span class="red">
                                                <?=$arItem['PRICES']['BASE']['DISCOUNT_DIFF']?>
                                                <span class="rouble">a</span>
                                                (<?=$arItem['PRICES']['BASE']['DISCOUNT_DIFF']?>)
                                            </span>
                                        </p>
                                    <?endif?>

                                </div>
                             <?if ($arItem['PRICES']['BASE']['PRINT_VALUE']>0):?>
                                 <p class="summ-h red">
                                     <?=$arItem['PRICES']['BASE']['PRINT_VALUE']?>
                                     <span class="rouble">a</span>
                                 </p>
                             <?endif?>
                             <?if ($arItem['CAN_BUY']):?>
                                 <p class="link-buy"><a href="#">купить</a></p>
                             <?endif?>

                           </span>
                                    </li>
                                <?

                                }
                            endif ?>
                        </ul>
                        <div class="clear"></div>
                    </div>

                    <a href="#" class="jcarousel-control-prev"></a>
                    <a href="#" class="jcarousel-control-next"></a>

                    <p class="jcarousel-pagination"></p>
                </div>
            </div>
        </section>
    </div>
        <div class="clear"></div>



    <!--<a id="<? /* echo $arItemIDs['PICT']; */ ?>"
		href="<? /* echo $arItem['DETAIL_PAGE_URL']; */ ?>"
		class="bx_catalog_item_images"
		<?/* if ($arParams['SHOW_IMAGE'] == "Y")
		{
			*/
    ?>
			style="background-image: url(<? /* echo($arParams['SHOW_IMAGE'] == "Y" ? $arItem['PREVIEW_PICTURE']['SRC'] : ""); */ ?>)"
		<?/*
		} */
    ?>
		title="<? /* echo $strTitle; */ ?>"><?/*
		if ('Y' == $arParams['SHOW_DISCOUNT_PERCENT'])
		{
			*/
    ?>
			<div
				id="<? /* echo $arItemIDs['DSC_PERC']; */ ?>"
				class="bx_stick_disc right bottom"
				style="display:<? /* echo(0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ? '' : 'none'); */ ?>;">
				-<? /* echo $arItem['MIN_PRICE']['DISCOUNT_DIFF_PERCENT']; */ ?>%
			</div>
		<?/*
		}
		if ($arItem['LABEL'])
		{
			*/
    ?>
			<div class="bx_stick average left top"
				title="<? /* echo $arItem['LABEL_VALUE']; */ ?>"><? /* echo $arItem['LABEL_VALUE']; */ ?></div>
		<?/*
		}
		*/
    ?>
	</a><?/*
	if ($arItem['SECOND_PICT'])
	{
		*/
    ?><a id="<? /* echo $arItemIDs['SECOND_PICT']; */ ?>"
		href="<? /* echo $arItem['DETAIL_PAGE_URL']; */ ?>"
		class="bx_catalog_item_images_double"
		<?/* if ($arParams['SHOW_IMAGE'] == "Y")
	{
		*/
    ?>
		style="background-image: url(<?/* echo(
		!empty($arItem['PREVIEW_PICTURE_SECOND'])
			? $arItem['PREVIEW_PICTURE_SECOND']['SRC']
			: $arItem['PREVIEW_PICTURE']['SRC']
		); */
    ?>)"
	<? /* } */ ?>

		title="<? /* echo $strTitle; */ ?>"><?/*
		if ('Y' == $arParams['SHOW_DISCOUNT_PERCENT'])
		{
			*/
    ?>
			<div
				id="<? /* echo $arItemIDs['SECOND_DSC_PERC']; */ ?>"
				class="bx_stick_disc right bottom"
				style="display:<? /* echo(0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ? '' : 'none'); */ ?>;">
				-<? /* echo $arItem['MIN_PRICE']['DISCOUNT_DIFF_PERCENT']; */ ?>%
			</div>
		<?/*
		}
		if ($arItem['LABEL'])
		{
			*/
    ?>
			<div class="bx_stick average left top"
				title="<? /* echo $arItem['LABEL_VALUE']; */ ?>"><? /* echo $arItem['LABEL_VALUE']; */ ?></div>
		<?/*
		}
		*/
    ?>
		</a><?/*
	}
	*/
    ?>
	<?/* if ($arParams['SHOW_NAME'] == "Y")
	{
		*/
    ?>
		<div class="bx_catalog_item_title"><a href="<? /* echo $arItem['DETAIL_PAGE_URL']; */ ?>"
				title="<? /* echo $arItem['NAME']; */ ?>"><? /* echo $arItem['NAME']; */ ?></a></div>
	<?/*
	}*/
    ?>
	<div class="bx_catalog_item_price">
		<div id="<? /* echo $arItemIDs['PRICE']; */ ?>" class="bx_price"><?/*
			if (!empty($arItem['MIN_PRICE']))
			{
				if (isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
				{
					echo GetMessage(
						'CATALOG_RECOMMENDED_PRODUCTS_TPL_MESS_PRICE_SIMPLE_MODE',
						array(
							'#PRICE#' => $arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'],
							'#MEASURE#' => GetMessage(
								'CATALOG_RECOMMENDED_PRODUCTS_TPL_MESS_MEASURE_SIMPLE_MODE',
								array(
									'#VALUE#' => $arItem['MIN_PRICE']['CATALOG_MEASURE_RATIO'],
									'#UNIT#' => $arItem['MIN_PRICE']['CATALOG_MEASURE_NAME']
								)
							)
						)
					);
				}
				else
				{
					echo $arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];
				}
				if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arItem['MIN_PRICE']['DISCOUNT_VALUE'] < $arItem['MIN_PRICE']['VALUE'])
				{
					*/
    ?> <span
					style="color: #a5a5a5;font-size: 12px;font-weight: normal;white-space: nowrap;text-decoration: line-through;"><? /* echo $arItem['MIN_PRICE']['PRINT_VALUE']; */ ?></span><?/*
				}
			}
			*/
    ?></div>
	</div><?/*
	if (!isset($arItem['OFFERS']) || empty($arItem['OFFERS'])) // Simple Product
	{
		*/
    ?>
		<div class="bx_catalog_item_controls"><?/*
			if ($arItem['CAN_BUY'])
			{
				if ('Y' == $arParams['USE_PRODUCT_QUANTITY'])
				{
					*/
    ?>
					<div class="bx_catalog_item_controls_blockone">
						<div style="display: inline-block;position: relative;">
							<a id="<? /* echo $arItemIDs['QUANTITY_DOWN']; */ ?>" href="javascript:void(0)"
								class="bx_bt_button_type_2 bx_small" rel="nofollow">-</a>
							<input type="text" class="bx_col_input" id="<? /* echo $arItemIDs['QUANTITY']; */ ?>"
								name="<? /* echo $arParams["PRODUCT_QUANTITY_VARIABLE"]; */ ?>"
								value="<? /* echo $arItem['CATALOG_MEASURE_RATIO']; */ ?>">
							<a id="<? /* echo $arItemIDs['QUANTITY_UP']; */ ?>" href="javascript:void(0)"
								class="bx_bt_button_type_2 bx_small" rel="nofollow">+</a>
							<span
								id="<? /* echo $arItemIDs['QUANTITY_MEASURE']; */ ?>"
								class="bx_cnt_desc"><? /* echo $arItem['CATALOG_MEASURE_NAME']; */ ?></span>
						</div>
					</div>
				<?/*
				}
				*/
    ?>
				<div class="bx_catalog_item_controls_blocktwo">
					<a id="<? /* echo $arItemIDs['BUY_LINK']; */ ?>" class="bx_bt_button bx_medium"
						href="javascript:void(0)" rel="nofollow"><?/*
						echo('' != $arParams['MESS_BTN_BUY'] ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCS_TPL_MESS_BTN_BUY'));
						*/
    ?></a>
				</div>
			<?/*
			}
			else
			{
				*/
    ?>
				<div class="bx_catalog_item_controls_blockone">
				<a class="bx_medium bx_bt_button_type_2" href="<? /* echo $arItem['DETAIL_PAGE_URL']; */ ?>" rel="nofollow">
					<? /* echo('' != $arParams['MESS_BTN_DETAIL'] ? $arParams['MESS_BTN_DETAIL'] : GetMessage('CATALOG_RECOMMENDED_PRODUCTS_TPL_MESS_BTN_DETAIL')); */ ?>
				</a>
				</div><?/*
				if ('Y' == $arParams['PRODUCT_SUBSCRIPTION'] && 'Y' == $arItem['CATALOG_SUBSCRIPTION'])
				{
					*/
    ?>
					<div class="bx_catalog_item_controls_blocktwo">
					<a
						id="<? /* echo $arItemIDs['SUBSCRIBE_LINK']; */ ?>"
						class="bx_bt_button_type_2 bx_medium"
						href="javascript:void(0)"><?/*
						echo('' != $arParams['MESS_BTN_SUBSCRIBE'] ? $arParams['MESS_BTN_SUBSCRIBE'] : GetMessage('CATALOG_RECOMMENDED_PRODUCTS_TPL_MESS_BTN_SUBSCRIBE'));
						*/
    ?>
					</a>
					</div><?/*
				}
			}
			*/
    ?>
			<div style="clear: both;"></div><?/*

			*/
    ?></div><?/*
	if (isset($arItem['DISPLAY_PROPERTIES']) && !empty($arItem['DISPLAY_PROPERTIES']))
	{
	*/
    ?>
		<div class="bx_catalog_item_articul">
			<?/*
			foreach ($arItem['DISPLAY_PROPERTIES'] as $arOneProp)
			{
				*/
    ?><br><? /* echo $arOneProp['NAME']; */ ?> <strong><?/*
				echo(
				is_array($arOneProp['DISPLAY_VALUE'])
					? implode('/', $arOneProp['DISPLAY_VALUE'])
					: $arOneProp['DISPLAY_VALUE']
				); */
    ?></strong><?/*
			}
			*/
    ?>
		</div>
	<?/*
	}


	$emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);
	if ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET'] && !$emptyProductProperties)
	{
	*/
    ?>
		<div id="<? /* echo $arItemIDs['BASKET_PROP_DIV']; */ ?>" style="display: none;">
			<?/*
			if (!empty($arItem['PRODUCT_PROPERTIES_FILL']))
			{
				foreach ($arItem['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
				{
					*/
    ?>
					<input
						type="hidden"
						name="<? /* echo $arParams['PRODUCT_PROPS_VARIABLE']; */ ?>[<? /* echo $propID; */ ?>]"
						value="<? /* echo htmlspecialcharsbx($propInfo['ID']); */ ?>"
						>
					<?/*
					if (isset($arItem['PRODUCT_PROPERTIES'][$propID]))
						unset($arItem['PRODUCT_PROPERTIES'][$propID]);
				}
			}
			$emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);

			if (!$emptyProductProperties)
			{

				*/
    ?>
				<table>
					<?/*
					foreach ($arItem['PRODUCT_PROPERTIES'] as $propID => $propInfo)
					{
						*/
    ?>
						<tr>
							<td><? /* echo $arItem['PROPERTIES'][$propID]['NAME']; */ ?></td>
							<td>
								<?/*
								if (
									'L' == $arItem['PROPERTIES'][$propID]['PROPERTY_TYPE']
									&& 'C' == $arItem['PROPERTIES'][$propID]['LIST_TYPE']
								)
								{
									foreach ($propInfo['VALUES'] as $valueID => $value)
									{
										*/
    ?><label><input
										type="radio"
										name="<? /* echo $arParams['PRODUCT_PROPS_VARIABLE']; */ ?>[<? /* echo $propID; */ ?>]"
										value="<? /* echo $valueID; */ ?>"
										<? /* echo($valueID == $propInfo['SELECTED'] ? '"checked"' : ''); */ ?>
										><? /* echo $value; */ ?></label><br><?/*
									}
								}
								else
								{
									*/
    ?><select
									name="<? /* echo $arParams['PRODUCT_PROPS_VARIABLE']; */ ?>[<? /* echo $propID; */ ?>]"><?/*
									foreach ($propInfo['VALUES'] as $valueID => $value)
									{
										*/
    ?>
										<option
										value="<? /* echo $valueID; */ ?>"
										<? /* echo($valueID == $propInfo['SELECTED'] ? '"selected"' : ''); */ ?>
										><? /* echo $value; */ ?></option><?/*
									}
									*/
    ?></select><?/*
								}
								*/
    ?>
							</td>
						</tr>
					<?/*
					}
					*/
    ?>
				</table>
			<?/*
			}
			*/
    ?>
		</div>
	<?/*
	}
	$arJSParams = array(
		'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
		'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
		'SHOW_ADD_BASKET_BTN' => false,
		'SHOW_BUY_BTN' => true,
		'SHOW_ABSENT' => true,
		'PRODUCT' => array(
			'ID' => $arItem['ID'],
			'NAME' => $arItem['~NAME'],
			'PICT' => ('Y' == $arItem['SECOND_PICT'] ? $arItem['PREVIEW_PICTURE_SECOND'] : $arItem['PREVIEW_PICTURE']),
			'CAN_BUY' => $arItem["CAN_BUY"],
			'SUBSCRIPTION' => ('Y' == $arItem['CATALOG_SUBSCRIPTION']),
			'CHECK_QUANTITY' => $arItem['CHECK_QUANTITY'],
			'MAX_QUANTITY' => $arItem['CATALOG_QUANTITY'],
			'STEP_QUANTITY' => $arItem['CATALOG_MEASURE_RATIO'],
			'QUANTITY_FLOAT' => is_double($arItem['CATALOG_MEASURE_RATIO']),
			'ADD_URL' => $arItem['~ADD_URL'],
			'SUBSCRIBE_URL' => $arItem['~SUBSCRIBE_URL']
		),
		'BASKET' => array(
			'ADD_PROPS' => ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET']),
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS' => $emptyProductProperties
		),
		'VISUAL' => array(
			'ID' => $arItemIDs['ID'],
			'PICT_ID' => ('Y' == $arItem['SECOND_PICT'] ? $arItemIDs['SECOND_PICT'] : $arItemIDs['PICT']),
			'QUANTITY_ID' => $arItemIDs['QUANTITY'],
			'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
			'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
			'PRICE_ID' => $arItemIDs['PRICE'],
			'BUY_ID' => $arItemIDs['BUY_LINK'],
			'BASKET_PROP_DIV' => $arItemIDs['BASKET_PROP_DIV']
		),
		'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
	);
	*/
    ?>
		<script type="text/javascript">
			var <? /* echo $strObName; */ ?> =
			new JCCatalogSectionRec(<? /* echo CUtil::PhpToJSObject($arJSParams, false, true); */ ?>);
		</script><?/*
	}
	else // Wth Sku
	{
	*/
    ?>
		<div class="bx_catalog_item_controls no_touch">
			<?/*
			if ('Y' == $arParams['USE_PRODUCT_QUANTITY'])
			{
				*/
    ?>
				<div class="bx_catalog_item_controls_blockone">
					<a id="<? /* echo $arItemIDs['QUANTITY_DOWN']; */ ?>" href="javascript:void(0)"
						class="bx_bt_button_type_2 bx_small" rel="nofollow">-</a>
					<input type="text" class="bx_col_input" id="<? /* echo $arItemIDs['QUANTITY']; */ ?>"
						name="<? /* echo $arParams["PRODUCT_QUANTITY_VARIABLE"]; */ ?>"
						value="<? /* echo $arItem['CATALOG_MEASURE_RATIO']; */ ?>">
					<a id="<? /* echo $arItemIDs['QUANTITY_UP']; */ ?>" href="javascript:void(0)"
						class="bx_bt_button_type_2 bx_small" rel="nofollow">+</a>
					<span id="<? /* echo $arItemIDs['QUANTITY_MEASURE']; */ ?>"></span>
				</div>
			<?/*
			}
			*/
    ?>
			<div class="bx_catalog_item_controls_blocktwo">
				<a id="<? /* echo $arItemIDs['BUY_LINK']; */ ?>" class="bx_bt_button bx_medium"
					href="javascript:void(0)" rel="nofollow"><?/*
					echo('' != $arParams['MESS_BTN_BUY'] ? $arParams['MESS_BTN_BUY'] : GetMessage('CT_BCS_TPL_MESS_BTN_BUY'));
					*/
    ?></a>
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="bx_catalog_item_controls touch">
			<a class="bx_bt_button_type_2 bx_medium" href="<? /* echo $arItem['DETAIL_PAGE_URL']; */ ?>"><?/*
				echo('' != $arParams['MESS_BTN_DETAIL'] ? $arParams['MESS_BTN_DETAIL'] : GetMessage('CATALOG_RECOMMENDED_PRODUCTS_TPL_MESS_BTN_DETAIL'));
				*/
    ?></a>
		</div>
	<?/*
	$boolShowOfferProps = !!$arItem['OFFERS_PROPS_DISPLAY'];
	$boolShowProductProps = (isset($arItem['DISPLAY_PROPERTIES']) && !empty($arItem['DISPLAY_PROPERTIES']));
	if ($boolShowProductProps || $boolShowOfferProps)
	{
	*/
    ?>
		<div class="bx_catalog_item_articul">
			<?/*
			if ($boolShowProductProps)
			{
				foreach ($arItem['DISPLAY_PROPERTIES'] as $arOneProp)
				{
					*/
    ?><br><? /* echo $arOneProp['NAME']; */ ?><strong> <?/*
					echo(
					is_array($arOneProp['DISPLAY_VALUE'])
						? implode(' / ', $arOneProp['DISPLAY_VALUE'])
						: $arOneProp['DISPLAY_VALUE']
					); */
    ?></strong><?/*
				}
			}

			*/
    ?>
			<span id="<? /* echo $arItemIDs['DISPLAY_PROP_DIV']; */ ?>" style="display: none;"></span>
			<?/*

			*/
    ?>
		</div>
	<?/*
	}

	if (!empty($arItem['OFFERS']) && isset($arSkuTemplate[$arItem['IBLOCK_ID']]))
	{
	$arSkuProps = array();
	*/
    ?>
		<div class="bx_catalog_item_scu" id="<? /* echo $arItemIDs['PROP_DIV']; */ ?>"><?/*
			foreach ($arSkuTemplate[$arItem['IBLOCK_ID']] as $code => $strTemplate)
			{
				if (!isset($arItem['OFFERS_PROP'][$code]))
					continue;
				echo '<div>', str_replace('#ITEM#_prop_', $arItemIDs['PROP'], $strTemplate), '</div>';
			}

			if (isset($arResult['SKU_PROPS'][$arItem['IBLOCK_ID']]))
			{
				foreach ($arResult['SKU_PROPS'][$arItem['IBLOCK_ID']] as $arOneProp)
				{
					if (!isset($arItem['OFFERS_PROP'][$arOneProp['CODE']]))
						continue;
					$arSkuProps[] = array(
						'ID' => $arOneProp['ID'],
						'SHOW_MODE' => $arOneProp['SHOW_MODE'],
						'VALUES_COUNT' => $arOneProp['VALUES_COUNT']
					);
				}
			}
			foreach ($arItem['JS_OFFERS'] as &$arOneJs)
			{
				if (0 < $arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'])
					$arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'] = '-' . $arOneJs['PRICE']['DISCOUNT_DIFF_PERCENT'] . '%';
			}

			*/
    ?></div><?/*
	if ($arItem['OFFERS_PROPS_DISPLAY'])
	{
		foreach ($arItem['JS_OFFERS'] as $keyOffer => $arJSOffer)
		{
			$strProps = '';
			if (!empty($arJSOffer['DISPLAY_PROPERTIES']))
			{
				foreach ($arJSOffer['DISPLAY_PROPERTIES'] as $arOneProp)
				{
					$strProps .= '<br>' . $arOneProp['NAME'] . ' <strong>' . (
						is_array($arOneProp['VALUE'])
							? implode(' / ', $arOneProp['VALUE'])
							: $arOneProp['VALUE']
						) . '</strong>';
				}
			}
			$arItem['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
		}
	}
	$arJSParams = array(
		'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
		'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
		'SHOW_ADD_BASKET_BTN' => false,
		'SHOW_BUY_BTN' => true,
		'SHOW_ABSENT' => true,
		'SHOW_SKU_PROPS' => $arItem['OFFERS_PROPS_DISPLAY'],
		'SECOND_PICT' => ($arParams['SHOW_IMAGE'] == "Y" ? $arItem['SECOND_PICT'] : false),
		'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
		'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
		'DEFAULT_PICTURE' => array(
			'PICTURE' => $arItem['PRODUCT_PREVIEW'],
			'PICTURE_SECOND' => $arItem['PRODUCT_PREVIEW_SECOND']
		),
		'VISUAL' => array(
			'ID' => $arItemIDs['ID'],
			'PICT_ID' => $arItemIDs['PICT'],
			'SECOND_PICT_ID' => $arItemIDs['SECOND_PICT'],
			'QUANTITY_ID' => $arItemIDs['QUANTITY'],
			'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
			'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
			'QUANTITY_MEASURE' => $arItemIDs['QUANTITY_MEASURE'],
			'PRICE_ID' => $arItemIDs['PRICE'],
			'TREE_ID' => $arItemIDs['PROP_DIV'],
			'TREE_ITEM_ID' => $arItemIDs['PROP'],
			'BUY_ID' => $arItemIDs['BUY_LINK'],
			'ADD_BASKET_ID' => $arItemIDs['ADD_BASKET_ID'],
			'DSC_PERC' => $arItemIDs['DSC_PERC'],
			'SECOND_DSC_PERC' => $arItemIDs['SECOND_DSC_PERC'],
			'DISPLAY_PROP_DIV' => $arItemIDs['DISPLAY_PROP_DIV'],
		),
		'BASKET' => array(
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE']
		),
		'PRODUCT' => array(
			'ID' => $arItem['ID'],
			'NAME' => $arItem['~NAME']
		),
		'OFFERS' => $arItem['JS_OFFERS'],
		'OFFER_SELECTED' => $arItem['OFFERS_SELECTED'],
		'TREE_PROPS' => $arSkuProps,
		'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
	);
	*/
    ?>

	<?/*
	}
	}
	*/
    ?></div>

		</div><?/*
	}
	*/
    ?>-->
<?





