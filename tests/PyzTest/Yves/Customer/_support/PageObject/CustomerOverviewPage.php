<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerOverviewPage extends Customer
{
    public const URL = '/customer/overview';

    public const BOX_HEADLINE_ORDERS = 'Last orders';
    public const BOX_HEADLINE_PROFILE = 'Profile';
    public const BOX_HEADLINE_NEWSLETTER = 'Newsletter';
    public const NEWSLETTER_SUBSCRIBED = 'Newsletter subscribed';
    public const BOX_HEADLINE_BILLING_ADDRESS = 'Default Billing Address';
    public const BOX_HEADLINE_SHIPPING_ADDRESS = 'Default Shipping Address';

    public const LINK_TO_PROFILE_PAGE = '//a[@data-id="sidebar-profile"]';//'Profile';
    public const LINK_TO_ADDRESSES_PAGE = '//a[@data-id="sidebar-address"]';//'Addresses';
    public const LINK_TO_ORDERS_PAGE = '//a[@data-id="sidebar-order"]';//'Orders History';
    public const LINK_TO_NEWSLETTER_PAGE = '//a[@data-id="sidebar-newsletter"]';//'Newsletter';

    public const INFO_TEXT_ADD_SHIPPING_ADDRESS = 'Please Specify Shipping Address';
    public const INFO_TEXT_ADD_BILLING_ADDRESS = 'Please Specify Billing Address';
}
