<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Price\Persistence\Map\SpyPriceProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\ProductFeed\ProductFeedConfig;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;
use League\Csv\Writer;

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
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $products->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::LEFT_JOIN
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
            SpyLocalizedProductAttributesTableMap::COL_NAME
        );
        $products->withColumn(
            SpyLocalizedProductAttributesTableMap::COL_ATTRIBUTES,
            'localizedAttributes'
        );
        $products->withColumn(
            SpyCategoryAttributeTableMap::COL_NAME,
            'categoryName'
        );

        $productList = $products->find()->getIterator();

        $csvWriter = Writer::createFromPath(
            $this->productFeedConfig->getProductFeedFileLocation() .
            $this->productFeedConfig->getProductFeedFileName(),
            'w+');

        $csvWriter->setDelimiter($this->productFeedConfig->getProductFeedCsvParameters()['delimiter']);
        $csvWriter->setEncodingFrom($this->productFeedConfig->getProductFeedCsvParameters()['encoding']);
        $csvWriter->setEnclosure($this->productFeedConfig->getProductFeedCsvParameters()['enclosure']);

        $csvWriter->insertOne([
            'ID',
            'SKU',
            'price',
            'short_description',
            'thumb_url',
            'product_url',
            'weight',
            'delivery_time',
            'category'
        ]);

        while ($product = $productList->getNext()) {
            $productAttributes = json_decode($product->getConcreteAttributes(), true);
            $localizedAttributes = json_decode($product->getLocalizedAttributes(), true);
            $row = [];
            $row[] = $product->getIdProduct();
            $row[] = $product->getConcreteSku();
            $row[] = isset($productAttributes['price']) ?$productAttributes['price'] : '';
            $row[] = isset($localizedAttributes['short_description'])? $localizedAttributes['short_description'] : '';
            $row[] = isset($localizedAttributes['thumbnail'])? $localizedAttributes['thumbnail'] : '';
            $row[] = isset($localizedAttributes['url_path'])? $localizedAttributes['url_path'] : '';
            $row[] = isset($localizedAttributes['weight'])? $localizedAttributes['weight'] : '';
            $row[] = isset($localizedAttributes['delivery_time'])? $localizedAttributes['delivery_time'] : '';
            $row[] = $product->getCategoryName();

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
