<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Crud_Sequence extends ProjectA_Zed_Library_Crud
{
    /**
     * @return Sao_Zed_Mail_Component_Gui_Form_Sequence|Zend_Form
     */
    protected function getForm()
    {
        return $this->factory->getGuiFormSequence();
    }

    /**
     * @return BaseObject|Sao_Zed_Mail_Persistence_SaoMailSequence
     */
    protected function getEntity()
    {
        return Generated_Zed_EntityLoader::getSaoMailSequence();
    }

    /**
     * @return ModelCriteria|Sao_Zed_Mail_Persistence_SaoMailSequenceQuery
     */
    protected function getQuery()
    {
        return new Sao_Zed_Mail_Persistence_SaoMailSequenceQuery();
    }

    /**
     * @return string
     */
    public function render()
    {
        $container = ProjectA_Zed_Library_Ui_Container_Factory::getContainer();
        $container->setTitle(__('Sequence'));
        $container->setContent(parent::render());
        return $container->render();
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    protected function update()
    {
        /** @var Sao_Zed_Mail_Persistence_SaoMailSequence $entity */
        $entity = $this->findById($this->id);
        $entity->fromArray($this->formValues);

        $this->addMailSequenceStep($entity);

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

        $this->addMailSequenceStep($entity);

        if ($entity->validate()) {
            $entity->save();
        }
        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailSequence $entity
     */
    protected function addMailSequenceStep(Sao_Zed_Mail_Persistence_SaoMailSequence $entity)
    {
        $keyStep = Sao_Zed_Mail_Component_Gui_Form_Sequence::getNameForFieldStep(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::STEP);
        $value = $this->formValues[$keyStep];
        if (!$entity->getMailSequenceStep()) {
            $stepEntity = Generated_Zed_EntityLoader::getSaoMailSequenceStep();
            $stepEntity->setStep($value);
            $entity->setMailSequenceStep($stepEntity);
        } else {
            $entity->getMailSequenceStep()->setStep($value);
        }
    }

    /**
     * @return BaseObject
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function populateForm()
    {
        if (is_null($this->id)) {
            return null;
        }

        /** @var Sao_Zed_Mail_Persistence_SaoMailSequence $entity */
        $entity = $this->findById($this->id);

        if (empty($entity)) {
            throw new ProjectA_Zed_Library_Exception('Unknown ID: ' . $this->id);
        }

        $stepEntity = $entity->getMailSequenceStep();
        if ($stepEntity) {
            $populateVariables =
                array_merge(
                    ProjectA_Zed_Library_Propel_Helper::toArray($stepEntity),
                    ProjectA_Zed_Library_Propel_Helper::toArray($entity)
                );
            $this->form->populate($populateVariables);
        } else {
            $this->form->populate(ProjectA_Zed_Library_Propel_Helper::toArray($entity));
        }

        return $entity;
    }

}
