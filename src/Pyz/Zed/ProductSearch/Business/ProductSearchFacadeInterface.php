<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductSearch\Business;

use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface as SprykerProductSearchFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

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
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
