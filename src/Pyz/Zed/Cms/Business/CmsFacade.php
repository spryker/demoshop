<?php

namespace Pyz\Zed\Cms\Business;

use Generated\Shared\Transfer\CategoryNodeTemplateTransfer;
use Generated\Shared\Transfer\KeywordTransfer;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\CmsToCategoryInterface;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class CmsFacade extends SprykerCmsFacade implements CmsToCategoryInterface
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplate(CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer)
    {
        $categoryManager = $this->getDependencyContainer()->getCategoryManager();

        return $categoryManager->saveCategoryNodeTemplate($categoryNodeTemplateTransfer);
    }

    /**
     * @param CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplateAndTouch(CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer)
    {
        $categoryManager = $this->getDependencyContainer()->getCategoryManager();

        return $categoryManager->saveCategoryNodeTemplateAndTouch($categoryNodeTemplateTransfer);
    }

    /**
     * @param CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer
     */
    public function touchActiveCategoryNode(CategoryNodeTemplateTransfer $categoryNodeTemplateTransfer)
    {
        $categoryManager = $this->getDependencyContainer()->getCategoryManager();

        $categoryManager->touchActiveCategoryNode($categoryNodeTemplateTransfer);
    }

    /**
     * @param string $categoryTemplatePath
     *
     * @return array
     */
    public function getCategoryTemplates($categoryTemplatePath)
    {
        $categoryManager = $this->getDependencyContainer()->getCategoryManager();

        return $categoryManager->getCategoryTemplates($categoryTemplatePath);
    }

    /**
     * @param int $idCategoryNodeTemplate
     *
     * @return bool
     */
    public function deleteCategoryNodeTemplate($idCategoryNodeTemplate)
    {
        $categoryManager = $this->getDependencyContainer()->getCategoryManager();

        return $categoryManager->deleteCategoryNodeTemplate($idCategoryNodeTemplate);
    }

    /**
     * @param KeywordTransfer $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeyword(KeywordTransfer $keywordTransfer)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->saveCmsKeyword($keywordTransfer);
    }

    /**
     * @param KeywordTransfer $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeywordAndTouch(KeywordTransfer $keywordTransfer)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->saveCmsKeywordAndTouch($keywordTransfer);
    }

    /**
     * @param string $data
     *
     * @return bool
     */
    public function saveCmsBulkKeywordAndTouch($data)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->saveCmsBulkKeywordAndTouch($data);
    }

    /**
     * @param KeywordTransfer $keywordTransfer
     *
     * @return bool
     */
    public function touchActiveKeyword(KeywordTransfer $keywordTransfer)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->touchActiveKeyword($keywordTransfer);
    }

    /**
     * @param KeywordTransfer $keywordTransfer
     *
     * @return bool
     */
    public function touchDeleteKeyword(KeywordTransfer $keywordTransfer)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->touchDeleteKeyword($keywordTransfer);
    }

    /**
     * @param int $idKeyword
     *
     * @return bool
     */
    public function deleteKeyword($idKeyword)
    {
        $keywordManager = $this->getDependencyContainer()->getKeywordManager();

        return $keywordManager->deleteKeyword($idKeyword);
    }

}
