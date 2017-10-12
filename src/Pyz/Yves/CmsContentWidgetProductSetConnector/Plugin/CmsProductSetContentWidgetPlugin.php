<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductSetConnector\Plugin;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Pyz\Yves\ProductSet\Controller\DetailController;
use Spryker\Yves\CmsContentWidgetProductSetConnector\Plugin\CmsProductSetContentWidgetPlugin as SprykerCmsProductSetContentWidgetPlugin;

/**
 * @method \Pyz\Yves\CmsContentWidgetProductSetConnector\CmsContentWidgetProductSetConnectorFactory getFactory()
 */
class CmsProductSetContentWidgetPlugin extends SprykerCmsProductSetContentWidgetPlugin
{
    /**
     * @param array $context
     * @param \Generated\Shared\Transfer\ProductSetStorageTransfer $productSetStorageTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer[]
     */
    protected function mapStorageProducts(array $context, ProductSetStorageTransfer $productSetStorageTransfer)
    {
        $storageProductTransfers = [];
        foreach ($productSetStorageTransfer->getIdProductAbstracts() as $idProductAbstract) {
            $productAbstractData = $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);

            $storageProductTransfers[] = $this->getFactory()->getStorageMapperPlugin()->mapStorageProduct(
                $productAbstractData,
                $this->getSelectedAttributes($context, $idProductAbstract)
            );
        }

        return $storageProductTransfers;
    }

    /**
     * @param array $context
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getSelectedAttributes(array $context, $idProductAbstract)
    {
        $attributes = $this->getRequest($context)->query->get(DetailController::PARAM_ATTRIBUTE, []);

        return isset($attributes[$idProductAbstract]) ? array_filter($attributes[$idProductAbstract]) : [];
    }

    /**
     * @param array $context
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest(array $context)
    {
        return $context['app']['request'];
    }
}
