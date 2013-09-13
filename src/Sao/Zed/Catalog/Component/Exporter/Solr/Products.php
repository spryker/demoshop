<?php
namespace Sao\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\Products as CoreProducts;
use ProjectA\Zed\Yves\Component\Model\Export\AbstractExport;

/**
 * Class classProducts
 * @package Sao\Zed\Catalog\Component\Exporter\Solr
 * @property \Generated_Zed_Catalog_Component_Factory $factory
 */
abstract class Products extends CoreProducts implements
     \ProjectA_Zed_Yves_Component_Interface_Exporter_Solr,
     \ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
     \ProjectA_Zed_Solr_Component_Dependency_Facade_Interface,
     \ProjectA_Zed_Yves_Component_Dependency_Facade_Interface,
     \Sao_Shared_Catalog_Interface_ProductAttributeConstant,
     \Sao_Shared_Catalog_Interface_ProductAttributeSetConstant,
     \Sao_Shared_Library_StorageKeyConstant
{
    use \ProjectA_Zed_Solr_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use \ProjectA_Zed_Yves_Component_Dependency_Facade_Trait;

    /**
     * @var array
     */
    protected $groupAttributeNames;

    /**
     * @var array
     */
    protected $scoreNames;

    /**
     * @var \ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet
     */
    protected $attributeSetEntity;

    /**
     * @return string
     */
    abstract public function getCoreName();

    /**
     * @return string
     */
    abstract protected function getProductAttributeSetName();

    /**
     * @return \ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_AbstractProduct
     */
    abstract protected function getProductQueryBuilder();



    /**
     * @return string
     */
    public function getName()
    {
        return 'Products ' . $this->getProductAttributeSetName();
    }

    /**
     * @return \ProjectA_Zed_Yves_Component_Exporter_Task_Entity
     */
    public function getExportTask()
    {
        $task = $this->facadeYves->getExporterTaskRaw();
        $task->setLazyCollection(
            new \ProjectA_Zed_Library_Propel_RawLazyCollection($this->getProductQueryBuilder())
        );
        return $task;
    }

//    /**
//     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product
//     * @return array
//     */
//    protected function prepareCategories(ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product)
//    {
//        $categories = array();
//        $productCategories = $this->factory->getModelFinder()->getCategoriesForProduct($product);
//
//        /* @var $productCategory ProjectA_Zed_Category_Persistence_PacCategory */
//        foreach ($productCategories as $productCategory) {
//            $categories[] = $productCategory->getIdCategory();
//        }
//
//        return $categories;
//    }

    /**
     * @param \Traversable $collection
     * @param AbstractExport $exportModel
     * @param \ArrayIterator $reporter
     */
    public function exportData(
        \Traversable $collection,
        AbstractExport $exportModel,
        \ArrayIterator $reporter
    ) {

        $reportName = $this->getName() . ' exported';
        $reporter[$reportName] = 0;

        $this->scoreNames = $this->facadeSolr->getSolrScoreConfigForAttributeSet($this->getProductAttributeSetName());
        $this->attributeSetEntity = $this->factory->getModelFinder()->getAttributeSetByName($this->getProductAttributeSetName());

        $allData = array();
        $counter = 1;
        $chunkSize = 10000;
        foreach ($collection as $product) {
            $sku = $product['sku'];
            $data = array();
            foreach ($exportModel->getFilterGroups() as $filterGroup) {
                $groupProduct = $this->extractGroupAttributesFromProduct($filterGroup, $product);
                $method = 'getExportData' . ucfirst($filterGroup);
                $newData = $this->$method($groupProduct, $sku, $filterGroup);
                foreach ($newData as $sku => $value) {
                    if (isset($data[$sku])) {
                        $data[$sku] += $value;
                    } else {
                        $data[$sku] = $value;
                    }
                }
            }

            $allData+=$data;

            if ($counter % $chunkSize == 0) {
                $exportModel->write($allData);
                $allData = array();
            }

            $counter++;
        }

        //export the rest in allData
        if (!empty($allData)) {
            $exportModel->write($allData);
            unset($allData);
        }

        $reporter[$reportName] = $counter;
    }

    /**
     * @param $filterGroup
     * @param array $product
     * @return array
     */
    protected function extractGroupAttributesFromProduct($filterGroup, array $product)
    {
        if (!isset($this->groupAttributeNames[$filterGroup])) {
            $groupValueTypes = $this->factory->getModelFinder()->getValueTypes(
                array($filterGroup),
                $this->attributeSetEntity
            );
            /* @var $groupValueType \ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
            foreach ($groupValueTypes as $groupValueType) {
                $this->groupAttributeNames[$filterGroup][$groupValueType->getAttribute()->getName()] =
                    $groupValueType->getVariety();
            }
        }

        if (!isset($this->groupAttributeNames[$filterGroup])) {
            return [];
        }
        return array_intersect_key($product, $this->groupAttributeNames[$filterGroup]);
    }

    /**
     * @param \ProjectA_Zed_Library_Propel_LazyCollection $productEntities
     * @param \ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param \ArrayIterator $reporter
     */
    public function deleteData(
        \ProjectA_Zed_Library_Propel_LazyCollection $productEntities,
        \ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel,
        \ArrayIterator $reporter
    ) {
        /* @var $entity \ProjectA_Zed_Catalog_Component_Interface_ProductEntity */
        $skuList = array();
        foreach ($productEntities as $entity) {
            $skuList[] = $entity->getSku();
        }

        $exportModel->deleteByKeys($skuList);
        $reporter['Deleted Entries in solr'] = count($skuList);
    }

    /**
     * @param array $product
     * @param $sku
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_searchable(array $product, $sku, $filterGroup)
    {
        $data = array();
        $data[$sku]['sku'] = $sku;
        $data[$sku]['searchable_text'] = array_values(array_unique(array_filter($product)));
        return $data;
    }

    /**
     * @param array $product
     * @param $sku
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_suggestion(array $product, $sku, $filterGroup)
    {
        $data = array();
        $data[$sku]['suggest_terms'] = array_values(array_unique(array_filter($product)));
        return $data;
    }

    /**
     * @param array $product
     * @param $sku
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_sort(array $product, $sku, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];
        $data = array();
        $data[$sku] = $this->getAttributeValuesForSolr($data, $product, $attributeVarieties, 'sort');
//        $data[$sku]['number_sort_price'] = intval($product['price']);

        //remove doubled int_sort_price
        unset($data[$sku]['int_sort_price']);

//        //add price which is no ordinary attribute
//        $data[$sku]['number_facet_price'] = $product[ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE];

        //add categories
        //$data[$sku]['int_facet_category'] = $this->prepareCategories($product);

        return $data;
    }

    /**
     * @param array $product
     * @param $sku
     * @param $filterGroup
     * @return mixed
     */
    protected function getExportDataSolr_facet(array $product, $sku, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];

        $data = array();
        $data[$sku]['sku'] = $sku;
        $data[$sku] = $this->getAttributeValuesForSolr($data[$sku], $product, $attributeVarieties, 'facet');

        return $data;
    }

    /**
     * @param array $product
     * @param $sku
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_score(array $product, $sku, $filterGroup)
    {
        $data = array();
        foreach ($this->scoreNames as $scoreName) {
            $scores = $this->facadeSolr->getSolrScoresByName($scoreName, $product);
            if (isset($data[$sku])) {
                $data[$sku] += $scores;
            } else {
                $data[$sku] = $scores;
            }
        }
        return $data;
    }
}
