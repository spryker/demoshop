<?php

namespace Propel\Map;

use Propel\SpyProductAttributesMetadata;
use Propel\SpyProductAttributesMetadataQuery;
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
 * This class defines the structure of the 'spy_attributes_metadata' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyProductAttributesMetadataTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyProductAttributesMetadataTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_attributes_metadata';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyProductAttributesMetadata';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyProductAttributesMetadata';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id_attributes_metadata field
     */
    const COL_ID_ATTRIBUTES_METADATA = 'spy_attributes_metadata.id_attributes_metadata';

    /**
     * the column name for the key field
     */
    const COL_KEY = 'spy_attributes_metadata.key';

    /**
     * the column name for the is_editable field
     */
    const COL_IS_EDITABLE = 'spy_attributes_metadata.is_editable';

    /**
     * the column name for the fk_type field
     */
    const COL_FK_TYPE = 'spy_attributes_metadata.fk_type';

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
        self::TYPE_PHPNAME       => array('IdAttributesMetadata', 'Key', 'IsEditable', 'FkType', ),
        self::TYPE_CAMELNAME     => array('idAttributesMetadata', 'key', 'isEditable', 'fkType', ),
        self::TYPE_COLNAME       => array(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, SpyProductAttributesMetadataTableMap::COL_KEY, SpyProductAttributesMetadataTableMap::COL_IS_EDITABLE, SpyProductAttributesMetadataTableMap::COL_FK_TYPE, ),
        self::TYPE_FIELDNAME     => array('id_attributes_metadata', 'key', 'is_editable', 'fk_type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAttributesMetadata' => 0, 'Key' => 1, 'IsEditable' => 2, 'FkType' => 3, ),
        self::TYPE_CAMELNAME     => array('idAttributesMetadata' => 0, 'key' => 1, 'isEditable' => 2, 'fkType' => 3, ),
        self::TYPE_COLNAME       => array(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA => 0, SpyProductAttributesMetadataTableMap::COL_KEY => 1, SpyProductAttributesMetadataTableMap::COL_IS_EDITABLE => 2, SpyProductAttributesMetadataTableMap::COL_FK_TYPE => 3, ),
        self::TYPE_FIELDNAME     => array('id_attributes_metadata' => 0, 'key' => 1, 'is_editable' => 2, 'fk_type' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
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
        $this->setName('spy_attributes_metadata');
        $this->setPhpName('SpyProductAttributesMetadata');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Propel\\SpyProductAttributesMetadata');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_attributes_metadata_pk_seq');
        // columns
        $this->addPrimaryKey('id_attributes_metadata', 'IdAttributesMetadata', 'INTEGER', true, null, null);
        $this->addColumn('key', 'Key', 'VARCHAR', true, 255, null);
        $this->addColumn('is_editable', 'IsEditable', 'BOOLEAN', true, 1, true);
        $this->addForeignKey('fk_type', 'FkType', 'INTEGER', 'spy_attribute_type', 'id_type', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyProductAttributeType', '\\Propel\\SpyProductAttributeType', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_type',
    1 => ':id_type',
  ),
), null, null, null, false);
        $this->addRelation('SpyProductSearchAttributesOperation', '\\Propel\\SpyProductSearchAttributesOperation', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':source_attribute_id',
    1 => ':id_attributes_metadata',
  ),
), 'CASCADE', null, 'SpyProductSearchAttributesOperations', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to spy_attributes_metadata     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyProductSearchAttributesOperationTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAttributesMetadata', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAttributesMetadata', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdAttributesMetadata', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyProductAttributesMetadataTableMap::CLASS_DEFAULT : SpyProductAttributesMetadataTableMap::OM_CLASS;
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
     * @return array           (SpyProductAttributesMetadata object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyProductAttributesMetadataTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyProductAttributesMetadataTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyProductAttributesMetadataTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyProductAttributesMetadataTableMap::OM_CLASS;
            /** @var SpyProductAttributesMetadata $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyProductAttributesMetadataTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyProductAttributesMetadataTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyProductAttributesMetadataTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyProductAttributesMetadata $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyProductAttributesMetadataTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA);
            $criteria->addSelectColumn(SpyProductAttributesMetadataTableMap::COL_KEY);
            $criteria->addSelectColumn(SpyProductAttributesMetadataTableMap::COL_IS_EDITABLE);
            $criteria->addSelectColumn(SpyProductAttributesMetadataTableMap::COL_FK_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id_attributes_metadata');
            $criteria->addSelectColumn($alias . '.key');
            $criteria->addSelectColumn($alias . '.is_editable');
            $criteria->addSelectColumn($alias . '.fk_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyProductAttributesMetadataTableMap::DATABASE_NAME)->getTable(SpyProductAttributesMetadataTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyProductAttributesMetadataTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyProductAttributesMetadataTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyProductAttributesMetadata or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyProductAttributesMetadata object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyProductAttributesMetadata) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
            $criteria->add(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, (array) $values, Criteria::IN);
        }

        $query = SpyProductAttributesMetadataQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyProductAttributesMetadataTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyProductAttributesMetadataTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_attributes_metadata table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyProductAttributesMetadataQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyProductAttributesMetadata or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyProductAttributesMetadata object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyProductAttributesMetadata object
        }


        // Set the correct dbName
        $query = SpyProductAttributesMetadataQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyProductAttributesMetadataTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyProductAttributesMetadataTableMap::buildTableMap();
