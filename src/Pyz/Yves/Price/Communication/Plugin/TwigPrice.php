<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Price\Communication\Plugin;

use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFilterPluginInterface;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;

class TwigPrice extends AbstractPlugin implements TwigFilterPluginInterface, TwigFunctionPluginInterface
{

    /**
     * @return \Twig_SimpleFilter[]
     */
    public function getFilters()
    {
        return [
            $this->getPriceFilter(),
            $this->getPriceRawFilter(),
        ];
    }

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new \Twig_SimpleFunction('getItemTotalPrice', function ($grossPrice, $quantity = 1) {
               return $grossPrice * $quantity;
            }),
        ];
    }

    /**
     * @return \Twig_SimpleFilter
     */
    private function getPriceFilter()
    {
        return new \Twig_SimpleFilter('price', function ($priceValue, $withSymbol = true) {
            $priceValue = CurrencyManager::getInstance()->convertCentToDecimal($priceValue);

            return CurrencyManager::getInstance()->format($priceValue, $withSymbol);
        });
    }

    /**
     * @return \Twig_SimpleFilter
     */
    private function getPriceRawFilter()
    {
        return new \Twig_SimpleFilter('priceRaw', function ($priceValue) {
            $priceValue = CurrencyManager::getInstance()->convertCentToDecimal($priceValue);

            return $priceValue;
        });
    }

}
