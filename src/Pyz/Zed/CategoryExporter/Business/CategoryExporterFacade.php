<?php

namespace Pyz\Zed\CategoryExporter\Business;

use \ProjectA\Zed\CategoryExporter\Business\CategoryExporterFacade as CoreCategoryExporterFacade;
use ProjectA\Zed\ProductCategoryFrontendExporterConnector\Dependency\Facade\ProductCategoryFrontendExporterToCategoryExporterInterface;


class CategoryExporterFacade extends CoreCategoryExporterFacade implements
    ProductCategoryFrontendExporterToCategoryExporterInterface
{
    /**
     * @param array  $data
     * @param string $idsField
     * @param string $namesField
     * @param string $urlsField
     * @return array
     */
    public function explodeGroupedNodes(array $data, $idsField, $namesField, $urlsField)
    {
        return $this->dependencyContainer->createGroupedNodeExploder()
            ->explodeGroupedNodes(
                $data,
                $idsField,
                $namesField,
                $urlsField
            );
    }
}
