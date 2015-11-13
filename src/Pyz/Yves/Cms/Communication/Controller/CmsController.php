<?php

namespace Pyz\Yves\Cms\Communication\Controller;

use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Tracking\Business\Tracking;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsController extends AbstractController
{

    /**
     * @param array $meta
     * @param Request $request
     *
     * @return Response
     */
    public function pageAction($meta, Request $request)
    {
        $edit = $request->get('edit') ? (bool) $request->get('edit') : false;

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_STATIC)
        ;

        return $this->renderView($meta['template'], ['placeholders' => $meta['placeholders'], 'edit' => $edit]);
    }

}
