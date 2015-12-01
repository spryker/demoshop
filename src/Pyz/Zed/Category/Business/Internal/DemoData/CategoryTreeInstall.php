<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Shared\Cms\CmsBlockInterface;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\CmsBlock\Business\CmsBlockFacade;
use Pyz\Zed\Url\Business\UrlFacade;
use SprykerEngine\Zed\Locale\Business\LocaleFacade;
use SprykerFeature\Zed\Category\Business\Model\CategoryWriter;
use SprykerFeature\Zed\Category\Business\Model\CategoryWriterInterface;
use SprykerFeature\Zed\Category\Business\Tree\CategoryTreeWriter;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;

class CategoryTreeInstall extends AbstractInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const PARENT_NAME = 'parent_name';
    const IMAGE_NAME = 'image_name';
    const CATEGORY_KEY = 'category_key';

    /**
     * @var CategoryWriter
     */
    protected $categoryWriter;

    /**
     * @var CategoryTreeWriter
     */
    protected $categoryTreeWriter;

    /**
     * @var CategoryQueryContainer
     */
    protected $queryContainer;

    /**
     * @var LocaleTransfer
     */
    protected $locale;

    protected $cmsFacade;

    protected $cmsBlockFacade;

    /** @var  UrlFacade */
    protected $urlFacade;

    /**
     * @param CategoryWriterInterface $categoryWriter
     * @param CategoryTreeWriter $categoryTreeWriter
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     * @param CmsFacade $cmsFacade
     * @param CmsBlockFacade $cmsBlockFacade
     * @param UrlFacade $urlFacade
     */
    public function __construct(
        CategoryWriterInterface $categoryWriter,
        CategoryTreeWriter $categoryTreeWriter,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade,
        CmsFacade $cmsFacade,
        CmsBlockFacade $cmsBlockFacade,
        UrlFacade $urlFacade
    ) {
        $this->categoryWriter = $categoryWriter;
        $this->categoryTreeWriter = $categoryTreeWriter;
        $this->queryContainer = $categoryQueryContainer;
        $this->locale = $localeFacade->getCurrentLocale();
        $this->cmsFacade = $cmsFacade;
        $this->cmsBlockFacade = $cmsBlockFacade;
        $this->urlFacade = $urlFacade;
    }

    public function install()
    {
        $this->info('This will install a Dummy CategoryTree in the demo shop');

        $demoTree = $this->getDemoTree();

        if ($this->queryContainer->queryRootNode()->count() > 0) {
            $this->warning('Dummy CategoryTree already installed. Skipping.');

            return;
        }

        $this->write($demoTree);
    }

    /**
     * @return array
     */
    protected function getDemoTree()
    {
        $jsonData = file_get_contents(__DIR__ . '/pets-deli-category-tree.json');

        return json_decode($jsonData, true);
    }

    /**
     * @param array $demoTree
     */
    protected function write(array $demoTree)
    {

        $idRootNode = $this->addRootNode($demoTree);

        foreach ($demoTree['children'] as $child) {
            $this->addChild($child, $idRootNode);
        }
    }

    /**
     * @param array $rawNode
     * @return int
     */
    protected function addRootNode(array $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);
        $categoryNodeTransfer = new NodeTransfer();
        $categoryNodeTransfer->setIsRoot(true);
        $categoryNodeTransfer->setFkCategory($idCategory);

        return $this->categoryTreeWriter->createCategoryNode($categoryNodeTransfer, $this->locale, false);
    }

    /**
     * @param array $rawNode
     * @param $idParentNode
     */
    protected function addChild(array $rawNode, $idParentNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = new NodeTransfer();
        $categoryNodeTransfer->setIsRoot(false);
        $categoryNodeTransfer->setFkCategory($idCategory);
        $categoryNodeTransfer->setFkParentCategoryNode($idParentNode);

        $idCategoryNode = $this->categoryTreeWriter->createCategoryNode($categoryNodeTransfer, $this->locale, true);
        $categoryNodeTransfer->setIdCategoryNode($idCategoryNode);

        $pageTransfer = $this->cmsFacade->getPageByCategoryNode($categoryNodeTransfer);

        // TODO: resolve 46 to correct locale
        $urlTransfer = $this->urlFacade->getUrlByIdPage($pageTransfer->getIdCmsPage(), 46);
        $urlTransfer->setUrl($rawNode['url']);
        $this->urlFacade->saveUrl($urlTransfer);

        foreach ($rawNode['cms_block_names'] as $cmsBlockName) {
            $cmsBlockTransfer = $this->cmsBlockFacade->getCmsBlockByName($cmsBlockName);
            $this->cmsBlockFacade->linkPageToBlock($pageTransfer->getIdCmsPage(), $cmsBlockTransfer->getIdCmsBlock());
        }

        foreach ($rawNode['children'] as $subNode) {
            $this->addChild($subNode, $idCategoryNode);
        }


    }

    /**
     * @param array $rawNode
     *
     * @return bool
     */
    protected function getParentId(array $rawNode)
    {
        $nodeQuery = $this->queryContainer->queryNodeByCategoryName($rawNode[self::PARENT_NAME], $this->locale->getIdLocale());
        $nodeEntity = $nodeQuery->findOne();

        if ($nodeEntity) {
            return $nodeEntity->getPrimaryKey();
        }

        return false;
    }

    /**
     * @param array $rawNode
     *
     * @return int
     */
    protected function createCategory(array $rawNode)
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setName($rawNode[self::CATEGORY_NAME]);
        $categoryTransfer->setCategoryKey($rawNode[self::CATEGORY_KEY]);
        $idCategory = $this->categoryWriter->create($categoryTransfer, $this->locale);

        return $idCategory;
    }

}
