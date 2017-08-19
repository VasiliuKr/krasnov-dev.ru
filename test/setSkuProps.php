<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
CModule::IncludeModule("iblock");

$IBLOCK_ID_CATALOG = 12; // КАТАЛОГ
$IBLOCK_ID_SKU = 13; // ТОРГОВЫЕ ПРЕДЛОЖЕНИЯ
?>


<?
$skuProps = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getattrib');
// printr($skuProps);
?>

<?
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_ID_SKU));
while ($prop_fields = $properties->GetNext())
{
  
  $arrSkuProps[$prop_fields['XML_ID']] = $prop_fields['ID'];
}
?>


<?/* // Добавляем все значения свойств торговых предложений

foreach ($skuProps['data'] as $propKey => $skuProp) {
	foreach ($skuProp['options'] as $optionKey => $option) {
		$ibpenum = new CIBlockPropertyEnum;
		$PropID = $ibpenum->Add(Array('PROPERTY_ID'=>$arrSkuProps[$propKey], 'VALUE'=>$option, 'XML_ID' => $optionKey));
	}
}
*/?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>