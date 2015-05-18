<?php

namespace Pyz\Yves\Product\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Shared\Product\Model\AbstractProductInterface;

class ProductController extends AbstractController
{

    /**
     * @param AbstractProductInterface $product
     *
     * @return array
     */
    public function detailAction(AbstractProductInterface $product)
    {
        return ['product' => $product];
    }
}
