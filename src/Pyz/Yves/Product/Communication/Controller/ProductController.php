<?php

namespace Pyz\Yves\Product\Communication\Controller;

use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Tracking\Business\DataFormatter\ProductDataFormatter;
use Pyz\Yves\Tracking\Business\Tracking;
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
        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_PRODUCT_DETAIL)
            ->setByKey(ProductDataFormatter::PRODUCT, ProductDataFormatter::formatProduct($product))
        ;

        return [
            'product' => $product,
            'category' => count($product->getCategory()) ? current($product->getCategory()) : null,
        ];
    }

}
