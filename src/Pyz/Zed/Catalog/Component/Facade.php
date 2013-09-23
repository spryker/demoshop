<?php
use Pyz\Zed\Catalog\Component\Exporter\KeyValue\ArtworkExporter as KeyValueArtwork;
use Pyz\Zed\Catalog\Component\Exporter\Solr\ArtworkExporter as SolrArtwork;

/**
 * @property Generated_Zed_Catalog_Component_Factory $factory
 */
class Pyz_Zed_Catalog_Component_Facade extends ProjectA_Zed_Catalog_Component_Facade
{

    /**
     * @return KeyValueArtwork
     */
    public function getExporterKeyValueArtworkExporter()
    {
        return $this->factory->getExporterKeyValueArtworkExporter();
    }

    /**
     * @return SolrArtwork
     */
    public function getExporterSolrArtworkExporter()
    {
        return $this->factory->getExporterSolrArtworkExporter();
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
