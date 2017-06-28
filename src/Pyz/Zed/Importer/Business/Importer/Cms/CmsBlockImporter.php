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
use Pyz\Zed\Cms\Business\CmsFacadeInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

/**
 * @deprecated Use CMS Block Module
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
    const TEMPLATE_ATTRIBUTE_NAME = 'name';
    const TEMPLATE_ATTRIBUTE_PATH = 'path';
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
     * @var \Spryker\Zed\Locale\Business\LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var \Pyz\Zed\Cms\Business\CmsFacadeInterface
     */
    protected $cmsFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Cms\Business\CmsFacadeInterface $cmsFacade
     * @param \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface $cmsQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CmsFacadeInterface $cmsFacade,
        CmsQueryContainerInterface $cmsQueryContainer
    ) {
        parent::__construct($localeFacade);

        $this->cmsFacade = $cmsFacade;
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
        return true;
    }

    /**
     * @deprecated
     *
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
    }

    /**
     * @param array $template
     *
     * @return \Generated\Shared\Transfer\CmsTemplateTransfer
     */
    protected function findOrCreateTemplate(array $template)
    {
        if ($this->cmsFacade->hasTemplate($template[static::TEMPLATE_ATTRIBUTE_PATH])) {
            return $this->cmsFacade->getTemplate($template[static::TEMPLATE_ATTRIBUTE_PATH]);
        }

        return $this->cmsFacade->createTemplate($template[static::TEMPLATE_ATTRIBUTE_NAME], $template[static::TEMPLATE_ATTRIBUTE_PATH]);
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

        return $this->cmsFacade->savePage($pageTransfer);
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
            $this->cmsFacade->addPlaceholderText(
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
        $this->cmsFacade->createPageUrlWithLocale($pageTransfer, $url, $localeTransfer);
        $this->cmsFacade->touchPageActive($pageTransfer);
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
