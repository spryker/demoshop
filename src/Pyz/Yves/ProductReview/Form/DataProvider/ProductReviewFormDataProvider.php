<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Form\DataProvider;

use Generated\Shared\Transfer\ProductReviewTransfer;

class ProductReviewFormDataProvider
{

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\ProductReviewTransfer
     */
    public function getData($idProductAbstract)
    {
        $productReviewTransfer = new ProductReviewTransfer();
        $productReviewTransfer->setFkProductAbstract($idProductAbstract);

        return $productReviewTransfer;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            'data_class' => ProductReviewTransfer::class,
        ];
    }

}
