<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Gui_Form_Sequence_Element extends Zend_Form
{
    const FORM_IDENTIFIER = 'mailSequenceElementForm';

    /**
     * @var Sao_Zed_Mail_Component_Gui_Crud_Sequence_Element
     */
    protected $crud;

    /**
     * let`s assume there will be no more then 10 elements in a sequence
     * @var array
     */
    protected static $positions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10'
    );

    /**
     * @param mixed|null $options
     * @param $crud
     */
    public function __construct($options, $crud)
    {
        $this->crud = $crud;
        $this->setName(self::FORM_IDENTIFIER);
        parent::__construct();
    }

    public function init()
    {
        $this->addOptionElementToForm(
            $this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION),
            self::$positions,
            true
        );
        $this->addTextElementToForm($this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME), true);
        $this->addTextElementToForm($this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE), true);
        $this->addTextElementToForm($this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL), true);
        $this->addOptionElementToForm(
            self::getNameForFieldCodepool(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL),
            $this->getCodepoolMultiOptions()
        );

        $this->addTextElementToForm(
            $this->getNameForFieldCodepool(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_INTERVAL),
            false
        );
        $this->addTextElementToForm(
            $this->getNameForFieldCodepool(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_FORMAT),
            false
        );

        //add hidden fk_mail_sequence
        $sequenceFkName =
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::translateFieldName(
                Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
        $hiddenSequenceId = new ProjectA_Zed_Library_Form_Element_Hidden($sequenceFkName);
        $hiddenSequenceId->setRequired(true);
        $hiddenSequenceId->setValue($this->crud->getSequenceId());
        $this->addElement($hiddenSequenceId);
    }

    /**
     * @param $name
     * @param bool $required
     * @param bool $value
     */
    protected function addTextElementToForm($name, $required = false, $value = false)
    {
        $element = new ProjectA_Zed_Library_Form_Element_Text($name);
        $element->setLabel(__($name));
        $element->setRequired($required);
        if ($value) {
            $element->setValue($value);
        }
        $this->addElement($element);
    }

    /**
     * @param $name
     * @param $options
     * @param bool $required
     * @param bool $value
     */
    protected function addOptionElementToForm($name, $options, $required = false, $value = false)
    {
        $element = new ProjectA_Zed_Library_Form_Element_Select($name);
        $element->setLabel(__($name));
        $element->setRequired($required);
        if ($value) {
            $element->setValue($value);
        }
        $element->setMultiOptions($options);
        $this->addElement($element);
    }

    /**
     * @return array
     */
    protected function getCodepoolMultiOptions()
    {
        $multiOptions = ['' => ''];
        $codepoolCollection = (new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery())->find();
        /* @var ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool $codepool */
        foreach ($codepoolCollection as $codepool) {
            $multiOptions[$codepool->getIdSalesruleCodepool()] = $codepool->getName();
        }
        return $multiOptions;
    }

    /**
     * @param $field
     * @return string
     */
    protected function getNameForField($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

    /**
     * @param $field
     * @return string
     */
    public static function getNameForFieldCodepool($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

}
