<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Communication\Plugin;

use SprykerFeature\Client\Customer\Service\CustomerClientInterface;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Twig_SimpleFunction;

/**
 * @method CustomerClientInterface getClient()
 */
class TwigCustomer extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return array
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
