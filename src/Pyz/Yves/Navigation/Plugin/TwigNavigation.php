<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Navigation\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;
use Twig_SimpleFunction;

/**
 * @method \Pyz\Client\Navigation\NavigationClientInterface getClient()
 * TODO: move to core level?
 */
class TwigNavigation extends AbstractPlugin implements TwigFunctionPluginInterface
{

    const TWIG_NAVIGATION_FUNCTION_NAME = 'spyNavigation';

    /**
     * @var string
     */
    protected $locale;

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        $this->locale = $application['locale'];

        return [
            new Twig_SimpleFunction(self::TWIG_NAVIGATION_FUNCTION_NAME, [$this, 'renderNavigation'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    /**
     * @param \Twig_Environment $twig
     * @param string $navigationKey
     * @param string $template
     *
     * @return string
     */
    public function renderNavigation(Twig_Environment $twig, $navigationKey, $template)
    {
        $navigationTreeTransfer = $this->getClient()->getNavigationByKey($navigationKey, $this->locale);

        if (!$navigationTreeTransfer || !$navigationTreeTransfer->getNavigation()->getIsActive()) {
            return '';
        }

        return $twig->render($template, [
            'navigationTree' => $navigationTreeTransfer,
        ]);
    }

}
