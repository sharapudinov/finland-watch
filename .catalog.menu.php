<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$aMenuLinks = array();
if(CModule::IncludeModule('IBlock')) {
    $dbRes=CIBlockElement::GetList(
        array("PROPERTY_SPORT"=>"ASC"),
        array("IBLOCK_ID"=>2),
        array("PROPERTY_SPORT"),
        false);
    while($item = $dbRes->GetNext()) {
        if($item["PROPERTY_SPORT_ENUM_ID"]!=null){
            $aMenuLinks[]=array($item['PROPERTY_SPORT_VALUE'],'/catalog/all/?SPORT='.$item['PROPERTY_SPORT_ENUM_ID']);
        }
    }
}