<?php

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
        return [
            'product' => $product,
            'category' => count($product->getCategory()) ? current($product->getCategory()) : null,
        ];
    }

}
