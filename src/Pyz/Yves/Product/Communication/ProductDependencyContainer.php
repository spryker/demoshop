<?php

namespace Pyz\Yves\Product\Communication;

use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Product\Service\ProductClient;

class ProductDependencyContainer extends AbstractCommunicationDependencyContainer
{
    /**
     * @return BlockHandler
     */
    public function createBlockHandler()
    {
       return $this->getLocator()->cmsBlock()->pluginBlockHandlerCreator()->createBlockHandler();
    }

    /**
     * @return ProductClient
     */
    public function createProductClient()
    {
        return $this->getLocator()->product()->client();
    }
}
