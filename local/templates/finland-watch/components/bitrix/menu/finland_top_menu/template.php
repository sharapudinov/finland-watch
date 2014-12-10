<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//test_dump($arResult);
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
$this->setFrameMode(true);

if (empty($arResult))
	return;
?>
<div class="main-menu-top">
    <ul>
        <? foreach ($arResult as $itemIdex => $arItem): ?>
            <?switch ($arItem['LINK']){
                case '/about/':
                    $secondLevel='about';
                    break;
                case '/news/actions/':
                    $secondLevel='actions';
                    break;
                case '/catalog/':
                    $secondLevel='catalog';
                    break;
                default : $secondLevel='empty';
            }
       ?>

            <li class="second-level-menu <?=$arItem['SELECTED']?' active':''?>">
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "finland_second_level_menu",
                    array(
                        "ROOT_MENU_TYPE" => $secondLevel,
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
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
            </li>
        <? endforeach; ?>
    </ul>
</div>