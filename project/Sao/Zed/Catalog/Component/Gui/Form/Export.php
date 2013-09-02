<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Form_Export extends Zend_Form implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{
    const FORM_IDENTIFIER = 'catalogExportForm';

    const FORM_ELEMENT_EXPORT_FILE_NAME = 'exportFile';

    const CONDITION_TYPE_FIELD_NAME = '_condition_type';

    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory (ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function initAfterDependencyInjection()
    {
        // adding main attributes
        $this->addFilterRowNumeric('SKU');
        $this->addFilterRowBoolean('isItem');
        $this->addFilterRowOptionSingle('Status', array('new'=>'New','approved'=>'Approved','deleted'=>'Deleted'));
        $this->addFilterRowOptionSingle('Variety', array('config'=>'Config')); /// ?
        $this->addFilterRowOptionSingle('AttributeSet', array('cosmetics'=>'Cosmetics', 'other'=>'Other')); /// ?

        /** @var $valueTypes ArrayIterator */
        $valueTypes = $this->factory->getFacade()->getValueTypes();

        /** @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
        foreach ($valueTypes as $valueType) {

            $elementName = $valueType->getAttribute()->getName();

            if ($valueType->getAttribute()->countIntegers() > 0 || $valueType->getAttribute()->countDecimals() > 0) {

                $this->addFilterRowNumeric($elementName);

            } elseif ($valueType->getAttribute()->countTexts() > 0) {

                $this->addFilterRowText($elementName);

            } elseif ($valueType->getAttribute()->countBooleans() > 0) {

                $this->addFilterRowBoolean($elementName);

            } elseif ($valueType->getAttribute()->countOptionSingles() > 0) {

                /**@var $possibleValues PropelObjectCollection */
                $possibleValues = $valueType->getAttribute()->getOptionSingles();

                $values = array();

                /** @var $possibleValue ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle */
                foreach ($possibleValues as $possibleValue) {
                    $values[$possibleValue->getFkCatalogValueOption()] = $possibleValue->getValue();
                }

                $this->addFilterRowOptionSingle($elementName, $values);
            }
        }

        $mainElements = array('SKU', 'isItem', 'Status', 'Variety', 'AttributeSet', 'Category');
        foreach ($mainElements as $elementName) {
            $element = new Zend_Form_Element_Checkbox('show_'.$elementName);
            $element->setLabel($elementName);
            $this->addElement($element);
        }

        /** @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
        foreach($valueTypes as $valueType)
        {
            $elementName = $valueType->getAttribute()->getName();

            $element = new Zend_Form_Element_Checkbox('show_'.$elementName);
            $element->setLabel($elementName);
            $this->addElement($element);
        }

        // set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        // that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER);
    }

    /**
     * @return string
     */
    public function getFormElementExportFileName()
    {
        return self::FORM_ELEMENT_EXPORT_FILE_NAME;
    }

    /**
     * @param string $elementName
     * @return Zend_Form_Element_Select
     */
    protected function createElementConditionString($elementName)
    {
        $condition = new Zend_Form_Element_Select('_'); // the name is set for every used element
        $condition->setName($elementName);
        $condition->setMultiOptions(
            array(
                '' => '',
                Criteria::EQUAL => '=',
                Criteria::NOT_EQUAL => '<>',
                Criteria::LIKE => 'contains'
            )
        );
        $condition->addDecorator(
            'HtmlTag',
            array(
                'tag' => 'div',
                'openOnly' => true,
                'class' => 'clearLeft'
            )
        );
        $condition->removeDecorator('Label');

        return $condition;
    }

    /**
     * @param string $elementName
     * @return Zend_Form_Element_Select
     */
    protected function createElementConditionNumeric($elementName)
    {
        $condition = new Zend_Form_Element_Select('_'); // the namel is set for every used element
        $condition->setName($elementName);
        $condition->setMultiOptions(
            array(
                '' => '',
                Criteria::EQUAL => '=',
                Criteria::NOT_EQUAL => '<>',
                Criteria::GREATER_THAN => '>',
                Criteria::LESS_THAN => '<'
            )
        );
        $condition->addDecorator(
            'HtmlTag',
            array(
                'tag' => 'div',
                'openOnly' => true,
                'class' => 'clearLeft'
            )
        );
        $condition->removeDecorator('Label');

        return $condition;
    }

    /**
     * @param string $elementName
     * @return Zend_Form_Element_Select
     */
    protected function createElementConditionMultiList($elementName)
    {
        $condition = new Zend_Form_Element_Select('_'); // the namel is set for every used element
        $condition->setName($elementName);
        $condition->setMultiOptions(
            array(
                '' => '',
                Criteria::EQUAL => '=',
                Criteria::NOT_EQUAL => '<>'
            )
        );
        $condition->addDecorator(
            'HtmlTag',
            array(
                'tag' => 'div',
                'openOnly' => true,
                'class' => 'clearLeft'
            )
        );
        $condition->removeDecorator('Label');

        return $condition;
    }

    /**
     * @param $elementName
     */
    public function addFilterRowNumeric($elementName)
    {
        $condition = $this->createElementConditionNumeric($elementName.self::CONDITION_TYPE_FIELD_NAME);
        $this->addElement($condition);

        $element = new ProjectA_Zed_Library_Form_Element_Text($elementName);
        $element->setLabel($elementName);
        $element->addDecorator('HtmlTag', array('tag'=>'div','closeOnly'=>true));
        $this->addElement($element);
    }

    /**
     * @param $elementName
     */
    public function addFilterRowText($elementName)
    {
        $condition = $this->createElementConditionString($elementName.self::CONDITION_TYPE_FIELD_NAME);
        $this->addElement($condition);

        $element = new ProjectA_Zed_Library_Form_Element_Text($elementName);
        $element->setLabel($elementName);
        $element->addDecorator('HtmlTag', array('tag'=>'div','closeOnly'=>true));
        $this->addElement($element);
    }

    /**
     * @param $elementName
     */
    public function addFilterRowBoolean($elementName)
    {
        $element = new Zend_Form_Element_Select($elementName.self::CONDITION_TYPE_FIELD_NAME);
        $element->setLabel($elementName);
        $element->setDisableLoadDefaultDecorators(true);
        $element->setMultiOptions(
            array(
                '' => '',
                'true' => 'true',
                'false' => 'false'
            )
        );
        $element->addDecorator('HtmlTag', array( 'tag' => 'div' ));
        $this->addElement($element);
    }

    public function addFilterRowOptionSingle($elementName, $possibleValues)
    {
        // adding empty selection
        $possibleValues = array('' => '') + $possibleValues;

        $element = new Zend_Form_Element_Select($elementName.self::CONDITION_TYPE_FIELD_NAME);
        $element->setLabel($elementName);
        $element->setDisableLoadDefaultDecorators(true);
        $element->setMultiOptions($possibleValues);
        $element->addDecorator('HtmlTag', array( 'tag' => 'div' ));
        $this->addElement($element);
    }
}
