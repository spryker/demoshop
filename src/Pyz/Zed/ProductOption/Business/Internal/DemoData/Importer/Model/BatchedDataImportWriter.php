<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Model;

use Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionType;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValue;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\AbstractBatchProcessor;
use Spryker\Zed\ProductOption\Business\Model\DataImportWriter;

class BatchedDataImportWriter extends DataImportWriter
{

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\AbstractBatchProcessor
     */
    private $batchProcessor;

    /**
     * @param \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface $productFacade
     * @param \Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface $localeFacade
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\AbstractBatchProcessor $batchProcessor
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

    /**
     * @return void
     */
    public function flushBuffer()
    {
        $this->batchProcessor->flush();
    }

    /**
     * @param \Orm\Zed\ProductOption\Persistence\SpyProductOptionType $productOptionTypeEntity
     * @param array $localizedNames
     *
     * @return void
     */
    protected function createOrUpdateOptionTypeTranslations(SpyProductOptionType $productOptionTypeEntity, array $localizedNames)
    {
        if ($productOptionTypeEntity->getIdProductOptionType() === null) {
            $productOptionTypeEntity->save();
        }

        foreach ($localizedNames as $localeName => $localizedOptionTypeName) {
            if ($this->localeFacade->hasLocale($localeName) === false) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_TYPE_TRANSLATION, [
                $localizedOptionTypeName,
                $localeTransfer->getIdLocale(),
                $productOptionTypeEntity->getIdProductOptionType(),
            ]);
        }
    }

    /**
     * @param \Orm\Zed\ProductOption\Persistence\SpyProductOptionValue $productOptionValueEntity
     * @param array $localizedNames
     *
     * @return void
     */
    protected function createOrUpdateOptionValueTranslations(SpyProductOptionValue $productOptionValueEntity, array $localizedNames)
    {
        if ($productOptionValueEntity->getIdProductOptionValue() === null) {
            $productOptionValueEntity->save();
        }

        foreach ($localizedNames as $localeName => $localizedOptionValueName) {
            if ($this->localeFacade->hasLocale($localeName) === false) {
                continue;
            }

            $localeTransfer = $this->localeFacade->getLocale($localeName);

            $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_OPTION_VALUE_TRANSLATION, [
                $localizedOptionValueName,
                $localeTransfer->getIdLocale(),
                $productOptionValueEntity->getIdProductOptionValue(),
            ]);
        }
    }

    /**
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function touchProductAbstractById($idProductAbstract)
    {
        static $touchedIds = [];

        if (in_array($idProductAbstract, $touchedIds)) {
            return;
        }

        $this->batchProcessor->addValues(AbstractBatchProcessor::CACHE_KEY_TOUCH, [
             '0',
            'product_abstract',
            $idProductAbstract,
            (new \DateTime())->format('Y-m-d H:i:s'),
        ]);

        $touchedIds[] = $idProductAbstract;
    }

    /**
     * @param string $concreteSku
     *
     * @return void
     */
    protected function touchProductAbstractByConcreteSku($concreteSku)
    {
        $idProductAbstract = $this->productFacade->getProductAbstractIdByConcreteSku($concreteSku);
        $this->touchProductAbstractById($idProductAbstract);
    }

}
