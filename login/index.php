<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Вход на сайт");
?>
    <div class="content">

        <section class="main-block">
            <div class="article-text login-verification">
                <div class="login-yes">
                    <div class="title-head-login">
                        <p>Для вернувшихся пользователей</p>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:system.auth.form",
                        "finland-watch-main",
                        Array(
                            "REGISTER_URL" => "",
                            "FORGOT_PASSWORD_URL" => "",
                            "PROFILE_URL" => "",
                            "SHOW_ERRORS" => "N"
                        )
                    ); ?>
                    <div class="title-head-login">
                        <p>Продолжить без регистрации</p>
                    </div>
                    <div class="continue">
                        <p>Оформите заказ как гость всего в два клика. Позже Вы можете зарегистрироваться и
                            пользоваться всеми преимуществами постоянного покупателя.</p>
                        <ul>
                            <li>Следить за статусом заказа</li>
                            <li>Менять контактные данные</li>
                            <li>Получайте персонализированные предложения</li>
                        </ul>
                        <p class="link-reg"><a href="basket-login-verification.html">Продолжить</a></p>
                    </div>
                </div>

                <div class="login-new">
                    <div class="title-head-login">
                        <p>Для новых пользователей</p>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.register",
                        "finland_watch",
                        array(
                            "SHOW_FIELDS" => array(),
                            "REQUIRED_FIELDS" => array(),
                            "AUTH" => "Y",
                            "USE_BACKURL" => "Y",
                            "SUCCESS_PAGE" => "",
                            "SET_TITLE" => "Y",
                            "USER_PROPERTY" => array(),
                            "USER_PROPERTY_NAME" => ""
                        ),
                        false
                    ); ?>
                </div>
            </div>

        </section>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>