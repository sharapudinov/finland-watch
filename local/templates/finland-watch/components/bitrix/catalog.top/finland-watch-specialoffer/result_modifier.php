<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("catalog"))
	return;

$arParams['ROTATE_TIMER'] = intval($arParams['ROTATE_TIMER']);
if (0 > $arParams['ROTATE_TIMER'])
	$arParams['ROTATE_TIMER'] = 30;
$arParams['ROTATE_TIMER'] *= 1000;

foreach($arResult["ITEMS"] as $cell=>$arElement)
{
	if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])) //Product has offers
	{
		$minItemPrice = 0;
		$minItemPriceFormat = "";
		foreach($arElement["OFFERS"] as $arOffer)
		{
			foreach($arOffer["PRICES"] as $code=>$arPrice)
			{
				if($arPrice["CAN_ACCESS"])
				{
					if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])
					{
						$minOfferPrice = $arPrice["DISCOUNT_VALUE"];
						$minOfferPriceFormat = $arPrice["PRINT_DISCOUNT_VALUE"];
					}
					else
					{
						$minOfferPrice = $arPrice["VALUE"];
						$minOfferPriceFormat = $arPrice["PRINT_VALUE"];
					}

					if ($minItemPrice > 0 && $minOfferPrice < $minItemPrice)
					{
						$minItemPrice = $minOfferPrice;
						$minItemPriceFormat = $minOfferPriceFormat;
					}
					elseif ($minItemPrice == 0)
					{
						$minItemPrice = $minOfferPrice;
						$minItemPriceFormat = $minOfferPriceFormat;
					}
				}
			}
		}
		if ($minItemPrice > 0)
		{
			$arResult["ITEMS"][$cell]["MIN_OFFER_PRICE"] = $minItemPrice;
			$arResult["ITEMS"][$cell]["PRINT_MIN_OFFER_PRICE"] = $minItemPriceFormat;
		}
	}
}
foreach($arResult["ITEMS"] as $cell=>$arElement){
	$file = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array('width' => 160, 'height' => 187), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	$arResult["ITEMS"][$cell]["RESIZED_PREVIEW"] = $file;
}

?>