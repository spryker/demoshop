<?php
namespace Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition;

use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeInterface;
use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite;
use ProjectA\Zed\Catalog\Business\Model\Import\Product\FieldnameConstantInterface;
use ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\AbstractDefinition;
use ProjectA\Zed\Library\Workflow\TaskInterface;

class WriteBundleProduct extends AbstractDefinition implements CatalogFacadeInterface
{

    use CatalogFacadeTrait;

    /**
     * @return TaskInterface[]
     */
    protected function getTasks()
    {
        return [
            $this->factory->createModelImportProductWriterWorkflowTaskAddAttributesTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddFloatPriceTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddStockTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskUpdateBundleProducts(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddCategoriesTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddOptionsTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskEnsureUniqueUrlTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddTouchEntryTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskSaveTask(),
        ];
    }

    /**
     * @param array $productData
     *
     * @return ProductComposite
     */
    protected function getOrCreateProduct(array $productData)
    {
        $product = $this->findProduct($productData);
        if (!$product) {
            $product = $this->createProduct($productData);
        }
        return $product;
    }

    /**
     * @param array $productData
     *
     * @return ProductComposite
     */
    protected function createProduct(array $productData)
    {
        $fieldNames = $this->factory->createSettings()->getProductImportFieldNames();

        $skuField = $fieldNames[FieldnameConstantInterface::SKU];
        $sku = $productData[$skuField];

        $attributeSetField = $fieldNames[FieldnameConstantInterface::ATTRIBUTE_SET];
        $attributeSetName = $productData[$attributeSetField];
        $attributeSet = $this->getAttributeSet($attributeSetName);

        $bundleTypeField = $fieldNames[FieldnameConstantInterface::BUNDLE_TYPE];
        $bundleType = $productData[$bundleTypeField];

        $statusTypeField = $fieldNames[FieldnameConstantInterface::STATUS];
        $initialStatus = $productData[$statusTypeField];

        //$bundleProducts = $this->getBundleProducts(explode('|', $productData['refbundleskus']));

        return $this->facadeCatalog->createNewBundleProduct(
            $sku,
            $bundleType,
            $attributeSet,
            [],
            $initialStatus
        );
    }

    /**
     * @param array $productData
     *
     * @return ProductComposite
     */
    protected function findProduct(array $productData)
    {
        $fieldNames = $this->factory->createSettings()->getProductImportFieldNames();
        $skuField = $fieldNames[FieldnameConstantInterface::SKU];
        $product = $this->facadeCatalog->getBundleBySku($productData[$skuField], [], false);

        return $product;
    }

    /**
     * @param array $skus
     * @return \ArrayObject
     */
    /*
    protected function getBundleProducts(array $skus)
    {
        $bundleProducts = [];
        foreach($skus as $sku) {
            $bundleProducts[] = $this->facadeCatalog->findProductEntityBySku($sku, [], false);
        }
        return new \ArrayObject($bundleProducts);
    }
    */

    /**
     * @param $attributeSetName
     * @return \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet
     */
    protected function getAttributeSet($attributeSetName)
    {
        $attributeSet = \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery::create()
            ->filterByName($attributeSetName)
            ->findOne();
        return $attributeSet;
    }

}
