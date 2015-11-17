<?php

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\CmsTemplateTransfer;
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
                $this->installPageFromDemoDataFile($demoDataFile);
                $this->installRedirectFromDemoDataFile($demoDataFile);
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
     * @param string $templateName
     * @param string $templatePath
     *
     * @return CmsTemplateTransfer
     */
    private function getOrCreateTemplateByPath($templateName, $templatePath)
    {
        if ($this->templateManager->hasTemplatePath($templatePath)) {
            return $this->templateManager->getTemplateByPath($templatePath);
        }

        return $this->templateManager->createTemplate(
            $templateName,
            $templatePath
        );
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
     * @param string $template
     * @param string $url
     * @param string $placeholder
     * @param string $translation
     */
    private function installPage($template, $url, $placeholder, $translation)
    {
        if ($this->urlFacade->hasUrl($url)) {
            $this->warning(sprintf('Page with URL %s already exists. Skipping.', $url));

            return;
        }

        $templateTransfer = $this->getOrCreateTemplate($template);
        $pageTransfer = $this->createPage($templateTransfer);
        $this->keyMappingManager->addPlaceholderText($pageTransfer, $placeholder, $translation);
        $urlTransfer = $this->pageManager->createPageUrl($pageTransfer, $url);

        $this->pageManager->touchPageActive($pageTransfer);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
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
            )
        ;
    }

    /**
     * @param string $template
     * @param string $blockName
     * @param string $placeholder
     * @param string $translation
     */
    private function installBlock($template, $blockName, $placeholder, $translation)
    {
        if ($this->cmsQueryContainer->queryBlockByNameAndTypeValue($blockName, $this->blockDemoType, $this->blockDemoValue)->count() > 0) {
            $this->warning(sprintf('Block with Name %s already exists. Skipping.', $blockName));

            return;
        }

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
        $pageDataArray = $this->getDataFromFileAsArray($localeStaticFilePath, self::PAGE);
        $pagesList = $this->formatCmsPagesImportArray($pageDataArray);
        foreach ($pagesList as $pageData) {
            if ($pageData[self::TEMPLATE] !== null) {
                $this->installPage(
                    $pageData[self::TEMPLATE],
                    $pageData[self::URL],
                    $pageData[self::PLACEHOLDER],
                    $pageData[self::TRANSLATION]
                );
            } else {
                $this->warning(sprintf(self::FILE_CONTAINS_INVALID_DATA));
            }
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
        $blockDataArray = $this->getDataFromFileAsArray($filePath, self::BLOCK);
        foreach ($blockDataArray as $blockData) {
            if ($blockData[self::BLOCK_NAME] !== null) {
                $this->installBlock($blockData[self::TEMPLATE], $blockData[self::BLOCK_NAME], $blockData[self::PLACEHOLDER], $blockData[self::TRANSLATION]);
            } else {
                $this->warning(sprintf(self::FILE_CONTAINS_INVALID_DATA));
            }
        }
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

        return $xml;
    }

    /**
     * @param $blockName
     * @param $pageTransfer
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
     * @param array $dataArray
     *
     * @return array
     */
    protected function formatCmsPagesImportArray($dataArray)
    {
        $elementList = [];

        foreach ($dataArray as $item) {
            $elementList[] = [
                self::TEMPLATE => (string) $item->{self::TEMPLATE},
                self::URL => (string) $item->{self::URL},
                self::PLACEHOLDER => (string) $item->{self::PLACEHOLDER},
                self::TRANSLATION => (string) $item->{self::TRANSLATION},
            ];
        }

        return $elementList;
    }

}
