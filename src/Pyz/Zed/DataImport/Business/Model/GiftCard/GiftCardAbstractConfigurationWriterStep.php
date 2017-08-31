<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\GiftCard;

use Orm\Zed\GiftCard\Persistence\SpyGiftCardProductAbstractConfiguration;
use Orm\Zed\GiftCard\Persistence\SpyGiftCardProductAbstractConfigurationLink;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class GiftCardAbstractConfigurationWriterStep implements DataImportStepInterface
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
        return 'Abstract Gift-Card Configurations';
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $pattern = $dataSet['pattern'];
        $abstractSku = $dataSet['abstract_sku'];

        $typeEntity = new SpyGiftCardProductAbstractConfiguration();
        $typeEntity->setCodePattern($pattern);
        $typeEntity->save();

        $configurationLink = new SpyGiftCardProductAbstractConfigurationLink();
        $configurationLink->setSpyGiftCardProductAbstractConfiguration($typeEntity);
        $configurationLink->setFkProductAbstract($this->productRepository->getIdProductAbstractByAbstractSku($abstractSku));
        $configurationLink->save();
    }

}
