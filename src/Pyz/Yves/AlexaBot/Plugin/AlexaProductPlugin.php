<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;

/**
 * @method \Pyz\Yves\AlexaBot\AlexaBotFactory getFactory()
 */
class AlexaProductPlugin extends AbstractPlugin implements AlexaProductPluginInterface
{

    /**
     * @param int $abstractId
     * @throws ContainerKeyNotFoundException
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId)
    {
        $storageProductTransfer = $this->getStorageProduct($abstractId);
        return $storageProductTransfer->getSuperAttributes()['variant'];
    }

    /**
     * @param int $abstractId
     * @param string $variantName
     * @throws ContainerKeyNotFoundException
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName)
    {
        $selectedAttributes = ['variant' => $variantName];

        $storageProductTransfer = $this->getStorageProduct($abstractId, $selectedAttributes);
        return $storageProductTransfer->getSku();
    }

    /**
     * @param string $concreteSku
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku)
    {
        // Add the item and save the quote with session ID
        // \Spryker\Client\Cart\CartClientInterface::addItem

        return true;
    }

    /**
     * @return bool
     */
    public function performCheckout()
    {
        // Create CheckoutObject from Cart
        // \Spryker\Client\Cart\CartClient::getQuote BY SESSION ID

        return true;

    }

    /**
     * @param $abstractId
     * @param array $selectedAttributes
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     * @throws ContainerKeyNotFoundException
     */
    protected function getStorageProduct($abstractId, $selectedAttributes = [])
    {
        $productData = $this
            ->getFactory()
            ->getProductClient()
            ->getProductAbstractFromStorageByIdForCurrentLocale(
                $abstractId
            );

        $storageProductTransfer = $this->getFactory()
            ->createStorageProductMapper()
            ->mapStorageProduct($productData, []);

        return $storageProductTransfer;
    }
}
