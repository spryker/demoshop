<?php

namespace Pyz\Zed\CmsBlock\Business;

use Generated\Shared\Cms\PageInterface;
use Generated\Shared\CmsBlock\BlockInterface;
use PavFeature\Zed\CmsBlock\Business\CmsBlockFacade as PavFeatureCmsBlockFacade;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;

/**
 * @method CmsBlockDependencyContainer getDependencyContainer
 */
class CmsBlockFacade extends PavFeatureCmsBlockFacade
{

    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createCmsBlockInstaller($messenger)->install();
    }

    /**
     * @param $pageTransfer
     * @return BlockInterface[]
     */
    public function getCmsBlocksForPage(PageInterface $pageTransfer)
    {
        return $this->getDependencyContainer()->createBlockReader()->getByPage($pageTransfer);
    }

}
