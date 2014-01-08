<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use Generated\Zed\Price\Component\Dependency\PriceFacadeInterface;
use Generated\Zed\Price\Component\Dependency\PriceFacadeTrait;
use Generated\Zed\Solr\Component\Dependency\SolrFacadeInterface;
use Generated\Zed\Solr\Component\Dependency\SolrFacadeTrait;
use Generated\Zed\Yves\Component\Dependency\YvesFacadeInterface;
use Generated\Zed\Yves\Component\Dependency\YvesFacadeTrait;
use ProjectA\Shared\Library\Filter\SeparatorToCamelCaseFilter;
use ProjectA\Zed\Catalog\Component\Exporter\ProductsExporter as CoreProductsExporter;
use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;
use ProjectA\Zed\Yves\Component\Model\Export\AbstractExport;
use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;
use ProjectA\Shared\Price\Code\PriceTypeConstants;
use ProjectA\Zed\Catalog\Component\Model\Attribute\GroupConstantInterface;

abstract class ProductsExporter extends CoreProductsExporter implements
    \ProjectA_Zed_Yves_Component_Interface_Exporter_Solr,
    PriceFacadeInterface,
    SolrFacadeInterface,
    YvesFacadeInterface,
    ProductAttributeConstantInterface,
    ProductAttributeSetConstantInterface,
    \Pyz_Shared_Library_StorageKeyConstant
{
    use SolrFacadeTrait;
    use PriceFacadeTrait;
    use YvesFacadeTrait;

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
     * @var array
     */
    protected $specialGroupAttributes = [
        GroupConstantInterface::SOLR_SORT => [
            PriceTypeConstants::FINAL_GROSS_PRICE
        ],
        GroupConstantInterface::SOLR_FACET => [
            PriceTypeConstants::FINAL_GROSS_PRICE
        ]
    ];

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
        $task = $this->facadeYves->createExporterSetupRaw();
        $task->setLazyCollection(
            new \ProjectA_Zed_Library_Propel_RawLazyCollection($this->getProductQueryBuilder())
        );
        return $task;
    }

    /**
     * //TODO needs refactoring
     *
     * @param $id
     * @return mixed
     */
    protected function prepareCategories($id)
    {
        $categories = [];
        $product = $this->factory->createModelFinder()->findProductEntityById($id);
        $productCategories = $this->factory->createModelCategory()->getCategoriesForProduct($product);

        /* @var $productCategory \ProjectA_Zed_Category_Persistence_PacCategory */
        foreach ($productCategories as $productCategory) {
            $categories[] = $productCategory->getIdCategory();
        }
        return $categories;
    }

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

        $filter = new SeparatorToCamelCaseFilter('_', true);
        $reportName = $this->getName() . ' exported';
        $reporter[$reportName] = 0;

        $this->scoreNames = $this->facadeSolr->getSolrScoreConfigForAttributeSet($this->getProductAttributeSetName());
        $this->attributeSetEntity = $this->factory->createModelFinder()->getAttributeSetByName($this->getProductAttributeSetName());

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
                $method = 'getExportData' . $filter->filter($filterGroup);

                if (isset($this->groupAttributeNames[$filterGroup]) && !empty($this->groupAttributeNames[$filterGroup])) {
                    $newData = $this->$method($groupProduct, $id, $filterGroup);
                    foreach ($newData as $id => $value) {
                        if (isset($data[$id])) {
                            $data[$id] += $value;
                        } else {
                            $data[$id] = $value;
                        }
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
            $groupValueTypes = $this->factory->createModelFinder()->getValueTypes(
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

        //add special attributes to groups
        $groupAttributeNamesByFilterGroup = $this->groupAttributeNames[$filterGroup];
        if (isset($this->specialGroupAttributes[$filterGroup])) {
            $groupAttributeNamesByFilterGroup = array_merge(
                array_flip($this->specialGroupAttributes[$filterGroup]),
                $groupAttributeNamesByFilterGroup
            );
        };

        return array_intersect_key($product, $groupAttributeNamesByFilterGroup);
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
        /* @var $entity \ProjectA\Zed\Catalog\Component\Model\ProductEntityInterface */
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
    protected function getExportDataSolrSearchable(array $product, $id, $filterGroup)
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
    protected function getExportDataSolrSuggestion(array $product, $id, $filterGroup)
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
    protected function getExportDataSolrSort(array $product, $id, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];
        $data = array();

        $data[$id] = $this->getAttributeValuesForSolr($data, $product, $attributeVarieties, 'sort');

        //add price which is no ordinary attribute
        $data[$id]['number_sort_price'] = (int) $product[PriceTypeConstants::FINAL_GROSS_PRICE];

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return mixed
     */
    protected function getExportDataSolrFacet(array $product, $id, $filterGroup)
    {
        $attributeVarieties = $this->groupAttributeNames[$filterGroup];

        $data = array();
        $data[$id] = $this->getAttributeValuesForSolr($data, $product, $attributeVarieties, 'facet', self::FIELDTYPE_MULTI);

        $data[$id]['number_facet_price'] = (int) $product[PriceTypeConstants::FINAL_GROSS_PRICE];

        //add categories
        $data[$id]['int_facet_category'] = $this->prepareCategories($id);

        return $data;
    }

    /**
     * @param array $product
     * @param $id
     * @param $filterGroup
     * @return array
     */
    protected function getExportDataSolrScore(array $product, $id, $filterGroup)
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
