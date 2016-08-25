<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchImporter extends AbstractImporter
{

    const PRODUCT_ID = 'id_product';

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductSearchFacadeInterface $productSearchFacade
    ) {
        parent::__construct($localeFacade);

        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductSearchQuery::create();

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $this->productSearchFacade
            ->activateProductSearch($data[self::PRODUCT_ID], $this->localeFacade->getLocaleCollection());
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

}
