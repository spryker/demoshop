<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleInterface;
use SprykerFeature\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use SprykerFeature\Zed\Cms\Business\Page\PageManagerInterface;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use Generated\Shared\Transfer\PageTransfer;

/**
 * Class CmsInstall
 * @package Pyz\Zed\Cms\Business\Internal\DemoData
 */
class CmsInstall extends AbstractInstaller
{

    /**
     * @var CmsToGlossaryInterface
     */
    protected $glossaryFacade;
    /**
     * @var CmsToUrlInterface
     */
    protected $urlFacade;
    /**
     * @var CmsToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var string
     */
    protected $filePath;


    protected $staticPages = [
        'imprint' => ['de_DE' => '/impressum'],
        'privacy' => ['de_DE' => '/datenschutz'],
        'terms' => ['de_DE' => '/agb'],
    ];


    public function __construct(
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        CmsToLocaleInterface $localeFacade,
        TemplateManagerInterface $templateManager,
        PageManagerInterface $pageManager,
        GlossaryKeyMappingManagerInterface $glossaryKeyMappingManager,
        $filePath,
        $contentKey
    ) {
        $this->glossaryFacade = $glossaryFacade;
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
        $this->templateManager = $templateManager;
        $this->pageManager = $pageManager;
        $this->glossaryKeyMappingManager = $glossaryKeyMappingManager;
        $this->filePath = $filePath;
        $this->contentKey = $contentKey;
    }

    /**
     *
     */
    public function install()
    {
        $this->info("This will install a standard set of cms pages in the demo shop ");
        $this->installCmsData();

    }

    /**
     *
     */
    public function installCmsData()
    {
        foreach ($this->localeFacade->getAvailableLocales() as $locale) {
            $localePath = $this->filePath . '/' . $locale;
            if ($this->checkPathExists($localePath)) {
                $this->installStaticPagesFromPath($localePath, $locale);
            }
        }
    }

    /**
     * @param $localePath
     * @param $pageKey
     * @return string
     */
    public function getFileName($localePath, $pageKey)
    {
        $file = $localePath . '/initial_' . $pageKey . '.html';
        return $file;
    }

    /**
     * @return mixed
     */
    private function createTemplate()
    {
        if ($this->templateManager->hasTemplatePath('static_fullpage.twig') === true) {
            $templateTransfer = $this->templateManager->getTemplateByPath('static_fullpage.twig');
        } else {
            $templateTransfer = $this->templateManager->createTemplate(
                'static full page',
                'static_fullpage.twig'
            );
        }
        return $templateTransfer;
    }

    /**
     * @param $localePath
     * @return bool
     */
    private function checkPathExists($localePath)
    {
        return is_dir($localePath);
    }


    private function createPageForContent($content, $url)
    {
        $templateTransfer = $this->createTemplate();
        $pageTransfer = $this->createPage($templateTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
        $this->glossaryKeyMappingManager->addPlaceholderText($pageTransfer, $this->contentKey, $content);
        $urlTransfer = $this->pageManager->createPageUrl($pageTransfer, $url);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
    }

    /**
     * @param $templateTransfer
     * @return \Generated\Shared\Transfer\PageTransfer|PageTransfer
     */
    private function createPage($templateTransfer)
    {
        $pageTransfer = new PageTransfer();
        $pageTransfer->setFkTemplate($templateTransfer->getIdCmsTemplate());
        $pageTransfer->setIsActive(true);
        $pageTransfer = $this->pageManager->savePage($pageTransfer);
        return $pageTransfer;
    }

    /**
     * @param $localePath
     * @param $locale
     */
    private function installStaticPagesFromPath($localePath, $locale)
    {
        foreach ($this->staticPages as $pageKey => $localeConfig) {
            $file = $this->getFileName($localePath, $pageKey);
            if ($fileContent = file_get_contents($file)) {
                $this->createPageForContent($fileContent, $localeConfig[$locale]);
            }
        }
    }
}
