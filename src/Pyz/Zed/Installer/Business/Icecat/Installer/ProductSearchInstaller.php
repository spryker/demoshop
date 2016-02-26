<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\Formatter\ArrayFormatter;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Zed\Propel\Business\Model\PropelBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchInstaller extends AbstractIcecatInstaller
{

    /**
     * @return string
     */
    protected function getCsvDataFilename()
    {
        return $this->dataDirectory . '/products.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search';
    }

    /**
     * @return \Spryker\Zed\Propel\Business\Model\CountableIteratorInterface
     */
    protected function getBatchIterator()
    {
        $query = SpyProductQuery::create();
        $query->setFormatter(new ArrayFormatter());
        return new PropelBatchIterator($query, 100);
    }

}
