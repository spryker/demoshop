<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Crud_Export extends ProjectA_Zed_Library_Crud
{
    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    /**
     * @var Sao_Zed_Catalog_Component_Gui_Form_Export
     */
    protected $form;

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Form_Export|Zend_Form
     */
    protected function getForm()
    {
        if (!$this->form) {
            $this->form = $this->factory->getGuiFormExport($this);
        }

        return $this->form;
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @return ProjectA_Zed_Library_Crud
     */
    public function init(ProjectA_Zed_Library_Controller_Action $controller)
    {
        $this->post = $controller->getRequest()->getPost();
        $this->form = $this->getForm();
        $this->setViewOverride($controller->view);
        return $this;
    }

    /**
     * @param Zend_View_Interface $view
     */
    protected function setViewOverride(Zend_View_Interface $view)
    {
        $this->view = $view;
        $this->view->form = $this->form;
        $this->view->crud = $this;

        if ($this->isPost() && !$this->isValid()) {
            /* @var $element Zend_Form_Element */
            foreach ($this->form->getElements() as $element) {
                foreach ($element->getErrors() as $error) {
                    ProjectA_Zed_Library_FlashMessage::getInstance()->addError(__($error));
                }
            }
        }
    }

    /**
     * @return BaseObject
     */
    protected function getEntity()
    {
    }

    /**
     * @return ModelCriteria|void
     */
    protected function getQuery()
    {
    }

    /**
     * @return ProjectA_Zed_Library_Ui_Container|void
     */
    public function render()
    {
        $container = ProjectA_Zed_Library_Ui_Container_Factory::getContainer();
        $container->setTitle(__('Export Data to CSV'));
        $container->setContent($this->form->render());
        return $container->render();
    }

    /**
     * @see project implementation
     * @return array|ProjectA_Zed_Library_Component_Model_Result
     */
    public function save()
    {
        $exporter = $this->factory->getModelExport();

        $allColumns = $exporter->getAttributesTypes();
        $columnsToShow = array();

        // adding main columns
        $mainColumns = $exporter->getAttributesMain();

        // adding only integer value
        $columnName = 'SKU';
        if (isset($this->post[$columnName.'_condition_type']) && $this->post[$columnName.'_condition_type'] != '') {
            $exporter->addParam('sku', $this->post[$columnName], $this->post[$columnName.'_condition_type'], PDO::PARAM_INT);
            unset($this->post[$columnName]);
        }

        // adding main option values
        $optionFields = array(
            'is_item' => 'isItem',
            'status' => 'Status',
            'variety' => 'Variety',
            'fk_catalog_attribute_set' => 'AttributeSet'
        );

        foreach ($optionFields as $columnKey => $columnName) {
            if (isset($this->post[$columnName.'_condition_type']) && $this->post[$columnName.'_condition_type'] != '') {
                $exporter->addParam($columnKey, $this->post[$columnName.'_condition_type'], Criteria::EQUAL, PDO::PARAM_STR);
                unset($this->post[$columnName]);
            }
        }

        foreach ($mainColumns as $columnKey => $column) {

            if (!empty($this->post['show_'.$column['name']]))
                $columnsToShow[] = $columnKey;
        }

        // adding additional columns
        foreach ($allColumns as $columnName => $columnProperties) {
            // check if we need to export this property
            if (!empty($this->post['show_'.$columnName]))
                $columnsToShow[] = $columnName;

            // check if have a condition
            if (isset($this->post[$columnName.'_condition_type']) && $this->post[$columnName.'_condition_type'] != '') {
                $condition = $this->post[$columnName.'_condition_type'];
                $value = isset($this->post[$columnName]) ?
                    $this->post[$columnName] :
                    $this->post[$columnName.'_condition_type'];
            } else {
                continue;
            }

            switch($columnProperties['type'])
            {
                case 'integer':
                    $exporter->addCriteriaInteger($columnProperties['id'], $value, $condition);
                    break;
                case 'decimal':
                    $exporter->addCriteriaDecimal($columnProperties['id'], $value, $condition);
                    break;
                case 'boolean':
                    $exporter->addCriteriaBoolean($columnProperties['id'], $value);
                    break;
                case 'OptionSingle':
                    $exporter->addCriteriaOptionSingle($columnProperties['id'], $value);
                    break;
                case 'Text':
                    $exporter->addCriteriaText($columnProperties['id'], $value, $condition);
                    break;
            }
        }

        $exporter->export($columnsToShow);
    }

    public function sendSettingsFile()
    {
        $settings = array();

        foreach ($this->post as $key => $value) {
            if ($value != '' && !($value === '0' && strpos($key,'show_') === 0)) {
                $settings[$key] = $value;
            }
        }

        header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="exportSettings.txt"');
        echo json_encode($settings);
    }
}
