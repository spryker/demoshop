<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat\Importer\Category;

use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Pyz\Zed\Importer\ImporterConfig;
use Spryker\Shared\Category\CategoryConstants;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryRootImporter extends CategoryImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Root Categories';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCategoryNodeQuery::create();
        $query->filterByIsRoot(true);
        $query->filterByIsMain(true);

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $root = $this->format($data);
        $this->importRootCategory($root);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importRootCategory(array $data)
    {
        $idCategory = $this->createCategory($data);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setIsMain(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $this->createCategoryNodeWithUrls($rootNodeTransfer);

        $this->touchRootNavigation($rootNodeTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $rootNodeTransfer
     *
     * @return void
     */
    protected function touchRootNavigation(NodeTransfer $rootNodeTransfer)
    {
        if (!$rootNodeTransfer->getIsRoot()) {
            return;
        }

        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_NAVIGATION, $rootNodeTransfer->getIdCategoryNode());
    }

}
