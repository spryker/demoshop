<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionValue as ChildSpyProductOptionValue;
use Propel\SpyProductOptionValueQuery as ChildSpyProductOptionValueQuery;
use Propel\Map\SpyProductOptionValueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_value' table.
 *
 *
 *
 * @method     ChildSpyProductOptionValueQuery orderByIdProductOptionValue($order = Criteria::ASC) Order by the id_product_option_value column
 * @method     ChildSpyProductOptionValueQuery orderByImportKey($order = Criteria::ASC) Order by the import_key column
 * @method     ChildSpyProductOptionValueQuery orderByFkProductOptionType($order = Criteria::ASC) Order by the fk_product_option_type column
 * @method     ChildSpyProductOptionValueQuery orderByFkProductOptionValuePrice($order = Criteria::ASC) Order by the fk_product_option_value_price column
 *
 * @method     ChildSpyProductOptionValueQuery groupByIdProductOptionValue() Group by the id_product_option_value column
 * @method     ChildSpyProductOptionValueQuery groupByImportKey() Group by the import_key column
 * @method     ChildSpyProductOptionValueQuery groupByFkProductOptionType() Group by the fk_product_option_type column
 * @method     ChildSpyProductOptionValueQuery groupByFkProductOptionValuePrice() Group by the fk_product_option_value_price column
 *
 * @method     ChildSpyProductOptionValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionValueQuery leftJoinSpyProductOptionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyProductOptionValueQuery rightJoinSpyProductOptionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyProductOptionValueQuery innerJoinSpyProductOptionType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionType relation
 *
 * @method     ChildSpyProductOptionValueQuery leftJoinSpyProductOptionValuePrice($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValuePrice relation
 * @method     ChildSpyProductOptionValueQuery rightJoinSpyProductOptionValuePrice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValuePrice relation
 * @method     ChildSpyProductOptionValueQuery innerJoinSpyProductOptionValuePrice($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValuePrice relation
 *
 * @method     ChildSpyProductOptionValueQuery leftJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueTranslation relation
 * @method     ChildSpyProductOptionValueQuery rightJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueTranslation relation
 * @method     ChildSpyProductOptionValueQuery innerJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueTranslation relation
 *
 * @method     ChildSpyProductOptionValueQuery leftJoinSpyProductOptionValueUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueUsage relation
 * @method     ChildSpyProductOptionValueQuery rightJoinSpyProductOptionValueUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueUsage relation
 * @method     ChildSpyProductOptionValueQuery innerJoinSpyProductOptionValueUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueUsage relation
 *
 * @method     \Propel\SpyProductOptionTypeQuery|\Propel\SpyProductOptionValuePriceQuery|\Propel\SpyProductOptionValueTranslationQuery|\Propel\SpyProductOptionValueUsageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionValue findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValue matching the query
 * @method     ChildSpyProductOptionValue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValue matching the query, or a new ChildSpyProductOptionValue object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionValue findOneByIdProductOptionValue(int $id_product_option_value) Return the first ChildSpyProductOptionValue filtered by the id_product_option_value column
 * @method     ChildSpyProductOptionValue findOneByImportKey(string $import_key) Return the first ChildSpyProductOptionValue filtered by the import_key column
 * @method     ChildSpyProductOptionValue findOneByFkProductOptionType(int $fk_product_option_type) Return the first ChildSpyProductOptionValue filtered by the fk_product_option_type column
 * @method     ChildSpyProductOptionValue findOneByFkProductOptionValuePrice(int $fk_product_option_value_price) Return the first ChildSpyProductOptionValue filtered by the fk_product_option_value_price column *

 * @method     ChildSpyProductOptionValue requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionValue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValue requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValue requireOneByIdProductOptionValue(int $id_product_option_value) Return the first ChildSpyProductOptionValue filtered by the id_product_option_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValue requireOneByImportKey(string $import_key) Return the first ChildSpyProductOptionValue filtered by the import_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValue requireOneByFkProductOptionType(int $fk_product_option_type) Return the first ChildSpyProductOptionValue filtered by the fk_product_option_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValue requireOneByFkProductOptionValuePrice(int $fk_product_option_value_price) Return the first ChildSpyProductOptionValue filtered by the fk_product_option_value_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionValue objects based on current ModelCriteria
 * @method     ChildSpyProductOptionValue[]|ObjectCollection findByIdProductOptionValue(int $id_product_option_value) Return ChildSpyProductOptionValue objects filtered by the id_product_option_value column
 * @method     ChildSpyProductOptionValue[]|ObjectCollection findByImportKey(string $import_key) Return ChildSpyProductOptionValue objects filtered by the import_key column
 * @method     ChildSpyProductOptionValue[]|ObjectCollection findByFkProductOptionType(int $fk_product_option_type) Return ChildSpyProductOptionValue objects filtered by the fk_product_option_type column
 * @method     ChildSpyProductOptionValue[]|ObjectCollection findByFkProductOptionValuePrice(int $fk_product_option_value_price) Return ChildSpyProductOptionValue objects filtered by the fk_product_option_value_price column
 * @method     ChildSpyProductOptionValue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionValueQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionValueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionValueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionValueQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionValueQuery();
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
     * @return ChildSpyProductOptionValue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionValueTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionValue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_option_value, import_key, fk_product_option_type, fk_product_option_value_price FROM spy_product_option_value WHERE id_product_option_value = :p0';
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
            /** @var ChildSpyProductOptionValue $obj */
            $obj = new ChildSpyProductOptionValue();
            $obj->hydrate($row);
            SpyProductOptionValueTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductOptionValue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_option_value column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductOptionValue(1234); // WHERE id_product_option_value = 1234
     * $query->filterByIdProductOptionValue(array(12, 34)); // WHERE id_product_option_value IN (12, 34)
     * $query->filterByIdProductOptionValue(array('min' => 12)); // WHERE id_product_option_value > 12
     * </code>
     *
     * @param     mixed $idProductOptionValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByIdProductOptionValue($idProductOptionValue = null, $comparison = null)
    {
        if (is_array($idProductOptionValue)) {
            $useMinMax = false;
            if (isset($idProductOptionValue['min'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $idProductOptionValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductOptionValue['max'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $idProductOptionValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $idProductOptionValue, $comparison);
    }

    /**
     * Filter the query on the import_key column
     *
     * Example usage:
     * <code>
     * $query->filterByImportKey('fooValue');   // WHERE import_key = 'fooValue'
     * $query->filterByImportKey('%fooValue%'); // WHERE import_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $importKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByImportKey($importKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($importKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $importKey)) {
                $importKey = str_replace('*', '%', $importKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_IMPORT_KEY, $importKey, $comparison);
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
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionType($fkProductOptionType = null, $comparison = null)
    {
        if (is_array($fkProductOptionType)) {
            $useMinMax = false;
            if (isset($fkProductOptionType['min'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionType['max'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $fkProductOptionType, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_value_price column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionValuePrice(1234); // WHERE fk_product_option_value_price = 1234
     * $query->filterByFkProductOptionValuePrice(array(12, 34)); // WHERE fk_product_option_value_price IN (12, 34)
     * $query->filterByFkProductOptionValuePrice(array('min' => 12)); // WHERE fk_product_option_value_price > 12
     * </code>
     *
     * @see       filterBySpyProductOptionValuePrice()
     *
     * @param     mixed $fkProductOptionValuePrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionValuePrice($fkProductOptionValuePrice = null, $comparison = null)
    {
        if (is_array($fkProductOptionValuePrice)) {
            $useMinMax = false;
            if (isset($fkProductOptionValuePrice['min'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $fkProductOptionValuePrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionValuePrice['max'])) {
                $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $fkProductOptionValuePrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $fkProductOptionValuePrice, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionType object
     *
     * @param \Propel\SpyProductOptionType|ObjectCollection $spyProductOptionType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionType($spyProductOptionType, $comparison = null)
    {
        if ($spyProductOptionType instanceof \Propel\SpyProductOptionType) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $spyProductOptionType->getIdProductOptionType(), $comparison);
        } elseif ($spyProductOptionType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $spyProductOptionType->toKeyValue('PrimaryKey', 'IdProductOptionType'), $comparison);
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
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyProductOptionValuePrice object
     *
     * @param \Propel\SpyProductOptionValuePrice|ObjectCollection $spyProductOptionValuePrice The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValuePrice($spyProductOptionValuePrice, $comparison = null)
    {
        if ($spyProductOptionValuePrice instanceof \Propel\SpyProductOptionValuePrice) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $spyProductOptionValuePrice->getIdProductOptionValuePrice(), $comparison);
        } elseif ($spyProductOptionValuePrice instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $spyProductOptionValuePrice->toKeyValue('PrimaryKey', 'IdProductOptionValuePrice'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductOptionValuePrice() only accepts arguments of type \Propel\SpyProductOptionValuePrice or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValuePrice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValuePrice($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValuePrice');

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
            $this->addJoinObject($join, 'SpyProductOptionValuePrice');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValuePrice relation SpyProductOptionValuePrice object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValuePriceQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValuePriceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductOptionValuePrice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValuePrice', '\Propel\SpyProductOptionValuePriceQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueTranslation object
     *
     * @param \Propel\SpyProductOptionValueTranslation|ObjectCollection $spyProductOptionValueTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueTranslation($spyProductOptionValueTranslation, $comparison = null)
    {
        if ($spyProductOptionValueTranslation instanceof \Propel\SpyProductOptionValueTranslation) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $spyProductOptionValueTranslation->getFkProductOptionValue(), $comparison);
        } elseif ($spyProductOptionValueTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueTranslationQuery()
                ->filterByPrimaryKeys($spyProductOptionValueTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionValueTranslation() only accepts arguments of type \Propel\SpyProductOptionValueTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValueTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValueTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValueTranslation');

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
            $this->addJoinObject($join, 'SpyProductOptionValueTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValueTranslation relation SpyProductOptionValueTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValueTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValueTranslation', '\Propel\SpyProductOptionValueTranslationQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsage object
     *
     * @param \Propel\SpyProductOptionValueUsage|ObjectCollection $spyProductOptionValueUsage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueUsage($spyProductOptionValueUsage, $comparison = null)
    {
        if ($spyProductOptionValueUsage instanceof \Propel\SpyProductOptionValueUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $spyProductOptionValueUsage->getFkProductOptionValue(), $comparison);
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
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionValue $spyProductOptionValue Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionValueQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionValue = null)
    {
        if ($spyProductOptionValue) {
            $this->addUsingAlias(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $spyProductOptionValue->getIdProductOptionValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionValueTableMap::clearInstancePool();
            SpyProductOptionValueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionValueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionValueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionValueTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionValueTableMap::DATABASE_NAME);

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

} // SpyProductOptionValueQuery
