<?php
namespace Pyz\Zed\Yves\Business;

use Generated\Zed\Cms\Business\Dependency\CmsFacadeInterface;
use Generated\Zed\Cms\Business\Dependency\CmsFacadeTrait;
use ProjectA\Zed\Yves\Business\YvesSettings as ProjectAYvesSettings;
use Pyz\Zed\Catalog\Business\CatalogFacade;
use Generated\Zed\Glossary\Business\Dependency\GlossaryFacadeInterface;
use Generated\Zed\Misc\Business\Dependency\MiscFacadeInterface;
use Generated\Zed\Category\Business\Dependency\CategoryFacadeInterface;
use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeInterface;
use Generated\Zed\Glossary\Business\Dependency\GlossaryFacadeTrait;
use Generated\Zed\Misc\Business\Dependency\MiscFacadeTrait;
use Generated\Zed\Category\Business\Dependency\CategoryFacadeTrait;
use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeTrait;

/**
 * @property CatalogFacade $facadeCatalog
 */
class YvesSettings extends ProjectAYvesSettings implements
    GlossaryFacadeInterface,
    MiscFacadeInterface,
    CategoryFacadeInterface,
    CmsFacadeInterface
{
    use GlossaryFacadeTrait;
    use MiscFacadeTrait;
    use CategoryFacadeTrait;
    use CatalogFacadeTrait;
    use CmsFacadeTrait;

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getSolrExporters($exportIdentifier)
    {
//        return [
//            $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsConfigExporter(),
//            $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsSimpleExporter(),
//            $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsSingleExporter(),
//            $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsBundleExporter()
//        ];
    }

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getKeyValueExporters($exportIdentifier)
    {
        return [
            $this->facadeGlossary->createExporterKeyValueGlossaryExporter(),

            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsConfigExporter(),
//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsSimpleExporter(),
            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsSingleExporter(),
//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsBundleExporter(),
//
//            $this->facadeCatalog->createExporterKeyValueProductOptionsExporter(),
//            $this->facadeCategory->createExporterKeyValueCategoriesExporter(),
            $this->facadeCms->createExporterKeyValueCmsExporter(),
            $this->facadeCms->createExporterKeyValueRedirectionExporter(),
            $this->facadeMisc->createExporterKeyValueCountryExporter(),
        ];
    }

}
