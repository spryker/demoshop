<?php

namespace Pyz\Yves\Application\Communication\Plugin\BlockController;

use PavFeature\Yves\Tracking\Business\ContentGroupConstants;
use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Tracking\Business\Tracking;

class StartPageBlockController extends AbstractPlugin implements BlockControllerInterface
{
    const START_PAGE = 'start_page';

    /**
     * @return string
     */
    public function getTemplateType()
    {
        return self::START_PAGE;
    }

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request)
    {
        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_HOME)
            ->addContentGroupElement(ContentGroupConstants::CONTENT_GROUP_HOMEPAGE)
        ;
    }
}
