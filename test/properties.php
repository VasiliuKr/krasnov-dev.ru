<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
CModule::IncludeModule("iblock");
?>

<h1>Cписок всех свойств</h1>
<?
$properties = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getproperties');
printr($properties);
?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>