<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О магазине");
?>
    <div class="content">

        <section class="main-block">

            <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/company_about.php"), false); ?>
            <div class="block-img">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/about.jpg" width="416" height="610" title="" alt="" />
            </div>
            <div class="clear"></div>
        </section>
    </div>
    <section>
        <div id="dynamic-block">
            <div class="dynamic-block">
                <ul>
                    <li class="active"><a href="#">СЕРВИС</a></li>
                    <li><a href="#">НАШИ КЛИЕНТЫ</a></li>
                    <li><a href="#">ОТЗЫВЫ</a></li>
                </ul>
                <div class="clear"></div>
            </div>

        </div>
        <div class="clear"></div>
    </section>
    <section>
        <div id="service-centr-block">
            <div class="service-centr">
                <span class="title-service blue">СЕРВИСНЫЕ ЦЕНТРЫ SUUNTO</span>
                <div class="service-text-left">
                    <p><span class="blue">Ремонтно-сервисные центры компании Suunto расположены по всей России.</span>
                        Авторизированные сервис-центры по обслуживанию спортивных приборов Suunto в РФ:</p>

                </div>
                <div class="service-text-right">
                    <p>Для удобства пользования спортивными часами Suunto и возможностью настройки наручных компьютеров <span class="blue">можно скачать Инструкции и Справочники для каждой модели часов Suunto.</span></p>

                </div>
                <div class="clear"></div>
                <ul>
                    <li>Москва, ул. Вятская, д.27, стр.3. (495) 783-74-64</li>
                    <li>С-Петербург, Морская наб. д. 33, лит.А, <br/>пом. 13-Н (921) 633-81-04</li>
                </ul>
            </div>

        </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>