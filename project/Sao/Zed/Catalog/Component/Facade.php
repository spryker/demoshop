<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @property Sao_Zed_Catalog_Component_Factory $factory
 */
class Sao_Zed_Catalog_Component_Facade extends ProjectA_Zed_Catalog_Component_Facade
{

    /**
     * read catalog setup from db and print
     * @return string
     */
    public function reverseInstall()
    {
        return $this->factory->getInternalReverseInstall()->reverseInstall();
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Memcache_Artwork
     */
    public function getQueryBuilderMemcacheArtwork()
    {
        return $this->factory->getModelYvesQueryBuilderMemcacheArtwork();
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Manufacture
     */
    public function getQueryBuilderSolrManufacture()
    {
        return $this->factory->getModelYvesQueryBuilderSolrManufacture();
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Marketplace
     */
    public function getQueryBuilderSolrMarketplace()
    {
        return $this->factory->getModelYvesQueryBuilderSolrMarketplace();
    }

    /**
     * @fixme @todo @hopefully soon deprecated ;)
     * @param string $sku
     * @return string
     */
    public function getProductType($sku)
    {
        //TODO remove mock
        // FIXME FIXME FIXME
        if (substr($sku, 0, 3) == 'P1-') {
            return 'marketplace';
        } else {
            return 'manufactured';
        }
    }
}
