<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Symfony\Component\HttpFoundation\Request;

interface RequestParameterInjectorInterface
{

    /**
     * @param string $pathInfo
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request);

}
