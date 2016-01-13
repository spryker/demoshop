<?php

namespace Pyz\Yves\Product\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Product\Model\ProductAbstractInterface;

class ProductController extends AbstractController
{

    /**
     * @param ProductAbstractInterface $product
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
