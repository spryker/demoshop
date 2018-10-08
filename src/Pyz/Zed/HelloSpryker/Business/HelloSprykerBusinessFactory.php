<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business;

use Pyz\Zed\HelloSpryker\Business\Model\HelloSpryker\HelloSpryker;
use Pyz\Zed\HelloSpryker\HelloSprykerDependencyProvider;
use Pyz\Zed\StringFormat\Business\StringFormatFacade;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\HelloSpryker\HelloSprykerConfig getConfig()
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer getQueryContainer()
 */
class HelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\HelloSpryker\Business\Model\HelloSpryker\HelloSpryker
     */
    public function createHelloSpryker(): HelloSpryker
    {
        return new HelloSpryker(
            $this->getConfig(),
            $this->getQueryContainer(),
            $this->getStringFormatFacade()
        );
    }

    /**
     * @return \Pyz\Zed\StringFormat\Business\StringFormatFacade
     */
    protected function getStringFormatFacade(): StringFormatFacade
    {
        return $this->getProvidedDependency(HelloSprykerDependencyProvider::STRING_FORMAT_FACADE);
    }
}
