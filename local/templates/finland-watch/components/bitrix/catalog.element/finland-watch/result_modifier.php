<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$user_id = $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'];
if ($user_id) {
    $rsUSER = CUser::GetById($user_id);
    $f = $rsUSER->Fetch();
    $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'] = CUser::FormatName(CSite::GetNameFormat(false), array("NAME" => $f['NAME'], "LAST_NAME" => $f['LAST_NAME'], "SECOND_NAME" => $f['SECOND_NAME'], "LOGIN" => $f['LOGIN']));
}

$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width' => 70, 'height' => 70), BX_RESIZE_IMAGE_PROPORTIONAL, true);

$arResult["RESIZED_PREVIEW"] = $file;

if (count($arResult["MORE_PHOTO"]) > 0) {
    foreach ($arResult["MORE_PHOTO"] as $PHOTO) {
        $file = CFile::ResizeImageGet($PHOTO, array('width' => 70, 'height' => 70), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['RESIZED_PHOTOS'][] = $file;
    }
}
$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width' => 340, 'height' => 340), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$arResult["RESIZED_MAIN_PREVIEW"] = $file;

if (count($arResult["MORE_PHOTO"]) > 0) {
    foreach ($arResult["MORE_PHOTO"] as $PHOTO) {
        $file = CFile::ResizeImageGet($PHOTO, array('width' => 340, 'height' => 340), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['RESIZED_MAIN_PHOTOS'][] = $file;
    }
}
$obVideo=CIBlockElement::GetList(
    array("SORT"=>"ASC"),
    array(
        "IBLOCK_CODE"=>"VIDEO",
        "ID"=>$arResult['PROPERTIES']['VIDEO']['VALUE']),
    false,
    false,
    array(
        "ID",
        "NAME",
        "PREVIEW_TEXT")
);
while($video=$obVideo->GetNext()){
    $arResult["VIDEO"][]=$video;
}

$obVideo=CIBlockElement::GetList(
    array("SORT"=>"ASC"),
    array(
        "IBLOCK_CODE"=>"watch",
        "ID"=>$arResult['PROPERTIES']['PRESENTS']['VALUE']),
    false,
    false,
    array(
        "ID",
        "PREVIEW_PICTURE")
);
$index=0;
while($present=$obVideo->GetNext()){
    $arResult["PRESENTS"][$index]['RESIZE']=CFile::ResizeImageGet($present['PREVIEW_PICTURE'],array('width'=>56,'height'=>76),BX_RESIZE_IMAGE_PROPORTIONAL);
    $arResult["PRESENTS"][$index]['ID']=$present['ID'];
    $index++;
}