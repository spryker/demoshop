<?php
namespace Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task;

use ProjectA\Zed\Catalog\Component\Model\Composite\ProductComposite;
use ProjectA\Zed\Catalog\Component\Model\Import\Product\Writer\Workflow\Context;
use ProjectA\Zed\Catalog\Component\Model\Import\Product\Writer\Workflow\Task\AbstractTask;

class AddStatusTask extends AbstractTask
{

    const PRODUCT_DATA_KEY_STATUS = 'status';

    /**
     * @param ProductComposite $product
     * @param array $productData
     * @param Context $context
     */
    public function __invoke(ProductComposite $product, array $productData, Context $context)
    {
        if (isset($productData[self::PRODUCT_DATA_KEY_STATUS])) {
            $product->setStatus($productData[self::PRODUCT_DATA_KEY_STATUS]);
        }
    }

}
