<?php

namespace Pyz\Zed\Cms\Business\Manager;

use Generated\Shared\Cms\CategoryNodeTemplateInterface;
use Generated\Shared\Transfer\CategoryNodeTemplateTransfer;
use Orm\Zed\Cms\Persistence\KamCategoryNodeTemplate;
use Pyz\Zed\Cms\CmsConfig;
use SprykerFeature\Shared\Category\CategoryConfig;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainerInterface;
use Symfony\Component\Finder\Finder;

class CategoryManager implements CategoryManagerInterface
{

    /**
     * @var CmsQueryContainerInterface
     */
    protected $cmsQueryContainer;

    /**
     * @var CmsToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var Finder
     */
    protected $finder;

    /**
     * @var CmsConfig
     */
    protected $config;

    /**
     * @param CmsQueryContainerInterface $cmsQueryContainer
     * @param CmsToTouchInterface $touchFacade
     * @param CmsConfig $cmsConfig
     * @param Finder $finder
     */
    public function __construct(CmsQueryContainerInterface $cmsQueryContainer, CmsToTouchInterface $touchFacade, CmsConfig $cmsConfig, Finder $finder)
    {
        $this->cmsQueryContainer = $cmsQueryContainer;
        $this->touchFacade = $touchFacade;
        $this->config = $cmsConfig;
        $this->finder = $finder;
    }

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplate(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer)
    {
        if (null !== $this->getCategoryNodeTemplateById($categoryNodeTemplateTransfer->getIdCategoryTemplateNode())) {
            $categoryNodeTemplateEntity = $this->updateCategoryNodeTemplate($categoryNodeTemplateTransfer);
        } else {
            $categoryNodeTemplateEntity = $this->createCategoryNodeTemplate($categoryNodeTemplateTransfer);
        }

        return $this->convertCategoryNodeTemplateEntityToTransfer($categoryNodeTemplateEntity);
    }

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return KamCategoryNodeTemplate
     */
    private function createCategoryNodeTemplate(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer)
    {
        $categoryNodeTemplateEntity = new KamCategoryNodeTemplate();
        $categoryNodeTemplateEntity->fromArray($categoryNodeTemplateTransfer->toArray());
        $categoryNodeTemplateEntity->save();

        return $categoryNodeTemplateEntity;
    }

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return KamCategoryNodeTemplate
     */
    private function updateCategoryNodeTemplate(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer)
    {
        $categoryNodeTemplateEntity = $this->getCategoryNodeTemplateById($categoryNodeTemplateTransfer->getIdCategoryTemplateNode());
        $categoryNodeTemplateEntity->fromArray($categoryNodeTemplateTransfer->toArray());
        $categoryNodeTemplateEntity->save();

        return $categoryNodeTemplateEntity;
    }

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplateAndTouch(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer)
    {
        $categoryNodeTemplateTransfer = $this->saveCategoryNodeTemplate($categoryNodeTemplateTransfer);

        $this->touchActiveCategoryNode($categoryNodeTemplateTransfer);
    }

    /**
     * @param KamCategoryNodeTemplate $categoryNodeTemplateEntity
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function convertCategoryNodeTemplateEntityToTransfer(KamCategoryNodeTemplate $categoryNodeTemplateEntity)
    {
        $categoryNodeTemplateTransfer = new CategoryNodeTemplateTransfer();
        $categoryNodeTemplateTransfer->fromArray($categoryNodeTemplateEntity->toArray(), true);

        return $categoryNodeTemplateTransfer;
    }

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     */
    public function touchActiveCategoryNode(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer)
    {
        $this->touchFacade->touchActive(CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE, $categoryNodeTemplateTransfer->getFkCategoryNode());
    }

    /**
     * @param $categoryTemplatePath
     *
     * @return array
     */
    public function getCategoryTemplates($categoryTemplatePath)
    {
        $templateFolder = $this->config->getCategoryTemplateRealPath($categoryTemplatePath);

        $this->finder->in($templateFolder)
            ->name('*.twig')
            ->depth('0')
        ;

        $result = [];
        foreach ($this->finder->files() as $file) {
            $result[$categoryTemplatePath . $file->getRelativePathname()] = $file->getRelativePathname();
        }

        return $result;
    }

    /**
     * @param $idCategoryNodeTemplate
     *
     * @return KamCategoryNodeTemplate
     */
    private function getCategoryNodeTemplateById($idCategoryNodeTemplate)
    {
        return $this->cmsQueryContainer->queryCategoryNoeTemplateById($idCategoryNodeTemplate)
            ->findOne()
            ;
    }

    /**
     * @param int $idCategoryNodeTemplate
     *
     * @return bool
     */
    public function deleteCategoryNodeTemplate($idCategoryNodeTemplate)
    {
        $categoryNodeTemplateEntity = $this->getCategoryNodeTemplateById($idCategoryNodeTemplate);
        $categoryNodeTemplateTransfer = $this->convertCategoryNodeTemplateEntityToTransfer($categoryNodeTemplateEntity);

        $rowDeleted = $categoryNodeTemplateEntity->delete();

        $this->touchActiveCategoryNode($categoryNodeTemplateTransfer);

        return $rowDeleted > 0;
    }

}
