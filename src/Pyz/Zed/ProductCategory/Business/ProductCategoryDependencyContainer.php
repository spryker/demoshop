<?php

namespace Pyz\Zed\ProductCategory\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCategoryBusiness;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Library\Import\ReaderInterface;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall;
use ProjectA\Zed\ProductCategory\Business\ProductCategoryDependencyContainer as CoreDependencyContainer;

class ProductCategoryDependencyContainer extends CoreDependencyContainer
{

    /**
     * @var ProductCategoryBusiness
     */
    protected $factory;

    /**
     * @param LoggerInterface $logger
     *
     * @return ProductCategoryMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductCategoryMappingInstall(
            $this->getProductCategoryManager(),
            $this->getCategoryFacade(),
            $this->getProductFacade(),
            $this->getLocaleFacade(),
            $this->getCSVReader(),
            $this->getCSVPath()
        );
        $installer->setLogger($logger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    protected function getCSVReader()
    {
        return new CsvFileReader();
    }

    protected function getCSVPath()
    {
        return __DIR__ . '/Internal/DemoData/demo-product-category-data.csv';
    }
}
