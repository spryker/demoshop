<?php

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\CmsTemplateTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageTransfer;
use Pyz\Zed\Cms\CmsConfig;
use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleInterface;
use SprykerFeature\Zed\Cms\Business\Block\BlockManagerInterface;
use SprykerFeature\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use SprykerFeature\Zed\Cms\Business\Page\PageManagerInterface;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainerInterface;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use Symfony\Component\DependencyInjection\SimpleXMLElement;

class CmsInstall extends AbstractInstaller
{

    const URL = 'url';
    const FROM_URL = 'fromUrl';
    const TO_URL = 'toUrl';
    const STATUS = 'status';
    const BLOCK_NAME = 'blockName';
    const PLACEHOLDER = 'placeholder';
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
     * @param CmsToGlossaryInterface $glossaryFacade
     * @param CmsToUrlInterface $urlFacade
     * @param CmsToLocaleInterface $localeFacade
     * @param TemplateManagerInterface $templateManager
     * @param PageManagerInterface $pageManager
     * @param GlossaryKeyMappingManagerInterface $keyMappingManager
     * @param BlockManagerInterface $blockManager
     * @param CmsQueryContainerInterface $cmsQueryContainer
     * @param CmsConfig $config
     */
    public function __construct(
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        CmsToLocaleInterface $localeFacade,
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
//                $this->installPageFromDemoDataFile($demoDataFile);
//                $this->installRedirectFromDemoDataFile($demoDataFile);
                $this->installBlockFromDemoDataFile($demoDataFile);
            }
        }
    }

    /**
     * @param $localeStaticFilePath
     * @param $fileName
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
     * @return CmsTemplateTransfer
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
     * @param $pageItem
     *
     * @return void
     */
    protected function installPage($pageItem)
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
     * @param $locale
     *
     * @return LocaleTransfer
     */
    protected function getLocale($locale)
    {
        $localeName = (string)$locale['name'];
        $localeTransfer = $this->localeFacade->getLocale($localeName);

        return $localeTransfer;
    }

    /**
     * @param $locale
     * @param $pageTransfer
     * @param $localeTransfer
     *
     * @return void
     */
    protected function createPlaceholder($locale, $pageTransfer, $localeTransfer)
    {
        foreach ($locale->{'placeholders'}->children() as $placeholder) {
            $this->keyMappingManager->addPlaceholderText($pageTransfer, (string)$placeholder->{'name'}, (string)$placeholder->{'translation'}, $localeTransfer, false);
        }
    }

    /**
     * @param PageTransfer $pageTransfer
     * @param string $url
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createPageUrl($pageTransfer, $url, LocaleTransfer  $localeTransfer)
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
                $redirectTransfer->getIdRedirect()
            );
    }

    /**
     * @param string $template
     * @param string $blockName
     * @param string $placeholder
     * @param string $translation
     */
    private function installBlocks($template, $blockName, $placeholder, $translation)
    {
//        if ($this->cmsQueryContainer->queryBlockByNameAndTypeValue($blockName, $this->blockDemoType, $this->blockDemoValue)->count() > 0) {
//            $this->warning(sprintf('Block with Name %s already exists. Skipping.', $blockName));
//
//            return;
//        }

        $placeholders = explode('_', $placeholder);
        $translations = explode('_', $translation);
        $templateTransfer = $this->getOrCreateTemplate($template);
        $pageTransfer = $this->createPage($templateTransfer);

        foreach ($placeholders as $key => $value) {
            $this->keyMappingManager->addPlaceholderText($pageTransfer, $value, $translations[$key]);
        }

        $cmsBlockTransfer = $this->createCmsBlockTransfer($blockName, $this->blockDemoType, $this->blockDemoValue, $pageTransfer);
        $this->blockManager->saveBlockAndTouch($cmsBlockTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
    }

    protected function installBlock($blockItem)
    {

        $blockName = (string) $blockItem->{'blockName'};
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
     * @param string $localeStaticFilePath
     */
    private function installPageFromDemoDataFile($localeStaticFilePath)
    {
        $pageXmlElements = $this->getDataFromFileAsArray($localeStaticFilePath, self::PAGE);
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
        foreach ($redirectDataArray as $redirectData) {
            if ($redirectData[self::FROM_URL] !== null) {
                $this->installRedirect($redirectData[self::FROM_URL], $redirectData[self::TO_URL], $redirectData[self::STATUS]);
            } else {
                $this->warning(sprintf(self::FILE_CONTAINS_INVALID_DATA));
            }
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


//        foreach ($blockDataArray as $blockData) {
//            if ($blockData[self::BLOCK_NAME] !== null) {
//                $this->installBlock($blockData[self::TEMPLATE], $blockData[self::BLOCK_NAME], $blockData[self::PLACEHOLDER], $blockData[self::TRANSLATION]);
//            } else {
//                $this->warning(sprintf(self::FILE_CONTAINS_INVALID_DATA));
//            }
//        }
    }

    /**
     * @param string $filePath
     * @param string $type
     *
     * @return array
     */
    private function getDataFromFileAsArray($filePath, $type)
    {
        $file = $this->getFileName($filePath, $this->dataFileNames[$type]);
        $splFileInfo = new \SplFileInfo($file);

        $xmlContent = file_get_contents($splFileInfo->getPath() . DIRECTORY_SEPARATOR . $splFileInfo->getBasename());
        $xml = new \SimpleXMLElement($xmlContent);

        if ($type === self::PAGE) {
            return $xml->{$type};
        }

        if ($type === self::BLOCK) {
            return $xml->{$type};
        }

        if ($type === self::REDIRECT) {
            return $this->createCmsRedirectsArray($xml->{$type});
        }

        return [];
    }

    /**
     * @param string $blockName
     * @param string $blockType
     * @param string $blockValue
     * @param string $pageTransfer
     *
     * @return CmsBlockTransfer
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
    protected function createCmsBlocksImportArray(\SimpleXMLElement $xmlElement)
    {
        $elementList = [];

        foreach ($xmlElement as $item) {
            $elementList[] = [
                self::TEMPLATE => (string) $item->{self::TEMPLATE},
                self::BLOCK_NAME => (string) $item->{self::BLOCK_NAME},
                self::PLACEHOLDER => (string) $item->{self::PLACEHOLDER},
                self::TRANSLATION => (string) $item->{self::TRANSLATION},
            ];
        }

        return $elementList;
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

}
