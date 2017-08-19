<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
CModule::IncludeModule("iblock");
?>

<h1>Cписок разделов/подразделов сайта</h1>
<?
// $sections = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getcatalog');
// printr($sections);    // вывод всех разделов/подразделов на старом сайте
?>

<h1>Cписок всех свойств</h1>
<?
$properties = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getproperties');
printr($properties);
?>

<h1>Cписок всех товаров</h1>
<?
// $goods = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getgoods&page=1');
// printr($goods);
?>

<h1>Cписок всех свойств торговых предложений</h1>
<?
// $attribs = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getattrib');
// printr($attribs);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>