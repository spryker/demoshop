<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig;

use Pyz\Yves\Twig\Model\AssetUrlBuilder;
use Pyz\Yves\Twig\Model\MediaUrlBuilder;
use Pyz\Yves\Twig\Model\UrlParameterCacheBuster;
use Pyz\Yves\Twig\Model\YvesExtension;
use Spryker\Yves\Kernel\Application;
use Spryker\Yves\Twig\TwigFactory as SprykerTwigFactory;

class TwigFactory extends SprykerTwigFactory
{
    /**
     * @var \Pyz\Yves\Twig\TwigSettings
     */
    private $settings;

    /**
     * @param \Spryker\Yves\Kernel\Application $application
     *
     * @return \Pyz\Yves\Twig\Model\YvesExtension
     */
    public function createYvesTwigExtension(Application $application)
    {
        return new YvesExtension($application, $this->getSettings());
    }

    /**
     * @return \Pyz\Yves\Twig\TwigSettings
     */
    protected function getSettings()
    {
        if (!isset($this->settings)) {
            $this->settings = $this->createTwigSettings();
        }

        return $this->settings;
    }

    /**
     * @return \Pyz\Yves\Twig\TwigSettings
     */
    protected function createTwigSettings()
    {
        return new TwigSettings();
    }

    /**
     * @param string $host
     *
     * @return \Pyz\Yves\Twig\Model\AssetUrlBuilderInterface
     */
    public function createAssetUrlBuilder($host)
    {
        return new AssetUrlBuilder($host, $this->createCacheBuster());
    }

    /**
     * @param string $host
     *
     * @return \Pyz\Yves\Twig\Model\MediaUrlBuilderInterface
     */
    public function createMediaUrlBuilder($host)
    {
        return new MediaUrlBuilder($host);
    }

    /**
     * @return \Pyz\Yves\Twig\Model\CacheBusterInterface
     */
    protected function createCacheBuster()
    {
        $cacheBust = 'dev';
        $hashFile = APPLICATION_ROOT_DIR . '/config/Yves/cache_bust.php';

        if (file_exists($hashFile)) {
            $cacheBust = file_get_contents($hashFile);
        }

        return new UrlParameterCacheBuster($cacheBust);
    }
}
