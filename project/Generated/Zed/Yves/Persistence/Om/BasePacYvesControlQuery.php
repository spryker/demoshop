<?php


/**
 * Base class that represents a query for the 'pac_yves_control' table.
 *
 *
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByIdYvesControl($order = Criteria::ASC) Order by the id_yves_control column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByHostname($order = Criteria::ASC) Order by the hostname column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByLastModified($order = Criteria::ASC) Order by the last_modified column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByNumberOfDocuments($order = Criteria::ASC) Order by the number_of_documents column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByIdYvesControl() Group by the id_yves_control column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByHostname() Group by the hostname column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByLastModified() Group by the last_modified column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByNumberOfDocuments() Group by the number_of_documents column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByMessage() Group by the message column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl matching the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl matching the query, or a new ProjectA_Zed_Yves_Persistence_PacYvesControl object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByType(string $type) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByHostname(string $hostname) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the hostname column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByLastModified(string $last_modified) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the last_modified column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByNumberOfDocuments(int $number_of_documents) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the number_of_documents column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByMessage(string $message) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the message column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the created_at column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesControl findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Yves_Persistence_PacYvesControl filtered by the updated_at column
 *
 * @method array findByIdYvesControl(int $id_yves_control) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the id_yves_control column
 * @method array findByType(string $type) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the type column
 * @method array findByHostname(string $hostname) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the hostname column
 * @method array findByLastModified(string $last_modified) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the last_modified column
 * @method array findByNumberOfDocuments(int $number_of_documents) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the number_of_documents column
 * @method array findByMessage(string $message) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the message column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Yves_Persistence_PacYvesControl objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/frontend-package/ProjectA/Zed/Yves/Persistence.om
 */
abstract class Generated_Zed_Yves_Persistence_Om_BasePacYvesControlQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Yves_Persistence_Om_BasePacYvesControlQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Yves_Persistence_PacYvesControl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Yves_Persistence_PacYvesControlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Yves_Persistence_PacYvesControlQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Yves_Persistence_PacYvesControlQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Yves_Persistence_PacYvesControlQuery();
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
     * @return   ProjectA_Zed_Yves_Persistence_PacYvesControl|ProjectA_Zed_Yves_Persistence_PacYvesControl[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Yves_Persistence_PacYvesControl A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdYvesControl($key, $con = null)
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
     * @return                 ProjectA_Zed_Yves_Persistence_PacYvesControl A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_yves_control`, `type`, `hostname`, `last_modified`, `number_of_documents`, `message`, `created_at`, `updated_at` FROM `pac_yves_control` WHERE `id_yves_control` = :p0';
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
            $obj = new ProjectA_Zed_Yves_Persistence_PacYvesControl();
            $obj->hydrate($row);
            ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControl|ProjectA_Zed_Yves_Persistence_PacYvesControl[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Yves_Persistence_PacYvesControl[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_yves_control column
     *
     * Example usage:
     * <code>
     * $query->filterByIdYvesControl(1234); // WHERE id_yves_control = 1234
     * $query->filterByIdYvesControl(array(12, 34)); // WHERE id_yves_control IN (12, 34)
     * $query->filterByIdYvesControl(array('min' => 12)); // WHERE id_yves_control >= 12
     * $query->filterByIdYvesControl(array('max' => 12)); // WHERE id_yves_control <= 12
     * </code>
     *
     * @param     mixed $idYvesControl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByIdYvesControl($idYvesControl = null, $comparison = null)
    {
        if (is_array($idYvesControl)) {
            $useMinMax = false;
            if (isset($idYvesControl['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $idYvesControl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idYvesControl['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $idYvesControl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $idYvesControl, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the hostname column
     *
     * Example usage:
     * <code>
     * $query->filterByHostname('fooValue');   // WHERE hostname = 'fooValue'
     * $query->filterByHostname('%fooValue%'); // WHERE hostname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hostname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByHostname($hostname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hostname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hostname)) {
                $hostname = str_replace('*', '%', $hostname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::HOSTNAME, $hostname, $comparison);
    }

    /**
     * Filter the query on the last_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByLastModified('2011-03-14'); // WHERE last_modified = '2011-03-14'
     * $query->filterByLastModified('now'); // WHERE last_modified = '2011-03-14'
     * $query->filterByLastModified(array('max' => 'yesterday')); // WHERE last_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByLastModified($lastModified = null, $comparison = null)
    {
        if (is_array($lastModified)) {
            $useMinMax = false;
            if (isset($lastModified['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::LAST_MODIFIED, $lastModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastModified['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::LAST_MODIFIED, $lastModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::LAST_MODIFIED, $lastModified, $comparison);
    }

    /**
     * Filter the query on the number_of_documents column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberOfDocuments(1234); // WHERE number_of_documents = 1234
     * $query->filterByNumberOfDocuments(array(12, 34)); // WHERE number_of_documents IN (12, 34)
     * $query->filterByNumberOfDocuments(array('min' => 12)); // WHERE number_of_documents >= 12
     * $query->filterByNumberOfDocuments(array('max' => 12)); // WHERE number_of_documents <= 12
     * </code>
     *
     * @param     mixed $numberOfDocuments The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByNumberOfDocuments($numberOfDocuments = null, $comparison = null)
    {
        if (is_array($numberOfDocuments)) {
            $useMinMax = false;
            if (isset($numberOfDocuments['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::NUMBER_OF_DOCUMENTS, $numberOfDocuments['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numberOfDocuments['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::NUMBER_OF_DOCUMENTS, $numberOfDocuments['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::NUMBER_OF_DOCUMENTS, $numberOfDocuments, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::MESSAGE, $message, $comparison);
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Yves_Persistence_PacYvesControl $pacYvesControl Object to remove from the list of results
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function prune($pacYvesControl = null)
    {
        if ($pacYvesControl) {
            $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::ID_YVES_CONTROL, $pacYvesControl->getIdYvesControl(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Yves_Persistence_PacYvesControlQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Yves_Persistence_PacYvesControlPeer::CREATED_AT);
    }
}
