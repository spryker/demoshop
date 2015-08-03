<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductExporter\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\ProductExporterCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

/**
 * Class ProductExportDependencyContainer
 */
class ProductExporterDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @var ProductExporter
     */
    protected $factory;

    /**
     * @return ResourceCreator\ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return $this->getFactory()->createResourceCreatorProductResourceCreator(
            $this->createFrontendProductBuilder(),
            $this->getLocator()
        );
    }

    /**
     * @return Builder\FrontendProductBuilder
     */
    protected function createFrontendProductBuilder()
    {
        return $this->getFactory()->createBuilderFrontendProductBuilder($this->getFactory());
    }

}
