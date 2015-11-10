<?php

namespace Pyz\Zed\Cms\Business\Manager;

use Generated\Shared\Cms\CategoryNodeTemplateInterface;
use Orm\Zed\Cms\Persistence\KamCategoryNodeTemplate;

interface CategoryManagerInterface
{

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplate(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer);

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function saveCategoryNodeTemplateAndTouch(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer);

    /**
     * @param KamCategoryNodeTemplate $categoryNodeTemplateEntity
     *
     * @return CategoryNodeTemplateTransfer
     */
    public function convertCategoryNodeTemplateEntityToTransfer(KamCategoryNodeTemplate $categoryNodeTemplateEntity);

    /**
     * @param CategoryNodeTemplateInterface $categoryNodeTemplateTransfer
     */
    public function touchActiveCategoryNode(CategoryNodeTemplateInterface $categoryNodeTemplateTransfer);

    /**
     * @param string $categoryTemplatePath
     *
     * @return array
     */
    public function getCategoryTemplates($categoryTemplatePath);

    /**
     * @param int $idCategoryNodeTemplate
     *
     * @return bool
     */
    public function deleteCategoryNodeTemplate($idCategoryNodeTemplate);

}
