<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Price;

use Orm\Zed\Price\Persistence\SpyPriceTypeQuery;
use Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class PriceTypeToIdPriceTypeStep implements DataImportStepInterface
{

    const KEY_SOURCE = 'priceType';
    const KEY_TARGET = 'idPriceType';

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var array
     */
    protected $resolved = [];

    /**
     * @param string $source
     * @param string $target
     */
    public function __construct($source = self::KEY_SOURCE, $target = self::KEY_TARGET)
    {
        $this->source = $source;
        $this->target = $target;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (!isset($dataSet[$this->source])) {
            throw new DataKeyNotFoundInDataSetException(sprintf(
                'Expected a key "%s" in current data set. Available keys: "%s"',
                $this->source,
                implode(', ', array_keys($dataSet->getArrayCopy()))
            ));
        }

        if (!isset($this->resolved[$dataSet[$this->source]])) {
            $this->resolved[$dataSet[$this->source]] = $this->resolveIdPriceType($dataSet[$this->source]);
        }

        $dataSet[$this->target] = $this->resolved[$dataSet[$this->source]];
    }

    /**
     * @param string $priceType
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return int
     */
    protected function resolveIdPriceType($priceType)
    {
        $query = SpyPriceTypeQuery::create();
        $priceTypeEntity = $query->filterByName($priceType)->findOne();

        if (!$priceTypeEntity) {
            throw new EntityNotFoundException(sprintf('Price type by name "%s" not found.', $priceType));
        }

        return $priceTypeEntity->getIdPriceType();
    }

}
