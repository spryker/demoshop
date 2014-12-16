<?php
namespace Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition;

use ProjectA\Zed\Library\Workflow\TaskInterface;
use ProjectA\Zed\Catalog\Component\Model\Import\Product\Validator\Workflow\Definition\ValidateNewSingleProduct as CoreValidateNewSingleProduct;

class ValidateNewBundleProduct extends CoreValidateNewSingleProduct
{

    /**
     * @return TaskInterface[]
     */
    protected function getTasks()
    {
        return [
            $this->factory->createModelImportProductValidatorWorkflowTaskInsertValidateBaseFieldsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskSetAttributeSetToContextTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateAttributeSetExistsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateVarietyExistsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskInsertValidateMandatoryGroupTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateUnknownFieldsTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateAttributeOptionsExistTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateCategoriesExistTask(),
            $this->factory->createModelImportProductValidatorWorkflowTaskValidateProductOptionsExistTask(),
        ];
    }
}
