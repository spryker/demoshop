<?php
namespace Pyz\Zed\Catalog\Component\Model\Import\Product\Writer\Workflow\Definition;

use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Library\Workflow\TaskInterface;
use ProjectA\Zed\Catalog\Component\Model\Import\Product\Writer\Workflow\Definition\WriteSingleProduct as CoreWriteSingleProduct;

class WriteSingleProduct extends CoreWriteSingleProduct
{

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
            $this->factory->createModelImportProductWriterWorkflowTaskAddStatusTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskEnsureUniqueUrlTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskAddTouchEntryTask(),
            $this->factory->createModelImportProductWriterWorkflowTaskSaveTask(),
        ];
    }
}
