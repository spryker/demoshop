<?php
namespace Pyz\Zed\Catalog\Component\Model\Import\Product\Validator\Workflow\Definition;

use ProjectA\Zed\Catalog\Component\Model\Import\Product\Validator\Workflow\Definition\AbstractDefinition;
use ProjectA\Zed\Library\Workflow\TaskInterface;

class ValidateNewSimpleProduct extends AbstractDefinition
{

    /**
     * @return TaskInterface[]
     */
    protected function getTasks()
    {
        return [
            $this->factory->createModelImportProductValidatorWorkflowTaskInsertValidateBaseFieldsTask(),
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
