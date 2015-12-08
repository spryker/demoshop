<?php

namespace Pyz\Zed\Cms\Communication;

use Generated\Zed\Ide\FactoryAutoCompletion\CmsCommunication;
use PavFeature\Zed\Cms\Communication\CmsDependencyContainer as PavCmsDependencyContainer;
use PavFeature\Zed\Cms\Communication\Table\CmsBlockTable;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Pyz\Zed\Cms\Communication\Form\CmsPageForm;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;

/**
 * @method CmsQueryContainer getQueryContainer()
 * @method CmsCommunication getFactory()
 */
class CmsDependencyContainer extends PavCmsDependencyContainer
{
    /**
     * @return CmsBlockTable
     */
    public function createCmsPageTable()
    {
        $localeTransfer = $this->getLocaleFacade()->getCurrentLocale();

        $pageQuery = $this->getQueryContainer()
            ->queryPageWithProductAndCategory($localeTransfer)
        ;

        return $this->getFactory()
            ->createTableCmsPageTable($pageQuery)
            ;
    }

    /**
     * @param string $formType
     * @param int $idPage
     *
     * @return CmsPageForm
     */
    public function createCmsPageForm($formType, $idPage = null)
    {
        $pageUrlByIdQuery = $this->getQueryContainer()
            ->queryPageWithTemplatesAndUrlByIdPage($idPage)
        ;

        $templateQuery = $this->getQueryContainer()
            ->queryTemplates()
        ;

        $urlFacade = $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);
        $productQueryContainer = $this->getProvidedDependency(CmsDependencyProvider::QUERY_CONTAINER_PRODUCT);
        $categoryCmsQueryContainer = $this->getProvidedDependency(CmsDependencyProvider::QUERY_CONTAINER_CATEGORY_CMS);
        $localeTransfer = $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE)->getCurrentLocale();

        return $this->getFactory()->createFormCmsPageForm(
                $templateQuery,
                $pageUrlByIdQuery,
                $urlFacade,
                $formType,
                $idPage,
                $productQueryContainer,
                $categoryCmsQueryContainer,
                $localeTransfer
            );
    }
}
