<?php

/**
 * Catalog
 */
class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
{
//    /**
//     * @var Yp_Catalog_Model_Recension
//     */
//    protected $modelRecension;

//    /**
//     * @var int
//     */
//    protected $maxQuantity = 12;

//    /**
//     * @var int
//     */
//    protected $stockDisplayLimit = 5;


    public function init()
    {
        parent::init();
//        $this->modelRecension = ModelFactory::getYpCatalogModelRecension();
    }

    /**
     * Catalog Listing
     */
    public function actionIndex()
    {
//        $this->addBodyClass('catalog');
//
//        $categoryResult = array();
//        $emptySearchResult = false;
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//
//        $aggregator->addPagetype(PalShared_Tracking::PAGE_TYPE_CATALOG_LISTING);
//
//        //$catalogHelper = new Sao_Yves_Cms_Component_Model_ControllerHelper($this);
//        //$cmsPage = $this->getPage();
//        //$catalogHelper->setCmsPage($cmsPage);
//
//        // Prevent text searches for whitespace characters
//        if (isset($_GET[Yp_Catalog_Model_Catalog::PARAM_SEARCH]))
//            $_GET[Yp_Catalog_Model_Catalog::PARAM_SEARCH] = trim($_GET[Yp_Catalog_Model_Catalog::PARAM_SEARCH]);
//        if (isset($_POST[Yp_Catalog_Model_Catalog::PARAM_SEARCH]))
//            $_POST[Yp_Catalog_Model_Catalog::PARAM_SEARCH] = trim($_POST[Yp_Catalog_Model_Catalog::PARAM_SEARCH]);
//
//        $facets = ModelFactory::getYpCatalogModelFacets();
//        $facets->setStorage(Factory::getStorage());
//
//        $catalogListing = ModelFactory::getYpCatalogModelCatalog();
//        $catalogListing->setParams($this->getAllParams());
//        $catalogListing->setFacets($facets);
//
//        // fulltext search result page
//        if ($this->getParam(Yp_Catalog_Model_Catalog::PARAM_SEARCH)) {
//            $this->setIndex('noindex,nofollow');
//        }
//
//        $categories = $this->categories->getNavigationTree();
//
//        $categoryHelper = Sao_Yves_Category_Component_Model_Helper::getInstance();
//        $categoryParents = array();
//        $reducedTree = false;
//        $reducedTreeBack = null;
//
//        $categoryParam = $this->getParam(Yp_Catalog_Model_Catalog::PARAM_CATEGORY);
//
//        //register catalog page in session
//        $session = Factory::getSessionStorage();
//        $session->set(Yp_Catalog_Model_Helper::CATALOG_URL, $_SERVER['REQUEST_URI']);
//
//        if ($categoryParam == '') {
//            $this->breadcrumbs = array(
//                t(L::CATALOG_ALL_PRODUCTS)
//            );
//
//            $aggregator->addContentIdByParts(PalShared_Tracking::PAGE_TYPE_CATALOG_LISTING, ['overview']);
//
//        } else {
//            $categoryParents = $categoryHelper->getCategoryParents($categories, $categoryParam);
//
//            // set category parents in session to show it on detail page
//            $sessionCategories = array();
//
//            foreach ($categoryParents as $category) {
//                $this->breadcrumbs[$category['data']['name']] = '/' . $category['data']['url'];
//                $sessionCategories[$category['data']['name']] = '/' . $category['data']['url'];
//            }
//
//            $session->set('categories', $sessionCategories);
//
//            $aggregator->addContentIdByParts(PalShared_Tracking::PAGE_TYPE_CATALOG_LISTING, $this->breadcrumbs);
//
//            if (count($categoryParents) > 3) {
//                $reducedTree = true;
//                $reducedTreeBack = array_slice($categoryParents, count($categoryParents) - 4, 1);
//                $reducedTreeBack = end($reducedTreeBack);
//                $categoryParents = array_slice($categoryParents, count($categoryParents) - 3);
//            }
//            reset($categoryParents);
//            $categories = $categoryHelper->getCategoryNeighbours($categories, $categoryHelper->getCategoryIdFromKey(key($categoryParents)));
//        }
//
//        $result = $catalogListing->getResult();
//        $result['facetsByType']['bool'] = $catalogListing->removeEmptyBoolFacets($result['facetsByType']['bool']);
//
//        $outOfStockProducts = array(
//            'products' => array()
//        );
//        foreach ($result['products'] as $key => $product) {
//            if ($product['quantity'] < 1) {
//                $outOfStockProducts['products'][$key] = $product;
//                unset($result['products'][$key]);
//            }
//        }
//
//        $categoryModel = ModelFactory::getYpCategoryModelCategory(Factory::getStorage());
//
//        $this->addBodyClass('catalog-detail');
//        $url = $this->getParam('urlkey');
//
//        //load product
//        $productStore = ModelFactory::getYpProductModelStorage(Factory::getStorage());
//        $productArray = $productStore->getByUrl($url, true);
//
//        $description = null;
//        $information = null;
//        $links = null;
//
//        //seo
//        if ($categoryParam != '') {
//            $currentCategory = $categoryHelper->getCategory($categoryParam, $categories);
//            $attributes = $currentCategory['attributes'];
//            if (isset($attributes['seo_page_title']))
//                $this->setPageTitle($attributes['seo_page_title']);
//            else
//                $this->setPageTitle($currentCategory['data']['name']);
//            if (isset($attributes['seo_meta_keywords'])) $this->setPageKeywords($attributes['seo_meta_keywords']);
//            if (isset($attributes['seo_meta_description'])) $this->setPageDescription($attributes['seo_meta_description']);
//
//            $description = $categoryModel->getCategoryDescription($attributes);
//            $information = $categoryModel->getCategoryInformation($attributes);
//            $links = $categoryModel->getCategoryLinks($attributes);
//
//        } else {
//            $this->setPageTitle(t(L::PRODUCTS,
//                    array(
//                        'items_in_category' => count($result['products']),
//                        'category_name' => (isset($category['name'])) ? $category['name'] : t(L::SEARCH))
//                ));
//        }
//
//
//        $result['products'] = $this->injectLimitIntoProductArrays($result['products']);
//
//        //get catalog result without filters
//        // OBSOLETE this only triggers the smae query again?
//        // If we need unfiltered results use tags in solr -> dtschinder
//        //$catalogListing->setParams(array(Yp_Catalog_Model_Catalog::PARAM_CATEGORY => $this->getParam(Yp_Catalog_Model_Catalog::PARAM_CATEGORY)));
//        //$allResult = $catalogListing->getResult();
//
//        $outOfStockProducts['pagination'] = $result['pagination'];
//        $outOfStockProducts['facetsByType'] = $result['facetsByType'];
//
//        // add skus to tracking aggregator
//        $aggregator->addCatalogProducts($result['products']);
//
//        $this->render('index', array(
//                'result' => $result,
//                'allResult' => $result,
//                'outOfStockProducts' => $outOfStockProducts,
//                'itemsPerRow' => 4,
//                'description' => $description,
//                'information' => $information,
//                'links' => $links,
//                'categories' => array(
//                    'categoryParents' => $categoryParents,
//                    'data' => $categories,
//                    'reducedTree' => $reducedTree,
//                    'reducedTreeBack' => $reducedTreeBack,
//                    'categoryName' => (!empty($currentCategory['data']['name']) ? $currentCategory['data']['name'] : ''),
//                )
//            ));
       $this->render('index', array());
    }

    /**
     * Product Detail
     */
    public function actionDetail()
    {
//        $this->addBodyClass('catalog-detail');
//
//        $url = $this->getParam('urlkey');
//
//        //load product
//        $productStore = ModelFactory::getYpProductModelStorage(Factory::getStorage());
//        $productArray = $productStore->getByUrl($url, true);
//
//        foreach($this->cart->getOrderItemsAggregatedByQuantity as $item) {
//            if($productArray['sku'] === $item->getSku()) {
//                $productArray['limit'] = $productArray['quantity'] - $item->getQuantity();
//            }
//        }
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//
//        //Product is not available
//        if (empty($productArray)) {
//            $this->redirect(Yp_Routing_UrlManager::ROUTE_ERROR_404, true);
//        }
//
//        //build transfer object
//        $product = $productStore->transformTransfer($productArray);
//
//        // seo
//        $pageTitle = isset($productArray['meta']['page_title']) ? $productArray['meta']['page_title'] : $productArray['attributes']['longname'];
//        $this->setPageTitle($pageTitle);
//        $metaKeywords = isset($productArray['meta']['meta_keywords']) ? $productArray['meta']['meta_keywords'] : '';
//        $this->setPageKeywords($metaKeywords);
//        $metaDesc = isset($productArray['meta']['meta_description']) ? $productArray['meta']['meta_description'] : '';
//        $this->setPageDescription($metaDesc);
//
//        // open graph data for facebook
//        $this->ogmetadata['title'] = $pageTitle;
//        $this->ogmetadata['image'] = Nu3Shared_Image::getAbsoluteProductImageUrl($productArray['images']['catalog']['src'], Nu3Shared_Image::TYPE_PRODUCT);
//        $this->ogmetadata['description'] = $metaDesc;
//        $this->ogmetadata['url'] = $this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CATALOG_DETAIL, array('product' => $product));
//
//        //recommendations
//        $recommendations = null;
//        if (!empty($productArray['related_products'])) {
//            $recommendations = $productStore->getBySkus(explode(',', $productArray['related_products']), false);
//        } else {
//            $solrEntry = Factory::getSolrEntryModel();
//            $statement = $solrEntry->getEntryStmt();
//            $statement->setLimit(4);
//            $statement->setSort('score_is_sellable desc, sum(product(0.1, score_random), product(0.45, score_sells), product(0.45, score_margin))', 'desc');
//            $statement->send();
//            $recommendations = $statement->getEntries();
//            $recommendations = $productStore->getBySkus($recommendations);
//        }
//
//        //max quantity set
//        if (isset($productArray['attributes']['max_quantity']) && $productArray['attributes']['max_quantity']) {
//            $this->maxQuantity = $productArray['attributes']['max_quantity'];
//        }
//
//        //get recensions
//        $recensions = array(); //Yp_Catalog_Model_Helper::getRecensions($productArray['attributes']);
//
//        //generate tabs
//        $tabs = Sao_Yves_Catalog_Component_Model_Helper::getTabs($productArray, $this);
//
//        //register product view
//        Yii::app()->user->productView($productArray['sku']);
//
//        if (!$product) {
//            $this->render(Yp_Routing_UrlManager::ROUTE_ERROR_404);
//        } else {
//            $aggregator->addPagetype(PalShared_Tracking::PAGE_TYPE_CATALOG_DETAIL);
//            $aggregator->addProduct($product);
//            $aggregator->addParameter(
//                Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::PARAM_PRODUCT_STATUS,
//                Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::PARAM_PRODUCT_STATUS_VIEW
//            );
//            $aggregator->addContentIdByParts(PalShared_Tracking::PAGE_TYPE_CATALOG_DETAIL, [$productArray['sku']]);
//
//            // get session to get last category
//            $session = Factory::getSessionStorage();
//
//            $breadcrumbs = $session->get('categories');
//
//            if (!$breadcrumbs) {
//                $breadcrumbs = array(
//                    t(L::CATALOG_ALL_PRODUCTS) => ProjectA_Yves_Library_Routing_UrlManager::createAbsoluteUrl('catalog')
//                );
//            }
//
//            $backLink = Sao_Yves_Catalog_Component_Model_Helper::getBackLink($productArray);
//
//            array_push($breadcrumbs, $product->getName());
//
//            $this->breadcrumbs = $breadcrumbs;
//
//            $session->set('categories', null);
//
//            $salesrule = Sao_Yves_Library_StoreFactory_DE::getYpSalesruleModelSalesrule();
//
//
//            /* @var $item Sao_Shared_Sales_Transfer_Order_Item */
//            foreach($this->cart->getOrderItemsAggregatedByQuantity as $item) {
//                $key = ProjectA_Shared_Library_Storage::getProductKey($item->getSku());;
//                if( $product->getSku()  === $key ) {
//                    $productArray['limit'] = $productArray['quantity'] - $item->getQuantity();
//                }
//            }
//
//            $this->render('detail', array(
//                    'product' => $product,
//                    'productArray' => $productArray,
//                    'recommendations' => $recommendations,
//                    'tabs' => $tabs,
//                    'review' => $recensions,
//                    'freeShippingLimit' => $salesrule->getFreeShippingLimit(),
//                    'userName' => $this->getUserName(),
//                    'backLink' => $backLink
//                ));
//
//
//        }
    }

    protected function getUserName()
    {
//        $userName = Yii::app()->user->name;
//        if (!Yii::app()->user->isGuest()) {
//            $userName = Yii::app()->user->getCustomer()->getFirstName() . ' ' . Yii::app()->user->getCustomer()->getLastName();
//        }
//
//        return $userName;
    }

    /**
     * @return array | null
     */
    protected function getPage()
    {
//        $cmsKey = $this->getParam('cms_key');
//        if ($cmsKey) {
//            $page = Factory::getStorage()->get($cmsKey);
//        } else {
//            $page = null;
//        }
//        return $page;
    }

}
