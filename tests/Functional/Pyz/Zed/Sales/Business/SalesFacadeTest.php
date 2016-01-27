<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Sales\Business;

use Codeception\TestCase\Test;
use Orm\Zed\Oms\Persistence\SpyOmsOrderItemState;
use Orm\Zed\Oms\Persistence\SpyOmsOrderItemStateQuery;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\SpySalesExpense;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddressQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemOption;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Spryker\Zed\Sales\Business\SalesFacade;

class SalesFacadeTest extends Test
{
    /**
     * @return void
     */
    public function testSalesOrderAggregatorStackShouldProvideDataFromPersistence()
    {
        $salesFacade = $this->createSalesFacade();

        $salesOrderEntity = $this->createTestOrder();

        $orderTransfer = $salesFacade->getOrderTotalsByIdSalesOrder($salesOrderEntity->getIdSalesOrder());

        $totalsTransfer = $orderTransfer->getTotals();
        $this->assertEquals(1390, $totalsTransfer->getSubtotal());
        $this->assertEquals(100, $totalsTransfer->getExpenseTotal());
        $this->assertEquals(230, $totalsTransfer->getDiscountTotal());
        $this->assertEquals(1260, $totalsTransfer->getGrandTotal());

        $calculatedDiscountTransfer = $orderTransfer->getCalculatedDiscounts()['discount1'];

        $this->assertEquals('discount1', $calculatedDiscountTransfer->getDisplayName());
        $this->assertEquals(230, $calculatedDiscountTransfer->getSumGrossAmount());

        $itemTransfer1 = $orderTransfer->getItems()[0];
        $itemTransfer2 = $orderTransfer->getItems()[1];

        $this->assertEquals(420, $itemTransfer1->getSumGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertEquals(750, $itemTransfer2->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertEquals(67, $itemTransfer1->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(120, $itemTransfer2->getUnitTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(420, $itemTransfer1->getRefundableAmount());
        $this->assertEquals(750, $itemTransfer2->getRefundableAmount());
    }


    /**
     * @return SpySalesOrder
     */
    protected function createTestOrder()
    {
        //Data like shipment or state machine is not important in this test so take any first row.
        $billingAddress = SpySalesOrderAddressQuery::create()->findOne();
        $shipmentMethod = SpyShipmentMethodQuery::create()->findOne();
        $omsState = SpyOmsOrderItemStateQuery::create()->findOne();

        $salesOrder = new SpySalesOrder();
        $salesOrder->setBillingAddress($billingAddress);
        $salesOrder->setShippingAddress(clone $billingAddress);
        $salesOrder->setShipmentMethod($shipmentMethod);
        $salesOrder->setOrderReference('123');
        $salesOrder->save();

        $salesOrderItem1 = $this->createOrderItem(
            $omsState,
            $salesOrder,
            500,
            19,
            100,
            'discount1',
            [
                [
                    'gross_price' => 10,
                    'tax_rate' => 19,
                    'discounts' => [
                        [
                            'amount' => 5,
                            'name' => 'discount1'
                        ]
                    ]
                ],
                [
                    'gross_price' => 20,
                    'tax_rate' => 19,
                    'discounts' => [
                        [
                            'amount' => 5,
                            'name' => 'discount1'
                        ]
                    ]
                ]
            ]
        );
        $salesOrderItem2 = $this->createOrderItem(
            $omsState,
            $salesOrder,
            800,
            19,
            100,
            'discount1',
            [
                [
                    'gross_price' => 20,
                    'tax_rate' => 19,
                    'discounts' => [
                        [
                            'amount' => 5,
                            'name' => 'discount1'
                        ]
                    ]
                ],
                [
                    'gross_price' => 40,
                    'tax_rate' => 19,
                    'discounts' => [
                        [
                            'amount' => 5,
                            'name' => 'discount1'
                        ]
                    ]

                ]
            ]
        );

        $salesExpense = new SpySalesExpense();
        $salesExpense->setName('shiping test');
        $salesExpense->setTaxRate(19);
        $salesExpense->setGrossPrice(100);
        $salesExpense->setFkSalesOrder($salesOrder->getIdSalesOrder());
        $salesExpense->save();

        $this->createSalesDiscount(
            10,
            'discount1',
            $salesOrder->getIdSalesOrder(),
            null,
            $salesExpense->getIdSalesExpense()
        );

        return $salesOrder;
    }
    
    
    /**
     * @return SalesFacade
     */
    protected function createSalesFacade()
    {
        return new SalesFacade();
    }

    /**
     * @param SpyOmsOrderItemState $omsState
     * @param SpySalesOrder $salesOrder
     * @param int $grossPrice
     * @param int $taxRate
     *
     * @param array $options
     * @return SpySalesOrderItem
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function createOrderItem(
        SpyOmsOrderItemState $omsState,
        SpySalesOrder $salesOrder,
        $grossPrice,
        $taxRate,
        $discountAmount,
        $discountName,
        array $options = []
    ) {
        $salesOrderItem = new SpySalesOrderItem();
        $salesOrderItem->setGrossPrice($grossPrice);
        $salesOrderItem->setQuantity(1);
        $salesOrderItem->setSku('123');
        $salesOrderItem->setName('test1');
        $salesOrderItem->setTaxRate($taxRate);
        $salesOrderItem->setFkOmsOrderItemState($omsState->getIdOmsOrderItemState());
        $salesOrderItem->setFkSalesOrder($salesOrder->getIdSalesOrder());
        $salesOrderItem->save();

        $this->createSalesDiscount(
            $discountAmount,
            $discountName,
            $salesOrder->getIdSalesOrder(),
            $salesOrderItem->getIdSalesOrderItem()
        );

        foreach ($options as $option) {
            $salesOrderItemOption = new SpySalesOrderItemOption();
            $salesOrderItemOption->setFkSalesOrderItem($salesOrderItem->getIdSalesOrderItem());
            $salesOrderItemOption->setGrossPrice($option['gross_price']);
            $salesOrderItemOption->setTaxRate($option['tax_rate']);
            $salesOrderItemOption->setLabelOptionType('label1');
            $salesOrderItemOption->setLabelOptionValue('value1');
            $salesOrderItemOption->save();
            if (isset($option['discounts'])) {
                foreach ($option['discounts'] as $discount) {
                    $this->createSalesDiscount(
                        $discount['amount'],
                        $discount['name'],
                        $salesOrder->getIdSalesOrder(),
                        $salesOrderItem->getIdSalesOrderItem(),
                        null,
                        $salesOrderItemOption->getIdSalesOrderItemOption()
                    );
                }
            }
        }

        return $salesOrderItem;
    }

    /**
     * @param int $amount
     * @param int $name
     */
    protected function createSalesDiscount(
        $amount,
        $name,
        $idOrder,
        $idOrderItem = null,
        $idExpense = null,
        $idOrderItemOption = null
    ) {
        $spySalesDiscount = new SpySalesDiscount();
        $spySalesDiscount->setName('name');
        $spySalesDiscount->setFkSalesOrder($idOrder);
        $spySalesDiscount->setFkSalesOrderItem($idOrderItem);
        $spySalesDiscount->setFkSalesExpense($idExpense);
        $spySalesDiscount->setFkSalesOrderItemOption($idOrderItemOption);
        $spySalesDiscount->setDisplayName($name);
        $spySalesDiscount->setAmount($amount);
        $spySalesDiscount->save();
    }
}
