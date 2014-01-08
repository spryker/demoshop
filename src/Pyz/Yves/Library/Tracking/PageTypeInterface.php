<?php
namespace Pyz\Yves\Library\Tracking;

interface PageTypeInterface
{

    const PAGE_TYPE_HOME = 'home';
    const PAGE_TYPE_SUCCESS = 'success';
    const PAGE_TYPE_CHECKOUT = 'checkout';
    const PAGE_TYPE_REGISTRATION = 'registration';
    const PAGE_TYPE_CAMPAIGN = 'campaign';
    const PAGE_TYPE_PRODUCT_DETAIL = 'product detail';
    const PAGE_TYPE_STATIC = 'static';
    const PAGE_TYPE_CART = 'cart';
}
