<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Сервис");
?>
    <div class="content">
        <section class="main-block">
            <div class="reviews-text">
                <div class="service-block floatleft">
                    <div class="service-text ">
                        <p>Наша компания всегда рада постоянным и новым клиентам.
                            <br/><span class="red">Вы можете:</span></p>
                        <ul>
                            <li>Воспользоваться услугами и рекомендациями наших специалистов при выборе той или иной
                                модели
                                спортивных часов.
                            </li>

                            <li>Используя услуги Заказа продукции Интернет-магазина, Вы можете приобрести любые из
                                предложенных и Вами выбранных часов.
                            </li>
                        </ul>
                        <p>Служба доставки позволит Вам быстро и в короткие сроки получить заказанные у нас товары.</p>

                        <p>Срок гарантии на спортивные часы Suunto составляет 24 месяца со дня продажи через розничную
                            сеть. </p>
                    </div>
                </div>
                <div class="service-block floatright">
                    <div class="service-text">
                        <h6>Сервисные центры Suunto:</h6>

                        <p>Ремонтно-сервисные центры компании Suunto расположены по всей России.
                            Авторизированные сервис-центры по обслуживанию спортивных приборов Suunto в РФ:</p>
                        <ul>
                            <li>Москва, ул. Вятская, д.27, стр.3. (495) 783-74-64<br/>
                                <a href="http://maps.yandex.ru/?um=iumfQFGzNvEqBJYg-CGY7vV485ZEJiWt&amp;l=map"
                                   target="_blank">посмотреть на Яндекс Картах</a></li>

                            <li>С-Петербург, Морская наб. д. 33, лит.А, пом. 13-Н (921) 633-81-04</li>
                        </ul>
                        <p>Для удобства пользования спортивными часами Suunto и возможностью настройки наручных
                            компьютеров можно скачать Инструкции и Справочники для каждой модели часов Suunto.</p>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="link-table-block">
                    <div class="block-instruction">
                        <p class="red">Выберите и скачайте инструкции для часов Suunto:</p>
                        <section>
                            <div class="block-option">
                                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "finland-watch-select", Array(
                                        "IBLOCK_TYPE" => "catalog",    // Тип инфоблока
                                        "IBLOCK_ID" => "2",    // Инфоблок
                                        "SECTION_ID" => "",    // ID раздела
                                        "SECTION_CODE" => "",    // Код раздела
                                        "COUNT_ELEMENTS" => "Y",    // Показывать количество элементов в разделе
                                        "TOP_DEPTH" => "1",    // Максимальная отображаемая глубина разделов
                                        "SECTION_FIELDS" => array(    // Поля разделов
                                            0 => "",
                                            1 => "",
                                        ),
                                        "SECTION_USER_FIELDS" => array(    // Свойства разделов
                                            0 => "",
                                            1 => "",
                                        ),
                                        "VIEW_MODE" => "LINE",
                                        "SHOW_PARENT_NAME" => "Y",
                                        "SECTION_URL" => "",    // URL, ведущий на страницу с содержимым раздела
                                        "CACHE_TYPE" => "A",    // Тип кеширования
                                        "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                                        "CACHE_GROUPS" => "N",    // Учитывать права доступа
                                        "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
                                    ),
                                    false
                                );?>
                            </div>
                        </section>
                        <div class="clear"></div>
                    </div>
                    <table id="service_table">

                    </table>
                </div>

            </div>
        </section>
    </div>
    <div id="dynamic-block">
        <div class="dynamic-block">
            <ul>
                <li><a href="/about">О магазине</a></li>
                <li><a href="/service">Сервис</a></li>
                <li><a href="/reviews">ОТЗЫВЫ</a></li>
            </ul>
            <div class="clear"></div>
        </div>

    </div>
    <script>
        jQuery.noConflict();
        jQuery('.select-style').on("change", function () {
            jQuery("#service_table").load("service_table_content.php?SECTION_CODE=" + jQuery(this).val());
        });
    </script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>