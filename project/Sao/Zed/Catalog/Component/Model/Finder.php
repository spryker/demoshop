<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 26.07.12 10:37
 */
class Sao_Zed_Catalog_Component_Model_Finder extends ProjectA_Zed_Catalog_Component_Model_Finder implements Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant
{


    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @param bool $includeSuffix
     * @return string
     */
    public function createProductUrl(ProjectA_Zed_Catalog_Component_Interface_Product $product, $includeSuffix = true)
    {
        /** @var $product Sao_Catalog_Model_Product */
        return $product->createProductUrl($includeSuffix);
    }

    /**
     * @param bool $withDefaultEntry
     * @return array
     */
    public function getSupplierNames($withDefaultEntry = false)
    {
        $suppliers = array();
        $supplierCollection = $this->factory->getEntitySupplierQuery()
            ->orderByIdCatalogSupplier()
            ->find();

        if ($withDefaultEntry) {
            $suppliers[null] = null;
        }

        /* @var $supplier Entity_Nu3CatalogSupplier */
        foreach ($supplierCollection as $supplier) {
            $suppliers[$supplier->getName()] = $supplier->getName();
        }
        return $suppliers;
    }

    /**
     * @param integer $ids
     * @param array $attributeNames
     * @return ProjectA_Zed_Catalog_Component_Interface_ProductCollection
     */
    public function getProductCollectionWithEntitiesFilterByAttributesFromProductId($id, array $attributeNames)
    {
        $productCollection =
            $this->factory->getFacade()->getProductCollectionFilterByAttributes($attributeNames, true, true);

        $productEntity = $this->factory->getFacade()->getProductById($id);
        $productCollection->addProductEntity($productEntity);

        return $productCollection;
    }
}
