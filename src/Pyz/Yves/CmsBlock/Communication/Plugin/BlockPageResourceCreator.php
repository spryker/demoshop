<?php

namespace Pyz\Yves\CmsBlock\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\CmsBlock\Communication\CmsBlockDependencyContainer;

/**
 * @method CmsBlockDependencyContainer getDependencyContainer()
 */
class BlockPageResourceCreator extends AbstractPlugin
{

    /**
     * @return BlockPageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getDependencyContainer()->createPageResourceCreator();
    }

}
