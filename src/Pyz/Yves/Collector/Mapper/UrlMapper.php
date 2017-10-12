<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

class UrlMapper implements UrlMapperInterface
{
    /**
     * @param array $mergedParameters
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters)
    {
        if (!$mergedParameters) {
            return '';
        }

        return '?' . http_build_query($mergedParameters);
    }
}
