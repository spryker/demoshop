<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlock;

use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockStoreQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CmsBlockStoreWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_BLOCK_KEY = 'block_key';
    const KEY_STORE_NAME = 'store_name';

    /**
     * @var int[] Keys are CMS Block keys, values are product abstract ids.
     */
    protected static $idCmsBlockBuffer;

    /**
     * @var int[] Keys are store names, values are store ids.
     */
    protected static $idStoreBuffer;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        (new SpyCmsBlockStoreQuery())
            ->filterByFkCmsBlock($this->getIdCmsBlockByKey($dataSet[static::KEY_BLOCK_KEY]))
            ->filterByFkStore($this->getIdStoreByName($dataSet[static::KEY_STORE_NAME]))
            ->findOneOrCreate()
            ->save();
    }

    /**
     * @param string $cmsBlockKey
     *
     * @return int
     */
    protected function getIdCmsBlockByKey($cmsBlockKey)
    {
        if (!isset(static::$idCmsBlockBuffer[$cmsBlockKey])) {
            static::$idCmsBlockBuffer[$cmsBlockKey] =
                SpyCmsBlockQuery::create()->findOneByCmsBlockKey($cmsBlockKey)->getIdCmsBlock();
        }

        return static::$idCmsBlockBuffer[$cmsBlockKey];
    }

    /**
     * @param string $storeName
     *
     * @return int
     */
    protected function getIdStoreByName($storeName)
    {
        if (!isset(static::$idStoreBuffer[$storeName])) {
            static::$idStoreBuffer[$storeName] =
                SpyStoreQuery::create()->findOneByName($storeName)->getIdStore();
        }

        return static::$idStoreBuffer[$storeName];
    }
}
