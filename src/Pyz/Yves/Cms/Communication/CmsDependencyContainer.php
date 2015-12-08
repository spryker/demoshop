<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CmsCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\Cms\Communication\ResourceCreator\PageResourceCreator;

class CmsDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return new PageResourceCreator(
            $this->getLocator()
        );
    }

}
