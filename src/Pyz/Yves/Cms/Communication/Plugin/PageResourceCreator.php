<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Cms\Communication\CmsDependencyContainer;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class PageResourceCreator extends AbstractPlugin
{

    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getDependencyContainer()->createPageResourceCreator();
    }

}
