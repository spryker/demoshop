<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Everon\Component\Collection\Collection;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\Base\SpyCategoryNodeQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;

class CategoryHierarchyImporter extends AbstractImporter
{

    const PARENT_KEY = 'parentKey';
    const UCATID = 'ucatid';
    const LOW_PIC = 'low_pic';

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

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
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     *
     * @return void
     */
    public function setCategoryFacade(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     *
     * @return void
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
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
        $query = SpyCategoryNodeQuery::create();
        $query->filterByIsRoot(false)
            ->filterByFkParentCategoryNode(null, Criteria::ISNULL);

        return $query->count() === 0;
    }

    /**
     * @DRY
     *
     * @see \Pyz\Zed\Installer\Business\Importer\Product\ProductCategoryImporter::getRootNode
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();

            if ($this->defaultRootNode === null) {
                throw new \LogicException('Could not find any root nodes');
            }
        }

        return $this->defaultRootNode;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $category = $this->format($data);

        $idParentNode = $this->getRootNode()->getIdCategoryNode();

        if (!$this->getNodeToKeyMapper()->has($category[self::PARENT_KEY])) {
            $queryParent = $this->categoryQueryContainer->queryMainCategoryNodeByCategoryKey($category[self::PARENT_KEY]);
            $parent = $queryParent->findOne();

            if ($parent) {
                $idParentNode = $parent->getIdCategoryNode();
                $this->getNodeToKeyMapper()->set($category[self::PARENT_KEY], $idParentNode);
            }
        } else {
            $idParentNode = $this->getNodeToKeyMapper()->get($category[self::PARENT_KEY]);
        }

        $nodesQuery = $this->categoryQueryContainer
            ->queryNodeByCategoryKey($category[self::UCATID])
            ->filterByIsMain(true);

        $nodes = $nodesQuery->find();
        foreach ($nodes as $nodeEntity) {
            $nodeTransfer = new NodeTransfer();
            $nodeTransfer->fromArray($nodeEntity->toArray());
            $nodeTransfer->setFkParentCategoryNode($idParentNode);

            foreach ($this->localeFacade->getLocaleCollection() as $code => $localeTransfer) {
                $this->categoryFacade->updateCategoryNode($nodeTransfer, $localeTransfer);
            }
        }
    }

    /**
     * @return \Everon\Component\Collection\CollectionInterface
     */
    protected function getNodeToKeyMapper()
    {
        if ($this->nodeToKeyMapperCollection === null) {
            $this->nodeToKeyMapperCollection = new Collection([]);
        }

        return $this->nodeToKeyMapperCollection;
    }

}
