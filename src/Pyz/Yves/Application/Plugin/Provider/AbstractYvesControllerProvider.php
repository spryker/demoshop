<?php
/**
 * (c) Spryker Systems GmbH copyright protected.
 */
namespace Pyz\Yves\Application\Plugin\Provider;

use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Yves\Application\Plugin\YvesControllerProvider as SprykerYvesControllerProvider;

abstract class AbstractYvesControllerProvider extends SprykerYvesControllerProvider
{

    /**
     * @return string
     */
    public function getAllowedLocalesPattern()
    {
        $systemLocales = Store::getInstance()->getLocales();
        $implodedLocales = implode('|', array_keys($systemLocales));
        $allowedLocalesPattern = '(' . $implodedLocales . ')\/';

        return $allowedLocalesPattern;
    }

}
