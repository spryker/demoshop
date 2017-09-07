<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Availability\Presentation;

use PyzTest\Yves\Availability\AvailabilityPresentationTester;
use PyzTest\Yves\Cart\PageObject\CartListPage;
use PyzTest\Yves\Product\PageObject\ProductDetailPage;
use PyzTest\Zed\Availability\PageObject\AvailabilityViewPage;
use PyzTest\Zed\Sales\PageObject\OrderDetailPage;
use PyzTest\Zed\Sales\PageObject\OrderListPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Availability
 * @group Presentation
 * @group CheckoutAvailabilityCest
 * Add your own group annotations below this line
 */
class CheckoutAvailabilityCest
{

    /**
     * @param \PyzTest\Yves\Availability\AvailabilityPresentationTester $i
     *
     * @return void
     */
    public function testCheckoutItemWithAvailability(AvailabilityPresentationTester $i)
    {
        $i->wantTo('Checkout item with stock');
        $i->expectTo('Availability changed during SM processing.');

        $i->amOnPage(AvailabilityPresentationTester::FUJITSU_PRODUCT_PAGE);

        $i->click(ProductDetailPage::ADD_TO_CART_XPATH);

        $i->see(CartListPage::CART_HEADER);
        $i->click(CartListPage::START_CHECKOUT_XPATH);

        $i->processCheckout();

        $i->amZed();
        $i->amLoggedInUser();

        $idProductFujitsu = 118;

        $i->amOnPage(sprintf(AvailabilityViewPage::VIEW_PRODUCT_AVAILABILITY_URL, $idProductFujitsu));

        $i->waitForElementVisible('//*[@id="page-wrapper"]/div[3]/div[2]/div/div/div[2]/div/div[5]/p[2]');

        $reservedProductsBefore = $i->grabTextFrom('//*[@id="page-wrapper"]/div[3]/div[2]/div/div/div[2]/div/div[5]/p[2]');

        codecept_debug('Reserved Products before: ' . $reservedProductsBefore);

        $i->amOnPage(OrderListPage::ORDER_LIST_URL);
        $i->wait(2);

        $idSalesOrder = $i->grabTextFrom('//*[@class="dataTables_scrollBody"]/table/tbody/tr[1]/td[1]');

        codecept_debug('ID Sales order: ' . $idSalesOrder);

        $i->amOnPage(sprintf(OrderDetailPage::ORDER_DETAIL_PAGE_URL, $idSalesOrder));

        $i->click(sprintf(OrderDetailPage::OMS_EVENT_TRIGGER_XPATH, 'pay'));
        $i->click(sprintf(OrderDetailPage::OMS_EVENT_TRIGGER_XPATH, 'ship'));
        $i->click(sprintf(OrderDetailPage::OMS_EVENT_TRIGGER_XPATH, 'stock-update'));
        $i->click(sprintf(OrderDetailPage::OMS_EVENT_TRIGGER_XPATH, 'return'));
        $i->click(sprintf(OrderDetailPage::OMS_EVENT_TRIGGER_XPATH, 'refund'));

        $i->amOnPage(sprintf(AvailabilityViewPage::VIEW_PRODUCT_AVAILABILITY_URL, $idProductFujitsu));

        $reservedProductsAfter = $i->grabTextFrom('//*[@id="page-wrapper"]/div[3]/div[2]/div/div/div[2]/div/div[5]/p[2]');

        $i->assertEquals($reservedProductsAfter, $reservedProductsBefore - 1); //Reserved item returned back
    }

}
