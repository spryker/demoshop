<?php
namespace Pyz\Zed\Yves\Business;

use ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeInterface;
use ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeTrait;
use ProjectA\Zed\Yves\Business\YvesSettings as ProjectAYvesSettings;
use Pyz\Zed\Catalog\Business\CatalogFacade;
use ProjectA\Deprecated\Glossary\Business\Dependency\GlossaryFacadeInterface;
use ProjectA\Deprecated\Misc\Business\Dependency\MiscFacadeInterface;
use ProjectA\Deprecated\Category\Business\Dependency\CategoryFacadeInterface;
use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeInterface;
use ProjectA\Deprecated\Glossary\Business\Dependency\GlossaryFacadeTrait;
use ProjectA\Deprecated\Misc\Business\Dependency\MiscFacadeTrait;
use ProjectA\Deprecated\Category\Business\Dependency\CategoryFacadeTrait;
use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeTrait;

/**
 * @property CatalogFacade $facadeCatalog
 */
class YvesSettings extends ProjectAYvesSettings implements
    GlossaryFacadeInterface,
    MiscFacadeInterface,
    CatalogFacadeInterface
{
    use GlossaryFacadeTrait;
    use MiscFacadeTrait;
    use CatalogFacadeTrait;

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

//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsConfigExporter(),
//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsSimpleExporter(),
//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsSingleExporter(),
//            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsBundleExporter(),
//
//            $this->facadeCatalog->createExporterKeyValueProductOptionsExporter(),
//            $this->facadeCategory->createExporterKeyValueCategoriesExporter(),
//            $this->facadeGlossary->createExporterKeyValueGlossaryExporter(),
//            $this->facadeCms->createExporterKeyValueCmsExporter(),
            $this->facadeMisc->createExporterKeyValueCountryExporter(),
        ];
    }

}
