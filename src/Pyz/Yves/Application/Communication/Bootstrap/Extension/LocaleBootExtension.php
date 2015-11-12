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
        // TODO default one
        Store::getInstance()->setCurrentLocale(current(Store::getInstance()->getLocales()));
        $app['locale'] = Store::getInstance()->getCurrentLocale();

        // TODO: Session way
//       $locale = $app['session']->get('locale');


        // TODO: Segment, Sub-domain and query-string way
        if (!array_key_exists('REQUEST_URI', $_SERVER)) {
            return;
        }

        $requestUrI = $_SERVER['REQUEST_URI'];
        $identifier = mb_substr($requestUrI,1,2);

        if ($identifier !== false && array_key_exists($identifier,Store::getInstance()->getLocales())) {
            Store::getInstance()->setCurrentLocale(Store::getInstance()->getLocales()[$identifier]);
            $app['locale'] = Store::getInstance()->getCurrentLocale();

            Environment::initializeLocale(Store::getInstance()->getCurrentLocale());
        }
    }
}
