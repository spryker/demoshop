<?php

namespace Pyz\Yves\CmsBlock\Communication\Plugin;

use Pyz\Yves\CmsBlock\Communication\CmsBlockDependencyContainer;
use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

/**
 * @method CmsBlockDependencyContainer getDependencyContainer()
 */
class BlockHandlerCreator extends AbstractPlugin
{

    /**
     * @return BlockHandler
     */
    public function createBlockHandler()
    {
        return $this->getDependencyContainer()->createBlockHandler();
    }

}
