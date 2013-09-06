<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @property Generated_Zed_Catalog_Component_Factory $factory
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
     * @return Sao_Zed_Catalog_Component_Exporter_Memcache_Artwork
     */
    public function getExporterMemcacheArtwork()
    {
        return $this->factory->getExporterMemcacheArtwork();
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
