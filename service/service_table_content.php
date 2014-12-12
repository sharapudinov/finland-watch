<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
//test_dump($dbRes);
$sectionId = $_REQUEST['SECTION_ID'];
// создаем объект
$obCache = new CPHPCache;

// время кеширования - 30 минут
$life_time = 360000000;

// формируем идентификатор кеша в зависимости от всех параметров
// которые могут повлиять на результирующий HTML
$cache_id = $sectionId;

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
            array("SECTION_ID" => $sectionId, "IBLOCK_ID" => 2),
            false,
            false,
            array("NAME", "PROPERTY_MANUAL", "PROPERTY_SOFTWARE", "DETAIL_PAGE_URL")
        );
    }
endif;

// начинаем буферизирование вывода
if ($obCache->StartDataCache()):?>
    // выбираем из базы параметры элемента инфо-блока
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
                    <a href="<?= CFile::GetPah($item['PROPERTY_MANUAL_VALUE']) ?>">
                        Скачать
                    </a>
                <? endif ?>
            </td>
            <td>
                <? if ($item['PROPERTY_SOFTWARE_VALUE']): ?>

                    <a href="<?= CFile::GetPah($item['PROPERTY_SOFTWARE_VALUE']) ?>">
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