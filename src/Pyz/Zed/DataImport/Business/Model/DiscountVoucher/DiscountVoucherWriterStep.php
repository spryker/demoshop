<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\DiscountVoucher;

use Orm\Zed\Discount\Persistence\SpyDiscount;
use Orm\Zed\Discount\Persistence\SpyDiscountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucher;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucherQuery;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Discount\DiscountConfig;

class DiscountVoucherWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    /**
     * @var \Spryker\Zed\Discount\DiscountConfig
     */
    protected $discountConfig;

    /**
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param int $bulkSize
     * @param \Spryker\Zed\Discount\DiscountConfig $discountConfig
     */
    public function __construct(DataImportToTouchInterface $touchFacade, $bulkSize, DiscountConfig $discountConfig)
    {
        parent::__construct($touchFacade, $bulkSize);

        $this->discountConfig = $discountConfig;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $discountEntity = SpyDiscountQuery::create()
            ->findOneByDiscountKey($dataSet['discount_key']);

        $voucherBatch = $dataSet['voucher_batch'];

        if ($this->voucherBatchExists($discountEntity, $voucherBatch)) {
            return;
        }

        $codes = $this->generateCodes((int)$dataSet['random_generated_code_length'], (int)$dataSet['quantity'], $dataSet['custom_code']);

        $voucherCodeCollection = new ObjectCollection();
        $voucherCodeCollection->setModel(SpyDiscountVoucher::class);

        foreach ($codes as $code) {
            $discountVoucherEntity = new SpyDiscountVoucher();
            $discountVoucherEntity
                ->setIsActive($dataSet['is_active'])
                ->setVoucherBatch($voucherBatch)
                ->setCode($code)
                ->setMaxNumberOfUses($dataSet['max_number_of_uses'])
                ->setFkDiscountVoucherPool($discountEntity->getFkDiscountVoucherPool());

            $voucherCodeCollection->append($discountVoucherEntity);
        }

        $voucherCodeCollection->save();
    }

    /**
     * @param \Orm\Zed\Discount\Persistence\SpyDiscount $discountEntity
     * @param int $voucherBatch
     *
     * @return bool
     */
    protected function voucherBatchExists(SpyDiscount $discountEntity, $voucherBatch)
    {
        $query = SpyDiscountVoucherQuery::create()
            ->filterByFkDiscountVoucherPool($discountEntity->getFkDiscountVoucherPool())
            ->filterByVoucherBatch($voucherBatch);

        return ($query->count() > 0);
    }

    /**
     * @param int $length
     * @param int $quantity
     * @param null|string $customCode
     *
     * @return array
     */
    protected function generateCodes($length, $quantity, $customCode = null)
    {
        $codesToGenerate = [];

        do {
            $code = $this->getRandomVoucherCode($length);

            if ($customCode) {
                $code = $this->addCustomCodeToGenerated($customCode, $code);
            }

            if ($this->voucherCodeExists($code) === true) {
                continue;
            }

            $codesToGenerate[] = $code;
        } while ($quantity != count($codesToGenerate));

        return $codesToGenerate;
    }

    /**
     * @param string $customCode
     * @param string $code
     *
     * @return string
     */
    protected function addCustomCodeToGenerated($customCode, $code)
    {
        $replacementString = $this->discountConfig->getVoucherPoolTemplateReplacementString();

        if (!$customCode) {
            return $code;
        }

        if (!strstr($customCode, $replacementString)) {
            return $customCode . $code;
        }

        return str_replace($replacementString, $code, $customCode);
    }

    /**
     * @param string $code
     *
     * @return bool
     */
    protected function voucherCodeExists($code)
    {
        return (SpyDiscountVoucherQuery::create()->filterByCode($code)->count() > 0);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    protected function getRandomVoucherCode($length)
    {
        $allowedCharacters = $this->discountConfig->getVoucherCodeCharacters();

        $consonants = $allowedCharacters[DiscountConfig::KEY_VOUCHER_CODE_CONSONANTS];
        $vowels = $allowedCharacters[DiscountConfig::KEY_VOUCHER_CODE_VOWELS];
        $numbers = $allowedCharacters[DiscountConfig::KEY_VOUCHER_CODE_NUMBERS];

        $code = '';

        while (strlen($code) < $length) {
            if (count($consonants)) {
                $code .= $consonants[random_int(0, count($consonants) - 1)];
            }

            if (count($vowels)) {
                $code .= $vowels[random_int(0, count($vowels) - 1)];
            }

            if (count($numbers)) {
                $code .= $numbers[random_int(0, count($numbers) - 1)];
            }
        }

        return substr($code, 0, $length);
    }

}
