<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if(!CModule::IncludeModule("Main")) die;
$sectionCode = $_REQUEST['SECTION_CODE'];
// создаем объект
$obCache = new CPHPCache;

// время кеширования
$life_time = 360000000;

// формируем идентификатор кеша в зависимости от всех параметров
// которые могут повлиять на результирующий HTML
$cache_id = $sectionCode;

// если кеш есть и он ещё не истек, то
if ($obCache->InitCache($life_time, $cache_id, "/")):
    // получаем закешированные переменные
    $vars = $obCache->GetVars();
    $dbRes = $vars["dbRes"];
else :
    // иначе обращаемся к базе
    if (CModule::IncludeModule("IBlock")) {
        $dbRes = CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("SECTION_CODE" => $sectionCode, "IBLOCK_CODE" => "watch"),
            false,
            false,
            array("NAME", "PROPERTY_MANUAL", "PROPERTY_SOFTWARE", "DETAIL_PAGE_URL")
        );
    }
endif;

// начинаем буферизирование вывода
if ($obCache->StartDataCache()):?>
    <tr>
        <th>Наименование</th>
        <th>Инструкция</th>
        <th>Програмное <br/>обеcпечение</th>
    </tr>
    <?while ($item = $dbRes->GetNext()):
        ?>
        <tr>
            <td>
                <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                    <?= $item['NAME']; ?>
                </a>
            </td>
            <td>
                <? if ($item['PROPERTY_MANUAL_VALUE']): ?>
                    <a href="<?=CFile::GetPath($item['PROPERTY_MANUAL_VALUE']) ?>">
                        Скачать
                    </a>
                <? endif ?>
            </td>
            <td>
                <? if ($item['PROPERTY_SOFTWARE_VALUE']): ?>

                    <a href="<?= CFile::GetPath($item['PROPERTY_SOFTWARE_VALUE']) ?>">
                        Скачать
                    </a>
                <? endif ?>

            </td>
        </tr>
    <?endwhile;
    // записываем предварительно буферизированный вывод в файл кеша
    // вместе с дополнительной переменной
    $obCache->EndDataCache(array(
        "dbRes" => $dbRes
    ));
endif;
?>