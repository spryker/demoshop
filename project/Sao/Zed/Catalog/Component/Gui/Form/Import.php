<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Form_Import extends Zend_Form implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{
    const FORM_IDENTIFIER = 'catalogImportForm';

    const FORM_ELEMENT_IMPORT_FILE_NAME = 'importFile';

    /**
     * @var Sao_Zed_Catalog_Component_Factory
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
        $destination = $this->getDestination();

        $this->setAttrib('enctype', 'multipart/form-data');

        $uploadFile = new Zend_Form_Element_File(self::FORM_ELEMENT_IMPORT_FILE_NAME);
        $uploadFile->setDecorators(
            array(
                'File',
                array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
            )
        );
        $uploadFile->setLabel(__('File') . ' (fileTypes=csv, maxSize=' . ini_get('upload_max_filesize') . ')');
        $uploadFile->setRequired(true);

        $uploadFile->setDestination($destination);
        $uploadFile->addValidator('Count', false, 1);
        $uploadFile->addValidator('Extension', false, 'csv');

        $this->addElement($uploadFile);

        //set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        //that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER);
    }

    /**
     * @return string
     */
    public function getFormElementImportFileName()
    {
        return self::FORM_ELEMENT_IMPORT_FILE_NAME;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->factory->getSettings()->getProductImportsPath();
    }
}
