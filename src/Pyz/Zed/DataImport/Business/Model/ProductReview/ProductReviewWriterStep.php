<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductReview;

use Orm\Zed\ProductReview\Persistence\Map\SpyProductReviewTableMap;
use Orm\Zed\ProductReview\Persistence\SpyProductReviewQuery;
use Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Shared\ProductReview\ProductReviewConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

class ProductReviewWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface
     */
    protected $localeRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository $productRepository
     * @param \Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface $localeRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param int|null $bulkSize
     */
    public function __construct(ProductRepository $productRepository, LocaleRepositoryInterface $localeRepository, DataImportToTouchInterface $touchFacade, $bulkSize = null)
    {
        parent::__construct($touchFacade, $bulkSize);

        $this->productRepository = $productRepository;
        $this->localeRepository = $localeRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productReviewEntity = SpyProductReviewQuery::create()
            ->filterByCustomerReference($dataSet['customer_reference'])
            ->filterByFkProductAbstract($this->getFkProductAbstract($dataSet))
            ->filterByFkLocale($this->getFkLocale($dataSet))
            ->filterByNickname($dataSet['nickname'])
            ->filterBySummary($dataSet['summary'])
            ->filterByDescription($dataSet['description'])
            ->filterByRating($dataSet['rating'])
            ->findOneOrCreate();

        $productReviewEntity->fromArray($dataSet->getArrayCopy());

        if ($productReviewEntity->isNew() || $productReviewEntity->isModified()) {
            $productReviewEntity->save();

            if ($productReviewEntity->getStatus() === SpyProductReviewTableMap::COL_STATUS_APPROVED) {
                $this->addMainTouchable(ProductReviewConfig::RESOURCE_TYPE_PRODUCT_REVIEW, $productReviewEntity->getIdProductReview());
            }

            $this->addSubTouchable(ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT, $productReviewEntity->getFkProductAbstract());
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return int
     */
    protected function getFkProductAbstract(DataSetInterface $dataSet)
    {
        return $this->productRepository->getIdProductAbstractByAbstractSku($dataSet['abstract_product_sku']);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return int
     */
    protected function getFkLocale(DataSetInterface $dataSet)
    {
        return $this->localeRepository->getIdLocaleByLocale($dataSet['locale_name']);
    }

}
