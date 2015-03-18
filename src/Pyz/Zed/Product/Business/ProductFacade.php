<?php


namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\ProductFacade as CoreProductFacade;
use ProjectA\Zed\ProductFrontendExporterConnector\Dependency\Facade\ProductFrontendExporterToProductInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use Psr\Log\LoggerInterface;

class ProductFacade extends CoreProductFacade implements
    ProductFrontendExporterToProductInterface,
    ProductSearchToProductInterface
{
    /**
     * @var ProductDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->dependencyContainer->getProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->dependencyContainer->getProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($logger)->install();
    }
}
