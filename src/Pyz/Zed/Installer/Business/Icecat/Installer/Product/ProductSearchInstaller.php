<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Installer\Product;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\Formatter\ArrayFormatter;
use Pyz\Zed\Installer\Business\Icecat\Installer\AbstractIcecatInstaller;
use Spryker\Shared\Library\BatchIterator\PropelBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        $query = SpyProductQuery::create();
        $query->setFormatter(new ArrayFormatter());
        return new PropelBatchIterator($query, 100);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search';
    }

}
