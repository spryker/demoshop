<?php

namespace Pyz\Yves\Redirect\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
