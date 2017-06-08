<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category\Hook;

use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Spryker\Zed\DataImport\Business\Model\DataImporterAfterImportInterface;

class CategoryAfterImportHook implements DataImporterAfterImportInterface
{

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     */
    public function __construct(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @return void
     */
    public function afterImport()
    {
//        $this->categoryFacade->rebuildClosureTable();
    }

}
