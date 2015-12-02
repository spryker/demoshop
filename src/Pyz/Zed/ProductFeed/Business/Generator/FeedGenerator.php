<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
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

    public function __construct(ProductFeedConfig $productFeedConfig, ProductQueryContainer $productQueryContainer)
    {
        $this->productFeedConfig = $productFeedConfig;
        $this->productQueryContainer = $productQueryContainer;

        $locale = new Local($this->productFeedConfig->getProductFeedFileLocation());
        $this->filesystem = new Filesystem($locale);
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
            'idProduct'
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
            SpyCategoryAttributeTableMap::COL_NAME,
            'categoryName'
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
            'price',
            'short_description',
            'description',
            'thumb_url',
            'product_url',
            'weight',
            'weight_unit',
            'delivery_time',
            'category',
            'created_at',
            'updated_at'
        ]);

        while ($product = $productList->getNext()) {
            $productAttributes = json_decode($product->getConcreteAttributes(), true);
            $abstractAttributes = json_decode($product->getAbstractAttributes(), true);
            $localizedAttributes = json_decode($product->getLocalizedAttributes(), true);
            $abstractLocalizedAttributes = json_decode($product->getAbstractLocalizedAttributes(), true);

            $row = [];
            $row[] = $product->getIdProduct();
            $row[] = $product->getConcreteSku();
            $row[] = isset($productAttributes['old_sku'])? $productAttributes['old_sku'] : '';
            $row[] = isset($abstractAttributes['ean'])? $abstractAttributes['ean'] : '';
            $row[] = CurrencyManager::getInstance()->convertCentToDecimal($product->getProductPrice());
            $row[] = isset($abstractLocalizedAttributes['short_description']['markdown'])? $abstractLocalizedAttributes['short_description']['markdown'] : '';
            $row[] = isset($abstractLocalizedAttributes['description']['markdown'])? $abstractLocalizedAttributes['description']['markdown'] : '';
            $row[] = isset($localizedAttributes['media'][0]['thumbnail_url'])? $localizedAttributes['media'][0]['thumbnail_url'] : '';
            $row[] = isset($abstractLocalizedAttributes['url'])? $abstractLocalizedAttributes['url'] : '';
            $row[] = isset($productAttributes['weight'])? $productAttributes['weight'] : '';
            $row[] = isset($productAttributes['weight_unit'])? $productAttributes['weight_unit'] : '';
            $row[] = isset($localizedAttributes['delivery_time'])? $localizedAttributes['delivery_time'] : '';
            $row[] = $product->getCategoryName();
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
