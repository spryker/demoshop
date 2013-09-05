<?php
/**
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Mail_Module_Controller_Template extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;

    /**
     * show notification grid
     */
    public function indexAction()
    {
        $this->facadeMail->getFacadeGui()->createGridTemplate($this->view);
    }

    /**
     * edit or create a new notification
     */
    public function saveAction()
    {
        $crud = $this->facadeMail->getFacadeGui()->getCrudTemplate($this);
        if ($crud->isValid()) {
            $crud->save();
            $this->redirect('/mail/template/index');
        }
    }
}
