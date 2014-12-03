<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(count($arResult["PERSON_TYPE"]) > 1)
{
	?>
	<div class="title-head-login">
        <p><?=GetMessage("SOA_TEMPL_PERSON_TYPE")?></p>
    </div>
		<?foreach($arResult["PERSON_TYPE"] as $v):?>

    <p class="top-sign-in radio">
        <input type="radio" id="PERSON_TYPE_<?=$v["ID"]?>" name="PERSON_TYPE" value="<?=$v["ID"]?>"<?if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?> onClick="submitForm()">
        <label for="PERSON_TYPE_<?=$v["ID"]?>"></label><?=$v["NAME"]?><br />
    </p>
			<?endforeach;?>
		<div class="clear"></div>
		<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$arResult["USER_VALS"]["PERSON_TYPE_ID"]?>" />
	<?
}
else
{
	if(IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"]) > 0)
	{
		//for IE 8, problems with input hidden after ajax
		?>
		<span style="display:none;">
		<input type="text" name="PERSON_TYPE" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>" />
		<input type="text" name="PERSON_TYPE_OLD" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>" />
		</span>
		<?
	}
	else
	{
		foreach($arResult["PERSON_TYPE"] as $v)
		{
			?>
			<input type="hidden" id="PERSON_TYPE" name="PERSON_TYPE" value="<?=$v["ID"]?>" />
			<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$v["ID"]?>" />
			<?
		}
	}
}
?>