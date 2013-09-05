<?php

class Sao_Zed_Catalog_Component_Gui_Crud_Product extends ProjectA_Zed_Catalog_Component_Gui_Crud_Product implements
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Shared_Library_Catalog_Interface_ProductAttributeConstant
{

    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    /**
     * @var ProjectA_Zed_Catalog_Component_Model_Product
     */
    protected $product;



    /**
     * @param $id
     * @return ProjectA_Zed_Catalog_Component_Interface_Product
     */
    protected function loadProduct($id)
    {
        $productEntity = $this->factory->getFacade()->getProductById($id);
        $product = null;
        if ($productEntity) {
            $product = $this->factory->getFacade()->getProduct($productEntity, array(), false);

            //get all available stock models and add them to product
            $physicalStockModel = $this->facadeStock->getPhysicalStockModel();
            $displayableStockModel = $this->facadeStock->getDisplayableStockModel();
            $reservedStockModel = $this->facadeStock->getReservedStockModel();
            $saleableStockModel = $this->facadeStock->getSaleableStockModel();

            //get all available price models and add them to product
            $finalGrossPriceModel =
                $this->facadePrice->getPricingModel(
                    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE
                );
            $finalNettPriceModel =
                $this->facadePrice->getPricingModel(
                    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_NETT_PRICE
                );
            $baseGrossPrice =
                $this->facadePrice->getPricingModel(
                    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::BASE_GROSS_PRICE
                );
   /*         $baseNettPrice =
                $this->facadePrice->getPricingModel(
                    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::BASE_NETT_PRICE
                );*/
            $recommendedRetailPrice =
                $this->facadePrice->getPricingModel(
                    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::RECOMMENDED_RETAIL_PRICE
                );

            $facade = $this->factory->getFacade();
            $facade->addStockToProduct($product, $physicalStockModel);
            $facade->addStockToProduct($product, $displayableStockModel);
            $facade->addStockToProduct($product, $reservedStockModel);
            $facade->addStockToProduct($product, $saleableStockModel);
            $facade->addPriceToProduct($product, $baseGrossPrice);
//            $facade->addPriceToProduct($product, $baseNettPrice);
            $facade->addPriceToProduct($product, $finalGrossPriceModel);
            $facade->addPriceToProduct($product, $finalNettPriceModel);
            $facade->addPriceToProduct($product, $recommendedRetailPrice);
//            $facade->addSupplierToProduct($product);
        }

        return $product;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Form_Product|Zend_Form
     */
    protected function getForm()
    {
        return $this->factory->getGuiFormProduct($this);
    }

    /**
     * @param $result
     */
    protected function addErrorsToForm($result)
    {
        //$this->form->getElement('meta_description')
        ProjectA_Zed_Library_Helper_Validator::populateZendFormWithPropelValidationErrors($this->form, $result->getErrors());
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function save()
    {
        $this->formValues = $this->getFormValues();

        try {
            // fix for styled fields
            $fieldsToFix = array('freight_weight','measure','tax_rate','reduction_calculation_base_percentage');
            foreach($fieldsToFix as $field)
            {
                if(isset($this->formValues[$field]))
                {
                    $this->formValues[$field] = str_replace('.','',$this->formValues[$field]);
                    $this->formValues[$field] = str_replace(',','.',$this->formValues[$field]);
                }
            }

            //set new basic attribute values
            $this->product->fromArray($this->formValues);

            //set standard product values $this
            $productDisplayGroup =
                $this->form->getDisplayGroup(Sao_Zed_Catalog_Component_Gui_Form_Product::DISPLAYGROUP_NAME_PRODUCT);

            /* @var $element Zend_Form_Element */
            foreach ($productDisplayGroup->getElements() as $baseAttributeName => $element) {

                switch ($baseAttributeName) {
                    // SKU should NOT be changed!!
                    /*case ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(Entity_PacCatalogProductPeer::SKU,BasePeer::TYPE_COLNAME,BasePeer::TYPE_FIELDNAME):
                        $this->product->getProduct()->setSku(trim($element->getValue()));
                        break;*/
                    case ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME):
                        $this->product->getProduct()->setStatus($element->getValue());
                        break;
                    case ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME):
                        $this->product->getProduct()->setIsItem($element->getValue());
                        break;
                    case ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME):
                        $this->product->getProduct()->setVariety($element->getValue());
                        break;
                    case ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET , BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME):
                        $this->product->getProduct()->setFkCatalogAttributeSet($element->getValue());
                        break;
                }
            }

//            $this->product[self::ATTRIBUTE_LONGNAME] = $this->product->createLongName();
//            if (empty($this->product[self::ATTRIBUTE_URL])) {
//                $this->product[self::ATTRIBUTE_URL] = $this->product->createProductUrl();
//            }

            //now check errors for each displaygroup
            $hasError = false;
            /* @var $displayGroup Zend_Form_DisplayGroup */
            foreach ($this->form->getDisplayGroups() as $displayGroup) {
                foreach ($displayGroup->getElements() as $element) {
                    if ($element->hasErrors()) {
                        foreach ($element->getErrorMessages() as $errorMessage) {
                            ProjectA_Zed_Library_FlashMessage::getInstance()->addError($errorMessage);
                        }
                        $hasError = true;
                    }
                }
            }

            if (!$hasError) {
                $this->product->save();
                $this->sendMessageSuccess();
                return true;
            }

        } catch (Exception $ex) {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addError(__('Error occured'));
            ProjectA_Zed_Library_FlashMessage::getInstance()->addError($ex->getMessage());
        }

    }

    /**
     * @param $errorMessage
     */
    public function setError($errorMessage)
    {
        $this->view->error = $errorMessage;
    }

    /**
     * @return array
     */
    protected function getFormValues()
    {
        $vals = $this->form->getValues();
        $filter = new Zend_Filter_LocalizedToNormalized();

        foreach ($vals as $key => $val) {
            if (Zend_Locale_Format::isFloat($val)) {
                $vals[$key] = $filter->filter($val);
            }
        }

        return $vals;
    }

}
