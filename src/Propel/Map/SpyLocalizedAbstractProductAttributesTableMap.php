<?php

namespace Propel\Map;

use Propel\SpyLocalizedAbstractProductAttributes;
use Propel\SpyLocalizedAbstractProductAttributesQuery;
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
 * This class defines the structure of the 'spy_abstract_product_localized_attributes' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyLocalizedAbstractProductAttributesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyLocalizedAbstractProductAttributesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_abstract_product_localized_attributes';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyLocalizedAbstractProductAttributes';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyLocalizedAbstractProductAttributes';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id_abstract_attributes field
     */
    const COL_ID_ABSTRACT_ATTRIBUTES = 'spy_abstract_product_localized_attributes.id_abstract_attributes';

    /**
     * the column name for the fk_abstract_product field
     */
    const COL_FK_ABSTRACT_PRODUCT = 'spy_abstract_product_localized_attributes.fk_abstract_product';

    /**
     * the column name for the fk_locale field
     */
    const COL_FK_LOCALE = 'spy_abstract_product_localized_attributes.fk_locale';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_abstract_product_localized_attributes.name';

    /**
     * the column name for the attributes field
     */
    const COL_ATTRIBUTES = 'spy_abstract_product_localized_attributes.attributes';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_abstract_product_localized_attributes.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_abstract_product_localized_attributes.updated_at';

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
        self::TYPE_PHPNAME       => array('IdAbstractAttributes', 'FkAbstractProduct', 'FkLocale', 'Name', 'Attributes', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idAbstractAttributes', 'fkAbstractProduct', 'fkLocale', 'name', 'attributes', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, SpyLocalizedAbstractProductAttributesTableMap::COL_NAME, SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES, SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT, SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_abstract_attributes', 'fk_abstract_product', 'fk_locale', 'name', 'attributes', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAbstractAttributes' => 0, 'FkAbstractProduct' => 1, 'FkLocale' => 2, 'Name' => 3, 'Attributes' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
        self::TYPE_CAMELNAME     => array('idAbstractAttributes' => 0, 'fkAbstractProduct' => 1, 'fkLocale' => 2, 'name' => 3, 'attributes' => 4, 'createdAt' => 5, 'updatedAt' => 6, ),
        self::TYPE_COLNAME       => array(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES => 0, SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT => 1, SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE => 2, SpyLocalizedAbstractProductAttributesTableMap::COL_NAME => 3, SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES => 4, SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT => 5, SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT => 6, ),
        self::TYPE_FIELDNAME     => array('id_abstract_attributes' => 0, 'fk_abstract_product' => 1, 'fk_locale' => 2, 'name' => 3, 'attributes' => 4, 'created_at' => 5, 'updated_at' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('spy_abstract_product_localized_attributes');
        $this->setPhpName('SpyLocalizedAbstractProductAttributes');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Propel\\SpyLocalizedAbstractProductAttributes');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_abstract_product_localized_attributes_pk_seq');
        // columns
        $this->addPrimaryKey('id_abstract_attributes', 'IdAbstractAttributes', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_abstract_product', 'FkAbstractProduct', 'INTEGER', 'spy_abstract_product', 'id_abstract_product', true, null, null);
        $this->addForeignKey('fk_locale', 'FkLocale', 'INTEGER', 'spy_locale', 'id_locale', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('attributes', 'Attributes', 'LONGVARCHAR', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyAbstractProduct', '\\Propel\\SpyAbstractProduct', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Locale', '\\Propel\\SpyLocale', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_locale',
    1 => ':id_locale',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAbstractAttributes', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAbstractAttributes', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdAbstractAttributes', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyLocalizedAbstractProductAttributesTableMap::CLASS_DEFAULT : SpyLocalizedAbstractProductAttributesTableMap::OM_CLASS;
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
     * @return array           (SpyLocalizedAbstractProductAttributes object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyLocalizedAbstractProductAttributesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyLocalizedAbstractProductAttributesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyLocalizedAbstractProductAttributesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyLocalizedAbstractProductAttributesTableMap::OM_CLASS;
            /** @var SpyLocalizedAbstractProductAttributes $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyLocalizedAbstractProductAttributesTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyLocalizedAbstractProductAttributesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyLocalizedAbstractProductAttributesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyLocalizedAbstractProductAttributes $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyLocalizedAbstractProductAttributesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_NAME);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_abstract_attributes');
            $criteria->addSelectColumn($alias . '.fk_abstract_product');
            $criteria->addSelectColumn($alias . '.fk_locale');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.attributes');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME)->getTable(SpyLocalizedAbstractProductAttributesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyLocalizedAbstractProductAttributesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyLocalizedAbstractProductAttributesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyLocalizedAbstractProductAttributes or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyLocalizedAbstractProductAttributes object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyLocalizedAbstractProductAttributes) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
            $criteria->add(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, (array) $values, Criteria::IN);
        }

        $query = SpyLocalizedAbstractProductAttributesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyLocalizedAbstractProductAttributesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyLocalizedAbstractProductAttributesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_abstract_product_localized_attributes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyLocalizedAbstractProductAttributesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyLocalizedAbstractProductAttributes or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyLocalizedAbstractProductAttributes object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyLocalizedAbstractProductAttributes object
        }


        // Set the correct dbName
        $query = SpyLocalizedAbstractProductAttributesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyLocalizedAbstractProductAttributesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyLocalizedAbstractProductAttributesTableMap::buildTableMap();
