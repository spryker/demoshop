<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Product;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
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
 * @group ProductManagerTest
 */
class ProductManagerTest extends ProductTestAbstract
{

    /**
     * @return void
     */
    public function testAddProductShouldTriggerPlugins()
    {
        $productAbstract = $this->buildNewProductAbstractTransfer();
        $productConcrete = $this->buildNewProductConcreteTransfer();

        $this->assertNotNull($productAbstract);

        $idProductAbstract = $this->productManager->addProduct($productAbstract, [$productConcrete]);

        $this->assertTrue($idProductAbstract > 0);
        $this->assertAddProductAbstract($productAbstract);
        $this->assertCreateProductConcrete($productConcrete);
        $this->assertProductPrice($productAbstract);
        $this->assertProductStock($productAbstract);
        $this->assertProductImages($productAbstract);
    }

    /**
     * @return void
     */
    public function testSaveProductShouldTriggerPlugins()
    {
        $productAbstract = $this->buildNewProductAbstractTransfer();
        $productConcrete = $this->buildNewProductConcreteTransfer();
        $idProductAbstract = $this->productManager->addProduct($productAbstract, [$productConcrete]);
        $productAbstract->setIdProductAbstract($idProductAbstract);
        list($productAbstract, $concreteProductCollection) = $this->updateProductData($productAbstract);

        $idProductAbstract = $this->productManager->saveProduct($productAbstract, $concreteProductCollection);

        $this->assertTrue($idProductAbstract > 0);
        $this->assertSaveProductAbstract($productAbstract);
        $this->assertProductPrice($productAbstract);
        $this->assertProductStock($productAbstract);
        $this->assertProductImages($productAbstract);
    }

    public function testReadShouldTriggerPlugins()
    {
        $productAbstract = $this->buildNewProductAbstractTransfer();
        $productConcrete = $this->buildNewProductConcreteTransfer();
        $idProductAbstract = $this->productManager->addProduct($productAbstract, [$productConcrete]);
        $productAbstract->setIdProductAbstract($idProductAbstract);

        $productAbstractTransfer = $this->productAbstractManager->getProductAbstractById($idProductAbstract);

        $imageSets = (array)$productAbstractTransfer->getImageSets();
        $this->assertNotEmpty($imageSets);
        foreach ($imageSets as $imageSet) {
            $this->assertInstanceOf(ProductImageSetTransfer::class, $imageSet);

            foreach ($imageSet->getProductImages() as $image) {
                $this->assertInstanceOf(ProductImageTransfer::class, $image);
            }
        }

        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->requireIdProductAbstract()->getIdProductAbstract()
        );
        foreach ($concreteProductCollection as $concreteProduct) {
            foreach ($concreteProduct->getStocks() as $stock) {
                $this->assertInstanceOf(StockProductTransfer::class, $stock);
            }
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return array
     */
    protected function updateProductData(ProductAbstractTransfer $productAbstractTransfer)
    {
        foreach ($productAbstractTransfer->getLocalizedAttributes() as $localizedAttribute) {
            $localizedAttribute->setName(
                self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()]
            );
        }

        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->getIdProductAbstract()
        );
        foreach ($concreteProductCollection as $concreteProduct) {
            foreach ($concreteProduct->getLocalizedAttributes() as $localizedAttribute) {
                $productName = self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()];
                $localizedAttribute->setName($productName);
            }
        }

        return [$productAbstractTransfer, $concreteProductCollection];
    }


    /**
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function buildNewProductAbstractTransfer()
    {
        $productAbstract = new ProductAbstractTransfer();
        $productAbstract
            ->setAttributes(['foo' => 'bar'])
            ->setSku('foo');

        foreach ($this->locales as $code => $localeTransfer) {
            $localizedValue = 'Foo Bar ' . $localeTransfer->getLocaleName();

            $localizedAttribute = (new LocalizedAttributesTransfer())
                ->setLocale($localeTransfer)
                ->setName($localizedValue)
                ->setDescription($localizedValue)
                ->setAttributes(['foo' => $localizedValue]);

            $productAbstract->addLocalizedAttributes($localizedAttribute);
        }

        $priceTransfer = (new PriceProductTransfer())
            ->setPrice(self::PRICE);

        $productAbstract->setPrice($priceTransfer);

        $imageSetTransfer = (new ProductImageSetTransfer())
            ->setName(self::IMAGE_SET_NAME);

        $imageTransfer = (new ProductImageTransfer())
            ->setExternalUrlLarge(self::IMAGE_URL_LARGE)
            ->setExternalUrlSmall(self::IMAGE_URL_SMALL);

        $imageSetTransfer->setProductImages(
            new \ArrayObject([$imageTransfer])
        );

        $productAbstract->setImageSets(
            new \ArrayObject([$imageSetTransfer])
        );

        return $productAbstract;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected function buildNewProductConcreteTransfer()
    {
        $productConcrete = new ProductConcreteTransfer();
        $productConcrete
            ->setAttributes(['foo' => 'bar'])
            ->setSku('foo-concrete');

        foreach ($this->locales as $code => $localeTransfer) {
            $localizedValue = 'Foo Bar Concrete ' . $localeTransfer->getLocaleName();

            $localizedAttribute = (new LocalizedAttributesTransfer())
                ->setLocale($localeTransfer)
                ->setName($localizedValue)
                ->setDescription($localizedValue)
                ->setAttributes(['foo' => $localizedValue]);

            $productConcrete->addLocalizedAttributes($localizedAttribute);
        }

        $priceTransfer = (new PriceProductTransfer())
            ->setPrice(self::PRICE);

        $productConcrete->setPrice($priceTransfer);

        $imageSetTransfer = (new ProductImageSetTransfer())
            ->setName(self::IMAGE_SET_NAME);

        $imageTransfer = (new ProductImageTransfer())
            ->setExternalUrlLarge(self::IMAGE_URL_LARGE)
            ->setExternalUrlSmall(self::IMAGE_URL_SMALL);

        $imageSetTransfer->setProductImages(
            new \ArrayObject([$imageTransfer])
        );

        $productConcrete->setImageSets(
            new \ArrayObject([$imageSetTransfer])
        );

        return $productConcrete;
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
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertProductImages(ProductAbstractTransfer $productAbstractTransfer)
    {
        $productImageCollection = $this->productImageQueryContainer
            ->queryImageCollectionByProductAbstractId($productAbstractTransfer->getIdProductAbstract())
            ->find();

        foreach ($productImageCollection as $productImage) {
            $this->assertEquals(self::IMAGE_URL_SMALL, $productImage->getExternalUrlSmall());
            $this->assertEquals(self::IMAGE_URL_LARGE, $productImage->getExternalUrlLarge());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertProductPrice(ProductAbstractTransfer $productAbstractTransfer)
    {
        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->getIdProductAbstract()
        );

        foreach ($concreteProductCollection as $productTransfer) {
            $priceProduct = $productTransfer->getPrice();
            $this->assertInstanceOf(PriceProductTransfer::class, $priceProduct);
            $this->assertEquals(self::PRICE, $priceProduct->getPrice());
            $this->assertNotNull($priceProduct->getIdProduct());
            $this->assertNotNull($priceProduct->getPriceTypeName());
        }
    }


    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertProductStock(ProductAbstractTransfer $productAbstractTransfer)
    {
        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->requireIdProductAbstract()->getIdProductAbstract()
        );

        foreach ($concreteProductCollection as $concreteProduct) {
            foreach ($concreteProduct->getStocks() as $stock) {
                $this->assertInstanceOf(StockProductTransfer::class, $stock);

                $this->assertEquals(self::PRICE, $stock->getPrice());
                $this->assertEquals($concreteProduct->getIdProductConcrete(), $stock->getIdStockProduct());
                $this->assertNotNull($stock->getIdProductAbstract());
                $this->assertNotNull($stock->getPriceTypeName());
            }
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertAddProductAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $updatedProductEntity = $this->productQueryContainer
            ->queryProductAbstract()
            ->filterByIdProductAbstract($productAbstractTransfer->getIdProductAbstract())
            ->findOne();

        $this->assertNotNull($updatedProductEntity);
        $this->assertEquals($this->productAbstractTransfer->getSku(), $updatedProductEntity->getSku());
        $this->assertCreateProductConcreteForAbstract($productAbstractTransfer);
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

        $this->assertSaveProductConcreteForAbstract($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertCreateProductConcreteForAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->requireIdProductAbstract()->getIdProductAbstract()
        );

        foreach ($concreteProductCollection as $concreteProduct) {
            $this->assertEquals($productAbstractTransfer->getIdProductAbstract(), $concreteProduct->getFkProductAbstract());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return void
     */
    protected function assertSaveProductConcreteForAbstract(ProductAbstractTransfer $productAbstractTransfer)
    {
        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->requireIdProductAbstract()->getIdProductAbstract()
        );

        foreach ($concreteProductCollection as $concreteProduct) {
            foreach ($concreteProduct->getLocalizedAttributes() as $localizedAttribute) {
                $expectedProductName = self::UPDATED_PRODUCT_ABSTRACT_NAME[$localizedAttribute->getLocale()->getLocaleName()];

                $this->assertEquals($expectedProductName, $localizedAttribute->getName());
                $this->assertEquals($productAbstractTransfer->getIdProductAbstract(), $concreteProduct->getFkProductAbstract());
            }
        }
    }

}
