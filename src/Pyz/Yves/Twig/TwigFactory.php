<?php

namespace Pyz\Yves\Twig;

use Silex\Application;
use Spryker\Shared\Config;
use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Twig\Model\YvesExtension;
use Pyz\Yves\Twig\Model\UrlParameterCacheBuster;
use Pyz\Yves\Twig\Model\MediaUrlBuilder;
use Pyz\Yves\Twig\Model\AssetUrlBuilder;
use Spryker\Shared\Application\ApplicationConstants;
use Pyz\Yves\Twig\Model\AssetUrlBuilderInterface;
use Pyz\Yves\Twig\Model\CacheBusterInterface;
use Pyz\Yves\Twig\Model\MediaUrlBuilderInterface;

class TwigFactory extends AbstractFactory
{

    /**
     * @var TwigSettings
     */
    private $settings;

    /**
     * @param Application $application
     *
     * @return YvesExtension
     */
    public function createYvesTwigExtension(Application $application)
    {
        return new YvesExtension($application, $this->getSettings());
    }

    /**
     * @retrun TwigSettings
     */
    protected function getSettings()
    {
        if (!isset($this->settings)) {
            $this->settings = new TwigSettings($this->getLocator());
        }

        return $this->settings;
    }

    /**
     * @param bool $isDomainSecured
     *
     * @return AssetUrlBuilderInterface
     */
    public function createAssetUrlBuilder($isDomainSecured = false)
    {
        $host = Config::get(ApplicationConstants::HOST_STATIC_ASSETS);

        if ($isDomainSecured) {
            $host = Config::get(ApplicationConstants::HOST_SSL_STATIC_ASSETS);
        }

        return new AssetUrlBuilder($host, $this->createCacheBuster());
    }

    /**
     * @param bool $isDomainSecured
     *
     * @return MediaUrlBuilderInterface
     */
    public function createMediaUrlBuilder($isDomainSecured = false)
    {
        $host = Config::get(ApplicationConstants::HOST_STATIC_MEDIA);

        if ($isDomainSecured) {
            $host = Config::get(ApplicationConstants::HOST_SSL_STATIC_MEDIA);
        }

        return new MediaUrlBuilder($host);
    }

    /**
     * @return CacheBusterInterface
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
