<?php 

namespace Generated\Zed\Sales\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class SalesFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA_Zed_Sales_Business_Internal_Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Internal_Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_Address_History
     */
    public function createModelAddressHistory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_Address_History');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_Address
     */
    public function createModelAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_Address');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\Bundle\SplitBundleDistributor
     */
    public function createModelBundleSplitBundleDistributor()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\Bundle\SplitBundleDistributor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\Comment
     */
    public function createModelComment()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\Comment');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\DefaultOrderNonSplitBundleItemBuilder
     */
    public function createModelDefaultOrderNonSplitBundleItemBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\DefaultOrderNonSplitBundleItemBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\DefaultOrderSplitBundleItemBuilder
     */
    public function createModelDefaultOrderSplitBundleItemBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\DefaultOrderSplitBundleItemBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_Expense
     */
    public function createModelExpense()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_Expense');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_History
     */
    public function createModelHistory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_History');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_IdentifierGenerator
     */
    public function createModelIdentifierGenerator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_IdentifierGenerator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_Item
     */
    public function createModelItem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_Item');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\OrderBuilder
     */
    public function createModelOrderBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\Decorator\CsvDecorator
     */
    public function createModelOrderExporterElementExporterDecoratorCsvDecorator($options = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\Decorator\CsvDecorator');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\Decorator\DecoratorException
     */
    public function createModelOrderExporterElementExporterDecoratorDecoratorException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\Decorator\DecoratorException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $fieldName
     * @param $format
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\DateFormatter
     */
    public function createModelOrderExporterElementExporterFieldFormatterDateFormatter($fieldName, $format)
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\DateFormatter');
        $model = new $class($fieldName, $format);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\FieldFormatterException
     */
    public function createModelOrderExporterElementExporterFieldFormatterFieldFormatterException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\FieldFormatterException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $fieldName
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\TrimFormatter
     */
    public function createModelOrderExporterElementExporterFieldFormatterTrimFormatter($fieldName)
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\FieldFormatter\TrimFormatter');
        $model = new $class($fieldName);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\OrderAddressElement
     */
    public function createModelOrderExporterElementExporterOrderAddressElement()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\OrderAddressElement');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\OrderElement
     */
    public function createModelOrderExporterElementExporterOrderElement()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\ElementExporter\OrderElement');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter\OrderExporterStrategy\CsvStrategy
     */
    public function createModelOrderExporterOrderExporterStrategyCsvStrategy($options = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter\OrderExporterStrategy\CsvStrategy');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Sales\Business\Model\OrderExporter\OrderExporterStrategy $strategy
     * @return \ProjectA\Zed\Sales\Business\Model\OrderExporter
     */
    public function createModelOrderExporter(\ProjectA\Zed\Sales\Business\Model\OrderExporter\OrderExporterStrategy $strategy)
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderExporter');
        $model = new $class($strategy);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\OrderItemBuilder
     */
    public function createModelOrderItemBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderItemBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Sales\Business\Model\OrderManager
     */
    public function createModelOrderManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Sales\Business\Model\OrderManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Sales_Business_Model_OrderNote
     */
    public function createModelOrderNote()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Business_Model_OrderNote');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Sales\Business\SalesFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('Pyz\Zed\Sales\Business\SalesFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Sales\Business\SalesSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Sales\Business\SalesSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
