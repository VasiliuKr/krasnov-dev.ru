<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
CModule::IncludeModule("iblock");

$IBLOCK_ID_CATALOG = 12; // КАТАЛОГ
$IBLOCK_ID_SKU = 13; // ТОРГОВЫЕ ПРЕДЛОЖЕНИЯ

?>



<?
$_SESSION['goodsIdArr'] = '';
$_SESSION['goodsPricesArr'] = '';
$_SESSION['catalogIdArr'] = '';

$arFilterGoods = array($IBLOCK_ID_CATALOG); 
$arSelectGoods = array("ID", "XML_ID","CATALOG_GROUP_1");
$goodsList = CIBlockElement::GetList(Array(), $arFilterGoods, false, false, $arSelectGoods);
while ($goodsElement = $goodsList->GetNextElement()) {
	$goodsFields = $goodsElement->GetFields();
	$_SESSION['goodsIdArr'][$goodsFields['XML_ID']] = $goodsFields['ID'];

	if( $goodsFields['CATALOG_PRICE_1'] > 0 ){ //если есть цена у товара - записываем в сессию
		$_SESSION['goodsPricesArr'][$goodsFields['XML_ID']]['price'] = $goodsFields['CATALOG_PRICE_1'];
		$_SESSION['goodsPricesArr'][$goodsFields['XML_ID']]['price_id'] = $goodsFields['CATALOG_PRICE_ID_1'];
	}
}



$arFilterCatalog = array($IBLOCK_ID_CATALOG);      // Уточнить ID инфоблока
$arSelectCatalog = array("ID", "XML_ID");
$catalogList = CIBlockSection::GetList(Array(), $arFilterCatalog, false, $arSelectCatalog, false);
if ($catalogList->SelectedRowsCount() > 0) {
	while ($catalog = $catalogList->Fetch()) {
		$_SESSION['catalogIdArr'][$catalog['XML_ID']] = $catalog['ID'];
	}
}

?>

<h1>Cписок всех товаров</h1>
<?
//$goods = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getgoods&page=1');
$goods = getJson('http://www.metal-b2b.ru/sites/all/scripts/json.php?key=BerfhbBUIB2nl2&method=getgoods&parentid=842');
include $_SERVER['DOCUMENT_ROOT'].'/dBug.php';
new dbug($goods);
die;
// printr($goods);
?>

<?
foreach ($goods['data'] as $product) {
	$sku_count = count($product['sku']); //количество торговых предложений
	if( $sku_count ){ //если имеются торговые предложения

	    $PROP = Array();
	    $PROP['SIZE_UNIT_WEIGHT'] = $product['sizes']['size_unit_weight'];
	    $PROP['SIZE_LENGTH'] = $product['sizes']['size_length'];
	    $PROP['SIZE_WIDTH'] = $product['sizes']['size_width'];
	    $PROP['SIZE_HEIGHT'] = $product['sizes']['size_height'];
	    $PROP['SIZE_DEPTH'] = $product['sizes']['size_depth'];
	    $PROP['GOOD_TYPE'] = $product['good_type'];
	    $PROP['MEASURE_TEXT'] = $product['measure_text'];
	    $PROP['POPULAR'] = $product['popular'];

	    foreach ($product['haract'] as $haract) {
	    	switch ($haract[count($haract)-1]['tid']) {
	    		case 534:
	    			$PROP['GOST'] = $haract[0]['name'];
	    			break;    		
	    		case 524:
	    			$PROP['METALL'] = $haract[0]['name'];
	    			break;
	    	}
	    }

	    $product_code = array_pop(explode("/", $product['source_link']));
	    $section_xml_id = $product['razdel_id'];
    
	    foreach( $product['sku'] as $product_sku ){

	    	$xmlID = $product['id'].'-'.$product_sku['option_id']; // XML_ID товара = ID товара + ID свойства

	    	if ($_SESSION['goodsIdArr'][$xmlID]) {

				// Обновление товаров
				$el = new CIBlockElement;
				$arFields = Array(
					"PROPERTY_VALUES"=> $PROP,
					'IBLOCK_SECTION_ID' => $_SESSION['catalogIdArr'][$section_xml_id],
					'SORT' => $product['sort'],
				);
				$el->Update($_SESSION['goodsIdArr'][$xmlID], $arFields);
				$ID = $_SESSION['goodsIdArr'][$xmlID];

				//тут мы создаём или обновляем цену, если это требуется .. выглядит некрасиво, зато без лишних запросов и массивов
				if( !isset($_SESSION['goodsPricesArr'][$xmlID]) && isset($product_sku['option_price']) ){ //если у товара нет цены - создаём
		    		$arFields = Array(
				   		"PRODUCT_ID" => $ID,
					    "CATALOG_GROUP_ID" => 1,
					    "PRICE" => $product['price_sell'],
					    "CURRENCY" => "RUB",
					);
					CPrice::Add($arFields);
		    	}elseif( isset($_SESSION['goodsPricesArr'][$xmlID]) && isset($product_sku['option_price']) && (int)$_SESSION['goodsPricesArr'][$xmlID]['price'] != (int)$product_sku['option_price'] ){ // если у товара цена есть, но она отлична от новой - перезаписываем
		    		$arFields = Array(
				   		"PRODUCT_ID" => $ID,
					    "CATALOG_GROUP_ID" => 1,
					    "PRICE" => $product_sku['option_price'],
					    "CURRENCY" => "RUB",
					);
					CPrice::Update($_SESSION['goodsPricesArr'][$xmlID]['price_id'], $arFields, true, true);
		    	}
				

			} else {
				$name = $sku_count > 1 ? $product['name'].' ('.$product_sku['attr_name'].' '.$product_sku['option_name'].')' : $product['name'];
			    $section_xml_id = $product['razdel_id'];
			    $el = new CIBlockElement;
				$arFields = Array(
					"ACTIVE" => "Y",
					"IBLOCK_ID" => $IBLOCK_ID_CATALOG,
					"PROPERTY_VALUES"=> $PROP,
					"NAME" => $name,
					'IBLOCK_SECTION_ID' => $_SESSION['catalogIdArr'][$section_xml_id],        
					'CODE' => $product_code,
					'XML_ID' => $xmlID,
					'DETAIL_PICTURE' => CFile::MakeFileArray($product['images'][0]['filesrc']),      // Детальной картинкой делаем первую картинку из массива images
					'SORT' => $product['sort'],
				);
				$ID = $el->Add($arFields);
				
				$arrImages = $product['images'];              // Остальные картинки из массива images кроме первой добавляем в свойство "Картинки"
				array_shift($arrImages);

				$arFile = array();
				foreach ($arrImages as $key => $image) {
			    	$arFile[$key]['VALUE'] = CFile::MakeFileArray($image['filesrc']);	    	
			    }
			    CIBlockElement::SetPropertyValues($ID, $IBLOCK_ID_CATALOG, $arFile, 102);   

				//превращаем элемент инфоблока в товар
				CCatalogProduct::Add(array('ID' => $ID));

				//создаем ценовое предложение
				$arFields = Array(
			   		"PRODUCT_ID" => $ID,
				    "CATALOG_GROUP_ID" => 1,
				    "PRICE" => $product_sku['option_price'],
				    "CURRENCY" => "RUB",
				);
				CPrice::Add($arFields);

			}
	    }
    }

    
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>