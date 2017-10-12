<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Application\Plugin\Provider\YvesControllerProvider as SprykerYvesControllerProvider;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
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
