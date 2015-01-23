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

    /**
     *
     */
    public function testRecalculateOrder()
    {
        $order = $this->getOrder();
        $this->facadeCalculation->recalculateOrder($order);


echo '<pre>';
var_dump($order->getTotals()->getGrandTotal());
echo __CLASS__;
echo '<br/>';
echo __LINE__;
echo '<pre>';
die;
//        $transferUser = $this->createTransferUser();
//
//        $userEntity = $this->aclFacade->saveUser($transferUser);
//        $this->assertTrue($userEntity instanceof ProjectA_Zed_Library_Propel_BaseObject);
//        $this->assertTrue($userEntity->getIsNew());
//
//        $transferUser->setIdAclUser($userEntity->getIdAclUser());
//        $newName = 'AAAAA' . time();
//        $transferUser->setFirstname($newName);
//        $userEntity = $this->aclFacade->saveUser($transferUser);
//        $this->assertTrue($userEntity->getFirstname() === $newName);
    }

}
