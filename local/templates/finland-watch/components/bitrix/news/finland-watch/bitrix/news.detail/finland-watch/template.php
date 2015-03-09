<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-block news-text">
	<div class="date-title-news">
		<ul class="ul-news">
			<li class="date-news-li"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></li>
			<li class="title-news-li"><?=$arResult["NAME"]?></li>
		</ul>

		<div class="clear"></div>
	</div>
	<div class="block-news-text">
		<?echo $arResult["DETAIL_TEXT"];?>

	</div>
</div>