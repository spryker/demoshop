<?php

namespace Pyz\Yves\Glossary\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\Glossary\GlossaryFactory;
use Silex\Application;
use Spryker\Client\Glossary\GlossaryClientInterface;

/**
 * @method \Pyz\Yves\Glossary\GlossaryFactory getFactory()
 * @method \Spryker\Client\Glossary\GlossaryClientInterface getClient()
 */
class TranslationServiceProvider extends AbstractServiceProvider
{

    /**
     * @param \Silex\Application $app
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
     * @param \Silex\Application $app
     */
    public function boot(Application $app)
    {
    }

}
