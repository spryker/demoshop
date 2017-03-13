<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Everon\Component\Collection\Collection;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use LogicException;
use Orm\Zed\Category\Persistence\Base\SpyCategoryNodeQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Exception\CategoryNotFoundException;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CategoryHierarchyImporter extends AbstractCategoryImporter
{

    const PARENT_CATEGORY_KEY = 'parent_category_key';

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Everon\Component\Collection\CollectionInterface
     */
    protected $nodeToKeyMapperCollection;

    /**
     * @var \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected $defaultRootNode;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CategoryFacadeInterface $categoryFacade,
        CategoryQueryContainerInterface $categoryQueryContainer
    ) {
        parent::__construct($localeFacade, $categoryFacade);

        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->nodeToKeyMapperCollection = new Collection([]);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Tree';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCategoryNodeQuery::create()
            ->filterByIsRoot(false)
            ->filterByFkParentCategoryNode(null, Criteria::ISNULL);

        return $query->count() === 0;
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
        $categoryTransfer = $this->updateCategoryTransferFromExistingEntity($categoryTransfer, $data[static::CATEGORY_KEY]);

        $idParentNode = $this->getParentNodeId($data[static::PARENT_CATEGORY_KEY]);
        $nodes = $this->findMainCategoryNodesByCategoryKey($data[static::CATEGORY_KEY]);

        foreach ($nodes as $nodeEntity) {
            $nodeTransfer = new NodeTransfer();
            $nodeTransfer->fromArray($nodeEntity->toArray(), true);
            $categoryTransfer->setCategoryNode($nodeTransfer);

            $parentNodeTransfer = new NodeTransfer();
            $parentNodeTransfer->setIdCategoryNode($idParentNode);
            $categoryTransfer->setParentCategoryNode($parentNodeTransfer);

            $this->categoryFacade->update($categoryTransfer);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\CategoryTransfer $categoryTransfer
     * @param string $categoryKey
     *
     * @throws \Pyz\Zed\Importer\Business\Exception\CategoryNotFoundException
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function updateCategoryTransferFromExistingEntity(CategoryTransfer $categoryTransfer, $categoryKey)
    {
        $categoryEntity = $this
            ->categoryQueryContainer
            ->queryCategoryByKey($categoryKey)
            ->findOne();

        if (!$categoryEntity) {
            throw new CategoryNotFoundException(sprintf('Could not find category for key "%s"', $categoryKey));
        }

        $categoryTransfer->fromArray($categoryEntity->toArray(), true);

        return $categoryTransfer;
    }

    /**
     * @param string $parentKey
     *
     * @return int
     */
    protected function getParentNodeId($parentKey)
    {
        if ($this->nodeToKeyMapperCollection->has($parentKey)) {
            return $this->nodeToKeyMapperCollection->get($parentKey);
        }

        $idParentNode = $this->getRootNode()->getIdCategoryNode();

        $parent = $this->categoryQueryContainer
            ->queryMainCategoryNodeByCategoryKey($parentKey)
            ->findOne();

        if ($parent) {
            $idParentNode = $parent->getIdCategoryNode();
            $this->nodeToKeyMapperCollection->set($parentKey, $idParentNode);
        }

        return $idParentNode;
    }

    /**
     * @throws \LogicException
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();

            if ($this->defaultRootNode === null) {
                throw new LogicException('Could not find any root nodes');
            }
        }

        return $this->defaultRootNode;
    }

    /**
     * @param string $categoryKey
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function findMainCategoryNodesByCategoryKey($categoryKey)
    {
        return $this
            ->categoryQueryContainer
            ->queryNodeByCategoryKey($categoryKey)
            ->filterByIsMain(true)
            ->find();
    }

}
