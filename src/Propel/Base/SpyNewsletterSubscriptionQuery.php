<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyNewsletterSubscription as ChildSpyNewsletterSubscription;
use Propel\SpyNewsletterSubscriptionQuery as ChildSpyNewsletterSubscriptionQuery;
use Propel\Map\SpyNewsletterSubscriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_newsletter_subscription' table.
 *
 *
 *
 * @method     ChildSpyNewsletterSubscriptionQuery orderByFkNewsletterSubscriber($order = Criteria::ASC) Order by the fk_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriptionQuery orderByFkNewsletterType($order = Criteria::ASC) Order by the fk_newsletter_type column
 * @method     ChildSpyNewsletterSubscriptionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyNewsletterSubscriptionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyNewsletterSubscriptionQuery groupByFkNewsletterSubscriber() Group by the fk_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriptionQuery groupByFkNewsletterType() Group by the fk_newsletter_type column
 * @method     ChildSpyNewsletterSubscriptionQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyNewsletterSubscriptionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyNewsletterSubscriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyNewsletterSubscriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyNewsletterSubscriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyNewsletterSubscriptionQuery leftJoinSpyNewsletterSubscriber($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyNewsletterSubscriber relation
 * @method     ChildSpyNewsletterSubscriptionQuery rightJoinSpyNewsletterSubscriber($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyNewsletterSubscriber relation
 * @method     ChildSpyNewsletterSubscriptionQuery innerJoinSpyNewsletterSubscriber($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyNewsletterSubscriber relation
 *
 * @method     ChildSpyNewsletterSubscriptionQuery leftJoinSpyNewsletterType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyNewsletterType relation
 * @method     ChildSpyNewsletterSubscriptionQuery rightJoinSpyNewsletterType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyNewsletterType relation
 * @method     ChildSpyNewsletterSubscriptionQuery innerJoinSpyNewsletterType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyNewsletterType relation
 *
 * @method     \Propel\SpyNewsletterSubscriberQuery|\Propel\SpyNewsletterTypeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyNewsletterSubscription findOne(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscription matching the query
 * @method     ChildSpyNewsletterSubscription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscription matching the query, or a new ChildSpyNewsletterSubscription object populated from the query conditions when no match is found
 *
 * @method     ChildSpyNewsletterSubscription findOneByFkNewsletterSubscriber(int $fk_newsletter_subscriber) Return the first ChildSpyNewsletterSubscription filtered by the fk_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscription findOneByFkNewsletterType(int $fk_newsletter_type) Return the first ChildSpyNewsletterSubscription filtered by the fk_newsletter_type column
 * @method     ChildSpyNewsletterSubscription findOneByCreatedAt(string $created_at) Return the first ChildSpyNewsletterSubscription filtered by the created_at column
 * @method     ChildSpyNewsletterSubscription findOneByUpdatedAt(string $updated_at) Return the first ChildSpyNewsletterSubscription filtered by the updated_at column *

 * @method     ChildSpyNewsletterSubscription requirePk($key, ConnectionInterface $con = null) Return the ChildSpyNewsletterSubscription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscription requireOne(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyNewsletterSubscription requireOneByFkNewsletterSubscriber(int $fk_newsletter_subscriber) Return the first ChildSpyNewsletterSubscription filtered by the fk_newsletter_subscriber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscription requireOneByFkNewsletterType(int $fk_newsletter_type) Return the first ChildSpyNewsletterSubscription filtered by the fk_newsletter_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscription requireOneByCreatedAt(string $created_at) Return the first ChildSpyNewsletterSubscription filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscription requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyNewsletterSubscription filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyNewsletterSubscription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyNewsletterSubscription objects based on current ModelCriteria
 * @method     ChildSpyNewsletterSubscription[]|ObjectCollection findByFkNewsletterSubscriber(int $fk_newsletter_subscriber) Return ChildSpyNewsletterSubscription objects filtered by the fk_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscription[]|ObjectCollection findByFkNewsletterType(int $fk_newsletter_type) Return ChildSpyNewsletterSubscription objects filtered by the fk_newsletter_type column
 * @method     ChildSpyNewsletterSubscription[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyNewsletterSubscription objects filtered by the created_at column
 * @method     ChildSpyNewsletterSubscription[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyNewsletterSubscription objects filtered by the updated_at column
 * @method     ChildSpyNewsletterSubscription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyNewsletterSubscriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyNewsletterSubscriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyNewsletterSubscription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyNewsletterSubscriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyNewsletterSubscriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyNewsletterSubscriptionQuery) {
            return $criteria;
        }
        $query = new ChildSpyNewsletterSubscriptionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$fk_newsletter_subscriber, $fk_newsletter_type] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyNewsletterSubscription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyNewsletterSubscriptionTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyNewsletterSubscriptionTableMap::DATABASE_NAME);
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
     * @return ChildSpyNewsletterSubscription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `fk_newsletter_subscriber`, `fk_newsletter_type`, `created_at`, `updated_at` FROM `spy_newsletter_subscription` WHERE `fk_newsletter_subscriber` = :p0 AND `fk_newsletter_type` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyNewsletterSubscription $obj */
            $obj = new ChildSpyNewsletterSubscription();
            $obj->hydrate($row);
            SpyNewsletterSubscriptionTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyNewsletterSubscription|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_newsletter_subscriber column
     *
     * Example usage:
     * <code>
     * $query->filterByFkNewsletterSubscriber(1234); // WHERE fk_newsletter_subscriber = 1234
     * $query->filterByFkNewsletterSubscriber(array(12, 34)); // WHERE fk_newsletter_subscriber IN (12, 34)
     * $query->filterByFkNewsletterSubscriber(array('min' => 12)); // WHERE fk_newsletter_subscriber > 12
     * </code>
     *
     * @see       filterBySpyNewsletterSubscriber()
     *
     * @param     mixed $fkNewsletterSubscriber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByFkNewsletterSubscriber($fkNewsletterSubscriber = null, $comparison = null)
    {
        if (is_array($fkNewsletterSubscriber)) {
            $useMinMax = false;
            if (isset($fkNewsletterSubscriber['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $fkNewsletterSubscriber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkNewsletterSubscriber['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $fkNewsletterSubscriber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $fkNewsletterSubscriber, $comparison);
    }

    /**
     * Filter the query on the fk_newsletter_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkNewsletterType(1234); // WHERE fk_newsletter_type = 1234
     * $query->filterByFkNewsletterType(array(12, 34)); // WHERE fk_newsletter_type IN (12, 34)
     * $query->filterByFkNewsletterType(array('min' => 12)); // WHERE fk_newsletter_type > 12
     * </code>
     *
     * @see       filterBySpyNewsletterType()
     *
     * @param     mixed $fkNewsletterType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByFkNewsletterType($fkNewsletterType = null, $comparison = null)
    {
        if (is_array($fkNewsletterType)) {
            $useMinMax = false;
            if (isset($fkNewsletterType['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $fkNewsletterType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkNewsletterType['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $fkNewsletterType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $fkNewsletterType, $comparison);
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
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyNewsletterSubscriber object
     *
     * @param \Propel\SpyNewsletterSubscriber|ObjectCollection $spyNewsletterSubscriber The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterBySpyNewsletterSubscriber($spyNewsletterSubscriber, $comparison = null)
    {
        if ($spyNewsletterSubscriber instanceof \Propel\SpyNewsletterSubscriber) {
            return $this
                ->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $spyNewsletterSubscriber->getIdNewsletterSubscriber(), $comparison);
        } elseif ($spyNewsletterSubscriber instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER, $spyNewsletterSubscriber->toKeyValue('PrimaryKey', 'IdNewsletterSubscriber'), $comparison);
        } else {
            throw new PropelException('filterBySpyNewsletterSubscriber() only accepts arguments of type \Propel\SpyNewsletterSubscriber or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyNewsletterSubscriber relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function joinSpyNewsletterSubscriber($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyNewsletterSubscriber');

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
            $this->addJoinObject($join, 'SpyNewsletterSubscriber');
        }

        return $this;
    }

    /**
     * Use the SpyNewsletterSubscriber relation SpyNewsletterSubscriber object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyNewsletterSubscriberQuery A secondary query class using the current class as primary query
     */
    public function useSpyNewsletterSubscriberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyNewsletterSubscriber($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyNewsletterSubscriber', '\Propel\SpyNewsletterSubscriberQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyNewsletterType object
     *
     * @param \Propel\SpyNewsletterType|ObjectCollection $spyNewsletterType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function filterBySpyNewsletterType($spyNewsletterType, $comparison = null)
    {
        if ($spyNewsletterType instanceof \Propel\SpyNewsletterType) {
            return $this
                ->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $spyNewsletterType->getIdNewsletterType(), $comparison);
        } elseif ($spyNewsletterType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE, $spyNewsletterType->toKeyValue('PrimaryKey', 'IdNewsletterType'), $comparison);
        } else {
            throw new PropelException('filterBySpyNewsletterType() only accepts arguments of type \Propel\SpyNewsletterType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyNewsletterType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function joinSpyNewsletterType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyNewsletterType');

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
            $this->addJoinObject($join, 'SpyNewsletterType');
        }

        return $this;
    }

    /**
     * Use the SpyNewsletterType relation SpyNewsletterType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyNewsletterTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyNewsletterTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyNewsletterType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyNewsletterType', '\Propel\SpyNewsletterTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyNewsletterSubscription $spyNewsletterSubscription Object to remove from the list of results
     *
     * @return $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function prune($spyNewsletterSubscription = null)
    {
        if ($spyNewsletterSubscription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_SUBSCRIBER), $spyNewsletterSubscription->getFkNewsletterSubscriber(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyNewsletterSubscriptionTableMap::COL_FK_NEWSLETTER_TYPE), $spyNewsletterSubscription->getFkNewsletterType(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_newsletter_subscription table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyNewsletterSubscriptionTableMap::clearInstancePool();
            SpyNewsletterSubscriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyNewsletterSubscriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyNewsletterSubscriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyNewsletterSubscriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyNewsletterSubscriptionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyNewsletterSubscriptionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyNewsletterSubscriptionTableMap::COL_CREATED_AT);
    }

} // SpyNewsletterSubscriptionQuery
