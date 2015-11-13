<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\AfterBootExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\Library\Application\Environment;

class LocaleBootExtension implements AfterBootExtensionInterface
{
    /**
     * @param Application $app
     */
    public function afterBoot(Application $app)
    {
        $store = Store::getInstance();
        $store->setCurrentLocale(current($store->getLocales()));
        $app['locale'] = $store->getCurrentLocale();

        if (!array_key_exists('REQUEST_URI', $_SERVER)) {
            return;
        }

        $requestUrI = $_SERVER['REQUEST_URI'];
        $identifier = mb_substr($requestUrI,1,2);

        if ($identifier !== false && array_key_exists($identifier,$store->getLocales())) {
            $store->setCurrentLocale($store->getLocales()[$identifier]);
            $app['locale'] = $store->getCurrentLocale();

            Environment::initializeLocale($store->getCurrentLocale());
        }
    }
}
