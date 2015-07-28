<?php

namespace Pyz\Zed\CategoryExporter\Business;

use SprykerFeature\Zed\CategoryExporter\Business\CategoryExporterFacade as CoreCategoryExporterFacade;

class CategoryExporterFacade extends CoreCategoryExporterFacade
{

    /**
     * @param array $data
     * @param string $idsField
     * @param string $namesField
     * @param string $urlsField
     *
     * @return array
     */
    public function explodeGroupedNodes(array $data, $idsField, $namesField, $urlsField)
    {
        return $this->getDependencyContainer()->createGroupedNodeExploder()
            ->explodeGroupedNodes(
                $data,
                $idsField,
                $namesField,
                $urlsField
            );
    }

}
