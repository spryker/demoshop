<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Crud_Template extends ProjectA_Zed_Library_Crud
{
    /**
     * @return Sao_Zed_Mail_Component_Gui_Form_Template
     */
    protected function getForm()
    {
        return $this->factory->getGuiFormTemplate(null, $this);
    }

    /**
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate
     */
    protected function getEntity()
    {
        return Generated_Zed_EntityLoader::getSaoMailTemplate();
    }

    /**
     * @return Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplateQuery
     */
    protected function getQuery()
    {
        return new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery();
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    protected function update()
    {
        /** @var Sao_Zed_Mail_Persistence_SaoMailTemplate $entity */
        $entity = $this->findById($this->id);
        $entity->fromArray($this->formValues);
        if (empty($this->formValues[$this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP)])) {
            $entity->setWrap(null);
        }
        $entity->setVersionCreatedBy($this->getCurrentUsername());
        if ($entity->validate()) {
            $entity->save();
        }
        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    protected function create()
    {
        $entity = $this->getEntity();
        $entity->fromArray($this->formValues);
        if (empty($this->formValues[$this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP)])) {
            $entity->setWrap(null);
        }
        $entity->setVersionCreatedBy($this->getCurrentUsername());
        if ($entity->validate()) {
            $entity->save();
        }
        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * @return string
     */
    protected function getCurrentUsername()
    {
        $username = 'noAuth';
        $user = ProjectA_Zed_Auth_Component_Model_Auth::getInstance()->getCurrentUser();
        if ($user instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            $username = $user->getUsername();
        }
        return $username;
    }

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplate $template
     * @return string
     */
    public function getFormVersions(Sao_Zed_Mail_Persistence_SaoMailTemplate $template)
    {
        $lastVersionId = $template->getLastVersionNumber();
        $content = __('No Versions Yet');
        $versions = $template->getAllVersions();
        if ($versions->count() > 1) {
            $content = '';
            $content.= '<table width="100%">';
            /* @var $templateVersion Sao_Zed_Mail_Persistence_SaoMailTemplateVersion */
            foreach ($versions as $templateVersion) {

                $versionId = $templateVersion->getVersion();
                //skip last version as it will already be displayed in the crud
                if ($versionId == $lastVersionId) {
                    continue;
                }
                $version = sprintf(
                    'Version %d, updated by %s on %s',
                    $versionId,
                    $templateVersion->getVersionCreatedBy(),
                    $templateVersion->getVersionCreatedAt()
                );

                $form = $this->factory->getGuiFormTemplateVersion($templateVersion, null, $this);

                $content.= '<tr><td>' . $version . '</td><td style="width:15px;cursor:pointer;" onclick="$(\'#version_' . $versionId . '\').toggleClass(\'previewVersionShow\');$(\'#versionIcon_' . $versionId . '\').toggleClass(\'previewVersionIconHide\');"><img width="15" height="15" border="0" id="versionIcon_' . $versionId . '" class="previewVersionIconShow" src="/images/layout/empty.gif" /></td></tr>';
                $content.= '<tr id="version_' . $versionId . '" class="previewVersionHide" ><td colspan="2">';
                $content.= $form->render();
                $content.= '</td></tr>';
            }
            $content.="</table>";
        }

        $container = ProjectA_Zed_Library_Ui_Container_Factory::getContainer();
        $container->setTitle(__('Versions'));
        $container->setContent($content);
        return $container->render();
    }

    /**
     * @return string
     */
    public function getMailModelConstantsList()
    {
        $constantsList = '<select size="10" id="mailConstantOptions">';
        $reflectionClass = new ReflectionClass('Sao_Zed_Mail_Component_Model_Constants');

        $constants = $reflectionClass->getConstants();
        asort($constants);

        foreach ($constants as $constant) {
            $constantsList.= '<option value="'. $constant . '">'. $constant . '</option>';
        }
        $constantsList.= '</select>';
        return $constantsList;
    }

    /**
     * @param string $field
     * @return string
     */
    protected function getNameForField($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

}
