<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);?>
<div class="content">

    <section>
        <div class="action-link">
            <h6>В акции участвуют следующие модели:</h6>

            <div class="block-action-link left">
                <ul>

                    <? if (!empty($arResult['ITEMS'])):
                    $counter = 0;
                    foreach ($arResult['ITEMS'] as $key => $arItem) {
                    $counter++;
                    ?>
                    <li><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                         <span class="hover-block">

                               <a rel="group" class="modal-img" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><img
                                       src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                       width="200" height="200"
                                       title="" alt=""/></a>
                                <p class="name-cl-v"><?= $arItem['NAME'] ?></p>
                                <div class="nal-yes">
                                    <? if ($arItem['CAN_BUY']): ?>
                                        <span class="nal"> В наличии</span>
                                    <? endif ?>

                                    <? if ($arItem['PRICES']['BASE']['DISCOUNT_DIFF'] > 0): ?>
                                        <p class="profit">Выгода <span class="red">
                                                <?= $arItem['PRICES']['BASE']['DISCOUNT_DIFF'] ?>
                                                <span class="rouble">a</span>
                                                (<?= $arItem['PRICES']['BASE']['DISCOUNT_DIFF'] ?>)
                                            </span>
                                        </p>
                                    <? endif ?>

                                </div>
                             <? if ($arItem['PRICES']['BASE']['PRINT_VALUE'] > 0): ?>
                                 <p class="summ-h red">
                                     <?= $arItem['PRICES']['BASE']['PRINT_VALUE'] ?>
                                     <span class="rouble">a</span>
                                 </p>
                             <? endif ?>
                             <? if ($arItem['CAN_BUY']): ?>
                                 <p class="link-buy"><a href="#">купить</a></p>
                             <? endif ?>

                           </span>
                    </li>

                    <?
                    if ($counter > count($arResult['ITEMS']) / 2):?>
                </ul>
            </div>
            <div class="block-action-link left">
                <ul>
                <?$counter = -2;
                endif;
                }
                endif ?>
                </ul>
            </div>
            <div class="clear"></div>


        </div>
    </section>
</div>









