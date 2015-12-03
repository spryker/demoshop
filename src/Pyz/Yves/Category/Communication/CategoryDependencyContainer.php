<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Category\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CategoryCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\Category\Communication\ResourceCreator\CategoryResourceCreator;

class CategoryDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @var CategoryCommunication
     */
    protected $factory;

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return new CategoryResourceCreator($this->getLocator());
    }

}
