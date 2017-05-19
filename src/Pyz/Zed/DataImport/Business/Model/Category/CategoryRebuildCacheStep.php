<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category;

use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CategoryRebuildCacheStep implements DataImportStepInterface
{

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @var bool
     */
    protected $mustRebuildCache = false;

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     */
    public function __construct(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $this->mustRebuildCache = true;
    }

    public function __destruct()
    {
        if ($this->mustRebuildCache) {
            $this->categoryFacade->rebuildClosureTable();
        }
    }

}
