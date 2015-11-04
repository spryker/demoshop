<?php

namespace Functional\Pyz\Zed\Collector\Business\Storage;

use Functional\Pyz\Zed\Collector\Business\Mock\MockWriter;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\ProductDynamic\Persistence\Base\PavConfigurableProductQuery;
use Orm\Zed\ProductDynamic\Persistence\Base\PavProductGroupKeyQuery;
use Orm\Zed\ProductDynamic\Persistence\Base\PavProductGroupSetQuery;
use Orm\Zed\ProductDynamic\Persistence\Base\PavProductGroupValueElementQuery;
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
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerEngine\Zed\Touch\Persistence\TouchQueryContainer;
use Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use SprykerFeature\Zed\Collector\Business\Model\BatchResult;
use Orm\Zed\Price\Persistence\Base\SpyPriceTypeQuery;
use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Orm\Zed\Price\Persistence\SpyPriceType;
use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributes;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributesQuery;
use Orm\Zed\Product\Persistence\SpyLocalizedProductAttributes;
use Orm\Zed\Product\Persistence\SpyLocalizedProductAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\Product\Persistence\SpyAbstractProductQuery;
use Orm\Zed\ProductCategory\Persistence\Base\SpyProductCategoryQuery;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\Stock\Persistence\Base\SpyStockQuery;
use Orm\Zed\Stock\Persistence\SpyStock;
use Orm\Zed\Stock\Persistence\SpyStockProduct;
use Orm\Zed\Stock\Persistence\SpyStockProductQuery;
use Orm\Zed\Url\Persistence\SpyUrl;
use Orm\Zed\Url\Persistence\SpyUrlQuery;

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
    const DEFAULT_PRICE_TYPE = 'DEFAULT';
    const DEFAULT_STOCK_NAME = 'DEFAULT';
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
    const SKU_1 = '111111';
    const SKU_2 = '222222';
    const SKU_3 = '333333';
    const SKU_4 = '444444';
    const SKU_5 = '555555';
    const ROOT = 'root_category';
    const CHILD_CATEGORY_1 = 'child_category_1';
    const CHILD_CATEGORY_2 = 'child_category_2';
    const SIMPLE = 'simple';
    const DYNAMIC = 'dynamic';

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
            self::CATEGORY_NAME => self::ROOT,
            self::PARENT_CATEGORY_NAME => null
        ],
        [
            self::CATEGORY_NAME => self::CHILD_CATEGORY_1,
            self::PARENT_CATEGORY_NAME => self::ROOT
        ],
        [
            self::CATEGORY_NAME => self::CHILD_CATEGORY_2,
            self::PARENT_CATEGORY_NAME => self::ROOT
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

        $lastTouchedAt = new \DateTime();

        $this->touchProducts();

        $mockWriter = new MockWriter();

        $touchQuery = SpyTouchQuery::create()
            ->filterByItemType('abstract_product')
            ->filterByItemEvent(SpyTouchTableMap::COL_ITEM_EVENT_ACTIVE)
            ->filterByTouched(['min' => $lastTouchedAt])
            ->withColumn(SpyTouchTableMap::COL_ID_TOUCH, TouchQueryContainer::TOUCH_EXPORTER_ID)
            ->setFormatter(new PropelArraySetFormatter())
        ;

        $this->getFacade()->runStorageProductCollector(
            $touchQuery,
            $this->currentLocale,
            new BatchResult(),
            $mockWriter,
            $touchUpdaterMock
        );

        $collectedData = $mockWriter->getCollectedData()[0];

        $product1 = array_shift($collectedData);
        $product2 = array_shift($collectedData);
        $product3 = array_shift($collectedData);
        $product4 = array_shift($collectedData);
        $product5 = array_shift($collectedData);


        $this->assertEquals([], $product1['abstract_attributes']);
        $this->assertEquals('de_DE_444444', $product1['abstract_name']);
        $this->assertEquals(self::SKU_4, $product1['abstract_sku']);
        $this->assertEquals('/' . self::SKU_4, $product1['url']);
        $this->assertEquals(
            [
                [
                    'name' => 'de_DE_444444',
                    'sku' => self::SKU_4,
                    'attributes' => [],
                    'configs' => [],
                    'options' => [],
                ]
            ],
            $product1['concrete_products']
        );
        $this->assertEquals(self::DYNAMIC, $product1['type']);
        $this->assertEquals([ self::GROUP_KEY_1 ], $product1['groups']);
        $this->assertEquals(true, $product1['available']);
        $this->assertCount(1, $product1['configurable_products']);
        $this->assertEquals(100, $product1['valid_price']);
        $this->assertEquals(
            [
                self::DEFAULT_PRICE_TYPE => ['price' => 100]
            ],
            $product1['prices']
        );
        $this->assertCount(1, $product1['category']);

        $this->assertEquals([], $product2['abstract_attributes']);
        $this->assertEquals('de_DE_555555', $product2['abstract_name']);
        $this->assertEquals(self::SKU_5, $product2['abstract_sku']);
        $this->assertEquals('/' . self::SKU_5, $product2['url']);
        $this->assertEquals(
            [
                [
                    'name' => 'de_DE_555555',
                    'sku' => self::SKU_5,
                    'attributes' => [],
                    'configs' => [],
                    'options' => [],
                ]
            ],
            $product2['concrete_products']
        );
        $this->assertEquals(self::DYNAMIC, $product2['type']);
        $this->assertEquals([ self::GROUP_KEY_1, self::GROUP_KEY_2 ], $product2['groups']);
        $this->assertEquals(true, $product2['available']);
        $this->assertCount(1, $product2['configurable_products']);
        $this->assertEquals(100, $product2['valid_price']);
        $this->assertEquals(
            [
                self::DEFAULT_PRICE_TYPE => ['price' => 100]
            ],
            $product2['prices']
        );
        $this->assertCount(1, $product2['category']);

        $this->assertEquals([], $product3['abstract_attributes']);
        $this->assertEquals('de_DE_111111', $product3['abstract_name']);
        $this->assertEquals(self::SKU_1, $product3['abstract_sku']);
        $this->assertEquals('/' . self::SKU_1, $product3['url']);
        $this->assertEquals(
            [
                [
                    'name' => 'de_DE_111111',
                    'sku' => self::SKU_1,
                    'attributes' => [],
                    'configs' => [],
                    'options' => [],
                ]
            ],
            $product3['concrete_products']
        );
        $this->assertEquals(self::SIMPLE, $product3['type']);
        $this->assertEquals([ self::GROUP_KEY_1 ], $product3['groups']);
        $this->assertEquals(true, $product3['available']);
        $this->assertCount(0, $product3['configurable_products']);
        $this->assertEquals(100, $product3['valid_price']);
        $this->assertEquals(
            [
                self::DEFAULT_PRICE_TYPE => ['price' => 100]
            ],
            $product3['prices']
        );
        $this->assertCount(1, $product3['category']);

        $this->assertEquals([], $product4['abstract_attributes']);
        $this->assertEquals('de_DE_222222', $product4['abstract_name']);
        $this->assertEquals(self::SKU_2, $product4['abstract_sku']);
        $this->assertEquals('/' . self::SKU_2, $product4['url']);
        $this->assertEquals(
            [
                [
                    'name' => 'de_DE_222222',
                    'sku' => self::SKU_2,
                    'attributes' => [],
                    'configs' => [],
                    'options' => [],
                ]
            ],
            $product4['concrete_products']
        );
        $this->assertEquals(self::SIMPLE, $product4['type']);
        $this->assertEquals([ self::GROUP_KEY_1 ], $product4['groups']);
        $this->assertEquals(true, $product4['available']);
        $this->assertCount(0, $product4['configurable_products']);
        $this->assertEquals(100, $product4['valid_price']);
        $this->assertEquals(
            [
                self::DEFAULT_PRICE_TYPE => ['price' => 100]
            ],
            $product4['prices']
        );
        $this->assertCount(1, $product4['category']);

        $this->assertEquals([], $product5['abstract_attributes']);
        $this->assertEquals('de_DE_333333', $product5['abstract_name']);
        $this->assertEquals(self::SKU_3, $product5['abstract_sku']);
        $this->assertEquals('/' . self::SKU_3, $product5['url']);
        $this->assertEquals(
            [
                [
                    'name' => 'de_DE_333333',
                    'sku' => self::SKU_3,
                    'attributes' => [],
                    'configs' => [],
                    'options' => [],
                ]
            ],
            $product5['concrete_products']
        );
        $this->assertEquals(self::SIMPLE, $product5['type']);
        $this->assertEquals([ self::GROUP_KEY_1 ], $product5['groups']);
        $this->assertEquals(true, $product5['available']);
        $this->assertCount(0, $product5['configurable_products']);
        $this->assertEquals(100, $product5['valid_price']);
        $this->assertEquals(
            [
                self::DEFAULT_PRICE_TYPE => ['price' => 100]
            ],
            $product5['prices']
        );
        $this->assertCount(1, $product5['category']);

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
                self::DYNAMIC,
                $dynamicProduct[self::GROUP_SET],
                self::CHILD_CATEGORY_2
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
                self::SIMPLE,
                self::GROUP_SET_1,
                self::CHILD_CATEGORY_1
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
    private function findOrCreateAbstractProduct($sku, $type, $groupSetName, $categoryName)
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
        }

        $abstractLocalizedAttributes = SpyLocalizedAbstractProductAttributesQuery::create()
            ->filterBySpyAbstractProduct($abstractProductEntity)
            ->filterByFkLocale($this->currentLocale->getIdLocale())
            ->findOne()
        ;

        if (!$abstractLocalizedAttributes) {
            $abstractLocalizedAttributes = new SpyLocalizedAbstractProductAttributes();
            $abstractLocalizedAttributes->setName($this->currentLocale->getLocaleName(). '_' . $sku);
            $abstractLocalizedAttributes->setAttributes('{}');
            $abstractLocalizedAttributes->setFkLocale($this->currentLocale->getIdLocale());
            $abstractLocalizedAttributes->setSpyAbstractProduct($abstractProductEntity);
            $abstractLocalizedAttributes->save();
        }

        $categoryAttribute = SpyCategoryAttributeQuery::create()
            ->filterByName($categoryName)
            ->findOne()
        ;

        $productCategory = SpyProductCategoryQuery::create()
            ->filterBySpyAbstractProduct($abstractProductEntity)
            ->filterByFkCategory($categoryAttribute->getFkCategory())
            ->findOne()
        ;

        if (!$productCategory) {
            $productCategory = new SpyProductCategory();
            $productCategory->setSpyAbstractProduct($abstractProductEntity);
            $productCategory->setFkCategory($categoryAttribute->getFkCategory());
            $productCategory->save();
        }

        $urlString = '/' . $sku;
        $productUrlEntity = SpyUrlQuery::create()
            ->filterByFkResourceAbstractProduct($abstractProductEntity->getIdAbstractProduct())
            ->filterByFkLocale($this->currentLocale->getIdLocale())
            ->filterByUrl($urlString)
            ->findOne()
        ;

        if (!$productUrlEntity) {
            $productUrlEntity = new SpyUrl();
            $productUrlEntity->setFkResourceAbstractProduct($abstractProductEntity->getIdAbstractProduct());
            $productUrlEntity->setFkLocale($this->currentLocale->getIdLocale());
            $productUrlEntity->setUrl($urlString);
            $productUrlEntity->save();
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
            ->setIsActive(true)
            ->setPavProductGroupValueSet($groupValueSet)
            ->setSpyAbstractProduct($abstractProductEntity)
        ;

        if ($concreteProductEntity->isNew()) {
            $concreteProductEntity->save();
        }

        $concreteLocalizedAttributes = SpyLocalizedProductAttributesQuery::create()
            ->filterBySpyProduct($concreteProductEntity)
            ->filterByFkLocale($this->currentLocale->getIdLocale())
            ->findOne()
        ;

        if (!$concreteLocalizedAttributes) {
            $concreteLocalizedAttributes = new SpyLocalizedProductAttributes();
            $concreteLocalizedAttributes->setName($this->currentLocale->getLocaleName(). '_' . $sku);
            $concreteLocalizedAttributes->setAttributes('{}');
            $concreteLocalizedAttributes->setFkLocale($this->currentLocale->getIdLocale());
            $concreteLocalizedAttributes->setSpyProduct($concreteProductEntity);
            $concreteLocalizedAttributes->save();
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
