<?php

namespace Pyz\Zed\Cms\Communication;

use Spryker\Zed\Cms\Communication\Form\CmsGlossaryForm;
use Spryker\Zed\Cms\Communication\Form\CmsRedirectForm;
use Spryker\Zed\Cms\Communication\Form\CmsBlockForm;
use Spryker\Zed\Cms\Communication\Form\CmsPageForm;
use Spryker\Zed\Cms\Communication\Table\CmsGlossaryTable;
use Spryker\Zed\Cms\Communication\Table\CmsRedirectTable;
use Spryker\Zed\Cms\Communication\Table\CmsBlockTable;
use Spryker\Zed\Cms\Communication\Table\CmsPageTable;
use Spryker\Zed\Cms\Communication\CmsCommunicationFactory as SprykerCmsCommunicationFactory;

class CmsCommunicationFactory extends SprykerCmsCommunicationFactory
{

    /**
     * @return CmsPageTable
     */
    public function createCmsPageTable()
    {
        $pageQuery = $this->getQueryContainer()
                    ->queryPageWithTemplatesAndUrls();

        return new CmsPageTable($pageQuery);
    }

    /**
     * @param int $idLocale
     *
     * @return CmsBlockTable
     */
    public function createCmsBlockTable($idLocale)
    {
        $blockQuery = $this->getQueryContainer()
                    ->queryPageWithTemplatesAndBlocks($idLocale);

        return new CmsBlockTable($blockQuery);
    }

    /**
     * @return CmsRedirectTable
     */
    public function createCmsRedirectTable()
    {
        $urlQuery = $this->getQueryContainer()
                    ->queryUrlsWithRedirect();

        return new CmsRedirectTable($urlQuery);
    }

    /**
     * @param int $idPage
     * @param int $fkLocale
     * @param array $placeholders
     * @param array $searchArray
     *
     * @return CmsGlossaryTable
     */
    public function createCmsGlossaryTable($idPage, $fkLocale, array $placeholders = null, array $searchArray = null)
    {
        $glossaryQuery = $this->getQueryContainer()
                    ->queryGlossaryKeyMappingsWithKeyByPageId($idPage, $fkLocale);

        return new CmsGlossaryTable($glossaryQuery, $idPage, $placeholders, $searchArray);
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
                    ->queryPageWithTemplatesAndUrlByIdPage($idPage);

        $templateQuery = $this->getQueryContainer()
                    ->queryTemplates();

        $urlFacade = $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);

        return new CmsPageForm($templateQuery, $pageUrlByIdQuery, $urlFacade, $formType, $idPage);
    }

    /**
     * @param string $formType
     * @param int $idCmsBlock
     *
     * @return CmsPageForm
     */
    public function createCmsBlockForm($formType, $idCmsBlock = null)
    {
        $blockPageByIdQuery = $this->getQueryContainer()
                    ->queryPageWithTemplatesAndBlocksById($idCmsBlock);

        $templateQuery = $this->getQueryContainer()
                    ->queryTemplates();

        return new CmsBlockForm($templateQuery, $blockPageByIdQuery, $formType, $idCmsBlock);
    }

    /**
     * @param string $formType
     * @param int $idUrl
     *
     * @return CmsRedirectForm
     */
    public function createCmsRedirectForm($formType, $idUrl = null)
    {
        $queryUrlById = $this->getQueryContainer()
                    ->queryUrlByIdWithRedirect($idUrl);

        $urlFacade = $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);

        return new CmsRedirectForm($queryUrlById, $urlFacade, $formType);
    }

    /**
     * @param int $idPage
     * @param int $idMapping
     * @param array $placeholder
     * @param CmsFacade $cmsFacade
     *
     * @return CmsGlossaryForm
     */
    public function createCmsGlossaryForm($idPage, $idMapping, $placeholder, $cmsFacade)
    {
        $glossaryMappingByIdQuery = $this->getQueryContainer()
                    ->queryGlossaryKeyMappingWithKeyById($idMapping);

        return new CmsGlossaryForm($glossaryMappingByIdQuery, $cmsFacade, $idPage, $idMapping, $placeholder);
    }

}
