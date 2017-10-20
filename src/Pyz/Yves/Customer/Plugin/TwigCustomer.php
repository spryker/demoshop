<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_SimpleFunction;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 */
class TwigCustomer extends AbstractPlugin implements TwigFunctionPluginInterface
{
    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new Twig_SimpleFunction('getUsername', function () {
                if (!$this->getClient()->isLoggedIn()) {
                    return null;
                }

                return $this->getClient()->getCustomer()->getEmail();
            }),
            new Twig_SimpleFunction('isLoggedIn', function () {
                return $this->getClient()->isLoggedIn();
            }),
        ];
    }
}
