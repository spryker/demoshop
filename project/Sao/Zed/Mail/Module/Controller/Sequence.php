<?php
/**
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Mail_Module_Controller_Sequence extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;

    /**
     * show sequences grid
     */
    public function indexAction()
    {
        $this->facadeMail->getFacadeGui()->createGridSequence($this->view);
    }

    /**
     * edit or create a new mail sequence
     */
    public function saveAction()
    {
        $crud = $this->facadeMail->getFacadeGui()->getCrudSequence($this);
        if ($crud->isValid()) {
            $crud->save();
            $this->redirect('/mail/sequence/index');
        }
    }

    /**
     * show sequence elements grid
     */
    public function elementAction()
    {
        $sequenceId = $this->getParam('id', null);
        $this->view->sequenceEntity =
            (new Sao_Zed_Mail_Persistence_SaoMailSequenceQuery())->filterByPrimaryKey($sequenceId)->findOne();
        $this->facadeMail->getFacadeGui()->createGridElement($this->view);
    }

    /**
     * edit or create a new mail sequence element
     */
    public function saveElementAction()
    {
        $sequenceId = $this->getParam('idSequence', -1);
        $crud = $this->facadeMail->getFacadeGui()->getCrudSequenceElement($this, $sequenceId);
        if ($crud->isValid()) {
            $crud->save();
            $this->redirect('/mail/sequence/element/id/' . $sequenceId);
        }
    }
}
