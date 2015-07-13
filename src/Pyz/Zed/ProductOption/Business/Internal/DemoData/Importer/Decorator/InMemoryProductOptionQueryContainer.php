<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Decorator;

use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionTypeUsageExclusionQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionValueUsageConstraintQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionTypeQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionValueQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionTypeTranslationQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionValueTranslationQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionTypeUsageQuery;
use SprykerFeature\Zed\ProductOption\Persistence\Propel\SpyProductOptionValueUsageQuery;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProductQuery;
use SprykerFeature\Zed\Tax\Persistence\Propel\Base\SpyTaxSetQuery;
use SprykerFeature\Zed\ProductOption\Persistence\ProductOptionQueryContainerInterface;

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
     * @var ProductOptionQueryContainerInterface
     */
    private $queryContainer;

    /**
     * @param ProductOptionQueryContainerInterface $queryContainer
     */
    public function __construct(ProductOptionQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    public static function disable()
    {
        static::$disableCache = true;
    }

    /**
     * @param string $importKeyProductOptionType
     *
     * @return SpyProductOptionTypeQuery
     */
    public function queryProductOptionTypeByImportKey($importKeyProductOptionType)
    {
        if (true === static::$disableCache) {
            return $this->queryContainer
                ->queryProductOptionTypeByImportKey($importKeyProductOptionType);
        }

        static $cache = [];

        if (false === isset($cache[$importKeyProductOptionType])) {
            $cache[$importKeyProductOptionType] = $this->queryContainer
                ->queryProductOptionTypeByImportKey($importKeyProductOptionType)
                ->setQueryKey('queryProductOptionTypeByImportKey')
                ->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionType];

        return $this;
    }

    /**
     * @param string $importKeyProductOptionType
     *
     * @return SpyProductOptionTypeQuery
     */
    public function queryProductOptionTypeIdByImportKey($importKeyProductOptionType)
    {
        if (true === static::$disableCache) {
            return $this->queryContainer
                ->queryProductOptionTypeIdByImportKey($importKeyProductOptionType);
        }

        static $cache = [];

        if (false === isset($cache[$importKeyProductOptionType])) {
            $cache[$importKeyProductOptionType] = $this->queryContainer
                ->queryProductOptionTypeIdByImportKey($importKeyProductOptionType)
                ->setQueryKey('queryProductOptionTypeIdByImportKey')
                ->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionType];

        return $this;
    }

    /**
     * @param int $fkProductOptionType
     * @param int $fkLocale
     *
     * @return SpyProductOptionTypeTranslationQuery
     */
    public function queryProductOptionTypeTranslationByFks($fkProductOptionType, $fkLocale)
    {
        $query = $this->queryContainer->queryProductOptionTypeTranslationByFks($fkProductOptionType, $fkLocale);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionTypeTranslationByFks');
        }

        return $query;
    }

    /**
     * @param string $importKeyProductOptionValue
     * @param int $fkProductOptionType
     *
     * @return SpyProductOptionValueQuery
     */
    public function queryProductOptionValueByImportKeyAndFkProductOptionType($importKeyProductOptionValue, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueByImportKeyAndFkProductOptionType($importKeyProductOptionValue, $fkProductOptionType);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionValueByImportKeyAndFkProductOptionType');
        }

        return $query;
    }

    /**
     * @param string $importKeyProductOptionValue
     *
     * @return SpyProductOptionValueQuery
     */
    public function queryProductOptionValueByImportKey($importKeyProductOptionValue)
    {
        if (true === static::$disableCache) {
            return $this->queryContainer
                ->queryProductOptionValueByImportKey($importKeyProductOptionValue);
        }

        static $cache;

        if (false === isset($cache[$importKeyProductOptionValue])) {
            $cache[$importKeyProductOptionValue] = $this->queryContainer
                ->queryProductOptionValueByImportKey($importKeyProductOptionValue)
                ->setQueryKey('queryProductOptionValueByImportKey')
                ->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionValue];

        return $this;
    }

    /**
     * @param string $importKeyProductOptionValue
     *
     * @return SpyProductOptionValueQuery
     */
    public function queryProductOptionValueIdByImportKey($importKeyProductOptionValue)
    {
        if (true === static::$disableCache) {
            return $this->queryContainer->queryProductOptionValueIdByImportKey($importKeyProductOptionValue);
        }

        static $cache;

        if (false === isset($cache[$importKeyProductOptionValue])) {
            $cache[$importKeyProductOptionValue]  = $this->queryContainer
                ->queryProductOptionValueIdByImportKey($importKeyProductOptionValue)
                ->setQueryKey('queryProductOptionValueIdByImportKey')
                ->findOne();
        }

        $this->lastResult = $cache[$importKeyProductOptionValue];

        return $this;
    }

    /**
     * @param int $fkProductOptionValue
     * @param int $fkLocale
     *
     * @return SpyProductOptionValueTranslationQuery
     */
    public function queryProductOptionValueTranslationByFks($fkProductOptionValue, $fkLocale)
    {
        $query = $this->queryContainer->queryProductOptionValueTranslationByFks($fkProductOptionValue, $fkLocale);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionValueTranslationByFks');
        }

        return $query;
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return SpyProductOptionTypeUsageQuery
     */
    public function queryProductOptonTypeUsageById($idProductOptionTypeUsage)
    {
        $query = $this->queryContainer->queryProductOptonTypeUsageById($idProductOptionTypeUsage);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptonTypeUsageById');
        }

        return $query;
    }

    /**
     * @param int $fkProduct
     * @param int $fkProductOptionType
     *
     * @return SpyProductOptionTypeUsageQuery
     */
    public function queryProductOptionTypeUsageByFKs($fkProduct, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageByFKs($fkProduct, $fkProductOptionType);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionTypeUsageByFKs');
        }

        return $query;
    }

    /**
     * @param int $fkProduct
     * @param int $fkProductOptionType
     *
     * @return SpyProductOptionTypeUsageQuery
     */
    public function queryProductOptionTypeUsageIdByFKs($fkProduct, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageIdByFKs($fkProduct, $fkProductOptionType);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionTypeUsageIdByFKs');
        }

        return $query;

    }

    /**
     * @param int $idProductOptionValueUsage
     *
     * @return SpyProductOptionValueUsageQuery
     */
    public function queryProductOptonValueUsageById($idProductOptionValueUsage)
    {
        $query = $this->queryContainer->queryProductOptonValueUsageById($idProductOptionValueUsage);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptonValueUsageById');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsage
     * @param int $fkProductOptionType
     *
     * @return SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageByFKs($fkProductOptionTypeUsage, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageByFKs($fkProductOptionTypeUsage, $fkProductOptionType);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionValueUsageByFKs');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsage
     * @param int $fkProductOptionType
     *
     * @return SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageIdByFKs($fkProductOptionTypeUsage, $fkProductOptionType)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageIdByFKs($fkProductOptionTypeUsage, $fkProductOptionType);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionValueUsageIdByFKs');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionTypeUsageA
     * @param int $fkProductOptionTypeUsageB
     *
     * @return SpyProductOptionTypeUsageExclusionQuery
     */
    public function queryProductOptionTypeUsageExclusionByFks($fkProductOptionTypeUsageA, $fkProductOptionTypeUsageB)
    {
        $query = $this->queryContainer->queryProductOptionTypeUsageExclusionByFks($fkProductOptionTypeUsageA, $fkProductOptionTypeUsageB);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionTypeUsageExclusionByFks');
        }

        return $query;
    }

    /**
     * @param int $fkProductOptionValueUsageA
     * @param int $fkProductOptionValueUsageB
     *
     * @return SpyProductOptionValueUsageConstraintQuery
     */
    public function queryProductOptionValueUsageConstraintsByFks($fkProductOptionValueUsageA, $fkProductOptionValueUsageB)
    {
        $query = $this->queryContainer->queryProductOptionValueUsageConstraintsByFks($fkProductOptionValueUsageA, $fkProductOptionValueUsageB);

        if (false === static::$disableCache) {
            $query->setQueryKey('queryProductOptionValueUsageConstraintsByFks');
        }

        return $query;
    }

    /**
     * @param int $idProductOptionType
     *
     * @return SpyAbstractProductQuery
     */
    public function queryAssociatedAbstractProductIdsForProductOptionType($idProductOptionType)
    {
        return $this->queryContainer->queryAssociatedAbstractProductIdsForProductOptionType($idProductOptionType);
    }

    /**
     * @param int $idProductOptionValue
     *
     * @return SpyAbstractProductQuery
     */
    public function queryAssociatedAbstractProductIdsForProductOptionValue($idProductOptionValue)
    {
        return $this->queryContainer->queryAssociatedAbstractProductIdsForProductOptionValue($idProductOptionValue);
    }

    /**
     * @param int $idProductOptionTypeUsage
     *
     * @return SpyAbstractProductQuery
     */
    public function queryAbstractProductIdForProductOptionTypeUsage($idProductOptionTypeUsage)
    {
        return $this->queryContainer->queryAbstractProductIdForProductOptionTypeUsage($idProductOptionTypeUsage);
    }

    /**
     * @param int $idProductOptionValueUsage
     * @param int $idLocale
     *
     * @return SpyProductOptionValueUsageQuery
     */
    public function queryProductOptionValueUsageWithAssociatedAttributes($idProductOptionValueUsage, $idLocale)
    {
        return $this->queryContainer->queryProductOptionValueUsageWithAssociatedAttributes($idProductOptionValueUsage, $idLocale);
    }

    /**
     * @param int $idProductOptionValueUsage
     *
     * @return SpyTaxSetQuery
     */
    public function queryTaxSetForProductOptionValueUsage($idProductOptionValueUsage)
    {
        return $this->queryContainer->queryTaxSetForProductOptionValueUsage($idProductOptionValueUsage);
    }

    /**
     * @param int $idProduct
     * @param int $idLocale
     *
     * @return array
     */
    public function queryTypeUsagesForConcreteProduct($idProduct, $idLocale)
    {
        return $this->queryContainer->queryTypeUsagesForConcreteProduct($idProduct, $idLocale);
    }

    /**
     * @param int $idTypeUsage
     * @param int $idLocale
     *
     * @return array
     */
    public function queryValueUsagesForTypeUsage($idTypeUsage, $idLocale)
    {
        return $this->queryContainer->queryValueUsagesForTypeUsage($idTypeUsage, $idLocale);
    }

    /**
     * @param int $idTypeUsage
     *
     * @return array
     */
    public function queryTypeExclusionsForTypeUsage($idTypeUsage)
    {
        return $this->queryContainer->queryTypeExclusionsForTypeUsage($idTypeUsage);
    }

    /**
     * @param int $idValueUsage
     *
     * @return array
     */
    public function queryValueConstraintsForValueUsage($idValueUsage)
    {
        return $this->queryContainer->queryValueConstraintsForValueUsage($idValueUsage);
    }

    /**
     * @param int $idValueUsage
     * @param string $operator
     *
     * @return array
     */
    public function queryValueConstraintsForValueUsageByOperator($idValueUsage, $operator)
    {
        return $this->queryContainer->queryValueConstraintsForValueUsageByOperator($idValueUsage, $operator);
    }

    /**
     * @param int $idProduct
     *
     * @return array
     */
    public function queryConfigPresetsForConcreteProduct($idProduct)
    {
        return $this->queryContainer->queryConfigPresetsForConcreteProduct($idProduct);
    }

    /**
     * @param int $idConfigPreset
     *
     * @return array
     */
    public function queryValueUsagesForConfigPreset($idConfigPreset)
    {
        return $this->queryContainer->queryValueUsagesForConfigPreset($idConfigPreset);
    }

    /**
     * @param int $idTypeUsage
     *
     * @return string|null
     */
    public function queryEffectiveTaxRateForTypeUsage($idTypeUsage)
    {
        return $this->queryContainer->queryEffectiveTaxRateForTypeUsage($idTypeUsage);
    }
}
