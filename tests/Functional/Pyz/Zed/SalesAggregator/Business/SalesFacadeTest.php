<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\SalesAggregator\Business;

use Codeception\TestCase\Test;
use Orm\Zed\Oms\Persistence\SpyOmsOrderItemState;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\SpySalesExpense;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemOption;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Spryker\Zed\SalesAggregator\Business\SalesAggregatorFacade;

class SalesFacadeTest extends Test
{
    /**
     * @return void
     */
    public function testSalesOrderAggregatorWithDiscountsStack()
    {
        $salesFacade = $this->createSalesAggregatorFacade();

        $salesOrderEntity = $this->createTestOrder();

        $orderTransfer = $salesFacade->getOrderTotalsByIdSalesOrder($salesOrderEntity->getIdSalesOrder());

        $itemTransfer1 = $orderTransfer->getItems()[0];
        $itemTransfer2 = $orderTransfer->getItems()[1];

        $this->assertEquals(500, $itemTransfer1->getUnitGrossPrice());
        $this->assertEquals(800, $itemTransfer2->getUnitGrossPrice());

        $this->assertEquals(1000, $itemTransfer1->getSumGrossPrice());
        $this->assertEquals(800, $itemTransfer2->getSumGrossPrice());

        $this->assertEquals(400, $itemTransfer1->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(700, $itemTransfer2->getUnitGrossPriceWithDiscounts());

        $this->assertEquals(800, $itemTransfer1->getSumGrossPriceWithDiscounts());
        $this->assertEquals(700, $itemTransfer2->getSumGrossPriceWithDiscounts());

        $this->assertEquals(67, $itemTransfer1->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(120, $itemTransfer2->getUnitTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(840, $itemTransfer1->getSumGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertEquals(750, $itemTransfer2->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertEquals(80, $itemTransfer1->getUnitTaxAmount());
        $this->assertEquals(128, $itemTransfer2->getUnitTaxAmount());

        $this->assertEquals(100, $itemTransfer1->getUnitTotalDiscountAmount());
        $this->assertEquals(100, $itemTransfer2->getUnitTotalDiscountAmount());

        $this->assertEquals(200, $itemTransfer1->getSumTotalDiscountAmount());
        $this->assertEquals(100, $itemTransfer2->getSumTotalDiscountAmount());

        $this->assertEquals(110, $itemTransfer1->getUnitTotalDiscountAmountWithProductOption());
        $this->assertEquals(110, $itemTransfer2->getUnitTotalDiscountAmountWithProductOption());

        $this->assertEquals(220, $itemTransfer1->getSumTotalDiscountAmountWithProductOption());
        $this->assertEquals(110, $itemTransfer2->getSumTotalDiscountAmountWithProductOption());

        $this->assertEquals(160, $itemTransfer1->getSumTaxAmount());
        $this->assertEquals(128, $itemTransfer2->getSumTaxAmount());

        $this->assertEquals(840, $itemTransfer1->getRefundableAmount());
        $this->assertEquals(750, $itemTransfer2->getRefundableAmount());

        $expenseTransfer = $orderTransfer->getExpenses()[0];
        $this->assertEquals(90, $expenseTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(90, $expenseTransfer->getSumGrossPriceWithDiscounts());

        $this->assertEquals(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertEquals(16, $expenseTransfer->getSumTaxAmount());

        $this->assertEquals(14, $expenseTransfer->getUnitTaxAmountWithDiscounts());
        $this->assertEquals(14, $expenseTransfer->getSumTaxAmountWithDiscounts());

        $this->assertEquals(10, $expenseTransfer->getUnitTotalDiscountAmount());
        $this->assertEquals(10, $expenseTransfer->getSumTotalDiscountAmount());

        $this->assertEquals(90, $expenseTransfer->getRefundableAmount());

        $calculatedDiscountTransfer = $orderTransfer->getCalculatedDiscounts()['discount1'];

        $this->assertEquals('discount1', $calculatedDiscountTransfer->getDisplayName());
        $this->assertEquals(230 + 110, $calculatedDiscountTransfer->getSumGrossAmount());

        $totalsTransfer = $orderTransfer->getTotals();
        $this->assertEquals(1920, $totalsTransfer->getSubtotal());
        $this->assertEquals(100, $totalsTransfer->getExpenseTotal());
        $this->assertEquals(340, $totalsTransfer->getDiscountTotal());
        $this->assertEquals(1680, $totalsTransfer->getGrandTotal());
        $this->assertEquals(268, $totalsTransfer->getTaxTotal()->getAmount());
        $this->assertEquals(19, $totalsTransfer->getTaxTotal()->getTaxRate());
    }

    /**
     * @return void
     */
    public function testSalesOrderAggregatorWithoutDiscounts()
    {
        $salesFacade = $this->createSalesAggregatorFacade();

        $salesOrderEntity = $this->createTestOrder($useDiscounts = false);

        $orderTransfer = $salesFacade->getOrderTotalsByIdSalesOrder($salesOrderEntity->getIdSalesOrder());

        $itemTransfer1 = $orderTransfer->getItems()[0];
        $itemTransfer2 = $orderTransfer->getItems()[1];

        $this->assertEquals(500, $itemTransfer1->getUnitGrossPrice());
        $this->assertEquals(800, $itemTransfer2->getUnitGrossPrice());

        $this->assertEquals(1000, $itemTransfer1->getSumGrossPrice());
        $this->assertEquals(800, $itemTransfer2->getSumGrossPrice());

        $this->assertEquals(500, $itemTransfer1->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(800, $itemTransfer2->getUnitGrossPriceWithDiscounts());

        $this->assertEquals(1000, $itemTransfer1->getSumGrossPriceWithDiscounts());
        $this->assertEquals(800, $itemTransfer2->getSumGrossPriceWithDiscounts());

        $this->assertEquals(1060, $itemTransfer1->getSumGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertEquals(860, $itemTransfer2->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertEquals(80, $itemTransfer1->getUnitTaxAmount());
        $this->assertEquals(128, $itemTransfer2->getUnitTaxAmount());

        $this->assertEquals(160, $itemTransfer1->getSumTaxAmount());
        $this->assertEquals(128, $itemTransfer2->getSumTaxAmount());

        $this->assertEquals(85, $itemTransfer1->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(137, $itemTransfer2->getUnitTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(169, $itemTransfer1->getSumTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(137, $itemTransfer2->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(1060, $itemTransfer1->getRefundableAmount());
        $this->assertEquals(860, $itemTransfer2->getRefundableAmount());

        $expenseTransfer = $orderTransfer->getExpenses()[0];
        $this->assertEquals(100, $expenseTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(100, $expenseTransfer->getSumGrossPriceWithDiscounts());

        $this->assertEquals(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertEquals(16, $expenseTransfer->getSumTaxAmount());

        $this->assertEquals(16, $expenseTransfer->getUnitTaxAmountWithDiscounts());
        $this->assertEquals(16, $expenseTransfer->getSumTaxAmountWithDiscounts());

        $this->assertEquals(100, $expenseTransfer->getRefundableAmount());

        $totalsTransfer = $orderTransfer->getTotals();
        $this->assertEquals(1920, $totalsTransfer->getSubtotal());
        $this->assertEquals(100, $totalsTransfer->getExpenseTotal());
        $this->assertEquals(0, $totalsTransfer->getDiscountTotal());
        $this->assertEquals(2020, $totalsTransfer->getGrandTotal());
        $this->assertEquals(323, $totalsTransfer->getTaxTotal()->getAmount());
        $this->assertEquals(19, $totalsTransfer->getTaxTotal()->getTaxRate());
    }

    /**
     * @return  void
     */
    public function testSalesOrderItemWithDiscounts()
    {
        $salesFacade = $this->createSalesAggregatorFacade();

        $salesOrderEntity = $this->createTestOrder();

        $salesOrderItemEntity = $salesOrderEntity->getItems()[0];

        $itemTransfer = $salesFacade->getOrderItemTotalsByIdSalesOrderItem(
            $salesOrderItemEntity->getIdSalesOrderItem()
        );

        $this->assertEquals(500, $itemTransfer->getUnitGrossPrice());
        $this->assertEquals(1000, $itemTransfer->getSumGrossPrice());

        $this->assertEquals(400, $itemTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(800, $itemTransfer->getSumGrossPriceWithDiscounts());

        $this->assertEquals(420, $itemTransfer->getUnitGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertEquals(840, $itemTransfer->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertEquals(80, $itemTransfer->getUnitTaxAmount());
        $this->assertEquals(160, $itemTransfer->getSumTaxAmount());

        $this->assertEquals(67, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(134, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(840, $itemTransfer->getRefundableAmount());
    }

    /**
     * @return  void
     */
    public function testSalesOrderItemWithoutDiscounts()
    {
        $salesFacade = $this->createSalesAggregatorFacade();

        $salesOrderEntity = $this->createTestOrder(false);

        $salesOrderItemEntity = $salesOrderEntity->getItems()[0];

        $itemTransfer = $salesFacade->getOrderItemTotalsByIdSalesOrderItem(
            $salesOrderItemEntity->getIdSalesOrderItem()
        );

        $this->assertEquals(500, $itemTransfer->getUnitGrossPrice());
        $this->assertEquals(1000, $itemTransfer->getSumGrossPrice());

        $this->assertEquals(500, $itemTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertEquals(1000, $itemTransfer->getSumGrossPriceWithDiscounts());

        $this->assertEquals(530, $itemTransfer->getUnitGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertEquals(1060, $itemTransfer->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertEquals(80, $itemTransfer->getUnitTaxAmount());
        $this->assertEquals(160, $itemTransfer->getSumTaxAmount());

        $this->assertEquals(85, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertEquals(169, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertEquals(1060, $itemTransfer->getRefundableAmount());
    }


    /**
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder
     */
    protected function createTestOrder($createDiscounts = true)
    {
        //Data like shipment or state machine is not important in this test so take any first row.
        $salesOrderAddressEntity = new SpySalesOrderAddress();
        $salesOrderAddressEntity->setAddress1(1);
        $salesOrderAddressEntity->setAddress2(2);
        $salesOrderAddressEntity->setSalutation('Mr');
        $salesOrderAddressEntity->setCellPhone('123456789');
        $salesOrderAddressEntity->setCity('City');
        $salesOrderAddressEntity->setCreatedAt(new \DateTime());
        $salesOrderAddressEntity->setUpdatedAt(new \DateTime());
        $salesOrderAddressEntity->setComment('comment');
        $salesOrderAddressEntity->setDescription('describtion');
        $salesOrderAddressEntity->setCompany('company');
        $salesOrderAddressEntity->setFirstName('First name');
        $salesOrderAddressEntity->setLastName('Last Name');
        $salesOrderAddressEntity->setFkCountry(1);
        $salesOrderAddressEntity->setEmail('email');
        $salesOrderAddressEntity->setZipCode(10405);
        $salesOrderAddressEntity->save();

        $shipmentMethodEntity = SpyShipmentMethodQuery::create()->findOne();

        $omsStateEntity = new SpyOmsOrderItemState();
        $omsStateEntity->setName('test');
        $omsStateEntity->save();

        $salesOrderEntity = new SpySalesOrder();
        $salesOrderEntity->setBillingAddress($salesOrderAddressEntity);
        $salesOrderEntity->setShippingAddress(clone $salesOrderAddressEntity);
        $salesOrderEntity->setShipmentMethod($shipmentMethodEntity);
        $salesOrderEntity->setOrderReference('123');
        $salesOrderEntity->save();

        $this->createOrderItem(
            $omsStateEntity,
            $salesOrderEntity,
            $createDiscounts,
            $quantity = 2,
            $unitGrosPrice = 500,
            $taxRate = 19,
            $unitDiscountAmount = 100,
            $discountDisplayName = 'discount1',
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

        $this->createOrderItem(
            $omsStateEntity,
            $salesOrderEntity,
            $createDiscounts,
            $quantity = 1,
            $unitGrosPrice = 800,
            $taxRate = 19,
            $unitDiscountAmount = 100,
            $discountDisplayName = 'discount1',
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

        $salesExpenseEntity = new SpySalesExpense();
        $salesExpenseEntity->setName('shiping test');
        $salesExpenseEntity->setTaxRate(19);
        $salesExpenseEntity->setGrossPrice(100);
        $salesExpenseEntity->setFkSalesOrder($salesOrderEntity->getIdSalesOrder());
        $salesExpenseEntity->save();

        if ($createDiscounts === true) {
            $this->createSalesDiscount(
                $discountAmount = 10,
                $discountDisplayName = 'discount1',
                $salesOrderEntity->getIdSalesOrder(),
                $idExpense = null,
                $salesExpenseEntity->getIdSalesExpense()
            );
        }

        return $salesOrderEntity;
    }
    
    
    /**
     * @return \Spryker\Zed\SalesAggregator\Business\SalesAggregatorFacade
     */
    protected function createSalesAggregatorFacade()
    {
        return new SalesAggregatorFacade();
    }

    /**
     * @param \Orm\Zed\Oms\Persistence\SpyOmsOrderItemState $omsState
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrder
     * @param $quantity
     * @param $grossPrice
     * @param $taxRate
     * @param $discountAmount
     * @param $discountName
     * @param array $options
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderItem
     */
    protected function createOrderItem(
        SpyOmsOrderItemState $omsState,
        SpySalesOrder $salesOrder,
        $createDiscounts,
        $quantity,
        $grossPrice,
        $taxRate,
        $discountAmount,
        $discountName,
        array $options = []
    ) {
        $salesOrderItem = new SpySalesOrderItem();
        $salesOrderItem->setGrossPrice($grossPrice);
        $salesOrderItem->setQuantity($quantity);
        $salesOrderItem->setSku('123');
        $salesOrderItem->setName('test1');
        $salesOrderItem->setTaxRate($taxRate);
        $salesOrderItem->setFkOmsOrderItemState($omsState->getIdOmsOrderItemState());
        $salesOrderItem->setFkSalesOrder($salesOrder->getIdSalesOrder());
        $salesOrderItem->save();

        if ($createDiscounts === true) {
            $this->createSalesDiscount(
                $discountAmount,
                $discountName,
                $salesOrder->getIdSalesOrder(),
                $salesOrderItem->getIdSalesOrderItem()
            );
        }

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
                    if ($createDiscounts === true) {
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
