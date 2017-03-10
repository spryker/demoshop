<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Navigation;

use Generated\Shared\Transfer\NavigationTransfer;
use Orm\Zed\Navigation\Persistence\SpyNavigationQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Navigation\Business\NavigationFacadeInterface;

class NavigationImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\Navigation\Business\NavigationFacadeInterface
     */
    protected $navigationFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Navigation\Business\NavigationFacadeInterface $navigationFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade, NavigationFacadeInterface $navigationFacade)
    {
        parent::__construct($localeFacade);

        $this->navigationFacade = $navigationFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Navigation';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyNavigationQuery::create();

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

        $navigationTransfer = new NavigationTransfer();
        $navigationTransfer->fromArray($data, true);

        $this->navigationFacade->createNavigation($navigationTransfer);
    }

}
