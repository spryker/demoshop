<?php

namespace Functional\Pyz\Zed\Collector\Business\Storage;

use Functional\Pyz\Zed\Collector\Business\Mock\MockWriter;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\Base\PavConfigurableProductQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\Base\PavProductGroupKeyQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\Base\PavProductGroupSetQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\Base\PavProductGroupValueElementQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavConfigurableProduct;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupKey;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupSet;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupSetElement;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupSetElementQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupValue;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupValueElement;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupValueQuery;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupValueSet;
use PavFeature\Zed\ProductDynamic\Persistence\Propel\PavProductGroupValueSetQuery;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Touch\Business\TouchFacade;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerEngine\Zed\Propel\Business\Formatter\PropelArraySetFormatter;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerEngine\Zed\Touch\Persistence\TouchQueryContainer;
use SprykerFeature\Zed\Category\Persistence\Propel\SpyCategoryAttributeQuery;
use SprykerFeature\Zed\Category\Persistence\Propel\SpyCategoryNodeQuery;
use SprykerFeature\Zed\Collector\Business\Model\BatchResult;
use SprykerFeature\Zed\Price\Persistence\Propel\Base\SpyPriceTypeQuery;
use SprykerFeature\Zed\Price\Persistence\Propel\SpyPriceProduct;
use SprykerFeature\Zed\Price\Persistence\Propel\SpyPriceProductQuery;
use SprykerFeature\Zed\Price\Persistence\Propel\SpyPriceType;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyAbstractProductTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProductQuery;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProductQuery;
use SprykerFeature\Zed\Stock\Persistence\Propel\Base\SpyStockQuery;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStock;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStockProduct;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStockProductQuery;

/**
 * @group Pyz
 * @group Zed
 * @group Collector
 * @group ProductCollectorTest
 *
 */
class ProductCollectorTest extends AbstractFunctionalTest
{
    const CATEGORY_NAME = 'category_name';
    const PARENT_CATEGORY_NAME = 'parent_category_name';
    const SKU = 'sku';
    const GROUP_SET = 'group_set';
    const GROUP_VALUE_SET = 'group_value_set';
    const CONFIGURABLE_PRODUCTS = 'configurable_products';
    const SEQUENCE = 'sequence';
    const QUANTITY = 'quantity';
    const DEFAULT_PRICE_TYPE = 'DEFAULT_PRICE_TYPE';
    const DEFAULT_STOCK_NAME = 'DEFAULT_STOCK_NAME';
    const STOCK = 'stock';
    const PRICE = 'price';
    const GROUP_VALUE_SET_1 = 'GROUP_VALUE_SET_1';
    const GROUP_VALUE_SET_2 = 'GROUP_VALUE_SET_2';
    const GROUP_VALUE_SET_3 = 'GROUP_VALUE_SET_3';
    const GROUP_SET_1 = 'GROUP_SET_1';
    const GROUP_SET_2 = 'GROUP_SET_2';
    const GROUP_KEY_1 = 'GROUP_KEY_1';
    const GROUP_KEY_2 = 'GROUP_KEY_2';
    const GROUP_VALUE_1 = 'GROUP_VALUE_1';
    const GROUP_VALUE_2 = 'GROUP_VALUE_2';
    const SKU_1 = '136823';
    const SKU_2 = '137288';
    const SKU_3 = '137455';
    const SKU_4 = '123566';
    const SKU_5 = '123444';

    /**
     * @var LocaleTransfer
     */
    private $currentLocale;

    /**
     * @var array
     */
    private $groupSets = [
        self::GROUP_SET_1 => [
            self::GROUP_KEY_1,
        ],
        self::GROUP_SET_2 => [
            self::GROUP_KEY_1,
            self::GROUP_KEY_2,
        ]
    ];

    /**
     * @var array
     */
    private $groupValueSet = [
        self::GROUP_VALUE_SET_1 => [
            self::GROUP_KEY_1 => self::GROUP_VALUE_1,
        ],
        self::GROUP_VALUE_SET_2 => [
            self::GROUP_KEY_1 => self::GROUP_VALUE_1,
            self::GROUP_KEY_2 => self::GROUP_VALUE_2,
        ],
        self::GROUP_VALUE_SET_3 => [
            self::GROUP_KEY_2 => self::GROUP_VALUE_2,
        ],
    ];

    /**
     * @var array
     */
    private $categories = [
        [
            self::CATEGORY_NAME => 'root' ,
            self::PARENT_CATEGORY_NAME => null
        ],
        [
            self::CATEGORY_NAME => 'child_1' ,
            self::PARENT_CATEGORY_NAME => 'root'
        ],
        [
            self::CATEGORY_NAME => 'child_2' ,
            self::PARENT_CATEGORY_NAME => 'root'
        ],
    ];

    /**
     * @var array
     */
    private $products = [
        self::SKU_1,
        self::SKU_2,
        self::SKU_3,
    ];

    /**
     * @var array
     */
    private $dynamicProducts = [
        [
            self::SKU => self::SKU_4,
            self::GROUP_SET => self::GROUP_SET_1,
            self::GROUP_VALUE_SET => self::GROUP_VALUE_SET_1,
            self::PRICE => 100,
            self::STOCK => 10,
            self::CONFIGURABLE_PRODUCTS => [
                [
                    self::SKU => self::SKU_1,
                    self::GROUP_VALUE_SET => self::GROUP_VALUE_SET_2,
                    self::SEQUENCE => 1,
                    self::QUANTITY => 5,
                ]
            ],
        ],
        [
            self::SKU => self::SKU_5,
            self::GROUP_SET => self::GROUP_SET_2,
            self::GROUP_VALUE_SET => self::GROUP_VALUE_SET_1,
            self::PRICE => 100,
            self::STOCK => 10,
            self::CONFIGURABLE_PRODUCTS => [
                [
                    self::SKU => self::SKU_2,
                    self::GROUP_VALUE_SET => self::GROUP_VALUE_SET_2,
                    self::SEQUENCE => 1,
                    self::QUANTITY => 5,
                ],
                [
                    self::SKU => self::SKU_3,
                    self::GROUP_VALUE_SET => self::GROUP_VALUE_SET_3,
                    self::SEQUENCE => 1,
                    self::QUANTITY => 5,
                ],
            ],
        ],
    ];

    public function testCollectProductDataForStorage()
    {
        $touchUpdaterMock = $this->getMockBuilder('SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdater')
            ->disableOriginalConstructor()
            ->getMock();
        /* @var LocaleFacade $localeFacade */
        $localeFacade = $this->getFacade('SprykerEngine', 'Locale');

        $this->currentLocale = $localeFacade->getCurrentLocale();

        $this->loadGroupSetsIfNotInDb($this->groupSets);
        $this->loadGroupValueSetsIfNotInDb($this->groupValueSet);
        $this->loadCategoriesIfNotInDb($this->categories);
        $this->loadProductsIfNotInDb($this->products);
        $this->loadConfigurableProductsIfNotInDb($this->dynamicProducts);

        $this->touchProducts();

        $mockWriter = new MockWriter();

        $touchQuery = SpyTouchQuery::create()
            ->filterByItemType('abstract_product')
            ->filterByItemEvent(SpyTouchTableMap::COL_ITEM_EVENT_ACTIVE)
            ->withColumn(SpyTouchTableMap::COL_ID_TOUCH, TouchQueryContainer::TOUCH_EXPORTER_ID)
            ->setFormatter(new PropelArraySetFormatter())
        ;

        $this->getFacade()->runStorageProductCollector(
            $touchQuery,
            new LocaleTransfer(),
            new BatchResult(),
            $mockWriter,
            $touchUpdaterMock
        );

        $collectedData = $mockWriter->getCollectedData();
        dump($collectedData);
        die;
    }

    /**
     * @param array $groupSets
     */
    private function loadGroupSetsIfNotInDb(array $groupSets)
    {
        foreach ($groupSets as $groupSetName => $groupKeys) {
            $groupSetEntity = PavProductGroupSetQuery::create()
                ->filterByName($groupSetName)
                ->findOne();

            if (!$groupSetEntity) {
                $groupSetEntity = new PavProductGroupSet();
                $groupSetEntity->setName($groupSetName);
                $groupSetEntity->setDescription('Description');

                $groupSetEntity->save();
            }

            foreach ($groupKeys as $groupKey) {
                $groupKeyEntity = $this->findOrCreateGroupKey($groupKey);

                $groupSetElementEntity = PavProductGroupSetElementQuery::create()
                    ->filterByProductGroupKey($groupKeyEntity)
                    ->filterByProductGroupSet($groupSetEntity)
                    ->findOne();

                if (!$groupSetElementEntity) {
                    $groupSetElementEntity = new PavProductGroupSetElement();
                    $groupSetElementEntity->setProductGroupKey($groupKeyEntity);
                    $groupSetElementEntity->setProductGroupSet($groupSetEntity);

                    $groupSetElementEntity->save();
                }
            }
        }
    }

    /**
     * @param array $groupValueSets
     */
    private function loadGroupValueSetsIfNotInDb(array $groupValueSets)
    {
        foreach ($groupValueSets as $groupValueSetName => $groupValueSet) {
            $groupValueSetEntity = PavProductGroupValueSetQuery::create()
                ->filterByName($groupValueSetName)
                ->findOne()
            ;

            if (!$groupValueSetEntity) {
                $groupValueSetEntity = new PavProductGroupValueSet();
                $groupValueSetEntity->setName($groupValueSetName);
                $groupValueSetEntity->save();
            }

            foreach ($groupValueSet as $groupKey => $groupValue) {
                $groupKeyEntity = $this->findOrCreateGroupKey($groupKey);

                $groupValueEntity = PavProductGroupValueQuery::create()
                    ->filterByProductGroupKey($groupKeyEntity)
                    ->filterByValue($groupKey)
                    ->findOne()
                ;

                if (!$groupValueEntity) {
                    $groupValueEntity = new PavProductGroupValue();
                    $groupValueEntity->setProductGroupKey($groupKeyEntity);
                    $groupValueEntity->setValue($groupValue);
                    $groupValueEntity->setSequence(1);
                    $groupValueEntity->save();
                }

                $groupValueElementEntity = PavProductGroupValueElementQuery::create()
                    ->filterByProductGroupValue($groupValueEntity)
                    ->filterByProductGroupValueSet($groupValueSetEntity)
                    ->findOne()
                ;

                if (!$groupValueElementEntity) {
                    $groupValueElementEntity = new PavProductGroupValueElement();

                    $groupValueElementEntity->setProductGroupValue($groupValueEntity);
                    $groupValueElementEntity->setProductGroupValueSet($groupValueSetEntity);

                    $groupValueElementEntity->save();
                }
            }
        }

    }

    /**
     * @param array $categories
     */
    private function loadCategoriesIfNotInDb(array $categories)
    {
        /* @var CategoryFacade $categoryFacade */
        $categoryFacade = $this->getFacade('SprykerFeature', 'Category');
        foreach ($categories as $category) {
            $categoryName = $category[self::CATEGORY_NAME];
            $categoryAttributes = SpyCategoryAttributeQuery::create()
                ->filterByName()
                ->findOne()
            ;

            if (!$categoryAttributes) {
                $categoryTransfer = new CategoryTransfer();
                $categoryTransfer->setName($categoryName);
                $idCategory = $categoryFacade->createCategory($categoryTransfer, $this->currentLocale);
            } else {
                $idCategory = $categoryAttributes->getFkCategory();
            }

            if (!$categoryFacade->hasCategoryNode($categoryName, $this->currentLocale)) {
                $isRoot = true;
                $nodeTransfer = new NodeTransfer();
                if ($category[self::PARENT_CATEGORY_NAME]) {
                    $isRoot = false;
                    $parentCategory = SpyCategoryNodeQuery::create()
                        ->useCategoryQuery()
                        ->useAttributeQuery()
                        ->filterByName($category[self::PARENT_CATEGORY_NAME])
                        ->filterByFkLocale($this->currentLocale->getIdLocale())
                        ->endUse()
                        ->endUse()
                        ->findOne();
                    $nodeTransfer->setFkParentCategoryNode($parentCategory->getIdCategoryNode());
                }
                $nodeTransfer->setIsRoot($isRoot);
                $nodeTransfer->setFkCategory($idCategory);
                $categoryFacade->createCategoryNode($nodeTransfer, $this->currentLocale, !$isRoot);
            }
        }
    }

    /**
     * @param array $dynamicProducts
     */
    private function loadConfigurableProductsIfNotInDb(array $dynamicProducts)
    {
        foreach ($dynamicProducts as $dynamicProduct) {
            $abstractProductEntity = $this->findOrCreateAbstractProduct(
                $dynamicProduct[self::SKU],
                SpyAbstractProductTableMap::COL_TYPE_DYNAMIC,
                $dynamicProduct[self::GROUP_SET]
            );
            $this->findOrCreateConcreteProduct(
                $dynamicProduct[self::SKU],
                $abstractProductEntity,
                $dynamicProduct[self::GROUP_VALUE_SET],
                $dynamicProduct[self::PRICE],
                $dynamicProduct[self::STOCK]
            );
            foreach ($dynamicProduct[self::CONFIGURABLE_PRODUCTS] as $configuredProduct) {

                $containedProductEntity = SpyAbstractProductQuery::create()
                    ->filterBySku($configuredProduct[self::SKU])
                    ->findOne()
                ;

                $groupValueSet = PavProductGroupValueSetQuery::create()
                    ->filterByName($configuredProduct[self::GROUP_VALUE_SET])
                    ->findOne()
                ;

                $configuredProductEntity = PavConfigurableProductQuery::create()
                    ->filterByAbstractProduct($abstractProductEntity)
                    ->filterByContainedAbstractProduct($containedProductEntity)
                    ->filterByProductGroupValueSet($groupValueSet)
                    ->findOne()
                ;

                if (!$configuredProductEntity) {
                    $configuredProductEntity = new PavConfigurableProduct();
                    $configuredProductEntity->setAbstractProduct($abstractProductEntity);
                    $configuredProductEntity->setContainedAbstractProduct($containedProductEntity);
                    $configuredProductEntity->setProductGroupValueSet($groupValueSet);
                    $configuredProductEntity->setSequence($configuredProduct[self::SEQUENCE]);
                    $configuredProductEntity->setQuantity($configuredProduct[self::QUANTITY]);
                    $configuredProductEntity->save();
                }

            }
        }
    }

    /**
     * @param array $skus
     */
    private function loadProductsIfNotInDb(array $skus)
    {
        foreach ($skus as $sku) {
            $abstractProductEntity = $this->findOrCreateAbstractProduct(
                $sku,
                SpyAbstractProductTableMap::COL_TYPE_SIMPLE,
                self::GROUP_SET_1
            );
            $this->findOrCreateConcreteProduct(
                $sku,
                $abstractProductEntity,
                self::GROUP_VALUE_SET_2,
                100,
                10
            );
        }
    }

    /**
     * @param string $groupKey
     *
     * @return PavProductGroupKey
     * @throws PropelException
     */
    private function findOrCreateGroupKey($groupKey)
    {
        $groupKeyEntity = PavProductGroupKeyQuery::create()
            ->filterByKey($groupKey)
            ->findOne();

        if (!$groupKeyEntity) {
            $groupKeyEntity = new PavProductGroupKey();
            $groupKeyEntity->setKey($groupKey);
            $groupKeyEntity->save();
        }

        return $groupKeyEntity;
    }

    /**
     * @param string $sku
     * @param string $type
     * @param string $groupSetName
     *
     * @throws PropelException
     * @return SpyAbstractProduct
     */
    private function findOrCreateAbstractProduct($sku, $type, $groupSetName)
    {
        $abstractProductEntity = SpyAbstractProductQuery::create()
            ->filterBySku($sku)
            ->findOne()
        ;

        $groupSet = PavProductGroupSetQuery::create()
            ->filterByName($groupSetName)
            ->findOne()
        ;

        if (!$abstractProductEntity) {
            $abstractProductEntity = new SpyAbstractProduct();
        }
        $abstractProductEntity
            ->setSku($sku)
            ->setType($type)
            ->setPavProductGroupSet($groupSet)
            ->setAttributes('{}');

        if ($abstractProductEntity->isNew()) {
            $abstractProductEntity->save();
            return $abstractProductEntity;
        }
        return $abstractProductEntity;
    }

    /**
     * @param string $sku
     * @param SpyAbstractProduct $abstractProductEntity
     * @param string $groupValueSetName
     * @param int $price
     * @param int $stock
     * @throws PropelException
     */
    private function findOrCreateConcreteProduct(
        $sku,
        SpyAbstractProduct $abstractProductEntity,
        $groupValueSetName,
        $price,
        $stock
    ) {
        $concreteProductEntity = SpyProductQuery::create()
            ->filterBySku($sku)
            ->filterByFkAbstractProduct($abstractProductEntity->getIdAbstractProduct())
            ->findOne()
        ;

        $groupValueSet = PavProductGroupValueSetQuery::create()
            ->filterByName($groupValueSetName)
            ->findOne()
        ;

        if (!$concreteProductEntity) {
            $concreteProductEntity = new SpyProduct();
        }
        $concreteProductEntity
            ->setSku($sku)
            ->setAttributes('{}')
            ->setPavProductGroupValueSet($groupValueSet)
            ->setSpyAbstractProduct($abstractProductEntity)
        ;

        if ($concreteProductEntity->isNew()) {
            $concreteProductEntity->save();
        }

        $priceType = SpyPriceTypeQuery::create()
            ->filterByName(self::DEFAULT_PRICE_TYPE)
            ->findOne()
        ;

        if (!$priceType) {
            $priceType = new SpyPriceType();
            $priceType->setName(self::DEFAULT_PRICE_TYPE);
            $priceType->save();
        }

        $productPrice = SpyPriceProductQuery::create()
            ->filterByPriceType($priceType)
            ->filterByProduct($concreteProductEntity)
            ->findOne()
        ;

        if (!$productPrice) {
            $productPrice = new SpyPriceProduct();
            $productPrice->setPriceType($priceType);
            $productPrice->setProduct($concreteProductEntity);
            $productPrice->setPrice($price);
            $productPrice->save();
        }

        $stockType = SpyStockQuery::create()
            ->filterByName(self::DEFAULT_STOCK_NAME)
            ->findOne()
        ;

        if (!$stockType) {
            $stockType = new SpyStock();
            $stockType->setName(self::DEFAULT_STOCK_NAME);
            $stockType->save();
        }

        $productStock = SpyStockProductQuery::create()
            ->filterByStock($stockType)
            ->filterBySpyProduct($concreteProductEntity)
            ->findOne()
        ;

        if (!$productStock) {
            $productStock = new SpyStockProduct();
            $productStock->setStock($stockType);
            $productStock->setSpyProduct($concreteProductEntity);
            $productStock->setQuantity($stock);
            $productStock->save();
        }
    }

    private function touchProducts()
    {
        $products = SpyAbstractProductQuery::create()
            ->filterBySku([
                self::SKU_1,
                self::SKU_2,
                self::SKU_3,
                self::SKU_4,
                self::SKU_5,
            ])
            ->find()
        ;

        /* @var TouchFacade $touchFacade */
        $touchFacade = $this->getFacade('SprykerEngine', 'Touch');
        foreach ($products as $product) {
            $touchFacade->touchActive('abstract_product', $product->getIdAbstractProduct());
        }
    }
}
