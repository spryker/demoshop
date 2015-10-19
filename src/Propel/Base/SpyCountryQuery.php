<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCountry as ChildSpyCountry;
use Propel\SpyCountryQuery as ChildSpyCountryQuery;
use Propel\Map\SpyCountryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_country' table.
 *
 *
 *
 * @method     ChildSpyCountryQuery orderByIdCountry($order = Criteria::ASC) Order by the id_country column
 * @method     ChildSpyCountryQuery orderByIso2Code($order = Criteria::ASC) Order by the iso2_code column
 * @method     ChildSpyCountryQuery orderByIso3Code($order = Criteria::ASC) Order by the iso3_code column
 * @method     ChildSpyCountryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyCountryQuery orderByPostalCodeMandatory($order = Criteria::ASC) Order by the postal_code_mandatory column
 * @method     ChildSpyCountryQuery orderByPostalCodeRegex($order = Criteria::ASC) Order by the postal_code_regex column
 *
 * @method     ChildSpyCountryQuery groupByIdCountry() Group by the id_country column
 * @method     ChildSpyCountryQuery groupByIso2Code() Group by the iso2_code column
 * @method     ChildSpyCountryQuery groupByIso3Code() Group by the iso3_code column
 * @method     ChildSpyCountryQuery groupByName() Group by the name column
 * @method     ChildSpyCountryQuery groupByPostalCodeMandatory() Group by the postal_code_mandatory column
 * @method     ChildSpyCountryQuery groupByPostalCodeRegex() Group by the postal_code_regex column
 *
 * @method     ChildSpyCountryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCountryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCountryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCountryQuery leftJoinSpyRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyRegion relation
 * @method     ChildSpyCountryQuery rightJoinSpyRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyRegion relation
 * @method     ChildSpyCountryQuery innerJoinSpyRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyRegion relation
 *
 * @method     ChildSpyCountryQuery leftJoinCustomerAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerAddress relation
 * @method     ChildSpyCountryQuery rightJoinCustomerAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerAddress relation
 * @method     ChildSpyCountryQuery innerJoinCustomerAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerAddress relation
 *
 * @method     ChildSpyCountryQuery leftJoinSalesOrderAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddress relation
 * @method     ChildSpyCountryQuery rightJoinSalesOrderAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddress relation
 * @method     ChildSpyCountryQuery innerJoinSalesOrderAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddress relation
 *
 * @method     ChildSpyCountryQuery leftJoinSalesOrderAddressHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpyCountryQuery rightJoinSalesOrderAddressHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpyCountryQuery innerJoinSalesOrderAddressHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddressHistory relation
 *
 * @method     \Propel\SpyRegionQuery|\Propel\SpyCustomerAddressQuery|\Propel\SpySalesOrderAddressQuery|\Propel\SpySalesOrderAddressHistoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCountry findOne(ConnectionInterface $con = null) Return the first ChildSpyCountry matching the query
 * @method     ChildSpyCountry findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCountry matching the query, or a new ChildSpyCountry object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCountry findOneByIdCountry(int $id_country) Return the first ChildSpyCountry filtered by the id_country column
 * @method     ChildSpyCountry findOneByIso2Code(string $iso2_code) Return the first ChildSpyCountry filtered by the iso2_code column
 * @method     ChildSpyCountry findOneByIso3Code(string $iso3_code) Return the first ChildSpyCountry filtered by the iso3_code column
 * @method     ChildSpyCountry findOneByName(string $name) Return the first ChildSpyCountry filtered by the name column
 * @method     ChildSpyCountry findOneByPostalCodeMandatory(boolean $postal_code_mandatory) Return the first ChildSpyCountry filtered by the postal_code_mandatory column
 * @method     ChildSpyCountry findOneByPostalCodeRegex(string $postal_code_regex) Return the first ChildSpyCountry filtered by the postal_code_regex column *

 * @method     ChildSpyCountry requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCountry by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOne(ConnectionInterface $con = null) Return the first ChildSpyCountry matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCountry requireOneByIdCountry(int $id_country) Return the first ChildSpyCountry filtered by the id_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOneByIso2Code(string $iso2_code) Return the first ChildSpyCountry filtered by the iso2_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOneByIso3Code(string $iso3_code) Return the first ChildSpyCountry filtered by the iso3_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOneByName(string $name) Return the first ChildSpyCountry filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOneByPostalCodeMandatory(boolean $postal_code_mandatory) Return the first ChildSpyCountry filtered by the postal_code_mandatory column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCountry requireOneByPostalCodeRegex(string $postal_code_regex) Return the first ChildSpyCountry filtered by the postal_code_regex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCountry[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCountry objects based on current ModelCriteria
 * @method     ChildSpyCountry[]|ObjectCollection findByIdCountry(int $id_country) Return ChildSpyCountry objects filtered by the id_country column
 * @method     ChildSpyCountry[]|ObjectCollection findByIso2Code(string $iso2_code) Return ChildSpyCountry objects filtered by the iso2_code column
 * @method     ChildSpyCountry[]|ObjectCollection findByIso3Code(string $iso3_code) Return ChildSpyCountry objects filtered by the iso3_code column
 * @method     ChildSpyCountry[]|ObjectCollection findByName(string $name) Return ChildSpyCountry objects filtered by the name column
 * @method     ChildSpyCountry[]|ObjectCollection findByPostalCodeMandatory(boolean $postal_code_mandatory) Return ChildSpyCountry objects filtered by the postal_code_mandatory column
 * @method     ChildSpyCountry[]|ObjectCollection findByPostalCodeRegex(string $postal_code_regex) Return ChildSpyCountry objects filtered by the postal_code_regex column
 * @method     ChildSpyCountry[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCountryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCountryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCountry', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCountryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCountryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCountryQuery) {
            return $criteria;
        }
        $query = new ChildSpyCountryQuery();
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
     * @return ChildSpyCountry|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCountryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCountryTableMap::DATABASE_NAME);
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
     * @return ChildSpyCountry A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_country, iso2_code, iso3_code, name, postal_code_mandatory, postal_code_regex FROM spy_country WHERE id_country = :p0';
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
            /** @var ChildSpyCountry $obj */
            $obj = new ChildSpyCountry();
            $obj->hydrate($row);
            SpyCountryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCountry|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_country column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCountry(1234); // WHERE id_country = 1234
     * $query->filterByIdCountry(array(12, 34)); // WHERE id_country IN (12, 34)
     * $query->filterByIdCountry(array('min' => 12)); // WHERE id_country > 12
     * </code>
     *
     * @param     mixed $idCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByIdCountry($idCountry = null, $comparison = null)
    {
        if (is_array($idCountry)) {
            $useMinMax = false;
            if (isset($idCountry['min'])) {
                $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $idCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCountry['max'])) {
                $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $idCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $idCountry, $comparison);
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCountryTableMap::COL_ISO2_CODE, $iso2Code, $comparison);
    }

    /**
     * Filter the query on the iso3_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIso3Code('fooValue');   // WHERE iso3_code = 'fooValue'
     * $query->filterByIso3Code('%fooValue%'); // WHERE iso3_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iso3Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByIso3Code($iso3Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iso3Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $iso3Code)) {
                $iso3Code = str_replace('*', '%', $iso3Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCountryTableMap::COL_ISO3_CODE, $iso3Code, $comparison);
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCountryTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the postal_code_mandatory column
     *
     * Example usage:
     * <code>
     * $query->filterByPostalCodeMandatory(true); // WHERE postal_code_mandatory = true
     * $query->filterByPostalCodeMandatory('yes'); // WHERE postal_code_mandatory = true
     * </code>
     *
     * @param     boolean|string $postalCodeMandatory The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByPostalCodeMandatory($postalCodeMandatory = null, $comparison = null)
    {
        if (is_string($postalCodeMandatory)) {
            $postalCodeMandatory = in_array(strtolower($postalCodeMandatory), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY, $postalCodeMandatory, $comparison);
    }

    /**
     * Filter the query on the postal_code_regex column
     *
     * Example usage:
     * <code>
     * $query->filterByPostalCodeRegex('fooValue');   // WHERE postal_code_regex = 'fooValue'
     * $query->filterByPostalCodeRegex('%fooValue%'); // WHERE postal_code_regex LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postalCodeRegex The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByPostalCodeRegex($postalCodeRegex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postalCodeRegex)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $postalCodeRegex)) {
                $postalCodeRegex = str_replace('*', '%', $postalCodeRegex);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCountryTableMap::COL_POSTAL_CODE_REGEX, $postalCodeRegex, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyRegion object
     *
     * @param \Propel\SpyRegion|ObjectCollection $spyRegion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterBySpyRegion($spyRegion, $comparison = null)
    {
        if ($spyRegion instanceof \Propel\SpyRegion) {
            return $this
                ->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $spyRegion->getFkCountry(), $comparison);
        } elseif ($spyRegion instanceof ObjectCollection) {
            return $this
                ->useSpyRegionQuery()
                ->filterByPrimaryKeys($spyRegion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyRegion() only accepts arguments of type \Propel\SpyRegion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyRegion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function joinSpyRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyRegion');

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
            $this->addJoinObject($join, 'SpyRegion');
        }

        return $this;
    }

    /**
     * Use the SpyRegion relation SpyRegion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyRegionQuery A secondary query class using the current class as primary query
     */
    public function useSpyRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyRegion', '\Propel\SpyRegionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomerAddress object
     *
     * @param \Propel\SpyCustomerAddress|ObjectCollection $spyCustomerAddress the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterByCustomerAddress($spyCustomerAddress, $comparison = null)
    {
        if ($spyCustomerAddress instanceof \Propel\SpyCustomerAddress) {
            return $this
                ->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $spyCustomerAddress->getFkCountry(), $comparison);
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function joinCustomerAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useCustomerAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterBySalesOrderAddress($spySalesOrderAddress, $comparison = null)
    {
        if ($spySalesOrderAddress instanceof \Propel\SpySalesOrderAddress) {
            return $this
                ->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $spySalesOrderAddress->getFkCountry(), $comparison);
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSalesOrderAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return ChildSpyCountryQuery The current query, for fluid interface
     */
    public function filterBySalesOrderAddressHistory($spySalesOrderAddressHistory, $comparison = null)
    {
        if ($spySalesOrderAddressHistory instanceof \Propel\SpySalesOrderAddressHistory) {
            return $this
                ->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $spySalesOrderAddressHistory->getFkCountry(), $comparison);
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
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddressHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSalesOrderAddressHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderAddressHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddressHistory', '\Propel\SpySalesOrderAddressHistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCountry $spyCountry Object to remove from the list of results
     *
     * @return $this|ChildSpyCountryQuery The current query, for fluid interface
     */
    public function prune($spyCountry = null)
    {
        if ($spyCountry) {
            $this->addUsingAlias(SpyCountryTableMap::COL_ID_COUNTRY, $spyCountry->getIdCountry(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_country table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCountryTableMap::clearInstancePool();
            SpyCountryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCountryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCountryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCountryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCountryQuery
