<?php

namespace Pyz\Yves\CmsBlock\Communication\Controller;

use Pyz\Yves\CmsBlock\Communication\CmsBlockDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method CmsBlockDependencyContainer getDependencyContainer()
 */
class BlockPageController extends AbstractController
{

    /**
     * @param array $pageData
     * @param Request $request
     *
     * @return JsonResponse|Response
     */
    public function indexAction(array $pageData, Request $request)
    {
        $edit = $request->get('edit') ? (bool) $request->get('edit') : false;

        $parameters = [
            'placeholders' => $pageData['placeholders'],
            'edit' => $edit,
            'blocks' => $this->fetchBlocks($pageData, $request)
        ];

        if ($request->isXmlHttpRequest()) {
           return $this->jsonResponse($parameters);
        }

        return $this->renderView($pageData['template'], $parameters);
    }

    /**
     * @param array $pageData
     * @param Request $request
     *
     * @return array
     */
    protected function fetchBlocks(array $pageData, Request $request)
    {
        return $this->getDependencyContainer()
            ->createBlockHandler()
            ->fetchBlocks($pageData, $request)
        ;
    }

}
