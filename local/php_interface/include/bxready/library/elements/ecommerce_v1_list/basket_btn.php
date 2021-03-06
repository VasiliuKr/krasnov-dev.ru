<!--basket-btns block-->
<?$showSubscribeBtn = ($arElement['CATALOG_SUBSCRIBE'] == 'Y') ? true : false;?>
<?if (count($arElement["OFFERS"]) > 0) {
    foreach ($arElement["OFFERS"] as $offer) {?>
        <div class="offers-btn-wrap" id="offers-btn-<?=$offer["ID"]?>" style="display: none" data-item="<?=$offer["ID"]?>">
            <?if ($offer["CATALOG_QUANTITY"] <= 0 && $offer["CATALOG_CAN_BUY_ZERO"] == "N" || !$offer["MIN_PRICE"]['VALUE']) {?>
                <?if($showSubscribeBtn) {?>
                    <div class="bxr-subscribe-wrap">
                        <? include_once 'subscribe_script.php';?>
                        <?$APPLICATION->includeComponent('alexkova.market:catalog.product.subscribe','',
                            array(
                                'PRODUCT_ID' => $offer['ID'],
                                'BUTTON_ID' => 'bxr-ev1list-'.$UID.'-'.$offer['ID'].'-subscribe',
                                'BUTTON_CLASS' => 'bxr-color-button bxr-subscribe',
                            ),
                            $component, array('HIDE_ICONS' => 'Y')
                        );?>
                    </div>
                <?} else {?>
                    <button class="bxr-color-button bxr-trade-request" value="<?=$offer["ID"]?>" 
                            data-offer-id="<?=$offer["ID"]?>"
                            data-trade-id="<?=$arElement["ID"]?>"
                            data-trade-name="<?=$arElement["NAME"]?>"
                            data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                            data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('OFFER_REQUEST_MSG'))?>">
                        <?=GetMessage("REQUEST_BTN")?>
                    </button>
                <?}?>
            <?} else {
                $qtyMax = ($offer["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $offer["CATALOG_QUANTITY"];?>
                <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
                    <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$offer["ID"]?>">
                    <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$offer["ID"]?>">
                    <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$offer["ID"]?>" data-max="<?=$qtyMax?>">
                    <span style="margin-right: 5px;"><?=$arElement['ITEM_MEASURE']['TITLE']?></span>
                    <button class="bxr-color-button bxr-basket-add hidden-xs">
                        <?=GetMessage("BASKET_BTN")?>
                    </button>
                    <button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add hidden-lg hidden-md hidden-sm">
                        <span class="fa fa-shopping-cart"></span>
                    </button>
                    <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$offer["ID"]?>">
                    <input type="hidden" name="action" value="add">
                </form>
                <div class="clearfix"></div>
            <?}?>
        </div>
<?  }?>
<?} else {?>
    <?if ($arElement["CATALOG_QUANTITY"] <= 0 && $arElement["CATALOG_CAN_BUY_ZERO"] == "N" || !$arElement["MIN_PRICE"]['VALUE']) {?>
        <?if($showSubscribeBtn) {?>
            <div class="bxr-subscribe-wrap">
                <? include_once 'subscribe_script.php';?>
                <?$APPLICATION->includeComponent('alexkova.market:catalog.product.subscribe','',
                    array(
                        'PRODUCT_ID' => $arElement['ID'],
                        'BUTTON_ID' => 'bxr-ev1list-'.$UID.'-'.$arElement['ID'].'-subscribe',
                        'BUTTON_CLASS' => 'bxr-color-button bxr-subscribe',
                    ),
                    $component, array('HIDE_ICONS' => 'Y')
                );?>
            </div>
        <?} else {?>
            <button class="bxr-color-button bxr-trade-request" value="<?=$arElement["ID"]?>" 
                            data-trade-id="<?=$arElement["ID"]?>"
                            data-trade-name="<?=$arElement["NAME"]?>"
                            data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                            data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('TRADE_REQUEST_MSG'))?>">
                <?=GetMessage("REQUEST_BTN")?>
            </button>
        <?}?>
    <?} else {
        if (is_array($arElement["BASKET_PROPS"]["REQUIRED_CHECK"]) || is_array($arElement["BASKET_PROPS"]["OPTIONAL_CHECK"])) {?>
            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="bxr-color-button" id="<?=$arItemIDs["BUY_LINK"]?>">
                <?=GetMessage("MORE_INFO_TITLE")?>
            </a>
        <?} else {
            $qtyMax = ($arElement["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $arElement["CATALOG_QUANTITY"];?>
            <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
                <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arElement["ID"]?>">
                <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arElement["ID"]?>">
                <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arElement["ID"]?>" data-max="<?=$qtyMax?>">
                <span style="margin-right: 5px;"><?=$arElement['ITEM_MEASURE']['TITLE']?></span>
                <button class="bxr-color-button bxr-basket-add hidden-xs">
                    <?=GetMessage("BASKET_BTN")?>
                </button>
                <button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add hidden-lg hidden-md hidden-sm">
                    <span class="fa fa-shopping-cart"></span>
                </button>
                <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arElement["ID"]?>">
                <input type="hidden" name="action" value="add">
            </form>
            <div class="clearfix"></div>
        <?}?>
    <?}?>
<?}?>