<?php

/**
 * (c) Spryker Systems GmbH copyright protected.
 */
namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\AfterBootExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\Library\Application\Environment;

class LocaleBootExtension implements AfterBootExtensionInterface
{

    const REQUEST_URI = 'REQUEST_URI';
    const LOCALE = 'locale';

    /**
     * @param Application $app
     *
     * @return void
     */
    public function afterBoot(Application $app)
    {
        $store = Store::getInstance();
        $store->setCurrentLocale(current($store->getLocales()));
        $app[self::LOCALE] = $store->getCurrentLocale();

        if (!array_key_exists(self::REQUEST_URI, $_SERVER)) {
            return;
        }

        $requestUrI = $_SERVER[self::REQUEST_URI];
        $identifier = mb_substr($requestUrI, 1, 2);

        if ($identifier !== false && array_key_exists($identifier, $store->getLocales())) {
            $store->setCurrentLocale($store->getLocales()[$identifier]);
            $app[self::LOCALE] = $store->getCurrentLocale();

            Environment::initializeLocale($store->getCurrentLocale());
        }
    }

}
