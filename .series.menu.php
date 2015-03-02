<?php
/**
 * Created by PhpStorm.
 * User: Шамиль
 * Date: 02.03.2015
 * Time: 15:48
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule('iblock');
global$APPLICATION;

$aMenuLinks=$APPLICATION->IncludeComponent("bitrix:menu.sections","",Array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/catalog/",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "2",
        "DEPTH_LEVEL" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600"
    )
);
?>