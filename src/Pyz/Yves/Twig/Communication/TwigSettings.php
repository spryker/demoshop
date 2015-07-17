<?php

namespace Pyz\Yves\Twig\Communication;

use SprykerFeature\Yves\Twig\Communication\TwigSettings as SprykerTwigSettings;

class TwigSettings extends SprykerTwigSettings
{

    /**
     * @return {@inheritdoc}
     */
    public function getTwigFilters()
    {
        $twigFilters = parent::getTwigFilters();

        $twigFilters[] = $this->getLocator()->price()->pluginTwigPrice();

        return $twigFilters;
    }

    /**
     * @return {@inheritdoc}
     */
    public function getTwigFunctions()
    {
        $twigFunctions = parent::getTwigFunctions();

        $twigCustomer = $this->getLocator()->customer()->pluginTwigCustomer()
            ->setCustomerClient($this->getLocator()->customer()->client())
        ;
        $twigFunctions[] = $twigCustomer;
        $twigFunctions[] = $this->getLocator()->assets()->pluginTwigAsset();

        return $twigFunctions;
    }

}
