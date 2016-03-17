<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Collector\CollectorFactory getFactory()
 */
class UrlMapperPlugin extends AbstractPlugin
{

    /**
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters, $addTrailingSlash = false)
    {
        return $this
            ->getFactory()
            ->createUrlMapper()
            ->generateUrlFromParameters($mergedParameters, $addTrailingSlash);
    }

    /**
     * @param array $requestParameters
     * @param array $generationParameters
     *
     * @return array
     */
    public function mergeParameters(array $requestParameters, array $generationParameters)
    {
        return $this
            ->getFactory()
            ->createParameterMerger()
            ->mergeParameters($requestParameters, $generationParameters);
    }

    /**
     * @param string $pathInfo
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request)
    {
        $this
            ->getFactory()
            ->createRequestParameterInjector()
            ->injectParametersFromUrlIntoRequest($pathInfo, $request);
    }

}
