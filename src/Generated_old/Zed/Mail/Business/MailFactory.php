<?php 

namespace Generated\Zed\Mail\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class MailFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \Pyz\Zed\Mail\Business\MailFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\MailFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\MailSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\MailSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Adapter\DatabaseQueueMailAdapter
     */
    public function createModelAdapterDatabaseQueueMailAdapter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Adapter\DatabaseQueueMailAdapter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Adapter\DirectMailAdapter
     */
    public function createModelAdapterDirectMailAdapter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Adapter\DirectMailAdapter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Adapter\MailAdapterLoader
     */
    public function createModelAdapterMailAdapterLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Adapter\MailAdapterLoader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity
     * @param $isUnique (optional) default: true
     * @return \Pyz\Zed\Mail\Business\Model\Collector\CustomerMailCollector
     */
    public function createModelCollectorCustomerMailCollector($mailType, \ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $customerEntity, $isUnique = true)
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Collector\CustomerMailCollector');
        $model = new $class($mailType, $customerEntity, $isUnique);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $orderItemEntity
     * @param $isUnique (optional) default: true
     * @return \ProjectA\Zed\Mail\Business\Model\Collector\OrderItemMailCollector
     */
    public function createModelCollectorOrderItemMailCollector($mailType, \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $orderItemEntity, $isUnique = true)
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Collector\OrderItemMailCollector');
        $model = new $class($mailType, $orderItemEntity, $isUnique);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param $orderItems
     * @param $isUnique (optional) default: true
     * @return \ProjectA\Zed\Mail\Business\Model\Collector\OrderMailCollector
     */
    public function createModelCollectorOrderMailCollector($mailType, $orderItems, $isUnique = true)
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Collector\OrderMailCollector');
        $model = new $class($mailType, $orderItems, $isUnique);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param $orderItems
     * @param $isUnique (optional) default: true
     * @return \ProjectA\Zed\Mail\Business\Model\Collector\OrderMailWithInvoiceCollector
     */
    public function createModelCollectorOrderMailWithInvoiceCollector($mailType, $orderItems, $isUnique = true)
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Collector\OrderMailWithInvoiceCollector');
        $model = new $class($mailType, $orderItems, $isUnique);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param $referenceId
     * @param $recipientAddress
     * @param $data
     * @param $isUnique (optional) default: true
     * @param $mailSubType (optional) default: null
     * @return \ProjectA\Zed\Mail\Business\Model\Collector\StandardMailCollector
     */
    public function createModelCollectorStandardMailCollector($mailType, $referenceId, $recipientAddress, $data, $isUnique = true, $mailSubType = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Collector\StandardMailCollector');
        $model = new $class($mailType, $referenceId, $recipientAddress, $data, $isUnique, $mailSubType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator
     * @return \ProjectA\Zed\Mail\Business\Model\Helper\ItemGrouper
     */
    public function createModelHelperItemGrouper(\ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Helper\ItemGrouper');
        $model = new $class($transferLocator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Mail
     */
    public function createModelMail()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Mail');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Mail_Business_Model_Provider_Emarsys_Factory
     */
    public function createModelProviderEmarsysFactory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Business_Model_Provider_Emarsys_Factory');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Mail_Business_Model_Provider_Emarsys_Params
     */
    public function createModelProviderEmarsysParams()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mail_Business_Model_Provider_Emarsys_Params');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\EmarsysMailProvider
     */
    public function createModelProviderEmarsysMailProvider()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\EmarsysMailProvider');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\MailProviderLoader
     */
    public function createModelProviderMailProviderLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\MailProviderLoader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\MailProviderResponse
     */
    public function createModelProviderMailProviderResponse()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\MailProviderResponse');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Factory
     */
    public function createModelProviderMandrillFactory()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Factory');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\Mandrill\MandrillSettings
     */
    public function createModelProviderMandrillMandrillSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\Mandrill\MandrillSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\Mandrill\Subject
     */
    public function createModelProviderMandrillSubject()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\Mandrill\Subject');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\MandrillMailProvider
     */
    public function createModelProviderMandrillMailProvider()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\MandrillMailProvider');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Recipient
     */
    public function createModelProviderSendMailRecipient()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Recipient');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Sender
     */
    public function createModelProviderSendMailSender()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Sender');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\SendMail\SendMailSettings
     */
    public function createModelProviderSendMailSendMailSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\SendMail\SendMailSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Subject
     */
    public function createModelProviderSendMailSubject()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\SendMail\Subject');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\SendMail\TemplateGenerator
     */
    public function createModelProviderSendMailTemplateGenerator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\SendMail\TemplateGenerator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Provider\SendMailMailProvider
     */
    public function createModelProviderSendMailMailProvider()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Provider\SendMailMailProvider');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Queue\DatabaseQueue
     */
    public function createModelQueueDatabaseQueue()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Queue\DatabaseQueue');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Renderer\BasicRenderer
     */
    public function createModelRendererBasicRenderer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Renderer\BasicRenderer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Renderer\ConditionRenderer
     */
    public function createModelRendererConditionRenderer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Renderer\ConditionRenderer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Renderer\LoopRenderer
     */
    public function createModelRendererLoopRenderer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Renderer\LoopRenderer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Renderer\PartialRenderer
     */
    public function createModelRendererPartialRenderer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Renderer\PartialRenderer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Renderer\TranslationRenderer
     */
    public function createModelRendererTranslationRenderer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Renderer\TranslationRenderer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Mail\Business\Model\Template
     */
    public function createModelTemplate()
    {
        $class = $this->transformClassName('ProjectA\Zed\Mail\Business\Model\Template');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $mailType
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity
     * @param $additionalData
     * @param $isUnique (optional) default: true
     * @return \Pyz\Zed\Mail\Business\Model\Collector\OrderMailWithAdditionalDataCollector
     */
    public function createModelCollectorOrderMailWithAdditionalDataCollector($mailType, \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity, $additionalData, $isUnique = true)
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Collector\OrderMailWithAdditionalDataCollector');
        $model = new $class($mailType, $orderEntity, $additionalData, $isUnique);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerPasswordForgottenMapper
     */
    public function createModelProviderMandrillMapperCustomerPasswordForgottenMapper()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerPasswordForgottenMapper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerRegistrationMapper
     */
    public function createModelProviderMandrillMapperCustomerRegistrationMapper()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\CustomerRegistrationMapper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\DefaultMapper
     */
    public function createModelProviderMandrillMapperDefaultMapper()
    {
        $class = $this->transformClassName('Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper\DefaultMapper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
