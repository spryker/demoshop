<?php

namespace Pyz\Yves\Cms\Communication\Plugin;

use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

class TwigGlobalKeyValue extends AbstractPlugin implements TwigFunctionPluginInterface
{
    protected $keyValue = [];

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {

        return [
            new \Twig_SimpleFunction('setGlobalValue', function ($key, $value) {
                $this->keyValue[$key] = $value;
            }),
            new \Twig_SimpleFunction('getGlobalValue', function ($key) {
                if (array_key_exists($key, $this->keyValue)) {
                    return $this->keyValue[$key];
                }
                return null;
            }),
            new \Twig_SimpleFunction('hasGlobalValue', function ($key) {
                return array_key_exists($key, $this->keyValue);
            }),
        ];
    }
}


