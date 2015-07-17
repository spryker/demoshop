<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Model;

use SprykerFeature\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionType;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionValue;
use SprykerFeature\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use SprykerFeature\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\AbstractBatchProcessor;
use SprykerFeature\Zed\ProductOption\Business\Model\DataImportWriter;

class BatchedDataImportWriter extends DataImportWriter
{

    /**
     * @var AbstractBatchProcessor
     */
    private $batchProcessor;

    /**
     * @param ProductOptionQueryContainerInterface $queryContainer
     * @param ProductOptionToProductInterface $productFacade
     * @param ProductOptionToLocaleInterface $localeFacade
     * @param AbstractBatchProcessor $batchProcessor
     */
    public function __construct(
        ProductOptionQueryContainerInterface $queryContainer,
        ProductOptionToProductInterface $productFacade,
        ProductOptionToLocaleInterface $localeFacade,
        AbstractBatchProcessor $batchProcessor
    ) {
        parent::__construct(
            $queryContainer,
            $productFacade,
            $localeFacade
        );

        $this->batchProcessor = $batchProcessor;
    }

    public function flushBuffer()
    {
        $this->batchProcessor->flush();
    }

    /**
     * @param SpyProductOptionType $productOptionTypeEntity
     * @param array $localizedNames
     */
    protected function createOrUpdateOptionTypeTranslations(SpyProductOptionType $productOptionTypeEntity, array $localizedNames)
    {
        foreach ($localizedNames as $localeName => $localizedOptionTypeName) {

            if (false === $this->localeFacade->hasLocale($localeName)) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_TYPE_TRANSLATION, [
                $localizedOptionTypeName,
                $localeTransfer->getIdLocale(),
                $productOptionTypeEntity->getIdProductOptionType()
            ]);
        }
    }

    /**
     * @param SpyProductOptionValue $productOptionValueEntity
     * @param array $localizedNames
     */
    protected function createOrUpdateOptionValueTranslations(SpyProductOptionValue $productOptionValueEntity, array $localizedNames)
    {
        foreach ($localizedNames as $localeName => $localizedOptionValueName) {

            if (false === $this->localeFacade->hasLocale($localeName)) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_VALUE_TRANSLATION, [
                $localizedOptionValueName,
                $localeTransfer->getIdLocale(),
                $productOptionValueEntity->getIdProductOptionValue()
            ]);
        }
    }

    /**
     * @param int $idAbstractProduct
     */
    protected function touchAbstractProductById($idAbstractProduct)
    {
        static $touchedIds = [];

        if (in_array($idAbstractProduct, $touchedIds)) {
            return;
        }

        $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_TOUCH, [
             '0',
            'abstract_product',
            $idAbstractProduct,
            (new \DateTime)->format('Y-m-d H:i:s')
        ]);

        $touchedIds[] = $idAbstractProduct;
    }

    /**
     * @param string $concreteSku
     */
    protected function touchAbstractProductByConcreteSku($concreteSku)
    {
        $idAbstractProduct = $this->productFacade->getAbstractProductIdByConcreteSku($concreteSku);
        $this->touchAbstractProductById($idAbstractProduct);
    }
}
