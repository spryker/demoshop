<?php

namespace Pyz\Zed\Sales\Communication\Table;

use Orm\Zed\Adyen\Persistence\Base\PavPaymentAdyen;
use Orm\Zed\Adyen\Persistence\Map\PavPaymentAdyenTableMap;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderTableMap;
use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use SprykerFeature\Zed\Sales\Communication\Table\OrdersTable as SprykerOrdersTable;

class OrdersTable extends SprykerOrdersTable
{

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            SpySalesOrderTableMap::COL_ID_SALES_ORDER => 'Order Id',
            SpySalesOrderTableMap::COL_ORDER_REFERENCE => 'Order Ref.',
            SpySalesOrderTableMap::COL_CREATED_AT => 'Timestamp',
            SpySalesOrderTableMap::COL_EMAIL => 'Email',
            SpySalesOrderTableMap::COL_FIRST_NAME => 'Billing Name',
            SpySalesOrderTableMap::COL_GRAND_TOTAL => 'Value',
            PavPaymentAdyenTableMap::COL_PAYMENT_METHOD => 'Payment Method',
            PavPaymentAdyenTableMap::COL_PSP_REFERENCE => 'Payment Ref.',
            SpySalesOrderTableMap::COL_FK_CUSTOMER => 'Customer Id',
            self::URL => 'Url',
        ]);
        $config->setSearchable([
            SpySalesOrderTableMap::COL_EMAIL,
            SpySalesOrderTableMap::COL_FIRST_NAME,
            SpySalesOrderTableMap::COL_GRAND_TOTAL,
            PavPaymentAdyenTableMap::COL_PAYMENT_METHOD,
            SpySalesOrderTableMap::COL_ORDER_REFERENCE,
        ]);
        $config->setSortable([
            SpySalesOrderTableMap::COL_CREATED_AT,
        ]);

        return $config;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config)
    {
        $query = $this->getModifiedQuery();
        $queryResults = $this->runQuery($query, $config);

        $results = [];
        foreach ($queryResults as $item) {
            $results[] = [
                SpySalesOrderTableMap::COL_ID_SALES_ORDER => $item[SpySalesOrderTableMap::COL_ID_SALES_ORDER],
                SpySalesOrderTableMap::COL_ORDER_REFERENCE => $item[SpySalesOrderTableMap::COL_ORDER_REFERENCE],
                SpySalesOrderTableMap::COL_CREATED_AT => (new \DateTime($item[SpySalesOrderTableMap::COL_CREATED_AT]))->format('d.m.Y H:i:s'),
                SpySalesOrderTableMap::COL_EMAIL => $item[SpySalesOrderTableMap::COL_EMAIL],
                SpySalesOrderTableMap::COL_FIRST_NAME => $item[SpySalesOrderTableMap::COL_FIRST_NAME] . ' ' . $item[SpySalesOrderTableMap::COL_LAST_NAME],
                SpySalesOrderTableMap::COL_GRAND_TOTAL => $this->formatPrice($item[SpySalesOrderTableMap::COL_GRAND_TOTAL]),
                PavPaymentAdyenTableMap::COL_PAYMENT_METHOD => $this->mapPaymentMethod($item['payment_method']),
                PavPaymentAdyenTableMap::COL_PSP_REFERENCE => $item['payment_psp_reference'],
                SpySalesOrderTableMap::COL_FK_CUSTOMER => sprintf(
                    '<a class="btn btn-primary btn-sm" href="/customer/view/?id_customer=%d"> ' . $item[SpySalesOrderTableMap::COL_FK_CUSTOMER] . '</a>',
                    $item[SpySalesOrderTableMap::COL_FK_CUSTOMER]
                ),
                self::URL => sprintf(
                    '<a class="btn btn-primary btn-sm" href="/sales/details/?id-sales-order=%d">View</a>',
                    $item[SpySalesOrderTableMap::COL_ID_SALES_ORDER]
                ),
            ];
        }
        unset($queryResults);

        return $results;
    }

    /**
     * @return SpySalesOrderQuery
     */
    protected function getModifiedQuery()
    {
        $query = $this->salesQuery;
        $query->orderByIdSalesOrder(Criteria::DESC);
        $query->leftJoinPavPaymentAdyen()
            ->withColumn(PavPaymentAdyenTableMap::COL_PAYMENT_METHOD, 'payment_method')
            ->withColumn(PavPaymentAdyenTableMap::COL_PSP_REFERENCE, 'payment_psp_reference');

        return $query;
    }

    /**
     * @param string $paymentMethod
     * @return string
     */
    protected function mapPaymentMethod($paymentMethod)
    {
        switch ($paymentMethod) {
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE :
                return 'Credit Card';
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA :
                return 'Sepa';
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SOFORTUEBERWEISUNG :
                return 'Sofort';
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL :
                return 'PayPal';
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GERMAN_BANK_TRANSFER :
                return 'PrePayment';
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_OPEN_INVOICE_KLARNA :
                return 'Klarna';
        }
    }

}
