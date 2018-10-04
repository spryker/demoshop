<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Category\Business\HelloSprykerBusinessFactory getFactory()
 */
class HelloSprykerFacade extends AbstractFacade
{
    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->getFactory()
            ->createHelloSpryker()
            ->getReversedString();
    }
}
