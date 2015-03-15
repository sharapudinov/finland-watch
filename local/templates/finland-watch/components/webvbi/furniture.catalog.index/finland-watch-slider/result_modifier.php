<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['ITEMS'] as $key=>$arItem)
{
	$arFileTmp = CFile::ResizeImageGet(
		$arItem['PREVIEW_PICTURE'],
		array("width" => 265, "height" => 265),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);
   // $arResult['ITEMS'][$key]["PREVIEW_PICTURE"] = $arFileTmp;

    $arFileTmp = CFile::ResizeImageGet(
        $arItem['DETAIL_PICTURE'],
        array("width" => 4096, "height" => 401),
        BX_RESIZE_IMAGE_PROPORTIONAL,
        true
    );

	//$arResult['ITEMS'][$key]["DETAIL_PICTURE"] = $arFileTmp;
}
?>