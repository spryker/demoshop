<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Navigation;

use Orm\Zed\Navigation\Persistence\SpyNavigation;
use Orm\Zed\Navigation\Persistence\SpyNavigationQuery;
use Spryker\Shared\Navigation\NavigationConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class NavigationWriterStep implements DataImportStepInterface
{

    const NAME = 'name';
    const KEY = 'key';

    const BULK_SIZE = 50;

    const TOUCH_ITEM_TYPE_KEY = 'touchItemType';
    const TOUCH_ITEM_ID_KEY = 'touchItemId';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyNavigationQuery::create();
        $navigationEntity = $query
            ->filterByKey($dataSet[static::KEY])
            ->findOneOrCreate();

        $navigationEntity->setName($this->getName($navigationEntity, $dataSet));
        $navigationEntity->save();

        $dataSet[static::TOUCH_ITEM_TYPE_KEY] = NavigationConfig::RESOURCE_TYPE_NAVIGATION_MENU;
        $dataSet[static::TOUCH_ITEM_ID_KEY] = $navigationEntity->getIdNavigation();
    }

    /**
     * @param \Orm\Zed\Navigation\Persistence\SpyNavigation $navigationEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return string
     */
    protected function getName(SpyNavigation $navigationEntity, DataSetInterface $dataSet)
    {
        if (isset($dataSet[static::NAME]) && !empty($dataSet[static::NAME])) {
            return $dataSet[static::NAME];
        }

        return $navigationEntity->getName();
    }

}
