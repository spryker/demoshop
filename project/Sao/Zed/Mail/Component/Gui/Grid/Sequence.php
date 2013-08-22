<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Grid_Sequence extends ProjectA_Zed_Library_Grid implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     *
     */
    public function create()
    {
        parent::create();

        $this->setConfigArray(array('data' => $this->getQuery()));

        Zend_Layout::getMvcInstance()->getView()->pageActions = array(
            'Create New Mail Sequence' => '/mail/sequence/save'
        );

        $this->setTitle(__('Mail Sequences'))
            ->setDataColumns($this->getDataColumnsSetup())
            ->setPostContentRenderCallback(array($this, 'postContentRenderCallback'))
            ->setIsDeletable(false)
            ->setIsEditable(true)
            ->setAllowEmptyCells(true)
            ->setDefaultLinkUrl('/mail/sequence/element/id/%id_mail_sequence%/')
            ->setEditLinkUrl('/mail/sequence/save/id/%id_mail_sequence%/');
    }

    /**
     * @return array
     */
    protected function getDataColumnsSetup()
    {
        return array(
            'name', 'step', 'sequences'
        );
    }

    /**
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return string
     */
    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequence $entity */
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequenceStep $stepEntity */

        if ($column->getKey() == 'step') {
            $entity = $row->getEntity();
            $stepEntity = $entity->getMailSequenceStep();
            if ($stepEntity) {
                return $stepEntity->getStep();
            }
        }
        if ($column->getKey() == 'sequences') {
            $entity = $row->getEntity();
            $sequenceElements = $entity->getMailSequenceElements();

            $sequenceElementsCount = $sequenceElements->count();
            //'0' will not get rendered, don`t ask :), so we add '0 '
            return ($sequenceElementsCount > 0) ? strval($sequenceElementsCount) : '0 ';
        }
        return '';
    }

    /**
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery|void
     */
    protected function getQuery()
    {
        return new Sao_Zed_Mail_Persistence_SaoMailSequenceQuery();
    }

}
