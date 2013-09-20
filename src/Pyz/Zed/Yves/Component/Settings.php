<?php
namespace Pyz\Zed\Yves\Component;

use ProjectA\Zed\Yves\Component\Settings as CoreSettings;

/**
 * @property \Pyz_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Settings extends CoreSettings implements
    \ProjectA_Zed_Cms_Component_Dependency_Facade_Interface,
    \ProjectA_Zed_Glossary_Component_Dependency_Facade_Interface,
    \ProjectA_Zed_Misc_Component_Dependency_Facade_Interface,
    \ProjectA_Zed_Category_Component_Dependency_Facade_Interface,
    \ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    use \ProjectA_Zed_Cms_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Glossary_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Category_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getSolrExporters($exportIdentifier)
    {
        $result[] = $this->facadeCatalog->getExporterSolrArtwork();
        return $result;
    }

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getKeyValueExporters($exportIdentifier)
    {
        //TODO currently all exporters are activated to test them, remove unneeded later on
        $result[] = $this->facadeCms->getExporterKeyValueCmsExporter();
        $result[] = $this->facadeCms->getExporterKeyValueRedirection();
        $result[] = $this->facadeGlossary->getExporterKeyValueGlossaryExporter();

        //TODO we need to adjusted and rename this one to the new attribute set;
        $result[] = $this->facadeCatalog->getExporterKeyValueArtwork();

        $result[] = $this->facadeCategory->getExporterKeyValueCategories();
        $result[] = $this->facadeMisc->getExporterKeyValueCountryExporter();
//        $result[] = $this->facadeCatalog->getExporterKeyValueBrands();
        $result[] = $this->facadeCatalog->getExporterKeyValueProductOptions();
        return $result;
    }
}
