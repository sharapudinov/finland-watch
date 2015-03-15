<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

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
                            <a href="<?= $arItem['DETAIL_TEXT'] ?>">
                                <img style="margin: 0" src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" class="main-img"/>
                            </a>
                            <a class="slider-content" href="<?= $arItem['DETAIL_TEXT'] ?>">
                            <div >

                                    <!--<img src="<?/*= $arItem['PREVIEW_PICTURE']['src'] */
                                    ?>" title="" alt=""/>
                                    <span class="title-slider"><?/*= $arItem['NAME'] */
                                    ?></span>-->

                                    <p><?= $arItem['PREVIEW_TEXT'] ?></p>

                            </div>
 </a>
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
