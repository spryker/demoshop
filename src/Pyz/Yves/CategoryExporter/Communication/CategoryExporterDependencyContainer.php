<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\CategoryExporter\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CategoryExporterCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\CategoryExporter\Communication\ResourceCreator\CategoryResourceCreator;

class CategoryExporterDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @var CategoryExporterCommunication
     */
    protected $factory;

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->getFactory()->createResourceCreatorCategoryResourceCreator($this->getLocator());
    }

}
