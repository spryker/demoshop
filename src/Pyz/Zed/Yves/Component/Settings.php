<?php
namespace Pyz\Zed\Yves\Component;

use ProjectA\Zed\Yves\Component\Settings as CoreSettings;

/**
 * @property \Pyz_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Settings extends CoreSettings implements
    \Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface,
    \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface,
    \Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface,
    \Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface,
    \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface
{
    use \Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
    use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeTrait;
    use \Generated\Zed\Misc\Component\Dependency\MiscFacadeTrait;
    use \Generated\Zed\Category\Component\Dependency\CategoryFacadeTrait;
    use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;

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
        $result[] = $this->facadeCms->createExporterKeyValueCmsExporter();
        $result[] = $this->facadeCms->createExporterKeyValueRedirectionExporter();
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
