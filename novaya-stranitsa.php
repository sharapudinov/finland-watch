<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");


?><div class="content">
 <section class="main_block">
     <?
     // Выберем все скидки для данного товара

     $dbProductDiscounts = CCatalogDiscount::GetList(
         array("SORT" => "ASC"),
         array(
             "+PRODUCT_ID" => '',
             "ACTIVE" => "Y",
             "!>ACTIVE_FROM" => $DB->FormatDate(date("Y-m-d H:i:s"),
                 "YYYY-MM-DD HH:MI:SS",
                 CSite::GetDateFormat("FULL")),
             "!<ACTIVE_TO" => $DB->FormatDate(date("Y-m-d H:i:s"),
                 "YYYY-MM-DD HH:MI:SS",
                 CSite::GetDateFormat("FULL")),
             "COUPON" => ""
         ),
         false,
         false,
         array(
             "ID", "SITE_ID", "ACTIVE", "ACTIVE_FROM", "ACTIVE_TO",
             "RENEWAL", "NAME", "SORT", "MAX_DISCOUNT", "VALUE_TYPE",
             "VALUE", "CURRENCY", "PRODUCT_ID"
         )
     );
     while ($arProductDiscounts = $dbProductDiscounts->Fetch())
     {
         test_dump($arProductDiscounts);
     }
     ?>


 </section>
</div>
 &nbsp;<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>