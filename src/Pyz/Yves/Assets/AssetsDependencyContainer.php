<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets;

use Pyz\Yves\Assets\Model\UrlParameterCacheBuster;
use Pyz\Yves\Assets\Model\MediaUrlBuilder;
use Pyz\Yves\Assets\Model\AssetUrlBuilder;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Library\Config;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use Pyz\Yves\Assets\Model\AssetUrlBuilderInterface;
use Pyz\Yves\Assets\Model\CacheBusterInterface;
use Pyz\Yves\Assets\Model\MediaUrlBuilderInterface;

class AssetsDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @param bool $isDomainSecured
     *
     * @throws \Exception
     *
     * @return AssetUrlBuilderInterface
     */
    public function createAssetUrlBuilder($isDomainSecured = false)
    {
        $host = Config::get(ApplicationConfig::HOST_STATIC_ASSETS);

        if ($isDomainSecured) {
            $host = Config::get(ApplicationConfig::HOST_SSL_STATIC_ASSETS);
        }

        return new AssetUrlBuilder($host, $this->createCacheBuster());
    }

    /**
     * @param bool $isDomainSecured
     *
     * @throws \Exception
     *
     * @return MediaUrlBuilderInterface
     */
    public function createMediaUrlBuilder($isDomainSecured = false)
    {
        $host = Config::get(ApplicationConfig::HOST_STATIC_MEDIA);

        if ($isDomainSecured) {
            $host = Config::get(ApplicationConfig::HOST_SSL_STATIC_MEDIA);
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
