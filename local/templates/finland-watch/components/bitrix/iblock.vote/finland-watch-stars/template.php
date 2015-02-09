<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if($arParams["DISPLAY_AS_RATING"] == "vote_avg")
{
	if($arResult["PROPERTIES"]["vote_count"]["VALUE"])
		$votesValue = 5;//round($arResult["PROPERTIES"]["vote_sum"]["VALUE"]/$arResult["PROPERTIES"]["vote_count"]["VALUE"], 2);
	else
		$votesValue = 0;
}
else
	$votesValue = 5;//intval($arResult["PROPERTIES"]["rating"]["VALUE"]);

$votesCount = intval($arResult["PROPERTIES"]["vote_count"]["VALUE"]);

if(isset($arParams["AJAX_CALL"]) && $arParams["AJAX_CALL"]=="Y")
{
	$APPLICATION->RestartBuffer();

	die(json_encode( array(
		"value" => $votesValue,
		"votes" => $votesCount
		)
	));
}

CJSCore::Init(array("ajax"));
$strObName = "bx_vo_".$arParams["IBLOCK_ID"]."_".$arParams["ELEMENT_ID"];
$arJSParams = array(
	"progressId" => $strObName."_progr",
	"ratingId" => $strObName."_rating",
	"starsId" => $strObName."_stars",
	"ajaxUrl" => $componentPath."/component.php",
	"voteId" => $arResult["ID"],
);
$templateData = array(
	'JS_OBJ' => $strObName,
	'ELEMENT_ID' => $arParams["ELEMENT_ID"]
);
?>
<table align="center" class="bx_item_detail_rating">
	<tr>
		<td>
			<div class="bx_item_rating">
				<div class="bx_stars_container">
					<div  class="bx_stars_bg <?=$arJSParams["starsId"]?>"></div>
					<div  class="bx_stars_progres <?=$arJSParams["progressId"]?>"></div>
				</div>
			</div>
		</td>
		<td>
			<span class="bx_stars_rating_votes <?=$arJSParams["ratingId"]?>">(0)</span>
		</td>
	</tr>
</table>
<script type="text/javascript">
BX.ready(function(){
	window.<?=$strObName;?> = new JCIblockVoteStars(<?=CUtil::PhpToJSObject($arJSParams, false, true);?>);

	window.<?=$strObName?>.ajaxParams = <?=$arResult["AJAX_PARAMS"]?>;
	window.<?=$strObName?>.setValue("<?=$votesCount > 0 ? ($votesValue+1)*20 : 0?>");
	window.<?=$strObName?>.setVotes("<?=$votesCount?>");
});
</script>