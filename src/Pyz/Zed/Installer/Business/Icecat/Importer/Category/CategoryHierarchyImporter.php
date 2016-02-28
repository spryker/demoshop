<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Category;

use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\Base\SpyCategoryNodeQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryHierarchyImporter extends AbstractIcecatImporter
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
     * @var array
     */
    protected $cacheParents = [];

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
        $query->filterByIsRoot(false)->filterByFkParentCategoryNode(null, Criteria::ISNULL);

        return $query->count() === 0;
    }

    /**
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();

            if ($this->defaultRootNode === null) {
                throw new \LogicException('Could not find any root node');
            }
        }

        return $this->defaultRootNode;
    }

    /**
     * @param array $data
     */
    public function importOne(array $data)
    {
        $category = $this->format($data);

        $idParentNode = $this->getRootNode()->getIdCategoryNode();
        if (!array_key_exists($category[self::PARENT_KEY], $this->cacheParents)) {
            $queryParent = $this->categoryQueryContainer->queryMainCategoryNodeByCategoryKey($category[self::PARENT_KEY]);
            $parent = $queryParent->findOne();

            if ($parent) {
                $idParentNode = $parent->getIdCategoryNode();
                $this->cacheParents[$category[self::PARENT_KEY]] = $idParentNode;
            }
        }
        else {
            $idParentNode = $this->cacheParents[$category[self::PARENT_KEY]];
        }

        $nodesQuery = $this->categoryQueryContainer->queryNodeByCategoryKey($category[self::UCATID]);
        $nodesQuery->filterByIsMain(true);
        $nodes = $nodesQuery->find();

        foreach ($nodes as $nodeEntity) {
            $nodeTransfer = new NodeTransfer();
            $nodeTransfer->fromArray($nodeEntity->toArray());
            $nodeTransfer->setFkParentCategoryNode($idParentNode);

            foreach ($this->localeManager->getLocaleCollection() as $code => $localeTransfer) {
                $this->categoryFacade->updateCategoryNode($nodeTransfer, $localeTransfer);
            }
        }
    }

}
