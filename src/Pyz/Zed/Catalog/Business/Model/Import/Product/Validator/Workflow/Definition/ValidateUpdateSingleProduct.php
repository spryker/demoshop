<?php
namespace Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition;

use ProjectA\Zed\Library\Workflow\TaskInterface;
use ProjectA\Zed\Catalog\Component\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateSingleProduct as CoreValidateUpdateSingleProduct;

class ValidateUpdateSingleProduct extends CoreValidateUpdateSingleProduct
{
    /**
     * @return TaskInterface[]
     */
    protected function getTasks()
    {
        return [
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateVarietyExistsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskSetAttributeSetToContextTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskUpdateValidateNoAttributeSetChangeTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateUnknownFieldsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateAttributeOptionsExistTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateCategoriesExistTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateProductOptionsExistTask(),
        ];
    }
}
