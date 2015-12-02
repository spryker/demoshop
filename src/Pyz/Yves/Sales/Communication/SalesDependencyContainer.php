<?php

namespace Pyz\Yves\Sales\Communication;

use SprykerFeature\Zed\Sales\Communication\Table\OrdersTable;
use SprykerFeature\Zed\Sales\Communication\Form\OrderItemSplitForm\Collection;
use SprykerFeature\Zed\Sales\Communication\Form\AddressForm;
use SprykerFeature\Zed\Sales\Communication\Form\CustomerForm;
use SprykerFeature\Zed\Sales\Communication\Form\OrderItemSplitForm;
use Pyz\Yves\Sales\Communication\Form\Order;
use Pyz\Yves\Sales\Communication\Form\BillingAddress;
use Pyz\Yves\Sales\Communication\Form\ShippingAddress;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class SalesDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return object
     */
    public function createOrderTypeForm()
    {
        return new Order(
            $this->getLocator(),
            $this->createBillingAddressTypeForm(),
            $this->createShippingAddressTypeForm()
        );
    }

    /**
     * @return BillingAddress
     */
    protected function createBillingAddressTypeForm()
    {
        return new BillingAddress($this->getLocator());
    }

    /**
     * @return ShippingAddress
     */
    protected function createShippingAddressTypeForm()
    {
        return new ShippingAddress($this->getLocator());
    }

    /**
     * @return Form\OrderItemSplitForm
     */
    public function getOrderItemSplitForm()
    {
        return new OrderItemSplitForm();
    }

    /**
     * @param int $idSalesOrder
     *
     * @return CustomerForm
     */
    public function createCustomerForm($idSalesOrder)
    {
        $customerQuery = $this->getQueryContainer()->querySalesOrderById($idSalesOrder);

        return new CustomerForm($customerQuery);
    }

    /**
     * @param int $idOrderAddress
     *
     * @return AddressForm
     */
    public function createAddressForm($idOrderAddress)
    {
        $addressQuery = $this->getQueryContainer()->querySalesOrderAddressById($idOrderAddress);

        return new AddressForm($addressQuery);
    }

    /**
     * @param ObjectCollection $orderItems
     *
     * @return Collection
     */
    public function getOrderItemSplitFormCollection(\Propel\Runtime\Collection\ObjectCollection $orderItems)
    {
        return new Collection($orderItems);
    }

    /**
     * @return OrdersTable
     */
    public function createOrdersTable()
    {
        $orderQuery = $this->getQueryContainer()->querySalesOrder();
        $orderItemQuery = $this->getQueryContainer()->querySalesOrderItem();

        return new OrdersTable($orderQuery, $orderItemQuery);
    }

}
