<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface as SprykerProductSearchFacadeInterface;

interface ProductSearchFacadeInterface extends SprykerProductSearchFacadeInterface
{

    /**
     * @param mixed $data
     * @param string $locale
     *
     * @return string
     */
    public function buildProductKey($data, $locale);

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
