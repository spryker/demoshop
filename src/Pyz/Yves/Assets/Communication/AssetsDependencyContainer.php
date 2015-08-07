<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\AssetsCommunication;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\Assets\Communication\Model\AssetUrlBuilderInterface;
use Pyz\Yves\Assets\Communication\Model\CacheBusterInterface;
use Pyz\Yves\Assets\Communication\Model\MediaUrlBuilderInterface;

/**
 * @method AssetsCommunication getFactory()
 */
class AssetsDependencyContainer extends AbstractCommunicationDependencyContainer
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
        $host = Config::get(SystemConfig::HOST_STATIC_ASSETS);

        if ($isDomainSecured) {
            $host = Config::get(SystemConfig::HOST_SSL_STATIC_ASSETS);
        }

        return $this->getFactory()->createModelAssetUrlBuilder($host, $this->createCacheBuster());
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
        $host = Config::get(SystemConfig::HOST_STATIC_MEDIA);

        if ($isDomainSecured) {
            $host = Config::get(SystemConfig::HOST_SSL_STATIC_MEDIA);
        }

        return $this->getFactory()->createModelMediaUrlBuilder($host);
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

        return $this->getFactory()->createModelUrlParameterCacheBuster($cacheBust);
    }

}
