<?php
/**
 * Created by PhpStorm.
 * User: Шамиль
 * Date: 05.02.2015
 * Time: 14:15
 */
$aMenuLinks = array(
    Array(
        "Все модели",
        "/catalog/all/",
        Array(),
        Array(),
        ""
    )

);
$aMenuLinksExt = array();
if(CModule::IncludeModule('iblock')) {
    $dbRes=CIBlockElement::GetList(
        array("PROPERTY_SPORT"=>"ASC"),
        array("IBLOCK_ID"=>2),
        array("PROPERTY_SPORT"),
        false);
    while($item = $dbRes->GetNext()) {
        if($item["PROPERTY_SPORT_ENUM_ID"]!=null){
            $aMenuLinksExt[]=Array($item['PROPERTY_SPORT_VALUE'],'/catalog/all/?SPORT='.$item['PROPERTY_SPORT_ENUM_ID']);
        }
    }}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);