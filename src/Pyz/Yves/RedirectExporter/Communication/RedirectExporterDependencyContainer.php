<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\RedirectExporter\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\RedirectExporterCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\RedirectExporter\Communication\ResourceCreator\RedirectResourceCreator;

/**
 * @method RedirectExporter getFactory()
 */
class RedirectExporterDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return $this->getFactory()->createResourceCreatorRedirectResourceCreator(
            $this->getLocator()
        );
    }

}
