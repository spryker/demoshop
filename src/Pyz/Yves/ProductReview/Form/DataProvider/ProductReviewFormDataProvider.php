<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Form\DataProvider;

use Generated\Shared\Transfer\ProductReviewRequestTransfer;

class ProductReviewFormDataProvider
{
    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\ProductReviewRequestTransfer
     */
    public function getData($idProductAbstract)
    {
        $productReviewTransfer = new ProductReviewRequestTransfer();
        $productReviewTransfer->setIdProductAbstract($idProductAbstract);

        return $productReviewTransfer;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            'data_class' => ProductReviewRequestTransfer::class,
        ];
    }
}
