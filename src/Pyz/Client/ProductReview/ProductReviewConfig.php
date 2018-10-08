<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductReview;

use Spryker\Client\ProductReview\ProductReviewConfig as ProductReviewProductReviewConfig;

class ProductReviewConfig extends ProductReviewProductReviewConfig
{
    public const PAGINATION_DEFAULT_ITEMS_PER_PAGE = 3;
    public const PAGINATION_VALID_ITEMS_PER_PAGE = [
        3,
    ];
}
