<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Provider;

use Generated\Yves\Ide\AutoCompletion;
use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Kernel\Locator;

abstract class AbstractServiceProvider implements ServiceProviderInterface
{

    /**
     * @param Application $app
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
     * @param Application $app
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
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

}
