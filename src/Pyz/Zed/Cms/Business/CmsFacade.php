<?php

namespace Pyz\Zed\Cms\Business;

use Generated\Shared\Category\NodeInterface;
use Generated\Shared\Cms\PageInterface;
use Generated\Shared\Product\AbstractProductInterface;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\CmsToCategoryInterface;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class CmsFacade extends SprykerCmsFacade implements CmsToCategoryInterface
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param NodeInterface $nodeTransfer
     * @return PageInterface
     */
    public function getPageByCategoryNode(NodeInterface $nodeTransfer)  {
        return $this->getDependencyContainer()->getPageManager()->getPageByCategoryNode($nodeTransfer);
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return PageInterface
     */
    public function getOrCreatePageByAbstractProduct(AbstractProductInterface $abstractProductTransfer)  {
        return $this->getDependencyContainer()->getPageManager()->getOrCreatePageByAbstractProduct($abstractProductTransfer);
    }
}
