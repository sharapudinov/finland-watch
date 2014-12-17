<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arDetParams = array(
    "PATH_TO_LIST" => $arResult["PATH_TO_LIST"],
    "PATH_TO_CANCEL" => $arResult["PATH_TO_CANCEL"],
    "PATH_TO_PAYMENT" => $arParams["PATH_TO_PAYMENT"],
    "SET_TITLE" => $arParams["SET_TITLE"],
    "ID" => $arResult["VARIABLES"]["ID"],
);
foreach ($arParams as $key => $val) {
    if (strpos($key, "PROP_") !== false)
        $arDetParams[$key] = $val;
}
?>
<div class="content">
    <section class="main-block">
        <div class="article-text login-verification personal-account">
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:sale.personal.order.detail",
                "finland-watch",
                $arDetParams,
                $component
            );
            ?></div>
    </section>
</div>
