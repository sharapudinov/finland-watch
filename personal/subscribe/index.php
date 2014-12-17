<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Рассылки");
?>
    <div class="content">
        <section class="main_block">
            <?$APPLICATION->IncludeComponent(
                "bitrix:subscribe.edit",
                "",
                Array(
                    "AJAX_MODE" => "N",
                    "SHOW_HIDDEN" => "N",
                    "ALLOW_ANONYMOUS" => "Y",
                    "SHOW_AUTH_LINKS" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "SET_TITLE" => "N",
                    "AJAX_OPTION_SHADOW" => "Y",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N"
                ),
                false
            );?>
        </section>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>