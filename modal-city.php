<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!CModule::IncludeModule("Sale") || !CModule::IncludeModule("Main")) die;
$sectionId = $_REQUEST['SECTION_ID'];
// создаем объект
$obCache = new CPHPCache;

// время кеширования
$life_time = 3600000;

// формируем идентификатор кеша в зависимости от всех параметров
// которые могут повлиять на результирующий HTML
$cache_id = "select-city-cache1111111111181";

// если кеш есть и он ещё не истек, то
if ($obCache->InitCache($life_time, $cache_id, "/")):
    // получаем закешированные переменные
    $vars = $obCache->GetVars();
    $db_vars = $vars["db_vars"];
else :
    // иначе обращаемся к базе
    $db_vars = CSaleLocationGroup::GetLocationList(
        array("LOCATION_GROUP_ID"=>'1')
    );
    while ($vars = $db_vars->Fetch()){
        $locationFilter[]=$vars['LOCATION_ID'];
    }
    $db_vars = CSaleLocation::GetList(
        array(
            "SORT" => "ASC",
            "ID" => "ASC",
            "CITY_NAME_LANG" => "ASC"
        ),
        array("ID"=>$locationFilter),
        false,
        false,
        array()
    );
endif;
test_dump($locationFilter);
// начинаем буферизирование вывода
if ($obCache->StartDataCache()):?>
    <div id="modal">
        <div class="select-city">
            <h1>Выберите Ваш город</h1>

            <div class="city-list">
                <ul>
                    <?
                    while ($vars = $db_vars->Fetch()):
                        ?>
                        <li value="<?= $vars["ID"] ?>">
                            <a class="city" href="#"><?= htmlspecialchars($vars["CITY_NAME"]) ?></a>
                        </li>
                    <?
                    endwhile;
                    ?>
                </ul>
                <div class="clear"></div>
            </div>
        </div>

    </div>
<?
// записываем предварительно буферизированный вывод в файл кеша
// вместе с дополнительной переменной
    $obCache->EndDataCache(array(
        "db_vars" => $db_vars
    ));
endif;

