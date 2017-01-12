<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\CategoryTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;

class CategoryImporter extends AbstractCategoryImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Attributes';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCategoryNodeQuery::create()
            ->filterByIsRoot(false)
            ->filterByIsMain(true);

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $categoryTransfer = $this->format($data);
        $this->importCategory($categoryTransfer);
    }

    /**
     * Do not set FkParentCategoryNode here, it will be done by CategoryHierarchy importer
     * otherwise it's hard to tell if the hierarchy importer has run or not.
     *
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function format(array $data)
    {
        $categoryTransfer = parent::format($data);

        $categoryNodeTransfer = $categoryTransfer->getCategoryNode();
        $categoryNodeTransfer->setNodeOrder($data[self::ORDER]);
        $categoryTransfer->setCategoryNode($categoryNodeTransfer);
        $categoryTransfer->setIsSearchable(true);

        return $categoryTransfer;
    }

    /**
     * @see \Pyz\Zed\Importer\Business\Importer\Category\CategoryHierarchyImporter::isImported()
     *
     * @param \Generated\Shared\Transfer\CategoryTransfer $categoryTransfer
     *
     * @return void
     */
    protected function importCategory(CategoryTransfer $categoryTransfer)
    {
        $this->categoryFacade->create($categoryTransfer);
    }

}
