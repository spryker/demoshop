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
        // TODO: Session way
//        $app['session']->set('locale', 'de');
//        dump($app['session']->get('locale'));die;

        // TODO: Segment, Sub-domain and query-string way
        $requestUrI = $_SERVER['REQUEST_URI'];
        $identifier = substr($requestUrI,1,2);

        if($identifier !== false && array_key_exists($identifier,Store::getInstance()->getLocales())) {
            // TODO: set locale to store
            Store::getInstance()->setCurrentLocale(Store::getInstance()->getLocales()[$identifier]);
            $app['locale'] = Store::getInstance()->getCurrentLocale();

            return;
        }

        // TODO default one
        Store::getInstance()->setCurrentLocale(current(Store::getInstance()->getLocales()));
        $app['locale'] = Store::getInstance()->getCurrentLocale();

        Environment::initializeLocale(Store::getInstance()->getCurrentLocale());

    }
}
