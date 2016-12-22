<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;

class CategoryRootImporter extends AbstractCategoryImporter
{

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * CategoryRootImporter constructor.
     *
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CategoryFacadeInterface $categoryFacade,
        TouchFacadeInterface $touchFacade
    ) {
        parent::__construct($localeFacade, $categoryFacade);

        $this->touchFacade = $touchFacade;
    }

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
        $categoryTransfer = $this->format($data);
        $this->importRootCategory($categoryTransfer);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function format(array $data)
    {
        $categoryTransfer = parent::format($data);

        $categoryNodeTransfer = $categoryTransfer->getCategoryNode();
        $categoryNodeTransfer->setIsRoot(true);
        $categoryNodeTransfer->setIsMain(true);
        $categoryTransfer->setCategoryNode($categoryNodeTransfer);
        $categoryTransfer->setIsSearchable(false);

        return $categoryTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CategoryTransfer $categoryTransfer
     *
     * @return void
     */
    protected function importRootCategory(CategoryTransfer $categoryTransfer)
    {
        $this->categoryFacade->create($categoryTransfer);

        $this->touchRootNavigation($categoryTransfer->getCategoryNode());
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

        $this->touchFacade->touchActive(
            CategoryConstants::RESOURCE_TYPE_NAVIGATION,
            $rootNodeTransfer->getIdCategoryNode()
        );
    }

}
