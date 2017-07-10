<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductManagement;

use Generated\Shared\Transfer\LocalizedProductManagementAttributeKeyTransfer;
use Generated\Shared\Transfer\ProductManagementAttributeTransfer;
use Generated\Shared\Transfer\ProductManagementAttributeValueTransfer;
use Generated\Shared\Transfer\ProductManagementAttributeValueTranslationTransfer;
use Orm\Zed\ProductAttribute\Persistence\SpyProductManagementAttributeQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductManagement\Business\ProductManagementFacadeInterface;

class ProductManagementAttributeImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\ProductManagement\Business\ProductManagementFacadeInterface
     */
    protected $productManagementFacade;

    /**
     * @var array
     */
    protected $availableLocales;

    /**
     * @param \Spryker\Zed\ProductManagement\Business\ProductManagementFacadeInterface $productManagementFacade
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     */
    public function __construct(ProductManagementFacadeInterface $productManagementFacade, LocaleFacadeInterface $localeFacade)
    {
        parent::__construct($localeFacade);

        $this->productManagementFacade = $productManagementFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Management Attributes';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductManagementAttributeQuery::create();

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

        $productManagementAttributeTransfer = $this->createAttributeTransfer($data);

        $this->productManagementFacade->createProductManagementAttribute($productManagementAttributeTransfer);
        $this->productManagementFacade->translateProductManagementAttribute($productManagementAttributeTransfer);
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
     * @return \Generated\Shared\Transfer\ProductManagementAttributeTransfer
     */
    protected function createAttributeTransfer(array $data)
    {
        $productManagementAttributeTransfer = (new ProductManagementAttributeTransfer())
            ->setKey($data['key'])
            ->setInputType($data['input_type'])
            ->setAllowInput($data['allow_input']);

        $this->addAttributeKeyTranslations($data, $productManagementAttributeTransfer);

        if (isset($data['values'])) {
            $this->addAttributeValues($data, $productManagementAttributeTransfer);
        }

        return $productManagementAttributeTransfer;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\ProductManagementAttributeTransfer $productManagementAttributeTransfer
     *
     * @return void
     */
    protected function addAttributeKeyTranslations(array $data, ProductManagementAttributeTransfer $productManagementAttributeTransfer)
    {
        foreach ($this->getAvailableLocales() as $localeName) {
            if (isset($data['key.' . $localeName])) {
                $localizedAttributeKeyTransfer = (new LocalizedProductManagementAttributeKeyTransfer())
                    ->setLocaleName($localeName)
                    ->setKeyTranslation($data['key.' . $localeName]);

                $productManagementAttributeTransfer->addLocalizedKey($localizedAttributeKeyTransfer);
            }
        }
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\ProductManagementAttributeTransfer $productManagementAttributeTransfer
     *
     * @return void
     */
    protected function addAttributeValues(array $data, ProductManagementAttributeTransfer $productManagementAttributeTransfer)
    {
        $valueTranslationTransfers = $this->getValueTranslations($data);

        $values = explode(',', $data['values']);
        foreach ($values as $index => $value) {
            $valueTransfer = (new ProductManagementAttributeValueTransfer())
                ->setValue(trim($value));

            foreach ($valueTranslationTransfers as $valueTranslationTransfer) {
                if (isset($valueTranslationTransfer[$index])) {
                    $valueTransfer->addLocalizedValue($valueTranslationTransfer[$index]);
                }
            }

            $productManagementAttributeTransfer->addValue($valueTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function getValueTranslations(array $data)
    {
        $valueTranslationTransfers = [];

        foreach ($this->getAvailableLocales() as $idLocale => $localeName) {
            if (isset($data['values.' . $localeName])) {
                $valueTranslations = explode(',', $data['values.' . $localeName]);
                foreach ($valueTranslations as $valueTranslation) {
                    $localizedAttributeKeyTransfer = (new ProductManagementAttributeValueTranslationTransfer())
                        ->setFkLocale($idLocale)
                        ->setTranslation(trim($valueTranslation));

                    $valueTranslationTransfers[$idLocale][] = $localizedAttributeKeyTransfer;
                }
            }
        }

        return $valueTranslationTransfers;
    }

}
