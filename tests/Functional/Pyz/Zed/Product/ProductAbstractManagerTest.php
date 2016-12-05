<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Product;

use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;

/**
 * @group Functional
 * @group Spryker
 * @group Pyz
 * @group Zed
 * @group Product
 * @group ProductAbstractManagerTest
 */
class ProductAbstractManagerTest extends ProductTestAbstract
{

    /**
     * @return void
     */
    public function testCreateProductAbstractShouldCreateProductAbstractAndTriggerPlugins()
    {
        $idProductAbstract = $this->productAbstractManager->createProductAbstract($this->productAbstractTransfer);

        $this->assertTrue($idProductAbstract > 0);
        $this->productAbstractTransfer->setIdProductAbstract($idProductAbstract);
        $this->assertCreateProductAbstract($this->productAbstractTransfer);
    }

    /**
     * @return void
     */
    public function testSaveProductAbstractShouldUpdateProductAbstractAndTriggerPlugins()
    {
        $idProductAbstract = $this->productAbstractManager->createProductAbstract($this->productAbstractTransfer);
        $this->productAbstractTransfer->setIdProductAbstract($idProductAbstract);

        foreach ($this->productAbstractTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $localizedAttribute->setName(
                self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()]
            );
        }

        $idProductAbstract = $this->productAbstractManager->saveProductAbstract($this->productAbstractTransfer);

        $this->productAbstractTransfer->setIdProductAbstract($idProductAbstract);
        $this->assertSaveProductAbstract($this->productAbstractTransfer);
    }

    /**
     * @return void
     */
    public function testGetProductAbstractByIdShouldReturnFullyLoadedTransferObject()
    {
        $this->setupDefaultProducts();

        $productAbstract = $this->productAbstractManager->findProductAbstractById(
            $this->productAbstractTransfer->getIdProductAbstract()
        );

        $this->assertReadProductAbstract($productAbstract);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertCreateProductAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $createdProductEntity = $this->productQueryContainer
            ->queryProductAbstract()
            ->filterByIdProductAbstract($productAbstractTransfer->getIdProductAbstract())
            ->findOne();

        $this->assertNotNull($createdProductEntity);

        $this->assertEquals($productAbstractTransfer->getSku(), $createdProductEntity->getSku());
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertSaveProductAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $updatedProductEntity = $this->productQueryContainer
            ->queryProductAbstract()
            ->filterByIdProductAbstract($productAbstractTransfer->getIdProductAbstract())
            ->findOne();

        $this->assertNotNull($updatedProductEntity);
        $this->assertEquals($this->productAbstractTransfer->getSku(), $updatedProductEntity->getSku());

        foreach ($productAbstractTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $expectedProductName = self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()];

            $this->assertEquals($expectedProductName, $localizedAttribute->getName());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertReadProductAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $this->assertProductPrice($productAbstractTransfer);
        $this->assertProductImages($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertProductPrice(ProductAbstractTransfer $productAbstractTransfer)
    {
        $priceProduct = $productAbstractTransfer->getPrice();
        $this->assertInstanceOf(PriceProductTransfer::class, $priceProduct);
        $this->assertEquals(self::PRICE, $priceProduct->getPrice());
        $this->assertNotNull($priceProduct->getIdProductAbstract());
        $this->assertNotNull($priceProduct->getPriceTypeName());
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertProductImages(ProductAbstractTransfer $productAbstractTransfer)
    {
        /* @var ProductImageSetTransfer $imageSet */
        $imageSetCollection = (array)$productAbstractTransfer->getImageSets();
        $this->assertNotEmpty($imageSetCollection);
        $imageSet = $imageSetCollection[0];
        $this->assertInstanceOf(ProductImageSetTransfer::class, $imageSet);
        $this->assertNotNull($imageSet->getIdProductImageSet());
        $this->assertEquals($productAbstractTransfer->getIdProductAbstract(), $imageSet->getIdProductAbstract());

        $productImageCollection = (array)$imageSet->getProductImages();
        $this->assertNotEmpty($imageSetCollection);

        /* @var ProductImageTransfer $productImage */
        $productImage = $productImageCollection[0];
        $this->assertInstanceOf(ProductImageTransfer::class, $productImage);
        $this->assertEquals(self::IMAGE_URL_LARGE, $productImage->getExternalUrlLarge());
        $this->assertEquals(self::IMAGE_URL_SMALL, $productImage->getExternalUrlSmall());
    }

}
