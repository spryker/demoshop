<?php
/**
 *
 * Define new Elements in functions starting with "addFormElement..."
 * those will automatically get called
 * Just keep it a bit clearer
 *
 *
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 13.08.12 14:33
 * @todo Refactor ME !!!
 */
class Sao_Zed_Catalog_Component_Gui_Form_Product extends ProjectA_Zed_Catalog_Component_Gui_Form_Product implements
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant,
    Sao_Shared_Catalog_Interface_ProductAttributeSetConstant,
    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants
{
    const DISPLAYGROUP_NAME_PRODUCT = 'product';
    const DISPLAYGROUP_NAME_PRICES = 'prices';
    const DISPLAYGROUP_NAME_STOCK = 'stock';

    const DISPLAYGROUP_NAME_COMMERCIAL_REGISTRATION= 'commercial_registration';
    const DISPLAYGROUP_NAME_TECHNICAL_REGISTRATION= 'technical_registration';

    const DISPLAYGROUP_NAME_ATTRIBUTES = 'attributes';
//    const DISPLAYGROUP_NAME_SEO = 'seo';
    const DISPLAYGROUP_NAME_FINANCIAL = 'financial';

    const SUPPLIER_FK = 'catalog_supplier';



    /**
     * @var ProjectA_Zed_Catalog_Component_Interface_ProductEntity
     */
    protected $product;

    /**
     * @var Sao_Zed_Catalog_Component_Gui_Crud_Product
     */
    protected $crud;

    /**
     * Element Definition
     *
     * @return void
     */
    protected function createElementSetupForAttributeGroups()
    {
        $this->elementSetup = array(
            'Artwork' => $this->getSetupForAttributeSetMarketplace(),
//            self::ATTRIBUTESET_MANUFACTURE => $this->getSetupForAttributeSetManufacture(),
        );
    }

    /**
     * @return array
     */
    protected function getSetupForAttributeSetMarketplace()
    {
        return array(

            //define required elements
            self::KEY_REQUIRED_ELEMENTS => $this->getRequiredElements(),

            //define which text elements shall be displayed as textarea instead of a text element
            self::KEY_TEXTAREA_ELEMENTS => array(
//                self::ATTRIBUTE_DESCRIPTION,
                self::ATTRIBUTE_SHORT_DESCRIPTION,
//                self::ATTRIBUTE_MANUFACTURER_DESCRIPTION,
//                self::ATTRIBUTE_MANUFACTURER_DESCRIPTION_ORIGIN,
//                self::ATTRIBUTE_META_DESCRIPTION
            ),

            //define display groups and there belonging attributes
            self::KEY_DISPLAY_GROUPS => array(
                self::DISPLAYGROUP_NAME_PRODUCT => array(
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                ),

                self::DISPLAYGROUP_NAME_COMMERCIAL_REGISTRATION => array(
                    self::ATTRIBUTE_NAME,
//                    self::ATTRIBUTE_BRAND,
//                    Sao_Catalog_Model_Supplier_Loader::VIRTUAL_ATTRIBUTE_SUPPLIER,
//                    self::ATTRIBUTE_FREIGHT_WEIGHT,
//                    self::ATTRIBUTE_MEASURE_UNIT,
//                    self::ATTRIBUTE_MEASURE,
//                    self::ATTRIBUTE_AMOUNT_IN_PACKAGE,
//                    self::ATTRIBUTE_PHARMACEUTICAL_FORM,
//                    self::ATTRIBUTE_IMPORTED,
//                    self::ATTRIBUTE_IMPORT_ORIGIN,
//                    self::ATTRIBUTE_BARCODE,
                ),

                self::DISPLAYGROUP_NAME_TECHNICAL_REGISTRATION => array(
//                    self::ATTRIBUTE_DESCRIPTION,
                    self::ATTRIBUTE_SHORT_DESCRIPTION,
//                    self::ATTRIBUTE_MANUFACTURER_DESCRIPTION,
//                    self::ATTRIBUTE_MANUFACTURER_DESCRIPTION_ORIGIN,
//                    self::ATTRIBUTE_URL,
//                    self::ATTRIBUTE_EXPIRATION,
//                    self::ATTRIBUTE_ANVISA,
//                    self::ATTRIBUTE_MS,
//                    self::ATTRIBUTE_DURATION_TIME,
//                    self::ATTRIBUTE_INGREDIENTS_TABLE
                ),


//                self::DISPLAYGROUP_NAME_ATTRIBUTES => array(
//                    self::ATTRIBUTE_SKIN_TYPE,
//                    self::ATTRIBUTE_HAIR_TYPE,
//                    self::ATTRIBUTE_PARABEN_FREE,
//                    self::ATTRIBUTE_SULFATES_FREE,
//                    self::ATTRIBUTE_PETROL_CHEMICAL_FREE,
//                    self::ATTRIBUTE_FRAGRANCE_FREE,
//                    self::ATTRIBUTE_ORGANIC,
//                    self::ATTRIBUTE_KOSHER,
//                    self::ATTRIBUTE_NATURAL_INGREDIENTS,
//                    self::ATTRIBUTE_CRUELTY_FREE,
//                    self::ATTRIBUTE_VEGAN,
//                ),

//                self::DISPLAYGROUP_NAME_SEO => array(
//                    self::ATTRIBUTE_PAGE_TITLE,
                //self::ATTRIBUTE_META_TITLE,
//                    self::ATTRIBUTE_META_KEYWORDS,
//                    self::ATTRIBUTE_META_DESCRIPTION
//                ),

                self::DISPLAYGROUP_NAME_FINANCIAL => array(
//                    self::ATTRIBUTE_NCM,
                    self::ATTRIBUTE_TAX_RATE,
//                    self::ATTRIBUTE_COST,
//                    self::ATTRIBUTE_IVA,
//                    self::ATTRIBUTE_PRODUCT_GENDER,
//                    self::ATTRIBUTE_IPI,
//                    self::ATTRIBUTE_MAX_INSTALLMENTS,
//                    self::ATTRIBUTE_ST,
//                    self::ATTRIBUTE_ICMS_CST,
//                    self::ATTRIBUTE_REDUCTION_CALCULATION_BASE,
//                    self::ATTRIBUTE_REDUCTION_CALCULATION_BASE_PERCENTAGE
                ),

                self::DISPLAYGROUP_NAME_STOCK => array(
                    self::PHYSICAL_STOCK,
                    self::SALEABLE_STOCK,
                    self::RESERVED_STOCK,
                    self::DISPLAYABLE_STOCK
                ),
                self::DISPLAYGROUP_NAME_PRICES => array(
//                    self::BASE_GROSS_PRICE,
                    self::FINAL_GROSS_PRICE,
//                    self::FINAL_NETT_PRICE,
                    self::RECOMMENDED_RETAIL_PRICE
                )
            )
        );
    }

    protected function getSetupForAttributeSetManufacture()
    {
        return array(

            //define required elements
            self::KEY_REQUIRED_ELEMENTS => $this->getRequiredElements(),

            //define which text elements shall be displayed as textarea instead of a text element
            self::KEY_TEXTAREA_ELEMENTS => array(
//                self::ATTRIBUTE_DESCRIPTION,
                self::ATTRIBUTE_SHORT_DESCRIPTION,
//                self::ATTRIBUTE_MANUFACTURER_DESCRIPTION,
//                self::ATTRIBUTE_MANUFACTURER_DESCRIPTION_ORIGIN,
//                self::ATTRIBUTE_META_DESCRIPTION
            ),

            //define display groups and there belonging attributes
            self::KEY_DISPLAY_GROUPS => array(
                self::DISPLAYGROUP_NAME_PRODUCT => array(
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
                ),

                self::DISPLAYGROUP_NAME_COMMERCIAL_REGISTRATION => array(
                    self::ATTRIBUTE_NAME,
//                    self::ATTRIBUTE_BRAND,
//                    Sao_Catalog_Model_Supplier_Loader::VIRTUAL_ATTRIBUTE_SUPPLIER,
//                    self::ATTRIBUTE_FREIGHT_WEIGHT,
//                    self::ATTRIBUTE_MEASURE_UNIT,
//                    self::ATTRIBUTE_MEASURE,
//                    self::ATTRIBUTE_AMOUNT_IN_PACKAGE,
//                    self::ATTRIBUTE_PHARMACEUTICAL_FORM,
//                    self::ATTRIBUTE_IMPORTED,
//                    self::ATTRIBUTE_IMPORT_ORIGIN,
//                    self::ATTRIBUTE_BARCODE,
                ),

                self::DISPLAYGROUP_NAME_TECHNICAL_REGISTRATION => array(
//                    self::ATTRIBUTE_DESCRIPTION,
                    self::ATTRIBUTE_SHORT_DESCRIPTION,
//                    self::ATTRIBUTE_MANUFACTURER_DESCRIPTION,
//                    self::ATTRIBUTE_MANUFACTURER_DESCRIPTION_ORIGIN,
//                    self::ATTRIBUTE_URL,
//                    self::ATTRIBUTE_EXPIRATION,
//                    self::ATTRIBUTE_ANVISA,
//                    self::ATTRIBUTE_MS,
//                    self::ATTRIBUTE_DURATION_TIME,
//                    self::ATTRIBUTE_INGREDIENTS_TABLE
                ),

//                self::DISPLAYGROUP_NAME_ATTRIBUTES => array(
//                    self::ATTRIBUTE_PRESERVATIVE_FREE,
//                    self::ATTRIBUTE_FLAVORING_FREE,
//                    self::ATTRIBUTE_COLORING_FREE,
//                    self::ATTRIBUTE_ARTIFICIAL_SWEETNER_FREE,
//                    self::ATTRIBUTE_SUGAR_FREE,
//                    self::ATTRIBUTE_GLUTEN_FREE,
//                    self::ATTRIBUTE_LACTOSE_FREE,
//                    self::ATTRIBUTE_VEGETARIAN,
//                    self::ATTRIBUTE_VEGAN,
//                    self::ATTRIBUTE_ORGANIC,
//                    self::ATTRIBUTE_KOSHER,
//                    self::ATTRIBUTE_NATURAL_INGREDIENTS,
//                ),

//                self::DISPLAYGROUP_NAME_SEO => array(
//                    self::ATTRIBUTE_PAGE_TITLE,
                //self::ATTRIBUTE_META_TITLE,
//                    self::ATTRIBUTE_META_KEYWORDS,
//                    self::ATTRIBUTE_META_DESCRIPTION
//                ),

                self::DISPLAYGROUP_NAME_FINANCIAL => array(
//                    self::ATTRIBUTE_NCM,
                    self::ATTRIBUTE_TAX_RATE,
//                    self::ATTRIBUTE_COST,
//                    self::ATTRIBUTE_IVA,
//                    self::ATTRIBUTE_PRODUCT_GENDER,
//                    self::ATTRIBUTE_IPI,
//                    self::ATTRIBUTE_MAX_INSTALLMENTS,
//                    self::ATTRIBUTE_ST,
//                    self::ATTRIBUTE_ICMS_CST,
//                    self::ATTRIBUTE_REDUCTION_CALCULATION_BASE,
//                    self::ATTRIBUTE_REDUCTION_CALCULATION_BASE_PERCENTAGE
                ),

                self::DISPLAYGROUP_NAME_STOCK => array(
                    self::PHYSICAL_STOCK,
                    self::SALEABLE_STOCK,
                    self::RESERVED_STOCK,
                    self::DISPLAYABLE_STOCK
                ),
                self::DISPLAYGROUP_NAME_PRICES => array(
//                    self::BASE_GROSS_PRICE,
                    self::FINAL_GROSS_PRICE,
//                    self::FINAL_NETT_PRICE,
                    self::RECOMMENDED_RETAIL_PRICE
                )
            )
        );
    }

    /**
     * just basic, add price elements as plain text inputs,
     * no handling of multi prices for date ranges
     */
    protected function addPriceFormElements()
    {
//        $this->addIntegerFormElement(self::BASE_GROSS_PRICE,$this->getValueFromProductForAttribute(self::BASE_GROSS_PRICE));
        $this->addIntegerFormElement(self::FINAL_GROSS_PRICE,$this->getValueFromProductForAttribute(self::FINAL_GROSS_PRICE));
//        $this->addIntegerFormElement(self::FINAL_NETT_PRICE,$this->getValueFromProductForAttribute(self::FINAL_NETT_PRICE));
        $this->addIntegerFormElement(self::RECOMMENDED_RETAIL_PRICE,$this->getValueFromProductForAttribute(self::RECOMMENDED_RETAIL_PRICE));
    }

    /**
     * just basic stock stuff, only handles one physical stock so far
     * displayable, reserved and salesable are calculated and therefor are just displayed not editable
     */
    protected function addStockFormElements()
    {
        $this->addIntegerFormElement(self::PHYSICAL_STOCK,$this->getValueFromProductForAttribute(self::PHYSICAL_STOCK));
        $this->addIntegerFormElement(self::DISPLAYABLE_STOCK, $this->getValueFromProductForAttribute(self::DISPLAYABLE_STOCK),null, true);
        $this->addIntegerFormElement(self::RESERVED_STOCK, $this->getValueFromProductForAttribute(self::RESERVED_STOCK),null, true);
        $this->addIntegerFormElement(self::SALEABLE_STOCK, $this->getValueFromProductForAttribute(self::SALEABLE_STOCK),null, true);
    }

    /**
     * use this function in project code to get Elements
     * out of $this->formElements and change their Validators and stuff
     * before they get added to the form
     *
     * if you don` need it just leave it empty
     */
    protected function manipulateFormElements()
    {
//        $this->addSupplierFormElement();
//        $this->addImportedNotSetOption();
    }

//    /**
//     * create the supplier form element
//     * will later get added to the tab it is added to
//     *
//     * @see createElementSetupForAttributeGroups in specific attributeSet setup
//     */
//    protected function addSupplierFormElement()
//    {
//        $values = $this->factory->getModelFinder()->getSupplierNames(true);
//
//        //add supplier select box @self::SUPPLIER_FK
//        $this->addSelectBoxFormElement(
//            Sao_Catalog_Model_Supplier_Loader::VIRTUAL_ATTRIBUTE_SUPPLIER,
//            $this->getValueFromProductForAttribute(Sao_Catalog_Model_Supplier_Loader::VIRTUAL_ATTRIBUTE_SUPPLIER),
//            $values
//        );
//    }

//    /**
//     * Adds '- not set -' option to Imported Product select
//     */
//    protected function addImportedNotSetOption() {
//        $attrImported = $this->formElements->get(self::ATTRIBUTE_IMPORTED);
//        if ($attrImported) {
//            $attrImported->options = array('' => __('- not set -')) + $attrImported->options;
//        }
//    }


    protected function getRequiredElements()
    {
        return array(
            ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
            ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
            ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME),
            self::FINAL_GROSS_PRICE,
//            self::FINAL_NETT_PRICE,
            self::ATTRIBUTE_NAME,
//            Sao_Catalog_Model_Supplier_Loader::VIRTUAL_ATTRIBUTE_SUPPLIER,
//            self::ATTRIBUTE_BARCODE,
//            self::ATTRIBUTE_DESCRIPTION,
            self::ATTRIBUTE_SHORT_DESCRIPTION,
//            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION,
//            self::ATTRIBUTE_NCM,
//            self::ATTRIBUTE_FREIGHT_WEIGHT,
        );
    }

    /**
     * set Decorator the each display group
     */
    protected function addDecoratorsToDisplayGroups()
    {
        /* @var $group Zend_Form_DisplayGroup */
        foreach ($this->getDisplayGroups() as $group) {
            $class = 'zend_form';
            if ($group->getName() == self::DISPLAYGROUP_NAME_ATTRIBUTES) {
                $class = $class .' zend_form_icons';
            }
            $group->setDecorators(
                array(
                     'FormElements',
                     'Fieldset',
                     array(
                         'HtmlTag',
                         array(
                             'tag'=>'dl',
                             'class'=>$class
                         )
                     )
                )
            );
        }
    }

}
