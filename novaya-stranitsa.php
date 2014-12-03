<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>
<?
// Выведем актуальную корзину для текущего пользователя

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array("ID", "CALLBACK_FUNC", "MODULE",
        "PRODUCT_ID", "QUANTITY", "DELAY",
        "CAN_BUY", "PRICE")
);
while ($arItems = $dbBasketItems->Fetch())
{
    $arBasketItems[] = $arItems;
}

// Печатаем массив, содержащий актуальную на текущий момент корзину
echo "<pre>";
print_r($arBasketItems);
echo "</pre>";
?>
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>