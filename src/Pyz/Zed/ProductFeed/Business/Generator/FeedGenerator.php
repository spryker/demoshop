<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Pyz\Zed\ProductFeed\ProductFeedConfig;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;

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
            $htpasswdContent .= $user['username'] . ':' ; crypt($user['password']);
        }
        $this->filesystem->write('.htpasswd', $htpasswdContent);
    }


    public function generateHtaccess()
    {
        $this->filesystem->write('.htaccess', '
            AuthType Basic
            AuthUserFile .htpasswd
            require valid-user
        ');
    }

    public function generate()
    {
        $this->generateHtpasswd();
        $this->generateHtaccess();

    }
}