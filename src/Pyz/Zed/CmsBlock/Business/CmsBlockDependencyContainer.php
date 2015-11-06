<?php

namespace Pyz\Zed\CmsBlock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\CmsBlockBusiness;
use PavFeature\Zed\CmsBlock\Business\CmsBlockDependencyContainer as PavFeatureCmsBlockDependencyContainer;
use Pyz\Zed\Cms\CmsBlockDependencyProvider;

/**
 * @method CmsBlockBusiness getFactory()
 */
class CmsBlockDependencyContainer extends PavFeatureCmsBlockDependencyContainer
{

    /**
     * @throws \ErrorException
     * @return Internal\CmsBlockInstaller
     */
    public function createCmsBlockInstaller()
    {
        return $this->getFactory()->createInternalCmsBlockInstaller(
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_URL),
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_LOCALE),
            $this->getProvidedDependency(CmsBlockDependencyProvider::FACADE_TOUCH),
            $this->createBlockWriter()
        );
    }

}
