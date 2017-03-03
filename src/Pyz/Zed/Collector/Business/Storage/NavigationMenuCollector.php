<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\NavigationTransfer;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Shared\KeyBuilder\KeyBuilderInterface;
use Spryker\Shared\Navigation\NavigationConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Navigation\Business\NavigationFacadeInterface;

class NavigationMenuCollector extends AbstractStoragePdoCollector
{

    /**
     * @var \Spryker\Zed\Navigation\Business\NavigationFacadeInterface
     */
    protected $navigationFacade;

    /**
     * @var \Spryker\Shared\KeyBuilder\KeyBuilderInterface
     */
    protected $keyBuilder;

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Shared\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @param \Spryker\Zed\Navigation\Business\NavigationFacadeInterface $navigationFacade
     */
    public function __construct(UtilDataReaderServiceInterface $utilDataReaderService, KeyBuilderInterface $keyBuilder, NavigationFacadeInterface $navigationFacade)
    {
        parent::__construct($utilDataReaderService);

        $this->navigationFacade = $navigationFacade;
        $this->keyBuilder = $keyBuilder;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return NavigationConfig::RESOURCE_TYPE_NAVIGATION_MENU;
    }

    /**
     * @param mixed $data
     * @param string $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        return $this->keyBuilder->generateKey($collectedItemData['key'], $localeName);
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $navigationTransfer = new NavigationTransfer();
        $navigationTransfer->setIdNavigation($collectItemData['id_navigation']);

        $navigationTransfer = $this->navigationFacade->findNavigationTree($navigationTransfer, $this->locale);

        return $navigationTransfer->toArray();
    }

}
