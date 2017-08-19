<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Alexkova\Bxready\Core;

if (!Alexkova\Bxready\Core::isInstall()) return false;

if (strlen($arParams["BUFFER_NAME"])>0){
	$APPLICATION->ShowViewContent($arParams["BUFFER_NAME"]);
}

?>