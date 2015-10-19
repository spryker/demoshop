<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionValueUsage as ChildSpyProductOptionValueUsage;
use Propel\SpyProductOptionValueUsageQuery as ChildSpyProductOptionValueUsageQuery;
use Propel\Map\SpyProductOptionValueUsageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_value_usage' table.
 *
 *
 *
 * @method     ChildSpyProductOptionValueUsageQuery orderByIdProductOptionValueUsage($order = Criteria::ASC) Order by the id_product_option_value_usage column
 * @method     ChildSpyProductOptionValueUsageQuery orderBySequence($order = Criteria::ASC) Order by the sequence column
 * @method     ChildSpyProductOptionValueUsageQuery orderByFkProductOptionTypeUsage($order = Criteria::ASC) Order by the fk_product_option_type_usage column
 * @method     ChildSpyProductOptionValueUsageQuery orderByFkProductOptionValue($order = Criteria::ASC) Order by the fk_product_option_value column
 *
 * @method     ChildSpyProductOptionValueUsageQuery groupByIdProductOptionValueUsage() Group by the id_product_option_value_usage column
 * @method     ChildSpyProductOptionValueUsageQuery groupBySequence() Group by the sequence column
 * @method     ChildSpyProductOptionValueUsageQuery groupByFkProductOptionTypeUsage() Group by the fk_product_option_type_usage column
 * @method     ChildSpyProductOptionValueUsageQuery groupByFkProductOptionValue() Group by the fk_product_option_value column
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionValueUsageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionValueUsageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductOptionValueUsageQuery rightJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductOptionValueUsageQuery innerJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeUsage relation
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoinSpyProductOptionValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionValueUsageQuery rightJoinSpyProductOptionValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionValueUsageQuery innerJoinSpyProductOptionValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValue relation
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA relation
 * @method     ChildSpyProductOptionValueUsageQuery rightJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA relation
 * @method     ChildSpyProductOptionValueUsageQuery innerJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA relation
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB relation
 * @method     ChildSpyProductOptionValueUsageQuery rightJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB relation
 * @method     ChildSpyProductOptionValueUsageQuery innerJoinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB relation
 *
 * @method     ChildSpyProductOptionValueUsageQuery leftJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 * @method     ChildSpyProductOptionValueUsageQuery rightJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 * @method     ChildSpyProductOptionValueUsageQuery innerJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 *
 * @method     \Propel\SpyProductOptionTypeUsageQuery|\Propel\SpyProductOptionValueQuery|\Propel\SpyProductOptionValueUsageConstraintQuery|\Propel\SpyProductOptionConfigurationPresetValueQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionValueUsage findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsage matching the query
 * @method     ChildSpyProductOptionValueUsage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsage matching the query, or a new ChildSpyProductOptionValueUsage object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionValueUsage findOneByIdProductOptionValueUsage(int $id_product_option_value_usage) Return the first ChildSpyProductOptionValueUsage filtered by the id_product_option_value_usage column
 * @method     ChildSpyProductOptionValueUsage findOneBySequence(int $sequence) Return the first ChildSpyProductOptionValueUsage filtered by the sequence column
 * @method     ChildSpyProductOptionValueUsage findOneByFkProductOptionTypeUsage(int $fk_product_option_type_usage) Return the first ChildSpyProductOptionValueUsage filtered by the fk_product_option_type_usage column
 * @method     ChildSpyProductOptionValueUsage findOneByFkProductOptionValue(int $fk_product_option_value) Return the first ChildSpyProductOptionValueUsage filtered by the fk_product_option_value column *

 * @method     ChildSpyProductOptionValueUsage requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionValueUsage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsage requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueUsage requireOneByIdProductOptionValueUsage(int $id_product_option_value_usage) Return the first ChildSpyProductOptionValueUsage filtered by the id_product_option_value_usage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsage requireOneBySequence(int $sequence) Return the first ChildSpyProductOptionValueUsage filtered by the sequence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsage requireOneByFkProductOptionTypeUsage(int $fk_product_option_type_usage) Return the first ChildSpyProductOptionValueUsage filtered by the fk_product_option_type_usage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsage requireOneByFkProductOptionValue(int $fk_product_option_value) Return the first ChildSpyProductOptionValueUsage filtered by the fk_product_option_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueUsage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionValueUsage objects based on current ModelCriteria
 * @method     ChildSpyProductOptionValueUsage[]|ObjectCollection findByIdProductOptionValueUsage(int $id_product_option_value_usage) Return ChildSpyProductOptionValueUsage objects filtered by the id_product_option_value_usage column
 * @method     ChildSpyProductOptionValueUsage[]|ObjectCollection findBySequence(int $sequence) Return ChildSpyProductOptionValueUsage objects filtered by the sequence column
 * @method     ChildSpyProductOptionValueUsage[]|ObjectCollection findByFkProductOptionTypeUsage(int $fk_product_option_type_usage) Return ChildSpyProductOptionValueUsage objects filtered by the fk_product_option_type_usage column
 * @method     ChildSpyProductOptionValueUsage[]|ObjectCollection findByFkProductOptionValue(int $fk_product_option_value) Return ChildSpyProductOptionValueUsage objects filtered by the fk_product_option_value column
 * @method     ChildSpyProductOptionValueUsage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionValueUsageQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionValueUsageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionValueUsage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionValueUsageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionValueUsageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionValueUsageQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionValueUsageQuery();
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
     * @return ChildSpyProductOptionValueUsage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionValueUsageTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionValueUsage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_option_value_usage, sequence, fk_product_option_type_usage, fk_product_option_value FROM spy_product_option_value_usage WHERE id_product_option_value_usage = :p0';
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
            /** @var ChildSpyProductOptionValueUsage $obj */
            $obj = new ChildSpyProductOptionValueUsage();
            $obj->hydrate($row);
            SpyProductOptionValueUsageTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductOptionValueUsage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_option_value_usage column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductOptionValueUsage(1234); // WHERE id_product_option_value_usage = 1234
     * $query->filterByIdProductOptionValueUsage(array(12, 34)); // WHERE id_product_option_value_usage IN (12, 34)
     * $query->filterByIdProductOptionValueUsage(array('min' => 12)); // WHERE id_product_option_value_usage > 12
     * </code>
     *
     * @param     mixed $idProductOptionValueUsage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterByIdProductOptionValueUsage($idProductOptionValueUsage = null, $comparison = null)
    {
        if (is_array($idProductOptionValueUsage)) {
            $useMinMax = false;
            if (isset($idProductOptionValueUsage['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $idProductOptionValueUsage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductOptionValueUsage['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $idProductOptionValueUsage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $idProductOptionValueUsage, $comparison);
    }

    /**
     * Filter the query on the sequence column
     *
     * Example usage:
     * <code>
     * $query->filterBySequence(1234); // WHERE sequence = 1234
     * $query->filterBySequence(array(12, 34)); // WHERE sequence IN (12, 34)
     * $query->filterBySequence(array('min' => 12)); // WHERE sequence > 12
     * </code>
     *
     * @param     mixed $sequence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySequence($sequence = null, $comparison = null)
    {
        if (is_array($sequence)) {
            $useMinMax = false;
            if (isset($sequence['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_SEQUENCE, $sequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequence['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_SEQUENCE, $sequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_SEQUENCE, $sequence, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_type_usage column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionTypeUsage(1234); // WHERE fk_product_option_type_usage = 1234
     * $query->filterByFkProductOptionTypeUsage(array(12, 34)); // WHERE fk_product_option_type_usage IN (12, 34)
     * $query->filterByFkProductOptionTypeUsage(array('min' => 12)); // WHERE fk_product_option_type_usage > 12
     * </code>
     *
     * @see       filterBySpyProductOptionTypeUsage()
     *
     * @param     mixed $fkProductOptionTypeUsage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionTypeUsage($fkProductOptionTypeUsage = null, $comparison = null)
    {
        if (is_array($fkProductOptionTypeUsage)) {
            $useMinMax = false;
            if (isset($fkProductOptionTypeUsage['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $fkProductOptionTypeUsage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionTypeUsage['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $fkProductOptionTypeUsage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $fkProductOptionTypeUsage, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_value column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionValue(1234); // WHERE fk_product_option_value = 1234
     * $query->filterByFkProductOptionValue(array(12, 34)); // WHERE fk_product_option_value IN (12, 34)
     * $query->filterByFkProductOptionValue(array('min' => 12)); // WHERE fk_product_option_value > 12
     * </code>
     *
     * @see       filterBySpyProductOptionValue()
     *
     * @param     mixed $fkProductOptionValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionValue($fkProductOptionValue = null, $comparison = null)
    {
        if (is_array($fkProductOptionValue)) {
            $useMinMax = false;
            if (isset($fkProductOptionValue['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionValue['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsage object
     *
     * @param \Propel\SpyProductOptionTypeUsage|ObjectCollection $spyProductOptionTypeUsage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeUsage($spyProductOptionTypeUsage, $comparison = null)
    {
        if ($spyProductOptionTypeUsage instanceof \Propel\SpyProductOptionTypeUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionTypeUsage->getIdProductOptionTypeUsage(), $comparison);
        } elseif ($spyProductOptionTypeUsage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionTypeUsage->toKeyValue('PrimaryKey', 'IdProductOptionTypeUsage'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductOptionTypeUsage() only accepts arguments of type \Propel\SpyProductOptionTypeUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeUsage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeUsage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeUsage');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeUsage');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeUsage relation SpyProductOptionTypeUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeUsageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeUsage', '\Propel\SpyProductOptionTypeUsageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValue object
     *
     * @param \Propel\SpyProductOptionValue|ObjectCollection $spyProductOptionValue The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValue($spyProductOptionValue, $comparison = null)
    {
        if ($spyProductOptionValue instanceof \Propel\SpyProductOptionValue) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $spyProductOptionValue->getIdProductOptionValue(), $comparison);
        } elseif ($spyProductOptionValue instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $spyProductOptionValue->toKeyValue('PrimaryKey', 'IdProductOptionValue'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductOptionValue() only accepts arguments of type \Propel\SpyProductOptionValue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValue');

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
            $this->addJoinObject($join, 'SpyProductOptionValue');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValue relation SpyProductOptionValue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValue', '\Propel\SpyProductOptionValueQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsageConstraint object
     *
     * @param \Propel\SpyProductOptionValueUsageConstraint|ObjectCollection $spyProductOptionValueUsageConstraint the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($spyProductOptionValueUsageConstraint, $comparison = null)
    {
        if ($spyProductOptionValueUsageConstraint instanceof \Propel\SpyProductOptionValueUsageConstraint) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $spyProductOptionValueUsageConstraint->getFkProductOptionValueUsageA(), $comparison);
        } elseif ($spyProductOptionValueUsageConstraint instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageAQuery()
                ->filterByPrimaryKeys($spyProductOptionValueUsageConstraint->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA() only accepts arguments of type \Propel\SpyProductOptionValueUsageConstraint or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA');

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
            $this->addJoinObject($join, 'SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA relation SpyProductOptionValueUsageConstraint object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueUsageConstraintQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageAQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA', '\Propel\SpyProductOptionValueUsageConstraintQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsageConstraint object
     *
     * @param \Propel\SpyProductOptionValueUsageConstraint|ObjectCollection $spyProductOptionValueUsageConstraint the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($spyProductOptionValueUsageConstraint, $comparison = null)
    {
        if ($spyProductOptionValueUsageConstraint instanceof \Propel\SpyProductOptionValueUsageConstraint) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $spyProductOptionValueUsageConstraint->getFkProductOptionValueUsageB(), $comparison);
        } elseif ($spyProductOptionValueUsageConstraint instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageBQuery()
                ->filterByPrimaryKeys($spyProductOptionValueUsageConstraint->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB() only accepts arguments of type \Propel\SpyProductOptionValueUsageConstraint or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB');

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
            $this->addJoinObject($join, 'SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB relation SpyProductOptionValueUsageConstraint object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueUsageConstraintQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageBQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB', '\Propel\SpyProductOptionValueUsageConstraintQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionConfigurationPresetValue object
     *
     * @param \Propel\SpyProductOptionConfigurationPresetValue|ObjectCollection $spyProductOptionConfigurationPresetValue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionConfigurationPresetValue($spyProductOptionConfigurationPresetValue, $comparison = null)
    {
        if ($spyProductOptionConfigurationPresetValue instanceof \Propel\SpyProductOptionConfigurationPresetValue) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $spyProductOptionConfigurationPresetValue->getFkProductOptionValueUsage(), $comparison);
        } elseif ($spyProductOptionConfigurationPresetValue instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionConfigurationPresetValueQuery()
                ->filterByPrimaryKeys($spyProductOptionConfigurationPresetValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionConfigurationPresetValue() only accepts arguments of type \Propel\SpyProductOptionConfigurationPresetValue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionConfigurationPresetValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionConfigurationPresetValue');

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
            $this->addJoinObject($join, 'SpyProductOptionConfigurationPresetValue');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionConfigurationPresetValue relation SpyProductOptionConfigurationPresetValue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionConfigurationPresetValueQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionConfigurationPresetValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionConfigurationPresetValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionConfigurationPresetValue', '\Propel\SpyProductOptionConfigurationPresetValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionValueUsage $spyProductOptionValueUsage Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionValueUsageQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionValueUsage = null)
    {
        if ($spyProductOptionValueUsage) {
            $this->addUsingAlias(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $spyProductOptionValueUsage->getIdProductOptionValueUsage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_value_usage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionValueUsageTableMap::clearInstancePool();
            SpyProductOptionValueUsageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionValueUsageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionValueUsageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionValueUsageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // query_cache behavior

    public function setQueryKey($key)
    {
        $this->queryKey = $key;

        return $this;
    }

    public function getQueryKey()
    {
        return $this->queryKey;
    }

    public function cacheContains($key)
    {

        return isset(self::$cacheBackend[$key]);
    }

    public function cacheFetch($key)
    {

        return isset(self::$cacheBackend[$key]) ? self::$cacheBackend[$key] : null;
    }

    public function cacheStore($key, $value, $lifetime = 600)
    {
        self::$cacheBackend[$key] = $value;
    }

    public function doSelect(ConnectionInterface $con = null)
    {
        // check that the columns of the main class are already added (if this is the primary ModelCriteria)
        if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
            $this->addSelfSelectColumns();
        }
        $this->configureSelectColumns();

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionValueUsageTableMap::DATABASE_NAME);

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            $params = array();
            $sql = $this->createSelectSql($params);
            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
            } catch (Exception $e) {
                Propel::log($e->getMessage(), Propel::LOG_ERR);
                throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
            }

        return $con->getDataFetcher($stmt);
    }

    public function doCount(ConnectionInterface $con = null)
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap($this->getDbName());
        $db = Propel::getServiceContainer()->getAdapter($this->getDbName());

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            // check that the columns of the main class are already added (if this is the primary ModelCriteria)
            if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
                $this->addSelfSelectColumns();
            }

            $this->configureSelectColumns();

            $needsComplexCount = $this->getGroupByColumns()
                || $this->getOffset()
                || $this->getLimit()
                || $this->getHaving()
                || in_array(Criteria::DISTINCT, $this->getSelectModifiers());

            $params = array();
            if ($needsComplexCount) {
                if ($this->needsSelectAliases()) {
                    if ($this->getHaving()) {
                        throw new PropelException('Propel cannot create a COUNT query when using HAVING and  duplicate column names in the SELECT part');
                    }
                    $db->turnSelectColumnsToAliases($this);
                }
                $selectSql = $this->createSelectSql($params);
                $sql = 'SELECT COUNT(*) FROM (' . $selectSql . ') propelmatch4cnt';
            } else {
                // Replace SELECT columns with COUNT(*)
                $this->clearSelectColumns()->addSelectColumn('COUNT(*)');
                $sql = $this->createSelectSql($params);
            }

            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute COUNT statement [%s]', $sql), 0, $e);
        }

        return $con->getDataFetcher($stmt);
    }

} // SpyProductOptionValueUsageQuery
