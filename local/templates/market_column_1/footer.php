<? IncludeTemplateLangFile(__FILE__);?>

        </div>
    </div>
</div>


	<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):?>

		<?if ($mainPageType == "one_col"):?>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/main_page_footer.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_FOOTER")
						),
						false
					);?>
					</div>
				</div>
			</div>
		<?endif;?>

		<?$APPLICATION->IncludeComponent(
	"alexkova.market:catalog.brandblock", 
	"brand_slider", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "12",
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"PROP_CODE" => array(
			0 => "",
			1 => "Manufacturer",
			2 => "",
		),
		"WIDTH" => "0",
		"HEIGHT" => "0",
		"WIDTH_SMALL" => "0",
		"HEIGHT_SMALL" => "0",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "brand_slider",
		"SHOW_DEACTIVATED" => "N",
		"SINGLE_COMPONENT" => "Y",
		"ELEMENT_COUNT" => "15",
		"BRAND_SHUFFLE" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
	<?endif;?>


<?if (isset($BXReady)):?>
	<?$BXReady->showBannerPlace("BOTTOM");?>
<?endif;?>

    <footer>
        <div class="footer-line"></div>
        <div class="container footer-head hidden-sm hidden-xs">
            <div class="row">

                    <div class="col-lg-8 col-md-8 hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_catalog_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_menu_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs footer-socnet-col">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
                        );?>
                    </div>

            </div>
        </div>
        <div class="container">



            <div class="row footerline">

                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                        <i class="fa fa-chevron-down"></i>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_catalog_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 toggled-item">
                        <?
                        $APPLICATION->IncludeComponent(
                            "alexkova.market:menu",
                            "footer_cols",
                            Array(
                                "ROOT_MENU_TYPE" => "bottom_catalog",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",   
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "COLS" => "4",
                            ),
                            false,
                            array('HIDE_ICONS'=>"Y")
                        );
                        ?>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                        <i class="fa fa-chevron-down"></i>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_menu_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 toggled-item">
                        <?
                        $APPLICATION->IncludeComponent(
                            "alexkova.market:menu",
                            "footer_cols",
                            Array(
                                "ROOT_MENU_TYPE" => "footer",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",   
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "COLS" => "1",
                            ),
                            false
                        );
                        ?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 footer-about-company">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_about_company.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_INFO")
                            ),
                            false
                        );?>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
                        );?>
                    </div>

            </div>
        </div>
    </footer>

    <?$formFrame = new \Bitrix\Main\Page\FrameHelper("iblock_form");
        $formFrame->begin();?>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	".default", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "10",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "47",
			1 => "48",
			2 => "49",
		),
		"NAME_FROM_PROPERTY" => "47",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "open-answer-form",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("RECALL_MESSAGE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_PHONE_RESULT",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
        <?$formFrame->end();?>
        <?$formFrame = new \Bitrix\Main\Page\FrameHelper("iblock_form_request");
        $formFrame->begin();?>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	"request_trade", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "11",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "51",
			1 => "52",
			2 => "53",
			3 => "54",
			4 => "55",
			5 => "56",
			6 => "57",
			7 => "58",
		),
		"NAME_FROM_PROPERTY" => "51",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "bxr-trade-request",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("REQUEST_TRADE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_REQUEST_RESULT",
		"COMPONENT_TEMPLATE" => "request_trade"
	),
	false
);?>
        <?$formFrame->end();?>
        <?$formFrame = new \Bitrix\Main\Page\FrameHelper("iblock_form_one_click_buy");
        $formFrame->begin();?>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	"request_trade", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "9",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "39",
			1 => "40",
			2 => "41",
			3 => "42",
			4 => "43",
			5 => "44",
			6 => "45",
			7 => "46",
		),
		"NAME_FROM_PROPERTY" => "39",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "bxr-one-click-buy",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("ONE_CLICK_FORM_TITLE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_CLICK_RESULT",
		"COMPONENT_TEMPLATE" => "request_trade"
	),
	false
);?>
        <?$formFrame->end();?>
    </body>
</html>
