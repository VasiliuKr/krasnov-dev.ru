<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши контакты");
?><div class="bxr-contacts-block">
	 г. Челябинск, ул. Энтузиастов, 12, офис 702<br>
	 Звоните: <b>(351) 777-19-19</b><br>
 <br>
	 Пишите: <b><a href="mailto:global@kuznica74.ru">global@kuznica74.ru</a></b><br>
 <br>
	 Если вы приобрели наши решения и у вас появились вопросы, обращайтесь <a href="http://support.kuznica74.ru">в нашу техподдержку</a>.
</div>
 <br>
 <br>
 <b>Как до нас добраться: <br>
 </b><b>&nbsp;&nbsp;</b><?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"SMALL_ZOOM_CONTROL",1=>"TYPECONTROL",2=>"SCALELINE",),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.16215366489561;s:10:\"google_lon\";d:61.43184212646453;s:12:\"google_scale\";i:14;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:7:\"BXReady\";s:3:\"LON\";d:61.434173583984;s:3:\"LAT\";d:55.162494717295;}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",3=>"ENABLE_KEYBOARD",)
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>