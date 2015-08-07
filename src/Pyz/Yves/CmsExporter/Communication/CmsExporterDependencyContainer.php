<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\CmsExporter\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CmsExporterCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\CmsExporter\Communication\ResourceCreator\PageResourceCreator;

/**
 * @method CmsExporterCommunication getFactory()
 */
class CmsExporterDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getFactory()->createResourceCreatorPageResourceCreator(
            $this->getLocator()
        );
    }

}
