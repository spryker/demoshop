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
use SprykerFeature\Zed\Product\Business\Importer\Reader\File\CsvReader;

class CmsInstall extends AbstractInstaller
{
    const URL              = 'url';
    const FROM_URL         = 'fromUrl';
    const TO_URL           = 'toUrl';
    const STATUS           = 'status';
    const BLOCK_NAME       = 'blockName';
    const PLACEHOLDER      = 'placeholder';
    const TRANSLATION      = 'translation';
    const TEMPLATE         = 'template';
    const TEMPLATE_PATH    = 'template_path';
    const PAGE             = 'page';
    const REDIRECT         = 'redirect';
    const BLOCK            = 'block';
    const BLOCK_TYPE       = 'type';
    const BLOCK_TYPE_VALUE = 'value';
    const CATEGORY         = 'category';

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
     * @param CmsToGlossaryInterface             $glossaryFacade
     * @param CmsToUrlInterface                  $urlFacade
     * @param CmsToLocaleInterface               $localeFacade
     * @param TemplateManagerInterface           $templateManager
     * @param PageManagerInterface               $pageManager
     * @param GlossaryKeyMappingManagerInterface $keyMappingManager
     * @param BlockManagerInterface              $blockManager
     * @param CmsQueryContainerInterface         $cmsQueryContainer
     * @param CmsConfig                          $config
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
        $this->glossaryFacade    = $glossaryFacade;
        $this->urlFacade         = $urlFacade;
        $this->localeFacade      = $localeFacade;
        $this->templateManager   = $templateManager;
        $this->pageManager       = $pageManager;
        $this->keyMappingManager = $keyMappingManager;
        $this->blockManager      = $blockManager;
        $this->cmsQueryContainer = $cmsQueryContainer;

        $this->filePath      = $config->getDemoDataPath();
        $this->templates     = $config->getDemoDataTemplates();
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
            $demoDataFile = $this->filePath.'/'.$locale;
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
        return $localeStaticFilePath.'/'.$fileName;
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
        $pageTransfer     = $this->createPage($templateTransfer);
        $this->keyMappingManager->addPlaceholderText($pageTransfer, $placeholder, $translation);
        $urlTransfer = $this->pageManager->createPageUrl($pageTransfer, $url);

        $this->pageManager->touchPageActive($pageTransfer);
        $this->urlFacade->touchUrlActive($urlTransfer->getIdUrl());
    }

    /**
     * @param string $fromUrl
     * @param string $toUrl
     * @param int    $status
     */
    private function installRedirect($fromUrl, $toUrl, $status)
    {
        if ($this->urlFacade->hasUrl($fromUrl)) {
            $this->warning(sprintf('Redirect with URL %s already exists. Skipping.', $fromUrl));

            return;
        }

        $redirectTransfer = $this->urlFacade->createRedirectAndTouch($toUrl, $status);

        $this->urlFacade
            ->saveRedirectUrlAndTouch($fromUrl, $this->localeFacade
                ->getCurrentLocale(), $redirectTransfer->getIdRedirect())
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

        $placeholders     = explode('_', $placeholder);
        $translations     = explode('_', $translation);
        $templateTransfer = $this->getOrCreateTemplate($template);
        $pageTransfer     = $this->createPage($templateTransfer);

        foreach ($placeholders as $key => $value) {
            $this->keyMappingManager->addPlaceholderText($pageTransfer, $value, $translations[$key]);
        }

        $cmsBlockTransfer = $this->createCmsBlockTransfer($blockName, $this->blockDemoType, $this->blockDemoValue, $pageTransfer);
        $this->blockManager->saveBlockAndTouch($cmsBlockTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
    }

    /**
     * @param string $template
     * @param string $template_path
     * @param string $blockName
     * @param string $blockType
     * @param int    $blockValue
     * @param string $placeholder
     * @param string $translation
     */
    private function installKamBlock($template, $template_path, $blockName, $blockType, $blockValue, $placeholder, $translation)
    {
        if ($blockType === self::CATEGORY) {
            $urlTransfer = $this->cmsQueryContainer->queryUrlByPath($blockValue)->findOne();
            if (null !== $urlTransfer) {
                $blockValue = $urlTransfer->getFkResourceCategorynode();
            } else {
                $this->warning(sprintf('%s Category for block %s not found. Skipping.', $blockValue, $blockName));

                return;
            }
        } else {
            $blockValue = 0;
        }

        if ($this->cmsQueryContainer->queryBlockByNameAndTypeValue($blockName, $blockType, $blockValue)->count() > 0) {
            $this->warning(sprintf('Block with Name %s already exists. Skipping.', $blockName));

            return;
        }

        $placeholders     = explode('$', $placeholder);
        $translations     = explode('$', $translation);
        $templateTransfer = $this->getOrCreateTemplateByPath($template, $template_path);
        $pageTransfer     = $this->createPage($templateTransfer);
        foreach ($placeholders as $key => $value) {
            $this->keyMappingManager->addPlaceholderText($pageTransfer, $value, base64_decode($translations[$key]));
        }

        $cmsBlockTransfer = $this->createCmsBlockTransfer($blockName, $blockType, $blockValue, $pageTransfer);
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
        foreach ($pageDataArray as $pageData) {
            if (null !== $pageData[self::TEMPLATE]) {
                $this->installPage($pageData[self::TEMPLATE], $pageData[self::URL], $pageData[self::PLACEHOLDER], $pageData[self::TRANSLATION]);
            } else {
                $this->warning(sprintf('CSV file contains invalid data.'));
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
            if (null !== $redirectData[self::FROM_URL]) {
                $this->installRedirect($redirectData[self::FROM_URL], $redirectData[self::TO_URL], $redirectData[self::STATUS]);
            } else {
                $this->warning(sprintf('CSV file contains invalid data.'));
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
            if (null !== $blockData[self::BLOCK_NAME]) {
                $this->installBlock($blockData[self::TEMPLATE], $blockData[self::BLOCK_NAME], $blockData[self::PLACEHOLDER], $blockData[self::TRANSLATION]);
            } else {
                $this->warning(sprintf('CSV file contains invalid data.'));
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
        $file        = $this->getFileName($filePath, $this->dataFileNames[$type]);
        $splFileInfo = new \SplFileInfo($file);
        $dataArray   = (new CsvReader())->getArrayFromFile($splFileInfo);

        return $dataArray;
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
}
