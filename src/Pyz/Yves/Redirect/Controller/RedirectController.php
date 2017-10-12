<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Redirect\Controller;

use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;

class RedirectController extends AbstractController
{
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INACTIVE;

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
