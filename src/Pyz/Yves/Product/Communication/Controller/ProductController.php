<?php

namespace Pyz\Yves\Product\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Shared\Product\Model\ProductInterface;

class ProductController extends AbstractController
{

    /**
     * @param ProductInterface $product
     *
     * @return array
     */
    public function detailAction(ProductInterface $product)
    {
        return ['product' => $product];
    }
}
