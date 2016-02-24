<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Category;

use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
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
     * @var SpyCategoryNode
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
     * @return bool
     */
    public function canImport()
    {
        return count($this->categoryFacade->getRootNodes()) === 0;
    }

    /**
     * @return SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();
        }

        return $this->defaultRootNode;
    }

    /**
     * @param array $columns
     * @param array $data
     */
    public function importOne(array $columns, array $data)
    {
        $csvData = $this->generateCsvItem($columns, $data);
        $category = $this->format($csvData);

        $idParentNode = null;
        if (!array_key_exists($category[self::PARENT_KEY], $this->cacheParents)) {
            $queryParent = $this->categoryQueryContainer->queryMainCategoryNodeByCategoryKey($category[self::PARENT_KEY]);
            $queryParent->filterByIsRoot(false);
            $parent = $queryParent->findOne();

            if ($parent) {
                $idParentNode = $parent->getIdCategoryNode();
                $this->cacheParents[$category[self::PARENT_KEY]] = $idParentNode;
            }
        } else {
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

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \SplFileObject $csvFile
     * @param array $columns
     * @param int $total
     *
     * @return void
     */
    protected function updateParentsAndUrls(OutputInterface $output, \SplFileObject $csvFile, array $columns, $total)
    {
        $step = 1;

        $csvFile->rewind();
        $output->writeln('');

        $idParentNode = null;
        $queryRoot = $this->categoryQueryContainer->queryRootNode();
        $root = $queryRoot->findOne();

        while (!$csvFile->eof()) {
            $data = $csvFile->fgetcsv();
            $csvData = $this->generateCsvItem($columns, $data);
            $idParentNode = $root->getIdCategoryNode();

            if (!array_key_exists($csvData[self::PARENT_KEY], $this->cacheParents)) {
                $queryParent = $this->categoryQueryContainer->queryMainCategoryNodeByCategoryKey($csvData[self::PARENT_KEY]);
                $queryRoot->filterByIsRoot(false);
                $parent = $queryParent->findOne();

                if ($parent) {
                    $idParentNode = $parent->getIdCategoryNode();
                    $this->cacheParents[$csvData[self::PARENT_KEY]] = $idParentNode;
                }
            } else {
                $idParentNode = $this->cacheParents[$csvData[self::PARENT_KEY]];
            }

            $nodesQuery = $this->categoryQueryContainer->queryNodeByCategoryKey($csvData[self::UCATID]);
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

            $info = 'Updating parents and generating urls... ' . $step . '/' . $total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $step++;
        }
    }

}
