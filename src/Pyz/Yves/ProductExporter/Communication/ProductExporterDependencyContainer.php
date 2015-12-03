<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductExporter\Communication;

use Pyz\Yves\ProductExporter\Communication\Builder\FrontendProductBuilder;
use Pyz\Yves\ProductExporter\Communication\ResourceCreator\ProductResourceCreator;
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
        return new ProductResourceCreator(
            $this->createFrontendProductBuilder(),
            $this->getLocator()
        );
    }

    /**
     * @return Builder\FrontendProductBuilder
     */
    protected function createFrontendProductBuilder()
    {
        return new FrontendProductBuilder($this->getFactory());
    }

}
