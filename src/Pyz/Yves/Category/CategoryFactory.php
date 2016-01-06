<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Category;

use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Category\ResourceCreator\CategoryResourceCreator;
use Spryker\Client\CategoryExporter\CategoryExporterClient;

class CategoryFactory extends AbstractFactory
{

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return new CategoryResourceCreator($this->getLocator());
    }

    /**
     * @return CategoryExporterClient
     */
    public function getCategoryExporterClient()
    {
        return $this->getLocator()->categoryExporter()->client();
    }

}
