<?php

namespace Pyz\Zed\Sandbox\Communication\Controller;

use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Zed\Ide\AutoCompletion;
use Propel\Runtime\Propel;
use Pyz\Zed\Sandbox\Communication\Controller\Product\DataProvider;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;

class ProductController extends AbstractController
{

    public function indexAction()
    {
        $this->createAndCollectProductAction();
    }

    public function createAndCollectProductAction()
    {
        //        $connection = Propel::getConnection();
        //       $connection->beginTransaction();

        $productFacade = $this->getLocator()->product()->facade();
        $priceFacade = $this->getLocator()->price()->facade();
        $stockFacade = $this->getLocator()->stock()->facade();
        $stockFacade = $this->getLocator()->stock()->facade();

        $productDataProvider = new DataProvider();
        $productData = $productDataProvider->getProduct();
        $variantOneData = $productDataProvider->getVariant1();
        $variantTwoData = $productDataProvider->getVariant2();
        $variantData = [$variantOneData, $variantTwoData];

        $localeTransferDE = new LocaleTransfer();
        $localeTransferDE->setIsActive(true);
        $localeTransferDE->setLocaleName('de_DE');
        $localeTransferDE->setIdLocale(46); //this is required otherwise the locale id is not resolved by name

        $localeTransferEN = new LocaleTransfer();
        $localeTransferEN->setIsActive(true);
        $localeTransferEN->setLocaleName('en_US');
        $localeTransferEN->setIdLocale(66); //this is required otherwise the locale id is not resolved by name

        //default locale transfer
        $localizedAttributesTransferDE = new LocalizedAttributesTransfer();
        $localizedAttributesTransferDE->setName($productData['name']);
        $localizedAttributesTransferDE->setLocale($localeTransferDE);
        $localizedAttributesTransferDE->setAttributes($productData['attributes_de']);

        //to test multiple locale transfers
        $localizedAttributesTransferEN = new LocalizedAttributesTransfer();
        $localizedAttributesTransferEN->setName($productData['name']);
        $localizedAttributesTransferEN->setLocale($localeTransferEN);
        $localizedAttributesTransferEN->setAttributes($productData['attributes_en']);

        $abstractProductTransfer = new AbstractProductTransfer();
        $abstractProductTransfer->setIsActive(true);
        $abstractProductTransfer->setSku($productData['sku'].time());
        $abstractProductTransfer->setAttributes($productData['attributes']);

        //this will only work when the signature for setLocalizedAttributes() accept array as input
        $abstractProductTransfer->setLocalizedAttributes(
            new \ArrayObject([$localizedAttributesTransferDE])
        );

        $abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferDE);
        $abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferEN);

        //$abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferEN);

        /*
        using multiple addLocalizedAttributes() causes error: 
            "Tried to create abstract attributes for abstract product 90, locale id 46, but it already exists"
        
        $abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferDE);
        $abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferEN);
        
        same with 
        
        $abstractProductTransfer->setLocalizedAttributes([$localizedAttributesTransferDE]);
        $abstractProductTransfer->addLocalizedAttributes($localizedAttributesTransferEN);
        */

        $idAbstractProduct = $productFacade->createAbstractProduct($abstractProductTransfer);

        foreach ($variantData as $variantItemData) {
            //to test saving localized attributes for concrete products 
            $localizedAttributesTransferDE = new LocalizedAttributesTransfer();
            $localizedAttributesTransferDE->setName($variantItemData['name']);
            $localizedAttributesTransferDE->setLocale($localeTransferDE);
            $localizedAttributesTransferDE->setAttributes($variantItemData['attributes_de']);

            $localizedAttributesTransferEN = new LocalizedAttributesTransfer();
            $localizedAttributesTransferEN->setName($variantItemData['name']);
            $localizedAttributesTransferEN->setLocale($localeTransferEN);
            $localizedAttributesTransferEN->setAttributes($variantItemData['attributes_en']);

            $concreteProductTransfer = new ConcreteProductTransfer();
            $concreteProductTransfer->setIsActive(true);
            $concreteProductTransfer->setSku($variantItemData['sku'].time());
            $concreteProductTransfer->setAttributes($variantItemData['attributes']);
            $concreteProductTransfer->setLocalizedAttributes(
                new \ArrayObject([$localizedAttributesTransferDE, $localizedAttributesTransferEN])
            );

            $productFacade->createConcreteProduct($concreteProductTransfer, $idAbstractProduct);
        }

        //die(dump($productData));

        //$idAbstractProduct = $this->createAbstractProduct($productData);

        echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($idAbstractProduct    ) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();

        //        $localeTransfer = new LocaleTransfer();
        //        $localeTransfer->setIsActive(true);
        //        $localeTransfer->setLocaleName($locale);
        //
        //
        //
        //        $localizedAttributesTransferDE = new LocalizedAttributesTransfer();
        //        $localizedAttributesTransferDE->setName($productArray['name']);
        //        $localizedAttributesTransferDE->setLocale($localeTransfer);
        //        $localizedAttributesTransferDE->setAttributes($productArray['attributes_de']);
        //        $localizesAttributes = new \ArrayObject();
        //        $localizesAttributes[] = $localizedAttributesTransferDE;
        //        $abstractProductTransfer->setLocalizedAttributes($localizesAttributes);
        //
        //        $idAbstractProduct = $productFacade->createAbstractProduct($abstractProductTransfer);
        //
        //        $productFacade->createProductUrl($abstractProductTransfer->getSku(), $productArray['url'].time(), $localeTransfer);
        //
        //        $priceProductTransfer = new PriceProductTransfer();
        //        $priceProductTransfer->setSkuProduct($abstractProductTransfer->getSku());
        //        $priceProductTransfer->setIsActive(true);
        //        $priceProductTransfer->setPrice($productArray['price'] * 100); // prices are stored in cent
        //
        //        $priceFacade->createPriceForProduct($priceProductTransfer);
        //
        //        $variant = $this->getVariant1();
        //        $concreteProductTransfer = new ConcreteProductTransfer();
        //        $concreteProductTransfer->setSku($variant['sku'].time());
        //        $concreteProductTransfer->setAttributes($variant['attributes']);
        //        $productFacade->createConcreteProduct($concreteProductTransfer, $idAbstractProduct);
        //
        //        $stockProductTransfer = new StockProductTransfer();
        //        $stockProductTransfer->setSku($concreteProductTransfer->getSku());
        //        $stockProductTransfer->setStockType('Warehouse1');
        //        $stockProductTransfer->setQuantity(100);
        //        $stockFacade->createStockProduct($stockProductTransfer);
        //
        //        $variant = $this->getVariant2();
        //        $concreteProductTransfer = new ConcreteProductTransfer();
        //        $concreteProductTransfer->setSku($variant['sku'].time());
        //        $concreteProductTransfer->setAttributes($variant['attributes']);
        //        $productFacade->createConcreteProduct($concreteProductTransfer, $idAbstractProduct);
        //        $stockProductTransfer = new StockProductTransfer();
        //        $stockProductTransfer->setSku($concreteProductTransfer->getSku());
        //        $stockProductTransfer->setStockType('Warehouse1');
        //        $stockProductTransfer->setQuantity(100);
        //        $stockFacade->createStockProduct($stockProductTransfer);

        //$connection->commitTransaction();

        die('<pre><b>' . print_r($idAbstractProduct, true) . '</b>' . PHP_EOL . __CLASS__ . ' ' . __LINE__);

    }



    /**
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

    /**
     * @param array $productData
     *
     * @return int
     */
    private function AAAcreateAbstractProduct(array $productData)
    {
        $productFacade = $this->getLocator()->product()->facade();

        $abstractProductTransfer = $this->createAbstractProductTransfer($productData);

        return $productFacade->createAbstractProduct($abstractProductTransfer);
    }

    /**
     * @param array $productData
     *
     * @return AbstractProductTransfer
     */
    private function AAcreateAbstractProductTransfer(array $productData)
    {
        //        $abstractProductTransfer->setSku($productArray['sku'] . time());
        //        $abstractProductTransfer->setAttributes($productArray['attributes']);

        $abstractProductTransfer = new AbstractProductTransfer();
        $abstractProductTransfer->fromArray($productData, true);

        return $abstractProductTransfer;
    }

}
