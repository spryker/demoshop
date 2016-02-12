<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductSearch\Business;

use Psr\Log\LoggerInterface;

interface ProductSearchFacadeInterface
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
