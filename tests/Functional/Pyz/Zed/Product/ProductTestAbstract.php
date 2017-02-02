<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Product;

use ArrayObject;
use Codeception\TestCase\Test;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;
use Generated\Shared\Transfer\StockProductTransfer;
use Orm\Zed\Stock\Persistence\SpyStock;
use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTax;
use Pyz\Zed\Product\Business\ProductBusinessFactory;
use Spryker\Service\UtilEncoding\UtilEncodingService;
use Spryker\Service\UtilText\UtilTextService;
use Spryker\Zed\Locale\Business\LocaleFacade;
use Spryker\Zed\Price\Business\PriceFacade;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractAfterCreatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractAfterUpdatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractReadPlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteAfterCreatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteAfterUpdatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteReadPlugin;
use Spryker\Zed\Price\Persistence\PriceQueryContainer;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterCreatePlugin as ImageSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterUpdatePlugin as ImageSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractReadPlugin as ImageSetProductAbstractReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterCreatePlugin as ImageSetProductConcreteAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterUpdatePlugin as ImageSetProductConcreteAfterUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteReadPlugin as ImageSetProductConcreteReadPlugin;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainer;
use Spryker\Zed\Product\Business\ProductFacade;
use Spryker\Zed\Product\Business\Product\Assertion\ProductAbstractAssertion;
use Spryker\Zed\Product\Business\Product\Assertion\ProductConcreteAssertion;
use Spryker\Zed\Product\Business\Product\Plugin\PluginAbstractManager;
use Spryker\Zed\Product\Business\Product\Plugin\PluginConcreteManager;
use Spryker\Zed\Product\Business\Product\ProductAbstractManager;
use Spryker\Zed\Product\Business\Product\ProductConcreteManager;
use Spryker\Zed\Product\Business\Product\ProductManager;
use Spryker\Zed\Product\Business\Product\Sku\SkuGenerator;
use Spryker\Zed\Product\Business\Product\Url\ProductUrlGenerator;
use Spryker\Zed\Product\Business\Product\Url\ProductUrlManager;
use Spryker\Zed\Product\Dependency\Facade\ProductToLocaleBridge;
use Spryker\Zed\Product\Dependency\Facade\ProductToTouchBridge;
use Spryker\Zed\Product\Dependency\Facade\ProductToUrlBridge;
use Spryker\Zed\Product\Dependency\Service\ProductToUtilTextBridge;
use Spryker\Zed\Product\Persistence\ProductQueryContainer;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterCreatePlugin as StockProductConcreteAfterCreatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterUpdatePlugin as StockProductConcreteAfterUpdatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteReadPlugin as StockProductConcreteReadPlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractReadPlugin;
use Spryker\Zed\Tax\Persistence\TaxQueryContainer;
use Spryker\Zed\Touch\Business\TouchFacade;
use Spryker\Zed\Touch\Persistence\TouchQueryContainer;
use Spryker\Zed\Url\Business\UrlFacade;

abstract class ProductTestAbstract extends Test
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

    const ABSTRACT_SKU = 'foo';
    const CONCRETE_SKU = 'foo-concrete';
    const IMAGE_SET_NAME = 'Default';
    const IMAGE_URL_LARGE = 'large';
    const IMAGE_URL_SMALL = 'small';
    const PRICE = 1234;
    const STOCK_QUANTITY = 99;

    /**
     * @var \Generated\Shared\Transfer\LocaleTransfer[]
     */
    protected $locales;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @var \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected $priceQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Persistence\TouchQueryContainerInterface
     */
    protected $touchQueryContainer;

    /**
     * @var \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface
     */
    protected $taxQueryContainer;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @var \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @var \Spryker\Service\UtilText\UtilTextServiceInterface
     */
    protected $utilTextService;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

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
     * @var \Spryker\Zed\Product\Business\Product\Url\ProductUrlManagerInterface
     */
    protected $productUrlManager;

    /**
     * @var \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected $productAbstractTransfer;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer;

    /**
     * @var \Spryker\Zed\Product\Dependency\Service\ProductToUtilEncodingInterface
     */
    protected $utilEncodingService;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->setupLocales();
        $this->setupProductAbstract();
        $this->setupProductConcrete();
        $this->setupPluginImages();
        $this->setupPluginPrices();
        $this->setupAbstractPluginData();
        $this->setupConcretePluginData();

        $this->localeFacade = new LocaleFacade();
        $this->productFacade = new ProductFacade();
        $this->urlFacade = new UrlFacade();
        $this->priceFacade = new PriceFacade();
        $this->touchFacade = new TouchFacade();
        $this->utilTextService = new UtilTextService();
        $this->productQueryContainer = new ProductQueryContainer();
        $this->touchQueryContainer = new TouchQueryContainer();
        $this->priceQueryContainer = new PriceQueryContainer();
        $this->productImageQueryContainer = new ProductImageQueryContainer();
        $this->taxQueryContainer = new TaxQueryContainer();
        $this->utilEncodingService = new UtilEncodingService();

        $productBusinessFactory = new ProductBusinessFactory();
        $urlBridge = new ProductToUrlBridge($this->urlFacade);
        $touchBridge = new ProductToTouchBridge($this->touchFacade);
        $localeBridge = new ProductToLocaleBridge($this->localeFacade);
        $utilTextBridge = new ProductToUtilTextBridge($this->utilTextService);

        $productAbstractAssertion = new ProductAbstractAssertion($this->productQueryContainer);
        $productConcreteAssertion = new ProductConcreteAssertion($this->productQueryContainer);

        $productConcretePluginManager = new PluginConcreteManager(
            $beforeCreatePlugins = [],
            $afterCreatePlugins = [
                new ImageSetProductConcreteAfterCreatePlugin(),
                new StockProductConcreteAfterCreatePlugin(),
                new PriceProductConcreteAfterCreatePlugin(),
            ],
            $readPlugins = [
                new ImageSetProductConcreteReadPlugin(),
                new StockProductConcreteReadPlugin(),
                new PriceProductConcreteReadPlugin(),
            ],
            $beforeUpdatePlugins = [],
            $afterUpdatePlugins = [
                new ImageSetProductConcreteAfterUpdatePlugin(),
                new StockProductConcreteAfterUpdatePlugin(),
                new PriceProductConcreteAfterUpdatePlugin(),
            ]
        );

        $this->productConcreteManager = new ProductConcreteManager(
            $this->productQueryContainer,
            $touchBridge,
            $localeBridge,
            $productAbstractAssertion,
            $productConcreteAssertion,
            $productConcretePluginManager,
            $productBusinessFactory->createAttributeEncoder(),
            $productBusinessFactory->createProductTransferMapper()
        );

        $productAbstractPluginManager = new PluginAbstractManager($beforeCreatePlugins = [], $afterCreatePlugins = [
            new ImageSetProductAbstractAfterCreatePlugin(),
            new TaxSetProductAbstractAfterCreatePlugin(),
            new PriceProductAbstractAfterCreatePlugin(),
        ], $readPlugins = [
            new ImageSetProductAbstractReadPlugin(),
            new TaxSetProductAbstractReadPlugin(),
            new PriceProductAbstractReadPlugin(),
        ], $beforeUpdatePlugins = [], $afterUpdatePlugins = [
            new ImageSetProductAbstractAfterUpdatePlugin(),
            new TaxSetProductAbstractAfterUpdatePlugin(),
            new PriceProductAbstractAfterUpdatePlugin(),
        ]);

        $this->productAbstractManager = new ProductAbstractManager(
            $this->productQueryContainer,
            $touchBridge,
            $localeBridge,
            $productAbstractAssertion,
            $productAbstractPluginManager,
            new SkuGenerator($utilTextBridge),
            $productBusinessFactory->createAttributeEncoder(),
            $productBusinessFactory->createProductTransferMapper()
        );

        $urlGenerator = new ProductUrlGenerator(
            $this->productAbstractManager,
            $localeBridge,
            $utilTextBridge
        );

        $this->productUrlManager = new ProductUrlManager(
            $urlBridge,
            $touchBridge,
            $localeBridge,
            $this->productQueryContainer,
            $urlGenerator
        );

        $this->productManager = new ProductManager(
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
        $this->locales['de_DE']->setIdLocale(46)->setIsActive(true)->setLocaleName('de_DE');

        $this->locales['en_US'] = new LocaleTransfer();
        $this->locales['en_US']->setIdLocale(66)->setIsActive(true)->setLocaleName('en_US');
    }

    /**
     * @return void
     */
    protected function setupProductAbstract()
    {
        $this->productAbstractTransfer = new ProductAbstractTransfer();
        $this->productAbstractTransfer->setSku(self::ABSTRACT_SKU);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute->setName(self::PRODUCT_ABSTRACT_NAME['de_DE'])->setLocale($this->locales['de_DE']);

        $this->productAbstractTransfer->addLocalizedAttributes($localizedAttribute);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute->setName(self::PRODUCT_ABSTRACT_NAME['en_US'])->setLocale($this->locales['en_US']);

        $this->productAbstractTransfer->addLocalizedAttributes($localizedAttribute);
    }

    /**
     * @return void
     */
    protected function setupProductConcrete()
    {
        $this->productConcreteTransfer = new ProductConcreteTransfer();
        $this->productConcreteTransfer->setSku(self::CONCRETE_SKU);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute->setName(self::PRODUCT_CONCRETE_NAME['de_DE'])->setLocale($this->locales['de_DE']);

        $this->productConcreteTransfer->addLocalizedAttributes($localizedAttribute);

        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute->setName(self::PRODUCT_CONCRETE_NAME['en_US'])->setLocale($this->locales['en_US']);

        $this->productConcreteTransfer->addLocalizedAttributes($localizedAttribute);
    }

    /**
     * @return void
     */
    protected function setupTaxes()
    {
        $taxSet = new SpyTaxSet();
        $taxSet->setName('DEFAULT');
        $taxSet->save();

        $taxSetRate = new SpyTaxRate();
        $taxSetRate->setFkCountry(60);
        $taxSetRate->setName('Test');

        $taxSetTaxTax = new SpyTaxSetTax();
        $taxSetTaxTax->setFkTaxRate($taxSetRate->getIdTaxRate());
        $taxSetTaxTax->setFkTaxSet($taxSet->getIdTaxSet());

        $this->productAbstractTransfer->setIdTaxSet($taxSet->getIdTaxSet());
    }

    /**
     * @return void
     */
    protected function setupStocks()
    {
        $stockEntity = new SpyStock();
        $stockEntity->setName('TEST');
        $stockEntity->save();

        $stock = (new StockProductTransfer())
            ->setStockType($stockEntity->getName())
            ->setQuantity(self::STOCK_QUANTITY);

        $this->productConcreteTransfer->setStocks(new ArrayObject($stock));
    }

    /**
     * @return void
     */
    protected function setupPluginImages()
    {
        $imageSetTransfer = (new ProductImageSetTransfer())
            ->setName(self::IMAGE_SET_NAME);

        $imageTransfer = (new ProductImageTransfer())
            ->setExternalUrlLarge(self::IMAGE_URL_LARGE)
            ->setExternalUrlSmall(self::IMAGE_URL_SMALL);

        $imageSetTransfer->setProductImages(
            new ArrayObject([$imageTransfer])
        );

        $this->productAbstractTransfer->setImageSets(
            new ArrayObject([$imageSetTransfer])
        );

        $this->productConcreteTransfer->setImageSets(
            new ArrayObject([$imageSetTransfer])
        );
    }

    /**
     * @return void
     */
    protected function setupPluginPrices()
    {
        $price = (new PriceProductTransfer())
            ->setPrice(self::PRICE);

        $this->productAbstractTransfer->setPrice($price);
        $this->productConcreteTransfer->setPrice($price);
    }

    /**
     * @return void
     */
    protected function setupAbstractPluginData()
    {
        $this->setupTaxes();
    }

    /**
     * @return void
     */
    protected function setupConcretePluginData()
    {
        $this->setupStocks();
    }

    /**
     * @return void
     */
    protected function setupDefaultProducts()
    {
        $this->productManager->addProduct($this->productAbstractTransfer, [$this->productConcreteTransfer]);
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function getProductAbstractEntityById($idProductAbstract)
    {
        return $this->productQueryContainer
            ->queryProductAbstract()
            ->filterByIdProductAbstract($idProductAbstract)
            ->findOne();
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct
     */
    protected function getProductConcreteEntityByAbstractId($idProductAbstract)
    {
        return $this->productQueryContainer
            ->queryProduct()
            ->filterByFkProductAbstract($idProductAbstract)
            ->findOne();
    }

}
