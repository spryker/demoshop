<?php

namespace Propel\Map;

use Propel\SpyAbstractProduct;
use Propel\SpyAbstractProductQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'spy_abstract_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyAbstractProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyAbstractProductTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_abstract_product';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyAbstractProduct';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyAbstractProduct';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id_abstract_product field
     */
    const COL_ID_ABSTRACT_PRODUCT = 'spy_abstract_product.id_abstract_product';

    /**
     * the column name for the sku field
     */
    const COL_SKU = 'spy_abstract_product.sku';

    /**
     * the column name for the attributes field
     */
    const COL_ATTRIBUTES = 'spy_abstract_product.attributes';

    /**
     * the column name for the fk_tax_set field
     */
    const COL_FK_TAX_SET = 'spy_abstract_product.fk_tax_set';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_abstract_product.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_abstract_product.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdAbstractProduct', 'Sku', 'Attributes', 'FkTaxSet', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idAbstractProduct', 'sku', 'attributes', 'fkTaxSet', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, SpyAbstractProductTableMap::COL_SKU, SpyAbstractProductTableMap::COL_ATTRIBUTES, SpyAbstractProductTableMap::COL_FK_TAX_SET, SpyAbstractProductTableMap::COL_CREATED_AT, SpyAbstractProductTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_abstract_product', 'sku', 'attributes', 'fk_tax_set', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAbstractProduct' => 0, 'Sku' => 1, 'Attributes' => 2, 'FkTaxSet' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
        self::TYPE_CAMELNAME     => array('idAbstractProduct' => 0, 'sku' => 1, 'attributes' => 2, 'fkTaxSet' => 3, 'createdAt' => 4, 'updatedAt' => 5, ),
        self::TYPE_COLNAME       => array(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT => 0, SpyAbstractProductTableMap::COL_SKU => 1, SpyAbstractProductTableMap::COL_ATTRIBUTES => 2, SpyAbstractProductTableMap::COL_FK_TAX_SET => 3, SpyAbstractProductTableMap::COL_CREATED_AT => 4, SpyAbstractProductTableMap::COL_UPDATED_AT => 5, ),
        self::TYPE_FIELDNAME     => array('id_abstract_product' => 0, 'sku' => 1, 'attributes' => 2, 'fk_tax_set' => 3, 'created_at' => 4, 'updated_at' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('spy_abstract_product');
        $this->setPhpName('SpyAbstractProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyAbstractProduct');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_abstract_product_pk_seq');
        // columns
        $this->addPrimaryKey('id_abstract_product', 'IdAbstractProduct', 'INTEGER', true, null, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('attributes', 'Attributes', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('fk_tax_set', 'FkTaxSet', 'INTEGER', 'spy_tax_set', 'id_tax_set', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyTaxSet', '\\Propel\\SpyTaxSet', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_tax_set',
    1 => ':id_tax_set',
  ),
), null, null, null, false);
        $this->addRelation('PriceProduct', '\\Propel\\SpyPriceProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), null, null, 'PriceProducts', false);
        $this->addRelation('SpyLocalizedAbstractProductAttributes', '\\Propel\\SpyLocalizedAbstractProductAttributes', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), 'CASCADE', 'CASCADE', 'SpyLocalizedAbstractProductAttributess', false);
        $this->addRelation('SpyProduct', '\\Propel\\SpyProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), null, null, 'SpyProducts', false);
        $this->addRelation('SpyProductCategory', '\\Propel\\SpyProductCategory', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), null, null, 'SpyProductCategories', false);
        $this->addRelation('SpyUrl', '\\Propel\\SpyUrl', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_resource_abstract_product',
    1 => ':id_abstract_product',
  ),
), 'CASCADE', null, 'SpyUrls', false);
        $this->addRelation('SpyWishlistItem', '\\Propel\\SpyWishlistItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), null, null, 'SpyWishlistItems', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()
    /**
     * Method to invalidate the instance pool of all tables related to spy_abstract_product     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyLocalizedAbstractProductAttributesTableMap::clearInstancePool();
        SpyUrlTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SpyAbstractProductTableMap::CLASS_DEFAULT : SpyAbstractProductTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (SpyAbstractProduct object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyAbstractProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyAbstractProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyAbstractProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyAbstractProductTableMap::OM_CLASS;
            /** @var SpyAbstractProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyAbstractProductTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SpyAbstractProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyAbstractProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyAbstractProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyAbstractProductTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT);
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_SKU);
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_ATTRIBUTES);
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_FK_TAX_SET);
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyAbstractProductTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_abstract_product');
            $criteria->addSelectColumn($alias . '.sku');
            $criteria->addSelectColumn($alias . '.attributes');
            $criteria->addSelectColumn($alias . '.fk_tax_set');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SpyAbstractProductTableMap::DATABASE_NAME)->getTable(SpyAbstractProductTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyAbstractProductTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyAbstractProductTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyAbstractProductTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyAbstractProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyAbstractProduct object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyAbstractProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyAbstractProductTableMap::DATABASE_NAME);
            $criteria->add(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, (array) $values, Criteria::IN);
        }

        $query = SpyAbstractProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyAbstractProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyAbstractProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_abstract_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyAbstractProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyAbstractProduct or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyAbstractProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyAbstractProduct object
        }


        // Set the correct dbName
        $query = SpyAbstractProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyAbstractProductTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyAbstractProductTableMap::buildTableMap();
