<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

use Alexkova\Bxready2\Draw;

$this->setFrameMode(true);

$elementDraw = Draw::getInstance($this);
$elementDraw->setCurrentTemplate($this);

$this->setFrameMode(true);
global $unicumID;
if ($unicumID<=0) {$unicumID = 1;} else {$unicumID++;}

$arParams["UNICUM_ID"] = $unicumID;

$col = 12;
if($arParams["BXREADY_ELEMENT_DRAW"] == "section.horizontal.v2")
    $col = 6;
?>
<div class="row">
<?foreach ($arResult['ELEMENTS'] as $cell=>$val):?>
	<div class="col-md-<?=$col;?> col-xs-12">
		<?$elementDraw->showElement('elements', $arParams["BXREADY_ELEMENT_DRAW"], $val, $arParams);?>
	</div>
<?endforeach;?>
</div>

