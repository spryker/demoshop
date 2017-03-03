<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Navigation;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Navigation\NavigationFactory getFactory()
 */
class NavigationClient extends AbstractClient implements NavigationClientInterface
{

    /**
     * @param string $navigationKey
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\NavigationTreeTransfer|null
     */
    public function getNavigationByKey($navigationKey, $localeName)
    {
        return $this->getFactory()
            ->createNavigationReader()
            ->findNavigationTreeByNavigationKey($navigationKey, $localeName);
    }

}
