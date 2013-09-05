<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Model_ProductCollection extends ProjectA_Zed_Catalog_Component_Model_ProductCollection
{
    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity
     * @return ProjectA_Zed_Catalog_Component_Interface_Product
     */
    public function createProduct (ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity)
    {
        if (!$productEntity->getIsItem()) {
            //TODO just removed to see the at least the grid for config/simple
            //once we build the real grid and stuff we need to think about what should happen here
            //throw new ProjectA_Zed_Library_Exception('product could not be created as it is not marked as item.');
        }
        $sku = $productEntity->getSku();
        if ($this->hasProduct($sku)) {
            return $this->getProduct($sku);
        } else {
            $valueTypes = $this->factory->getModelFilterByAttributeSet($this->valueTypes, $productEntity->getFkCatalogAttributeSet());
            if ($this->isReadyOnly) {
                $attributes = array();

                /* @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
                foreach ($valueTypes as $valueType) {
                    $name = $valueType->getAttribute()->getName();
                    $attributes[$name] = null;
                }
                if (null === $this->cacheModel) {
                    $this->cacheModel = $this->factory->getModelCache();
                }
                $cache = $this->cacheModel->getCacheValues($productEntity);
                foreach (array_keys($attributes) as $name) {
                    if (isset($cache[$name])) {
                        $attributes[$name] = $cache[$name];
                    }
                }
                return $this->factory->getModelProductReadOnly($productEntity, $attributes);
            } else {
                $product = $this->factory->getModelProduct($productEntity);
                $loader = $this->getLoader();
                $simpleValueTypes = $this->factory->getModelFilterValueTypeByGroupName($valueTypes, ProjectA_Zed_Catalog_Component_Interface_GroupConstant::SIMPLE_ATTRIBUTES);

                /* @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
                foreach ($simpleValueTypes as $valueType) {
                    $attribute = $this->factory->getModelValueType($valueType, $productEntity);
                    $loader->registerValueType($attribute);
                    $product->addAttribute($attribute);
                }
                if ($productEntity->getVariety() === ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY_SIMPLE) {
                    // also add attributes from config
                    $configProduct = $productEntity->getSpecificProduct()->getConfig()->getProduct();
                    $configValueTypes = $this->factory->getModelFilterValueTypeByGroupName($valueTypes, ProjectA_Zed_Catalog_Component_Interface_GroupConstant::CONFIG_ATTRIBUTES);

                    foreach ($configValueTypes as $valueType) {
                        $attribute = $this->factory->getModelValueType($valueType, $configProduct);
                        $loader->registerValueType($attribute);
                        $product->addAttribute($attribute);
                    }
                }

                return $product;
            }
        }
    }
}
