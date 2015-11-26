<?php

namespace Pyz\Zed\MailchimpNewsletterCustomerPlugin\Business\Providers;

use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerAddressTableMap;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\Newsletter\Persistence\Map\SpyNewsletterSubscriberTableMap;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderTableMap;
use SprykerFeature\Zed\Customer\Persistence\CustomerQueryContainer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class MergeVariableProvider implements MergeVariableProviderInterface
{

    private $customerQueryContainer;
    private $email;

    /**
     * @param CustomerQueryContainer $customerQueryContainer
     * @param string $email
     */
    public function __construct(CustomerQueryContainer $customerQueryContainer, $email)
    {
        $this->customerQueryContainer = $customerQueryContainer;
        $this->email = $email;
    }

    /**
     * @param $email
     * @return \Orm\Zed\Customer\Persistence\SpyCustomer[]|\Propel\Runtime\Collection\ObjectCollection
     */
    public function getCustomerInfo($email)
    {
        return $this->customerQueryContainer->queryCustomers()
            ->addJoin(
                SpyCustomerTableMap::COL_EMAIL,
                SpyNewsletterSubscriberTableMap::COL_EMAIL,
                Criteria::INNER_JOIN
            )
            ->addJoin(
                SpyCustomerTableMap::COL_ID_CUSTOMER,
                SpyCustomerAddressTableMap::COL_FK_CUSTOMER,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCustomerAddressTableMap::COL_FK_COUNTRY,
                SpyCountryTableMap::COL_ID_COUNTRY,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCustomerTableMap::COL_ID_CUSTOMER,
                SpySalesOrderTableMap::COL_FK_CUSTOMER,
                Criteria::LEFT_JOIN
            )
            ->withColumn(
                SpyCustomerTableMap::COL_ID_CUSTOMER,
                'customerId'
            )
            ->withColumn(
                SpyNewsletterSubscriberTableMap::COL_EMAIL,
                'email'
            )
            ->withColumn(
                SpyCustomerAddressTableMap::COL_CITY,
                'city'
            )
            ->withColumn(
                SpyCountryTableMap::COL_ISO2_CODE,
                'country'
            )
            ->withColumn(
                SpySalesOrderTableMap::COL_ID_SALES_ORDER,
                'orderId'
            )
            ->withColumn(
                SpySalesOrderTableMap::COL_CREATED_AT,
                'orderDate'
            )
            ->withColumn(
                SpySalesOrderTableMap::COL_GRAND_TOTAL,
                'orderTotal'
            )
            ->orderBy(SpyCustomerTableMap::COL_ID_CUSTOMER, Criteria::ASC)
            ->findByEmail($email);

    }

    /**
     * @return array
     */
    public function getMergeVars()
    {

        if($this->getCustomerInfo($this->email))
        {
            $orderIds = [];
            $lastOrderDate = '';
            $lastOrderGrossRevenue = 0;
            $lifetimeGrossRevenue = 0;
            $lifetimeOrderCount = 0;

            $customerId = '';
            $country = '';
            $city = '';

            foreach($this->getCustomerInfo($this->email) as $customerInfo)
            {
                $customerId = $customerInfo->getVirtualColumn('customerId');
                $country = $customerInfo->getVirtualColumn('country');
                $city = $customerInfo->getVirtualColumn('city');
                $lastOrderDate = $customerInfo->getVirtualColumn('orderDate');
                $lastOrderGrossRevenue = $customerInfo->getVirtualColumn('orderTotal');
                $orderId = $customerInfo->getVirtualColumn('orderId');

                if(in_array($orderId, $orderIds) === false)
                {
                    $orderIds[] = $orderId;
                    $lifetimeGrossRevenue += $lastOrderGrossRevenue;
                    $lifetimeOrderCount++;
                }
            }

            $currencyFormatter = CurrencyManager::getInstance();

            //if equal to 0 we want the field to be empty on mailchimp
            if($lastOrderGrossRevenue === 0)
            {
                $lastOrderGrossRevenue = '';
            }
            else
            {
                $lastOrderGrossRevenue = $currencyFormatter->convertCentToDecimal($lastOrderGrossRevenue);
            }

            if($lifetimeGrossRevenue === 0)
            {
                $lifetimeGrossRevenue = '';
            }
            else
            {
                $lifetimeGrossRevenue = $currencyFormatter->convertCentToDecimal($lifetimeGrossRevenue);
            }

            if($lifetimeOrderCount === 0)
            {
                $lifetimeOrderCount = '';
            }

            return [
                'MMERGE11' => $customerId, //Customer ID
                'MMERGE12' => $country, //Country
                'MMERGE13' => $city, //City
                'MMERGE14' => $lastOrderDate, //Last Order Date
                'MMERGE15' => $lastOrderGrossRevenue, //Last order gross revenue
                'MMERGE16' => $lifetimeGrossRevenue, //Lifetime gross revenue
                'MMERGE17' => $lifetimeOrderCount, //Lifetime # orders
            ];
        }
        else
        {
            return [];
        }
    }
}
