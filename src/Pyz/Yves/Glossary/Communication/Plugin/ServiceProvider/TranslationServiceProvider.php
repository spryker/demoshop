<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary\Communication\Plugin\ServiceProvider;

use Pyz\Yves\Glossary\Communication\GlossaryDependencyContainer;
use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
 */
class TranslationServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @var GlossaryClientInterface
     */
    private $glossaryClient;

    /**
     * @param GlossaryClientInterface $glossaryClient
     *
     * @return $this
     */
    public function setGlossaryClient(GlossaryClientInterface $glossaryClient)
    {
        $this->glossaryClient = $glossaryClient;

        return $this;
    }

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['translator'] = $app->share(function ($app) {
            $twigTranslator = $this->getDependencyContainer()->createTwigTranslator(
                $this->glossaryClient, $app['locale']
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
