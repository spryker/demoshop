<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Redirect\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

class RedirectController extends AbstractController
{

    /**
     * @param array $meta
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectAction($meta)
    {
        return $this->redirectResponseExternal(
            $meta['to_url'],
            $meta['status']
        );
    }

}
