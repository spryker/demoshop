<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductSearchAttribute\Hook;

use Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\DataImport\Business\Model\DataImporterAfterImportInterface;

class ProductSearchAfterImportHook implements DataImporterAfterImportInterface
{
    /**
     * @var \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     */
    public function __construct(ProductSearchFacadeInterface $productSearchFacade)
    {
        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return void
     */
    public function afterImport()
    {
        $this->productSearchFacade->touchProductAbstractByAsynchronousAttributes();
        $this->productSearchFacade->touchProductSearchConfigExtension();
    }
}
