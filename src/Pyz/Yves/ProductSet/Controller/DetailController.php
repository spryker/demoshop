<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Controller;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;

class DetailController extends AbstractController
{

    /**
     * @param \Generated\Shared\Transfer\ProductSetStorageTransfer $productSetStorageTransfer
     *
     * @return array
     */
    public function indexAction(ProductSetStorageTransfer $productSetStorageTransfer)
    {
        return $this->viewResponse([
            'productSet' => $productSetStorageTransfer,
        ]);
    }

}
