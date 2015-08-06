<?php

namespace Pyz\Zed\Sandbox\Communication\Controller;

use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TaxRateTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Generated\Zed\Ide\AutoCompletion;
use Propel\Runtime\Propel;
use Pyz\Zed\Sandbox\Communication\Controller\Product\DataProvider;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;

class ProductReneController extends AbstractController
{

    public function createAndCollectProductAction()
    {
        $connection = Propel::getConnection();
        $connection->beginTransaction();

        $taxSetTransfer = $this->createTaxSet();

        $idAbstractProduct = $this->createAbstractProduct($taxSetTransfer);
        $productData = (new DataProvider())->getVariant1();
        $this->createConcreteProduct($idAbstractProduct, $productData);

        $productData = (new DataProvider())->getVariant2();
        $this->createConcreteProduct($idAbstractProduct, $productData);

        $this->addPriceToAbstractProduct();
        $this->addUrlForProduct($idAbstractProduct);

        $this->getLocator()->touch()->facade()->touchActive('abstract_product', $idAbstractProduct);

        $connection->commit();
        // add localized attributes
        echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($idAbstractProduct) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();

    }

    /**
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

    /**
     * @param TaxSetTransfer $taxSetTransfer
     *
     * @return int
     */
    private function createAbstractProduct(TaxSetTransfer $taxSetTransfer)
    {
        $productFacade = $this->getLocator()->product()->facade();
        $abstractProductTransfer = $this->createAbstractProductTransfer();

        return $productFacade->createAbstractProduct($abstractProductTransfer);
    }

    private function addPriceToAbstractProduct()
    {
        $priceFacade = $this->getLocator()->price()->facade();
        $productData = (new DataProvider())->getProduct();
        $priceProductTransfer = new PriceProductTransfer();
        $priceProductTransfer->setSkuProduct($productData['sku']);
        $priceProductTransfer->setPrice($productData['price']);

        $priceFacade->createPriceForProduct($priceProductTransfer);
    }

    private function addUrlForProduct($idAbstractProduct)
    {
        $urlFacade = $this->getLocator()->url()->facade();
        $productData = (new DataProvider())->getProduct();

        return $urlFacade->createUrlForCurrentLocale($productData['url'], 'abstractProduct', $idAbstractProduct);
    }

    /**
     * @param $idAbstractProduct
     *
     * @return int
     */
    private function createConcreteProduct($idAbstractProduct, array $productData)
    {
        $productFacade = $this->getLocator()->product()->facade();
        $concreteProductTransfer = $this->createConcreteProductTransfer($idAbstractProduct, $productData);

        $productFacade->createConcreteProduct($concreteProductTransfer, $idAbstractProduct);

        $this->addStockForConcreteProduct($idAbstractProduct, $productData);
    }

    /**
     * @param $idAbstractProduct
     * @param array $productData
     */
    private function addStockForConcreteProduct($idAbstractProduct, array $productData)
    {
        $stockFacade = $this->getLocator()->stock()->facade();
        $stockProductTransfer = new StockProductTransfer();
        $stockProductTransfer
            ->setSku($productData['sku'])
            ->setQuantity($productData['stock'])
            ->setStockType('Warehouse1')
        ;
        $stockFacade->createStockProduct($stockProductTransfer);
    }

    /**
     * @return AbstractProductTransfer
     */
    private function createAbstractProductTransfer()
    {
        $productData = (new DataProvider())->getProduct();

        $abstractProductTransfer = new AbstractProductTransfer();
        $abstractProductTransfer->fromArray($productData, true);

        return $abstractProductTransfer;
    }

    /**
     * @param $idAbstractProduct
     * @param array $productData
     *
     * @return ConcreteProductTransfer
     */
    private function createConcreteProductTransfer($idAbstractProduct, array $productData)
    {
        $concreteProductTransfer = new ConcreteProductTransfer();
        $concreteProductTransfer->setIdAbstractProduct($idAbstractProduct);
        $concreteProductTransfer->fromArray($productData, true);
        $concreteProductTransfer->setIsActive(true);

        return $concreteProductTransfer;
    }

    /**
     * @return LocaleTransfer
     */
    private function createLocaleTransfer()
    {
        $localeData = (new DataProvider())->getLocale();
        $localeTransfer = new LocaleTransfer();

        $localeTransfer->fromArray($localeData);

        return $localeTransfer;
    }

    /**
     * @return LocalizedAttributesTransfer
     */
    private function createLocalizedAttributesTransfer()
    {
        $productData = (new DataProvider())->getProduct();
        $localeTransfer = $this->createLocaleTransfer();

        $localizedAttributesTransferDE = new LocalizedAttributesTransfer();
        $localizedAttributesTransferDE->setName($productData['name']);
        $localizedAttributesTransferDE->setAttributes($productData['attributes_de']);
        $localizedAttributesTransferDE->setLocale($localeTransfer);

        return $localizedAttributesTransferDE;
    }

    /**
     * @return TaxSetTransfer
     */
    private function createTaxSet()
    {
        $productData = (new DataProvider())->getProduct();

        $taxFacade = $this->getLocator()->tax()->facade();
        $taxRateTransfer = new TaxRateTransfer();
        $taxRateTransfer
            ->setName('19 %')
            ->setRate(str_replace('%', '', $productData['tax_rate']))
        ;

        $taxSetTransfer = new TaxSetTransfer();
        $taxSetTransfer->setName('German Tax rate')->addTaxRate($taxRateTransfer);
        $taxFacade->createTaxSet($taxSetTransfer);

        return $taxSetTransfer;
    }
}
