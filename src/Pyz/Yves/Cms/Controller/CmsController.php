<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Controller;

use DateTime;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CmsController extends AbstractController
{

    /**
     * @param array $meta
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageAction($meta, Request $request)
    {
        $edit = (bool)$request->get('edit', false);

        if (!$meta['is_active']) {
            throw new NotFoundHttpException();
        }

        if (!$this->isPageTodayActive($meta)) {
            throw new NotFoundHttpException();
        }

        return $this->renderView($meta['template'], [
            'placeholders' => $meta['placeholders'],
            'edit' => $edit,
            'page_title' => $meta['meta_title'],
            'page_description' => $meta['meta_description'],
            'page_keywords' => $meta['meta_keywords'],
        ]);
    }

    /**
     * @param array $meta
     *
     * @return bool
     */
    protected function isPageTodayActive(array $meta)
    {
        $currentDate = new DateTime();
        if (isset($meta['valid_from']) && isset($meta['valid_to'])) {

            $validFrom = new DateTime($meta['valid_from']);
            $validTo = new DateTime($meta['valid_to']);

            if ($currentDate >= $validFrom && $currentDate <= $validTo) {
                return true;
            }

            return false;
        }

        return true;
    }

}
