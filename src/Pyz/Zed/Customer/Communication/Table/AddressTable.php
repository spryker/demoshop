<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Customer\Communication\Table;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerAddressTableMap;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Zed\Customer\Dependency\Service\CustomerToUtilSanitizeInterface;
use Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class AddressTable extends AbstractTable
{
    const ACTIONS = 'Actions';

    const DEFAULT_BILLING_ADDRESS = 'default_billing_address';
    const DEFAULT_SHIPPING_ADDRESS = 'default_shipping_address';

    const COL_COMPANY = 'Company';

    /**
     * @var \Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface
     */
    protected $customerQueryContainer;

    /**
     * @var int
     */
    protected $idCustomer;

    /**
     * @var \Spryker\Zed\Customer\Dependency\Service\CustomerToUtilSanitizeInterface
     */
    protected $utilSanitize;

    /**
     * @param \Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface $customerQueryContainer
     * @param int $idCustomer
     * @param \Spryker\Zed\Customer\Dependency\Service\CustomerToUtilSanitizeInterface $utilSanitize
     */
    public function __construct(
        CustomerQueryContainerInterface $customerQueryContainer,
        $idCustomer,
        CustomerToUtilSanitizeInterface $utilSanitize
    ) {
        $this->customerQueryContainer = $customerQueryContainer;
        $this->idCustomer = $idCustomer;
        $this->utilSanitize = $utilSanitize;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS => '#',
            SpyCustomerAddressTableMap::COL_SALUTATION => 'Salutation',
            SpyCustomerAddressTableMap::COL_FIRST_NAME => 'First Name',
            SpyCustomerAddressTableMap::COL_LAST_NAME => 'Last Name',
            SpyCustomerAddressTableMap::COL_ADDRESS1 => 'Address ',
            SpyCustomerAddressTableMap::COL_ADDRESS2 => 'Address (2nd line)',
            SpyCustomerAddressTableMap::COL_ADDRESS3 => 'Address (3rd line)',
            SpyCustomerAddressTableMap::COL_COMPANY => 'Company',
            SpyCustomerAddressTableMap::COL_ZIP_CODE => 'Zip Code',
            SpyCustomerAddressTableMap::COL_CITY => 'City',
            self::COL_COMPANY => 'Country',
            self::ACTIONS => 'Actions',
        ]);

        $config->addRawColumn(self::ACTIONS);
        $config->addRawColumn(SpyCustomerAddressTableMap::COL_ADDRESS1);

        $config->setSortable([
            SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS,
            SpyCustomerAddressTableMap::COL_FIRST_NAME,
            SpyCustomerAddressTableMap::COL_LAST_NAME,
            SpyCustomerAddressTableMap::COL_ZIP_CODE,
            SpyCustomerAddressTableMap::COL_FK_COUNTRY,
        ]);

        $config->setSearchable([
            SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS,
            SpyCustomerAddressTableMap::COL_LAST_NAME,
            SpyCustomerAddressTableMap::COL_FIRST_NAME,
            SpyCustomerAddressTableMap::COL_ADDRESS1,
            SpyCustomerAddressTableMap::COL_ADDRESS2,
            SpyCustomerAddressTableMap::COL_ADDRESS3,
            SpyCustomerAddressTableMap::COL_ZIP_CODE,
        ]);

        $config->setUrl(sprintf('table?id-customer=%d', $this->idCustomer));

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Propel\Runtime\Collection\ObjectCollection
     */
    protected function prepareData(TableConfiguration $config)
    {
        $query = $this->customerQueryContainer->queryAddresses()
            ->filterByFkCustomer($this->idCustomer)
            ->leftJoinCountry('country')
            ->withColumn('country.name', self::COL_COMPANY);
        $lines = $this->runQuery($query, $config);

        $customer = $this->customerQueryContainer->queryCustomers()->findOneByIdCustomer($this->idCustomer);

        $defaultBillingAddress = $defaultShippingAddress = false;
        if ($customer !== null) {
            $customer = $customer->toArray();

            $defaultBillingAddress = !empty($customer[self::DEFAULT_BILLING_ADDRESS]) ? $customer[self::DEFAULT_BILLING_ADDRESS] : false;
            $defaultShippingAddress = !empty($customer[self::DEFAULT_SHIPPING_ADDRESS]) ? $customer[self::DEFAULT_SHIPPING_ADDRESS] : false;
        }

        if (!empty($lines)) {
            foreach ($lines as $key => $value) {
                $id = !empty($value[SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS]) ? $value[SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS] : false;

                $tags = [];
                if ((is_bool($id) === false) && ($id === $defaultBillingAddress)) {
                    $tags[] = '<span class="label label-danger" title="Default billing address">BILLING</span>';
                }
                if ((is_bool($id) === false) && ($id === $defaultShippingAddress)) {
                    $tags[] = '<span class="label label-danger" title="Default shipping address">SHIPPING</span>';
                }

                $address = $this->utilSanitize->escapeHtml($lines[$key][SpyCustomerAddressTableMap::COL_ADDRESS1]);
                $lines[$key][SpyCustomerAddressTableMap::COL_ADDRESS1] = (!empty($tags) ? implode('&nbsp;', $tags) . '&nbsp;' : '') . $address;

                $lines[$key][self::ACTIONS] = $this->buildLinks($value);
            }
        }

        return $lines;
    }

    /**
     * @param array $details
     *
     * @return string
     */
    protected function buildLinks(array $details)
    {
        $buttons = [];

        $idCustomerAddress = !empty($details[SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS])
            ? $details[SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS]
            : null;

        if ($idCustomerAddress !== null) {
            $buttons[] = $this->generateEditButton(sprintf('/customer/address/edit?%s=%d', CustomerConstants::PARAM_ID_CUSTOMER_ADDRESS, $idCustomerAddress), 'Edit');
        }

        return implode(' ', $buttons);
    }
}
