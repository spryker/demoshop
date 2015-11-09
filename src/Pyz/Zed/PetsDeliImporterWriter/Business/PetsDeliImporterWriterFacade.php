<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method PetsDeliImporterWriterDependencyContainer getDependencyContainer()
 */
class PetsDeliImporterWriterFacade extends AbstractFacade
{

    /**
     * @return ProductWriterProviderInterface
     */
    public function getProductWriterProvider()
    {
        return $this->getDependencyContainer()->getProductWriterProvider();

    }


}