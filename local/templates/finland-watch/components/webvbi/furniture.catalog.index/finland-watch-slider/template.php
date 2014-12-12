<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//test_dump($arResult);
?>
<?
if (is_array($arResult['ITEMS']) && count($arResult['ITEMS']) > 0):
    ?>
    <div class="block-slider">
        <div class="flex-container">
            <div class="flexslider">
                <ul class="slides">
                    <?
                    foreach ($arResult['ITEMS'] as $arItem):
                        ?>
                        <li>
                            <img src="<?= $arItem['DETAIL_PICTURE']['src'] ?>" class="main-img"/>
                            <div class="slider-content">
                                <img src="<?= $arItem['PREVIEW_PICTURE']['src'] ?>" title="" alt=""/>
                                <span class="title-slider"><?= $arItem['NAME'] ?></span>
                                <p><?= $arItem['PREVIEW_TEXT'] ?></p>
                            </div>
                        </li>
                    <?
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery.noConflict();
        jQuery(document).ready(function () {
                jQuery('.flexslider').flexslider({
                animation: 'shou',
                animation: 'auto',
                controlsContainer: '.flexslider'
            });
        });
    </script>
<?
endif;
?>
