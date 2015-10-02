<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\System\Communication;

use Pyz\Yves\Heartbeat\Communication\Plugin\Ambulance;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class SystemDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return Ambulance
     */
    public function createAmbulance()
    {
        return $this->getLocator()->heartbeat()->pluginAmbulance();
    }

}
