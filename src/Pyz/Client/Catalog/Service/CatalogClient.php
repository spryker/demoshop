<?php

namespace Pyz\Client\Catalog\Service;

use SprykerFeature\Client\Catalog\Service\CatalogClient as SprykerCatalogClient;

/**
 * @method CatalogDependencyContainer getDependencyContainer()
 */
class CatalogClient extends SprykerCatalogClient
{

    /**
     * @param int $idCategoryNode
     * @param string $localeName
     *
     * @return array
     */
    public function getCategoryNodeById($idCategoryNode, $localeName)
    {
         return $this->getDependencyContainer()
             ->createCatalogStorage()
             ->getCategoryNodeById($idCategoryNode, $localeName)
         ;
    }

}
