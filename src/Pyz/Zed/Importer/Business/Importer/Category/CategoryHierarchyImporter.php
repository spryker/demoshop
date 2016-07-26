<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\NodeTransfer;
use LogicException;
use Orm\Zed\Category\Persistence\Base\SpyCategoryNodeQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

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
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
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
        parent::__construct($localeFacade);

        $this->localeFacade = $localeFacade;
        $this->categoryFacade = $categoryFacade;
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
        $query = SpyCategoryNodeQuery::create();
        $query->filterByIsRoot(false)
            ->filterByFkParentCategoryNode(null, Criteria::ISNULL);

        return $query->count() === 0;
    }

    /**
     * @DRY
     *
     * @see \Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter::getRootNode()
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
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $category = $this->format($data);

        $idParentNode = $this->getParentNodeId($category[self::PARENT_KEY]);

        $nodes = $this->categoryQueryContainer
            ->queryNodeByCategoryKey($category[self::UCATID])
            ->filterByIsMain(true)
            ->find();

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
     * @param string $parentKey
     *
     * @return int
     */
    protected function getParentNodeId($parentKey)
    {
        $idParentNode = $this->getRootNode()->getIdCategoryNode();

        if (!$this->nodeToKeyMapperCollection->has($parentKey)) {
            $parent = $this->categoryQueryContainer
                ->queryMainCategoryNodeByCategoryKey($parentKey)
                ->findOne();

            if ($parent) {
                $idParentNode = $parent->getIdCategoryNode();
                $this->nodeToKeyMapperCollection->set($parentKey, $idParentNode);
            }
        } else {
            $idParentNode = $this->nodeToKeyMapperCollection->get($parentKey);
        }

        return $idParentNode;
    }

}
