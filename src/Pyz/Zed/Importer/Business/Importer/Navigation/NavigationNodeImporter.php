<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Navigation;

use Generated\Shared\Transfer\NavigationNodeLocalizedAttributesTransfer;
use Generated\Shared\Transfer\NavigationNodeTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use Orm\Zed\Navigation\Persistence\SpyNavigationNodeQuery;
use Orm\Zed\Navigation\Persistence\SpyNavigationQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Navigation\Business\NavigationFacadeInterface;
use Spryker\Zed\Url\Business\UrlFacadeInterface;

class NavigationNodeImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\Navigation\Business\NavigationFacadeInterface
     */
    protected $navigationFacade;

    /**
     * @var \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @var
     */
    protected $navigationKeyCache;

    /**
     * @var array
     */
    protected $navigationNodeKeyCache = [];

    /**
     * @var array
     */
    protected $availableLocales;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Navigation\Business\NavigationFacadeInterface $navigationFacade
     * @param \Spryker\Zed\Url\Business\UrlFacadeInterface $urlFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade, NavigationFacadeInterface $navigationFacade, UrlFacadeInterface $urlFacade)
    {
        parent::__construct($localeFacade);

        $this->navigationFacade = $navigationFacade;
        $this->urlFacade = $urlFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Navigation nodes';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyNavigationNodeQuery::create();

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (empty($data)) {
            return;
        }

        $navigationNodeTransfer = new NavigationNodeTransfer();
        $navigationNodeTransfer
            ->setFkNavigation($this->getIdNavigationByKey($data['navigation_key']))
            ->setNodeType($data['node_type'])
            ->setFkParentNavigationNode($this->getIdParentNavigationNode($data))
            ->setIsActive(true);

        $navigationNodeTransfer = $this->setLocalizedAttributes($data, $navigationNodeTransfer);

        $navigationNodeTransfer = $this->navigationFacade->createNavigationNode($navigationNodeTransfer);

        $this->navigationNodeKeyCache[$data['node_key']] = $navigationNodeTransfer->getIdNavigationNode();
    }

    /**
     * @param string $navigationKey
     *
     * @return int
     */
    protected function getIdNavigationByKey($navigationKey)
    {
        if ($this->navigationKeyCache === null) {
            $this->navigationKeyCache = $this->loadNavigationKeyCache();
        }

        return $this->navigationKeyCache[$navigationKey];
    }

    /**
     * @return array
     */
    protected function loadNavigationKeyCache()
    {
        $navigationKeyCache = [];
        $navigationQuery = SpyNavigationQuery::create();

        foreach ($navigationQuery->find() as $navigationEntity) {
            $navigationKeyCache[$navigationEntity->getKey()] = $navigationEntity->getIdNavigation();
        }

        return $navigationKeyCache;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\NavigationNodeTransfer $navigationNodeTransfer
     *
     * @return \Generated\Shared\Transfer\NavigationNodeTransfer
     */
    protected function setLocalizedAttributes(array $data, NavigationNodeTransfer $navigationNodeTransfer)
    {
        foreach ($this->getAvailableLocales() as $idLocale => $localeName) {
            if (!isset($data['title.' . $localeName])) {
                continue;
            }

            $navigationNodeLocalizedAttributeTransfer = (new NavigationNodeLocalizedAttributesTransfer())
                ->setFkLocale($idLocale)
                ->setTitle($data['title.' . $localeName]);

            switch($data['node_type']) {
                case 'category':
                case 'cms_page':
                    $navigationNodeLocalizedAttributeTransfer->setFkUrl($this->findIdUrlByUrl($data['url.' . $localeName]));
                    break;
                case 'external_url':
                    $navigationNodeLocalizedAttributeTransfer->setExternalUrl($data['url.' . $localeName]);
                    break;
            }

            $navigationNodeTransfer->addNavigationNodeLocalizedAttribute($navigationNodeLocalizedAttributeTransfer);
        }

        return $navigationNodeTransfer;
    }

    /**
     * @return array
     */
    protected function getAvailableLocales()
    {
        if ($this->availableLocales === null) {
            $this->availableLocales = $this->localeFacade->getAvailableLocales();
        }

        return $this->availableLocales;
    }

    /**
     * @param string $url
     *
     * @return int
     */
    protected function findIdUrlByUrl($url)
    {
        $urlTransfer = new UrlTransfer();
        $urlTransfer->setUrl($url);

        return $this->urlFacade
            ->findUrl($urlTransfer)
            ->getIdUrl();
    }

    /**
     * @param array $data
     *
     * @return int|null
     */
    protected function getIdParentNavigationNode(array $data)
    {
        if (!$data['parent']) {
            return null;
        }

        return $this->navigationNodeKeyCache[$data['parent']];
    }

}
