<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Alexkova\Bxready\Core;
if (!Alexkova\Bxready\Core::isInstall()) return false;

$arComponentParameters = array(
	"GROUPS" => array(
		
	),
	"PARAMETERS" => array(
		"BUFFER_NAME"=>array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BUFFER_NAME"),
			"TYPE" => "STRING",
		),
	),
);

?>