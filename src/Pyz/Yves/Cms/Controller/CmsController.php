<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
