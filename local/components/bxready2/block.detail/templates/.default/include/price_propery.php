<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<?
    global $DB;
    $currency = $arResult["PROPERTIES"]["BXR_UNIT_PRICE"]["VALUE"];
    $price = round($arResult["PROPERTIES"]["BXR_PRICE"]["VALUE"]);
    $display_price = number_format($price, 0, ".", " ");
    $discount_price = round($arResult["PROPERTIES"]["BXR_DISCOUNT_PRICE"]["VALUE"]);
    $display_discount_price = number_format($discount_price, 0, ".", " ");
    $discount_period_from = strtotime($arResult["PROPERTIES"]["BXR_DISCOUNT_PERIOD_FROM"]["VALUE"]);
    $discount_period_to = strtotime($arResult["PROPERTIES"]["BXR_DISCOUNT_PERIOD_TO"]["VALUE"]);
    $date = strtotime(date($DB->DateFormatToPHP(CLang::GetDateFormat("FULL"))));
    $discount_active = ((!$discount_period_from && !$discount_period_to) || ($date >= $discount_period_from && $date <= $discount_period_to) || ($date >= $discount_period_from && !$discount_period_to)) ? true : false;
    $show_timer = ($arResult["PROPERTIES"]["BXR_DISCOUNT_TIMER"]["VALUE"] == "Y" && $discount_active) ? true : false;
    $discount_show_type = $arParams["BXR_OFFERS_BLOCK"]["BXR_DISCOUNT_SHOW_TYPE"];
?>