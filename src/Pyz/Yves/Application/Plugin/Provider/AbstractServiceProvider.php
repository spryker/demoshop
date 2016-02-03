<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Generated\Client\Ide\AutoCompletion;
use Pyz\Yves\Application\ApplicationFactory;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\Kernel\Locator;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
abstract class AbstractServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param \Silex\Application $app
     * @param \Twig_Extension[] $twigExtensions
     *
     * @return void
     */
    protected function addTwigExtension(Application $app, array $twigExtensions)
    {
        $app['twig'] = $app->share(
            $app->extend('twig', function (\Twig_Environment $twig) use ($twigExtensions) {
                foreach ($twigExtensions as $extension) {
                    $twig->addExtension($extension);
                }

                return $twig;
            })
        );
    }

    /**
     * @param \Silex\Application $app
     * @param array $globalTemplateVariables
     *
     * @return void
     */
    protected function addGlobalTemplateVariable(Application $app, array $globalTemplateVariables)
    {
        $app['twig.global.variables'] = $app->share(
            $app->extend('twig.global.variables', function (array $variables) use ($globalTemplateVariables) {
                return array_merge($variables, $globalTemplateVariables);
            })
        );
    }

    /**
     * @return \Generated\Client\Ide\AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

}
