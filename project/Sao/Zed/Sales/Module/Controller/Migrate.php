<?php

class Sao_Zed_Sales_Module_Controller_Migrate extends ProjectA_Zed_Library_Controller_Action
{

    /**
     * @var Sao_Zed_Catalog_Component_Facade
     */
    protected $facadeCatalog;

    /**
     * @var Sao_Zed_Misc_Component_Facade
     */
    protected $facadeMisc;

    /**
     *
     */
    public function init()
    {
        $this->facadeCatalog = (new Sao_Zed_Catalog_Component_Factory())->getFacade();
        $this->facadeMisc = (new Sao_Zed_Misc_Component_Factory())->getFacade();
    }

    public function artistDataAction()
    {
        $updatedSalesItems = 0;
        $query = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery();
        $items = $query->find();

        /* @var $saoSalesOrderItem Sao_Zed_Sales_Persistence_SaoSalesOrderItem */
        foreach ($items as $saoSalesOrderItem) {
            if ($saoSalesOrderItem->getFirstName() && $saoSalesOrderItem->getLastName()) {
                continue;
            }
            $pacItem = $saoSalesOrderItem->getSalesOrderItem();
            $product = $this->facadeCatalog->getProductBySku($pacItem->getSku());
            $product = $this->facadeCatalog->getProduct($product);

            $saoSalesOrderItem->setFirstName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_FIRST_NAME]);
            $saoSalesOrderItem->setLastName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME]);
            $saoSalesOrderItem->setEmail($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_EMAIL]);
            $saoSalesOrderItem->setPhone($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_PHONE]);

            if ($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_SET] === Sao_Zed_ArtistPortal_Component_Interface_ProductValueConstant::SET_MARKETPLACE) {
                $saoSalesOrderItem->setAddress1($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ADDRESS1]);
                $saoSalesOrderItem->setAddress2($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ADDRESS2]);
                $saoSalesOrderItem->setAddress3($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_PROVINCE]);

                $saoSalesOrderItem->setCity($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_CITY]);
                $saoSalesOrderItem->setZipCode($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ZIPCODE]);

                $this->addRegionToSalesOrderItem($product, $saoSalesOrderItem);
                $this->addCountryToSalesOrderItem($product, $saoSalesOrderItem);
            }
            $saoSalesOrderItem->save();
            $updatedSalesItems++;
        }
        echo 'Updated: "' . $updatedSalesItems . '" Items';die();
    }

    /**
     * @param $product
     * @param $saoSalesOrderItem
     */
    protected function addRegionToSalesOrderItem($product, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $region = $this->getRegionByName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_REGION]);
        if ($region) {
            $saoSalesOrderItem->setRegion($region);
        }
    }

    /**
     * @param $region
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    protected function getRegionByName($region)
    {
        return $this->facadeMisc->getRegionByName($region);
    }

    /**
     * @param $product
     * @param $saoSalesOrderItem
     */
    protected function addCountryToSalesOrderItem($product, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $country = $this->getCountryByIso2Code($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_COUNTRY_CODE]);
        if ($country) {
            $saoSalesOrderItem->setCountry($country);
        }
    }

    /**
     * @param $region
     * @return Sao_Zed_Misc_Persistence_MiscRegion
     */
    protected function getCountryByIso2Code($iso2code)
    {
        return $this->facadeMisc->getCountryFacade()->getCountryByIso2Code($iso2code);
    }

}
