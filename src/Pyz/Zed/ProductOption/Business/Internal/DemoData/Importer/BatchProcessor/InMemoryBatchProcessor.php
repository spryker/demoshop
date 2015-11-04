<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor;

use Orm\Zed\ProductOption\Persistence\Map\SpyProductOptionTypeTranslationTableMap;
use Orm\Zed\ProductOption\Persistence\Map\SpyProductOptionValueTranslationTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db\BatchStorageProviderInterface;

class InMemoryBatchProcessor extends AbstractBatchProcessor
{

    const INTERNAL_KEY_TABLE = 'table';

    const INTERNAL_KEY_COLUMNS = 'columns';

    const INTERNAL_KEY_VALUES= 'values';

    /**
     * @var array
     */
    private static $cache = [];

    /**
     * @var bool
     */
    private static $isInitiated = false;

    /**
     * @var BatchStorageProviderInterface
     */
    private $storageProvider;

    /**
     * @param BatchStorageProviderInterface $storageProvider
     */
    public function __construct(
        BatchStorageProviderInterface $storageProvider
    ) {
        $this->storageProvider = $storageProvider;

        $this->init();
    }

    private function init()
    {
        if (self::$isInitiated === true) {
            return;
        }

        $this->createCacheKey(
            parent::CACHE_KEY_OPTION_TYPE_TRANSLATION,
            SpyProductOptionTypeTranslationTableMap::TABLE_NAME,
            [
                SpyProductOptionTypeTranslationTableMap::COL_NAME,
                SpyProductOptionTypeTranslationTableMap::COL_FK_LOCALE,
                SpyProductOptionTypeTranslationTableMap::COL_FK_PRODUCT_OPTION_TYPE
            ]
        );

        $this->createCacheKey(
            parent::CACHE_KEY_OPTION_VALUE_TRANSLATION,
            SpyProductOptionValueTranslationTableMap::TABLE_NAME,
            [
                SpyProductOptionValueTranslationTableMap::COL_NAME,
                SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE,
                SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE
            ]
        );

        $this->createCacheKey(
            parent::CACHE_KEY_TOUCH,
            SpyTouchTableMap::TABLE_NAME,
            [
                SpyTouchTableMap::COL_ITEM_EVENT,
                SpyTouchTableMap::COL_ITEM_TYPE,
                SpyTouchTableMap::COL_ITEM_ID,
                SpyTouchTableMap::COL_TOUCHED,
            ]
        );

        self::$isInitiated = true;
    }

    /**
     * @param string $keyName
     * @param string $table
     * @param array $columns
     */
    private function createCacheKey($keyName, $table, array $columns)
    {
        self::$cache[$keyName] = [
            self::INTERNAL_KEY_TABLE => $table,
            self::INTERNAL_KEY_COLUMNS => $columns,
            self::INTERNAL_KEY_VALUES => []
        ];
    }

    /**
     * @param string $keyName
     * @param array $values
     */
    public function addValues($keyName, array $values)
    {
        self::$cache[$keyName][self::INTERNAL_KEY_VALUES][] = $values;
    }

    public function flush()
    {
        $optionTypeTranslationValues = $this->getValues(parent::CACHE_KEY_OPTION_TYPE_TRANSLATION);

        if (count($optionTypeTranslationValues) > 0) {
            $this->storageProvider->save(
                SpyProductOptionTypeTranslationTableMap::TABLE_NAME,
                $this->getColumns(parent::CACHE_KEY_OPTION_TYPE_TRANSLATION),
                $optionTypeTranslationValues
            );
        }

        $optionValueTranslationValues = $this->getValues(parent::CACHE_KEY_OPTION_VALUE_TRANSLATION);

        if (count($optionValueTranslationValues) > 0) {
            $this->storageProvider->save(
                SpyProductOptionValueTranslationTableMap::TABLE_NAME,
                $this->getColumns(parent::CACHE_KEY_OPTION_VALUE_TRANSLATION),
                $optionValueTranslationValues
            );
        }

        $touchValues = $this->getValues(parent::CACHE_KEY_TOUCH);

        if (count($touchValues) > 0) {
            $this->storageProvider->save(
                SpyTouchTableMap::TABLE_NAME,
                $this->getColumns(parent::CACHE_KEY_TOUCH),
                $touchValues
            );
        }
    }

    /**
     * @param string $keyName
     *
     * @return array
     */
    private function getColumns($keyName)
    {
        return self::$cache[$keyName][self::INTERNAL_KEY_COLUMNS];
    }

    /**
     * @param string $keyName
     *
     * @return array
     */
    private function getValues($keyName)
    {
        $values = self::$cache[$keyName][self::INTERNAL_KEY_VALUES];

        self::$cache[$keyName][self::INTERNAL_KEY_VALUES] = [];

        return $values;
    }
}
