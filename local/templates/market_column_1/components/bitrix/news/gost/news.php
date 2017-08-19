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
	<?if($arParams["USE_RSS"]=="Y"):?>
		<?
		if(method_exists($APPLICATION, 'addheadstring'))
			$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
		?>
		<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
	<?endif?>

	<?if($arParams["USE_SEARCH"]=="Y"):?>
	<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
		"bitrix:search.form",
		"flat",
		Array(
			"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
		),
		$component
	);?>
	<br />
	<?endif?>
	<?if($arParams["USE_FILTER"]=="Y"):?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.filter",
		"",
		Array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		),
		$component
	);
	?>
	<br />
	<?endif?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"",
		Array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"NEWS_COUNT" => $arParams["NEWS_COUNT"],
			"SORT_BY1" => $arParams["SORT_BY1"],
			"SORT_ORDER1" => $arParams["SORT_ORDER1"],
			"SORT_BY2" => $arParams["SORT_BY2"],
			"SORT_ORDER2" => $arParams["SORT_ORDER2"],
			"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
			"SET_TITLE" => $arParams["SET_TITLE"],
			"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
			"MESSAGE_404" => $arParams["MESSAGE_404"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404" => $arParams["SHOW_404"],
			"FILE_404" => $arParams["FILE_404"],
			"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
			"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
			"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"CHECK_DATES" => $arParams["CHECK_DATES"],
		),
		$component
	);?>
</div>



