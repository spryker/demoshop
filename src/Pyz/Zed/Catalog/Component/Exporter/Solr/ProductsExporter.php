<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\ProductsExporter as CoreProductsExporter;
use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;
use ProjectA\Zed\Yves\Component\Model\Export\AbstractExport;
use Pyz\Shared\Catalog\Code\ProductAttributeConstant;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

abstract class ProductsExporter extends CoreProductsExporter implements
     \ProjectA_Zed_Yves_Component_Interface_Exporter_Solr,
     \ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
     \ProjectA_Zed_Solr_Component_Dependency_Facade_Interface,
     \ProjectA_Zed_Yves_Component_Dependency_Facade_Interface,
     ProductAttributeConstant,
     ProductAttributeSetConstant,
     \Pyz_Shared_Library_StorageKeyConstant
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
    abstract public function getEndpoint();

    /**
     * @return string
     */
    abstract protected function getProductAttributeSetName();

    /**
     * @return AbstractProduct
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
     * @return \ProjectA_Zed_Yves_Component_Exporter_Setup_Entity
     */
    public function getExportSetup()
    {
        $task = $this->facadeYves->getExporterSetupRaw();
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
            $data = array();

            $id = $product['id_catalog_product'];
            $data[$id]['id'] = $id;
            $data[$id]['sku'] = $product['sku'];

            foreach ($exportModel->getFilterGroups() as $filterGroup) {
                $groupProduct = $this->extractGroupAttributesFromProduct($filterGroup, $product);
                $method = 'getExportData' . ucfirst($filterGroup);
                $newData = $this->$method($groupProduct, $id, $filterGroup);
                foreach ($newData as $id => $value) {
                    if (isset($data[$id])) {
                        $data[$id] += $value;
                    } else {
                        $data[$id] = $value;
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
     * @param AbstractExport $exportModel
     * @param \ArrayIterator $reporter
     */
    public function deleteData(
        \ProjectA_Zed_Library_Propel_LazyCollection $productEntities,
        AbstractExport $exportModel,
        \ArrayIterator $reporter
    ) {
        /* @var $entity \ProjectA_Zed_Catalog_Component_Interface_ProductEntity */
        $idList = array();
        foreach ($productEntities as $entity) {
            $idList[] = $entity->getIdCatalogProduct();
        }

        $exportModel->deleteByKeys($idList);
        $reporter['Deleted Entries in solr'] = count($idList);
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_searchable(array $product, $id, $filterGroup)
    {
        $data = array();
        $data[$id]['searchable_text'] = array_values(array_unique(array_filter($product)));

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_suggestion(array $product, $id, $filterGroup)
    {
        $data = array();
        $data[$id]['suggest_terms'] = array_values(array_unique(array_filter($product)));

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_sort(array $product, $id, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];
        $data = array();
        $data[$id] = $this->getAttributeValuesForSolr($data, $product, $attributeVarieties, 'sort');
//        $data[$sku]['number_sort_price'] = intval($product['price']);

        //remove doubled int_sort_price
        unset($data[$id]['int_sort_price']);

//        //add price which is no ordinary attribute
//        $data[$sku]['number_facet_price'] = $product[ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE];

        //add categories
        //$data[$sku]['int_facet_category'] = $this->prepareCategories($product);

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return mixed
     */
    protected function getExportDataSolr_facet(array $product, $id, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];

        $data = array();
        $data[$id] = $this->getAttributeValuesForSolr($data, $product, $attributeVarieties, 'facet');

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolr_score(array $product, $id, $filterGroup)
    {
        $data = array();
        foreach ($this->scoreNames as $scoreName) {
            $scores = $this->facadeSolr->getSolrScoresByName($scoreName, $product);
            if (isset($data[$id])) {
                $data[$id] += $scores;
            } else {
                $data[$id] = $scores;
            }
        }
        return $data;
    }
}
