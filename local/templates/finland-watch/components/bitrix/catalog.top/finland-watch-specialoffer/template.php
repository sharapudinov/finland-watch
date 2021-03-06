<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>

<div id="container-mini">
    <? //test_dump($arResult);?>
    <div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
    <div id="slider-mini">
        <ul>

            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <li>
                    <div class="content-mini">
                          <span class="new-price">
                             <p>Новая цена
                                 <br/>
                                 <span><?= $arItem['MIN_PRICE']["PRINT_DISCOUNT_VALUE"] ?></span>
                                 <span class="rouble">a</span>
                             </p>
                          </span>

                        <p class="title-mini">
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                        </p>
                        <a  class="img-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <img src="<?= $arItem['RESIZED_PREVIEW']['src'] ?>" width="160px" title="" alt=""/>
                        </a>

                        <p class="old-price"><? if ($arItem['MIN_PRICE']['DISCOUNT_DIFF']): ?>
                                Старая цена <br/>


                                <span class="summ"><?= $arItem['MIN_PRICE']['PRINT_VALUE'] ?></span>
                                <span class="rouble">a</span>
                            <? endif ?>
                        </p>

                        <p class="link-sm">
                            <a class="add_to_basket" id="<?= $arItem['ID'] . '_' . rand() ?>" href="#">купить</a>
                        </p>

                        <div class="clear"></div>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
    <ul id="pagination" class="pagination">
        <? for ($i = 0; $i < count($arResult["ITEMS"]); $i++): ?>
            <li onclick="slideshow.pos(<?= $i ?>)"></li>
        <? endfor ?>
    </ul>
</div>
<script type="text/javascript">
    var slideshow = new TINY.slider.slide('slideshow', {
        id: 'slider-mini',
        auto: 0,
        resume: false,
        vertical: false,
        //navid:'pagination',
        activeclass: 'current',
        position: 0,
        rewind: false,
        elastic: true,
        left: 'slideleft',
        right: 'slideright'
    });
</script>

