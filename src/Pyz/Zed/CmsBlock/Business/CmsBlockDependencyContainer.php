<?php

namespace Pyz\Zed\CmsBlock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\CmsBlockBusiness;
use PavFeature\Zed\CmsBlock\Business\CmsBlockDependencyContainer as PavFeatureCmsBlockDependencyContainer;
use Pyz\Zed\CmsBlock\Business\Internal\CmsBlockInstaller;
use Pyz\Zed\CmsBlock\CmsBlockConfig;
use Pyz\Zed\CmsBlock\CmsBlockDependencyProvider;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;

/**
 * @method CmsBlockBusiness getFactory()
 * @method CmsBlockConfig getConfig()
 */
class CmsBlockDependencyContainer extends PavFeatureCmsBlockDependencyContainer
{

    /**
     * @param MessengerInterface $messenger
     *
     * @throws \ErrorException
     * @return CmsBlockInstaller
     */
    public function createCmsBlockInstaller(MessengerInterface $messenger)
    {
        $cmsBlockInstaller = $this->getFactory()->createInternalCmsBlockInstaller(
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_URL),
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_LOCALE),
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_TOUCH),
            $this->createBlockWriter()
        );
        $cmsBlockInstaller->setMessenger($messenger);

        return $cmsBlockInstaller;
    }
}
