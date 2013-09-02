<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Crud_Import extends ProjectA_Zed_Library_Crud
{
    /**
     * @var Sao_Zed_Catalog_Component_Gui_Form_Import
     */
    protected $form;

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Form_Import|Zend_Form
     */
    protected function getForm()
    {
        if (!$this->form) {
            $this->form = $this->factory->getGuiFormImport($this);
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
        $container->setTitle(__('Upload File'));
        $container->setContent($this->form->render());
        return $container->render();
    }

    /**
     * @see project implementation
     * @return array|ProjectA_Zed_Library_Component_Model_Result
     */
    public function save()
    {
        //rename file on upload, add Datetime in front
        $upload = new Zend_File_Transfer_Adapter_Http();
        $fileInfo = $upload->getFileInfo();
        $uploadedFileName = $fileInfo[$this->form->getFormElementImportFileName()]['name'];
        $pathInfo = pathinfo($uploadedFileName);
        $destination = rtrim($this->form->getDestination(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $newFileName = sprintf(
            '%s_%s.%s',
            date('YmdHis'),
            $pathInfo['filename'],
            $pathInfo['extension']
        );
        $upload->addFilter('Rename', $destination . $newFileName);
        $upload->receive();

        //now call the catalog importer with the file
        return $this->factory->getModelImportProduct()->import($destination, $newFileName);
    }

}
