<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
CModule::IncludeModule("iblock");
?>

<h1>Cписок разделов/подразделов сайта</h1>
<?
$sections = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getcatalog');
// printr($sections);    // вывод всех разделов/подразделов на старом сайте
include $_SERVER['DOCUMENT_ROOT'].'/dBug.php';
new dbug($sections);
die;
?>


<!-- Раскомментировать нижеследующий код и указать ID инфоблока, в который загружаем разделы -->

<?/*foreach($sections['data'] as $section):?>
	
	<?
	
	$arTranslitParams = array("replace_space"=>"_","replace_other"=>"_");
	$bs = new CIBlockSection;
	$arFields = Array(
		"ACTIVE" => "Y",
		"IBLOCK_ID" => 12,
		"NAME" => $section['name'],
		'CODE' => strtolower(Cutil::translit($section['name'],"ru",$arTranslitParams)),
		'XML_ID' => $section['id'],
	);

	$ID = $bs->Add($arFields);

			
	?>
<?endforeach;*/?>

<?
// получаем массив всех разделов инфоблока 12 и создаем новый массив соответствий вида XML_ID => ID

$arFilterSections = array("IBLOCK_ID" => 12,);      // Уточнить ID инфоблока
	$arSelectSections = array("ID", "XML_ID");
	$sectionsList = CIBlockSection::GetList(Array(), $arFilterSections, false, $arSelectSections, false);
	if ($sectionsList->SelectedRowsCount() > 0) {
		while ($section = $sectionsList->Fetch()) {
			
			$myArr[$section['XML_ID']] = $section['ID'];
		}
	}
// printr($myArr);
?>

<?/*
// закидываем все подразделы в родительские разделы и обоновляем символьный код

foreach($sections['data'] as $section):?>
	
	<?
	$arTranslitParams = array("replace_space"=>"-","replace_other"=>"");
	$bs = new CIBlockSection;
	$arFields = Array(
		"IBLOCK_SECTION_ID" => $myArr[$section['parent_id']],
		'CODE' => strtolower(Cutil::translit($section['name'],"ru",$arTranslitParams))
	);
	$res = $bs->Update($myArr[$section['id']], $arFields);
			
	?>
<?endforeach;*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>