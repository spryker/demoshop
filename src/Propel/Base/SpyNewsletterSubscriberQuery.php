<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyNewsletterSubscriber as ChildSpyNewsletterSubscriber;
use Propel\SpyNewsletterSubscriberQuery as ChildSpyNewsletterSubscriberQuery;
use Propel\Map\SpyNewsletterSubscriberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_newsletter_subscriber' table.
 *
 *
 *
 * @method     ChildSpyNewsletterSubscriberQuery orderByIdNewsletterSubscriber($order = Criteria::ASC) Order by the id_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriberQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method     ChildSpyNewsletterSubscriberQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSpyNewsletterSubscriberQuery orderBySubscriberKey($order = Criteria::ASC) Order by the subscriber_key column
 * @method     ChildSpyNewsletterSubscriberQuery orderByIsConfirmed($order = Criteria::ASC) Order by the is_confirmed column
 * @method     ChildSpyNewsletterSubscriberQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyNewsletterSubscriberQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyNewsletterSubscriberQuery groupByIdNewsletterSubscriber() Group by the id_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriberQuery groupByFkCustomer() Group by the fk_customer column
 * @method     ChildSpyNewsletterSubscriberQuery groupByEmail() Group by the email column
 * @method     ChildSpyNewsletterSubscriberQuery groupBySubscriberKey() Group by the subscriber_key column
 * @method     ChildSpyNewsletterSubscriberQuery groupByIsConfirmed() Group by the is_confirmed column
 * @method     ChildSpyNewsletterSubscriberQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyNewsletterSubscriberQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyNewsletterSubscriberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyNewsletterSubscriberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyNewsletterSubscriberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyNewsletterSubscriberQuery leftJoinSpyCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCustomer relation
 * @method     ChildSpyNewsletterSubscriberQuery rightJoinSpyCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCustomer relation
 * @method     ChildSpyNewsletterSubscriberQuery innerJoinSpyCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCustomer relation
 *
 * @method     ChildSpyNewsletterSubscriberQuery leftJoinSpyNewsletterSubscription($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyNewsletterSubscription relation
 * @method     ChildSpyNewsletterSubscriberQuery rightJoinSpyNewsletterSubscription($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyNewsletterSubscription relation
 * @method     ChildSpyNewsletterSubscriberQuery innerJoinSpyNewsletterSubscription($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyNewsletterSubscription relation
 *
 * @method     \Propel\SpyCustomerQuery|\Propel\SpyNewsletterSubscriptionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyNewsletterSubscriber findOne(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscriber matching the query
 * @method     ChildSpyNewsletterSubscriber findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscriber matching the query, or a new ChildSpyNewsletterSubscriber object populated from the query conditions when no match is found
 *
 * @method     ChildSpyNewsletterSubscriber findOneByIdNewsletterSubscriber(int $id_newsletter_subscriber) Return the first ChildSpyNewsletterSubscriber filtered by the id_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriber findOneByFkCustomer(int $fk_customer) Return the first ChildSpyNewsletterSubscriber filtered by the fk_customer column
 * @method     ChildSpyNewsletterSubscriber findOneByEmail(string $email) Return the first ChildSpyNewsletterSubscriber filtered by the email column
 * @method     ChildSpyNewsletterSubscriber findOneBySubscriberKey(string $subscriber_key) Return the first ChildSpyNewsletterSubscriber filtered by the subscriber_key column
 * @method     ChildSpyNewsletterSubscriber findOneByIsConfirmed(boolean $is_confirmed) Return the first ChildSpyNewsletterSubscriber filtered by the is_confirmed column
 * @method     ChildSpyNewsletterSubscriber findOneByCreatedAt(string $created_at) Return the first ChildSpyNewsletterSubscriber filtered by the created_at column
 * @method     ChildSpyNewsletterSubscriber findOneByUpdatedAt(string $updated_at) Return the first ChildSpyNewsletterSubscriber filtered by the updated_at column *

 * @method     ChildSpyNewsletterSubscriber requirePk($key, ConnectionInterface $con = null) Return the ChildSpyNewsletterSubscriber by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOne(ConnectionInterface $con = null) Return the first ChildSpyNewsletterSubscriber matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyNewsletterSubscriber requireOneByIdNewsletterSubscriber(int $id_newsletter_subscriber) Return the first ChildSpyNewsletterSubscriber filtered by the id_newsletter_subscriber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneByFkCustomer(int $fk_customer) Return the first ChildSpyNewsletterSubscriber filtered by the fk_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneByEmail(string $email) Return the first ChildSpyNewsletterSubscriber filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneBySubscriberKey(string $subscriber_key) Return the first ChildSpyNewsletterSubscriber filtered by the subscriber_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneByIsConfirmed(boolean $is_confirmed) Return the first ChildSpyNewsletterSubscriber filtered by the is_confirmed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneByCreatedAt(string $created_at) Return the first ChildSpyNewsletterSubscriber filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyNewsletterSubscriber requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyNewsletterSubscriber filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyNewsletterSubscriber objects based on current ModelCriteria
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByIdNewsletterSubscriber(int $id_newsletter_subscriber) Return ChildSpyNewsletterSubscriber objects filtered by the id_newsletter_subscriber column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByFkCustomer(int $fk_customer) Return ChildSpyNewsletterSubscriber objects filtered by the fk_customer column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByEmail(string $email) Return ChildSpyNewsletterSubscriber objects filtered by the email column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findBySubscriberKey(string $subscriber_key) Return ChildSpyNewsletterSubscriber objects filtered by the subscriber_key column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByIsConfirmed(boolean $is_confirmed) Return ChildSpyNewsletterSubscriber objects filtered by the is_confirmed column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyNewsletterSubscriber objects filtered by the created_at column
 * @method     ChildSpyNewsletterSubscriber[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyNewsletterSubscriber objects filtered by the updated_at column
 * @method     ChildSpyNewsletterSubscriber[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyNewsletterSubscriberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyNewsletterSubscriberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyNewsletterSubscriber', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyNewsletterSubscriberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyNewsletterSubscriberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyNewsletterSubscriberQuery) {
            return $criteria;
        }
        $query = new ChildSpyNewsletterSubscriberQuery();
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
     * @return ChildSpyNewsletterSubscriber|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyNewsletterSubscriberTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
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
     * @return ChildSpyNewsletterSubscriber A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_newsletter_subscriber`, `fk_customer`, `email`, `subscriber_key`, `is_confirmed`, `created_at`, `updated_at` FROM `spy_newsletter_subscriber` WHERE `id_newsletter_subscriber` = :p0';
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
            /** @var ChildSpyNewsletterSubscriber $obj */
            $obj = new ChildSpyNewsletterSubscriber();
            $obj->hydrate($row);
            SpyNewsletterSubscriberTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyNewsletterSubscriber|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_newsletter_subscriber column
     *
     * Example usage:
     * <code>
     * $query->filterByIdNewsletterSubscriber(1234); // WHERE id_newsletter_subscriber = 1234
     * $query->filterByIdNewsletterSubscriber(array(12, 34)); // WHERE id_newsletter_subscriber IN (12, 34)
     * $query->filterByIdNewsletterSubscriber(array('min' => 12)); // WHERE id_newsletter_subscriber > 12
     * </code>
     *
     * @param     mixed $idNewsletterSubscriber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByIdNewsletterSubscriber($idNewsletterSubscriber = null, $comparison = null)
    {
        if (is_array($idNewsletterSubscriber)) {
            $useMinMax = false;
            if (isset($idNewsletterSubscriber['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $idNewsletterSubscriber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idNewsletterSubscriber['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $idNewsletterSubscriber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $idNewsletterSubscriber, $comparison);
    }

    /**
     * Filter the query on the fk_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomer(1234); // WHERE fk_customer = 1234
     * $query->filterByFkCustomer(array(12, 34)); // WHERE fk_customer IN (12, 34)
     * $query->filterByFkCustomer(array('min' => 12)); // WHERE fk_customer > 12
     * </code>
     *
     * @see       filterBySpyCustomer()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the subscriber_key column
     *
     * Example usage:
     * <code>
     * $query->filterBySubscriberKey('fooValue');   // WHERE subscriber_key = 'fooValue'
     * $query->filterBySubscriberKey('%fooValue%'); // WHERE subscriber_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subscriberKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterBySubscriberKey($subscriberKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subscriberKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subscriberKey)) {
                $subscriberKey = str_replace('*', '%', $subscriberKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_SUBSCRIBER_KEY, $subscriberKey, $comparison);
    }

    /**
     * Filter the query on the is_confirmed column
     *
     * Example usage:
     * <code>
     * $query->filterByIsConfirmed(true); // WHERE is_confirmed = true
     * $query->filterByIsConfirmed('yes'); // WHERE is_confirmed = true
     * </code>
     *
     * @param     boolean|string $isConfirmed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByIsConfirmed($isConfirmed = null, $comparison = null)
    {
        if (is_string($isConfirmed)) {
            $isConfirmed = in_array(strtolower($isConfirmed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_IS_CONFIRMED, $isConfirmed, $comparison);
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
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterBySpyCustomer($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, $spyCustomer->getIdCustomer(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_FK_CUSTOMER, $spyCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterBySpyCustomer() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCustomer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function joinSpyCustomer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCustomer');

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
            $this->addJoinObject($join, 'SpyCustomer');
        }

        return $this;
    }

    /**
     * Use the SpyCustomer relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useSpyCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCustomer', '\Propel\SpyCustomerQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyNewsletterSubscription object
     *
     * @param \Propel\SpyNewsletterSubscription|ObjectCollection $spyNewsletterSubscription the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterBySpyNewsletterSubscription($spyNewsletterSubscription, $comparison = null)
    {
        if ($spyNewsletterSubscription instanceof \Propel\SpyNewsletterSubscription) {
            return $this
                ->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $spyNewsletterSubscription->getFkNewsletterSubscriber(), $comparison);
        } elseif ($spyNewsletterSubscription instanceof ObjectCollection) {
            return $this
                ->useSpyNewsletterSubscriptionQuery()
                ->filterByPrimaryKeys($spyNewsletterSubscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyNewsletterSubscription() only accepts arguments of type \Propel\SpyNewsletterSubscription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyNewsletterSubscription relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function joinSpyNewsletterSubscription($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyNewsletterSubscription');

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
            $this->addJoinObject($join, 'SpyNewsletterSubscription');
        }

        return $this;
    }

    /**
     * Use the SpyNewsletterSubscription relation SpyNewsletterSubscription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyNewsletterSubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useSpyNewsletterSubscriptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyNewsletterSubscription($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyNewsletterSubscription', '\Propel\SpyNewsletterSubscriptionQuery');
    }

    /**
     * Filter the query by a related SpyNewsletterType object
     * using the spy_newsletter_subscription table as cross reference
     *
     * @param SpyNewsletterType $spyNewsletterType the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function filterBySpyNewsletterType($spyNewsletterType, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSpyNewsletterSubscriptionQuery()
            ->filterBySpyNewsletterType($spyNewsletterType, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyNewsletterSubscriber $spyNewsletterSubscriber Object to remove from the list of results
     *
     * @return $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function prune($spyNewsletterSubscriber = null)
    {
        if ($spyNewsletterSubscriber) {
            $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_ID_NEWSLETTER_SUBSCRIBER, $spyNewsletterSubscriber->getIdNewsletterSubscriber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_newsletter_subscriber table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyNewsletterSubscriberTableMap::clearInstancePool();
            SpyNewsletterSubscriberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyNewsletterSubscriberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyNewsletterSubscriberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyNewsletterSubscriberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyNewsletterSubscriberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyNewsletterSubscriberTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyNewsletterSubscriberTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyNewsletterSubscriberTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyNewsletterSubscriberQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyNewsletterSubscriberTableMap::COL_CREATED_AT);
    }

} // SpyNewsletterSubscriberQuery
