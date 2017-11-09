<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Customer\Communication\Table;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerAddressTableMap;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Service\UtilDateTime\UtilDateTimeServiceInterface;
use Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class CartTable extends AbstractTable
{
    const ACTIONS = 'Actions';

    const PRODUCT_NAME = 'name';
    const PRICE = 'Price';

    /**
     * @var \Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface
     */
    protected $customerQueryContainer;

    /**
     * @var \Spryker\Service\UtilDateTime\UtilDateTimeServiceInterface
     */
    protected $utilDateTimeService;
    /**
     * @var int
     */
    private $idCustomer;

    /**
     * @param \Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface $customerQueryContainer
     * @param \Spryker\Service\UtilDateTime\UtilDateTimeServiceInterface $utilDateTimeService
     * @param int $idCustomer
     */
    public function __construct(
        CustomerQueryContainerInterface $customerQueryContainer,
        UtilDateTimeServiceInterface $utilDateTimeService,
        int $idCustomer
    )
    {
        $this->customerQueryContainer = $customerQueryContainer;
        $this->utilDateTimeService = $utilDateTimeService;
        $this->idCustomer = $idCustomer;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            'name' => self::PRODUCT_NAME,
            'quantity' => 'quantity',
            'price' => self::PRICE,
            'total' => 'total',
        ]);

        $config->setUrl('table?id-customer=' . $this->idCustomer);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config)
    {
        $query = $this->prepareQuery();

        $quote = $this->runQuery($query, $config, true);

        if ($quote->count() < 1) {
            return [];
        }

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->fromArray(json_decode($quote->getFirst()->getQuoteTransfer(), true));
        $items = $quoteTransfer->getItems();

        return $this->prepareItemsData((array) $items);
    }

    /**
     * @param array $items
     *
     * @return array
     */
    protected function prepareItemsData(array $items)
    {
        $data = [];

        foreach ($items as $key => $item) {
            $item = $item->toArray(true);
            $data[] = [
                'name' => $item['name'],
                'price' => $item['unit_gross_price'] / 100,
                'quantity' => $item['quantity'],
                'total' => $item['sum_price'] / 100,
            ];
        }

        return $data;
    }

    /**
     * @return \Orm\Zed\Customer\Persistence\SpyCustomerQuery
     */
    protected function prepareQuery()
    {
        $query = $this->customerQueryContainer->queryCart($this->idCustomer);

        return $query;
    }
}
