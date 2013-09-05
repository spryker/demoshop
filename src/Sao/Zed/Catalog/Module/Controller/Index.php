<?php

class Sao_Zed_Catalog_Module_Controller_Index extends ProjectA_Zed_Library_Controller_Action implements ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface, ProjectA_Zed_Stock_Component_Dependency_Facade_Interface, ProjectA_Zed_Price_Component_Dependency_Facade_Interface
{

    /**
     * @var ProjectA_Zed_Catalog_Component_Facade
     */
    protected $facadeCatalog;

    /**
     * @var ProjectA_Zed_Stock_Component_Facade
     */
    protected $facadeStock;

    /**
     * @var ProjectA_Zed_Price_Component_Facade
     */
    protected $facadePrice;

    /**
     * @see ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface::setFacadeCatalog()
     */
    public function setFacadeCatalog (ProjectA_Zed_Catalog_Component_Facade $facade)
    {
        $this->facadeCatalog = $facade;
    }

    /**
     * @see ProjectA_Zed_Stock_Component_Dependency_Facade_Interface::setFacadeStock()
     */
    public function setFacadeStock (ProjectA_Zed_Stock_Component_Facade $facade)
    {
        $this->facadeStock = $facade;
    }

    /**
     * @see ProjectA_Zed_Price_Component_Dependency_Facade_Interface::setFacadePrice()
     */
    public function setFacadePrice (ProjectA_Zed_Price_Component_Facade $facade)
    {
        $this->facadePrice = $facade;
    }

    /**
     *
     */
    public function attributesAction ()
    {
        $skus = array(32, 33, 34, 4711);
        $productEntities = $this->facadeCatalog->getProductsBySku($skus);
        /* @var $productCollection ProjectA_Zed_Catalog_Component_Model_ProductCollection */
        $productCollection = $this->facadeCatalog->getProductCollectionFilterByAttributeGroup(array('mandatory'));
        $productCollection->addProductEntities($productEntities);

        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($skus as $sku) {
            if ($productCollection->hasProduct($sku)) {
                $product = $productCollection->getProduct($sku);
                $attributes = $product->toArray();
                Zend_Debug::dump($attributes, 'attributes for sku: ' . $product->getSku());
            }
        }

    }

    public function showAction(){
        $sku = $this->_getParam('sku');
        $productEntity = $this->facadeCatalog->getProductBySku($sku);
        if(!isset($productEntity)){
            ProjectA_Zed_Library_FlashMessage::getInstance()->addError('Unknown SKU '.$sku);
            $this->redirect('sales/order');
        }



        $this->view->product = $this->facadeCatalog->getProduct($productEntity);
        $this->view->productEntity = $productEntity;
        $this->view->stock = $this->facadeCatalog->getProductStockBySku($productEntity->getSku());

        $orders = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()
            ->useItemQuery()
            ->filterBySku($productEntity->getSku())
            ->endUse()
            ->find();

        $this->view->orders = $orders;

    }

    /**
     *
     */
    public function indexAction ()
    {
        $skus = array(32, 33, 34, 4711);
        $productEntities = $this->facadeCatalog->getProductsBySku($skus);
        $productCollection = $this->facadeCatalog->getProductCollection();
        $productCollection->addProductEntities($productEntities);
        $this->facadeCatalog->addStockToProducts($productCollection, $this->facadeStock->getPhysicalStockModel());
        $this->facadeCatalog->addStockToProducts($productCollection, $this->facadeStock->getReservedStockModel());
        $this->facadeCatalog->addStockToProducts($productCollection, $this->facadeStock->getSaleableStockModel());
        $this->facadeCatalog->addStockToProducts($productCollection, $this->facadeStock->getDisplayableStockModel());
        $priceType = ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE;
        $priceModel = $this->facadePrice->getPricingModel($priceType);
        $this->facadeCatalog->addPriceToProducts($productCollection, $priceModel);

        // price & stock for 34
        $product34 = $productCollection->getProduct(34);
        $stock = $this->_getParam('stock');
        if ($stock) {
            $product34['physical_stock'] = $stock; // rand(0, 100);
        }
        $price = $this->_getParam('price');
        if ($price) {
            $product34[$priceType] = $price; // rand(0, 10000);
        }

        $nu3BasicAttributeCollection = $this->facadeCatalog->getProductCollectionFilterByAttributeGroup(array('Nu3_Basic'));
        $nu3BasicAttributeCollection->addProductEntities($productEntities);

        $nu3MetaAttributeCollection = $this->facadeCatalog->getProductCollectionFilterByAttributeGroup(array('Nu3_Meta'));
        $nu3MetaAttributeCollection->addProductEntities($productEntities);

        $nu3BasicAndNu3MetaAttributeCollection = $this->facadeCatalog->getProductCollectionFilterByAttributeGroup(array('Nu3_Basic', 'Nu3_Meta'));
        $nu3BasicAndNu3MetaAttributeCollection->addProductEntities($productEntities);

        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        foreach ($skus as $sku) {
            if ($productCollection->hasProduct($sku)) {
                $product = $productCollection->getProduct($sku);
            } else {
                $productEntity = Generated_Zed_EntityLoader::getPacCatalogProductConfig();
                $productEntity->setFkCatalogAttributeSet(1);
                $productEntity->setIsItem(true);
                $productEntity->setSku($sku);

                $productCollection->addProductEntity($productEntity);
                $product = $productCollection->getProduct($sku);

                $nu3BasicAttributeCollection->addProductEntity($product);
                $nu3MetaAttributeCollection->addProductEntity($product);
                $nu3BasicAndNu3MetaAttributeCollection->addProductEntity($product);

            }
            // $product['Chuck Norris'] = 'was there';

            $attributes = $product->toArray();

            $attributesByGroup0 = iterator_to_array(new ProjectA_Zed_Library_DataStructure_Value_Iterator($nu3BasicAttributeCollection->getProduct($sku)->getAttributeValues()));
            $attributesByGroup1 = $nu3MetaAttributeCollection->getProduct($sku)->toArray();
            $attributesByGroup2 = $nu3BasicAndNu3MetaAttributeCollection->getProduct($sku)->toArray();

            $attribute0 = $product['Einheit'];
            // $attribute1 =
            // $this->facadeCatalog->getProductAttributeValue($product,'invalid',
            // false);

            // $hasMissingFields =
            // $this->facadeCatalog->hasMissingMandatoryFields($product);
            // $missingFields =
            // $this->facadeCatalog->getMissingMandatoryFields($product);

            $productCategories = $this->facadeCatalog->getCategoriesForProduct($product);

            echo "<hr />get Attributes<br /><br />";
            Zend_Debug::dump($attributes);
            // echo "<hr />get Missing Mandatory Attributes<br /><br />";
            // Zend_Debug::dump($hasMissingFields, 'has Missing');
            // Zend_Debug::dump($missingFields, 'get Missing');
            echo "<hr />get Attributes For Group<br /><br />";
            Zend_Debug::dump($attributesByGroup0, 'Group "Nu3_Basic"');
            Zend_Debug::dump($attributesByGroup1, 'Group "Nu3_Meta"');
            Zend_Debug::dump($attributesByGroup2, 'Group "Nu3_Basic" AND "Nu3_Meta"');
            echo "<hr />get Specific Attributes<br /><br />";
            Zend_Debug::dump($attribute0, 'Attribute "Einheit"');
            // Zend_Debug::dump($attribute1, 'Attribute "invalid"');
            echo "<hr />get Categories<br /><br />";
            Zend_Debug::dump($productCategories->getArrayCopy(), 'Categories');
            echo "<hr /><hr />";

            $product->save();

        }
    }

}
