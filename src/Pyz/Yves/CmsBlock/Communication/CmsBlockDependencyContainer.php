<?php

namespace Pyz\Yves\CmsBlock\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CmsBlockCommunication;
use Pyz\Yves\CmsBlock\Communication\Handler\BlockHandler;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\CmsExporter\Communication\ResourceCreator\PageResourceCreator;

/**
 * @method CmsBlockCommunication getFactory()
 */
class CmsBlockDependencyContainer extends AbstractCommunicationDependencyContainer
{
    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getFactory()->createResourceCreatorBlockPageResourceCreator(
            $this->getLocator()
        );
    }

    /**
     * @return BlockHandler
     */
    public function createBlockHandler()
    {
       return $this->getFactory()->createManagerBlockManager(
           $this->createSettings()->getBlockDataProviderPlugins()
       );
    }

    /**
     * @return CmsBlockSettings
     */
    protected function createSettings()
    {
        return $this->getFactory()->createCmsBlockSettings(
            $this->getLocator()
        );
    }
}
