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

class TwigCustomer extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @var CustomerClientInterface
     */
    private $customerClient;

    /**
     * @param CustomerClientInterface $customerClient
     *
     * @return $this
     */
    public function setCustomerClient(CustomerClientInterface $customerClient)
    {
        $this->customerClient = $customerClient;

        return $this;
    }

    /**
     * @param Application $application
     *
     * @return array
     */
    public function getFunctions(Application $application)
    {
        return [
            new Twig_SimpleFunction('getUsername', function () {
                if (!$this->customerClient->isLoggedIn()) {
                    return null;
                }

                return $this->customerClient->getCustomer()->getEmail();
            }),
            new Twig_SimpleFunction('isLoggedIn', function () {
                return $this->customerClient->isLoggedIn();
            }),
        ];
    }

}
