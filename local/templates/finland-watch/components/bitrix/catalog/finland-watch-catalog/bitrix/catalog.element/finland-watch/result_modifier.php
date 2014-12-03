<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$user_id = $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'];
if ($user_id) {
    $rsUSER = CUser::GetById($user_id);
    $f = $rsUSER->Fetch();
    $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'] = CUser::FormatName(CSite::GetNameFormat(false), array("NAME" => $f['NAME'], "LAST_NAME" => $f['LAST_NAME'], "SECOND_NAME" => $f['SECOND_NAME'], "LOGIN" => $f['LOGIN']));
}

$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width' => 50, 'height' => 65), BX_RESIZE_IMAGE_PROPORTIONAL, true);

$arResult["RESIZED_PREVIEW"] = $file;

if (count($arResult["MORE_PHOTO"]) > 0) {
    foreach ($arResult["MORE_PHOTO"] as $PHOTO) {
        $file = CFile::ResizeImageGet($PHOTO, array('width' => 50, 'height' => 65), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['RESIZED_PHOTOS'][] = $file;
    }
}
$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width' => 330, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$arResult["RESIZED_MAIN_PREVIEW"] = $file;

if (count($arResult["MORE_PHOTO"]) > 0) {
    foreach ($arResult["MORE_PHOTO"] as $PHOTO) {
        $file = CFile::ResizeImageGet($PHOTO, array('width' => 330, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['RESIZED_MAIN_PHOTOS'][] = $file;
    }
}