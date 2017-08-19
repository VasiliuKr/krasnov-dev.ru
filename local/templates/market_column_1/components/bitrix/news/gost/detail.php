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
$this->setFrameMode(true);
?>
<div class="col-md-3 col-sm-4 col-sm-12 <?if(!isset($arParams["HIDE_FILTER_MOBILE"]) || $arParams["HIDE_FILTER_MOBILE"]=="Y") echo "hidden-xs";?> ">
	<div class="bx-sidebar-block">
	<?
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.smart.filter",
			"visual_vertical",
			array(
				"IBLOCK_TYPE" => 'catalog',
				"IBLOCK_ID" => 12,
				"SECTION_ID" => $arCurSection['ID'],
				"FILTER_NAME" => "propFilter",
				"PRICE_CODE" => array(
                    0 => "BASE",
                ),
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => 3600,
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => "VERTICAL",
				"XML_EXPORT" => "Y",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				'HIDE_NOT_AVAILABLE' => "Y",
				"TEMPLATE_THEME" => "site",
				'CONVERT_CURRENCY' => "N",
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				"SEF_MODE" => $arParams["SEF_MODE"],
				"SEF_RULE" => "/catalog/".$arResult["URL_TEMPLATES"]["smart_filter"],
				"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                "DISPLAY_ELEMENT_COUNT" => "N",
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                "FILTER_PRICE_CODE" => array(
                    0 => "BASE",
                ),
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
		
		$APPLICATION->IncludeComponent(
			"alexkova.market:menu",
			isset($arParams["LEFT_MENU_TEMPLATE"]) ? $arParams["LEFT_MENU_TEMPLATE"] : "left",
			array(
	            "ROOT_MENU_TYPE" => isset($arParams["ROOT_MENU_TYPE"]) ? $arParams["ROOT_MENU_TYPE"] : "left",
	            "MAX_LEVEL" => isset($arParams["MAX_LEVEL"]) ? $arParams["MAX_LEVEL"] : "2",
	            "CHILD_MENU_TYPE" => isset($arParams["CHILD_MENU_TYPE"]) ? $arParams["CHILD_MENU_TYPE"] : "left",
	            "USE_EXT" => isset($arParams["USE_EXT"]) ? $arParams["USE_EXT"] : "Y",
	            "DELAY" => isset($arParams["DELAY"]) ? $arParams["DELAY"] : "N",
	            "TITLE_MENU" => isset($arParams["TITLE_MENU"]) ? $arParams["TITLE_MENU"] : "",                    
	            "STYLE_MENU" => isset($arParams["STYLE_MENU"]) ? $arParams["STYLE_MENU"] : "colored_light", 			
	            "PICTURE_SECTION" => isset($arParams["PICTURE_SECTION"]) ? $arParams["PICTURE_SECTION"] : "N", 
	            "STYLE_MENU_HOVER" => isset($arParams["STYLE_MENU_HOVER"]) ? $arParams["STYLE_MENU_HOVER"] : "colored_light",
	            "PICTURE_SECTION_HOVER" => isset($arParams["PICTURE_SECTION_HOVER"]) ? $arParams["PICTURE_SECTION_HOVER"] : "N",
	            "PICTURE_CATEGARIES" => isset($arParams["PICTURE_CATEGARIES"]) ? $arParams["PICTURE_CATEGARIES"] : "N",
	            "HOVER_MENU_COL_LG" => isset($arParams["HOVER_MENU_COL_LG"]) ? $arParams["HOVER_MENU_COL_LG"] : "2",
	            "HOVER_MENU_COL_MD" => isset($arParams["HOVER_MENU_COL_MD"]) ? $arParams["HOVER_MENU_COL_MD"] : "2",
	            "HOVER_MENU_COL_SM" => isset($arParams["HOVER_MENU_COL_SM"]) ? $arParams["HOVER_MENU_COL_SM"] : "2",
	            "HOVER_MENU_COL_XS" => isset($arParams["HOVER_MENU_COL_XS"]) ? $arParams["HOVER_MENU_COL_XS"] : "2",
	            "SUBMENU" => isset($arParams["SUBMENU"]) ? $arParams["SUBMENU"] : "ACTIVE_SHOW",
	            "HOVER_TEMPLATE" => isset($arParams["HOVER_TEMPLATE"]) ? $arParams["HOVER_TEMPLATE"] : "classic",
	            "MENU_CACHE_TYPE" => $arParams["CACHE_TYPE"],
	            "MENU_CACHE_TIME" => $arParams["CACHE_TIME"],
	            "MENU_CACHE_USE_GROUPS" => $arParams["CACHE_GROUPS"],
	            "MENU_CACHE_GET_VARS" => array(
	            ),
	            "SHOW_TREE" => "Y",
	        ),
			false,
			array("HIDE_ICONS" => "Y")
		);
	?>
	</div>
</div>
<div class="col-md-9 col-sm-8 col-xs-12">
	<?$ElementID = $APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"",
		Array(
			"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
			"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
			"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"META_KEYWORDS" => $arParams["META_KEYWORDS"],
			"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
			"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
			"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
			"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
			"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
			"SET_TITLE" => $arParams["SET_TITLE"],
			"MESSAGE_404" => $arParams["MESSAGE_404"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404" => $arParams["SHOW_404"],
			"FILE_404" => $arParams["FILE_404"],
			"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
			"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
			"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
			"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
			"CHECK_DATES" => $arParams["CHECK_DATES"],
			"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
			"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"USE_SHARE" => $arParams["USE_SHARE"],
			"SHARE_HIDE" => $arParams["SHARE_HIDE"],
			"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
			"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
			"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
			"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
			"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
			'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
		),
		$component
	);?>

	<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>

	<?
	$res = CIBlockElement::GetByID($ElementID);
	if($ar_res = $res->GetNext()) {
		// printr($ar_res["NAME"]);
	}


	global $propFilter;
	$propFilter = array("PROPERTY_GOST"=>$ar_res["NAME"]);
	// $propFilter = array("ID"=>313);

	?>

	<?$APPLICATION->IncludeComponent(
		"bxready:ecommerce.list", 
		".default", 
		array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "BUY",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/basket.php",
			"BROWSER_TITLE" => "-",
			"BXREADY_ELEMENT_DRAW" => "system#ecommerce_v1_table",
			"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
			"BXREADY_LIST_LG_CNT" => "12",
			"BXREADY_LIST_MD_CNT" => "12",
			"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
			"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
			"BXREADY_LIST_SLIDER" => "N",
			"BXREADY_LIST_SM_CNT" => "12",
			"BXREADY_LIST_XS_CNT" => "12",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPONENT_TEMPLATE" => ".default",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"CONVERT_CURRENCY" => "N",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_COMPARE" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => "asc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"FILTER_NAME" => "propFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"IBLOCK_ID" => "12",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => "-",
			"LINE_ELEMENT_COUNT" => "3",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => array(
			),
			"OFFERS_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"OFFERS_LIMIT" => "5",
			"OFFERS_PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"OFFERS_SORT_FIELD" => "sort",
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => "asc",
			"OFFERS_SORT_ORDER2" => "desc",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "30",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(
				0 => "BASE",
			),
			"PRICE_VAT_INCLUDE" => "Y",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPERTIES" => array(
			),
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_SUBSCRIPTION" => "N",
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"SECTION_CODE" => "",
			"SECTION_ID" => $_REQUEST["SECTION_ID"],
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array(
				0 => "",
				1 => "",
			),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"USE_VOTE_RATING" => "N",
			"VOTE_DISPLAY_AS_RATING" => "rating",
			"SHOW_CATALOG_QUANTITY_CNT" => "N",
			"SHOW_CATALOG_QUANTITY" => "Y",
			"QTY_SHOW_TYPE" => "NUM",
			"IN_STOCK" => "В наличии",
			"NOT_IN_STOCK" => "Нет в наличии",
			"QTY_MANY_GOODS_INT" => "3",
			"QTY_MANY_GOODS_TEXT" => "много",
			"QTY_LESS_GOODS_TEXT" => "мало",
			"SKU_PROPS_SHOW_TYPE" => "rounded",
			"TILE_SHOW_PROPERTIES" => "N",
			"MESS_BTN_COMPARE" => "Сравнить",
			"COMPARE_PATH" => ""
		),
		false
	);?>
</div>