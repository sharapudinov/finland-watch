<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
$wizTemplateId = COption::GetOptionString("main", "wizard_template_id", "finland-watch", SITE_ID);
CUtil::InitJSCore();
CJSCore::Init(array("fx","jquery"));
$curPage = $APPLICATION->GetCurPage(true);
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
          <link rel="shortcut icon" type="image/x-icon" href="<?= SITE_DIR ?>/favicon.ico"/>
        <script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
        <?//$APPLICATION->ShowHead();
        echo '<meta http-equiv="Content-Type" content="text/html; charset=' . LANG_CHARSET . '"' . (true ? ' /' : '') . '>' . "\n";

        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/magictoolbox/magicscroll/magicscroll.css');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/magictoolbox/magicscroll/magiczoom.css');

        $APPLICATION->ShowMeta("robots", false, true);
        $APPLICATION->ShowMeta("keywords", false, true);
        $APPLICATION->ShowMeta("description", false, true);
        $APPLICATION->ShowCSS(true, true);
        $APPLICATION->ShowHeadStrings();
        $APPLICATION->ShowHeadScripts();
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/fancybox/jquery.fancybox.js?v=2.1.5");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/fancybox/jquery.fancybox.pack.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/fancybox/jquery.mousewheel-3.0.6.pack.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-ui.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.cookie.js");
/*        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/script-lof.js");*/
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.easing.js");
 /*       $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/zoom/jquery.jqzoom-core.js");*/
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/script.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/magictoolbox/magiczoom/magiczoom.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/magictoolbox/magicscroll/magicscroll.js");



        ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
    </head>
<body>
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div id="main-wrapper">
    <div id="wrapper">
    <section>
        <div id="main-header">
            <div id="phone-top" class="header-phones-top">
                <ul>
                    <li>
                        <p>Бесплатный звонок по России</p>
                            <span class="phone-top">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone.php"), false); ?>
                            </span>
                    </li>
                    <li>
                        <p>Москва</p>
                            <span class="phone-top">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone2.php"), false); ?>
                            </span>
                    </li>
                    <li>
                        <p>Санкт-Петербург</p>
                            <span class="phone-top">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone3.php"), false); ?>
                            </span>
                    </li>
                    <li><a class="modalbox" href="#inline">заказать звонок</a></li>
                </ul>

            </div>

            <div class="header">
                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/company_logo.php"), false); ?>
                <div class="block-phone-region">
                    <div class="phone-free">
                        <p>Бесплатный звонок по России</p>
                            <span class="phone">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone.php"), false); ?>
                             </span>
                    </div>
                    <div class="phone-region">
                        <ul>
                            <li class="region" title="Выбор региона"><a class="modal-city" data-fancybox-type="ajax" href="/modal-city.php">Москва и
                                    Подмосковье</a></li>
                            <li class="call"><a class="modalbox call_btn" href="#inline">Заказать звонок</a></li>
                        </ul>

                        <div class="clear"></div>
                            <span class="phone">
                                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone2.php"), false); ?>
                            </span>
                    </div>
                    <div class="clear"></div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:search.title",
                        "finland-watch",
                        array(
                            "NUM_CATEGORIES" => "1",
                            "TOP_COUNT" => "5",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => SITE_DIR . "catalog/",
                            "CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
                            "CATEGORY_0" => array(
                                0 => "iblock_catalog",
                            ),
                            "CATEGORY_0_iblock_catalog" => array(
                                0 => "all",
                            ),
                            "CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input",
                            "CONTAINER_ID" => "search",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "SHOW_PREVIEW" => "Y",
                            "PREVIEW_WIDTH" => "75",
                            "PREVIEW_HEIGHT" => "75",
                            "CONVERT_CURRENCY" => "Y",
                            "ORDER" => "date",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "PRICE_VAT_INCLUDE" => "Y",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "CURRENCY_ID" => "RUB"
                        ),
                        false
                    );?>
                </div>
                <div class="login-basket">
                    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "finland-watch", Array(
                            "REGISTER_URL" => SITE_DIR . "login/",    // Страница регистрации
                            "PROFILE_URL" => SITE_DIR . "personal/",    // Страница профиля
                            "SHOW_ERRORS" => "N",    // Показывать ошибки
                        ),
                        false
                    );?>
                    <div class="clear"></div>
                    <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "finland-watch", Array(
                            "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",    // Страница корзины
                            "PATH_TO_PERSONAL" => SITE_DIR . "personal/",    // Персональный раздел
                            "SHOW_PERSONAL_LINK" => "N",    // Отображать персональный раздел
                            "SHOW_NUM_PRODUCTS" => "Y",    // Показывать количество товаров
                            "SHOW_TOTAL_PRICE" => "Y",    // Показывать общую сумму по товарам
                            "SHOW_PRODUCTS" => "N",    // Показывать список товаров
                            "POSITION_FIXED" => "N",    // Отображать корзину поверх шаблона
                            "SHOW_EMPTY_VALUES" => 'Y'
                        ),
                        false
                    );?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <section>
        <div id="main-menu-top">
            <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"finland_top_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"USE_EXT" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MENU_THEME" => "site"
	),
	false
);?>
        </div>
    </section>


<? if ($curPage != SITE_DIR . "index.php"):?>
    <div id="main-content">
    <section>
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "finland-watch", array(
                "START_FROM" => "1",
                "PATH" => "",
                "SITE_ID" => "-"
            ),
            false,
            Array('HIDE_ICONS' => 'Y')
        );?>
        <?if (str_replace("/catalog/",'',$curPage)==$curPage):?>
            <h1>
                <?= $APPLICATION->ShowTitle(false); ?>
            </h1>
        <?endif?>
    </section>
<? endif ?>