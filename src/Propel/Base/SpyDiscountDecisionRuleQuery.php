<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDiscountDecisionRule as ChildSpyDiscountDecisionRule;
use Propel\SpyDiscountDecisionRuleQuery as ChildSpyDiscountDecisionRuleQuery;
use Propel\Map\SpyDiscountDecisionRuleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_discount_decision_rule' table.
 *
 *
 *
 * @method     ChildSpyDiscountDecisionRuleQuery orderByIdDiscountDecisionRule($order = Criteria::ASC) Order by the id_discount_decision_rule column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByFkDiscount($order = Criteria::ASC) Order by the fk_discount column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByDecisionRulePlugin($order = Criteria::ASC) Order by the decision_rule_plugin column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyDiscountDecisionRuleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyDiscountDecisionRuleQuery groupByIdDiscountDecisionRule() Group by the id_discount_decision_rule column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByFkDiscount() Group by the fk_discount column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByName() Group by the name column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByDecisionRulePlugin() Group by the decision_rule_plugin column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByValue() Group by the value column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyDiscountDecisionRuleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyDiscountDecisionRuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDiscountDecisionRuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDiscountDecisionRuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDiscountDecisionRuleQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountDecisionRuleQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountDecisionRuleQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpyDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDiscountDecisionRule findOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountDecisionRule matching the query
 * @method     ChildSpyDiscountDecisionRule findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDiscountDecisionRule matching the query, or a new ChildSpyDiscountDecisionRule object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDiscountDecisionRule findOneByIdDiscountDecisionRule(int $id_discount_decision_rule) Return the first ChildSpyDiscountDecisionRule filtered by the id_discount_decision_rule column
 * @method     ChildSpyDiscountDecisionRule findOneByFkDiscount(int $fk_discount) Return the first ChildSpyDiscountDecisionRule filtered by the fk_discount column
 * @method     ChildSpyDiscountDecisionRule findOneByName(string $name) Return the first ChildSpyDiscountDecisionRule filtered by the name column
 * @method     ChildSpyDiscountDecisionRule findOneByDecisionRulePlugin(string $decision_rule_plugin) Return the first ChildSpyDiscountDecisionRule filtered by the decision_rule_plugin column
 * @method     ChildSpyDiscountDecisionRule findOneByValue(string $value) Return the first ChildSpyDiscountDecisionRule filtered by the value column
 * @method     ChildSpyDiscountDecisionRule findOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountDecisionRule filtered by the created_at column
 * @method     ChildSpyDiscountDecisionRule findOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountDecisionRule filtered by the updated_at column *

 * @method     ChildSpyDiscountDecisionRule requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDiscountDecisionRule by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountDecisionRule matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountDecisionRule requireOneByIdDiscountDecisionRule(int $id_discount_decision_rule) Return the first ChildSpyDiscountDecisionRule filtered by the id_discount_decision_rule column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByFkDiscount(int $fk_discount) Return the first ChildSpyDiscountDecisionRule filtered by the fk_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByName(string $name) Return the first ChildSpyDiscountDecisionRule filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByDecisionRulePlugin(string $decision_rule_plugin) Return the first ChildSpyDiscountDecisionRule filtered by the decision_rule_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByValue(string $value) Return the first ChildSpyDiscountDecisionRule filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountDecisionRule filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountDecisionRule requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountDecisionRule filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDiscountDecisionRule objects based on current ModelCriteria
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByIdDiscountDecisionRule(int $id_discount_decision_rule) Return ChildSpyDiscountDecisionRule objects filtered by the id_discount_decision_rule column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByFkDiscount(int $fk_discount) Return ChildSpyDiscountDecisionRule objects filtered by the fk_discount column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByName(string $name) Return ChildSpyDiscountDecisionRule objects filtered by the name column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByDecisionRulePlugin(string $decision_rule_plugin) Return ChildSpyDiscountDecisionRule objects filtered by the decision_rule_plugin column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByValue(string $value) Return ChildSpyDiscountDecisionRule objects filtered by the value column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyDiscountDecisionRule objects filtered by the created_at column
 * @method     ChildSpyDiscountDecisionRule[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyDiscountDecisionRule objects filtered by the updated_at column
 * @method     ChildSpyDiscountDecisionRule[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDiscountDecisionRuleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDiscountDecisionRuleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDiscountDecisionRule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDiscountDecisionRuleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDiscountDecisionRuleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDiscountDecisionRuleQuery) {
            return $criteria;
        }
        $query = new ChildSpyDiscountDecisionRuleQuery();
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
     * @return ChildSpyDiscountDecisionRule|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDiscountDecisionRuleTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountDecisionRuleTableMap::DATABASE_NAME);
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
     * @return ChildSpyDiscountDecisionRule A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_discount_decision_rule, fk_discount, name, decision_rule_plugin, value, created_at, updated_at FROM spy_discount_decision_rule WHERE id_discount_decision_rule = :p0';
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
            /** @var ChildSpyDiscountDecisionRule $obj */
            $obj = new ChildSpyDiscountDecisionRule();
            $obj->hydrate($row);
            SpyDiscountDecisionRuleTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDiscountDecisionRule|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_discount_decision_rule column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDiscountDecisionRule(1234); // WHERE id_discount_decision_rule = 1234
     * $query->filterByIdDiscountDecisionRule(array(12, 34)); // WHERE id_discount_decision_rule IN (12, 34)
     * $query->filterByIdDiscountDecisionRule(array('min' => 12)); // WHERE id_discount_decision_rule > 12
     * </code>
     *
     * @param     mixed $idDiscountDecisionRule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByIdDiscountDecisionRule($idDiscountDecisionRule = null, $comparison = null)
    {
        if (is_array($idDiscountDecisionRule)) {
            $useMinMax = false;
            if (isset($idDiscountDecisionRule['min'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $idDiscountDecisionRule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDiscountDecisionRule['max'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $idDiscountDecisionRule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $idDiscountDecisionRule, $comparison);
    }

    /**
     * Filter the query on the fk_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDiscount(1234); // WHERE fk_discount = 1234
     * $query->filterByFkDiscount(array(12, 34)); // WHERE fk_discount IN (12, 34)
     * $query->filterByFkDiscount(array('min' => 12)); // WHERE fk_discount > 12
     * </code>
     *
     * @see       filterByDiscount()
     *
     * @param     mixed $fkDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByFkDiscount($fkDiscount = null, $comparison = null)
    {
        if (is_array($fkDiscount)) {
            $useMinMax = false;
            if (isset($fkDiscount['min'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_FK_DISCOUNT, $fkDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDiscount['max'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_FK_DISCOUNT, $fkDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_FK_DISCOUNT, $fkDiscount, $comparison);
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
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the decision_rule_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByDecisionRulePlugin('fooValue');   // WHERE decision_rule_plugin = 'fooValue'
     * $query->filterByDecisionRulePlugin('%fooValue%'); // WHERE decision_rule_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $decisionRulePlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByDecisionRulePlugin($decisionRulePlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($decisionRulePlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $decisionRulePlugin)) {
                $decisionRulePlugin = str_replace('*', '%', $decisionRulePlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_DECISION_RULE_PLUGIN, $decisionRulePlugin, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDiscount object
     *
     * @param \Propel\SpyDiscount|ObjectCollection $spyDiscount The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function filterByDiscount($spyDiscount, $comparison = null)
    {
        if ($spyDiscount instanceof \Propel\SpyDiscount) {
            return $this
                ->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_FK_DISCOUNT, $spyDiscount->getIdDiscount(), $comparison);
        } elseif ($spyDiscount instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_FK_DISCOUNT, $spyDiscount->toKeyValue('PrimaryKey', 'IdDiscount'), $comparison);
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type \Propel\SpyDiscount or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discount');

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
            $this->addJoinObject($join, 'Discount');
        }

        return $this;
    }

    /**
     * Use the Discount relation SpyDiscount object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', '\Propel\SpyDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDiscountDecisionRule $spyDiscountDecisionRule Object to remove from the list of results
     *
     * @return $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function prune($spyDiscountDecisionRule = null)
    {
        if ($spyDiscountDecisionRule) {
            $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_ID_DISCOUNT_DECISION_RULE, $spyDiscountDecisionRule->getIdDiscountDecisionRule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_discount_decision_rule table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountDecisionRuleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDiscountDecisionRuleTableMap::clearInstancePool();
            SpyDiscountDecisionRuleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountDecisionRuleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDiscountDecisionRuleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDiscountDecisionRuleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDiscountDecisionRuleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountDecisionRuleTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyDiscountDecisionRuleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountDecisionRuleTableMap::COL_CREATED_AT);
    }

} // SpyDiscountDecisionRuleQuery
