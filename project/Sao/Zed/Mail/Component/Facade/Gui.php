<?php
/**
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Facade_Gui extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param Zend_View_Interface $view
     * @param null|ProjectA_Zed_Library_Grid_Config $config
     */
    public function createGridTemplate(Zend_View_Interface $view, ProjectA_Zed_Library_Grid_Config $config = null)
    {
        $this->factory->getGuiGridTemplate()
            ->setView($view)
            ->create();
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @return ProjectA_Zed_Library_Crud
     */
    public function getCrudTemplate(ProjectA_Zed_Library_Controller_Action $controller)
    {
        return $this->factory
            ->getGuiCrudTemplate()
            ->init($controller);
    }

    /**
     * @param Zend_View_Interface $view
     * @param null|ProjectA_Zed_Library_Grid_Config $config
     */
    public function createGridSequence(Zend_View_Interface $view, ProjectA_Zed_Library_Grid_Config $config = null)
    {
        $this->factory->getGuiGridSequence()
            ->setView($view)
            ->create();
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @return ProjectA_Zed_Library_Crud
     */
    public function getCrudSequence(ProjectA_Zed_Library_Controller_Action $controller)
    {
        return $this->factory
            ->getGuiCrudSequence()
            ->init($controller);
    }

    /**
     * @param Zend_View_Interface $view
     * @param ProjectA_Zed_Library_Grid_Config $config
     */
    public function createGridElement(Zend_View_Interface $view, ProjectA_Zed_Library_Grid_Config $config = null)
    {
        $this->factory->getGuiGridSequenceElement()
            ->setView($view)
            ->create();
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @param $sequenceId
     * @return ProjectA_Zed_Library_Crud
     */
    public function getCrudSequenceElement(ProjectA_Zed_Library_Controller_Action $controller, $sequenceId)
    {
        return $this->factory
            ->getGuiCrudSequenceElement($sequenceId)
            ->init($controller);
    }
}
