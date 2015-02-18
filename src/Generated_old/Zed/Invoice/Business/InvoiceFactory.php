<?php 

namespace Generated\Zed\Invoice\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class InvoiceFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Invoice\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Invoice\Business\InvoiceFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\InvoiceFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Invoice\Business\InvoiceSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\InvoiceSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice $invoice
     * @param \Traversable $orderItems (optional) default: null
     * @return \ProjectA\Zed\Invoice\Business\Model\Collector\Invoice
     */
    public function createModelCollectorInvoice(\ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice $invoice, \Traversable $orderItems = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\Model\Collector\Invoice');
        $model = new $class($invoice, $orderItems);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Invoice\Business\Model\Document
     */
    public function createModelDocument()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\Model\Document');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Invoice\Business\Model\Invoice
     */
    public function createModelInvoice()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\Model\Invoice');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Invoice\Business\Model\Number
     */
    public function createModelNumber()
    {
        $class = $this->transformClassName('ProjectA\Zed\Invoice\Business\Model\Number');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Invoice_Business_Model_ReverseInvoice
     */
    public function createModelReverseInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Business_Model_ReverseInvoice');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
