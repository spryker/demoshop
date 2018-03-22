<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Navigation;

use Orm\Zed\Navigation\Persistence\SpyNavigationQuery;
use Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class NavigationKeyToIdNavigationStep implements DataImportStepInterface
{
    const KEY_SOURCE = 'navigationKey';
    const KEY_TARGET = 'idNavigation';

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
            $this->resolved[$dataSet[$this->source]] = $this->resolveIdNavigation($dataSet[$this->source]);
        }

        $dataSet[$this->target] = $this->resolved[$dataSet[$this->source]];
    }

    /**
     * @param string $navigationKey
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return int
     */
    protected function resolveIdNavigation($navigationKey)
    {
        $navigationEntity = SpyNavigationQuery::create()
            ->findOneByKey($navigationKey);

        if (!$navigationEntity) {
            throw new EntityNotFoundException(sprintf('Navigation by key "%s" not found.', $navigationKey));
        }

        return $navigationEntity->getIdNavigation();
    }
}
