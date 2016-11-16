<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer\ProductSearch;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchAttributeInstaller extends AbstractInstaller
{

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[] $importerCollection
     * @param string $dataDirectory
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     */
    public function __construct(array $importerCollection, $dataDirectory, ProductSearchFacadeInterface $productSearchFacade)
    {
        parent::__construct($importerCollection, $dataDirectory);

        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new CsvBatchIterator($this->getCsvDataFilename());
    }

    /**
     * @return string
     */
    protected function getCsvDataFilename()
    {
        return $this->dataDirectory . '/product_search_attributes.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search Attributes';
    }

    /**
     * @return void
     */
    protected function afterInstall()
    {
        $this->productSearchFacade->touchProductAbstractByAsynchronousAttributes();
        $this->productSearchFacade->touchProductSearchConfigExtension();
    }

}
