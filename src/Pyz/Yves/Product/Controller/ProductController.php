<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Controller;

use Spryker\Shared\Product\Model\ProductAbstractInterface;
use Spryker\Yves\Application\Controller\AbstractController;

class ProductController extends AbstractController
{

    /**
     * @param \Spryker\Shared\Product\Model\ProductAbstractInterface $product
     *
     * @return array
     */
    public function detailAction(ProductAbstractInterface $product)
    {
        $categories = $product->getCategory();

        $abstractAttributes = $this->useLocalIcecatImages(
            $product->getAbstractAttributes()
        );

        $product->setAbstractAttributes($abstractAttributes);

        $productData = [
            'product' => $product,
            'category' => count($categories) ? end($categories) : null,
        ];

        return $productData;
    }

    /**
     * TODO this won't be needed when https://github.com/spryker/spryker/issues/1634 is finished
     *
     * @param array $attributes
     *
     * @return array
     */
    protected function useLocalIcecatImages(array $attributes)
    {
        $attributes['image_big'] = 'big_'. basename($attributes['image_big']);
        $attributes['image_small'] = 'small_'. basename($attributes['image_small']);
        return $attributes;
    }

}
