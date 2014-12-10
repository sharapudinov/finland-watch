<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наши координаты");
?>
    <div class="content">
        <section class="main_block">
            <div class="article-text contact-text">
                <address>
                    <h5>Наши контактные телефоны:</h5>

                    <p class="city">в Москве</p>

                    <p class="phone">+7 (495) 795-55-43, +7 (495) 220-65-36, +7 (495) 500-26-51</p>

                    <p class="city">в Санкт-Петербурге:</p>

                    <p class="phone">+7 (812) 943-48-66</p>

                    <p class="city">бесплатный звонок из любой точки России:</p>

                    <p class="phone">8 800 100-50-11 (до 19:00 по московскому времени)</p>
                    <h5>Фирменный магазин Suunto в городе Москве</h5>

                    <p class="city">Наш адрес:</p>

                    <p class="phone">Москва, Рязанский проспект 30/15</p>

                    <div class="contacts-map">
                        <div class="map">
                            <iframe width="588" height="319" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.ru/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;
                                q=%D0%B3.+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D1%83%D0%BB.+2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F,+%D0%B4.+38%D0%90&amp;aq=&amp;
                                sll=55,103&amp;sspn=90.84699,270.527344&amp;t=m&amp;ie=UTF8&amp;hq=&amp;
                                hnear=2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+38,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127287&amp;ll=55.805478,37.569551&amp;
                                spn=0.023154,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                        </div>
                        <div class="img-increase-block">
                            <h5>Пешком от метро? По пути Вы можете встретить: </h5>
                            <ul>
                                <li><a rel="group" class="fancybox-contact"
                                       href="<?= SITE_TEMPLATE_PATH ?>/img/map.jpg"><img
                                            src="<?= SITE_TEMPLATE_PATH ?>/sliders/m.jpg" width="142" height="107"/>
                                        <span class="lens"><img src="<?= SITE_TEMPLATE_PATH ?>/images/loupe.png"
                                                                width="32" height="32"/> </span> </a></li>
                                <li><a rel="group" class="fancybox-contact"
                                       href="<?= SITE_TEMPLATE_PATH ?>/img/about.jpg"><img
                                            src="<?= SITE_TEMPLATE_PATH ?>/sliders/m.jpg" width="142" height="107"/>
                                        <span class="lens"><img src="<?= SITE_TEMPLATE_PATH ?>/images/loupe.png"
                                                                width="32" height="32"/> </span> </a></li>
                                <li><a rel="group" class="fancybox-contact"
                                       href="<?= SITE_TEMPLATE_PATH ?>/sliders/slide-c.jpg"><img
                                            src="<?= SITE_TEMPLATE_PATH ?>/sliders/m.jpg" width="142" height="107"/>
                                        <span class="lens"><img src="<?= SITE_TEMPLATE_PATH ?>/images/loupe.png"
                                                                width="32" height="32"/> </span> </a></li>
                                <li><a rel="group" class="fancybox-contact"
                                       href="<?= SITE_TEMPLATE_PATH ?>/img/map2.jpg"><img
                                            src="<?= SITE_TEMPLATE_PATH ?>/sliders/m.jpg" width="142" height="107"/>
                                        <span class="lens"><img src="<?= SITE_TEMPLATE_PATH ?>/images/loupe.png"
                                                                width="32" height="32"/> </span> </a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>

                    </div>
                </address>
            </div>
            <div class="block-img contact-form-slider">
                <div class="contact-slider">

                    <div class="flex-container">
                        <div class="flexslider-contact">
                            <ul class="slides">
                                <li>
                                    <a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/sliders/slide-c.jpg"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="block-feedback">
                    <span class="title-form-contacts">обратная связь</span>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.feedback",
                        "finland-watch",
                        array(
                            "USE_CAPTCHA" => "Y",
                            "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                            "EMAIL_TO" => "sale@www.ablout.ru",
                            "REQUIRED_FIELDS" => array(
                                0 => "NAME",
                                1 => "EMAIL",
                            ),
                            "EVENT_MESSAGE_ID" => array(
                                0 => "7",
                            )
                        ),
                        false
                    );?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </section>

    </div>
    <section>
        <div id="dynamic-block">
            <div class="dynamic-block dynamic-one-left">
                <span class="pickup">Пункты самовывоза</span>

                <div class="clear"></div>
            </div>

        </div>
        <div class="clear"></div>
    </section>
    <section>
        <?$APPLICATION->IncludeComponent(
            "bitrix:map.google.system",
            "santehnika-land",
            array(
                "INIT_MAP_TYPE" => "NORMAL",
                "MAP_WIDTH" => "697",
                "MAP_HEIGHT" => "488",
                "CONTROLS" => array(
                    0 => "SMALL_ZOOM_CONTROL",
                    1 => "TYPECONTROL",
                    2 => "SCALELINE",
                ),
                "OPTIONS" => array(
                    0 => "ENABLE_SCROLL_ZOOM",
                    1 => "ENABLE_DBLCLICK_ZOOM",
                    2 => "ENABLE_DRAGGING",
                    3 => "ENABLE_KEYBOARD",
                ),
                "MAP_ID" => ""
            ),
            false
        );?>
    </section>

    <script type="text/javascript">
        jQuery.noConflict();
        jQuery(document).ready(function () {
            jQuery('.fancybox-contact').fancybox();
        });
    </script>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php") ?>