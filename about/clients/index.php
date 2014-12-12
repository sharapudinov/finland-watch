<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наши клиенты");
?>
<div class="content">
    <section class="main-block">
        <?$APPLICATION->IncludeComponent(
            "webvbi:furniture.catalog.index",
            "finland-watch-clients",
            Array(
                "IBLOCK_TYPE" => "services",
                "IBLOCK_ID" => "7",
                "IBLOCK_BINDING" => "element",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000",
                "CACHE_GROUPS" => "Y"
            )
        );?>
    </section>
</div>
    <div id="dynamic-block">
        <div class="dynamic-block">
            <ul>
                <li><a href="/about">О магазине</a></li>
                <li ><a href="/about/service">Сервис</a></li>
                <li><a href="/reviews">ОТЗЫВЫ</a></li>
            </ul>
            <div class="clear"></div>
        </div>

    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>