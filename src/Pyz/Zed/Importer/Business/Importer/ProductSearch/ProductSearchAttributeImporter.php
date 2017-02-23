<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductSearch;

use Generated\Shared\Transfer\LocalizedProductSearchAttributeKeyTransfer;
use Generated\Shared\Transfer\ProductSearchAttributeTransfer;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchAttributeQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchAttributeImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @var array
     */
    protected $availableLocales;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     */
    public function __construct(ProductSearchFacadeInterface $productSearchFacade, LocaleFacadeInterface $localeFacade)
    {
        parent::__construct($localeFacade);

        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search Attributes';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductSearchAttributeQuery::create();

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

        $productSearchAttributeTransfer = $this->createAttributeTransfer($data);

        $this->productSearchFacade->createProductSearchAttribute($productSearchAttributeTransfer);
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
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductSearchAttributeTransfer
     */
    protected function createAttributeTransfer(array $data)
    {
        $productSearchAttributeTransfer = (new ProductSearchAttributeTransfer())
            ->setKey($data['key'])
            ->setFilterType($data['filter_type'])
            ->setPosition($data['position']);

        $this->addAttributeKeyTranslations($data, $productSearchAttributeTransfer);

        return $productSearchAttributeTransfer;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\ProductSearchAttributeTransfer $productSearchAttributeTransfer
     *
     * @return void
     */
    protected function addAttributeKeyTranslations(array $data, ProductSearchAttributeTransfer $productSearchAttributeTransfer)
    {
        foreach ($this->getAvailableLocales() as $localeName) {
            if (isset($data['key.' . $localeName])) {
                $localizedAttributeKeyTransfer = (new LocalizedProductSearchAttributeKeyTransfer())
                    ->setLocaleName($localeName)
                    ->setKeyTranslation($data['key.' . $localeName]);

                $productSearchAttributeTransfer->addLocalizedKey($localizedAttributeKeyTransfer);
            }
        }
    }

}
