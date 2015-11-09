<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Plugin;

use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider as SprykerYvesControllerProvider;

abstract class YvesControllerProvider extends SprykerYvesControllerProvider
{

    /**
     * @return string
     */
    public function getAllowedLocalesPattern()
    {
        $systemLocales = Store::getInstance()->getLocales();
        $implodedLocales = implode('|', array_keys($systemLocales));
        $allowedLocalesPattern = '(' . $implodedLocales . ')\/';

        return  $allowedLocalesPattern;
    }

}
