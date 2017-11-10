<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Controller;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Yves\Kernel\Controller\AbstractController;
use \DOMDocument;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
class IndexController extends AbstractController
{
    const FEATURED_PRODUCT_LIMIT = 6;
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INCREMENTAL;

    /**
     * @return array
     */
    public function indexAction()
    {
        $searchResult = $this->getFactory()
            ->getCatalogClient()
            ->getFeaturedProducts(self::FEATURED_PRODUCT_LIMIT);

        return $this->viewResponse($searchResult);
    }

    public function generateSitemapAction()
    {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $urlSet = $xml->createElement('urlset');
        $urlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $allKeys = $this->getFactory()->getStorageClient()->getAllKeys();
        $config = Config::getInstance();
        foreach ($allKeys as $key) {
            if (preg_match('/\.url\.(\/.+)$/', $key, $matches)) {
                $fullUrl = $config::get(ApplicationConstants::HOST_YVES) . $matches[1];
                $url = $xml->createElement('url');
                $loc = $xml->createElement('loc', htmlspecialchars($fullUrl));
                $url->appendChild($loc);
                $urlSet->appendChild($url);
            }
        }

        $xml->appendChild($urlSet);
        $xml->save(APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'public/Yves/Sitemap.xml');

        return new RedirectResponse('Sitemap.xml');
    }
}
