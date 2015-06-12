<?php

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Shared\Transfer\PageTransfer;
use Generated\Shared\Transfer\CmsTemplateTransfer;
use Pyz\Zed\Cms\CmsConfig;
use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleInterface;
use SprykerFeature\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use SprykerFeature\Zed\Cms\Business\Page\PageManagerInterface;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

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
     * @var GlossaryKeyMappingManagerInterface
     */
    protected $keyMappingManager;

    /**
     * @var array
     */
    protected $staticPages = [
        'imprint' => ['de_DE' => '/impressum'],
        'privacy' => ['de_DE' => '/datenschutz'],
        'terms'   => ['de_DE' => '/agb'],
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
     * @param GlossaryKeyMappingManagerInterface $keyMappingManager
     * @param CmsConfig $config
     */
    public function __construct(
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        CmsToLocaleInterface $localeFacade,
        TemplateManagerInterface $templateManager,
        PageManagerInterface $pageManager,
        GlossaryKeyMappingManagerInterface $keyMappingManager,
        CmsConfig $config
    ) {
        $this->glossaryFacade = $glossaryFacade;
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
        $this->templateManager = $templateManager;
        $this->pageManager = $pageManager;
        $this->keyMappingManager = $keyMappingManager;

        $this->filePath = $config->getDemoDataPath();
        $this->contentKey = $config->getDemoDataContentKey();
        $this->template = $config->getDemoDataTemplate();
        $this->templateName = $config->getDemoDataTemplateName();
    }

    public function install()
    {
        $this->info('This will install a standard set of cms pages in the demo shop');
        $this->installCmsData();
    }

    public function installCmsData()
    {
        foreach ($this->localeFacade->getAvailableLocales() as $locale) {
            $localeStaticFilePath = $this->filePath . '/' . $locale;
            if ($this->checkPathExists($localeStaticFilePath)) {
                $this->installStaticPagesFromPath($localeStaticFilePath, $locale);
            }
        }
    }

    /**
     * @param $localeStaticFilePath
     * @param $pageKey
     *
     * @return string
     */
    public function getFileName($localeStaticFilePath, $pageKey)
    {
        return $localeStaticFilePath . '/initial_' . $pageKey . '.html';
    }

    /**
     * @return CmsTemplateTransfer
     */
    private function getOrCreateTemplate()
    {
        if ($this->templateManager->hasTemplatePath($this->template)) {
            return $this->templateManager->getTemplateByPath($this->template);
        }

        return $this->templateManager->createTemplate(
            $this->templateName,
            $this->template
        );
    }

    /**
     * @param $localeStaticFilePath
     *
     * @return bool
     */
    private function checkPathExists($localeStaticFilePath)
    {
        return is_dir($localeStaticFilePath);
    }

    /**
     * @param $content
     * @param $url
     * @param $pageKey
     */
    private function installPage($content, $url, $pageKey)
    {
        if ($this->urlFacade->hasUrl($url)) {
            $this->warning(sprintf('Page with URL %s already exists. Skipping.', $url));

            return;
        }

        $templateTransfer = $this->getOrCreateTemplate();
        $pageTransfer = $this->createPage($templateTransfer);
        $this->keyMappingManager->addPlaceholderText($pageTransfer, $this->contentKey, $content);
        $urlTransfer = $this->pageManager->createPageUrl($pageTransfer, $url);

        $this->pageManager->touchPageActive($pageTransfer);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
    }

    /**
     * @param CmsTemplateTransfer $templateTransfer
     *
     * @return PageTransfer
     */
    private function createPage(CmsTemplateTransfer $templateTransfer)
    {
        $pageTransfer = new PageTransfer();
        $pageTransfer->setFkTemplate($templateTransfer->getIdCmsTemplate());
        $pageTransfer->setIsActive(true);

        return $this->pageManager->savePage($pageTransfer);
    }

    /**
     * @param $localeStaticFilePath
     * @param $locale
     */
    private function installStaticPagesFromPath($localeStaticFilePath, $locale)
    {
        foreach ($this->staticPages as $pageKey => $localeConfig) {
            $file = $this->getFileName($localeStaticFilePath, $pageKey);
            if ($fileContent = file_get_contents($file)) {
                $this->installPage($fileContent, $localeConfig[$locale], $pageKey);
            }
        }
    }
}
