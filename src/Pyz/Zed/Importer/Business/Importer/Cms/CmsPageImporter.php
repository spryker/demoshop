<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Cms;

use Generated\Shared\Transfer\UrlTransfer;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Pyz\Zed\Cms\Business\CmsFacadeInterface;
use Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Url\Business\UrlFacadeInterface;

class CmsPageImporter extends CmsBlockImporter
{

    /**
     * @var \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface
     */
    protected $urlFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Cms\Business\CmsFacadeInterface $cmsFacade
     * @param \Spryker\Zed\Url\Business\UrlFacadeInterface $urlFacade
     * @param \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface $cmsQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CmsFacadeInterface $cmsFacade,
        UrlFacadeInterface $urlFacade,
        CmsQueryContainerInterface $cmsQueryContainer
    ) {
        parent::__construct(
            $localeFacade,
            $cmsFacade,
            $cmsQueryContainer
        );

        $this->urlFacade = $urlFacade;
    }

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

        $this->publishPage($page, $pageTransfer->getIdCmsPage());
        $this->deactivatePageIfNeeded($page, $pageTransfer->getIdCmsPage());
    }

    /**
     * @param array $page
     * @param int $idCmsPage
     *
     * @return void
     */
    protected function publishPage(array $page, $idCmsPage)
    {
        if (isset($page['publish']) && (bool)$page['publish']) {
            $this->cmsFacade->publishAndVersion($idCmsPage);
        }
    }

    /**
     * @param array $page
     * @param int $idCmsPage
     *
     * @return void
     */
    protected function deactivatePageIfNeeded(array $page, $idCmsPage)
    {
        if (array_key_exists('active', $page) && !(bool)$page['active']) {
            $this->cmsFacade->deactivatePage($idCmsPage);
        }
    }

}
