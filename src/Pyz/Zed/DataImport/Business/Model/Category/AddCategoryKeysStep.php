<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category;

use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AddCategoryKeysStep implements DataImportStepInterface
{

    const KEY_CATEGORY_KEYS = 'categoryKeys';

    /**
     * @var array
     */
    protected $categoryKeys = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (empty($this->categoryKeys)) {
            $categoryEntityCollection = SpyCategoryQuery::create()->find();

            foreach ($categoryEntityCollection as $categoryEntity) {
                $this->categoryKeys[$categoryEntity->getCategoryKey()] = $categoryEntity->getIdCategory();
            }
        }

        $dataSet[static::KEY_CATEGORY_KEYS] = $this->categoryKeys;
    }

}
