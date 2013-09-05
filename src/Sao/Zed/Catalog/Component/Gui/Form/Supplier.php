<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Form_Supplier extends Zend_Form
{
    const FORM_IDENTIFIER = 'catalogSupplierForm';

    public function init()
    {
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::NAME);
        $this->addSupplierTypeElement();
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::CNPJ);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::CNPJ);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::SAC);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::ADDRESS1);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::ADDRESS2);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::ADDRESS3);
        $this->addTextElementToForm(Entity_Nu3CatalogSupplierPeer::CEP);

        //set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        //that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER);
    }

    /**
     * add supplier form element
     */
    protected function addSupplierTypeElement()
    {
        $options = array();
        foreach (Entity_Nu3CatalogSupplierPeer::getValueSet(Entity_Nu3CatalogSupplierPeer::TYPE) as $value) {
            $options[$value] = $value;
        }

        $name = $this->getNameForField(Entity_Nu3CatalogSupplierPeer::TYPE);
        $element = new ProjectA_Zed_Library_Form_Element_Select($name);
        $element->setDisableTranslator(true);
        $element->setLabel($name);
        $element->setMultiOptions($options);
        $this->addElement($element);
    }

    /**
     * @param $field
     */
    protected function addTextElementToForm($field)
    {
        $name = $this->getNameForField($field);
        $element = new ProjectA_Zed_Library_Form_Element_Text($name);
        $element->setLabel(__($name));
        $this->addElement($element);
    }

    /**
     * @param $field
     * @return string
     */
    protected function getNameForField($field)
    {
        return
            Entity_Nu3CatalogSupplierPeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }
}
