<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\ProductOption\Business;

use Codeception\TestCase\Test;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Orm\Zed\Oms\Persistence\SpyOmsOrderItemState;
use Orm\Zed\Oms\Persistence\SpyOmsOrderProcess;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemOption;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemOptionQuery;
use Spryker\Zed\ProductOption\Business\ProductOptionFacade;

/**
 * @group Functional
 * @group Spryker
 * @group Zed
 * @group ProductOption
 * @group Business
 * @group ProductOptionFacadeAggregatorTest
 */
class ProductOptionFacadeAggregatorTest extends Test
{

    /**
     * @return void
     */
    public function testAggregateOrderItemProductOptionGrossPriceShouldSumAllItemsWithProductOptions()
    {
        $productOptionFacade = $this->createProductOptionFacade();

        $orderTransfer = $this->createOrderTransferWithRelatedPersistedData();

        $productOptionFacade->aggregateOrderItemProductOptionGrossPrice($orderTransfer);

        $recalculatedOrderItemTransfer = $orderTransfer->getItems()[0];
        $recalculatedOrderItemOptionTransfer = $recalculatedOrderItemTransfer->getProductOptions()[0];

        $this->assertSame(200, $recalculatedOrderItemOptionTransfer->getSumGrossPrice());
    }

    /**
     * @return void
     */
    public function testAggregatorOrderSubtotalWithOptionShouldSumAllOptionsAmounts()
    {
        $productOptionFacade = $this->createProductOptionFacade();

        $orderTransfer = new OrderTransfer();

        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer->setSubtotal(0);

        $orderTransfer->setTotals($totalsTransfer);

        $itemTransfer = new ItemTransfer();

        $productOptionTransfer = new ProductOptionTransfer();
        $productOptionTransfer->setSku('123');
        $productOptionTransfer->setSumGrossPrice(100);
        $itemTransfer->addProductOption($productOptionTransfer);

        $productOptionTransfer = new ProductOptionTransfer();
        $productOptionTransfer->setSku('123');
        $productOptionTransfer->setSumGrossPrice(200);
        $itemTransfer->addProductOption($productOptionTransfer);

        $orderTransfer->addItem($itemTransfer);

        $productOptionFacade->aggregateOrderSubtotalWithProductOptions($orderTransfer);

        $totals = $orderTransfer->getTotals();

        $this->assertSame(300, $totals->getSubtotal());
    }

    /**
     * @return void
     */
    public function testSaveSaleOrderProductOptionsShouldPersistProvidedOptions()
    {
        $productOptionFacade = $this->createProductOptionFacade();

        $orderTransfer = $this->createOrderTransferWithRelatedPersistedData(false);

        $quoteTransfer = new QuoteTransfer();
        $checkoutResponseTransfer = new CheckoutResponseTransfer();

        $orderSaverTransfer = new SaveOrderTransfer();
        $orderSaverTransfer->fromArray($orderTransfer->toArray(), true);
        $orderSaverTransfer->setOrderItems($orderTransfer->getItems());
        $checkoutResponseTransfer->setSaveOrder($orderSaverTransfer);

        $productOptionFacade->saveSaleOrderProductOptions($quoteTransfer, $checkoutResponseTransfer);

        $salesOrderItemOptionEntity = SpySalesOrderItemOptionQuery::create()
            ->findOneByFkSalesOrderItem($orderTransfer->getItems()[0]->getIdSalesOrderItem());

        $prductOptionTransfer = $orderTransfer->getItems()[0]->getProductOptions()[0];

        $this->assertNotEmpty($salesOrderItemOptionEntity);
        $this->assertSame($salesOrderItemOptionEntity->getGrossPrice(), $prductOptionTransfer->getUnitGrossPrice());
    }

    /**
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderAddress
     */
    protected function createSalesOrderAddress()
    {
        $salesOrderAddressEntity = new SpySalesOrderAddress();
        $salesOrderAddressEntity->setAddress1(1);
        $salesOrderAddressEntity->setAddress2(2);
        $salesOrderAddressEntity->setSalutation('Mr');
        $salesOrderAddressEntity->setCellPhone('123456789');
        $salesOrderAddressEntity->setCity('City');
        $salesOrderAddressEntity->setCreatedAt(new \DateTime());
        $salesOrderAddressEntity->setUpdatedAt(new \DateTime());
        $salesOrderAddressEntity->setComment('Comment');
        $salesOrderAddressEntity->setDescription('Description');
        $salesOrderAddressEntity->setCompany('Company');
        $salesOrderAddressEntity->setFirstName('FirstName');
        $salesOrderAddressEntity->setLastName('LastName');
        $salesOrderAddressEntity->setFkCountry(1);
        $salesOrderAddressEntity->setEmail('Email');
        $salesOrderAddressEntity->setZipCode(12345);
        $salesOrderAddressEntity->save();

        return $salesOrderAddressEntity;
    }

    /**
     * @return \Orm\Zed\Oms\Persistence\SpyOmsOrderProcess
     */
    protected function createOmsProcess()
    {
        $omsProcessEntity = new SpyOmsOrderProcess();
        $omsProcessEntity->setName('test');
        $omsProcessEntity->save();

        return $omsProcessEntity;
    }

    /**
     * @return \Orm\Zed\Oms\Persistence\SpyOmsOrderItemState
     */
    protected function createOmsState()
    {
        $omsStateEntity = new SpyOmsOrderItemState();
        $omsStateEntity->setName('test');
        $omsStateEntity->save();

        return $omsStateEntity;
    }

    /**
     * @return \Spryker\Zed\ProductOption\Business\ProductOptionFacade
     */
    protected function createProductOptionFacade()
    {
        $productOptionFacade = new ProductOptionFacade();

        return $productOptionFacade;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderAddress $address1
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderAddress $address2
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder
     */
    protected function createSalesOrderEntity(SpySalesOrderAddress $address1, SpySalesOrderAddress $address2)
    {
        $salesOrderEntity = new SpySalesOrder();
        $salesOrderEntity->setFkSalesOrderAddressBilling($address1->getIdSalesOrderAddress());
        $salesOrderEntity->setFkSalesOrderAddressShipping($address2->getIdSalesOrderAddress());
        $salesOrderEntity->setFirstName('First');
        $salesOrderEntity->setLastName('Last');
        $salesOrderEntity->setEmail('email@email.tld');
        $salesOrderEntity->setOrderReference('order reference');
        $salesOrderEntity->save();

        return $salesOrderEntity;
    }

    /**
     * @param \Orm\Zed\Oms\Persistence\SpyOmsOrderItemState $testStateEntity
     * @param \Orm\Zed\Oms\Persistence\SpyOmsOrderProcess $omsProcessEntity
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderItem
     */
    protected function createSalesOrderItemEntity(
        SpyOmsOrderItemState $testStateEntity,
        SpyOmsOrderProcess $omsProcessEntity,
        SpySalesOrder $salesOrderEntity
    ) {

        $salesOrderItemEntity = new SpySalesOrderItem();
        $salesOrderItemEntity->setFkOmsOrderItemState($testStateEntity->getIdOmsOrderItemState());
        $salesOrderItemEntity->setFkOmsOrderProcess($omsProcessEntity->getIdOmsOrderProcess());
        $salesOrderItemEntity->setFkSalesOrder($salesOrderEntity->getIdSalesOrder());
        $salesOrderItemEntity->setGrossPrice(1500);
        $salesOrderItemEntity->setQuantity(2);
        $salesOrderItemEntity->setSku('sku-123-321');
        $salesOrderItemEntity->setName('name-of-order-item');
        $salesOrderItemEntity->setTaxRate(19);
        $salesOrderItemEntity->setLastStateChange(new \DateTime());
        $salesOrderItemEntity->save();

        return $salesOrderItemEntity;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $salesOrderItemEntity
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderItemOption
     */
    protected function createSalesOrderItemOptionEntity(SpySalesOrderItem $salesOrderItemEntity)
    {
        $salesOrderItemOptionEntity = new SpySalesOrderItemOption();
        $salesOrderItemOptionEntity->setFkSalesOrderItem($salesOrderItemEntity->getIdSalesOrderItem());
        $salesOrderItemOptionEntity->setGrossPrice(100);
        $salesOrderItemOptionEntity->setGroupName('group');
        $salesOrderItemOptionEntity->setValue('value');
        $salesOrderItemOptionEntity->setTaxRate(19);
        $salesOrderItemOptionEntity->setSku('123');
        $salesOrderItemOptionEntity->save();

        return $salesOrderItemOptionEntity;
    }

    /**
     * @param bool $createOptions
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    protected function createOrderTransferWithRelatedPersistedData($createOptions = true)
    {
        $address1 = $this->createSalesOrderAddress();
        $address2 = $this->createSalesOrderAddress();

        $salesOrderEntity = $this->createSalesOrderEntity($address1, $address2);

        $omsProcessEntity = $this->createOmsProcess();
        $testStateEntity = $this->createOmsState();

        $salesOrderItemEntity = $this->createSalesOrderItemEntity($testStateEntity, $omsProcessEntity, $salesOrderEntity);

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setIdSalesOrderItem($salesOrderItemEntity->getIdSalesOrderItem());

        $productOptionTransfer = new ProductOptionTransfer();
        $productOptionTransfer->setUnitGrossPrice(200);
        $productOptionTransfer->setValue('value');
        $productOptionTransfer->setGroupName('group name');
        $productOptionTransfer->setTaxRate(19);
        $productOptionTransfer->setSku('124');

        if ($createOptions) {
            $salesOrderItemOptionEntity = $this->createSalesOrderItemOptionEntity($salesOrderItemEntity);
            $productOptionTransfer->setIdSalesOrderItemOption($salesOrderItemOptionEntity->getIdSalesOrderItemOption());
        }

        $orderTransfer = new OrderTransfer();
        $orderTransfer->setIdSalesOrder($salesOrderEntity->getIdSalesOrder());

        $itemTransfer->addProductOption($productOptionTransfer);

        $orderTransfer->addItem($itemTransfer);
        return $orderTransfer;
    }

}
