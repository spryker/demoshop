<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use Generated\Yves\Ide\AutoCompletion;
use SprykerEngine\Yves\Kernel\Locator;

class LocatorAwareExtension
{

    /**
     * @return AutoCompletion
     */
    public function getLocator()
    {
        return Locator::getInstance();
    }

}
