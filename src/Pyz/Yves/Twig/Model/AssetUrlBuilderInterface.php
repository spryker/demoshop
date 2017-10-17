<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Model;

interface AssetUrlBuilderInterface
{
    /**
     * @param string $assetPath
     *
     * @throws \Exception
     *
     * @return string
     */
    public function buildUrl($assetPath);
}
