<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionTypeUsage as ChildSpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageQuery as ChildSpyProductOptionTypeUsageQuery;
use Propel\Map\SpyProductOptionTypeUsageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_type_usage' table.
 *
 *
 *
 * @method     ChildSpyProductOptionTypeUsageQuery orderByIdProductOptionTypeUsage($order = Criteria::ASC) Order by the id_product_option_type_usage column
 * @method     ChildSpyProductOptionTypeUsageQuery orderByIsOptional($order = Criteria::ASC) Order by the is_optional column
 * @method     ChildSpyProductOptionTypeUsageQuery orderBySequence($order = Criteria::ASC) Order by the sequence column
 * @method     ChildSpyProductOptionTypeUsageQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpyProductOptionTypeUsageQuery orderByFkProductOptionType($order = Criteria::ASC) Order by the fk_product_option_type column
 *
 * @method     ChildSpyProductOptionTypeUsageQuery groupByIdProductOptionTypeUsage() Group by the id_product_option_type_usage column
 * @method     ChildSpyProductOptionTypeUsageQuery groupByIsOptional() Group by the is_optional column
 * @method     ChildSpyProductOptionTypeUsageQuery groupBySequence() Group by the sequence column
 * @method     ChildSpyProductOptionTypeUsageQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpyProductOptionTypeUsageQuery groupByFkProductOptionType() Group by the fk_product_option_type column
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoinSpyProductOptionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoinSpyProductOptionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoinSpyProductOptionType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionType relation
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoinSpyProductOptionValueUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueUsage relation
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoinSpyProductOptionValueUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueUsage relation
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoinSpyProductOptionValueUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueUsage relation
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA relation
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA relation
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA relation
 *
 * @method     ChildSpyProductOptionTypeUsageQuery leftJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB relation
 * @method     ChildSpyProductOptionTypeUsageQuery rightJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB relation
 * @method     ChildSpyProductOptionTypeUsageQuery innerJoinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB relation
 *
 * @method     \Propel\SpyProductQuery|\Propel\SpyProductOptionTypeQuery|\Propel\SpyProductOptionValueUsageQuery|\Propel\SpyProductOptionTypeUsageExclusionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionTypeUsage findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsage matching the query
 * @method     ChildSpyProductOptionTypeUsage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsage matching the query, or a new ChildSpyProductOptionTypeUsage object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionTypeUsage findOneByIdProductOptionTypeUsage(int $id_product_option_type_usage) Return the first ChildSpyProductOptionTypeUsage filtered by the id_product_option_type_usage column
 * @method     ChildSpyProductOptionTypeUsage findOneByIsOptional(int $is_optional) Return the first ChildSpyProductOptionTypeUsage filtered by the is_optional column
 * @method     ChildSpyProductOptionTypeUsage findOneBySequence(int $sequence) Return the first ChildSpyProductOptionTypeUsage filtered by the sequence column
 * @method     ChildSpyProductOptionTypeUsage findOneByFkProduct(int $fk_product) Return the first ChildSpyProductOptionTypeUsage filtered by the fk_product column
 * @method     ChildSpyProductOptionTypeUsage findOneByFkProductOptionType(int $fk_product_option_type) Return the first ChildSpyProductOptionTypeUsage filtered by the fk_product_option_type column *

 * @method     ChildSpyProductOptionTypeUsage requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionTypeUsage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsage requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionTypeUsage requireOneByIdProductOptionTypeUsage(int $id_product_option_type_usage) Return the first ChildSpyProductOptionTypeUsage filtered by the id_product_option_type_usage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsage requireOneByIsOptional(int $is_optional) Return the first ChildSpyProductOptionTypeUsage filtered by the is_optional column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsage requireOneBySequence(int $sequence) Return the first ChildSpyProductOptionTypeUsage filtered by the sequence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsage requireOneByFkProduct(int $fk_product) Return the first ChildSpyProductOptionTypeUsage filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsage requireOneByFkProductOptionType(int $fk_product_option_type) Return the first ChildSpyProductOptionTypeUsage filtered by the fk_product_option_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionTypeUsage objects based on current ModelCriteria
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection findByIdProductOptionTypeUsage(int $id_product_option_type_usage) Return ChildSpyProductOptionTypeUsage objects filtered by the id_product_option_type_usage column
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection findByIsOptional(int $is_optional) Return ChildSpyProductOptionTypeUsage objects filtered by the is_optional column
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection findBySequence(int $sequence) Return ChildSpyProductOptionTypeUsage objects filtered by the sequence column
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyProductOptionTypeUsage objects filtered by the fk_product column
 * @method     ChildSpyProductOptionTypeUsage[]|ObjectCollection findByFkProductOptionType(int $fk_product_option_type) Return ChildSpyProductOptionTypeUsage objects filtered by the fk_product_option_type column
 * @method     ChildSpyProductOptionTypeUsage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionTypeUsageQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionTypeUsageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionTypeUsage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionTypeUsageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionTypeUsageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionTypeUsageQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionTypeUsageQuery();
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
     * @return ChildSpyProductOptionTypeUsage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionTypeUsageTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionTypeUsage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_option_type_usage, is_optional, sequence, fk_product, fk_product_option_type FROM spy_product_option_type_usage WHERE id_product_option_type_usage = :p0';
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
            /** @var ChildSpyProductOptionTypeUsage $obj */
            $obj = new ChildSpyProductOptionTypeUsage();
            $obj->hydrate($row);
            SpyProductOptionTypeUsageTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductOptionTypeUsage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_option_type_usage column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductOptionTypeUsage(1234); // WHERE id_product_option_type_usage = 1234
     * $query->filterByIdProductOptionTypeUsage(array(12, 34)); // WHERE id_product_option_type_usage IN (12, 34)
     * $query->filterByIdProductOptionTypeUsage(array('min' => 12)); // WHERE id_product_option_type_usage > 12
     * </code>
     *
     * @param     mixed $idProductOptionTypeUsage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByIdProductOptionTypeUsage($idProductOptionTypeUsage = null, $comparison = null)
    {
        if (is_array($idProductOptionTypeUsage)) {
            $useMinMax = false;
            if (isset($idProductOptionTypeUsage['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $idProductOptionTypeUsage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductOptionTypeUsage['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $idProductOptionTypeUsage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $idProductOptionTypeUsage, $comparison);
    }

    /**
     * Filter the query on the is_optional column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOptional(1234); // WHERE is_optional = 1234
     * $query->filterByIsOptional(array(12, 34)); // WHERE is_optional IN (12, 34)
     * $query->filterByIsOptional(array('min' => 12)); // WHERE is_optional > 12
     * </code>
     *
     * @param     mixed $isOptional The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByIsOptional($isOptional = null, $comparison = null)
    {
        if (is_array($isOptional)) {
            $useMinMax = false;
            if (isset($isOptional['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL, $isOptional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isOptional['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL, $isOptional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL, $isOptional, $comparison);
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
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySequence($sequence = null, $comparison = null)
    {
        if (is_array($sequence)) {
            $useMinMax = false;
            if (isset($sequence['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE, $sequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequence['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE, $sequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE, $sequence, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product > 12
     * </code>
     *
     * @see       filterBySpyProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionType(1234); // WHERE fk_product_option_type = 1234
     * $query->filterByFkProductOptionType(array(12, 34)); // WHERE fk_product_option_type IN (12, 34)
     * $query->filterByFkProductOptionType(array('min' => 12)); // WHERE fk_product_option_type > 12
     * </code>
     *
     * @see       filterBySpyProductOptionType()
     *
     * @param     mixed $fkProductOptionType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionType($fkProductOptionType = null, $comparison = null)
    {
        if (is_array($fkProductOptionType)) {
            $useMinMax = false;
            if (isset($fkProductOptionType['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionType['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProduct');

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
            $this->addJoinObject($join, 'SpyProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionType object
     *
     * @param \Propel\SpyProductOptionType|ObjectCollection $spyProductOptionType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionType($spyProductOptionType, $comparison = null)
    {
        if ($spyProductOptionType instanceof \Propel\SpyProductOptionType) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $spyProductOptionType->getIdProductOptionType(), $comparison);
        } elseif ($spyProductOptionType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $spyProductOptionType->toKeyValue('PrimaryKey', 'IdProductOptionType'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductOptionType() only accepts arguments of type \Propel\SpyProductOptionType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionType');

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
            $this->addJoinObject($join, 'SpyProductOptionType');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionType relation SpyProductOptionType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionType', '\Propel\SpyProductOptionTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsage object
     *
     * @param \Propel\SpyProductOptionValueUsage|ObjectCollection $spyProductOptionValueUsage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueUsage($spyProductOptionValueUsage, $comparison = null)
    {
        if ($spyProductOptionValueUsage instanceof \Propel\SpyProductOptionValueUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionValueUsage->getFkProductOptionTypeUsage(), $comparison);
        } elseif ($spyProductOptionValueUsage instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueUsageQuery()
                ->filterByPrimaryKeys($spyProductOptionValueUsage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionValueUsage() only accepts arguments of type \Propel\SpyProductOptionValueUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValueUsage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValueUsage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValueUsage');

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
            $this->addJoinObject($join, 'SpyProductOptionValueUsage');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValueUsage relation SpyProductOptionValueUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueUsageQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueUsageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValueUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValueUsage', '\Propel\SpyProductOptionValueUsageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsageExclusion object
     *
     * @param \Propel\SpyProductOptionTypeUsageExclusion|ObjectCollection $spyProductOptionTypeUsageExclusion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($spyProductOptionTypeUsageExclusion, $comparison = null)
    {
        if ($spyProductOptionTypeUsageExclusion instanceof \Propel\SpyProductOptionTypeUsageExclusion) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionTypeUsageExclusion->getFkProductOptionTypeUsageA(), $comparison);
        } elseif ($spyProductOptionTypeUsageExclusion instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageAQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeUsageExclusion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA() only accepts arguments of type \Propel\SpyProductOptionTypeUsageExclusion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA relation SpyProductOptionTypeUsageExclusion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageExclusionQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageAQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA', '\Propel\SpyProductOptionTypeUsageExclusionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsageExclusion object
     *
     * @param \Propel\SpyProductOptionTypeUsageExclusion|ObjectCollection $spyProductOptionTypeUsageExclusion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($spyProductOptionTypeUsageExclusion, $comparison = null)
    {
        if ($spyProductOptionTypeUsageExclusion instanceof \Propel\SpyProductOptionTypeUsageExclusion) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionTypeUsageExclusion->getFkProductOptionTypeUsageB(), $comparison);
        } elseif ($spyProductOptionTypeUsageExclusion instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageBQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeUsageExclusion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB() only accepts arguments of type \Propel\SpyProductOptionTypeUsageExclusion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB relation SpyProductOptionTypeUsageExclusion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageExclusionQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageBQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB', '\Propel\SpyProductOptionTypeUsageExclusionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionTypeUsageQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionTypeUsage = null)
    {
        if ($spyProductOptionTypeUsage) {
            $this->addUsingAlias(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $spyProductOptionTypeUsage->getIdProductOptionTypeUsage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_type_usage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionTypeUsageTableMap::clearInstancePool();
            SpyProductOptionTypeUsageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionTypeUsageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionTypeUsageTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);

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

} // SpyProductOptionTypeUsageQuery
