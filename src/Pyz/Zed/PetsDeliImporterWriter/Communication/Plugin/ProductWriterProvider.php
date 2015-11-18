<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Communication\Plugin;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\Business\PetsDeliImporterWriterFacade;
use Pyz\Zed\ProductDynamicImporterWriter\Business\ProductDynamicImporterWriterFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method PetsDeliImporterWriterFacade getFacade
 */
class ProductWriterProvider extends AbstractPlugin
{

    /**
     * @return ProductWriterProviderInterface[]
     */
    public function getProvider()
    {
        return $this->getFacade()->getProductWriterProvider();
    }

}