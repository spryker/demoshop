<?php
namespace Pyz\Zed\Yves\Component;

use ProjectA\Zed\Yves\Component\YvesSettings as ProjectAYvesSettings;
use Pyz\Zed\Catalog\Component\CatalogFacade;
use Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface;
use Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface;
use Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface;
use Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface;
use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface;

use Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
use Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeTrait;
use Generated\Zed\Misc\Component\Dependency\MiscFacadeTrait;
use Generated\Zed\Category\Component\Dependency\CategoryFacadeTrait;
use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;

/**
 * @property CatalogFacade $facadeCatalog
 */
class YvesSettings extends ProjectAYvesSettings implements
    GlossaryFacadeInterface,
    MiscFacadeInterface,
    CategoryFacadeInterface,
    CatalogFacadeInterface
{
    use GlossaryFacadeTrait;
    use MiscFacadeTrait;
    use CategoryFacadeTrait;
    use CatalogFacadeTrait;

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getSolrExporters($exportIdentifier)
    {
        $result[] = $this->facadeCatalog->createExporterSolrProductsWithElectronicsExporter();
        $result[] = $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsExporter();
        return $result;
    }

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getKeyValueExporters($exportIdentifier)
    {
        //TODO currently all exporters are activated to test them, remove unneeded later on
        //$result[] = $this->facadeCms->createExporterKeyValueCmsExporter();
//        $result[] = $this->facadeCms->createExporterKeyValueRedirectionExporter();
        $result[] = $this->facadeGlossary->createExporterKeyValueGlossaryExporter();

        $result[] = $this->facadeCatalog->createExporterKeyValueProductsWithElectronicsExporter();
        $result[] = $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsExporter();

        $result[] = $this->facadeCategory->createExporterKeyValueCategoriesExporter();
        $result[] = $this->facadeMisc->createExporterKeyValueCountryExporter();
//        $result[] = $this->facadeCatalog->createExporterKeyValueBrandsExporter();
        $result[] = $this->facadeCatalog->createExporterKeyValueProductOptionsExporter();
        return $result;
    }
}
