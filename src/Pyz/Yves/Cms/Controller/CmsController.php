<?php

namespace Pyz\Yves\Cms\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CmsController extends AbstractController
{

    /**
     * @param array $meta
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageAction($meta, Request $request)
    {
        $edit = (bool)$request->get('edit', false);

        return $this->renderView($meta['template'], ['placeholders' => $meta['placeholders'], 'edit' => $edit]);
    }

}
