<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Customer_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Customer_Component_Facade_Address
     */
    public function getFacadeAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Facade_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Gui_Crud_Address
     */
    public function getGuiCrudAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Crud_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Gui_Crud_Customer
     */
    public function getGuiCrudCustomer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Crud_Customer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Customer_Component_Gui_Form_Address
     */
    public function getGuiFormAddress($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Form_Address');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Customer_Component_Gui_Form_Customer
     */
    public function getGuiFormCustomer($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Form_Customer');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Customer_Component_Gui_Grid_Address
     */
    public function getGuiGridAddress($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Grid_Address');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Customer_Component_Gui_Grid_Customer
     */
    public function getGuiGridCustomer($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Gui_Grid_Customer');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Address
     */
    public function getModelAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Authentication
     */
    public function getModelAuthentication()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Authentication');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Customer
     */
    public function getModelCustomer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Customer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Password
     */
    public function getModelPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Password');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Context
     */
    public function getModelWorkflowContext()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Context');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ChangePassword
     */
    public function getModelWorkflowDefinitionChangePassword(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ChangePassword');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Definition_CheckCredentials
     */
    public function getModelWorkflowDefinitionCheckCredentials(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_CheckCredentials');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ForgotPasswordSetNewPassword
     */
    public function getModelWorkflowDefinitionForgotPasswordSetNewPassword(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ForgotPasswordSetNewPassword');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ForgotPasswordStart
     */
    public function getModelWorkflowDefinitionForgotPasswordStart(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_ForgotPasswordStart');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Definition_RegisterNewCustomer
     */
    public function getModelWorkflowDefinitionRegisterNewCustomer(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_RegisterNewCustomer');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Customer_Transfer_Customer $customerTransfer
     * @param ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity (optional)
     * default: null
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Definition_UpdateCustomer
     */
    public function getModelWorkflowDefinitionUpdateCustomer(ProjectA_Shared_Customer_Transfer_Customer $customerTransfer, ProjectA_Zed_Customer_Persistence_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Definition_UpdateCustomer');
        $model = new $class($customerTransfer, $customerEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_CheckTransferEmailDoesNotExist
     */
    public function getModelWorkflowTaskCheckTransferEmailDoesNotExist()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_CheckTransferEmailDoesNotExist');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Task_GenerateIncrement
     */
    public function getModelWorkflowTaskGenerateIncrement()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_GenerateIncrement');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param int $length (optional) default: 60
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_GenerateForgotPasswordKey
     */
    public function getModelWorkflowTaskPasswordGenerateForgotPasswordKey($length = 60)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_GenerateForgotPasswordKey');
        $model = new $class($length);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param int $length (optional) default: 12
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_GenerateRandomPassword
     */
    public function getModelWorkflowTaskPasswordGenerateRandomPassword($length = 12)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_GenerateRandomPassword');
        $model = new $class($length);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_HashNewPassword
     */
    public function getModelWorkflowTaskPasswordHashNewPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_HashNewPassword');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_HashPassword
     */
    public function getModelWorkflowTaskPasswordHashPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_HashPassword');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ResetForgotPasswordKey
     */
    public function getModelWorkflowTaskPasswordResetForgotPasswordKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ResetForgotPasswordKey');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_UnsetNewPassword
     */
    public function getModelWorkflowTaskPasswordUnsetNewPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_UnsetNewPassword');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_UnsetPassword
     */
    public function getModelWorkflowTaskPasswordUnsetPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_UnsetPassword');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param bool $allowEmpty (optional) default: false
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ValidateNewPasswordSyntax
     */
    public function getModelWorkflowTaskPasswordValidateNewPasswordSyntax($allowEmpty = false)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ValidateNewPasswordSyntax');
        $model = new $class($allowEmpty);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param bool $allowEmpty (optional) default: false
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ValidatePasswordSyntax
     */
    public function getModelWorkflowTaskPasswordValidatePasswordSyntax($allowEmpty = false)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_ValidatePasswordSyntax');
        $model = new $class($allowEmpty);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_VerifyForgotPasswordKey
     */
    public function getModelWorkflowTaskPasswordVerifyForgotPasswordKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_VerifyForgotPasswordKey');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_VerifyPassword
     */
    public function getModelWorkflowTaskPasswordVerifyPassword()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Password_VerifyPassword');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Propel_BeginTransaction
     */
    public function getModelWorkflowTaskPropelBeginTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Propel_BeginTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_Propel_CommitTransaction
     */
    public function getModelWorkflowTaskPropelCommitTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Propel_CommitTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Task_Save
     */
    public function getModelWorkflowTaskSave()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_Save');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $status
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Task_SetStatus
     */
    public function getModelWorkflowTaskSetStatus($status)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_SetStatus');
        $model = new $class($status);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_UpdateDataFromTransfer
     */
    public function getModelWorkflowTaskUpdateDataFromTransfer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_UpdateDataFromTransfer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $status
     * @return
     * ProjectA_Zed_Customer_Component_Model_Workflow_Task_ValidateCustomerStatus
     */
    public function getModelWorkflowTaskValidateCustomerStatus($status)
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_ValidateCustomerStatus');
        $model = new $class($status);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_Task_ValidateEntity
     */
    public function getModelWorkflowTaskValidateEntity()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_Task_ValidateEntity');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Customer_Component_Model_Workflow_TaskInvoker
     */
    public function getModelWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA_Zed_Customer_Component_Model_Workflow_TaskInvoker');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Customer_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Customer_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
