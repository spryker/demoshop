<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface as SprykerProductFacadeInterface;

interface ProductFacadeInterface extends SprykerProductFacadeInterface
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
