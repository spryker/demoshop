<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Mail_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Mail_Component_Adapter_DatabaseQueue
     */
    public function getAdapterDatabaseQueue()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Adapter_DatabaseQueue');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Adapter_Direct
     */
    public function getAdapterDirect()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Adapter_Direct');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Adapter_Provider_Emarsys
     */
    public function getAdapterProviderEmarsys()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Adapter_Provider_Emarsys');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Adapter_Provider_Mandrill
     */
    public function getAdapterProviderMandrill()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Adapter_Provider_Mandrill');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Adapter_Provider_SendMail
     */
    public function getAdapterProviderSendMail()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Adapter_Provider_SendMail');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Model_Factory
     */
    public function getModelFactory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Model_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Model_Mail
     */
    public function getModelMail()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Model_Mail');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Model_Provider_Response
     */
    public function getModelProviderResponse()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Model_Provider_Response');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Model_Queue_Database
     */
    public function getModelQueueDatabase()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Model_Queue_Database');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Emarsys_Factory
     */
    public function getProviderEmarsysFactory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Emarsys_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Emarsys_Params
     */
    public function getProviderEmarsysParams()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Emarsys_Params');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Emarsys
     */
    public function getProviderEmarsys()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Emarsys');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Mandrill_Factory
     */
    public function getProviderMandrillFactory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Mandrill_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Mandrill_Subject
     */
    public function getProviderMandrillSubject()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Mandrill_Subject');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_Mandrill
     */
    public function getProviderMandrill()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_Mandrill');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Provider_SendMail_Recipient
     */
    public function getProviderSendMailRecipient()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Provider_SendMail_Recipient');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Provider_SendMail_Sender
     */
    public function getProviderSendMailSender()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Provider_SendMail_Sender');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Provider_SendMail_TemplateGenerator
     */
    public function getProviderSendMailTemplateGenerator()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Provider_SendMail_TemplateGenerator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mail_Component_Provider_SendMail
     */
    public function getProviderSendMail()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Component_Provider_SendMail');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Settings_SendMail
     */
    public function getSettingsSendMail()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Settings_SendMail');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Facade_Gui');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $sequenceId 
     * @return Sao_Zed_Mail_Component_Gui_Crud_Sequence_Element
     */
    public function getGuiCrudSequenceElement($sequenceId)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Crud_Sequence_Element');
        $model = new $class($sequenceId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Gui_Crud_Sequence
     */
    public function getGuiCrudSequence()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Crud_Sequence');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Gui_Crud_Template
     */
    public function getGuiCrudTemplate()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Crud_Template');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options 
     * @param mixed $crud 
     * @return Sao_Zed_Mail_Component_Gui_Form_Sequence_Element
     */
    public function getGuiFormSequenceElement($options, $crud)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Form_Sequence_Element');
        $model = new $class($options, $crud);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Form_Sequence
     */
    public function getGuiFormSequence($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Form_Sequence');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $templateVersion 
     * @param mixed $options (optional) default: null
     * @param Sao_Zed_Mail_Component_Gui_Crud_Template $crud (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Form_Template_Version
     */
    public function getGuiFormTemplateVersion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $templateVersion, $options = null, Sao_Zed_Mail_Component_Gui_Crud_Template $crud = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Form_Template_Version');
        $model = new $class($templateVersion, $options, $crud);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @param Sao_Zed_Mail_Component_Gui_Crud_Template $crud (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Form_Template
     */
    public function getGuiFormTemplate($options = null, Sao_Zed_Mail_Component_Gui_Crud_Template $crud = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Form_Template');
        $model = new $class($options, $crud);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Grid_Sequence_Element
     */
    public function getGuiGridSequenceElement($config = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Grid_Sequence_Element');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Grid_Sequence
     */
    public function getGuiGridSequence($config = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Grid_Sequence');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return Sao_Zed_Mail_Component_Gui_Grid_Template
     */
    public function getGuiGridTemplate($config = null)
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Gui_Grid_Template');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Internal_Migration_Template
     */
    public function getInternalMigrationTemplate()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Internal_Migration_Template');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_CartAbandoned
     */
    public function getModelCartAbandoned()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_CartAbandoned');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_AccountingAwaitingRefund
     */
    public function getModelCollectorAccountingAwaitingRefund()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_AccountingAwaitingRefund');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ArtistSalesNotification
     */
    public function getModelCollectorArtistSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ArtistSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_ArtistSalesNotificationManufactured
     */
    public function getModelCollectorArtistSalesNotificationManufactured()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ArtistSalesNotificationManufactured');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_BlockArtist
     */
    public function getModelCollectorBlockArtist()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_BlockArtist');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence1
     */
    public function getModelCollectorCartAbandonedStepCartSequence1()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence1');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence2
     */
    public function getModelCollectorCartAbandonedStepCartSequence2()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence2');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence3
     */
    public function getModelCollectorCartAbandonedStepCartSequence3()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepCart_Sequence3');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence1
     */
    public function getModelCollectorCartAbandonedStepPaymentSequence1()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence1');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence2
     */
    public function getModelCollectorCartAbandonedStepPaymentSequence2()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence2');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence3
     */
    public function getModelCollectorCartAbandonedStepPaymentSequence3()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence3');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence1
     */
    public function getModelCollectorCartAbandonedStepReviewSequence1()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence1');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence2
     */
    public function getModelCollectorCartAbandonedStepReviewSequence2()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence2');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence3
     */
    public function getModelCollectorCartAbandonedStepReviewSequence3()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence3');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ClarifyArtworkAvailability
     */
    public function getModelCollectorClarifyArtworkAvailability()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ClarifyArtworkAvailability');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ClarifyHandpicked
     */
    public function getModelCollectorClarifyHandpicked()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ClarifyHandpicked');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ConfirmArtworkAvailability
     */
    public function getModelCollectorConfirmArtworkAvailability()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ConfirmArtworkAvailability');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_FirstArtistArtworkAvailabilityReminder
     */
    public function getModelCollectorFirstArtistArtworkAvailabilityReminder()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_FirstArtistArtworkAvailabilityReminder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ItemNotDelivered
     */
    public function getModelCollectorItemNotDelivered()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ItemNotDelivered');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_Manager
     */
    public function getModelCollectorManager()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_Manager');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ManualProcess
     */
    public function getModelCollectorManualProcess()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ManualProcess');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_OrderConfirmation
     */
    public function getModelCollectorOrderConfirmation()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_OrderConfirmation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_PayoutRequestPossible
     */
    public function getModelCollectorPayoutRequestPossible()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_PayoutRequestPossible');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_PreShippingInfoOriginal
     */
    public function getModelCollectorPreShippingInfoOriginal()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_PreShippingInfoOriginal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_PrintFileCheckFailure
     */
    public function getModelCollectorPrintFileCheckFailure()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_PrintFileCheckFailure');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Mail_Component_Model_Collector_SecondArtistArtworkAvailabilityReminder
     */
    public function getModelCollectorSecondArtistArtworkAvailabilityReminder()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_SecondArtistArtworkAvailabilityReminder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ShippingInfoOriginal
     */
    public function getModelCollectorShippingInfoOriginal()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ShippingInfoOriginal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Collector_ShippingInfoPrint
     */
    public function getModelCollectorShippingInfoPrint()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Collector_ShippingInfoPrint');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Renderer_Basic
     */
    public function getModelRendererBasic()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Renderer_Basic');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Renderer_Condition
     */
    public function getModelRendererCondition()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Renderer_Condition');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Renderer_Loop
     */
    public function getModelRendererLoop()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Renderer_Loop');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Renderer_Partial
     */
    public function getModelRendererPartial()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Renderer_Partial');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mail_Component_Model_Template
     */
    public function getModelTemplate()
    {
        $class = $this->transformClassName('Sao_Zed_Mail_Component_Model_Template');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
