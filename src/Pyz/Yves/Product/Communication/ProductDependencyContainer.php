<?php

namespace Pyz\Yves\Product\Communication;

use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class ProductDependencyContainer extends AbstractCommunicationDependencyContainer
{
    /**
     * @return BlockHandler
     */
    public function createBlockHandler()
    {
       return $this->getLocator()->cmsBlock()->pluginBlockHandlerCreator()->createBlockHandler();
    }

}
