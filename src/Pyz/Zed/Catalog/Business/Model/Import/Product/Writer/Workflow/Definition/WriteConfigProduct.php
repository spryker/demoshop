<?php
namespace Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition;

use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeInterface;
use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite;
use ProjectA\Zed\Catalog\Business\Model\Import\Product\FieldnameConstantInterface;
use ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\AbstractDefinition;
use ProjectA\Zed\Library\Workflow\TaskInterface;

class WriteConfigProduct extends AbstractDefinition implements CatalogFacadeInterface
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
        $attributeSetField = $fieldNames[FieldnameConstantInterface::ATTRIBUTE_SET];
        $statusField = $fieldNames[FieldnameConstantInterface::STATUS];

        return $this->facadeCatalog->createNewConfigProduct(
            $productData[$skuField],
            $productData[$attributeSetField],
            [],
            $productData[$statusField]
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
        $product = $this->facadeCatalog->getConfigBySku($productData[$skuField], [], false);

        return $product;
    }
}
