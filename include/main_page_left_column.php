<?
use Alexkova\Market\Core;

$BXReady = \Alexkova\Market\Core::getInstance();
?>
<?
// LeftMenu
global $arLeftMenu;
if (strlen($arLeftMenu["TYPE"])) {
	switch ($arLeftMenu["TYPE"]) {
		case "with_catalog": $BXReady->setAreaType('left_menu_type', 'v3'); break;
		case "only_catalog": $BXReady->setAreaType('left_menu_type', 'v2'); break;
		case "without_catalog": $BXReady->setAreaType('left_menu_type', 'v1'); break;
	}
}
if ($BXReady->getArea('left_menu_type')){
        include($BXReady->getAreaPath('left_menu_type'));
};
// end LeftMenu
?>
<?if (CModule::IncludeModule('sender')):?>
<?$APPLICATION->IncludeComponent(
	"alexkova.market:sender.subscribe",
	"market_column",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "market_horizontal",
		"CONFIRMATION" => "Y",
		"PAGE" => "/personal/subscribe/subscr_edit.php",
		"SET_TITLE" => "Y",
		"SHOW_HIDDEN" => "N",
		"SHOW_RUBRICS" => "Y",
		"USE_PERSONALIZATION" => "Y"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?>
<?endif;?>
<?Alexkova\Market\Core::getInstance()->showBannerPlace("LEFT");?>
<?$APPLICATION->IncludeComponent(
	"bxready:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_ELEMENT_DRAW" => "system#news.short.list.v1",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "N",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "12",
		"BXREADY_LIST_MD_CNT" => "12",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "Новости",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SLIDER_MARKERS" => "Y",
		"BXREADY_LIST_SM_CNT" => "12",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "12",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME","DATE_ACTIVE_FROM",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "5",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_LINK_MAIN_PAGE_IBLOCK" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?>
<?$APPLICATION->IncludeComponent(
	"bxready:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_ELEMENT_DRAW" => "system#classic.image.v1",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "N",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "12",
		"BXREADY_LIST_MD_CNT" => "12",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "Статьи и обзоры",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SLIDER_MARKERS" => "Y",
		"BXREADY_LIST_SM_CNT" => "12",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "12",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "2",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_LINK_MAIN_PAGE_IBLOCK" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>