<?php

namespace Pyz\Yves\Product\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Shared\Product\Model\ProductInterface;

class ProductController extends \SprykerCore\Yves\Application\Communication\Controller\AbstractController
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
