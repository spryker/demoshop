<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\DataBuilder\ProductReviewBuilder;
use Generated\Shared\Transfer\ProductReviewTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\ProductReview\ProductReviewClientInterface getClient()
 */
class SubmitController extends AbstractController
{

    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INACTIVE;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request)
    {
        // TODO: build $productReviewTransfer from request
        $productReviewTransfer = (new ProductReviewBuilder([
            ProductReviewTransfer::CUSTOMER_REFERENCE => 'foo',
            ProductReviewTransfer::FK_PRODUCT_ABSTRACT => 1,
        ]))->build();

        $productReviewTransfer = $this->getClient()->submitCustomerReview($productReviewTransfer);

        return $this->jsonResponse($productReviewTransfer->toArray());
    }

}
