<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\BeforeBootExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Shared\Config;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Library\DataDirectory;
use SprykerFeature\Shared\Library\Environment;
use SprykerFeature\Shared\Yves\YvesConfig;
use Symfony\Component\HttpFoundation\Request;

class BeforeBootExtension implements BeforeBootExtensionInterface
{

    /**
     * @param Application $app
     */
    public function beforeBoot(Application $app)
    {
        $app['locale'] = Store::getInstance()->getCurrentLocale();
        if (Config::get(ApplicationConfig::ENABLE_WEB_PROFILER, false)) {
            $app['profiler.cache_dir'] = DataDirectory::getLocalStoreSpecificPath('cache/profiler');
        }
        $proxies = Config::get(YvesConfig::YVES_TRUSTED_PROXIES);

        Request::setTrustedProxies($proxies);
    }

}
