<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Orm\Zed\Price\Persistence\Map\SpyPriceProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\ProductFeed\ProductFeedConfig;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;
use League\Csv\Writer;

class FeedGenerator implements FeedGeneratorInterface
{
    const htpasswdFileName ='.htpasswd';
    const htaccessFileName ='.htaccess';

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
     * Creates or updates .htpasswd file
     * @throws InvalidProductFeedConfigException
     */
    public function generateHtpasswd()
    {
        $users = $this->productFeedConfig->getProductFeedUsers();
        if(is_array($users) === false)
        {
            throw new InvalidProductFeedConfigException('Product feed users has to be of type array');
        }
        $htpasswdContent ='';

        foreach($users as $user)
        {
            if(isset($user['username']) === false || isset($user['password']) === false)
            {
                throw new InvalidProductFeedConfigException('User has to have a username and a password');
            }
            $htpasswdContent .= $user['username'] . ':' . crypt($user['password'], base64_encode($user['password']));
        }
        $this->filesystem->put(self::htpasswdFileName, $htpasswdContent);
    }

    /**
     * Creates or updates .htaccess file
     */
    public function generateHtaccess()
    {
        $this->filesystem->put(self::htaccessFileName, '
            AuthType Basic
            AuthUserFile ' . self::htpasswdFileName . '
            <Files "' . $this->productFeedConfig->getProductFeedFileName() . '">
                require valid-user
            </Files>
        ');
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

        $productList = $products->find()->getIterator();

        $csvWriter = Writer::createFromPath(
            $this->productFeedConfig->getProductFeedFileLocation() .
            $this->productFeedConfig->getProductFeedFileName(),
            'w+');

        $csvWriter->setDelimiter($this->productFeedConfig->getProductFeedCsvParameters()['delimiter']);
        $csvWriter->setEncodingFrom($this->productFeedConfig->getProductFeedCsvParameters()['encoding']);
        $csvWriter->setEnclosure($this->productFeedConfig->getProductFeedCsvParameters()['enclosure']);

        $csvWriter->insertOne(['ID','SKU','price']);

        while($product = $productList->getNext())
        {
            $productAttributes = json_decode($product->getConcreteAttributes(), true);
            $row = [];
            $row[] = $product->getIdProduct();
            $row[] = $product->getConcreteSku();
            $row[] = isset($productAttributes['price'])? $productAttributes['price'] : '';

            $csvWriter->insertOne($row);
        }
    }

    /**
     * creates or updates a htpasswd, htpaccess and a product feed file
     * @throws InvalidProductFeedConfigException
     */
    public function generate()
    {
        $this->generateHtpasswd();
        $this->generateHtaccess();
        $this->generateFeed();
    }
}