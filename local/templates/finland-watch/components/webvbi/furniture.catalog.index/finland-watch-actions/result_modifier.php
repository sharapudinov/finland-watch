<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['ITEMS'] as $key=>$arItem)
{
	$arFileTmp = CFile::ResizeImageGet(
        $arItem["DETAIL_PICTURE"]['ID'],
		array("width" => 600, "height" => 256),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);

	$arResult['ITEMS'][$key]["PICTURE"] = $arFileTmp;
}
?>