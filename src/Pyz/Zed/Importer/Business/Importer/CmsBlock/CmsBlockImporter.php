<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\CmsBlock;

use Generated\Shared\Transfer\CmsBlockGlossaryPlaceholderTransfer;
use Generated\Shared\Transfer\CmsBlockGlossaryPlaceholderTranslationTransfer;
use Generated\Shared\Transfer\CmsBlockGlossaryTransfer;
use Generated\Shared\Transfer\CmsBlockTransfer;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\CmsBlock\Business\CmsBlockFacadeInterface;
use Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CmsBlockImporter extends AbstractImporter
{

    const FIELD_BLOCK_NAME = 'block_name';
    const FIELD_TEMPLATE_NAME = 'template_name';
    const FIELD_TEMPLATE_PATH = 'template_path';
    const FIELD_ACTIVE = 'active';
    const FIELD_CATEGORIES = 'categories';
    const FIELD_PRODUCTS = 'products';

    const FIELD_PREFIX_PLACEHOLDER = 'placeholder';
    const FIELD_PLACEHOLDER_TITLE_DE_ = 'placeholder.title.de_DE';
    const FIELD_PLACEHOLDER_TITLE_EN = 'placeholder.title.en_US';
    const FIELD_PLACEHOLDER_DESCRIPTION_DE = 'placeholder.description.de_DE';
    const FIELD_PLACEHOLDER_DESCRIPTION_EN = 'placeholder.description.en_US';

    /**
     * @var \Spryker\Zed\CmsBlock\Business\CmsBlockFacadeInterface
     */
    protected $cmsBlockFacade;

    /**
     * @var \Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface
     */
    protected $cmsBlockQueryContainer;

    /**
     * @var array
     */
    protected $placeholdersToImport = [
        'title',
        'description',
    ];

    /**
     * @var array
     */
    protected $placeholderLocalesToImport = [
        'de_DE' => null,
        'en_US' => null,
    ];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\CmsBlock\Business\CmsBlockFacadeInterface $cmsBlockFacade
     * @param \Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface $cmsBlockQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CmsBlockFacadeInterface $cmsBlockFacade,
        CmsBlockQueryContainerInterface $cmsBlockQueryContainer
    ) {
        parent::__construct($localeFacade);

        $this->cmsBlockFacade = $cmsBlockFacade;
        $this->cmsBlockQueryContainer = $cmsBlockQueryContainer;
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
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Block';
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $cmsBlockTemplateTransfer = $this->createCmsBlockTemplate($data);

        $cmsBlockTransfer = new CmsBlockTransfer();
        $cmsBlockTransfer->setName($data[static::FIELD_BLOCK_NAME]);
        $cmsBlockTransfer->setFkTemplate($cmsBlockTemplateTransfer->getIdCmsBlockTemplate());
        $cmsBlockTransfer->setIsActive((bool)$data[static::FIELD_ACTIVE]);

        $categories = explode(',', $data[static::FIELD_CATEGORIES]);
        $categories = array_filter($categories);
        $cmsBlockTransfer->setIdCategories($categories);

        $products = explode(',', $data[static::FIELD_PRODUCTS]);
        $products = array_filter($products);
        $cmsBlockTransfer->setIdProductAbstracts($products);

        $this->cmsBlockFacade->createCmsBlock($cmsBlockTransfer);

        foreach (array_keys($this->placeholderLocalesToImport) as $localeName) {
            $locale = $this->localeFacade->getLocale($localeName);

            if (!$locale) {
                return;
            }

            $this->placeholderLocalesToImport[$localeName] = $locale;

        }

        $glossary = new CmsBlockGlossaryTransfer();

        foreach ($this->placeholdersToImport as $placeholderName) {
            $placeholder = new CmsBlockGlossaryPlaceholderTransfer();
            $placeholder->setFkCmsBlock($cmsBlockTransfer->getIdCmsBlock());
            $placeholder->setTemplateName($data[static::FIELD_TEMPLATE_NAME]);
            $placeholder->setPlaceholder($placeholderName);

            /** @var \Generated\Shared\Transfer\LocaleTransfer $locale */
            foreach ($this->placeholderLocalesToImport as $locale) {
                $translation = new CmsBlockGlossaryPlaceholderTranslationTransfer();
                $translation->setFkLocale($locale->getIdLocale());
                $translation->setLocaleName($locale->getLocaleName());
                $translation->setTranslation($data[static::FIELD_PREFIX_PLACEHOLDER . '.' . $placeholderName . '.' . $locale->getLocaleName()]);
                $placeholder->addTranslation($translation);
            }

            $glossary->addGlossaryPlaceholder($placeholder);
        }

        $this->cmsBlockFacade->saveGlossary($glossary);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CmsBlockTemplateTransfer
     */
    protected function createCmsBlockTemplate(array $data)
    {
        $cmsBlockTemplateTransfer = $this->cmsBlockFacade->findTemplate($data[static::FIELD_TEMPLATE_PATH]);

        if (!$cmsBlockTemplateTransfer) {
            $cmsBlockTemplateTransfer = $this->cmsBlockFacade->createTemplate($data[static::FIELD_TEMPLATE_NAME], $data[static::FIELD_TEMPLATE_PATH]);
        }

        return $cmsBlockTemplateTransfer;
    }

}
