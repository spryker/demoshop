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


    /**
     * @var array
     */
    protected $staticPages = [
        'imprint' => ['de_DE' => '/impressum'],
        'privacy' => ['de_DE' => '/datenschutz'],
        'terms' => ['de_DE' => '/agb'],
    ];

    /**
     * @var string
     */
    protected $contentKey;

    /**
     * @var string
     */
    protected $template;
    /**
     * @var string
     */
    protected $templateName;

    /**
     * @param CmsToGlossaryInterface $glossaryFacade
     * @param CmsToUrlInterface $urlFacade
     * @param CmsToLocaleInterface $localeFacade
     * @param TemplateManagerInterface $templateManager
     * @param PageManagerInterface $pageManager
     * @param GlossaryKeyMappingManagerInterface $glossaryKeyMappingManager
     * @param $filePath
     * @param $contentKey
     * @param $template
     * @param $templateName
     */
    public function __construct(
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        CmsToLocaleInterface $localeFacade,
        TemplateManagerInterface $templateManager,
        PageManagerInterface $pageManager,
        GlossaryKeyMappingManagerInterface $glossaryKeyMappingManager,
        $filePath,
        $contentKey,
        $template,
        $templateName
    ) {
        $this->glossaryFacade = $glossaryFacade;
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
        $this->templateManager = $templateManager;
        $this->pageManager = $pageManager;
        $this->glossaryKeyMappingManager = $glossaryKeyMappingManager;

        $this->filePath = $filePath;

        $this->contentKey = $contentKey;

        $this->template = $template;
        $this->templateName = $templateName;
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
        if ($this->templateManager->hasTemplatePath($this->template) === true) {
            $templateTransfer = $this->templateManager->getTemplateByPath($this->template);
        } else {
            $templateTransfer = $this->templateManager->createTemplate(
                $this->templateName,
                $this->template
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


    /**
     * @param $content
     * @param $url
     */
    private function createPageForContent($content, $url)
    {
        if ($this->urlFacade->hasUrl($url) === false) {
            $templateTransfer = $this->createTemplate();
            $pageTransfer = $this->createPage($templateTransfer);
            $this->pageManager->touchPageActive($pageTransfer);

            $this->glossaryKeyMappingManager->addPlaceholderText($pageTransfer, $this->contentKey, $content);
            $urlTransfer = $this->pageManager->createPageUrl($pageTransfer, $url);
            $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
        } else {
            $this->warning(sprintf('Page with URL %s already exists. Skipping.', $url));
        }
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
