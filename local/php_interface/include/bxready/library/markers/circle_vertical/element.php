<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Alexkova\Bxready\Draw;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$arMarkers = $arElement;?>

<div class="bxr-circle-marker-vertical">
	<?if (isset($arMarkers["NEW"]) && $arMarkers["NEW"] == true):?>
		<span class="bxr-marker-new"><i><?=GetMessage('BXR_MARKER_NEW')?></i></span>
	<?endif;?>
	<?if (isset($arMarkers["SALE"]) && $arMarkers["SALE"] == true):?>
		<span class="bxr-marker-sale"><i><?=GetMessage('BXR_MARKER_SALE')?></i></span>
	<?endif;?>
	<?if (isset($arMarkers["DISCOUNT"]) && $arMarkers["DISCOUNT"] > 0):?>
		<span class="bxr-marker-discount"><i><?=$arMarkers["DISCOUNT"]?>%</i></span>
	<?endif;?>
	<?if (isset($arMarkers["REC"]) && $arMarkers["REC"] == true):?>
		<span class="bxr-marker-rec"><i class="fa fa-thumbs-o-up"></i></span>
	<?endif;?>
	<?if (isset($arMarkers["HIT"]) && $arMarkers["HIT"] == true):?>
		<span class="bxr-marker-hit"><i><?=GetMessage('BXR_MARKER_HIT')?></i></span>
	<?endif;?>
</div>


<?
$elementDraw = \Alexkova\Bxready\Draw::getInstance();
$dirName = str_replace($_SERVER["DOCUMENT_ROOT"],'', dirname(__FILE__));
$elementDraw->setAdditionalFile("CSS", "/bitrix/tools/bxready/library/markers/circle_vertical/include/style.css", false);
?>