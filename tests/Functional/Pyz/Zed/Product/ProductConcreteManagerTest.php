<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Product;

use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;
use Generated\Shared\Transfer\StockProductTransfer;

/**
 * @group Functional
 * @group Spryker
 * @group Pyz
 * @group Zed
 * @group Product
 * @group ProductConcreteManagerTest
 */
class ProductConcreteManagerTest extends ProductTestAbstract
{

    /**
     * @return void
     */
    public function testCreateProductConcreteShouldCreateProductAndTriggerPlugins()
    {
        $idProductAbstract = $this->productAbstractManager->createProductAbstract($this->productAbstractTransfer);
        $this->productConcreteTransfer->setFkProductAbstract($idProductAbstract);

        $idProductConcrete = $this->productConcreteManager->createProductConcrete($this->productConcreteTransfer);
        $this->productConcreteTransfer->setIdProductConcrete($idProductConcrete);
        $this->productConcreteTransfer->setFkProductAbstract($idProductAbstract);

        $this->assertTrue($idProductConcrete > 0);
        $this->productConcreteTransfer->setIdProductConcrete($idProductConcrete);
        $this->assertCreateProductConcrete($this->productConcreteTransfer);
    }

    /**
     * @return void
     */
    public function testSaveProductConcreteShouldUpdateProductAndTriggerPlugins()
    {
        $idProductAbstract = $this->productAbstractManager->createProductAbstract($this->productAbstractTransfer);
        $this->productConcreteTransfer->setFkProductAbstract($idProductAbstract);

        $idProductConcrete = $this->productConcreteManager->createProductConcrete($this->productConcreteTransfer);
        $this->productConcreteTransfer->setIdProductConcrete($idProductConcrete);
        $this->productConcreteTransfer->setFkProductAbstract($idProductAbstract);

        foreach ($this->productConcreteTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $localizedAttribute->setName(
                self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()]
            );
        }

        $idProductConcrete = $this->productConcreteManager->saveProductConcrete($this->productConcreteTransfer);

        $this->productConcreteTransfer->setIdProductConcrete($idProductConcrete);
        $this->assertSaveProductConcrete($this->productConcreteTransfer);
    }

    /**
     * @return void
     */
    public function testgetConcreteProductsByAbstractProductIdShouldReturnFullyLoadedTransferObject()
    {
        $this->setupDefaultProducts();

        $concreteCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $this->productAbstractTransfer->getIdProductAbstract()
        );

        foreach ($concreteCollection as $concreteProduct) {
            $this->assertReadProductConcrete($concreteProduct);
        }
    }

    /**
     * @param int $idProductConcrete
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct
     */
    protected function getProductConcreteEntityById($idProductConcrete)
    {
        return $this->productQueryContainer
            ->queryProduct()
            ->filterByIdProduct($idProductConcrete)
            ->findOne();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertCreateProductConcrete(ProductConcreteTransfer $productConcreteTransfer)
    {
        $createdProductEntity = $this->getProductConcreteEntityById($productConcreteTransfer->getIdProductConcrete());

        $this->assertNotNull($createdProductEntity);
        $this->assertEquals($productConcreteTransfer->getSku(), $createdProductEntity->getSku());
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertSaveProductConcrete(ProductConcreteTransfer $productConcreteTransfer)
    {
        $updatedProductEntity = $this->getProductConcreteEntityById($productConcreteTransfer->getIdProductConcrete());

        $this->assertNotNull($updatedProductEntity);
        $this->assertEquals($this->productConcreteTransfer->getSku(), $updatedProductEntity->getSku());

        foreach ($productConcreteTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $expectedProductName = self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()];

            $this->assertEquals($expectedProductName, $localizedAttribute->getName());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertReadProductConcrete(ProductConcreteTransfer $productConcreteTransfer)
    {
        $this->assertProductPrice($productConcreteTransfer);
        $this->assertProductStock($productConcreteTransfer);
        $this->assertProductImages($productConcreteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertProductPrice(ProductConcreteTransfer $productConcreteTransfer)
    {
        $priceProduct = $productConcreteTransfer->getPrice();
        $this->assertInstanceOf(PriceProductTransfer::class, $priceProduct);
        $this->assertEquals(self::PRICE, $priceProduct->getPrice());
        $this->assertNotNull($priceProduct->getIdProduct());
        $this->assertNotNull($priceProduct->getPriceTypeName());
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertProductStock(ProductConcreteTransfer $productConcreteTransfer)
    {
        $stockCollection = $productConcreteTransfer->getStocks();

        foreach ($stockCollection as $stock) {
            $this->assertInstanceOf(StockProductTransfer::class, $stock);
            $this->assertEquals(self::PRICE, $stock->getPrice());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function assertProductImages(ProductConcreteTransfer $productConcreteTransfer)
    {
        /* @var ProductImageSetTransfer $imageSet */
        $imageSetCollection = (array)$productConcreteTransfer->getImageSets();
        $this->assertNotEmpty($imageSetCollection);
        $imageSet = $imageSetCollection[0];
        $this->assertInstanceOf(ProductImageSetTransfer::class, $imageSet);
        $this->assertNotNull($imageSet->getIdProductImageSet());
        $this->assertEquals($productConcreteTransfer->getIdProductConcrete(), $imageSet->getIdProduct());

        $productImageCollection = (array)$imageSet->getProductImages();
        $this->assertNotEmpty($imageSetCollection);

        /* @var ProductImageTransfer $productImage */
        $productImage = $productImageCollection[0];
        $this->assertInstanceOf(ProductImageTransfer::class, $productImage);
        $this->assertEquals(self::IMAGE_URL_LARGE, $productImage->getExternalUrlLarge());
        $this->assertEquals(self::IMAGE_URL_SMALL, $productImage->getExternalUrlSmall());
    }

}
