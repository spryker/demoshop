<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication\Plugin;

use Pyz\Yves\Collector\Communication\CollectorDependencyContainer;
use Pyz\Yves\Collector\Communication\Mapper;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

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
