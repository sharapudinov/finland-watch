<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");


?><div class="content">
 <section class="main_block">
<?
$dbProductDiscounts=CCatalogDiscount::GetList(
	array(),
	 array(),
	 false,
	false,
	array()
	 );
while ($arProductDiscounts = $dbProductDiscounts->Fetch())
{
	test_dump($arProductDiscounts);
}

 ?>
 </section>
</div>
 &nbsp;<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>