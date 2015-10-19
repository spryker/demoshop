<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionConfigurationPreset as ChildSpyProductOptionConfigurationPreset;
use Propel\SpyProductOptionConfigurationPresetQuery as ChildSpyProductOptionConfigurationPresetQuery;
use Propel\Map\SpyProductOptionConfigurationPresetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_configuration_preset' table.
 *
 *
 *
 * @method     ChildSpyProductOptionConfigurationPresetQuery orderByIdProductOptionConfigurationPreset($order = Criteria::ASC) Order by the id_product_option_configuration_preset column
 * @method     ChildSpyProductOptionConfigurationPresetQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method     ChildSpyProductOptionConfigurationPresetQuery orderBySequence($order = Criteria::ASC) Order by the sequence column
 * @method     ChildSpyProductOptionConfigurationPresetQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 *
 * @method     ChildSpyProductOptionConfigurationPresetQuery groupByIdProductOptionConfigurationPreset() Group by the id_product_option_configuration_preset column
 * @method     ChildSpyProductOptionConfigurationPresetQuery groupByIsDefault() Group by the is_default column
 * @method     ChildSpyProductOptionConfigurationPresetQuery groupBySequence() Group by the sequence column
 * @method     ChildSpyProductOptionConfigurationPresetQuery groupByFkProduct() Group by the fk_product column
 *
 * @method     ChildSpyProductOptionConfigurationPresetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionConfigurationPresetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionConfigurationPresetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionConfigurationPresetQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyProductOptionConfigurationPresetQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyProductOptionConfigurationPresetQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyProductOptionConfigurationPresetQuery leftJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 * @method     ChildSpyProductOptionConfigurationPresetQuery rightJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 * @method     ChildSpyProductOptionConfigurationPresetQuery innerJoinSpyProductOptionConfigurationPresetValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionConfigurationPresetValue relation
 *
 * @method     \Propel\SpyProductQuery|\Propel\SpyProductOptionConfigurationPresetValueQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionConfigurationPreset findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionConfigurationPreset matching the query
 * @method     ChildSpyProductOptionConfigurationPreset findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionConfigurationPreset matching the query, or a new ChildSpyProductOptionConfigurationPreset object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionConfigurationPreset findOneByIdProductOptionConfigurationPreset(int $id_product_option_configuration_preset) Return the first ChildSpyProductOptionConfigurationPreset filtered by the id_product_option_configuration_preset column
 * @method     ChildSpyProductOptionConfigurationPreset findOneByIsDefault(boolean $is_default) Return the first ChildSpyProductOptionConfigurationPreset filtered by the is_default column
 * @method     ChildSpyProductOptionConfigurationPreset findOneBySequence(int $sequence) Return the first ChildSpyProductOptionConfigurationPreset filtered by the sequence column
 * @method     ChildSpyProductOptionConfigurationPreset findOneByFkProduct(int $fk_product) Return the first ChildSpyProductOptionConfigurationPreset filtered by the fk_product column *

 * @method     ChildSpyProductOptionConfigurationPreset requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionConfigurationPreset by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionConfigurationPreset requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionConfigurationPreset matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionConfigurationPreset requireOneByIdProductOptionConfigurationPreset(int $id_product_option_configuration_preset) Return the first ChildSpyProductOptionConfigurationPreset filtered by the id_product_option_configuration_preset column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionConfigurationPreset requireOneByIsDefault(boolean $is_default) Return the first ChildSpyProductOptionConfigurationPreset filtered by the is_default column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionConfigurationPreset requireOneBySequence(int $sequence) Return the first ChildSpyProductOptionConfigurationPreset filtered by the sequence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionConfigurationPreset requireOneByFkProduct(int $fk_product) Return the first ChildSpyProductOptionConfigurationPreset filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionConfigurationPreset[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionConfigurationPreset objects based on current ModelCriteria
 * @method     ChildSpyProductOptionConfigurationPreset[]|ObjectCollection findByIdProductOptionConfigurationPreset(int $id_product_option_configuration_preset) Return ChildSpyProductOptionConfigurationPreset objects filtered by the id_product_option_configuration_preset column
 * @method     ChildSpyProductOptionConfigurationPreset[]|ObjectCollection findByIsDefault(boolean $is_default) Return ChildSpyProductOptionConfigurationPreset objects filtered by the is_default column
 * @method     ChildSpyProductOptionConfigurationPreset[]|ObjectCollection findBySequence(int $sequence) Return ChildSpyProductOptionConfigurationPreset objects filtered by the sequence column
 * @method     ChildSpyProductOptionConfigurationPreset[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyProductOptionConfigurationPreset objects filtered by the fk_product column
 * @method     ChildSpyProductOptionConfigurationPreset[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionConfigurationPresetQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionConfigurationPresetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionConfigurationPreset', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionConfigurationPresetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionConfigurationPresetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionConfigurationPresetQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionConfigurationPresetQuery();
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
     * @return ChildSpyProductOptionConfigurationPreset|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionConfigurationPresetTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionConfigurationPreset A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_option_configuration_preset, is_default, sequence, fk_product FROM spy_product_option_configuration_preset WHERE id_product_option_configuration_preset = :p0';
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
            /** @var ChildSpyProductOptionConfigurationPreset $obj */
            $obj = new ChildSpyProductOptionConfigurationPreset();
            $obj->hydrate($row);
            SpyProductOptionConfigurationPresetTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductOptionConfigurationPreset|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_option_configuration_preset column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductOptionConfigurationPreset(1234); // WHERE id_product_option_configuration_preset = 1234
     * $query->filterByIdProductOptionConfigurationPreset(array(12, 34)); // WHERE id_product_option_configuration_preset IN (12, 34)
     * $query->filterByIdProductOptionConfigurationPreset(array('min' => 12)); // WHERE id_product_option_configuration_preset > 12
     * </code>
     *
     * @param     mixed $idProductOptionConfigurationPreset The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterByIdProductOptionConfigurationPreset($idProductOptionConfigurationPreset = null, $comparison = null)
    {
        if (is_array($idProductOptionConfigurationPreset)) {
            $useMinMax = false;
            if (isset($idProductOptionConfigurationPreset['min'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $idProductOptionConfigurationPreset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductOptionConfigurationPreset['max'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $idProductOptionConfigurationPreset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $idProductOptionConfigurationPreset, $comparison);
    }

    /**
     * Filter the query on the is_default column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDefault(true); // WHERE is_default = true
     * $query->filterByIsDefault('yes'); // WHERE is_default = true
     * </code>
     *
     * @param     boolean|string $isDefault The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterByIsDefault($isDefault = null, $comparison = null)
    {
        if (is_string($isDefault)) {
            $isDefault = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_IS_DEFAULT, $isDefault, $comparison);
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
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterBySequence($sequence = null, $comparison = null)
    {
        if (is_array($sequence)) {
            $useMinMax = false;
            if (isset($sequence['min'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_SEQUENCE, $sequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequence['max'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_SEQUENCE, $sequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_SEQUENCE, $sequence, $comparison);
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
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
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
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyProductOptionConfigurationPresetValue object
     *
     * @param \Propel\SpyProductOptionConfigurationPresetValue|ObjectCollection $spyProductOptionConfigurationPresetValue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionConfigurationPresetValue($spyProductOptionConfigurationPresetValue, $comparison = null)
    {
        if ($spyProductOptionConfigurationPresetValue instanceof \Propel\SpyProductOptionConfigurationPresetValue) {
            return $this
                ->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $spyProductOptionConfigurationPresetValue->getFkProductOptionConfigurationPreset(), $comparison);
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
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
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
     * @param   ChildSpyProductOptionConfigurationPreset $spyProductOptionConfigurationPreset Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionConfigurationPresetQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionConfigurationPreset = null)
    {
        if ($spyProductOptionConfigurationPreset) {
            $this->addUsingAlias(SpyProductOptionConfigurationPresetTableMap::COL_ID_PRODUCT_OPTION_CONFIGURATION_PRESET, $spyProductOptionConfigurationPreset->getIdProductOptionConfigurationPreset(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_configuration_preset table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionConfigurationPresetTableMap::clearInstancePool();
            SpyProductOptionConfigurationPresetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionConfigurationPresetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionConfigurationPresetTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionConfigurationPresetTableMap::DATABASE_NAME);

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

} // SpyProductOptionConfigurationPresetQuery
