<?
global $APPLICATION;

$dirName = str_replace($_SERVER["DOCUMENT_ROOT"],'', dirname(__FILE__));
$APPLICATION->SetAdditionalCSS("/bitrix/tools/bxready/library/elements/ecommerce.v3.lite.color/include/style.css");
$APPLICATION->AddHeadScript("/bitrix/tools/bxready/library/elements/ecommerce.v3.lite.color/include/script.js");

