<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Url\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;

class TwigUrl extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new \Twig_SimpleFunction('url', function (array $context, $identifier, $params = []) use ($application) {
                $currentLocale = mb_substr($application['locale'], 0, 2);

                $path = $application->path($identifier, $params);
                $url = $application->url('home');

                if ($path !== '/') {
                    $url .= $currentLocale . $path;
                    
                    return $url;
                }

                $url = $url . $currentLocale . '/' . $identifier;

                return $url;
            }),
        ];
    }

}
