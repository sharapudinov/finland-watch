<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult['ERRORS']['FATAL'])): ?>

    <? foreach ($arResult['ERRORS']['FATAL'] as $error): ?>
        <?= ShowError($error) ?>
    <? endforeach ?>

<? else: ?>

    <? if (!empty($arResult['ERRORS']['NONFATAL'])): ?>

        <? foreach ($arResult['ERRORS']['NONFATAL'] as $error): ?>
            <?= ShowError($error) ?>
        <? endforeach ?>

    <? endif ?>

    <div class="history">
        <ul>
            <? $nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]); ?>
            <? if ($nothing || isset($_REQUEST["filter_history"])): ?>
                <li><a href="<?= $arResult["CURRENT_PAGE"] ?>?show_all=Y"><?= GetMessage('SPOL_ORDERS_ALL') ?></a></li>
            <? endif ?>

            <? if ($_REQUEST["filter_history"] == 'Y' || $_REQUEST["show_all"] == 'Y'): ?>
                <li>
                    <a href="<?= $arResult["CURRENT_PAGE"] ?>?filter_history=N""><?= GetMessage('SPOL_CUR_ORDERS') ?></a>
                </li>
            <? endif ?>

            <? if ($nothing || $_REQUEST["filter_history"] == 'N' || $_REQUEST["show_all"] == 'Y'): ?>
                <li>
                    <a href="<?= $arResult["CURRENT_PAGE"] ?>?filter_history=Y"><?= GetMessage('SPOL_ORDERS_HISTORY') ?></a>
                </li>
            <? endif ?>
        </ul>
    </div>

    <? if (!empty($arResult['ORDERS'])): ?>

        <div class="teble-name">


            <? foreach ($arResult["ORDER_BY_STATUS"] as $key => $group): ?>
                <table>

                    <? foreach ($group as $k => $order): ?>

                        <? if (!$k): ?>

                            <div class="bx_my_order_status_desc">

                                <h2><?= GetMessage("SPOL_STATUS") ?> "<?= $arResult["INFO"]["STATUS"][$key]["NAME"] ?>
                                    "</h2>

                                <div class="bx_mos_desc"><?= $arResult["INFO"]["STATUS"][$key]["DESCRIPTION"] ?></div>
                                <tr class="four">
                                    <th>Операции с заказом</th>
                                    <th>№ Заказа</th>
                                    <th>Время создания</th>
                                    <th>Способ оплаты</th>
                                    <th>Способ доставки</th>
                                    <th>Сумма заказа</th>
                                </tr>
                            </div>

                        <? endif ?>
                        <tr>
                            <td>
                                <ul class="no-yes-link">
                                    <? if ($order["ORDER"]["CANCELED"] != "Y"): ?>
                                        <li class="no"><a href="<?= $order["ORDER"]["URL_TO_CANCEL"] ?>">Отменить
                                                заказ</a></li>
                                    <? endif ?>

                                    <li class="yes"><a href="<?= $order["ORDER"]["URL_TO_COPY"] ?>">Повторить заказ</a>
                                    </li>
                                </ul>
                            </td>
                            <td><a href="<?= $order["ORDER"]["URL_TO_DETAIL"] ?>"><?= $order["ORDER"]['ID']?></a></td>
                            <td><?= $order["ORDER"]["DATE_INSERT_FORMATED"]; ?></td>
                            <td> <?= $arResult["INFO"]["PAY_SYSTEM"][$order["ORDER"]["PAY_SYSTEM_ID"]]["NAME"] ?> </td>
                            <td><?= $arResult["INFO"]["DELIVERY"][$order["ORDER"]["DELIVERY_ID"]]["NAME"] ?></td>
                            <td><?= $order["ORDER"]["FORMATED_PRICE"] ?>
                                <span class="rouble">a</span>
                            </td>
                        </tr>
                    <? endforeach ?>
                </table>




            <? endforeach ?>
        </div>

        <? if (strlen($arResult['NAV_STRING'])): ?>
            <?= $arResult['NAV_STRING'] ?>
        <? endif ?>

    <? else: ?>
        <?= GetMessage('SPOL_NO_ORDERS') ?>
    <?endif ?>

<?endif ?>