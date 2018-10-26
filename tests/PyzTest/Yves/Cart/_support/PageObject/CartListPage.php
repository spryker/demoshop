<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Cart\PageObject;

class CartListPage
{
    public const START_CHECKOUT_XPATH = '/html/body/div[2]/main/div/div[2]/div/p/a';
    public const CART_HEADER = 'Cart';

    public const FIRST_CART_ITEM_QUANTITY_INPUT_XPATH = '/html/body/div[2]/main/div[1]/div/div/div/div[4]/ul/li[1]/form/label/span/input';
    public const FIRST_CART_ITEM_CHANGE_QUANTITY_BUTTON_XPATH = '/html/body/div[2]/main/div[1]/div/div/div/div[4]/ul/li[1]/form/label/span/span/button';
}
