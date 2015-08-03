<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\CategoryExporter\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\CategoryExporter\Communication\CategoryExporterDependencyContainer;

/**
 * @method CategoryExporterDependencyContainer getDependencyContainer()
 */
class CategoryResourceCreator extends AbstractPlugin
{

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->getDependencyContainer()->createCategoryResourceCreator();
    }

}
