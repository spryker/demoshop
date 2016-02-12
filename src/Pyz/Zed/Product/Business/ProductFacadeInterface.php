<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Product\Business;

use Psr\Log\LoggerInterface;

interface ProductFacadeInterface
{

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData);

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData);

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
