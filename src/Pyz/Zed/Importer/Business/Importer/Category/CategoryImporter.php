<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Category\Business\Manager\NodeUrlManagerInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use UnexpectedValueException;

class CategoryImporter extends AbstractImporter
{

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var \Pyz\Zed\Category\Business\Manager\NodeUrlManagerInterface
     */
    protected $nodeUrlManager;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     * @param \Pyz\Zed\Category\Business\Manager\NodeUrlManagerInterface $nodeUrlManager
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CategoryFacadeInterface $categoryFacade,
        TouchFacadeInterface $touchFacade,
        CategoryQueryContainerInterface $categoryQueryContainer,
        NodeUrlManagerInterface $nodeUrlManager
    ) {
        parent::__construct($localeFacade);

        $this->localeFacade = $localeFacade;
        $this->categoryFacade = $categoryFacade;
        $this->touchFacade = $touchFacade;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->nodeUrlManager = $nodeUrlManager;
    }

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

        $category = $this->format($data);
        $this->importCategory($category, $data['order']);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        $categoryData = [];
        foreach ($this->localeFacade->getLocaleCollection() as $code => $localeTransfer) {
            $nameKey = 'name.' . $code;

            $categoryData[$code] = [
                CategoryTransfer::NAME => $data[$nameKey],
                CategoryTransfer::CATEGORY_KEY => $data['category_key'],
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => true,
                CategoryTransfer::IS_IN_MENU => true,
                CategoryTransfer::META_TITLE => $data[$nameKey],
            ];
        }

        return $categoryData;
    }

    /**
     * Do not set FkParentCategoryNode here, it will be done by CategoryHierarchy importer
     * otherwise it's hard to tell if the hierarchy importer has run or not.
     *
     * @see \Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter::importOne()
     *
     * @param array $data
     * @param int $order
     *
     * @return void
     */
    protected function importCategory(array $data, $order)
    {
        $idCategory = $this->createCategory($data);

        $nodeTransfer = new NodeTransfer();
        $nodeTransfer->setIsRoot(false);
        $nodeTransfer->setIsMain(true);
        $nodeTransfer->setFkCategory($idCategory);
        $nodeTransfer->setNodeOrder($order);

        $nodeTransfer->setFkParentCategoryNode(null);

        $this->createCategoryNode($nodeTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNode(NodeTransfer $nodeTransfer)
    {
        $idNode = $this->categoryFacade->createCategoryNode($nodeTransfer, new LocaleTransfer(), false);
        $nodeTransfer->setIdCategoryNode($idNode);

        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
    }

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNodeWithUrls(NodeTransfer $nodeTransfer)
    {
        $this->createCategoryNode($nodeTransfer);

        foreach ($this->localeFacade->getLocaleCollection() as $localeCode => $localeTransfer) {
            $this->nodeUrlManager->createUrl($nodeTransfer, $localeTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @throws \UnexpectedValueException
     *
     * @return int|null
     */
    protected function createCategory(array $data)
    {
        $idCategory = null;
        $locales = $this->localeFacade->getLocaleCollection();

        foreach ($locales as $code => $localeTransfer) {
            $categoryTransfer = $this->buildCategoryTransfer($data[$code]);
            $name = trim($categoryTransfer->getName());

            if ($name === '') {
                throw new UnexpectedValueException(sprintf(
                    'Category name is empty for category with key "%"',
                    $categoryTransfer->getCategoryKey()
                ));
            }

            if ($idCategory === null) {
                $idCategory = $this->categoryFacade->createCategory($categoryTransfer, $localeTransfer);
            } else {
                $categoryTransfer->setIdCategory($idCategory);
                $this->categoryFacade->addCategoryAttribute($categoryTransfer, $localeTransfer);
            }
        }

        return $idCategory;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function buildCategoryTransfer(array $data)
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->fromArray($data);

        return $categoryTransfer;
    }

}
