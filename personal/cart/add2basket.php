<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (CModule::IncludeModule('catalog')){
    if (Add2BasketByProductID($_REQUEST['ID'])){
        $addResult = array('STATUS' => 'OK');
    }
    else  {
        $addResult = array('STATUS' => 'ERROR', 'MESSAGE' => "basket error");
    }
}
else {
    $addResult = array('STATUS' => 'ERROR', 'MESSAGE' => "module error");
}
$APPLICATION->RestartBuffer();
echo CUtil::PhpToJSObject($addResult);

