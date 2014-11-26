<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!-- main-wrapper-->
    </div>

<!--				--><?//if ($wizTemplateId == "eshop_adapt_vertical"):?>
    <section>
        <div id="main-footer">
            <a href="#" title="Вернуться к началу" id="toTop" class="topbutton"></a>
            <div class="footer">
                <div class="block-footer-menu">
                    <h5>Доставка<br/> оплата</h5>
                    <div class="lines-blue"></div>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "finland_bottom_menu", array(
                            "ROOT_MENU_TYPE" => "left",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "36000000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MAX_LEVEL" => "3",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                    <div class="clear"></div>
                </div>
                <div class="block-footer-menu">
                    <h5 class="one">Поддержка</h5>
                    <div class="lines-blue"></div>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "finland_bottom_menu", Array(
                            "ROOT_MENU_TYPE" => "bottom",    // Тип меню для первого уровня
                            "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                            "MENU_CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MAX_LEVEL" => "3",    // Уровень вложенности меню
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                        ),
                        false
                    );?>
                    <div class="clear"></div>
                </div>
                <div class="block-footer-menu">
                    <h5>Следуйте за<br/> нами</h5>
                    <div class="lines-blue"></div>
                    <?
                    $facebookLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_facebook.php");
                    $twitterLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_twitter.php");
                    $googlePlusLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_ok.php");
                    $vkLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_vk.php");
                    ?>
                    <ul class="link-social">
                        <? if ($facebookLink): ?>
                            <li class="f"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "include/socnet_facebook.php",
                                        "EDIT_TEMPLATE" => "standard.php"
                                    ),
                                    false
                                );?></li>
                        <? endif ?>
                        <? if ($twitterLink): ?>
                            <li class="tw"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "include/socnet_twitter.php",
                                        "EDIT_TEMPLATE" => "standard.php"
                                    ),
                                    false
                                );?></li>
                        <? endif ?>
                        <? if ($googlePlusLink): ?>
                            <li class="od"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "include/socnet_ok.php",
                                        "EDIT_TEMPLATE" => "standard.php"
                                    ),
                                    false
                                );?></li>
                        <? endif ?>
                        <? if (LANGUAGE_ID == "ru" && $vkLink): ?>
                            <li class="vk"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "include/socnet_vk.php",
                                        "EDIT_TEMPLATE" => "standard.php"
                                    ),
                                    false
                                );?></li>
                        <? endif ?>
                    </ul>
                    <div class="clear"></div>
                    <ul class="link-info">
                        <li>Новая информация!</li>
                        <li>Участие в акциях и конкурсах!</li>

                    </ul>
                </div>
                <div class="block-footer-menu contacts">
                    <h5 class="one">Контакты</h5>
                    <div class="lines-blue"></div>
                    <ul>
                        <li class="address"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/address.php",
                                    "EDIT_TEMPLATE" => "standard.php"
                                ),
                                false
                            );?></li>
                        <li class="phone-text">Телефоны:</li>
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/telephone2.php",
                                    "EDIT_TEMPLATE" => "standard.php"
                                ),
                                false
                            );?></li>
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/telephone3.php",
                                    "EDIT_TEMPLATE" => "standard.php"
                                ),
                                false
                            );?></li>
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/telephone4.php",
                                    "EDIT_TEMPLATE" => "standard.php"
                                ),
                                false
                            );?></li>
                        <li class="phone-text">Почта:</li>
                        <li><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/e-mail.php",
                                    "EDIT_TEMPLATE" => "standard.php"
                                ),
                                false
                            );?></li>

                    </ul>
                    <div class="clear"></div>

                </div>
            </div>
            <div class="clear"></div>
            <div class="block-copyright">
                <div class="copyright">
                    <p class="copyright"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/copyright.php",
                                "EDIT_TEMPLATE" => "standard.php"
                            ),
                            false
                        );?></p>
                    <div class="author-site">
                        <a href="http://webvbi.ru/">webvbi.ru</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Заказать обратный звонок -->
<?$APPLICATION->IncludeComponent(
	"webvbi:callback", 
	"finland-watch-callback", 
	array(
		"USE_CAPTCHA" => "N",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => "sale@www.ablout.ru",
		"USE_MESSAGE_FIELD" => "N",
		"SAVE_FORM_DATA" => "N",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "PHONE",
		),
		"EVENT_MESSAGE_ID" => ""
	),
	false
);?>
<!-- Заказать обратный звонок конец -->

    </body>
</html>