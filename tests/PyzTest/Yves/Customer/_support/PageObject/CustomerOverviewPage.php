<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerOverviewPage extends Customer
{
    const URL = '/customer/overview';

    const BOX_HEADLINE_ORDERS = 'Last orders';
    const BOX_HEADLINE_PROFILE = 'Profile';
    const BOX_HEADLINE_NEWSLETTER = 'Newsletter';
    const NEWSLETTER_SUBSCRIBED = 'Newsletter subscribed';
    const BOX_HEADLINE_BILLING_ADDRESS = 'Default Billing Address';
    const BOX_HEADLINE_SHIPPING_ADDRESS = 'Default Shipping Address';

    const LINK_TO_PROFILE_PAGE = '//a[@data-id="sidebar-profile"]';//'Profile';
    const LINK_TO_ADDRESSES_PAGE = '//a[@data-id="sidebar-address"]';//'Addresses';
    const LINK_TO_ORDERS_PAGE = '//a[@data-id="sidebar-order"]';//'Orders History';
    const LINK_TO_NEWSLETTER_PAGE = '//a[@data-id="sidebar-newsletter"]';//'Newsletter';

    const INFO_TEXT_ADD_SHIPPING_ADDRESS = 'Please Specify Shipping Address';
    const INFO_TEXT_ADD_BILLING_ADDRESS = 'Please Specify Billing Address';
}
