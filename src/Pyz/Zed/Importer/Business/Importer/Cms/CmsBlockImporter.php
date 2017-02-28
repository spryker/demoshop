<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Cms;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\CmsPageLocalizedAttributesTransfer;
use Generated\Shared\Transfer\CmsTemplateTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageTransfer;
use Orm\Zed\Cms\Persistence\SpyCmsBlockQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Cms\Business\Block\BlockManagerInterface;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use Spryker\Zed\Cms\Business\Page\PageManagerInterface;
use Spryker\Zed\Cms\Business\Template\TemplateManagerInterface;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CmsBlockImporter extends AbstractImporter
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
    const LOCALIZED_ATTRIBUTES = 'localized_attributes';

    const BLOCK_DEMO_TYPE = 'static';
    const BLOCK_DEMO_VALUE = 0;

    /**
     * @var \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface
     */
    protected $cmsQueryContainer;

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
     * @var \Spryker\Zed\Cms\Business\Block\BlockManagerInterface
     */
    protected $blockManager;

    /**
     * @var \Spryker\Zed\Cms\Business\Page\PageManagerInterface
     */
    protected $pageManager;

    /**
     * @var \Spryker\Zed\Cms\Business\Template\TemplateManagerInterface
     */
    protected $templateManager;

    /**
     * @var \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface
     */
    protected $keyMappingManager;

    /**
     * @var array
     */
    protected $templates = [
        'static' => '@Cms/template/static_full_page.twig',
        'quotes' => '@Cms/template/static_quotes_page.twig',
        'quote_block' => '@Cms/template/quotes_block.twig',
    ];

    /**
     * @var array
     */
    protected $templateNames = [
        'static' => 'static full page',
        'quotes' => 'static quotes page',
        'quote_block' => 'quotes block',
    ];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Cms\Business\Block\BlockManagerInterface $blockManager
     * @param \Spryker\Zed\Cms\Business\Page\PageManagerInterface $pageManager
     * @param \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface $keyMappingManager
     * @param \Spryker\Zed\Cms\Business\Template\TemplateManagerInterface $templateManager
     * @param \Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface $glossaryFacade
     * @param \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface $urlFacade
     * @param \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface $cmsQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        BlockManagerInterface $blockManager,
        PageManagerInterface $pageManager,
        GlossaryKeyMappingManagerInterface $keyMappingManager,
        TemplateManagerInterface $templateManager,
        CmsToGlossaryInterface $glossaryFacade,
        CmsToUrlInterface $urlFacade,
        CmsQueryContainerInterface $cmsQueryContainer
    ) {
        parent::__construct($localeFacade);

        $this->blockManager = $blockManager;
        $this->pageManager = $pageManager;
        $this->keyMappingManager = $keyMappingManager;
        $this->templateManager = $templateManager;
        $this->glossaryFacade = $glossaryFacade;
        $this->urlFacade = $urlFacade;
        $this->cmsQueryContainer = $cmsQueryContainer;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Block';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCmsBlockQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $block = $this->format($data);

        $blockName = $block[self::BLOCK_NAME];
        $blockExists = $this->cmsQueryContainer
            ->queryBlockByNameAndTypeValue($blockName, self::BLOCK_DEMO_TYPE, self::BLOCK_DEMO_VALUE)
            ->count() > 0;

        if ($blockExists) {
            return;
        }

        $templateTransfer = $this->findOrCreateTemplate($block[self::TEMPLATE]);
        $pageTransfer = $this->createPage($templateTransfer, $block);

        foreach ($this->localeFacade->getLocaleCollection() as $locale => $localeTransfer) {
            $this->createPlaceholder($block[self::LOCALES][$locale][self::PLACEHOLDERS], $pageTransfer, $localeTransfer);
        }

        $cmsBlockTransfer = $this->buildCmsBlockTransfer($blockName, $pageTransfer);
        $this->blockManager->saveBlockAndTouch($cmsBlockTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
    }

    /**
     * @param string $template
     *
     * @return \Generated\Shared\Transfer\CmsTemplateTransfer
     */
    protected function findOrCreateTemplate($template)
    {
        if ($this->templateManager->hasTemplatePath($this->templates[$template])) {
            return $this->templateManager->getTemplateByPath($this->templates[$template]);
        }

        return $this->templateManager->createTemplate($this->templateNames[$template], $this->templates[$template]);
    }

    /**
     * @param \Generated\Shared\Transfer\CmsTemplateTransfer $templateTransfer
     * @param array $block
     *
     * @return \Generated\Shared\Transfer\PageTransfer
     */
    protected function createPage(CmsTemplateTransfer $templateTransfer, array $block)
    {
        $pageTransfer = new PageTransfer();
        $pageTransfer->setFkTemplate($templateTransfer->getIdCmsTemplate());
        $pageTransfer->setIsActive(true);

        if (isset($block['is_searchable'])) {
            $pageTransfer->setIsSearchable((int)$block['is_searchable']);
        }

        $this->setLocalizedAttributes($pageTransfer, $block);

        return $this->pageManager->savePage($pageTransfer);
    }

    /**
     * @param array $placeholders
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createPlaceholder(array $placeholders, PageTransfer $pageTransfer, LocaleTransfer $localeTransfer)
    {
        foreach ($placeholders['placeholder'] as $placeholder) {
            $this->keyMappingManager->addPlaceholderText(
                $pageTransfer,
                $placeholder[self::NAME],
                $placeholder[self::TRANSLATION],
                $localeTransfer,
                false
            );
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
        $this->pageManager->createPageUrlWithLocale($pageTransfer, $url, $localeTransfer);
        $this->pageManager->touchPageActive($pageTransfer);
    }

    /**
     * @param string $blockName
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer
     */
    protected function buildCmsBlockTransfer($blockName, PageTransfer $pageTransfer)
    {
        $cmsBlockTransfer = new CmsBlockTransfer();
        $cmsBlockTransfer->setName($blockName);
        $cmsBlockTransfer->setType(self::BLOCK_DEMO_TYPE);
        $cmsBlockTransfer->setValue(self::BLOCK_DEMO_VALUE);
        $cmsBlockTransfer->setFkPage($pageTransfer->getIdCmsPage());

        return $cmsBlockTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     * @param array $block
     *
     * @return void
     */
    protected function setLocalizedAttributes(PageTransfer $pageTransfer, array $block)
    {
        foreach ($this->localeFacade->getLocaleCollection() as $locale => $localeTransfer) {
            if (!isset($block[self::LOCALES][$locale][self::LOCALIZED_ATTRIBUTES])) {
                continue;
            }

            $localizedAttributesTransfer = new CmsPageLocalizedAttributesTransfer();
            $localizedAttributesTransfer
                ->fromArray($block[self::LOCALES][$locale][self::LOCALIZED_ATTRIBUTES], true)
                ->setFkLocale($localeTransfer->getIdLocale());

            $pageTransfer->addLocalizedAttribute($localizedAttributesTransfer);
        }
    }

}
