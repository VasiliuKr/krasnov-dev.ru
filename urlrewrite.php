<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/company/actions/#",
		"RULE" => "",
		"ID" => "bxready:news",
		"PATH" => "/company/actions/index.php",
	),
	array(
		"CONDITION" => "#^/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^/company/news/#",
		"RULE" => "",
		"ID" => "bxready:news",
		"PATH" => "/company/news/index.php",
	),
	array(
		"CONDITION" => "#^/articles/#",
		"RULE" => "",
		"ID" => "bxready:news",
		"PATH" => "/articles/index.php",
	),
	array(
		"CONDITION" => "#^/services/#",
		"RULE" => "",
		"ID" => "bxready:news",
		"PATH" => "/services/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "alexkova.market:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/brands/#",
		"RULE" => "",
		"ID" => "alexkova.market:catalog",
		"PATH" => "/brands/index.php",
	),
	array(
		"CONDITION" => "#^/gost/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/gost/index.php",
	),
);

?>