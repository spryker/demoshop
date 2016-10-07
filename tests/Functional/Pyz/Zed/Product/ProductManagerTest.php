<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Product;

use Codeception\TestCase\Test;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;
use Generated\Shared\Transfer\StockProductTransfer;
use Spryker\Zed\Locale\Business\LocaleFacade;
use Spryker\Zed\Price\Business\PriceFacade;
use Spryker\Zed\Product\Business\Product\ProductManager;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractCreatePlugin as ImageSetProductAbstractCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractReadPlugin as ImageSetProductAbstractReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractUpdatePlugin as ImageSetProductAbstractUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteCreatePlugin as ImageSetProductConcreteCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteReadPlugin as ImageSetProductConcreteReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteUpdatePlugin as ImageSetProductConcreteUpdatePlugin;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;
use Spryker\Zed\Product\Business\ProductFacade;
use Spryker\Zed\Product\Business\Product\ProductAbstractAssertion;
use Spryker\Zed\Product\Business\Product\ProductAbstractManager;
use Spryker\Zed\Product\Business\Product\ProductConcreteAssertion;
use Spryker\Zed\Product\Business\Product\ProductConcreteManager;
use Spryker\Zed\Product\Dependency\Facade\ProductToLocaleBridge;
use Spryker\Zed\Product\Dependency\Facade\ProductToPriceBridge;
use Spryker\Zed\Product\Dependency\Facade\ProductToTouchBridge;
use Spryker\Zed\Product\Dependency\Facade\ProductToUrlBridge;
use Spryker\Zed\Product\Persistence\ProductQueryContainer;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteCreatePlugin as StockProductConcreteCreatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteReadPlugin as StockProductConcreteReadPlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteUpdatePlugin as StockProductConcreteUpdatePlugin;
use Spryker\Zed\Touch\Persistence\TouchQueryContainer;
use Spryker\Zed\Url\Business\UrlFacade;

/**
 * @group Functional
 * @group Spryker
 * @group Pyz
 * @group Zed
 * @group Product
 * @group ProductManagerTest
 */
class ProductManagerTest extends Test
{

    const PRODUCT_ABSTRACT_NAME = [
        'en_US' => 'Product name en_US',
        'de_DE' => 'Product name de_DE',
    ];

    const PRODUCT_CONCRETE_NAME = [
        'en_US' => 'Product concrete name en_US',
        'de_DE' => 'Product concrete name de_DE',
    ];

    const UPDATED_PRODUCT_ABSTRACT_NAME = [
        'en_US' => 'Updated Product name en_US',
        'de_DE' => 'Updated Product name de_DE',
    ];

    const UPDATED_PRODUCT_CONCRETE_NAME = [
        'en_US' => 'Updated Product concrete name en_US',
        'de_DE' => 'Updated Product concrete name de_DE',
    ];

    const ID_PRODUCT_ABSTRACT = 1;
    const ID_PRODUCT_CONCRETE = 1;

    const IMAGE_SET_NAME = 'Default';
    const IMAGE_URL_LARGE = 'large';
    const IMAGE_URL_SMALL = 'small';
    const PRICE = 1234;

    /**
     * @var \Generated\Shared\Transfer\LocaleTransfer[]
     */
    protected $locales;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Persistence\TouchQueryContainerInterface
     */
    protected $touchQueryContainer;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @var \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Zed\Product\Business\Product\ProductManagerInterface
     */
    protected $productManager;

    /**
     * @var \Spryker\Zed\Product\Business\Product\ProductAbstractManagerInterface
     */
    protected $productAbstractManager;

    /**
     * @var \Spryker\Zed\Product\Business\Product\ProductConcreteManagerInterface
     */
    protected $productConcreteManager;

    /**
     * @var \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected $productAbstractTransfer;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->setupLocales();
        $this->setupProductAbstract();
        $this->setupProductConcrete();

        $this->localeFacade = new LocaleFacade();
        $this->productFacade = new ProductFacade();
        $this->urlFacade = new UrlFacade();
        $this->priceFacade = new PriceFacade();
        $this->productQueryContainer = new ProductQueryContainer();
        $this->touchQueryContainer = new TouchQueryContainer();

        $attributeManager = new AttributeManager(
            $this->productQueryContainer
        );

        $productAbstractAssertion = new ProductAbstractAssertion(
            $this->productQueryContainer
        );

        $productConcreteAssertion = new ProductConcreteAssertion(
            $this->productQueryContainer
        );

        $this->productConcreteManager = new ProductConcreteManager(
            $attributeManager,
            $this->productQueryContainer,
            new ProductToTouchBridge($this->touchFacade),
            new ProductToUrlBridge($this->urlFacade),
            new ProductToLocaleBridge($this->localeFacade),
            new ProductToPriceBridge($this->priceFacade),
            $productAbstractAssertion,
            $productConcreteAssertion,
            $createPlugins = [
                new ImageSetProductConcreteCreatePlugin(),
                new StockProductConcreteCreatePlugin()
            ],
            $readPlugins = [
                new ImageSetProductConcreteReadPlugin(),
                new StockProductConcreteReadPlugin()
            ],
            $updatePlugins = [
                new ImageSetProductConcreteUpdatePlugin(),
                new StockProductConcreteUpdatePlugin()
            ]
        );

        $this->productAbstractManager = new ProductAbstractManager(
            $attributeManager,
            $this->productQueryContainer,
            new ProductToTouchBridge($this->touchFacade),
            new ProductToUrlBridge($this->urlFacade),
            new ProductToLocaleBridge($this->localeFacade),
            new ProductToPriceBridge($this->priceFacade),
            $this->productConcreteManager,
            $productAbstractAssertion,
            $createPlugins = [new ImageSetProductAbstractCreatePlugin()],
            $readPlugins = [new ImageSetProductAbstractReadPlugin()],
            $updatePlugins = [new ImageSetProductAbstractUpdatePlugin()]
        );

        $this->productManager = new ProductManager(
            $attributeManager,
            $this->productAbstractManager,
            $this->productConcreteManager,
            $this->productQueryContainer
        );
    }

    /**
     * @return void
     */
    protected function setupLocales()
    {
        $this->locales['de_DE'] = new LocaleTransfer();
        $this->locales['de_DE']
            ->setIdLocale(46)
            ->setIsActive(true)
            ->setLocaleName('de_DE');

        $this->locales['en_US'] = new LocaleTransfer();
        $this->locales['en_US']
            ->setIdLocale(66)
            ->setIsActive(true)
            ->setLocaleName('en_US');
    }

    /**
     * @return void
     */
    protected function setupProductAbstract()
    {
        $this->productAbstractTransfer = new ProductAbstractTransfer();
        $this->productAbstractTransfer
            ->setSku('foo')
            ->setIdProductAbstract(self::ID_PRODUCT_ABSTRACT);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute
            ->setName(self::PRODUCT_ABSTRACT_NAME['de_DE'])
            ->setLocale($this->locales['de_DE']);

        $this->productAbstractTransfer->addLocalizedAttributes($localizedAttribute);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute
            ->setName(self::PRODUCT_ABSTRACT_NAME['en_US'])
            ->setLocale($this->locales['en_US']);

        $this->productAbstractTransfer->addLocalizedAttributes($localizedAttribute);
    }

    /**
     * @return void
     */
    protected function setupProductConcrete()
    {
        $this->productConcreteTransfer = new ProductConcreteTransfer();
        $this->productConcreteTransfer
            ->setSku('foo-concrete')
            ->setIdProductConcrete(self::ID_PRODUCT_CONCRETE);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute
            ->setName(self::PRODUCT_CONCRETE_NAME['de_DE'])
            ->setLocale($this->locales['de_DE']);

        $this->productConcreteTransfer->addLocalizedAttributes($localizedAttribute);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute
            ->setName(self::PRODUCT_CONCRETE_NAME['en_US'])
            ->setLocale($this->locales['en_US']);

        $this->productConcreteTransfer->addLocalizedAttributes($localizedAttribute);
    }

    /**
     * @return void
     */
    public function testGetProductConcreteByIdShouldReturnFullyLoadedTransferObject()
    {
        $productAbstract = $this->buildNewProductAbstractTransfer();
        $productConcrete = $this->buildNewProductConcreteTransfer();

        $this->assertNotNull($productAbstract);

        $idProductAbstract = $this->productManager->addProduct($productAbstract, [$productConcrete]);

        $this->assertTrue($idProductAbstract > 0);
        //$this->assertReadProductAbstract($productAbstract);
        $this->assertReadProductConcrete($productAbstract);
    }

    /**
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function buildNewProductAbstractTransfer()
    {
        $productAbstract = new ProductAbstractTransfer();
        $productAbstract
            ->setAttributes(['foo' => 'bar'])
            ->setSku('Test Sku');

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
            ->setSku('Test Sku Concrete');

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
    protected function assertReadProductConcrete(ProductAbstractTransfer $productAbstractTransfer)
    {
        $this->assertProductPrice($productAbstractTransfer);
        //$this->assertProductStock($productAbstractTransfer);
        //$this->assertProductImages($productAbstractTransfer);
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


    protected function assertProductStock(ProductAbstractTransfer $productAbstractTransfer)
    {
        $concreteProductCollection = $this->productConcreteManager->getConcreteProductsByAbstractProductId(
            $productAbstractTransfer->getIdProductAbstract()
        );

        dump($concreteProductCollection);die;

        $stockCollection = (array) $productConcreteTransfer->getStock();



        $this->assertInstanceOf(StockProductTransfer::class, $stock);

        $this->assertEquals(self::PRICE, $stock->getPrice());
        $this->assertNotNull($stock->getIdProductAbstract());
        $this->assertNotNull($stock->getPriceTypeName());
    }

}
