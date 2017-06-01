<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Controller;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Spryker\Client\Cart\CartClient;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DetailController extends AbstractController
{

    const PARAM_ATTRIBUTE = 'attribute';

    /**
     * @param \Generated\Shared\Transfer\ProductSetStorageTransfer $productSetStorageTransfer
     * @param \Generated\Shared\Transfer\StorageProductTransfer[] $storageProductTransfers
     *
     * @return array
     */
    public function indexAction(ProductSetStorageTransfer $productSetStorageTransfer, array $storageProductTransfers, Request $request)
    {
        // TODO: extract POST block (maybe even to cart module)
        if ($request->isMethod(Request::METHOD_POST)) {
            $skus = $request->request->get('skus');

            $itemTransfers = [];
            foreach ($skus as $sku) {
                $itemTransfer = new ItemTransfer();
                $itemTransfer
                    ->setSku($sku)
                    ->setQuantity(1);
                $itemTransfers[] = $itemTransfer;
            }

            $cartClient = new CartClient(); // TODO: get from dependency provider
            $quoteTransfer = $cartClient->addItems($itemTransfers);
            $cartClient->storeQuote($quoteTransfer);

            $this->addSuccessMessage('OK'); // TODO: get messages from Zed
            return $this->redirectResponseInternal('cart');
        }

        // TODO: availability has to be checked for each product in the set

        return $this->viewResponse([
            'productSet' => $productSetStorageTransfer,
            'storageProducts' => $storageProductTransfers,
        ]);
    }

}
