<?
use Alexkova\Bxready\Draw2;
$elementDraw = \Alexkova\Bxready2\Draw::getInstance($this);
$arMatrix = array('width' => 75, 'height' => 75);

if (isset($arElement["PROPERTIES"]["BXR_GLYPH"]) && strlen($arElement["PROPERTIES"]["BXR_GLYPH"]["VALUE"])>0){
	$elementType = "icon";
}else{
	$elementType = "image";

	if (is_array($arElement["PREVIEW_PICTURE"])){
		$picture = $elementDraw->prepareImage($arElement["PREVIEW_PICTURE"]["ID"], $arMatrix);
	}else{
		if (is_array($arElement["DETAIL_PICTURE"])){
			$picture = $elementDraw->prepareImage($arElement["DETAIL_PICTURE"]["ID"], $arMatrix);
		}
	}

	if (!is_array($picture) || strlen($picture["src"])<=0){
		$picture = array("src" => $elementDraw->getDefaultImage());
	}
}

?>

<div class="bxr-trigger-v1" data-uid="<?=$arElementParams["UNICUM_ID"]?>">
	<div class="bxr-element-container">
		<?
		if (file_exists(dirname(__FILE__)."/".$elementType.".php")){
			include($elementType.".php");
		}
		?>
		<div class="bxr-element-content">
			<div class="bxr-element-name">
				<a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']?></a>
			</div>
			<?if (in_array('PREVIEW_TEXT', $arElementParams["FIELD_CODE"])):?>
				<div class="bxr-element-description">
					<?=$arElement['PREVIEW_TEXT']?>
				</div>
			<?endif;?>
		</div>
	</div>
</div>
<?$elementDraw->setAdditionalFile("CSS", "/bitrix/tools/bxready2/collection/bxr_elements/trigger.flat.vertical.v1/include/style.css", false);?>