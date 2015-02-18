<?php 

namespace Generated\Zed\Customer\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CustomerFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Customer\Business\CustomerFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\CustomerFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Customer\Business\CustomerSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Customer\Business\CustomerSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Address
     */
    public function createModelAddress()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Address');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Authentication
     */
    public function createModelAuthentication()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Authentication');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Customer
     */
    public function createModelCustomer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Customer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Customer\Business\Model\Order
     */
    public function createModelOrder()
    {
        $class = $this->transformClassName('Pyz\Zed\Customer\Business\Model\Order');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Password
     */
    public function createModelPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Password');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Context
     */
    public function createModelWorkflowContext()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Context');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ChangeEmail
     */
    public function createModelWorkflowDefinitionChangeEmail(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ChangeEmail');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ChangePassword
     */
    public function createModelWorkflowDefinitionChangePassword(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ChangePassword');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\CheckCredentials
     */
    public function createModelWorkflowDefinitionCheckCredentials(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\CheckCredentials');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ConfirmRegistration
     */
    public function createModelWorkflowDefinitionConfirmRegistration(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ConfirmRegistration');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ForgotPasswordSetNewPassword
     */
    public function createModelWorkflowDefinitionForgotPasswordSetNewPassword(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ForgotPasswordSetNewPassword');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ForgotPasswordStart
     */
    public function createModelWorkflowDefinitionForgotPasswordStart(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\ForgotPasswordStart');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\RegisterCustomer
     */
    public function createModelWorkflowDefinitionRegisterCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\RegisterCustomer');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Definition\UpdateCustomer
     */
    public function createModelWorkflowDefinitionUpdateCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Definition\UpdateCustomer');
        $model = new $class($customerTransfer, $customerEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $successMessage
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\AddSuccessMessageToTransfer
     */
    public function createModelWorkflowTaskAddSuccessMessageToTransfer($successMessage)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\AddSuccessMessageToTransfer');
        $model = new $class($successMessage);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\CheckTransferEmailDoesNotExist
     */
    public function createModelWorkflowTaskCheckTransferEmailDoesNotExist()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\CheckTransferEmailDoesNotExist');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\GenerateIncrement
     */
    public function createModelWorkflowTaskGenerateIncrement()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\GenerateIncrement');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $length (optional) default: 60
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\GenerateRegistrationKey
     */
    public function createModelWorkflowTaskGenerateRegistrationKey($length = 60)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\GenerateRegistrationKey');
        $model = new $class($length);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Customer\Business\Model\Workflow\Context $context
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\LoadCustomerByRegistrationKey
     */
    public function createModelWorkflowTaskLoadCustomerByRegistrationKey(\ProjectA\Zed\Customer\Business\Model\Workflow\Context $context)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\LoadCustomerByRegistrationKey');
        $model = new $class($context);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Mail\SendPasswordForgot
     */
    public function createModelWorkflowTaskMailSendPasswordForgot()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Mail\SendPasswordForgot');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Mail\SendRegistration
     */
    public function createModelWorkflowTaskMailSendRegistration()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Mail\SendRegistration');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateForgotPasswordDate
     */
    public function createModelWorkflowTaskPasswordGenerateForgotPasswordDate()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateForgotPasswordDate');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $length (optional) default: 60
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateForgotPasswordKey
     */
    public function createModelWorkflowTaskPasswordGenerateForgotPasswordKey($length = 60)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateForgotPasswordKey');
        $model = new $class($length);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $length (optional) default: 12
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateRandomPassword
     */
    public function createModelWorkflowTaskPasswordGenerateRandomPassword($length = 12)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\GenerateRandomPassword');
        $model = new $class($length);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\HashNewPassword
     */
    public function createModelWorkflowTaskPasswordHashNewPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\HashNewPassword');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\HashPassword
     */
    public function createModelWorkflowTaskPasswordHashPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\HashPassword');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ResetForgotPasswordDate
     */
    public function createModelWorkflowTaskPasswordResetForgotPasswordDate()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ResetForgotPasswordDate');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ResetForgotPasswordKey
     */
    public function createModelWorkflowTaskPasswordResetForgotPasswordKey()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ResetForgotPasswordKey');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\UnsetNewPassword
     */
    public function createModelWorkflowTaskPasswordUnsetNewPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\UnsetNewPassword');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\UnsetPassword
     */
    public function createModelWorkflowTaskPasswordUnsetPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\UnsetPassword');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $allowEmpty (optional) default: false
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ValidateNewPasswordSyntax
     */
    public function createModelWorkflowTaskPasswordValidateNewPasswordSyntax($allowEmpty = false)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ValidateNewPasswordSyntax');
        $model = new $class($allowEmpty);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $allowEmpty (optional) default: false
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ValidatePasswordSyntax
     */
    public function createModelWorkflowTaskPasswordValidatePasswordSyntax($allowEmpty = false)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\ValidatePasswordSyntax');
        $model = new $class($allowEmpty);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\VerifyForgotPasswordKey
     */
    public function createModelWorkflowTaskPasswordVerifyForgotPasswordKey()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\VerifyForgotPasswordKey');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\VerifyPassword
     */
    public function createModelWorkflowTaskPasswordVerifyPassword()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Password\VerifyPassword');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Propel\BeginTransaction
     */
    public function createModelWorkflowTaskPropelBeginTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Propel\BeginTransaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Propel\CommitTransaction
     */
    public function createModelWorkflowTaskPropelCommitTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Propel\CommitTransaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\ResetRegistrationKey
     */
    public function createModelWorkflowTaskResetRegistrationKey()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\ResetRegistrationKey');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\Save
     */
    public function createModelWorkflowTaskSave()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\Save');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $status (optional) default: null
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\SetStatus
     */
    public function createModelWorkflowTaskSetStatus($status = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\SetStatus');
        $model = new $class($status);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\UpdateDataFromTransfer
     */
    public function createModelWorkflowTaskUpdateDataFromTransfer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\UpdateDataFromTransfer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $status
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\ValidateCustomerStatus
     */
    public function createModelWorkflowTaskValidateCustomerStatus($status)
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\ValidateCustomerStatus');
        $model = new $class($status);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\Task\ValidateEntity
     */
    public function createModelWorkflowTaskValidateEntity()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\Task\ValidateEntity');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Customer\Business\Model\Workflow\TaskInvoker
     */
    public function createModelWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA\Zed\Customer\Business\Model\Workflow\TaskInvoker');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
