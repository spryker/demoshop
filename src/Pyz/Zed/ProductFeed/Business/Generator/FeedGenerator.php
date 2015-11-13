<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Orm\Zed\Price\Persistence\Map\SpyPriceProductTableMap;
use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Orm\Zed\Product\Persistence\Base\SpyAbstractProduct;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\SpyLocalizedProductAttributes;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\ProductFeed\ProductFeedConfig;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;
use Orm\Zed\Product\Persistence\Base\SpyProduct;

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
     * Creates the
     */
    public function generateFeed()
    {
        $abstractProducts = $this->productQueryContainer->queryAbstractProducts();



        $abstractProducts->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::RIGHT_JOIN
        );

        $abstractProducts->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyPriceProductTableMap::COL_FK_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $abstractProducts->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
            Criteria::LEFT_JOIN
        );

        $abstractProducts->withColumn(
            SpyPriceProductTableMap::COL_PRICE
        );
        $abstractProducts->withColumn(
            SpyLocalizedProductAttributesTableMap::COL_NAME
        );

        print_r($abstractProducts->find()->toArray());

        /** @var SpyProduct $abstractProduct */
        foreach($abstractProducts as $abstractProduct)
        {
            //TODO

        }
    }

    public function generate()
    {
        $this->generateHtpasswd();
        $this->generateHtaccess();
        $this->generateFeed();
    }
}