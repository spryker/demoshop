<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\GiftCard;

use Orm\Zed\GiftCard\Persistence\SpyGiftCardProductConfigurationLinkQuery;
use Orm\Zed\GiftCard\Persistence\SpyGiftCardProductConfigurationQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class GiftCardConcreteConfigurationWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Concrete Gift-Card Configurations';
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $value = $dataSet['value'];
        $concreteSku = $dataSet['sku'];

        $typeEntity = SpyGiftCardProductConfigurationQuery::create()
            ->filterByValue($value)
            ->findOneOrCreate();
        $typeEntity->save();

        $linkEntity = SpyGiftCardProductConfigurationLinkQuery::create()
            ->filterByFkGiftCardProductConfiguration($typeEntity->getIdGiftCardProductConfiguration())
            ->filterByFkProduct($this->productRepository->getIdProductByConcreteSku($concreteSku))
            ->findOneOrCreate();
        $linkEntity->save();
    }
}
