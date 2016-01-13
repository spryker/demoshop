<?php

namespace Pyz\Yves\Glossary\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\Glossary\GlossaryFactory;
use Silex\Application;
use Spryker\Client\Glossary\GlossaryClientInterface;

/**
 * @method GlossaryFactory getFactory()
 * @method GlossaryClientInterface getClient()
 */
class TranslationServiceProvider extends AbstractServiceProvider
{

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['translator'] = $app->share(function ($app) {
            $twigTranslator = $this->getFactory()->createTwigTranslator(
                $this->getClient(), $app['locale']
            );

            return $twigTranslator;
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }

}
