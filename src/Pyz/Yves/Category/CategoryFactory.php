<?php

namespace Pyz\Yves\Category;

use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Category\ResourceCreator\CategoryResourceCreator;
use Spryker\Client\CategoryExporter\CategoryExporterClient;

class CategoryFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Category\ResourceCreator\CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return new CategoryResourceCreator($this->getLocator());
    }

    /**
     * @return \Spryker\Client\CategoryExporter\CategoryExporterClient
     */
    public function getCategoryExporterClient()
    {
        return $this->getLocator()->categoryExporter()->client();
    }

}
