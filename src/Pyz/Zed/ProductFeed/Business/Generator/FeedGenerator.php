<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryClosureTableTableMap;
use Orm\Zed\Price\Persistence\Map\SpyPriceProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\ProductFeed\ProductFeedConfig;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;
use League\Csv\Writer;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class FeedGenerator implements FeedGeneratorInterface
{

    private $productFeedConfig;
    private $productQueryContainer;
    private $filesystem;

    /**
     * @param ProductFeedConfig $productFeedConfig
     * @param ProductQueryContainer $productQueryContainer
     */
    public function __construct(ProductFeedConfig $productFeedConfig, ProductQueryContainer $productQueryContainer)
    {
        $this->productFeedConfig = $productFeedConfig;
        $this->productQueryContainer = $productQueryContainer;

        $locale = new Local($this->productFeedConfig->getProductFeedFileLocation());
        $this->filesystem = new Filesystem($locale);
    }

    /**
     * @param int $price
     * @param string $weight
     * @param string $weightUnit
     * @return string
     */
    public function basePriceCalculator($price, $weight, $weightUnit)
    {
        if($weightUnit === 'g' || $weightUnit === 'ml')
        {
            $basePrice = CurrencyManager::getInstance()->format(
                CurrencyManager::getInstance()->convertCentToDecimal(
                    ($price / $weight) *100
                )
            );
            $baseUnit = '100'.$weightUnit;
        }
        else
        {
            $basePrice = CurrencyManager::getInstance()->format(
                CurrencyManager::getInstance()->convertCentToDecimal(
                    $price / $weight
                )
            );
            $baseUnit = $weightUnit;
        }

        return $basePrice . ' / ' . $baseUnit;
    }

    /**
     * Creates the product feed csv file
     */
    public function generateFeed()
    {
        $products = $this->productQueryContainer->queryAbstractProducts();

        $products->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::RIGHT_JOIN
        );

        $products->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyPriceProductTableMap::COL_FK_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyPriceProductTableMap::COL_FK_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::LEFT_JOIN
        );
        $products->addJoin(
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT,
            Criteria::LEFT_JOIN
        );
        $products->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->withColumn(
            SpyAbstractProductTableMap::COL_ATTRIBUTES,
            'abstractAttributes'
        );
        $products->withColumn(
            SpyProductTableMap::COL_ATTRIBUTES,
            'concreteAttributes'
        );
        $products->withColumn(
            SpyProductTableMap::COL_ID_PRODUCT,
            'productId'
        );
        $products->withColumn(
            SpyProductTableMap::COL_SKU,
            'concreteSku'
        );
        $products->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES,
            'abstractLocalizedAttributes'
        );
        $products->withColumn(
            SpyLocalizedProductAttributesTableMap::COL_ATTRIBUTES,
            'localizedAttributes'
        );
        $products->withColumn(
            SpyLocalizedProductAttributesTableMap::COL_NAME,
            'localizedName'
        );
        $products->withColumn(
            SpyPriceProductTableMap::COL_PRICE,
            'productPrice'
        );
        $products->withColumn(
            SpyProductTableMap::COL_CREATED_AT,
            'createdAt'
        );
        $products->withColumn(
            SpyProductTableMap::COL_UPDATED_AT,
            'updatedAt'
        );
        $products->withColumn(
            'JSON_AGG(JSON_BUILD_ARRAY(' .
            SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE . ',' .
            SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT . ',' .
            SpyCategoryClosureTableTableMap::COL_DEPTH . ',' .
            SpyCategoryAttributeTableMap::COL_NAME .
            '))',
            'categories'
        );
        $products->groupBy('productId');

        $productList = $products->find()->getIterator();

        $csvWriter = Writer::createFromPath(
            $this->productFeedConfig->getProductFeedFileLocation() .
            $this->productFeedConfig->getProductFeedFileName(),
            'w+'
        );

        $csvWriter->setDelimiter($this->productFeedConfig->getProductFeedCsvParameters()['delimiter']);
        $csvWriter->setEncodingFrom($this->productFeedConfig->getProductFeedCsvParameters()['encoding']);
        $csvWriter->setEnclosure($this->productFeedConfig->getProductFeedCsvParameters()['enclosure']);

        $csvWriter->insertOne([
            'ID',
            'sku',
            'old_sku',
            'ean',
            'title',
            'price',
            'base_price',
            'short_description',
            'description',
            'thumb_url',
            'product_url',
            'weight',
            'weight_unit',
            'delivery_time',
            'delivery_informations',
            'quantity',
            'shelf_life',
            'main_category',
            'sub_category',
            'created_at',
            'updated_at'
        ]);

        $currentDate = new \DateTimeImmutable();
        $shelfInterval = new \DateInterval('P0Y6M0DT0H0M0S'); //6 months
        $shelfDate = $currentDate->add($shelfInterval);

        while ($product = $productList->getNext()) {
            $productAttributes = json_decode($product->getConcreteAttributes(), true);
            $abstractAttributes = json_decode($product->getAbstractAttributes(), true);
            $localizedAttributes = json_decode($product->getLocalizedAttributes(), true);
            $abstractLocalizedAttributes = json_decode($product->getAbstractLocalizedAttributes(), true);
            $weight = isset($productAttributes['weight'])? $productAttributes['weight'] : '';
            $weightUnit = isset($productAttributes['weight_unit'])? $productAttributes['weight_unit'] : '';

            $mainCategories = [];
            $subCategories = [];

            foreach(json_decode($product->getCategories(), true) as $categoryArray)
            {
                if(in_array($categoryArray[3], $mainCategories) === false
                    && $categoryArray[0] === 1
                    && $categoryArray[2] === 1) //if category node is 1 and depth is 1 it is the main category
                {
                    $mainCategories[] = $categoryArray[3];
                }
                if(in_array($categoryArray[3], $subCategories) === false
                    && $categoryArray[2] === 2) // if depth = 2 it is the subcategory
                {
                    $subCategories[] = $categoryArray[3];
                }
            }

            $row = [];
            $row[] = $product->getProductId();
            $row[] = $product->getConcreteSku();
            $row[] = isset($productAttributes['old_sku'])? $productAttributes['old_sku'] : '';
            $row[] = isset($abstractAttributes['ean'])? $abstractAttributes['ean'] : '';
            $row[] = $product->getLocalizedName();
            $row[] = CurrencyManager::getInstance()->format(
                CurrencyManager::getInstance()->convertCentToDecimal(
                    $product->getProductPrice()
                )
            );

            $row[] = $this->basePriceCalculator(
                $product->getProductPrice(),
                $weight,
                $weightUnit
            );

            $row[] = rtrim(
                isset($abstractLocalizedAttributes['short_description']['markdown'])? $abstractLocalizedAttributes['short_description']['markdown'] : ''
            );

            $row[] = rtrim(
                isset($abstractLocalizedAttributes['description']['markdown'])? $abstractLocalizedAttributes['description']['markdown'] : ''
            );

            $row[] = isset($localizedAttributes['media'][0]['url'])?
                'https://' . $this->productFeedConfig->getHostStaticMedia() . '/media/images/products/' . $localizedAttributes['media'][0]['url'] : '';

            $row[] = isset($abstractLocalizedAttributes['url'])?
                $this->productFeedConfig->getHostYves() . $abstractLocalizedAttributes['url'] : '';

            $row[] = $weight;
            $row[] = $weightUnit;

            //harcoded for now
            $row[] = '1-2 Tage';
            $row[] = 'Versand erfolgt für Bestellungen bis 12.00 Uhr Mo-Do normalerweise am selben Tag.';
            $row[] = 10000;

            $row[] = date('c', $shelfDate->getTimestamp());

            $row[] = implode(',', $mainCategories);
            $row[] = implode(',', $subCategories);
            $row[] = $product->getCreatedAt()->format('c');
            $row[] = $product->getUpdatedAt()->format('c');

            $csvWriter->insertOne($row);
        }
    }

    /**
     * creates or updates a product feed file
     * @throws InvalidProductFeedConfigException
     */
    public function generate()
    {
        $this->generateFeed();
    }
}
