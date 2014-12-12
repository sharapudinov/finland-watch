<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['ITEMS'] as $key=>$arItem)
{
	$arFileTmp = CFile::ResizeImageGet(
		$arItem['PREVIEW_PICTURE']["ID"],
		array("width" => 265, "height" => 265),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);
    $arResult['ITEMS'][$key]["PREVIEW_PICTURE"] = $arFileTmp;

    $arFileTmp = CFile::ResizeImageGet(
        $arItem['DETAIL_PICTURE']["ID"],
        array("width" => 2506, "height" => 401),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true
    );

	$arResult['ITEMS'][$key]["DETAIL_PICTURE"] = $arFileTmp;
}
?>