<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Gui_Crud_Sequence_Element extends ProjectA_Zed_Library_Crud implements
    ProjectA_Zed_Library_Dependency_InitInterface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var int
     */
    protected $sequenceId;

    /**
     * @var ProjectA_Zed_Catalog_Persistence_PacCatalogGroup
     */
    protected $sequence;

    /**
     * @param $sequenceId
     */
    public function __construct($sequenceId)
    {
        $this->sequenceId = $sequenceId;
    }

    /**
     *  get sequence from sequenceId after injection
     */
    public function initAfterDependencyInjection()
    {
        $this->sequence = Sao_Zed_Mail_Persistence_SaoMailSequenceQuery::create()->findPk($this->sequenceId);
    }

    /**
     * @return int
     */
    public function getSequenceId()
    {
        return $this->sequenceId;
    }

    /**
     * @return Sao_Zed_Mail_Component_Gui_Form_Sequence_Element
     */
    protected function getForm()
    {
        return $this->factory->getGuiFormSequenceElement(null, $this);
    }

    /**
     * @return BaseObject|Sao_Zed_Mail_Persistence_SaoMailSequenceElement
     */
    protected function getEntity()
    {
        return Generated_Zed_EntityLoader::getSaoMailSequenceElement();
    }

    /**
     * @return ModelCriteria|Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery
     */
    protected function getQuery()
    {
        return new Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery();
    }

    /**
     * @return string
     */
    public function render()
    {
        $container = ProjectA_Zed_Library_Ui_Container_Factory::getContainer();
        $container->setTitle(__('Sequence Element'));
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

        $this->addMailSequenceCode($entity);

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

        $this->addMailSequenceCode($entity);

        if ($entity->validate()) {
            $entity->save();
        }
        return new ProjectA_Zed_Library_Component_Model_Result($entity);
    }

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailSequenceElement $entity
     */
    protected function addMailSequenceCode(Sao_Zed_Mail_Persistence_SaoMailSequenceElement $entity)
    {
        $codepoolKey =
            Sao_Zed_Mail_Component_Gui_Form_Sequence_Element::getNameForFieldCodepool(
                Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL
            );
        $codepoolValue = $this->formValues[$codepoolKey];
        if ($codepoolValue) {

            $codeValidToIntervalKey =
                Sao_Zed_Mail_Component_Gui_Form_Sequence_Element::getNameForFieldCodepool(
                    Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_INTERVAL
                );
            $codeValidToFormatKey =
                Sao_Zed_Mail_Component_Gui_Form_Sequence_Element::getNameForFieldCodepool(
                    Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_FORMAT
                );

            $codeValidToIntervalValue = $this->formValues[$codeValidToIntervalKey];
            $codeValidToFormatValue = $this->formValues[$codeValidToFormatKey];

            if (!$entity->getMailSequenceElementCodepool()) {
                $codepoolElementEntity = Generated_Zed_EntityLoader::getSaoMailSequenceElementCodepool();
                $codepoolElementEntity->setFkSalesruleCodepool($codepoolValue);
                $codepoolElementEntity->setCodeValidToInterval($codeValidToIntervalValue);
                $codepoolElementEntity->setCodeValidToFormat($codeValidToFormatValue);
                $entity->setMailSequenceElementCodepool($codepoolElementEntity);
            } else {
                $entity->getMailSequenceElementCodepool()->setFkSalesruleCodepool($codepoolValue);
                $entity->getMailSequenceElementCodepool()->setCodeValidToInterval($codeValidToIntervalValue);
                $entity->getMailSequenceElementCodepool()->setCodeValidToFormat($codeValidToFormatValue);
            }
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

        /** @var Sao_Zed_Mail_Persistence_SaoMailSequenceElement $entity */
        $entity = $this->findById($this->id);

        if (empty($entity)) {
            throw new ProjectA_Zed_Library_Exception('Unknown ID: ' . $this->id);
        }

        $codepoolElementEntity = $entity->getMailSequenceElementCodepool();
        if ($codepoolElementEntity) {
            $populateVariables =
                array_merge(
                    ProjectA_Zed_Library_Propel_Helper::toArray($codepoolElementEntity),
                    ProjectA_Zed_Library_Propel_Helper::toArray($entity)
                );
            $this->form->populate($populateVariables);
        } else {
            $this->form->populate(ProjectA_Zed_Library_Propel_Helper::toArray($entity));
        }

        return $entity;
    }

}
