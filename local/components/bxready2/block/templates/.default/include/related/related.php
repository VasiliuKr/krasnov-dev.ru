<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arComponentParams = array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"ADD_SECTIONS_CHAIN" => "N",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"AJAX_OPTION_HISTORY" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"BXREADY_COLLECTION_DRAW" => $currentParams["BXREADY_COLLECTION_DRAW"],
	"BXREADY_ELEMENT_DRAW" => $currentParams["BXREADY_ELEMENT_DRAW"],
	"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => $currentParams["BXREADY_LIST_BOOTSTRAP_GRID_STYLE"],
	"BXREADY_LIST_LG_CNT" => $currentParams["BXREADY_LIST_LG_CNT"],
	"BXREADY_LIST_MD_CNT" => $currentParams["BXREADY_LIST_MD_CNT"],
	"BXREADY_LIST_SM_CNT" => $currentParams["BXREADY_LIST_SM_CNT"],
	"BXREADY_LIST_XS_CNT" => $currentParams["BXREADY_LIST_XS_CNT"],
	"BXREADY_LIST_PAGE_BLOCK_TITLE" => $currentParams["BXREADY_LIST_PAGE_BLOCK_TITLE"],
	"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => $currentParams["BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON"],
	"BXREADY_LIST_SLIDER" => $currentParams["BXREADY_LIST_SLIDER"],
	"BXREADY_LIST_TYPES" => $currentParams["BXREADY_LIST_TYPES"],

	"BXREADY_SECTION_DRAW" => $currentParams["BXREADY_SECTION_DRAW"],

	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"CACHE_TIME" => $arParams['CACHE_TIME'],
	"CACHE_TYPE" => $arParams['CACHE_TYPE'],
	"CHECK_DATES" => $arParams['CHECK_DATES'],
	"COMPONENT_TEMPLATE" => '.default',
	"DETAIL_URL" => "",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"FIELD_CODE" => $currentParams["BXR_RELATED_IBLOCK_FIELDS"],
	"FILTER_NAME" => "arrRelatedFilter",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"IBLOCK_ID" => $currentParams["BXR_RELATED_IBLOCK_ID"],
	"IBLOCK_TYPE" => $currentParams["BXR_RELATED_IBLOCK_TYPE"],
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"INCLUDE_SUBSECTIONS" => "Y",
	"NEWS_COUNT" => intval($currentParams["BXR_RELATED_LIST_COUNT"])>0 ? intval($currentParams["BXR_RELATED_LIST_COUNT"]) : 10,
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => ".default",
	"PAGER_TITLE" => "�������",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"PREVIEW_TRUNCATE_LEN" => "",
	"PROPERTY_CODE" => $currentParams["BXR_RELATED_IBLOCK_PROPERTIES"],
	"SET_BROWSER_TITLE" => "N",
	"SET_META_DESCRIPTION" => "N",
	"SET_META_KEYWORDS" => "N",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "N",
	"SORT_BY1" => $currentParams["BXR_RELATED_IBLOCK_SORT_FILELD"],
	"SORT_BY2" => "SORT",
	"SORT_ORDER1" => $currentParams["BXR_RELATED_IBLOCK_SORT_ORDER"],
	"SORT_ORDER2" => "ASC",
	"BXREADY_USER_TYPES" =>$currentParams["BXREADY_USER_TYPES"],
        "BXREADY_USER_TYPE_VARIANT" =>$currentParams["BXREADY_USER_TYPE_VARIANT"],
	"BXREADY_LIST_VERTICAL_SLIDER_MODE" => $currentParams["BXREADY_LIST_VERTICAL_SLIDER_MODE"],
	"BXREADY_LIST_HIDE_SLIDER_ARROWS" => $currentParams["BXREADY_LIST_HIDE_SLIDER_ARROWS"],
	"BXREADY_LIST_SLIDER_MARKERS" => $currentParams["BXREADY_LIST_SLIDER_MARKERS"],
	"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => $currentParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS"],
	"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => $currentParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL"],
	"BXREADY_ELEMENT_ADDCLASS" => $currentParams["BXREADY_ELEMENT_ADDCLASS"],
	"BXREADY_USE_ELEMENTCLASS" => $currentParams["BXREADY_USE_ELEMENTCLASS"],
);

foreach ($currentParams as $cell=>$val){
    if (substr($cell, 0, 9) == 'BXR_PRST_'){
            $arComponentParams[$cell] = $val;
    }
}

$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	".default",
	$arComponentParams,
	false,
	array('HIDE_ICONS'=>'Y')
);

?>