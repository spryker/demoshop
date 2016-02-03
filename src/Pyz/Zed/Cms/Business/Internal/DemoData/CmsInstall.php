<?php

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\CmsTemplateTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageTransfer;
use Pyz\Zed\Cms\CmsConfig;
use Spryker\Zed\Cms\Business\Block\BlockManagerInterface;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use Spryker\Zed\Cms\Business\Page\PageManagerInterface;
use Spryker\Zed\Cms\Business\Template\TemplateManagerInterface;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Locale\Business\LocaleFacade;

class CmsInstall extends AbstractInstaller
{

    const URL = 'url';
    const FROM_URL = 'fromUrl';
    const TO_URL = 'toUrl';
    const STATUS = 'status';
    const BLOCK_NAME = 'blockName';
    const PLACEHOLDER = 'placeholder';
    const PLACEHOLDERS = 'placeholders';
    const TRANSLATION = 'translation';
    const TEMPLATE = 'template';
    const TEMPLATE_PATH = 'template_path';
    const PAGE = 'page';
    const REDIRECT = 'redirect';
    const BLOCK = 'block';
    const BLOCK_TYPE = 'type';
    const BLOCK_TYPE_VALUE = 'value';
    const CATEGORY = 'category';
    const FILE_CONTAINS_INVALID_DATA = 'XML file contains invalid data.';
    const LOCALE = 'locale';
    const LOCALES = 'locales';
    const NAME = 'name';

    /**
     * @var \Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface
     */
    protected $glossaryFacade;

    /**
     * @var \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface
     */
    protected $urlFacade;

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface
     */
    protected $keyMappingManager;

    /**
     * @var array
     */
    protected $dataFileNames;

    /**
     * @var string
     */
    protected $contentKey;

    /**
     * @var array
     */
    protected $templates;

    /**
     * @var array
     */
    protected $templateNames;

    /**
     * @var string
     */
    protected $blockDemoType = 'static';

    /**
     * @var int
     */
    protected $blockDemoValue = 0;

    /**
     * @param \Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface $glossaryFacade
     * @param \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface $urlFacade
     * @param \Spryker\Zed\Locale\Business\LocaleFacade $localeFacade
     * @param \Spryker\Zed\Cms\Business\Template\TemplateManagerInterface $templateManager
     * @param \Spryker\Zed\Cms\Business\Page\PageManagerInterface $pageManager
     * @param \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface $keyMappingManager
     * @param \Spryker\Zed\Cms\Business\Block\BlockManagerInterface $blockManager
     * @param \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface $cmsQueryContainer
     * @param \Pyz\Zed\Cms\CmsConfig $config
     */
    public function __construct(
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        LocaleFacade $localeFacade,
        TemplateManagerInterface $templateManager,
        PageManagerInterface $pageManager,
        GlossaryKeyMappingManagerInterface $keyMappingManager,
        BlockManagerInterface $blockManager,
        CmsQueryContainerInterface $cmsQueryContainer,
        CmsConfig $config
    ) {
        $this->glossaryFacade = $glossaryFacade;
        $this->urlFacade = $urlFacade;
        $this->localeFacade = $localeFacade;
        $this->templateManager = $templateManager;
        $this->pageManager = $pageManager;
        $this->keyMappingManager = $keyMappingManager;
        $this->blockManager = $blockManager;
        $this->cmsQueryContainer = $cmsQueryContainer;

        $this->filePath = $config->getDemoDataPath();
        $this->templates = $config->getDemoDataTemplates();
        $this->templateNames = $config->getDemoDataTemplateNames();
        $this->dataFileNames = $config->getDemoDataFileNames();
    }

    public function install()
    {
        $this->info('This will install a standard set of cms pages, blocks and redirects in the demo shop');
        $this->installCmsData();
    }

    public function installCmsData()
    {
        foreach ($this->localeFacade->getAvailableLocales() as $locale) {
            $demoDataFile = $this->filePath . DIRECTORY_SEPARATOR . $locale;
            if ($this->checkPathExists($demoDataFile)) {
                $this->installPageFromDemoDataFile($demoDataFile);
                $this->installRedirectFromDemoDataFile($demoDataFile);
                $this->installBlockFromDemoDataFile($demoDataFile);
            }
        }
    }

    /**
     * @param \SimpleXMLElement $pageItem
     *
     * @return void
     */
    private function installPage(\SimpleXMLElement $pageItem)
    {
        $templateTransfer = $this->getOrCreateTemplate((string) $pageItem->{self::TEMPLATE});
        $pageTransfer = null;

        foreach ($pageItem->{self::LOCALES}->children() as $locale) {
            $localeTransfer = $this->getLocale($locale);
            $url = (string) $locale->{self::URL};
            if ($this->urlFacade->hasUrl($url)) {
                $this->warning(sprintf('Page with URL %s already exists. Skipping.', $url));

                continue;
            }

            if ($pageTransfer === null) {
                $pageTransfer = $this->createPage($templateTransfer);
            }

            $this->createPageUrl($pageTransfer, $url, $localeTransfer);
            $this->createPlaceholder($locale, $pageTransfer, $localeTransfer);
        }
    }

    /**
     * @param string $fromUrl
     * @param string $toUrl
     * @param int $status
     */
    private function installRedirect($fromUrl, $toUrl, $status)
    {
        if ($this->urlFacade->hasUrl($fromUrl)) {
            $this->warning(sprintf('Redirect with URL %s already exists. Skipping.', $fromUrl));

            return;
        }

        $redirectTransfer = $this->urlFacade->createRedirectAndTouch($toUrl, $status);

        $this->urlFacade
            ->saveRedirectUrlAndTouch(
                $fromUrl,
                $this->localeFacade->getCurrentLocale(),
                $redirectTransfer->getIdUrlRedirect()
            );
    }

    /**
     * @param \SimpleXMLElement $blockItem
     *
     * @return void
     */
    protected function installBlock(\SimpleXMLElement $blockItem)
    {
        $blockName = (string) $blockItem->{self::BLOCK_NAME};
        if ($this->cmsQueryContainer->queryBlockByNameAndTypeValue($blockName, $this->blockDemoType, $this->blockDemoValue)->count() > 0) {
            $this->warning(sprintf('Block with Name %s already exists. Skipping.', $blockName));

            return;
        }

        $templateTransfer = $this->getOrCreateTemplate((string) $blockItem->{self::TEMPLATE});
        $pageTransfer = $this->createPage($templateTransfer);

        foreach ($blockItem->{self::LOCALES}->children() as $locale) {
            $localeTransfer = $this->getLocale($locale);
            $this->createPlaceholder($locale, $pageTransfer, $localeTransfer);
        }

        $cmsBlockTransfer = $this->createCmsBlockTransfer($blockName, $this->blockDemoType, $this->blockDemoValue, $pageTransfer);
        $this->blockManager->saveBlockAndTouch($cmsBlockTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CmsTemplateTransfer $templateTransfer
     *
     * @return \Generated\Shared\Transfer\PageTransfer
     */
    private function createPage(CmsTemplateTransfer $templateTransfer)
    {
        $pageTransfer = new PageTransfer();
        $pageTransfer->setFkTemplate($templateTransfer->getIdCmsTemplate());
        $pageTransfer->setIsActive(true);

        return $this->pageManager->savePage($pageTransfer);
    }

    /**
     * @param string $filePath
     */
    private function installPageFromDemoDataFile($filePath)
    {
        $pageXmlElements = $this->getDataFromFileAsArray($filePath, self::PAGE);
        foreach ($pageXmlElements as $pageElement) {
            $this->installPage($pageElement);
        }
    }

    /**
     * @param string $filePath
     */
    private function installRedirectFromDemoDataFile($filePath)
    {
        $redirectDataArray = $this->getDataFromFileAsArray($filePath, self::REDIRECT);
        $redirectDataArray = $this->createCmsRedirectsArray($redirectDataArray);

        foreach ($redirectDataArray as $redirectData) {
            $this->installRedirect($redirectData[self::FROM_URL], $redirectData[self::TO_URL], $redirectData[self::STATUS]);
        }
    }

    /**
     * @param string $filePath
     */
    private function installBlockFromDemoDataFile($filePath)
    {
        $blockXmlElements = $this->getDataFromFileAsArray($filePath, self::BLOCK);

        foreach ($blockXmlElements as $blockElement) {
            $this->installBlock($blockElement);
        }
    }

    /**
     * @param string $filePath
     * @param string $type
     *
     * @return \SimpleXMLElement[]
     */
    private function getDataFromFileAsArray($filePath, $type)
    {
        $file = $this->getFileName($filePath, $this->dataFileNames[$type]);
        $splFileInfo = new \SplFileInfo($file);

        $xmlContent = file_get_contents($splFileInfo->getPath() . DIRECTORY_SEPARATOR . $splFileInfo->getBasename());
        $xml = new \SimpleXMLElement($xmlContent);

        return $xml->{$type};
    }

    /**
     * @param string $blockName
     * @param string $blockType
     * @param string $blockValue
     * @param string $pageTransfer
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer
     */
    private function createCmsBlockTransfer($blockName, $blockType, $blockValue, $pageTransfer)
    {
        $cmsBlockTransfer = new CmsBlockTransfer();
        $cmsBlockTransfer->setName($blockName);
        $cmsBlockTransfer->setType($blockType);
        $cmsBlockTransfer->setValue($blockValue);
        $cmsBlockTransfer->setFkPage($pageTransfer->getIdCmsPage());

        return $cmsBlockTransfer;
    }

    /**
     * @param \SimpleXMLElement $xmlElement
     *
     * @return array
     */
    protected function createCmsRedirectsArray(\SimpleXMLElement $xmlElement)
    {
        $elementList = [];

        foreach ($xmlElement as $item) {
            $elementList[] = [
                self::FROM_URL => (string) $item->{self::FROM_URL},
                self::TO_URL => (string) $item->{self::TO_URL},
                self::STATUS => (string) $item->{self::STATUS},
            ];
        }

        return $elementList;
    }

    /**
     * @param string $localeStaticFilePath
     * @param string $fileName
     *
     * @return string
     */
    public function getFileName($localeStaticFilePath, $fileName)
    {
        return $localeStaticFilePath . DIRECTORY_SEPARATOR . $fileName;
    }

    /**
     * @param string $template
     *
     * @return \Generated\Shared\Transfer\CmsTemplateTransfer
     */
    private function getOrCreateTemplate($template)
    {
        if ($this->templateManager->hasTemplatePath($this->templates[$template])) {
            return $this->templateManager->getTemplateByPath($this->templates[$template]);
        }

        return $this->templateManager->createTemplate(
            $this->templateNames[$template],
            $this->templates[$template]
        );
    }

    /**
     * @param string $locale
     *
     * @return \Generated\Shared\Transfer\LocaleTransfer
     */
    protected function getLocale($locale)
    {
        $localeName = (string) $locale[self::NAME];
        $localeTransfer = $this->localeFacade->getLocale($localeName);

        return $localeTransfer;
    }

    /**
     * @param string $locale
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createPlaceholder($locale, PageTransfer $pageTransfer, LocaleTransfer $localeTransfer)
    {
        foreach ($locale->{self::PLACEHOLDERS}->children() as $placeholder) {
            $this->keyMappingManager->addPlaceholderText($pageTransfer, (string) $placeholder->{self::NAME}, (string) $placeholder->{self::TRANSLATION}, $localeTransfer, false);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createPageUrl($pageTransfer, $url, LocaleTransfer $localeTransfer)
    {
        $urlTransfer = $this->pageManager->createPageUrlWithLocale($pageTransfer, $url, $localeTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
    }

    /**
     * @param string $filePath
     *
     * @return bool
     */
    private function checkPathExists($filePath)
    {
        return is_dir($filePath);
    }

}
