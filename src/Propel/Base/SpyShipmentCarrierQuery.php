<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyShipmentCarrier as ChildSpyShipmentCarrier;
use Propel\SpyShipmentCarrierQuery as ChildSpyShipmentCarrierQuery;
use Propel\Map\SpyShipmentCarrierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_shipment_carrier' table.
 *
 *
 *
 * @method     ChildSpyShipmentCarrierQuery orderByIdShipmentCarrier($order = Criteria::ASC) Order by the id_shipment_carrier column
 * @method     ChildSpyShipmentCarrierQuery orderByGlossaryKeyName($order = Criteria::ASC) Order by the glossary_key_name column
 * @method     ChildSpyShipmentCarrierQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyShipmentCarrierQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildSpyShipmentCarrierQuery groupByIdShipmentCarrier() Group by the id_shipment_carrier column
 * @method     ChildSpyShipmentCarrierQuery groupByGlossaryKeyName() Group by the glossary_key_name column
 * @method     ChildSpyShipmentCarrierQuery groupByName() Group by the name column
 * @method     ChildSpyShipmentCarrierQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildSpyShipmentCarrierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyShipmentCarrierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyShipmentCarrierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyShipmentCarrierQuery leftJoinShipmentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyShipmentCarrierQuery rightJoinShipmentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyShipmentCarrierQuery innerJoinShipmentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentMethods relation
 *
 * @method     \Propel\SpyShipmentMethodQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyShipmentCarrier findOne(ConnectionInterface $con = null) Return the first ChildSpyShipmentCarrier matching the query
 * @method     ChildSpyShipmentCarrier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyShipmentCarrier matching the query, or a new ChildSpyShipmentCarrier object populated from the query conditions when no match is found
 *
 * @method     ChildSpyShipmentCarrier findOneByIdShipmentCarrier(int $id_shipment_carrier) Return the first ChildSpyShipmentCarrier filtered by the id_shipment_carrier column
 * @method     ChildSpyShipmentCarrier findOneByGlossaryKeyName(string $glossary_key_name) Return the first ChildSpyShipmentCarrier filtered by the glossary_key_name column
 * @method     ChildSpyShipmentCarrier findOneByName(string $name) Return the first ChildSpyShipmentCarrier filtered by the name column
 * @method     ChildSpyShipmentCarrier findOneByIsActive(boolean $is_active) Return the first ChildSpyShipmentCarrier filtered by the is_active column *

 * @method     ChildSpyShipmentCarrier requirePk($key, ConnectionInterface $con = null) Return the ChildSpyShipmentCarrier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentCarrier requireOne(ConnectionInterface $con = null) Return the first ChildSpyShipmentCarrier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyShipmentCarrier requireOneByIdShipmentCarrier(int $id_shipment_carrier) Return the first ChildSpyShipmentCarrier filtered by the id_shipment_carrier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentCarrier requireOneByGlossaryKeyName(string $glossary_key_name) Return the first ChildSpyShipmentCarrier filtered by the glossary_key_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentCarrier requireOneByName(string $name) Return the first ChildSpyShipmentCarrier filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentCarrier requireOneByIsActive(boolean $is_active) Return the first ChildSpyShipmentCarrier filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyShipmentCarrier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyShipmentCarrier objects based on current ModelCriteria
 * @method     ChildSpyShipmentCarrier[]|ObjectCollection findByIdShipmentCarrier(int $id_shipment_carrier) Return ChildSpyShipmentCarrier objects filtered by the id_shipment_carrier column
 * @method     ChildSpyShipmentCarrier[]|ObjectCollection findByGlossaryKeyName(string $glossary_key_name) Return ChildSpyShipmentCarrier objects filtered by the glossary_key_name column
 * @method     ChildSpyShipmentCarrier[]|ObjectCollection findByName(string $name) Return ChildSpyShipmentCarrier objects filtered by the name column
 * @method     ChildSpyShipmentCarrier[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyShipmentCarrier objects filtered by the is_active column
 * @method     ChildSpyShipmentCarrier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyShipmentCarrierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyShipmentCarrierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyShipmentCarrier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyShipmentCarrierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyShipmentCarrierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyShipmentCarrierQuery) {
            return $criteria;
        }
        $query = new ChildSpyShipmentCarrierQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyShipmentCarrier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyShipmentCarrierTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyShipmentCarrierTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyShipmentCarrier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_shipment_carrier`, `glossary_key_name`, `name`, `is_active` FROM `spy_shipment_carrier` WHERE `id_shipment_carrier` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyShipmentCarrier $obj */
            $obj = new ChildSpyShipmentCarrier();
            $obj->hydrate($row);
            SpyShipmentCarrierTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpyShipmentCarrier|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_shipment_carrier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdShipmentCarrier(1234); // WHERE id_shipment_carrier = 1234
     * $query->filterByIdShipmentCarrier(array(12, 34)); // WHERE id_shipment_carrier IN (12, 34)
     * $query->filterByIdShipmentCarrier(array('min' => 12)); // WHERE id_shipment_carrier > 12
     * </code>
     *
     * @param     mixed $idShipmentCarrier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByIdShipmentCarrier($idShipmentCarrier = null, $comparison = null)
    {
        if (is_array($idShipmentCarrier)) {
            $useMinMax = false;
            if (isset($idShipmentCarrier['min'])) {
                $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $idShipmentCarrier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idShipmentCarrier['max'])) {
                $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $idShipmentCarrier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $idShipmentCarrier, $comparison);
    }

    /**
     * Filter the query on the glossary_key_name column
     *
     * Example usage:
     * <code>
     * $query->filterByGlossaryKeyName('fooValue');   // WHERE glossary_key_name = 'fooValue'
     * $query->filterByGlossaryKeyName('%fooValue%'); // WHERE glossary_key_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $glossaryKeyName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByGlossaryKeyName($glossaryKeyName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($glossaryKeyName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $glossaryKeyName)) {
                $glossaryKeyName = str_replace('*', '%', $glossaryKeyName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_GLOSSARY_KEY_NAME, $glossaryKeyName, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyShipmentMethod object
     *
     * @param \Propel\SpyShipmentMethod|ObjectCollection $spyShipmentMethod the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function filterByShipmentMethods($spyShipmentMethod, $comparison = null)
    {
        if ($spyShipmentMethod instanceof \Propel\SpyShipmentMethod) {
            return $this
                ->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $spyShipmentMethod->getFkShipmentCarrier(), $comparison);
        } elseif ($spyShipmentMethod instanceof ObjectCollection) {
            return $this
                ->useShipmentMethodsQuery()
                ->filterByPrimaryKeys($spyShipmentMethod->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipmentMethods() only accepts arguments of type \Propel\SpyShipmentMethod or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipmentMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function joinShipmentMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipmentMethods');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ShipmentMethods');
        }

        return $this;
    }

    /**
     * Use the ShipmentMethods relation SpyShipmentMethod object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyShipmentMethodQuery A secondary query class using the current class as primary query
     */
    public function useShipmentMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShipmentMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipmentMethods', '\Propel\SpyShipmentMethodQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyShipmentCarrier $spyShipmentCarrier Object to remove from the list of results
     *
     * @return $this|ChildSpyShipmentCarrierQuery The current query, for fluid interface
     */
    public function prune($spyShipmentCarrier = null)
    {
        if ($spyShipmentCarrier) {
            $this->addUsingAlias(SpyShipmentCarrierTableMap::COL_ID_SHIPMENT_CARRIER, $spyShipmentCarrier->getIdShipmentCarrier(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_shipment_carrier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentCarrierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyShipmentCarrierTableMap::clearInstancePool();
            SpyShipmentCarrierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentCarrierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyShipmentCarrierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyShipmentCarrierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyShipmentCarrierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyShipmentCarrierQuery
