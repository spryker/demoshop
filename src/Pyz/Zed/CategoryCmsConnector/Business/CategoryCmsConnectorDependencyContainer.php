<?php

namespace Pyz\Zed\CategoryCmsConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\CategoryCmsConnectorBusiness;
use Pyz\Zed\CategoryCmsConnector\CategoryCmsConnectorDependencyProvider;
use Pyz\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer;
use Pyz\Zed\CmsBlock\Business\Internal\CmsBlockInstaller;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

/**
 * @method CategoryCmsConnectorBusiness getFactory()
 * @method CategoryCmsConnectorQueryContainer getQueryContainer()
 */
class CategoryCmsConnectorDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @param MessengerInterface $messenger
     *
     * @throws \ErrorException
     * @return CmsBlockInstaller
     */
    public function createCategoryCmsInstaller(MessengerInterface $messenger)
    {
        $categoryCmsInstaller = $this->getFactory()->createInternalCategoryCmsInstaller(
            $this->getProvidedDependency(CategoryCmsConnectorDependencyProvider::FACADE_CMS),
            $this->getQueryContainer()
        );
        $categoryCmsInstaller->setMessenger($messenger);

        return $categoryCmsInstaller;
    }

}
