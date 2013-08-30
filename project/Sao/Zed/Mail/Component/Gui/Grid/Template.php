<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Grid_Template extends ProjectA_Zed_Library_Grid implements
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
            'Create New Mail Template' => '/mail/template/save'
        );

        $this->setTitle(__('Mail Templates'))
            ->setDataColumns($this->getDataColumnsSetup())
            ->setPostContentRenderCallback(array($this, 'postContentRenderCallback'))
            ->setIsDeletable(false)
            ->setIsEditable(true)
            ->setAllowEmptyCells(true)
            ->setDefaultLinkUrl('/mail/template/save/id/%id_mail_template%/')
            ->setEditLinkUrl('/mail/template/save/id/%id_mail_template%/');
    }

    /**
     * @return array
     */
    protected function getDataColumnsSetup()
    {
        return array(
            'name', 'subject', 'sender', 'deleted',
            'version', 'wrap', 'version_created_by', 'preview'
        );
    }

    /**
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return string
     */
    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        if ($column->getKey() == 'preview') {
            $id = 'templateContent_' . $row->getColumnByKey('id_mail_template')->getData();
            $previewContent = '<textarea style="display:none;" id="' . $id . '">' . $row->getColumnByKey('html')->getData() .'</textarea>';
            return $previewContent .= '<a href="javascript:0;" rel="#templatePreviewOverlay" class="preview" data-preview-selector="#' . $id . '">' . __('preview') . '</a>';
        }
        if ($column->getKey() == 'wrap') {
            /* @var Sao_Zed_Mail_Persistence_SaoMailTemplate $entity */
            $entity = $row->getEntity();
            if ($templateWrap = $entity->getMailTemplateWrap()) {
                return $templateWrap->getName();
            }
        }
        return '';
    }

    /**
     * @return ModelCriteria|void
     */
    protected function getQuery()
    {
        return new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery();
        return $this->factory->getEntityTemplateQuery();
    }
}
