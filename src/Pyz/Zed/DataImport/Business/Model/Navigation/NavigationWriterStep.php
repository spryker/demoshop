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
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class NavigationWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const NAME = 'name';
    const KEY = 'key';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $navigationEntity = SpyNavigationQuery::create()
            ->filterByKey($dataSet[static::KEY])
            ->findOneOrCreate();

        $navigationEntity
            ->setName($this->getName($navigationEntity, $dataSet))
            ->save();

        $this->addMainTouchable(NavigationConfig::RESOURCE_TYPE_NAVIGATION_MENU, $navigationEntity->getIdNavigation());
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
