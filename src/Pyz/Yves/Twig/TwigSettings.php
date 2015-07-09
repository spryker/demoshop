<?php

namespace Pyz\Yves\Twig;

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

        $twigFunctions[] = $this->getLocator()->assets()->pluginTwigAsset();
        $twigFunctions[] = $this->getLocator()->customer()->pluginTwigCustomer();

        return $twigFunctions;
    }

}
