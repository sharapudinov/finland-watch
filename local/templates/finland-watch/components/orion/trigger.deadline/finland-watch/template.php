<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arParams['IN_CACHE_CONT'] == 'Y'):?>
<?=COrionTriggerDeadline::InCacheContParams($arParams);?>
<?else:?>

<div id="counter<?=$arParams['COMPONENT_ID']?>" class="deadline <?=$arParams['VIEW_SIZE_PROP']?>">
	<div class="cap <?if($arResult['ACTION_STATUS'] == 0) echo 'red';?> <?if($arParams['VIEW_CAP_POS'] == 'LEFT') echo 'left'?>"><?=$arResult['VIEW_CAP_NAME'];?></div>
	<div class="overflow">
		<div class="desc <?if($arParams['VIEW_DESC'] != 'Y' || $arParams['VIEW_DESC_POS'] != 'UP') echo 'hide';?>">
			<div class="<?=$arResult['DESC_CLASS'][0]?>"><?=GetMessage("TMPL_DL_DAYS");?></div>
			<div class="<?=$arResult['DESC_CLASS'][1]?>"><?=GetMessage("TMPL_DL_HOURS");?></div>
			<div class="<?=$arResult['DESC_CLASS'][2]?>"><?=GetMessage("TMPL_DL_MINUTES");?></div>
			<div class="<?=$arResult['DESC_CLASS'][3]?>"><?=GetMessage("TMPL_DL_SECONDS");?></div>
		</div>
		<div class="digits clearfix"></div>
		<div class="desc <?if($arParams['VIEW_DESC'] != 'Y' || $arParams['VIEW_DESC_POS'] != 'DOWN') echo 'hide';?>">
			<div class="<?=$arResult['DESC_CLASS'][0]?>"><?=GetMessage("TMPL_DL_DAYS");?></div>
			<div class="<?=$arResult['DESC_CLASS'][1]?>"><?=GetMessage("TMPL_DL_HOURS");?></div>
			<div class="<?=$arResult['DESC_CLASS'][2]?>"><?=GetMessage("TMPL_DL_MINUTES");?></div>
			<div class="<?=$arResult['DESC_CLASS'][3]?>"><?=GetMessage("TMPL_DL_SECONDS");?></div>
		</div>
	</div>
</div>  

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#counter<?=$arParams['COMPONENT_ID']?> .digits').countdown({
		image: '<?=$this->__component->__path?>/images/digits/<?=$arResult['IMG']?>',
		startTime: '<?=$arResult['START_TIME']?>',
		startTimeNext: '<?=$arResult['START_TIME_NEXT']?>',
		startTimeEnd: '<?=$arResult['START_TIME_END']?>',
		intervalsCnt: <?=$arResult['INTERVALS_CNT']?>,
		digitWidth: <?=$arResult['DIGITS_WIDTH']?>,
		digitHeight: <?=$arResult['DIGITS_HEIGHT']?>,
		stepTime: <?=$arResult['VIEW_SPEED']?>,
		timerEnd: function(){ 
			jQuery('#counter<?=$arParams['COMPONENT_ID']?> .cap').addClass('red').html('<?=$arParams['VIEW_CAP_END_NAME']?>');
		}
	});
});
</script>

<?endif;?>