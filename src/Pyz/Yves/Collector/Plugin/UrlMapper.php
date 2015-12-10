<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Plugin;

use Pyz\Yves\Collector\CollectorDependencyContainer;
use Pyz\Yves\Collector\Mapper;
use SprykerEngine\Yves\Kernel\AbstractPlugin;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class UrlMapper extends AbstractPlugin
{

    /**
     * @return Mapper\UrlMapper
     */
    public function createUrlMapper()
    {
        return $this->getDependencyContainer()->createUrlMapper();
    }

}
