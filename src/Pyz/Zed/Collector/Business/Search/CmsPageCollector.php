<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Search;

use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;

use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Collector\Business\Collector\Search\AbstractSearchPdoCollector;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Search\Business\SearchFacadeInterface;
use Spryker\Zed\Search\Dependency\Plugin\PageMapInterface;

class CmsPageCollector extends AbstractSearchPdoCollector
{

    /**
     * @var \Spryker\Zed\Search\Dependency\Plugin\PageMapInterface
     */
    protected $cmsPageDataPageMapPlugin;

    /**
     * @var \Spryker\Zed\Search\Business\SearchFacadeInterface
     */
    protected $searchFacade;

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\Search\Dependency\Plugin\PageMapInterface $cmsPageDataPageMapPlugin
     * @param \Spryker\Zed\Search\Business\SearchFacadeInterface $searchFacade
     */
    public function __construct(
        UtilDataReaderServiceInterface $utilDataReaderService,
        PageMapInterface $cmsPageDataPageMapPlugin,
        SearchFacadeInterface $searchFacade
    ) {
        parent::__construct($utilDataReaderService);

        $this->cmsPageDataPageMapPlugin = $cmsPageDataPageMapPlugin;
        $this->searchFacade = $searchFacade;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CmsConstants::RESOURCE_TYPE_PAGE;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $result = $this
            ->searchFacade
            ->transformPageMapToDocument($this->cmsPageDataPageMapPlugin, $collectItemData, $this->locale);

        $result = $this->addExtraCollectorFields($result, $collectItemData);

        return $result;
    }

    /**
     * @param array $result
     * @param array $collectItemData
     *
     * @return array
     */
    protected function addExtraCollectorFields(array $result, array $collectItemData)
    {
        $result[CollectorConfig::COLLECTOR_TOUCH_ID] = $collectItemData[CollectorConfig::COLLECTOR_TOUCH_ID];
        $result[CollectorConfig::COLLECTOR_RESOURCE_ID] = $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID];
        $result[CollectorConfig::COLLECTOR_SEARCH_KEY] = $collectItemData[CollectorConfig::COLLECTOR_SEARCH_KEY];

        return $result;
    }

}
