<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['ITEMS'] as $key=>$arItem)
{
	$arFileTmp = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']["ID"],
		array("width" => 141, "height" => 130),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);

	$arResult['ITEMS'][$key]["PICTURE"] = $arFileTmp;
}
?>