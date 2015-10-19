<?php

namespace Propel\Map;

use Propel\SpyNewsletterSubscriber;
use Propel\SpyNewsletterSubscriberQuery;
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
 * This class defines the structure of the 'spy_newsletter_subscriber' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyNewsletterSubscriberTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyNewsletterSubscriberTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_newsletter_subscriber';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyNewsletterSubscriber';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyNewsletterSubscriber';

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
     * the column name for the id_newsletter_subscriber field
     */
    const COL_ID_NEWSLETTER_SUBSCRIBER = 'spy_newsletter_subscriber.id_newsletter_subscriber';

    /**
     * the column name for the fk_customer field
     */
    const COL_FK_CUSTOMER = 'spy_newsletter_subscriber.fk_customer';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_newsletter_subscriber.email';

    /**
     * the column name for the subscriber_key field
     */
    const COL_SUBSCRIBER_KEY = 'spy_newsletter_subscriber.subscriber_key';

    /**
     * the column name for the is_confirmed field
     */
    const COL_IS_CONFIRMED = 'spy_newsletter_subscriber.is_confirmed';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_newsletter_subscriber.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_newsletter_subscriber.updated_at';

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
        self::TYPE_PHPNAME       => array('IdNewsletterSubscriber', 'FkCustomer', 'Email', 'SubscriberKey', 'IsConfirmed', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idNewsletterSubscriber', 'fkCustomer', 'email', 'subscriberKey', 'isConfirmed', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, SpyNewsletterSubscriberTableMap::COL_EMAIL, SpyNewsletterSubscriberTableMap::COL_SUBSCRIBER_KEY, SpyNewsletterSubscriberTableMap::COL_IS_CONFIRMED, SpyNewsletterSubscriberTableMap::COL_CREATED_AT, SpyNewsletterSubscriberTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_newsletter_subscriber', 'fk_customer', 'email', 'subscriber_key', 'is_confirmed', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdNewsletterSubscriber' => 0, 'FkCustomer' => 1, 'Email' => 2, 'SubscriberKey' => 3, 'IsConfirmed' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
        self::TYPE_CAMELNAME     => array('idNewsletterSubscriber' => 0, 'fkCustomer' => 1, 'email' => 2, 'subscriberKey' => 3, 'isConfirmed' => 4, 'createdAt' => 5, 'updatedAt' => 6, ),
        self::TYPE_COLNAME       => array(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER => 0, SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER => 1, SpyNewsletterSubscriberTableMap::COL_EMAIL => 2, SpyNewsletterSubscriberTableMap::COL_SUBSCRIBER_KEY => 3, SpyNewsletterSubscriberTableMap::COL_IS_CONFIRMED => 4, SpyNewsletterSubscriberTableMap::COL_CREATED_AT => 5, SpyNewsletterSubscriberTableMap::COL_UPDATED_AT => 6, ),
        self::TYPE_FIELDNAME     => array('id_newsletter_subscriber' => 0, 'fk_customer' => 1, 'email' => 2, 'subscriber_key' => 3, 'is_confirmed' => 4, 'created_at' => 5, 'updated_at' => 6, ),
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
        $this->setName('spy_newsletter_subscriber');
        $this->setPhpName('SpyNewsletterSubscriber');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Propel\\SpyNewsletterSubscriber');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_newsletter_subscriber_pk_seq');
        // columns
        $this->addPrimaryKey('id_newsletter_subscriber', 'IdNewsletterSubscriber', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'spy_customer', 'id_customer', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('subscriber_key', 'SubscriberKey', 'VARCHAR', false, 150, null);
        $this->addColumn('is_confirmed', 'IsConfirmed', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyCustomer', '\\Propel\\SpyCustomer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, null, false);
        $this->addRelation('SpyNewsletterSubscription', '\\Propel\\SpyNewsletterSubscription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_newsletter_subscriber',
    1 => ':id_newsletter_subscriber',
  ),
), null, null, 'SpyNewsletterSubscriptions', false);
        $this->addRelation('SpyNewsletterType', '\\Propel\\SpyNewsletterType', RelationMap::MANY_TO_MANY, array(), null, null, 'SpyNewsletterTypes');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdNewsletterSubscriber', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdNewsletterSubscriber', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdNewsletterSubscriber', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyNewsletterSubscriberTableMap::CLASS_DEFAULT : SpyNewsletterSubscriberTableMap::OM_CLASS;
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
     * @return array           (SpyNewsletterSubscriber object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyNewsletterSubscriberTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyNewsletterSubscriberTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyNewsletterSubscriberTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyNewsletterSubscriberTableMap::OM_CLASS;
            /** @var SpyNewsletterSubscriber $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyNewsletterSubscriberTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyNewsletterSubscriberTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyNewsletterSubscriberTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyNewsletterSubscriber $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyNewsletterSubscriberTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_SUBSCRIBER_KEY);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_IS_CONFIRMED);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_newsletter_subscriber');
            $criteria->addSelectColumn($alias . '.fk_customer');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.subscriber_key');
            $criteria->addSelectColumn($alias . '.is_confirmed');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyNewsletterSubscriberTableMap::DATABASE_NAME)->getTable(SpyNewsletterSubscriberTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyNewsletterSubscriberTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyNewsletterSubscriberTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyNewsletterSubscriber or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyNewsletterSubscriber object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyNewsletterSubscriber) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
            $criteria->add(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, (array) $values, Criteria::IN);
        }

        $query = SpyNewsletterSubscriberQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyNewsletterSubscriberTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyNewsletterSubscriberTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_newsletter_subscriber table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyNewsletterSubscriberQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyNewsletterSubscriber or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyNewsletterSubscriber object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyNewsletterSubscriber object
        }

        if ($criteria->containsKey(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER) && $criteria->keyContainsValue(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER.')');
        }


        // Set the correct dbName
        $query = SpyNewsletterSubscriberQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyNewsletterSubscriberTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyNewsletterSubscriberTableMap::buildTableMap();
