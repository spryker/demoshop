<?php

class Sao_Zed_Yves_Component_Model_Export_Exporter_Solr_Products extends ProjectA_Zed_Catalog_Component_Exporter_Products implements
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Solr_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Yves_Component_Interface_Exporter_Solr
{

    use ProjectA_Zed_Solr_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;

    /**
     * @return string
     */
    public function getCoreName()
    {
        return ProjectA_Shared_Library_Store::getInstance()->getSolrCore();
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task
     */
    public function getExportTask()
    {
        // TODO: Implement getExportTask() method.
    }


    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $products
     */
    protected function addAttributesToProducts(ProjectA_Zed_Catalog_Component_Interface_ProductCollection $products)
    {
        $this->facadeCatalog->addPriceToProducts(
            $products,
            $this->facadePrice->getPricingModel(ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE)
        );
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product
     * @return array
     */
    protected function prepareCategories(ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product)
    {
        $categories = array();
        $productCategories = $this->facadeCatalog->getCategoriesForProduct($product);

        /* @var $productCategory ProjectA_Zed_Category_Persistence_PacCategory */
        foreach ($productCategories as $productCategory) {
            $categories[] = $productCategory->getIdCategory();
        }

        return $categories;
    }

    /**
     * @param Traversable $productEntities
     * @param ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param ArrayIterator $reporter
     * @return array
     */
    public function exportData (Traversable $productEntities, ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel, ArrayIterator $reporter)
    {
        $productEntitiesClone = clone $productEntities;
        $this->facadeCatalog->setFilterForApprovedProducts($productEntitiesClone);

        /** @var $page ProjectA_Zed_Library_Propel_LazyCollection  */
        foreach ($productEntitiesClone->getPages() as $page) {
            $data = array();
            foreach ($exportModel->getFilterGroups() as $filterGroup) {
                $productCollection = $this->facadeCatalog->getProductCollectionFilterByAttributeGroup(array($filterGroup), false, false);
                $productCollection->addProductEntities($page);
                $method = 'getExportData' . ucfirst($filterGroup);
                $newData = call_user_func_array(array($this, $method), array($productCollection));
                foreach ($newData as $sku => $value) {
                    if (isset($data[$sku])) {
                        $data[$sku] += $value;
                    } else {
                        $data[$sku] = $value;
                    }
                }
            }
            $page->clearPage();
            $exportModel->write($data);
        }

    }

    /**
     * @param ProjectA_Zed_Library_Propel_LazyCollection $productEntities
     * @param ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param ArrayIterator $reporter
     */
    public function deleteData(ProjectA_Zed_Library_Propel_LazyCollection $productEntities, ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel, ArrayIterator $reporter)
    {
        /* @var $entity ProjectA_Zed_Catalog_Component_Interface_ProductEntity */
        $skuList = array();
        foreach ($productEntities as $entity) {
            $skuList[] = $entity->getSku();
        }

        $exportModel->deleteByKeys($skuList);
        $reporter['Deleted Entries in solr'] = count($skuList);
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return array
     */
    protected function getExportDataSolr_searchable(ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $data = array();
        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($productCollection as $sku => $product) {
            $attributes = $product->toArray();
            $data[$sku]['sku'] = $sku;
            $data[$sku]['product_id'] = $product->getIdCatalogProduct();
            $data[$sku]['product_name'] = $attributes[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME];
            $data[$sku]['product_brand'] = $attributes[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_BRAND];
            $data[$sku]['searchable_text'] = array_values(array_unique(array_filter($attributes)));
        }

        return $data;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return array
     */
    protected function getExportDataSolr_facet(ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $data = array();

        $this->addAttributesToProducts($productCollection);

        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($productCollection as $sku => $product) {

            $data[$sku]['sku'] = $sku;

            /* @var $attributeValue ProjectA_Zed_Catalog_Component_Model_ValueType */
            foreach ($product->getAttributeValues() as $attributeValue) {
                $valueTypeVariety = $attributeValue->getValueType()->getVariety();
                $key = $this->getSolrNameByVariety($valueTypeVariety, $attributeValue->getName(), 'facet');
                $value = $this->getSolrValueByVariety($valueTypeVariety, $attributeValue->getName(), $attributeValue->getValue());
                $data[$sku][$key] = $value;
            }

            //add price which is no ordinary attribute
            $data[$sku]['number_facet_price'] = $product[ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE];

            //add categories
            $data[$sku]['int_facet_category'] = $this->prepareCategories($product);
        }

        return $data;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return array
     */
    protected function getExportDataSolr_sort(ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $data = array();

        $this->addAttributesToProducts($productCollection);

        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($productCollection as $sku => $product) {

            $data[$sku]['sku'] = $sku;
            /* @var $attributeValue ProjectA_Zed_Catalog_Component_Model_ValueType */
            foreach ($product->getAttributeValues() as $attributeValue) {
                $valueTypeVariety = $attributeValue->getValueType()->getVariety();
                $key = $this->getSolrNameByVariety($valueTypeVariety, $attributeValue->getName(), 'sort');
                $value = $this->getSolrValueByVariety($valueTypeVariety, $attributeValue->getName(), $attributeValue->getValue());
                $data[$sku][$key] = $value;
            }

            //add price which is no ordinary attribute
            $data[$sku]['number_sort_price'] = $product[ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE];
        }

        return $data;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return array
     */
    protected function getExportDataSolr_suggestion (ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $data = array();
        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($productCollection as $sku => $product) {
            $attributes = $product->toArray();
            $data[$sku]['suggest_terms'] = array_values(array_unique(array_filter($attributes)));
        }
        return $data;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return array
     */
    protected function getExportDataSolr_score (ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $data = array();
        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($productCollection as $sku => $product) {
            $attributeSetName = $product->getAttributeSet()->getName();

            foreach ($this->facadeSolr->getSolrScoreConfigForAttributeSet($attributeSetName) as $scoreName) {
                $scores = $this->facadeSolr->getSolrScoresByName($scoreName, $product);
                if (isset($data[$sku])) {
                    $data[$sku] += $scores;
                } else {
                    $data[$sku] = $scores;
                }
            }
        }

        return $data;
    }
}
