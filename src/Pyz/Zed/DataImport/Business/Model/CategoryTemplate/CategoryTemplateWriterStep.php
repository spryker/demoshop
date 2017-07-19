<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\CategoryTemplate;

use Orm\Zed\Category\Persistence\SpyCategoryTemplateQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CategoryTemplateWriterStep implements DataImportStepInterface
{

    const KEY_NAME = 'template_name';
    const KEY_PATH = 'template_path';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $categoryTemplateEntity = SpyCategoryTemplateQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $categoryTemplateEntity->setTemplatePath($dataSet[static::KEY_PATH]);

        if ($categoryTemplateEntity->isNew() || $categoryTemplateEntity->isModified()) {
            $categoryTemplateEntity->save();
        }
    }

}
