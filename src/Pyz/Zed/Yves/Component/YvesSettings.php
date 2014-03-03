<?php
namespace Pyz\Zed\Yves\Component;

use Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface;
use Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
use ProjectA\Zed\Yves\Component\YvesSettings as ProjectAYvesSettings;
use Pyz\Zed\Catalog\Component\CatalogFacade;
use Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface;
use Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface;
use Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface;
use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface;
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
    CatalogFacadeInterface,
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
        return [
            $this->facadeCatalog->createExporterSolrProductsWithElectronicsExporter(),
            $this->facadeCatalog->createExporterSolrProductsWithoutElectronicsExporter(),
        ];
    }

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getKeyValueExporters($exportIdentifier)
    {
        return [
            $this->facadeGlossary->createExporterKeyValueGlossaryExporter(),
            $this->facadeCatalog->createExporterKeyValueProductsWithElectronicsExporter(),
            $this->facadeCatalog->createExporterKeyValueProductsWithoutElectronicsExporter(),
            $this->facadeCatalog->createExporterKeyValueProductOptionsExporter(),
            $this->facadeCategory->createExporterKeyValueCategoriesExporter(),
            $this->facadeCms->createExporterKeyValueCmsExporter(),
            $this->facadeCms->createExporterKeyValueRedirectionExporter(),
            $this->facadeMisc->createExporterKeyValueCountryExporter(),
        ];
    }

}
