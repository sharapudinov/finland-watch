<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetTitle("Отзывы о магазине");
/**
 * Bitrix vars
 *
 * @var array $arParams, $arResult
 * @var CBitrixComponentTemplate $this
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
CUtil::InitJSCore(array('ajax', 'fx', 'viewer'));
// ************************* Input params***************************************************************
$arParams["SHOW_LINK_TO_FORUM"] = ($arParams["SHOW_LINK_TO_FORUM"] == "N" ? "N" : "Y");
$arParams["FILES_COUNT"] = intVal(intVal($arParams["FILES_COUNT"]) > 0 ? $arParams["FILES_COUNT"] : 1);
$arParams["IMAGE_SIZE"] = (intVal($arParams["IMAGE_SIZE"]) > 0 ? $arParams["IMAGE_SIZE"] : 100);
if (LANGUAGE_ID == 'ru'):
	$path = str_replace(array("\\", "//"), "/", dirname(__FILE__)."/ru/script.php");
	include($path);
endif;
// *************************/Input params***************************************************************

include(__DIR__."/form.php");



if (!empty($arResult["MESSAGES"])):
?>
    <div class="reviews-text">

         <div class="reviews-block">



<?
$iCount = 0;
foreach ($arResult["MESSAGES"] as $res):
	$iCount++;
	?>
        <div class="reviews-comm" bx-author-id="<?=$res["AUTHOR_ID"]?>" bx-author-name="<?=$res["AUTHOR_NAME"]?>" id="message<?=$res["ID"]?>">
            <span class="dates"><?=$res["POST_DATE"]?></span>
            <h4><?=$res["AUTHOR_NAME"]?>  ></h4>
            <p id="message_text_<?=$res["ID"]?>">
                <?=$res["POST_MESSAGE_TEXT"]?>
            </p>
        </div>
<?
endforeach;
?>
		</div>
        <div class="page-next-link">
            <?=$arResult["NAV_STRING"]?>
        </div>



<?

endif;

if (empty($arResult["ERROR_MESSAGE"]) && !empty($arResult["OK_MESSAGE"])):
?>
<div class="reviews-note-box reviews-note-note">
	<a name="reviewnote"></a>
	<div class="reviews-note-box-text"><?=ShowNote($arResult["OK_MESSAGE"]);?></div>
</div>
<?
endif;

if ($arResult["SHOW_POST_FORM"] != "Y"):
	return false;
endif;


if (!empty($arResult["MESSAGE_VIEW"])):
?>


<div class="reviews-info-box reviews-post-preview">
	<div class="reviews-info-box-inner">
		<div class="reviews-post-entry">
			<div class="reviews-post-text"><?=$arResult["MESSAGE_VIEW"]["POST_MESSAGE_TEXT"]?></div>

		</div>
	</div>

</div>
    </div>
<?
endif;
?>
<script type="application/javascript">
	BX.ready(function(){
		BX.message({
			no_topic_name : '<?=GetMessageJS("JERROR_NO_TOPIC_NAME")?>',
			no_message : '<?=GetMessageJS("JERROR_NO_MESSAGE")?>',
			max_len : '<?=GetMessageJS("JERROR_MAX_LEN")?>',
			f_author : ' <?=GetMessageJS("JQOUTE_AUTHOR_WRITES")?>:\n',
			f_cdm : '<?=GetMessageJS("F_DELETE_CONFIRM")?>',
			f_show : '<?=GetMessageJS("F_SHOW")?>',
			f_hide : '<?=GetMessageJS("F_HIDE")?>',
			f_wait : '<?=GetMessageJS("F_WAIT")?>',
			MINIMIZED_EXPAND_TEXT : '<?=CUtil::addslashes($arParams["MINIMIZED_EXPAND_TEXT"])?>',
			MINIMIZED_MINIMIZE_TEXT : '<?=CUtil::addslashes($arParams["MINIMIZED_MINIMIZE_TEXT"])?>'
		});
		BX.viewElementBind(BX('<?=$arParams["FORM_ID"]?>container'), {},
			function(node){
				return BX.type.isElementNode(node) && (node.getAttribute('data-bx-viewer') || node.getAttribute('data-bx-image'));
			}
		);
	});
</script>


