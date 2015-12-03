<?php

namespace Pyz\Zed\Cms\Business;

use Generated\Shared\Category\NodeInterface;
use Generated\Shared\Cms\PageInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Transfer\PageTransfer;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Cms\Business\Exception\MissingPageException;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\CmsToCategoryInterface;
use PavFeature\Zed\Cms\Business\CmsFacade as PavCmsFacade;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class CmsFacade extends PavCmsFacade implements CmsToCategoryInterface
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

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return PageInterface
     */
    public function getPageByAbstractProduct(AbstractProductInterface $abstractProductTransfer)
    {
        return $this->getDependencyContainer()->getPageManager()->getPageByAbstractProduct($abstractProductTransfer);
    }

    /**
     * @param PageTransfer $pageTransfer
     *
     * @throws MissingPageException
     *
     * @return PageTransfer
     */
    public function savePage(PageTransfer $pageTransfer)
    {
        return $this->getDependencyContainer()->getPageManager()->savePage($pageTransfer);
    }
}
