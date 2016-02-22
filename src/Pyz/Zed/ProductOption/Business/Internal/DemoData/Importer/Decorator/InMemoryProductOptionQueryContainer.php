<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Decorator;

use Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;

class InMemoryProductOptionQueryContainer implements ProductOptionQueryContainerInterface
{

    /**
     * @var bool
     */
    private static $disableCache = false;

    /**
     * @var mixed
     */
    private $lastResult;

    /**
     * @return mixed
     */
    public function findOne()
    {
        return $this->lastResult;
    }

    /**
     * @var \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface
     */
    private $queryContainer;

    /**
     * @param \Spryker\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface $queryContainer
     */
    public function __construct(ProductOptionQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @return void
     */
    public static function disable()
    {
        static::$disableCache = true;
    }

    /**
     * @param string $importKeyProductOptionType
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionTypeQuery
     */
    public function queryProductOptionTypeByImportKey($importKeyProductOptionType)
    {
        if (static::$disableCache === true) {
            return $this->queryContainer
                ->queryProductOptionTypeByImportKey($importKeyProductOptionType);
        }

        static $cache = [];

        $query = $this->queryContainer
            ->queryProductOptionTypeByImportKey($importKeyProductOptionType)
            ->setQueryKey('queryProductOptionTypeByImportKey');

        if (isset($cache[$importKeyProductOptionType]) === false) {
            $cache[$importKeyProductOptionType] = $query->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionType];

        return $query;
    }

    /**
     * @param int $fkProductOptionType
     * @param int $fkLocale
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionTypeTranslationQuery
     */
    public function queryProductOptionTypeTranslationByFks($fkProductOptionType, $fkLocale)
    {
        $query = $this->queryContainer->queryProductOptionTypeTranslationByFks($fkProductOptionType, $fkLocale);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionTypeTranslationByFks');
        }

        return $query;
    }

    /**
     * @param string $importKeyProductOptionValue
     * @param int $fkProductOptionType
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery
     */
    public function queryProductOptionValueByImportKeyAndFkProductOptionType($importKeyProductOptionValue, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueByImportKeyAndFkProductOptionType($importKeyProductOptionValue, $fkProductOptionType);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueByImportKeyAndFkProductOptionType');
        }

        return $query;
    }

    /**
     * @param string $importKeyProductOptionValue
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery
     */
    public function queryProductOptionValueByImportKey($importKeyProductOptionValue)
    {
        if (static::$disableCache === true) {
            return $this->queryContainer
                ->queryProductOptionValueByImportKey($importKeyProductOptionValue);
        }

        static $cache;

        $query = $this->queryContainer
            ->queryProductOptionValueByImportKey($importKeyProductOptionValue)
            ->setQueryKey('queryProductOptionValueByImportKey');

        if (isset($cache[$importKeyProductOptionValue]) === false) {
            $cache[$importKeyProductOptionValue] = $query->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionValue];

        return $query;
    }

    /**
     * @param int $fkProductOptionValue
     * @param int $fkLocale
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueTranslationQuery
     */
    public function queryProductOptionValueTranslationByFks($fkProductOptionValue, $fkLocale)
    {
        $query = $this->queryContainer->queryProductOptionValueTranslationByFks($fkProductOptionValue, $fkLocale);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueTranslationByFks');
        }

        return $query;
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionTypeUsageQuery
     */
    public function queryProductOptionTypeUsageById($idProductOptionTypeUsage)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageById($idProductOptionTypeUsage);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionTypeUsageById');
        }

        return $query;
    }

    /**
     * @param int $fkProduct
     * @param int $fkProductOptionType
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionTypeUsageQuery
     */
    public function queryProductOptionTypeUsageByFKs($fkProduct, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageByFKs($fkProduct, $fkProductOptionType);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionTypeUsageByFKs');
        }

        return $query;
    }

    /**
     * @param int $idProductOptionValueUsage
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageById($idProductOptionValueUsage)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageById($idProductOptionValueUsage);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueUsageById');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsage
     * @param int $fkProductOptionType
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageByFKs($fkProductOptionTypeUsage, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageByFKs($fkProductOptionTypeUsage, $fkProductOptionType);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueUsageByFKs');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsage
     * @param int $fkProductOptionType
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageIdByFKs($fkProductOptionTypeUsage, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageIdByFKs($fkProductOptionTypeUsage, $fkProductOptionType);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueUsageIdByFKs');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsageA
     * @param int $fkProductOptionTypeUsageB
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionTypeUsageExclusionQuery
     */
    public function queryProductOptionTypeUsageExclusionByFks($fkProductOptionTypeUsageA, $fkProductOptionTypeUsageB)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageExclusionByFks($fkProductOptionTypeUsageA, $fkProductOptionTypeUsageB);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionTypeUsageExclusionByFks');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionValueUsageA
     * @param int $fkProductOptionValueUsageB
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueUsageConstraintQuery
     */
    public function queryProductOptionValueUsageConstraintsByFks($fkProductOptionValueUsageA, $fkProductOptionValueUsageB)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageConstraintsByFks($fkProductOptionValueUsageA, $fkProductOptionValueUsageB);

        if (static::$disableCache === false) {
            $query->setQueryKey('queryProductOptionValueUsageConstraintsByFks');
        }

        return $query;
    }

    /**
     * @param int $idProductOptionType
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryAssociatedProductAbstractIdsForProductOptionType($idProductOptionType)
    {
        return $this->queryContainer->queryAssociatedProductAbstractIdsForProductOptionType($idProductOptionType);
    }

    /**
     * @param int $idProductOptionValue
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryAssociatedProductAbstractIdsForProductOptionValue($idProductOptionValue)
    {
        return $this->queryContainer->queryAssociatedProductAbstractIdsForProductOptionValue($idProductOptionValue);
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryProductAbstractIdForProductOptionTypeUsage($idProductOptionTypeUsage)
    {
        if (static::$disableCache === true) {
            return $this->queryContainer->queryProductAbstractIdForProductOptionTypeUsage($idProductOptionTypeUsage);
        }

        static $cache;

        $query = $this->queryContainer
            ->queryProductAbstractIdForProductOptionTypeUsage($idProductOptionTypeUsage);

        if (isset($cache['id.' . $idProductOptionTypeUsage]) === false) {
            $cache['id.' . $idProductOptionTypeUsage] = $query->findOne();
        }

        $this->lastResult = $cache['id.' . $idProductOptionTypeUsage];

        return $query;
    }

    /**
     * @param int $idProduct
     * @param int $idLocale
     *
     * @return array
     */
    public function queryTypeUsagesForProductConcrete($idProduct, $idLocale)
    {
        return $this->queryContainer->queryTypeUsagesForProductConcrete($idProduct, $idLocale);
    }

    /**
     * @param int $idProductOptionTypeUsage
     * @param int $idLocale
     *
     * @return array
     */
    public function queryValueUsagesForTypeUsage($idProductOptionTypeUsage, $idLocale)
    {
        return $this->queryContainer->queryValueUsagesForTypeUsage($idProductOptionTypeUsage, $idLocale);
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return array
     */
    public function queryTypeExclusionsForTypeUsage($idProductOptionTypeUsage)
    {
        return $this->queryContainer->queryTypeExclusionsForTypeUsage($idProductOptionTypeUsage);
    }

    /**
     * @param int $idProductOptionValueUsage
     *
     * @return array
     */
    public function queryValueConstraintsForValueUsage($idProductOptionValueUsage)
    {
        return $this->queryContainer->queryValueConstraintsForValueUsage($idProductOptionValueUsage);
    }

    /**
     * @param int $idProductOptionValueUsage
     * @param string $operator
     *
     * @return array
     */
    public function queryValueConstraintsForValueUsageByOperator($idProductOptionValueUsage, $operator)
    {
        return $this->queryContainer->queryValueConstraintsForValueUsageByOperator($idProductOptionValueUsage, $operator);
    }

    /**
     * @param int $idProduct
     *
     * @return array
     */
    public function queryConfigPresetsForProductConcrete($idProduct)
    {
        return $this->queryContainer->queryConfigPresetsForProductConcrete($idProduct);
    }

    /**
     * @param int $idProductOptionConfigurationPreset
     *
     * @return array
     */
    public function queryValueUsagesForConfigPreset($idProductOptionConfigurationPreset)
    {
        return $this->queryContainer->queryValueUsagesForConfigPreset($idProductOptionConfigurationPreset);
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return string|null
     */
    public function queryEffectiveTaxRateForTypeUsage($idProductOptionTypeUsage)
    {
        return $this->queryContainer->queryEffectiveTaxRateForTypeUsage($idProductOptionTypeUsage);
    }

    /**
     * @param int $idProductOptionValue
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery
     */
    public function queryOptionValueById($idProductOptionValue)
    {
        return $this->queryContainer->queryOptionValueById($idProductOptionValue);
    }

    /**
     * @param int $idProductOptionValueUsage
     *
     * @return \Orm\Zed\Tax\Persistence\Base\SpyTaxSetQuery
     */
    public function queryTaxSetForProductOptionValueUsage($idProductOptionValueUsage)
    {
        return $this->queryContainer->queryTaxSetForProductOptionValueUsage($idProductOptionValueUsage);
    }

    /**
     * @param int $idProductOptionValueUsage
     * @param int $idLocale
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageWithAssociatedAttributes($idProductOptionValueUsage, $idLocale)
    {
        return $this->queryProductOptionValueUsageWithAssociatedAttributes($idProductOptionValueUsage, $idLocale);
    }

}
