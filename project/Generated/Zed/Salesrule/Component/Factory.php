<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Salesrule_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Salesrule_Component_Facade_Codepool
     */
    public function getFacadeCodepool()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Facade_Codepool');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Facade_Condition
     */
    public function getFacadeCondition()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Facade_Condition');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Facade_Gui');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Gui_Form_Code
     */
    public function getGuiFormCode($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Form_Code');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Gui_Form_CodeBulk
     */
    public function getGuiFormCodeBulk($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Form_CodeBulk');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Gui_Form_Codepool
     */
    public function getGuiFormCodepool($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Form_Codepool');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Gui_Form_Salesrule
     */
    public function getGuiFormSalesrule()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Gui_Form_Salesrule');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Gui_Form_Validator_Salesrule
     */
    public function getGuiFormValidatorSalesrule()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Form_Validator_Salesrule');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Gui_Grid_Codepools
     */
    public function getGuiGridCodepools($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Grid_Codepools');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $data 
     * @param mixed $codepoolId 
     * @return ProjectA_Zed_Salesrule_Component_Gui_Grid_Codes
     */
    public function getGuiGridCodes($data, $codepoolId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Grid_Codes');
        $model = new $class($data, $codepoolId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param array $config (optional) default: array()
     * @return ProjectA_Zed_Salesrule_Component_Gui_Grid_Conditions
     */
    public function getGuiGridConditions($config = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Gui_Grid_Conditions');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return Sao_Zed_Salesrule_Component_Gui_Grid_Salesrules
     */
    public function getGuiGridSalesrules($config = null)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Gui_Grid_Salesrules');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_Fixed
     */
    public function getModelActionsFixed(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_Fixed');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_MaxShipping
     */
    public function getModelActionsMaxShipping(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_MaxShipping');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_Percent
     */
    public function getModelActionsPercent(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_Percent');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_PercentShipping
     */
    public function getModelActionsPercentShipping(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_PercentShipping');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Model_Codepool
     */
    public function getModelCodepool()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Codepool');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Model_Condition
     */
    public function getModelCondition()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Condition');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween
     */
    public function getModelConditionsDateBetween($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_MinimumOrderSubtotal
     */
    public function getModelConditionsMinimumOrderSubtotal($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_MinimumOrderSubtotal');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_SimpleFalse
     */
    public function getModelConditionsSimpleFalse($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_SimpleFalse');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_SimpleTrue
     */
    public function getModelConditionsSimpleTrue($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_SimpleTrue');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_ValidFrom
     */
    public function getModelConditionsValidFrom($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_ValidFrom');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_ValidTo
     */
    public function getModelConditionsValidTo($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_ValidTo');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $configuration (optional) default: null
     * @return ProjectA_Zed_Salesrule_Component_Model_Conditions_VoucherCodeInPool
     */
    public function getModelConditionsVoucherCodeInPool($configuration = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Conditions_VoucherCodeInPool');
        $model = new $class($configuration);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @return ProjectA_Zed_Salesrule_Component_Model_ConditionStack
     */
    public function getModelConditionStack(Sao_Shared_Sales_Transfer_Order $order)
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_ConditionStack');
        $model = new $class($order);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Model_Logger
     */
    public function getModelLogger()
    {
        $class = $this->transformClassName('ProjectA_Zed_Salesrule_Component_Model_Logger');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Model_Salesrule
     */
    public function getModelSalesrule()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Salesrule');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_FixedOriginals
     */
    public function getModelActionsFixedOriginals(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_FixedOriginals');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_FixedPrints
     */
    public function getModelActionsFixedPrints(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_FixedPrints');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_PercentOriginals
     */
    public function getModelActionsPercentOriginals(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_PercentOriginals');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule 
     * @return Sao_Zed_Salesrule_Component_Model_Actions_PercentPrints
     */
    public function getModelActionsPercentPrints(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_Actions_PercentPrints');
        $model = new $class($order, $salesrule);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Salesrule_Component_Model_CostDistribution
     */
    public function getModelCostDistribution()
    {
        $class = $this->transformClassName('Sao_Zed_Salesrule_Component_Model_CostDistribution');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
