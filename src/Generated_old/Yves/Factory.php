<?php 

namespace Generated\Yves;

use ProjectA\Yves\Library\DependencyInjection\FactoryInterface;

/**
 *
 */
class Factory extends \ProjectA_Shared_Library_Architecture_Store
{

    /**
     * @var Factory
     */
    protected static $instance = null;

    /**
     * @return Factory
     * @throws \BadMethodCallException
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    /**
     * @param $values (optional) default: array(
     *     
     * )
     * @return \ProjectA\Yves\Application\Business\Application
     */
    public function createApplicationApplication($values = array())
    {
        $class = $this->transformClassName('ProjectA\Yves\Application\Business\Application');
        $model = new $class($values);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @return \ProjectA\Yves\Application\Business\Routing\Helper
     */
    public function createApplicationRoutingHelper(\Silex\Application $app)
    {
        $class = $this->transformClassName('ProjectA\Yves\Application\Business\Routing\Helper');
        $model = new $class($app);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param $paths (optional) default: array(
     *     
     * )
     * @return \ProjectA\Yves\Application\Business\Twig\Loader\YvesFilesystemLoader
     */
    public function createApplicationTwigLoaderYvesFilesystemLoader($paths = array())
    {
        $class = $this->transformClassName('ProjectA\Yves\Application\Business\Twig\Loader\YvesFilesystemLoader');
        $model = new $class($paths);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Library\Asset\AssetManager $assetManager
     * @return \ProjectA\Yves\Application\Business\Twig\YvesExtension
     */
    public function createApplicationTwigYvesExtension(\ProjectA\Yves\Library\Asset\AssetManager $assetManager)
    {
        $class = $this->transformClassName('ProjectA\Yves\Application\Business\Twig\YvesExtension');
        $model = new $class($assetManager);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Library\Session\TransferSession $session
     * @return \ProjectA\Yves\Cart\Business\Model\CartSession
     */
    public function createCartModelCartSession(\ProjectA\Yves\Library\Session\TransferSession $session)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\CartSession');
        $model = new $class($session);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \ArrayObject $cookieBag
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     * @return \ProjectA\Yves\Cart\Business\Model\CartStorage\ZedStorage
     */
    public function createCartModelCartStorageZedStorage(\Symfony\Component\HttpFoundation\Request $request, \ArrayObject $cookieBag, \Symfony\Component\HttpFoundation\Session\SessionInterface $session)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\CartStorage\ZedStorage');
        $model = new $class($request, $cookieBag, $session);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cart\Business\Model\CatalogHelper
     */
    public function createCartModelCatalogHelper()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\CatalogHelper');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator
     * @return \ProjectA\Yves\Cart\Business\Model\Helper\ItemGrouper
     */
    public function createCartModelHelperItemGrouper(\ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\Helper\ItemGrouper');
        $model = new $class($transferLocator);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \ProjectA\Yves\Cart\Business\Model\Router\CartRouter
     */
    public function createCartModelRouterCartRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\Router\CartRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     * @return \ProjectA\Yves\Cart\Business\Model\SessionCartCount
     */
    public function createCartModelSessionCartCount(\Symfony\Component\HttpFoundation\Session\SessionInterface $session)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\SessionCartCount');
        $model = new $class($session);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @return \ProjectA\Yves\Cart\Business\Model\Tracking\CartDataProvider
     */
    public function createCartModelTrackingCartDataProvider(\Silex\Application $app)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\Tracking\CartDataProvider');
        $model = new $class($app);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Cart\Business\Model\Tracking\CartDataProvider $cartDataProvider
     * @return \ProjectA\Yves\Cart\Business\Model\Tracking\ItemDataProvider
     */
    public function createCartModelTrackingItemDataProvider(\ProjectA\Yves\Cart\Business\Model\Tracking\CartDataProvider $cartDataProvider)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\Tracking\ItemDataProvider');
        $model = new $class($cartDataProvider);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Cart\Business\Model\CartSession $cartSession
     * @param \ProjectA\Shared\Sales\Code\AbstractItemGrouper $itemGrouper
     * @param \ProjectA\Yves\Cart\Business\Model\CartStorage\CartStorageInterface $cartStorage (optional) default: null
     * @param \ProjectA\Yves\Cart\Business\Model\CartCountInterface $cartCount (optional) default: null
     * @return \ProjectA\Yves\Cart\Business\Model\ZedCart
     */
    public function createCartModelZedCart(\ProjectA\Yves\Cart\Business\Model\CartSession $cartSession, \ProjectA\Shared\Sales\Code\AbstractItemGrouper $itemGrouper, \ProjectA\Yves\Cart\Business\Model\CartStorage\CartStorageInterface $cartStorage = null, \ProjectA\Yves\Cart\Business\Model\CartCountInterface $cartCount = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cart\Business\Model\ZedCart');
        $model = new $class($cartSession, $itemGrouper, $cartStorage, $cartCount);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \Pyz\Yves\Catalog\Business\DependencyContainer
     */
    public function createCatalogDependencyContainer()
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\DependencyContainer');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilder
     */
    public function createCatalogModelBuilderFacetAggregationBuilder()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilder');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\Builder\FilterBuilder
     */
    public function createCatalogModelBuilderFilterBuilder()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Builder\FilterBuilder');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Catalog\Business\Model\Builder\FilterBuilderInterface $filterBuilder
     * @return \ProjectA\Yves\Catalog\Business\Model\Builder\NestedFilterBuilder
     */
    public function createCatalogModelBuilderNestedFilterBuilder(\ProjectA\Yves\Catalog\Business\Model\Builder\FilterBuilderInterface $filterBuilder)
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Builder\NestedFilterBuilder');
        $model = new $class($filterBuilder);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $productKeyBuilder
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storageReader
     * @param $locale
     * @return \Pyz\Yves\Catalog\Business\Model\Catalog
     */
    public function createCatalogModelCatalog(\ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $productKeyBuilder, \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storageReader, $locale)
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\Model\Catalog');
        $model = new $class($productKeyBuilder, $storageReader, $locale);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\Category
     */
    public function createCatalogModelCategory()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Category');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Yves\Catalog\Business\Model\Exception\ProductNotFoundException
     */
    public function createCatalogModelExceptionProductNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Exception\ProductNotFoundException');
        $model = new $class($id);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\Extractor\FacetExtractor
     */
    public function createCatalogModelExtractorFacetExtractor()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Extractor\FacetExtractor');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\Extractor\RangeExtractor
     */
    public function createCatalogModelExtractorRangeExtractor()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\Extractor\RangeExtractor');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \Pyz\Yves\Catalog\Business\Model\FacetConfig
     */
    public function createCatalogModelFacetConfig()
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\Model\FacetConfig');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Catalog\Business\Model\Builder\NestedFilterBuilderInterface $nestedFilterBuilder
     * @param \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig
     * @return \ProjectA\Yves\Catalog\Business\Model\FacetFilterHandler
     */
    public function createCatalogModelFacetFilterHandler(\ProjectA\Yves\Catalog\Business\Model\Builder\NestedFilterBuilderInterface $nestedFilterBuilder, \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig)
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\FacetFilterHandler');
        $model = new $class($nestedFilterBuilder, $facetConfig);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig
     * @param \Elastica\Index $searchIndex
     * @param \ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilderInterface $facetAggregation
     * @param \ProjectA\Yves\Catalog\Business\Model\FacetFilterHandlerInterface $facetFilterHandler
     * @param \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $facetExtractor
     * @param \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $rangeExtractor
     * @param \ProjectA\Yves\Catalog\Business\Model\CatalogInterface $catalogModel
     * @param $category
     * @return \ProjectA\Yves\Catalog\Business\Model\FacetSearch
     */
    public function createCatalogModelFacetSearch(\Symfony\Component\HttpFoundation\Request $request, \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig, \Elastica\Index $searchIndex, \ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilderInterface $facetAggregation, \ProjectA\Yves\Catalog\Business\Model\FacetFilterHandlerInterface $facetFilterHandler, \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $facetExtractor, \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $rangeExtractor, \ProjectA\Yves\Catalog\Business\Model\CatalogInterface $catalogModel, $category)
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\FacetSearch');
        $model = new $class($request, $facetConfig, $searchIndex, $facetAggregation, $facetFilterHandler, $facetExtractor, $rangeExtractor, $catalogModel, $category);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig
     * @param \Elastica\Index $searchIndex
     * @param \ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilderInterface $facetAggregation
     * @param \ProjectA\Yves\Catalog\Business\Model\FacetFilterHandlerInterface $facetFilterHandler
     * @param \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $facetExtractor
     * @param \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $rangeExtractor
     * @param \ProjectA\Yves\Catalog\Business\Model\CatalogInterface $catalogModel
     * @return \ProjectA\Yves\Catalog\Business\Model\FulltextSearch
     */
    public function createCatalogModelFulltextSearch(\Symfony\Component\HttpFoundation\Request $request, \ProjectA\Yves\Catalog\Business\Model\FacetConfig $facetConfig, \Elastica\Index $searchIndex, \ProjectA\Yves\Catalog\Business\Model\Builder\FacetAggregationBuilderInterface $facetAggregation, \ProjectA\Yves\Catalog\Business\Model\FacetFilterHandlerInterface $facetFilterHandler, \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $facetExtractor, \ProjectA\Yves\Catalog\Business\Model\Extractor\AggregationExtractorInterface $rangeExtractor, \ProjectA\Yves\Catalog\Business\Model\CatalogInterface $catalogModel)
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\FulltextSearch');
        $model = new $class($request, $facetConfig, $searchIndex, $facetAggregation, $facetFilterHandler, $facetExtractor, $rangeExtractor, $catalogModel);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Catalog\Business\Model\UrlMapper
     */
    public function createCatalogModelUrlMapper()
    {
        $class = $this->transformClassName('ProjectA\Yves\Catalog\Business\Model\UrlMapper');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \Pyz\Yves\Catalog\Business\CatalogSettings
     */
    public function createCatalogCatalogSettings()
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\CatalogSettings');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Pyz\Yves\Catalog\Business\Model\FacetConfig $facetConfig
     * @return \Pyz\Yves\Catalog\Business\Creator\CategoryResourceCreator
     */
    public function createCatalogCreatorCategoryResourceCreator(\Pyz\Yves\Catalog\Business\Model\FacetConfig $facetConfig)
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\Creator\CategoryResourceCreator');
        $model = new $class($facetConfig);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \Pyz\Yves\Catalog\Business\Model\Router\CatalogDetailRouter
     */
    public function createCatalogModelRouterCatalogDetailRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\Model\Router\CatalogDetailRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \Pyz\Yves\Catalog\Business\Model\Router\SearchRouter
     */
    public function createCatalogModelRouterSearchRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('Pyz\Yves\Catalog\Business\Model\Router\SearchRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $kvReader
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @return \ProjectA\Yves\CategoryExporter\Business\Builder\CategoryTreeBuilder
     */
    public function createCategoryExporterBuilderCategoryTreeBuilder(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $kvReader, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder)
    {
        $class = $this->transformClassName('ProjectA\Yves\CategoryExporter\Business\Builder\CategoryTreeBuilder');
        $model = new $class($kvReader, $keyBuilder);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\CategoryExporter\Business\DependencyContainer
     */
    public function createCategoryExporterDependencyContainer()
    {
        $class = $this->transformClassName('ProjectA\Yves\CategoryExporter\Business\DependencyContainer');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlBuilder
     * @return \ProjectA\Yves\CategoryExporter\Business\Model\Navigation
     */
    public function createCategoryExporterModelNavigation(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlBuilder)
    {
        $class = $this->transformClassName('ProjectA\Yves\CategoryExporter\Business\Model\Navigation');
        $model = new $class($keyValueReader, $urlBuilder);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Cart\Business\Model\CartInterface $cart
     * @return \ProjectA\Yves\Checkout\Business\Model\OrderManager
     */
    public function createCheckoutModelOrderManager(\ProjectA\Yves\Cart\Business\Model\CartInterface $cart)
    {
        $class = $this->transformClassName('ProjectA\Yves\Checkout\Business\Model\OrderManager');
        $model = new $class($cart);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cms\Business\Model\Cms
     */
    public function createCmsModelCms()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\Cms');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\Attribute
     */
    public function createCmsModelCmsPageAttribute()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\Attribute');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\AttributeCollection
     */
    public function createCmsModelCmsPageAttributeCollection()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\AttributeCollection');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\BlockCollection
     */
    public function createCmsModelCmsPageBlockCollection()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\BlockCollection');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\BlockDummy
     */
    public function createCmsModelCmsPageBlockDummy(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\BlockDummy');
        $model = new $class($storage);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\BlockGlossary
     */
    public function createCmsModelCmsPageBlockGlossary(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\BlockGlossary');
        $model = new $class($storage);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\BlockProduct
     */
    public function createCmsModelCmsPageBlockProduct(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\BlockProduct');
        $model = new $class($storage);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\BlockText
     */
    public function createCmsModelCmsPageBlockText(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\BlockText');
        $model = new $class($storage);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage\CmsPageBuilder
     */
    public function createCmsModelCmsPageCmsPageBuilder(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $storage = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage\CmsPageBuilder');
        $model = new $class($storage);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Cms\Business\Model\CmsPage
     */
    public function createCmsModelCmsPage()
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\CmsPage');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\Router\CmsRouter
     */
    public function createCmsModelRouterCmsRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\Router\CmsRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \ProjectA\Yves\Cms\Business\Model\Router\RedirectRouter
     */
    public function createCmsModelRouterRedirectRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Cms\Business\Model\Router\RedirectRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Application\Business\Application $app
     * @return \ProjectA\Yves\Customer\Business\Model\Customer
     */
    public function createCustomerModelCustomer(\ProjectA\Yves\Application\Business\Application $app)
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Customer');
        $model = new $class($app);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\Security\Core\User\UserProviderInterface $customerProvider
     * @param \Symfony\Component\Security\Core\User\UserCheckerInterface $userChecker
     * @param $providerKey
     * @param $hideUserNotFoundExceptions (optional) default: true
     * @return \ProjectA\Yves\Customer\Business\Model\Security\AuthenticationProvider
     */
    public function createCustomerModelSecurityAuthenticationProvider(\Symfony\Component\Security\Core\User\UserProviderInterface $customerProvider, \Symfony\Component\Security\Core\User\UserCheckerInterface $userChecker, $providerKey, $hideUserNotFoundExceptions = true)
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\AuthenticationProvider');
        $model = new $class($customerProvider, $userChecker, $providerKey, $hideUserNotFoundExceptions);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Yves\Customer\Business\Model\Security\Configuration\ConfigurationException
     */
    public function createCustomerModelSecurityConfigurationConfigurationException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\Configuration\ConfigurationException');
        $model = new $class($message, $code, $previous);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Customer\Business\Model\Security\Configuration
     */
    public function createCustomerModelSecurityConfiguration()
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\Configuration');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customer
     * @param $roles (optional) default: array(
     *     'ROLE_USER'
     * )
     * @return \ProjectA\Yves\Customer\Business\Model\Security\Customer
     */
    public function createCustomerModelSecurityCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customer, $roles = array('ROLE_USER'))
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\Customer');
        $model = new $class($customer, $roles);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Customer\Business\Model\Security\AuthenticationModelInterface $auth
     * @return \ProjectA\Yves\Customer\Business\Model\Security\CustomerProvider
     */
    public function createCustomerModelSecurityCustomerProvider(\ProjectA\Yves\Customer\Business\Model\Security\AuthenticationModelInterface $auth)
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\CustomerProvider');
        $model = new $class($auth);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Customer\Business\Model\Security\SecurityServiceProvider
     */
    public function createCustomerModelSecuritySecurityServiceProvider()
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Security\SecurityServiceProvider');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @return \ProjectA\Yves\Customer\Business\Model\Tracking\CustomerDataProvider
     */
    public function createCustomerModelTrackingCustomerDataProvider(\Silex\Application $app)
    {
        $class = $this->transformClassName('ProjectA\Yves\Customer\Business\Model\Tracking\CustomerDataProvider');
        $model = new $class($app);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\FrontendExporter\Business\DependencyContainer
     */
    public function createFrontendExporterDependencyContainer()
    {
        $class = $this->transformClassName('ProjectA\Yves\FrontendExporter\Business\DependencyContainer');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader
     * @return \ProjectA\Yves\FrontendExporter\Business\Matcher\UrlMatcher
     */
    public function createFrontendExporterMatcherUrlMatcher(\ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder, \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader)
    {
        $class = $this->transformClassName('ProjectA\Yves\FrontendExporter\Business\Matcher\UrlMatcher');
        $model = new $class($urlKeyBuilder, $keyValueReader);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param $referenceKey (optional) default: null
     * @param $type (optional) default: null
     * @return \ProjectA\Yves\FrontendExporter\Business\Model\UrlResource
     */
    public function createFrontendExporterModelUrlResource($referenceKey = null, $type = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\FrontendExporter\Business\Model\UrlResource');
        $model = new $class($referenceKey, $type);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param \ProjectA\Yves\FrontendExporter\Business\Matcher\UrlMatcherInterface $urlMatcher
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader
     * @param $sslEnabled (optional) default: null
     * @return \ProjectA\Yves\FrontendExporter\Business\Router\StorageRouter
     */
    public function createFrontendExporterRouterStorageRouter(\Silex\Application $app, \ProjectA\Yves\FrontendExporter\Business\Matcher\UrlMatcherInterface $urlMatcher, \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader, $sslEnabled = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\FrontendExporter\Business\Router\StorageRouter');
        $model = new $class($app, $urlMatcher, $keyValueReader, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Newsletter\Business\Model\Subscription
     */
    public function createNewsletterModelSubscription()
    {
        $class = $this->transformClassName('ProjectA\Yves\Newsletter\Business\Model\Subscription');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \ProjectA\Yves\Payment\Business\Model\Payment
     */
    public function createPaymentModelPayment(\Symfony\Component\HttpFoundation\Request $request)
    {
        $class = $this->transformClassName('ProjectA\Yves\Payment\Business\Model\Payment');
        $model = new $class($request);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Payone\Business\Model\ClientApi\ClientApi
     */
    public function createPayoneModelClientApiClientApi()
    {
        $class = $this->transformClassName('ProjectA\Yves\Payone\Business\Model\ClientApi\ClientApi');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Payone\Business\Model\ClientApi\HashGenerator
     */
    public function createPayoneModelClientApiHashGenerator()
    {
        $class = $this->transformClassName('ProjectA\Yves\Payone\Business\Model\ClientApi\HashGenerator');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Payone\Business\Model\ClientApi\Request\CreditCardCheck
     */
    public function createPayoneModelClientApiRequestCreditCardCheck()
    {
        $class = $this->transformClassName('ProjectA\Yves\Payone\Business\Model\ClientApi\Request\CreditCardCheck');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Product\Business\Builder\FrontendProductBuilder
     */
    public function createProductBuilderFrontendProductBuilder()
    {
        $class = $this->transformClassName('ProjectA\Yves\Product\Business\Builder\FrontendProductBuilder');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Product\Business\Model\Product
     */
    public function createProductModelProduct()
    {
        $class = $this->transformClassName('ProjectA\Yves\Product\Business\Model\Product');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \ProjectA\Yves\Product\Business\Builder\FrontendProductBuilderInterface $productBuilder
     * @return \ProjectA\Yves\ProductFrontendExporterConnector\Business\Creator\ProductResourceCreator
     */
    public function createProductFrontendExporterConnectorCreatorProductResourceCreator(\ProjectA\Yves\Product\Business\Builder\FrontendProductBuilderInterface $productBuilder)
    {
        $class = $this->transformClassName('ProjectA\Yves\ProductFrontendExporterConnector\Business\Creator\ProductResourceCreator');
        $model = new $class($productBuilder);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\ProductFrontendExporterConnector\Business\DependencyContainer
     */
    public function createProductFrontendExporterConnectorDependencyContainer()
    {
        $class = $this->transformClassName('ProjectA\Yves\ProductFrontendExporterConnector\Business\DependencyContainer');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @return \ProjectA\Yves\Setup\Business\Model\Heartbeat
     */
    public function createSetupModelHeartbeat()
    {
        $class = $this->transformClassName('ProjectA\Yves\Setup\Business\Model\Heartbeat');
        $model = new $class();
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }

    /**
     * @param \Silex\Application $app
     * @param $sslEnabled (optional) default: null
     * @return \ProjectA\Yves\Setup\Business\Model\Router\MonitoringRouter
     */
    public function createSetupModelRouterMonitoringRouter(\Silex\Application $app, $sslEnabled = null)
    {
        $class = $this->transformClassName('ProjectA\Yves\Setup\Business\Model\Router\MonitoringRouter');
        $model = new $class($app, $sslEnabled);
        if ($model instanceof FactoryInterface) {
            $model->setFactory($this);
        }
        return $model;
    }


}
