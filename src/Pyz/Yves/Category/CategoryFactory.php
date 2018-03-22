<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Category;

use Pyz\Yves\Category\ResourceCreator\CategoryResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

class CategoryFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Yves\Category\ResourceCreator\CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return new CategoryResourceCreator();
    }

    /**
     * @return \Spryker\Client\CategoryExporter\CategoryExporterClient
     */
    public function getCategoryExporterClient()
    {
        return $this->getProvidedDependency(CategoryDependencyProvider::CLIENT_CATEGORY_EXPORTER);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function getStore()
    {
        return $this->getProvidedDependency(CategoryDependencyProvider::STORE);
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
     */
    public function getApplication()
    {
        return $this->getProvidedDependency(CategoryDependencyProvider::APPLICATION);
    }
}
