<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Spryker\Shared\Kernel\Store;

class LanguageServiceProvider extends AbstractServiceProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $languages = $this->getLanguages();
        $this->addGlobalTemplateVariable($app, [
            'availableLanguages' => $languages,
            'currentLanguage' => Store::getInstance()->getCurrentLanguage(),
        ]);
    }

    /**
     * @return string[]
     */
    protected function getLanguages()
    {
        $locales = Store::getInstance()->getLocales();
        $languages = [];

        foreach ($locales as $locale) {
            $languages[] = substr($locale, 0, strpos($locale, '_'));
        }

        return $languages;
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

}
