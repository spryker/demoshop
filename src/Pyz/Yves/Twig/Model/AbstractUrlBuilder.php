<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Model;

use Silex\Application;

abstract class AbstractUrlBuilder
{

    /**
     * @var string
     */
    private $staticHost;

    /**
     * @param string $staticHost
     */
    public function __construct($staticHost)
    {
        $this->staticHost = $staticHost;
    }

    /**
     * @param string $assetPath
     *
     * @return string
     */
    public function buildUrl($assetPath)
    {
        $mediaPath = $this->getStaticHost();

        return '//' . $mediaPath . $this->addTrailingSlash($assetPath) . $assetPath;
    }

    /**
     * @return string
     */
    public function getStaticHost()
    {
        return $this->staticHost;
    }

    /**
     * @param string $urlPart
     *
     * @return string
     */
    private function addTrailingSlash($urlPart)
    {
        return (($urlPart[0] === '/') ? '' : '/');
    }

}
