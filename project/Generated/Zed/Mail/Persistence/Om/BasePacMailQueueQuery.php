<?php


/**
 * Base class that represents a query for the 'pac_mail_queue' table.
 *
 *
 *
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByIdMailQueue($order = Criteria::ASC) Order by the id_mail_queue column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByMailType($order = Criteria::ASC) Order by the mail_type column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByTransferString($order = Criteria::ASC) Order by the transfer_string column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByReferenceId($order = Criteria::ASC) Order by the reference_id column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderBySent($order = Criteria::ASC) Order by the sent column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderBySendTries($order = Criteria::ASC) Order by the send_tries column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByLastResponse($order = Criteria::ASC) Order by the last_response column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByIdMailQueue() Group by the id_mail_queue column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByMailType() Group by the mail_type column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByTransferString() Group by the transfer_string column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByReferenceId() Group by the reference_id column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupBySent() Group by the sent column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupBySendTries() Group by the send_tries column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByLastResponse() Group by the last_response column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue matching the query
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue matching the query, or a new ProjectA_Zed_Mail_Persistence_PacMailQueue object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByMailType(string $mail_type) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the mail_type column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByTransferString(string $transfer_string) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the transfer_string column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByReferenceId(int $reference_id) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the reference_id column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneBySent(int $sent) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the sent column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneBySendTries(int $send_tries) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the send_tries column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByLastResponse(string $last_response) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the last_response column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the created_at column
 * @method ProjectA_Zed_Mail_Persistence_PacMailQueue findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Mail_Persistence_PacMailQueue filtered by the updated_at column
 *
 * @method array findByIdMailQueue(int $id_mail_queue) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the id_mail_queue column
 * @method array findByMailType(string $mail_type) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the mail_type column
 * @method array findByTransferString(string $transfer_string) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the transfer_string column
 * @method array findByReferenceId(int $reference_id) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the reference_id column
 * @method array findBySent(int $sent) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the sent column
 * @method array findBySendTries(int $send_tries) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the send_tries column
 * @method array findByLastResponse(string $last_response) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the last_response column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Mail_Persistence_PacMailQueue objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/crm-package/ProjectA/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BasePacMailQueueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BasePacMailQueueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mail_Persistence_PacMailQueue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mail_Persistence_PacMailQueueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mail_Persistence_PacMailQueueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mail_Persistence_PacMailQueueQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mail_Persistence_PacMailQueueQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Mail_Persistence_PacMailQueue|ProjectA_Zed_Mail_Persistence_PacMailQueue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Mail_Persistence_PacMailQueue A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailQueue($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Mail_Persistence_PacMailQueue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_queue`, `mail_type`, `transfer_string`, `reference_id`, `sent`, `send_tries`, `last_response`, `created_at`, `updated_at` FROM `pac_mail_queue` WHERE `id_mail_queue` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Mail_Persistence_PacMailQueue();
            $obj->hydrate($row);
            ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueue|ProjectA_Zed_Mail_Persistence_PacMailQueue[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Mail_Persistence_PacMailQueue[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_queue column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailQueue(1234); // WHERE id_mail_queue = 1234
     * $query->filterByIdMailQueue(array(12, 34)); // WHERE id_mail_queue IN (12, 34)
     * $query->filterByIdMailQueue(array('min' => 12)); // WHERE id_mail_queue >= 12
     * $query->filterByIdMailQueue(array('max' => 12)); // WHERE id_mail_queue <= 12
     * </code>
     *
     * @param     mixed $idMailQueue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByIdMailQueue($idMailQueue = null, $comparison = null)
    {
        if (is_array($idMailQueue)) {
            $useMinMax = false;
            if (isset($idMailQueue['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $idMailQueue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailQueue['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $idMailQueue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $idMailQueue, $comparison);
    }

    /**
     * Filter the query on the mail_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMailType('fooValue');   // WHERE mail_type = 'fooValue'
     * $query->filterByMailType('%fooValue%'); // WHERE mail_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mailType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByMailType($mailType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mailType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mailType)) {
                $mailType = str_replace('*', '%', $mailType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::MAIL_TYPE, $mailType, $comparison);
    }

    /**
     * Filter the query on the transfer_string column
     *
     * Example usage:
     * <code>
     * $query->filterByTransferString('fooValue');   // WHERE transfer_string = 'fooValue'
     * $query->filterByTransferString('%fooValue%'); // WHERE transfer_string LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transferString The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByTransferString($transferString = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transferString)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transferString)) {
                $transferString = str_replace('*', '%', $transferString);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::TRANSFER_STRING, $transferString, $comparison);
    }

    /**
     * Filter the query on the reference_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReferenceId(1234); // WHERE reference_id = 1234
     * $query->filterByReferenceId(array(12, 34)); // WHERE reference_id IN (12, 34)
     * $query->filterByReferenceId(array('min' => 12)); // WHERE reference_id >= 12
     * $query->filterByReferenceId(array('max' => 12)); // WHERE reference_id <= 12
     * </code>
     *
     * @param     mixed $referenceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByReferenceId($referenceId = null, $comparison = null)
    {
        if (is_array($referenceId)) {
            $useMinMax = false;
            if (isset($referenceId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::REFERENCE_ID, $referenceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($referenceId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::REFERENCE_ID, $referenceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::REFERENCE_ID, $referenceId, $comparison);
    }

    /**
     * Filter the query on the sent column
     *
     * Example usage:
     * <code>
     * $query->filterBySent(1234); // WHERE sent = 1234
     * $query->filterBySent(array(12, 34)); // WHERE sent IN (12, 34)
     * $query->filterBySent(array('min' => 12)); // WHERE sent >= 12
     * $query->filterBySent(array('max' => 12)); // WHERE sent <= 12
     * </code>
     *
     * @param     mixed $sent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterBySent($sent = null, $comparison = null)
    {
        if (is_array($sent)) {
            $useMinMax = false;
            if (isset($sent['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SENT, $sent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sent['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SENT, $sent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SENT, $sent, $comparison);
    }

    /**
     * Filter the query on the send_tries column
     *
     * Example usage:
     * <code>
     * $query->filterBySendTries(1234); // WHERE send_tries = 1234
     * $query->filterBySendTries(array(12, 34)); // WHERE send_tries IN (12, 34)
     * $query->filterBySendTries(array('min' => 12)); // WHERE send_tries >= 12
     * $query->filterBySendTries(array('max' => 12)); // WHERE send_tries <= 12
     * </code>
     *
     * @param     mixed $sendTries The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterBySendTries($sendTries = null, $comparison = null)
    {
        if (is_array($sendTries)) {
            $useMinMax = false;
            if (isset($sendTries['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SEND_TRIES, $sendTries['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendTries['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SEND_TRIES, $sendTries['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::SEND_TRIES, $sendTries, $comparison);
    }

    /**
     * Filter the query on the last_response column
     *
     * Example usage:
     * <code>
     * $query->filterByLastResponse('fooValue');   // WHERE last_response = 'fooValue'
     * $query->filterByLastResponse('%fooValue%'); // WHERE last_response LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastResponse The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByLastResponse($lastResponse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastResponse)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastResponse)) {
                $lastResponse = str_replace('*', '%', $lastResponse);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::LAST_RESPONSE, $lastResponse, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mail_Persistence_PacMailQueue $pacMailQueue Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function prune($pacMailQueue = null)
    {
        if ($pacMailQueue) {
            $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::ID_MAIL_QUEUE, $pacMailQueue->getIdMailQueue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Mail_Persistence_PacMailQueueQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Mail_Persistence_PacMailQueuePeer::CREATED_AT);
    }
}
