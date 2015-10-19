<?php

namespace Propel\Map;

use Propel\SpySearchDocumentAttribute;
use Propel\SpySearchDocumentAttributeQuery;
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
 * This class defines the structure of the 'spy_search_document_attribute' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySearchDocumentAttributeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySearchDocumentAttributeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_search_document_attribute';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySearchDocumentAttribute';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySearchDocumentAttribute';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id_search_document_attribute field
     */
    const COL_ID_SEARCH_DOCUMENT_ATTRIBUTE = 'spy_search_document_attribute.id_search_document_attribute';

    /**
     * the column name for the attribute_name field
     */
    const COL_ATTRIBUTE_NAME = 'spy_search_document_attribute.attribute_name';

    /**
     * the column name for the attribute_type field
     */
    const COL_ATTRIBUTE_TYPE = 'spy_search_document_attribute.attribute_type';

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
        self::TYPE_PHPNAME       => array('IdSearchDocumentAttribute', 'AttributeName', 'AttributeType', ),
        self::TYPE_CAMELNAME     => array('idSearchDocumentAttribute', 'attributeName', 'attributeType', ),
        self::TYPE_COLNAME       => array(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_NAME, SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_TYPE, ),
        self::TYPE_FIELDNAME     => array('id_search_document_attribute', 'attribute_name', 'attribute_type', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSearchDocumentAttribute' => 0, 'AttributeName' => 1, 'AttributeType' => 2, ),
        self::TYPE_CAMELNAME     => array('idSearchDocumentAttribute' => 0, 'attributeName' => 1, 'attributeType' => 2, ),
        self::TYPE_COLNAME       => array(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE => 0, SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_NAME => 1, SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_TYPE => 2, ),
        self::TYPE_FIELDNAME     => array('id_search_document_attribute' => 0, 'attribute_name' => 1, 'attribute_type' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
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
        $this->setName('spy_search_document_attribute');
        $this->setPhpName('SpySearchDocumentAttribute');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySearchDocumentAttribute');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_search_document_attribute_pk_seq');
        // columns
        $this->addPrimaryKey('id_search_document_attribute', 'IdSearchDocumentAttribute', 'INTEGER', true, null, null);
        $this->addColumn('attribute_name', 'AttributeName', 'VARCHAR', true, 255, null);
        $this->addColumn('attribute_type', 'AttributeType', 'VARCHAR', true, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpySearchPageElement', '\\Propel\\SpySearchPageElement', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_search_document_attribute',
    1 => ':id_search_document_attribute',
  ),
), null, null, 'SpySearchPageElements', false);
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSearchDocumentAttribute', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSearchDocumentAttribute', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSearchDocumentAttribute', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySearchDocumentAttributeTableMap::CLASS_DEFAULT : SpySearchDocumentAttributeTableMap::OM_CLASS;
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
     * @return array           (SpySearchDocumentAttribute object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySearchDocumentAttributeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySearchDocumentAttributeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySearchDocumentAttributeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySearchDocumentAttributeTableMap::OM_CLASS;
            /** @var SpySearchDocumentAttribute $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySearchDocumentAttributeTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySearchDocumentAttributeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySearchDocumentAttributeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySearchDocumentAttribute $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySearchDocumentAttributeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE);
            $criteria->addSelectColumn(SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_NAME);
            $criteria->addSelectColumn(SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id_search_document_attribute');
            $criteria->addSelectColumn($alias . '.attribute_name');
            $criteria->addSelectColumn($alias . '.attribute_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySearchDocumentAttributeTableMap::DATABASE_NAME)->getTable(SpySearchDocumentAttributeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySearchDocumentAttributeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySearchDocumentAttributeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySearchDocumentAttribute or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySearchDocumentAttribute object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySearchDocumentAttribute) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
            $criteria->add(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, (array) $values, Criteria::IN);
        }

        $query = SpySearchDocumentAttributeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySearchDocumentAttributeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySearchDocumentAttributeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_search_document_attribute table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySearchDocumentAttributeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySearchDocumentAttribute or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySearchDocumentAttribute object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySearchDocumentAttribute object
        }

        if ($criteria->containsKey(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE) && $criteria->keyContainsValue(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE.')');
        }


        // Set the correct dbName
        $query = SpySearchDocumentAttributeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySearchDocumentAttributeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySearchDocumentAttributeTableMap::buildTableMap();
