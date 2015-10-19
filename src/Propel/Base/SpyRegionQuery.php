<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyRegion as ChildSpyRegion;
use Propel\SpyRegionQuery as ChildSpyRegionQuery;
use Propel\Map\SpyRegionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_region' table.
 *
 *
 *
 * @method     ChildSpyRegionQuery orderByIdRegion($order = Criteria::ASC) Order by the id_region column
 * @method     ChildSpyRegionQuery orderByFkCountry($order = Criteria::ASC) Order by the fk_country column
 * @method     ChildSpyRegionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyRegionQuery orderByIso2Code($order = Criteria::ASC) Order by the iso2_code column
 *
 * @method     ChildSpyRegionQuery groupByIdRegion() Group by the id_region column
 * @method     ChildSpyRegionQuery groupByFkCountry() Group by the fk_country column
 * @method     ChildSpyRegionQuery groupByName() Group by the name column
 * @method     ChildSpyRegionQuery groupByIso2Code() Group by the iso2_code column
 *
 * @method     ChildSpyRegionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyRegionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyRegionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyRegionQuery leftJoinSpyCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCountry relation
 * @method     ChildSpyRegionQuery rightJoinSpyCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCountry relation
 * @method     ChildSpyRegionQuery innerJoinSpyCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCountry relation
 *
 * @method     ChildSpyRegionQuery leftJoinCustomerAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerAddress relation
 * @method     ChildSpyRegionQuery rightJoinCustomerAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerAddress relation
 * @method     ChildSpyRegionQuery innerJoinCustomerAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerAddress relation
 *
 * @method     ChildSpyRegionQuery leftJoinSalesOrderAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddress relation
 * @method     ChildSpyRegionQuery rightJoinSalesOrderAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddress relation
 * @method     ChildSpyRegionQuery innerJoinSalesOrderAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddress relation
 *
 * @method     ChildSpyRegionQuery leftJoinSalesOrderAddressHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpyRegionQuery rightJoinSalesOrderAddressHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpyRegionQuery innerJoinSalesOrderAddressHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddressHistory relation
 *
 * @method     \Propel\SpyCountryQuery|\Propel\SpyCustomerAddressQuery|\Propel\SpySalesOrderAddressQuery|\Propel\SpySalesOrderAddressHistoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyRegion findOne(ConnectionInterface $con = null) Return the first ChildSpyRegion matching the query
 * @method     ChildSpyRegion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyRegion matching the query, or a new ChildSpyRegion object populated from the query conditions when no match is found
 *
 * @method     ChildSpyRegion findOneByIdRegion(int $id_region) Return the first ChildSpyRegion filtered by the id_region column
 * @method     ChildSpyRegion findOneByFkCountry(int $fk_country) Return the first ChildSpyRegion filtered by the fk_country column
 * @method     ChildSpyRegion findOneByName(string $name) Return the first ChildSpyRegion filtered by the name column
 * @method     ChildSpyRegion findOneByIso2Code(string $iso2_code) Return the first ChildSpyRegion filtered by the iso2_code column *

 * @method     ChildSpyRegion requirePk($key, ConnectionInterface $con = null) Return the ChildSpyRegion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRegion requireOne(ConnectionInterface $con = null) Return the first ChildSpyRegion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRegion requireOneByIdRegion(int $id_region) Return the first ChildSpyRegion filtered by the id_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRegion requireOneByFkCountry(int $fk_country) Return the first ChildSpyRegion filtered by the fk_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRegion requireOneByName(string $name) Return the first ChildSpyRegion filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRegion requireOneByIso2Code(string $iso2_code) Return the first ChildSpyRegion filtered by the iso2_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRegion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyRegion objects based on current ModelCriteria
 * @method     ChildSpyRegion[]|ObjectCollection findByIdRegion(int $id_region) Return ChildSpyRegion objects filtered by the id_region column
 * @method     ChildSpyRegion[]|ObjectCollection findByFkCountry(int $fk_country) Return ChildSpyRegion objects filtered by the fk_country column
 * @method     ChildSpyRegion[]|ObjectCollection findByName(string $name) Return ChildSpyRegion objects filtered by the name column
 * @method     ChildSpyRegion[]|ObjectCollection findByIso2Code(string $iso2_code) Return ChildSpyRegion objects filtered by the iso2_code column
 * @method     ChildSpyRegion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyRegionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyRegionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyRegion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyRegionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyRegionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyRegionQuery) {
            return $criteria;
        }
        $query = new ChildSpyRegionQuery();
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
     * @return ChildSpyRegion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyRegionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyRegionTableMap::DATABASE_NAME);
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
     * @return ChildSpyRegion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_region, fk_country, name, iso2_code FROM spy_region WHERE id_region = :p0';
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
            /** @var ChildSpyRegion $obj */
            $obj = new ChildSpyRegion();
            $obj->hydrate($row);
            SpyRegionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyRegion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_region column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRegion(1234); // WHERE id_region = 1234
     * $query->filterByIdRegion(array(12, 34)); // WHERE id_region IN (12, 34)
     * $query->filterByIdRegion(array('min' => 12)); // WHERE id_region > 12
     * </code>
     *
     * @param     mixed $idRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByIdRegion($idRegion = null, $comparison = null)
    {
        if (is_array($idRegion)) {
            $useMinMax = false;
            if (isset($idRegion['min'])) {
                $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $idRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRegion['max'])) {
                $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $idRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $idRegion, $comparison);
    }

    /**
     * Filter the query on the fk_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCountry(1234); // WHERE fk_country = 1234
     * $query->filterByFkCountry(array(12, 34)); // WHERE fk_country IN (12, 34)
     * $query->filterByFkCountry(array('min' => 12)); // WHERE fk_country > 12
     * </code>
     *
     * @see       filterBySpyCountry()
     *
     * @param     mixed $fkCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByFkCountry($fkCountry = null, $comparison = null)
    {
        if (is_array($fkCountry)) {
            $useMinMax = false;
            if (isset($fkCountry['min'])) {
                $this->addUsingAlias(SpyRegionTableMap::COL_FK_COUNTRY, $fkCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCountry['max'])) {
                $this->addUsingAlias(SpyRegionTableMap::COL_FK_COUNTRY, $fkCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRegionTableMap::COL_FK_COUNTRY, $fkCountry, $comparison);
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
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyRegionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the iso2_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIso2Code('fooValue');   // WHERE iso2_code = 'fooValue'
     * $query->filterByIso2Code('%fooValue%'); // WHERE iso2_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iso2Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByIso2Code($iso2Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iso2Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $iso2Code)) {
                $iso2Code = str_replace('*', '%', $iso2Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyRegionTableMap::COL_ISO2_CODE, $iso2Code, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCountry object
     *
     * @param \Propel\SpyCountry|ObjectCollection $spyCountry The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterBySpyCountry($spyCountry, $comparison = null)
    {
        if ($spyCountry instanceof \Propel\SpyCountry) {
            return $this
                ->addUsingAlias(SpyRegionTableMap::COL_FK_COUNTRY, $spyCountry->getIdCountry(), $comparison);
        } elseif ($spyCountry instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyRegionTableMap::COL_FK_COUNTRY, $spyCountry->toKeyValue('PrimaryKey', 'IdCountry'), $comparison);
        } else {
            throw new PropelException('filterBySpyCountry() only accepts arguments of type \Propel\SpyCountry or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCountry relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function joinSpyCountry($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCountry');

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
            $this->addJoinObject($join, 'SpyCountry');
        }

        return $this;
    }

    /**
     * Use the SpyCountry relation SpyCountry object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCountryQuery A secondary query class using the current class as primary query
     */
    public function useSpyCountryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCountry', '\Propel\SpyCountryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomerAddress object
     *
     * @param \Propel\SpyCustomerAddress|ObjectCollection $spyCustomerAddress the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterByCustomerAddress($spyCustomerAddress, $comparison = null)
    {
        if ($spyCustomerAddress instanceof \Propel\SpyCustomerAddress) {
            return $this
                ->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $spyCustomerAddress->getFkRegion(), $comparison);
        } elseif ($spyCustomerAddress instanceof ObjectCollection) {
            return $this
                ->useCustomerAddressQuery()
                ->filterByPrimaryKeys($spyCustomerAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerAddress() only accepts arguments of type \Propel\SpyCustomerAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function joinCustomerAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerAddress');

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
            $this->addJoinObject($join, 'CustomerAddress');
        }

        return $this;
    }

    /**
     * Use the CustomerAddress relation SpyCustomerAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useCustomerAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerAddress', '\Propel\SpyCustomerAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderAddress object
     *
     * @param \Propel\SpySalesOrderAddress|ObjectCollection $spySalesOrderAddress the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterBySalesOrderAddress($spySalesOrderAddress, $comparison = null)
    {
        if ($spySalesOrderAddress instanceof \Propel\SpySalesOrderAddress) {
            return $this
                ->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $spySalesOrderAddress->getFkRegion(), $comparison);
        } elseif ($spySalesOrderAddress instanceof ObjectCollection) {
            return $this
                ->useSalesOrderAddressQuery()
                ->filterByPrimaryKeys($spySalesOrderAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddress() only accepts arguments of type \Propel\SpySalesOrderAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddress');

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
            $this->addJoinObject($join, 'SalesOrderAddress');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddress relation SpySalesOrderAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddress', '\Propel\SpySalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderAddressHistory object
     *
     * @param \Propel\SpySalesOrderAddressHistory|ObjectCollection $spySalesOrderAddressHistory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRegionQuery The current query, for fluid interface
     */
    public function filterBySalesOrderAddressHistory($spySalesOrderAddressHistory, $comparison = null)
    {
        if ($spySalesOrderAddressHistory instanceof \Propel\SpySalesOrderAddressHistory) {
            return $this
                ->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $spySalesOrderAddressHistory->getFkRegion(), $comparison);
        } elseif ($spySalesOrderAddressHistory instanceof ObjectCollection) {
            return $this
                ->useSalesOrderAddressHistoryQuery()
                ->filterByPrimaryKeys($spySalesOrderAddressHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddressHistory() only accepts arguments of type \Propel\SpySalesOrderAddressHistory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddressHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddressHistory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddressHistory');

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
            $this->addJoinObject($join, 'SalesOrderAddressHistory');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddressHistory relation SpySalesOrderAddressHistory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderAddressHistoryQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressHistoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderAddressHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddressHistory', '\Propel\SpySalesOrderAddressHistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyRegion $spyRegion Object to remove from the list of results
     *
     * @return $this|ChildSpyRegionQuery The current query, for fluid interface
     */
    public function prune($spyRegion = null)
    {
        if ($spyRegion) {
            $this->addUsingAlias(SpyRegionTableMap::COL_ID_REGION, $spyRegion->getIdRegion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_region table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRegionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyRegionTableMap::clearInstancePool();
            SpyRegionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRegionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyRegionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyRegionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyRegionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyRegionQuery
