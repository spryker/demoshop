<?php
namespace Pyz\Zed\Catalog\Component\Model;

use Pyz\Shared\Catalog\Code\ProductAttributeConstant;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

class Product extends \ProjectA_Zed_Catalog_Component_Model_Product implements
    ProductAttributeConstant,
    ProductAttributeSetConstant
{
    /**
     * @param $url
     */
    public function setProductUrl($url)
    {
        $this[self::ATTRIBUTE_URL] = $url;
    }

    /**
     * @param bool $includeSuffix
     * @return string
     * @throws \ProjectA_Shared_Library_Exception
     */
    public function createProductUrl($includeSuffix = true)
    {
        $attributeSetName = $this->getAttributeSet()->getName();
        switch ($attributeSetName) {
            case self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS:
                $elements = $this->getUrlElementsForProductsWithElectronics();
                break;
            case self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS:
                $elements = $this->getUrlElementsForProductsWithoutElectronics();
                break;
            default:
                throw new \ProjectA_Shared_Library_Exception('No Url Creator For Attribute Set ' . $attributeSetName);
        }
        $elements = $this->removeEmptyUrlElements($elements);

        $url = implode('-', $elements);
        $url = \ProjectA_Shared_Library_Translit::filter($url);
        //TODO add some url filter class, the same we need to use in the category exporter as well
        //$url = PalShared_Storage::getUrlKey();

        if ($includeSuffix) {
            $url .= '.html';
        }
        return $url;
    }

    /**
     * @param array $elements
     * @return array
     */
    protected function removeEmptyUrlElements(array $elements)
    {
        $elementsFiltered = array();
        foreach ($elements as $element) {
            if (!empty($element)) {
                $elementsFiltered[] = $element;
            }
        }
        return $elementsFiltered;
    }

    /**
     * @return array
     */
    protected function getUrlElementsForProductsWithElectronics()
    {
        return array(
            $this[self::ATTRIBUTE_NAME],
            $this->getIdCatalogProduct(),
        );
    }

    /**
     * @return array
     */
    protected function getUrlElementsForProductsWithoutElectronics()
    {
        return array(
            $this[self::ATTRIBUTE_NAME],
            $this->getIdCatalogProduct(),
        );
    }
}
