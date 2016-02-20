<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Codeception\Coverage\Subscriber\Local;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use Spryker\Zed\Url\Business\UrlFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryImporter extends AbstractIcecatImporter
{
    const PARENT_KEY = 'parentKey';
    const UCATID = 'ucatid';
    const LOW_PIC = 'low_pic';

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacade
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
     * @var \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @var \Pyz\Zed\Category\Business\Manager\NodeUrlManager
     */
    protected $nodeUrlManager;

    /**
     * @var array
     */
    protected $cacheParents = [];

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacade $categoryFacade
     */
    public function setCategoryFacade(CategoryFacade $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     */
    public function setTouchFacade(TouchFacadeInterface $touchFacade)
    {
        $this->touchFacade = $touchFacade;
    }

    /**
     * @param \Spryker\Zed\Url\Business\UrlFacadeInterface $urlFacade
     */
    public function setUrlFacade(UrlFacadeInterface $urlFacade)
    {
        $this->urlFacade = $urlFacade;
    }

    /**
     * @param \Pyz\Zed\Category\Business\Manager\NodeUrlManager $nodeUrlManager
     */
    public function setNodeUrlManager(NodeUrlManager $nodeUrlManager)
    {
        $this->nodeUrlManager = $nodeUrlManager;
    }

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
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
        return true;

        return count($this->categoryFacade->getRootNodes()) === 0;
    }

    /**
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function importData(OutputInterface $output)
    {
        $this->installRootNodes();

        $csvFile = $this->csvReader->read('__categories_done.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $counter = 0;

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $counter++;
            $data = $csvFile->fgetcsv();
            $csvData = $this->generateCsvItem($columns, $data);
            $rootCategoryData = $this->format($csvData);
            $this->addCategoryNodes($rootCategoryData);

            $info = 'Importing... ' . $counter . '/'.$total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));
        }

        $this->updateParentsAndUrls($output, $csvFile, $columns, $total);

        $output->writeln('');
        $output->writeln('Installed: '.$counter);
    }

    /**
     * @param OutputInterface $output
     * @param \SplFileObject $csvFile
     * @param $columns
     * @param $total
     *
     * @return void
     */
    protected function updateParentsAndUrls(OutputInterface $output, \SplFileObject $csvFile, $columns, $total)
    {
        $counter = 1;

        $csvFile->rewind();
        $output->writeln('');

        $idParentNode = null;
        $queryRoot = $this->categoryQueryContainer->queryRootNode();
        $root = $queryRoot->findOne();
        if ($root) {
            $idParentNode = $root->getIdCategoryNode();
        }

        while (!$csvFile->eof()) {
            $data = $csvFile->fgetcsv();
            $csvData = $this->generateCsvItem($columns, $data);

            if (!array_key_exists($csvData[self::PARENT_KEY], $this->cacheParents)) {
                $queryParent = $this->categoryQueryContainer->queryMainCategoryNodeByCategoryKey($csvData[self::PARENT_KEY]);
                $queryRoot->filterByIsRoot(false);
                $parent = $queryParent->findOne();

                if ($parent) {
                    $idParentNode = $parent->getIdCategoryNode();
                    $this->cacheParents[$csvData[self::PARENT_KEY]] = $idParentNode;
                }
            }
            else {
                $idParentNode = $this->cacheParents[$csvData[self::PARENT_KEY]];
            }

            if (!$idParentNode) {
                continue;
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

            $info = 'Updating parents and genrating urls... ' . $counter . '/'.$total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $counter++;
        }
    }

    protected function getNodeByCategoryKey($categoryKey, $localeTransfer)
    {

    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        $categoryData = [];
        foreach ($this->localeManager->getLocaleCollection() as $code => $localeTransfer) {
            $nameKey = 'category_name.'.$code;
            $descriptionKey = 'category_description.'.$code;

            $categoryData[$code] = [
                CategoryTransfer::NAME => $data[$nameKey],
                CategoryTransfer::CATEGORY_KEY => $data[self::UCATID],
                CategoryTransfer::CATEGORY_IMAGE_NAME => $data[self::LOW_PIC],
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => true,
                CategoryTransfer::IS_IN_MENU => false,
                CategoryTransfer::META_DESCRIPTION => $data[$descriptionKey],
                CategoryTransfer::META_TITLE => $data[$nameKey],
            ];
        }

        return $categoryData;
    }

    /**
     * @param array $data
     */
    protected function addCategoryNodes(array $data)
    {
        $idCategory = $this->createCategoryWithLocalizedAttributes($data);

        $nodeTransfer = new NodeTransfer();
        $nodeTransfer->setIsRoot(false);
        $nodeTransfer->setIsMain(true);
        $nodeTransfer->setFkCategory($idCategory);
        $nodeTransfer->setFkParentCategoryNode(1);

        $this->createCategoryNode($nodeTransfer);
    }

    /**
     * @param array $data
     */
    protected function addRootNodesWithLocalizedAttributes(array $data)
    {
        $idCategory = $this->createCategoryWithLocalizedAttributes($data);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setIsMain(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $this->createCategoryNodeWithLocalizedUrls($rootNodeTransfer);
    }

    /**
     * @param NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNode(NodeTransfer $nodeTransfer)
    {
        $idNode = $this->categoryFacade->createCategoryNode($nodeTransfer, new LocaleTransfer(), false);
        $nodeTransfer->setIdCategoryNode($idNode);
    }

    /**
     * @param NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNodeWithLocalizedUrls(NodeTransfer $nodeTransfer)
    {
        $this->createCategoryNode($nodeTransfer);

        foreach ($this->localeManager->getLocaleCollection() as $localeCode => $localeTransfer) {
            $this->nodeUrlManager->createUrl($nodeTransfer, $localeTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @return int|null
     */
    protected function createCategoryWithLocalizedAttributes(array $data)
    {
        $idCategory = null;
        $locales = $this->localeManager->getLocaleCollection();

        foreach ($locales as $code => $localeTransfer) {
            $categoryTransfer = new CategoryTransfer();
            $categoryTransfer->fromArray($data[$code]);

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
     * TODO move root node logic into RootCategoryImporter
     *
     * @param \Generated\Shared\Transfer\NodeTransfer $rootNodeTransfer
     *
     * @return void
     */
    protected function touchRootNavigation(NodeTransfer $rootNodeTransfer)
    {
        if (!$rootNodeTransfer->getIsRoot()) {
            return;
        }

        $this->touchFacade->touchActive(InstallerConfig::RESOURCE_NAVIGATION, $rootNodeTransfer->getIdCategoryNode());
    }

    /**
     * TODO move root node logic into RootCategoryImporter
     *
     * @return void
     */
    protected function installRootNodes()
    {
        $rootData = [];
        foreach ($this->localeManager->getLocaleCollection() as $code => $localeTransfer) {
            $rootData[$code] = [
                CategoryTransfer::NAME => 'Demoshop ' . $code,
                CategoryTransfer::CATEGORY_KEY => 'demoshop_root',
                CategoryTransfer::CATEGORY_IMAGE_NAME => '',
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => false,
                CategoryTransfer::IS_IN_MENU => false,
            ];
        }

        $this->addRootNodesWithLocalizedAttributes($rootData);
    }

}
