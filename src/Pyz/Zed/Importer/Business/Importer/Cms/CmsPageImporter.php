<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Cms;

use Generated\Shared\Transfer\UrlTransfer;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;

class CmsPageImporter extends CmsBlockImporter
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Page';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCmsPageQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $page = $this->format($data);
        $templateTransfer = $this->findOrCreateTemplate($page[self::TEMPLATE]);

        $pageTransfer = $this->createPage($templateTransfer, $page);

        foreach ($this->localeFacade->getLocaleCollection() as $locale => $localeTransfer) {
            $urlTransfer = new UrlTransfer();
            $urlTransfer->setUrl($page[self::LOCALES][$locale][self::URL]);

            if ($this->urlFacade->hasUrl($urlTransfer)) {
                return;
            }

            $placeholders = $page[self::LOCALES][$locale][self::PLACEHOLDERS];

            $this->createPageUrl($pageTransfer, $urlTransfer->getUrl(), $localeTransfer);
            $this->createPlaceholder($placeholders, $pageTransfer, $localeTransfer);
        }
    }

}
