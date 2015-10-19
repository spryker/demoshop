<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionType as ChildSpyProductOptionType;
use Propel\SpyProductOptionTypeQuery as ChildSpyProductOptionTypeQuery;
use Propel\Map\SpyProductOptionTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_type' table.
 *
 *
 *
 * @method     ChildSpyProductOptionTypeQuery orderByIdProductOptionType($order = Criteria::ASC) Order by the id_product_option_type column
 * @method     ChildSpyProductOptionTypeQuery orderByImportKey($order = Criteria::ASC) Order by the import_key column
 * @method     ChildSpyProductOptionTypeQuery orderByFkTaxSet($order = Criteria::ASC) Order by the fk_tax_set column
 *
 * @method     ChildSpyProductOptionTypeQuery groupByIdProductOptionType() Group by the id_product_option_type column
 * @method     ChildSpyProductOptionTypeQuery groupByImportKey() Group by the import_key column
 * @method     ChildSpyProductOptionTypeQuery groupByFkTaxSet() Group by the fk_tax_set column
 *
 * @method     ChildSpyProductOptionTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionTypeQuery leftJoinSpyTaxSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyProductOptionTypeQuery rightJoinSpyTaxSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyProductOptionTypeQuery innerJoinSpyTaxSet($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxSet relation
 *
 * @method     ChildSpyProductOptionTypeQuery leftJoinSpyProductOptionValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionTypeQuery rightJoinSpyProductOptionValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionTypeQuery innerJoinSpyProductOptionValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValue relation
 *
 * @method     ChildSpyProductOptionTypeQuery leftJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 * @method     ChildSpyProductOptionTypeQuery rightJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 * @method     ChildSpyProductOptionTypeQuery innerJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 *
 * @method     ChildSpyProductOptionTypeQuery leftJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductOptionTypeQuery rightJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductOptionTypeQuery innerJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeUsage relation
 *
 * @method     \Propel\SpyTaxSetQuery|\Propel\SpyProductOptionValueQuery|\Propel\SpyProductOptionTypeTranslationQuery|\Propel\SpyProductOptionTypeUsageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionType findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionType matching the query
 * @method     ChildSpyProductOptionType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionType matching the query, or a new ChildSpyProductOptionType object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionType findOneByIdProductOptionType(int $id_product_option_type) Return the first ChildSpyProductOptionType filtered by the id_product_option_type column
 * @method     ChildSpyProductOptionType findOneByImportKey(string $import_key) Return the first ChildSpyProductOptionType filtered by the import_key column
 * @method     ChildSpyProductOptionType findOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyProductOptionType filtered by the fk_tax_set column *

 * @method     ChildSpyProductOptionType requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionType requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionType requireOneByIdProductOptionType(int $id_product_option_type) Return the first ChildSpyProductOptionType filtered by the id_product_option_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionType requireOneByImportKey(string $import_key) Return the first ChildSpyProductOptionType filtered by the import_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionType requireOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyProductOptionType filtered by the fk_tax_set column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionType objects based on current ModelCriteria
 * @method     ChildSpyProductOptionType[]|ObjectCollection findByIdProductOptionType(int $id_product_option_type) Return ChildSpyProductOptionType objects filtered by the id_product_option_type column
 * @method     ChildSpyProductOptionType[]|ObjectCollection findByImportKey(string $import_key) Return ChildSpyProductOptionType objects filtered by the import_key column
 * @method     ChildSpyProductOptionType[]|ObjectCollection findByFkTaxSet(int $fk_tax_set) Return ChildSpyProductOptionType objects filtered by the fk_tax_set column
 * @method     ChildSpyProductOptionType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionTypeQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionTypeQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionTypeQuery();
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
     * @return ChildSpyProductOptionType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_option_type, import_key, fk_tax_set FROM spy_product_option_type WHERE id_product_option_type = :p0';
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
            /** @var ChildSpyProductOptionType $obj */
            $obj = new ChildSpyProductOptionType();
            $obj->hydrate($row);
            SpyProductOptionTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductOptionType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_option_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductOptionType(1234); // WHERE id_product_option_type = 1234
     * $query->filterByIdProductOptionType(array(12, 34)); // WHERE id_product_option_type IN (12, 34)
     * $query->filterByIdProductOptionType(array('min' => 12)); // WHERE id_product_option_type > 12
     * </code>
     *
     * @param     mixed $idProductOptionType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterByIdProductOptionType($idProductOptionType = null, $comparison = null)
    {
        if (is_array($idProductOptionType)) {
            $useMinMax = false;
            if (isset($idProductOptionType['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $idProductOptionType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductOptionType['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $idProductOptionType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $idProductOptionType, $comparison);
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
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_IMPORT_KEY, $importKey, $comparison);
    }

    /**
     * Filter the query on the fk_tax_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTaxSet(1234); // WHERE fk_tax_set = 1234
     * $query->filterByFkTaxSet(array(12, 34)); // WHERE fk_tax_set IN (12, 34)
     * $query->filterByFkTaxSet(array('min' => 12)); // WHERE fk_tax_set > 12
     * </code>
     *
     * @see       filterBySpyTaxSet()
     *
     * @param     mixed $fkTaxSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterByFkTaxSet($fkTaxSet = null, $comparison = null)
    {
        if (is_array($fkTaxSet)) {
            $useMinMax = false;
            if (isset($fkTaxSet['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $fkTaxSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTaxSet['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $fkTaxSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $fkTaxSet, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSet object
     *
     * @param \Propel\SpyTaxSet|ObjectCollection $spyTaxSet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSet($spyTaxSet, $comparison = null)
    {
        if ($spyTaxSet instanceof \Propel\SpyTaxSet) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $spyTaxSet->getIdTaxSet(), $comparison);
        } elseif ($spyTaxSet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $spyTaxSet->toKeyValue('PrimaryKey', 'IdTaxSet'), $comparison);
        } else {
            throw new PropelException('filterBySpyTaxSet() only accepts arguments of type \Propel\SpyTaxSet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function joinSpyTaxSet($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxSet');

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
            $this->addJoinObject($join, 'SpyTaxSet');
        }

        return $this;
    }

    /**
     * Use the SpyTaxSet relation SpyTaxSet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxSetQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyTaxSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxSet', '\Propel\SpyTaxSetQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValue object
     *
     * @param \Propel\SpyProductOptionValue|ObjectCollection $spyProductOptionValue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValue($spyProductOptionValue, $comparison = null)
    {
        if ($spyProductOptionValue instanceof \Propel\SpyProductOptionValue) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $spyProductOptionValue->getFkProductOptionType(), $comparison);
        } elseif ($spyProductOptionValue instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueQuery()
                ->filterByPrimaryKeys($spyProductOptionValue->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyProductOptionTypeTranslation object
     *
     * @param \Propel\SpyProductOptionTypeTranslation|ObjectCollection $spyProductOptionTypeTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeTranslation($spyProductOptionTypeTranslation, $comparison = null)
    {
        if ($spyProductOptionTypeTranslation instanceof \Propel\SpyProductOptionTypeTranslation) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $spyProductOptionTypeTranslation->getFkProductOptionType(), $comparison);
        } elseif ($spyProductOptionTypeTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeTranslationQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionTypeTranslation() only accepts arguments of type \Propel\SpyProductOptionTypeTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeTranslation');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeTranslation relation SpyProductOptionTypeTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeTranslation', '\Propel\SpyProductOptionTypeTranslationQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsage object
     *
     * @param \Propel\SpyProductOptionTypeUsage|ObjectCollection $spyProductOptionTypeUsage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeUsage($spyProductOptionTypeUsage, $comparison = null)
    {
        if ($spyProductOptionTypeUsage instanceof \Propel\SpyProductOptionTypeUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $spyProductOptionTypeUsage->getFkProductOptionType(), $comparison);
        } elseif ($spyProductOptionTypeUsage instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeUsageQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeUsage->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionType $spyProductOptionType Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionTypeQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionType = null)
    {
        if ($spyProductOptionType) {
            $this->addUsingAlias(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $spyProductOptionType->getIdProductOptionType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionTypeTableMap::clearInstancePool();
            SpyProductOptionTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionTypeTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionTypeTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionTypeTableMap::DATABASE_NAME);

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

} // SpyProductOptionTypeQuery
