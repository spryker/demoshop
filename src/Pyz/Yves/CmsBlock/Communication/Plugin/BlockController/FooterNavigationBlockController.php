<?php

namespace Pyz\Yves\CmsBlock\Communication\Plugin\BlockController;

use Pyz\Yves\CmsBlock\Dependency\Plugin\BlockControllerInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

class FooterNavigationBlockController  extends AbstractPlugin implements BlockControllerInterface
{

    const TEMPLATE_TYPE = 'footer_navigation';

    /**
     * @return string
     */
    public function getTemplateType()
    {
        return self::TEMPLATE_TYPE;
    }

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request)
    {
        return [];
    }
}
