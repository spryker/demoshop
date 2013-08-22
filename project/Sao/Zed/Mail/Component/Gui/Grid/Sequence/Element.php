<?php
/**
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Grid_Sequence_Element extends ProjectA_Zed_Library_Grid implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var int
     */
    protected $sequenceId;

    /**
     *
     */
    public function create()
    {
        parent::create();

        /* @var Sao_Zed_Mail_Persistence_SaoMailSequence $sequenceEntity */
        $sequenceEntity = $this->view->sequenceEntity;

        $this->setConfigArray(array('data' => $this->getQuery()));

        Zend_Layout::getMvcInstance()->getView()->pageActions = array(
            'Create New Sequence Element' => '/mail/sequence/save-element/idSequence/' . $sequenceEntity->getIdMailSequence()
        );

        $this->setTitle(__('Mail Sequence Elements for Sequence ') . '"' .$sequenceEntity->getName() . '"')
            ->setDataColumns($this->getDataColumnsSetup())
            ->setPostContentRenderCallback(array($this, 'postContentRenderCallback'))
            ->setIsDeletable(false)
            ->setIsEditable(true)
            ->setAllowEmptyCells(true)
            ->setDefaultLinkUrl('/mail/sequence/save-element/id/%id_mail_sequence_element%/idSequence/' . $sequenceEntity->getIdMailSequence())
            ->setEditLinkUrl('/mail/sequence/save-element/id/%id_mail_sequence_element%/idSequence/' . $sequenceEntity->getIdMailSequence());
    }

    /**
     * @return array
     */
    protected function getDataColumnsSetup()
    {
        return array(
            'position', 'name', 'template', 'interval', 'codepool', 'codeValidToInterval', 'codeValidToFormat'
        );
    }

    /**
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return string
     */
    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequenceElement $entity */
        if ($column->getKey() == 'codepool') {
            $entity = $row->getEntity();
            $mailSequenceElementCodepool = $entity->getMailSequenceElementCodepool();
            if ($mailSequenceElementCodepool) {
                return sprintf(
                    '%s (%s)',
                    $mailSequenceElementCodepool->getSalesruleCodepool()->getName(),
                    $mailSequenceElementCodepool->getFkSalesruleCodepool()
                );
            }
            return '-';
        }
        if ($column->getKey() == 'codeValidToInterval') {
            $entity = $row->getEntity();
            $mailSequenceElementCodepool = $entity->getMailSequenceElementCodepool();
            if ($mailSequenceElementCodepool) {
                return $mailSequenceElementCodepool->getCodeValidToInterval();
            }
            return '-';
        }
        if ($column->getKey() == 'codeValidToFormat') {
            $entity = $row->getEntity();
            $mailSequenceElementCodepool = $entity->getMailSequenceElementCodepool();
            if ($mailSequenceElementCodepool) {
                return $mailSequenceElementCodepool->getCodeValidToFormat();
            }
            return '-';
        }
        return '';
    }

    /**
     * @return ModelCriteria|void
     */
    protected function getQuery()
    {
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequence $sequenceEntity */
        $sequenceEntity = $this->view->sequenceEntity;
        return
            (new Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery())
                ->filterByFkMailSequence($sequenceEntity->getIdMailSequence());
    }
}
