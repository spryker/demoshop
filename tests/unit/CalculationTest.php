<?php

use ProjectA\Shared\Library\TransferLoader;
use ProjectA\Shared\Sales\Transfer\Order;
use ProjectA\Shared\Sales\Transfer\OrderItem;
use \ProjectA\Zed\Calculation\Business\CalculationFacade;

/**
 * Class CalculationTest
 */
class CalculationTest extends \Codeception\TestCase\Test
{

    const EXPENSE_1000 = 1000;
    const ITEM_GROSS_PRICE = 10000;
    const ITEM_COUPON_DISCOUNT_AMOUNT = 1000;
    const ITEM_SALESRULE_DISCOUNT_AMOUNT = 1000;
    const ORDER_SHIPPING_COSTS = 2000;

    /**
     * @var CalculationFacade
     */
    private $facadeCalculation;

    protected function setUp()
    {
        parent::setUp();
        $this->facadeCalculation = (new \ProjectA\Zed\Kernel\Business\FacadeLocator())->locate('Calculation');
    }

    /**
     * @return Order
     */
    protected function getOrder()
    {
        /* @var Order $order */
        $order = TransferLoader::loadSalesOrder();
        $order->fillWithFixtureData();

        $expense = TransferLoader::loadSalesPriceExpense();
        $expense->fillWithFixtureData();
        $expense->setGrossPrice(self::EXPENSE_1000);

        /* @var OrderItem $item */
        $item = TransferLoader::loadSalesOrderItem();
        $item->fillWithFixtureData();
        $item->setGrossPrice(self::ITEM_GROSS_PRICE);
        $item->addExpense($expense);

        $order->addItem($item);

        return $order;
    }

    protected function getTotals()
    {
        return '';
    }

    /**
     *
     */
    public function testRecalculateOrder()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateOrder($order);
    }

    /**
     *
     */
    public function testRecalculateDiscountTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateDiscountTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateExpensePriceToPay()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateExpensePriceToPay($order);
    }

    /**
     *
     */
    public function testRecalculateExpenseTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateExpenseTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateGrandTotalTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateGrandTotalTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateGrandTotalWithoutDiscountsTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateGrandTotalWithoutDiscountsTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateItemPriceToPay()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateItemPriceToPay($order);
    }

    /**
     *
     */
    public function testRecalculateOptionPriceToPay()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateOptionPriceToPay($order);
    }

    /**
     *
     */
    public function testRecalculateRemoveAllCalculatedDiscounts()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateRemoveAllCalculatedDiscounts($order);
    }

    /**
     *
     */
    public function testRecalculateRemoveAllExpenses()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateRemoveAllExpenses($order);
    }

    /**
     *
     */
    public function testRecalculateRemoveTotals()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateRemoveTotals($order);
    }

    /**
     *
     */
    public function testRecalculateSubtotalTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateSubtotalTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateSubtotalWithoutItemExpensesTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateSubtotalTotals($totals, $order, $order->getItems());
    }

    /**
     *
     */
    public function testRecalculateTaxTotals()
    {
        $order = $this->getOrder();
        $totals = $this->getTotals();
        $this->facadeCalculation->recalculateSubtotalTotals($totals, $order, $order->getItems());
    }
}
