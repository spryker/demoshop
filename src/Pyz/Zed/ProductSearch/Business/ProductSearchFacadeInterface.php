<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

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
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
