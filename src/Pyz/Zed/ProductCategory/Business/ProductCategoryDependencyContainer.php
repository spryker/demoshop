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
    public function createDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductCategoryMappingInstall(
            $this->createProductCategoryManager(),
            $this->createCategoryFacade(),
            $this->createProductFacade(),
            $this->createLocaleFacade(),
            $this->createCSVReader(),
            $this->createSettings()->getDemoDataCSVPath()
        );
        $installer->setLogger($logger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvFileReader();
    }

    /**
     * @return ProductCategorySettings
     */
    protected function createSettings()
    {
        return $this->factory->createProductCategorySettings();
    }
}
