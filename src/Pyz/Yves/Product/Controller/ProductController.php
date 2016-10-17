<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Controller;

use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class ProductController extends AbstractController
{

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function detailAction(StorageProductTransfer $storageProductTransfer)
    {
        $categories = $storageProductTransfer->getCategories();

        $productData = [
            'product' => $storageProductTransfer,
            'productCategories' => $categories,
            'category' => count($categories) ? end($categories) : null,
        ];

        return $productData;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->getApplication()['request'];
    }

}
