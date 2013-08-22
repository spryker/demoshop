<?php


/**
 * Base class that represents a query for the 'pac_dwh_query_token' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByIdDwhQueryToken($order = Criteria::ASC) Order by the id_dwh_query_token column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByDiv($order = Criteria::ASC) Order by the div column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByQuery($order = Criteria::ASC) Order by the query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByArgs($order = Criteria::ASC) Order by the args column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByIdDwhQueryToken() Group by the id_dwh_query_token column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByUid() Group by the uid column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByDiv() Group by the div column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByQuery() Group by the query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByArgs() Group by the args column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByUid(string $uid) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the uid column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByDiv(string $div) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the div column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByType(string $type) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the type column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByQuery(string $query) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByArgs(string $args) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the args column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken filtered by the updated_at column
 *
 * @method array findByIdDwhQueryToken(int $id_dwh_query_token) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the id_dwh_query_token column
 * @method array findByUid(string $uid) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the uid column
 * @method array findByDiv(string $div) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the div column
 * @method array findByType(string $type) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the type column
 * @method array findByQuery(string $query) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the query column
 * @method array findByArgs(string $args) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the args column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhQueryTokenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhQueryTokenQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken|ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhQueryToken($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_query_token`, `uid`, `div`, `type`, `query`, `args`, `created_at`, `updated_at` FROM `pac_dwh_query_token` WHERE `id_dwh_query_token` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken|ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_query_token column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhQueryToken(1234); // WHERE id_dwh_query_token = 1234
     * $query->filterByIdDwhQueryToken(array(12, 34)); // WHERE id_dwh_query_token IN (12, 34)
     * $query->filterByIdDwhQueryToken(array('min' => 12)); // WHERE id_dwh_query_token >= 12
     * $query->filterByIdDwhQueryToken(array('max' => 12)); // WHERE id_dwh_query_token <= 12
     * </code>
     *
     * @param     mixed $idDwhQueryToken The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByIdDwhQueryToken($idDwhQueryToken = null, $comparison = null)
    {
        if (is_array($idDwhQueryToken)) {
            $useMinMax = false;
            if (isset($idDwhQueryToken['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $idDwhQueryToken['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhQueryToken['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $idDwhQueryToken['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $idDwhQueryToken, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%'); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uid)) {
                $uid = str_replace('*', '%', $uid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UID, $uid, $comparison);
    }

    /**
     * Filter the query on the div column
     *
     * Example usage:
     * <code>
     * $query->filterByDiv('fooValue');   // WHERE div = 'fooValue'
     * $query->filterByDiv('%fooValue%'); // WHERE div LIKE '%fooValue%'
     * </code>
     *
     * @param     string $div The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByDiv($div = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($div)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $div)) {
                $div = str_replace('*', '%', $div);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::DIV, $div, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the query column
     *
     * Example usage:
     * <code>
     * $query->filterByQuery('fooValue');   // WHERE query = 'fooValue'
     * $query->filterByQuery('%fooValue%'); // WHERE query LIKE '%fooValue%'
     * </code>
     *
     * @param     string $query The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByQuery($query = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($query)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $query)) {
                $query = str_replace('*', '%', $query);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::QUERY, $query, $comparison);
    }

    /**
     * Filter the query on the args column
     *
     * Example usage:
     * <code>
     * $query->filterByArgs('fooValue');   // WHERE args = 'fooValue'
     * $query->filterByArgs('%fooValue%'); // WHERE args LIKE '%fooValue%'
     * </code>
     *
     * @param     string $args The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByArgs($args = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($args)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $args)) {
                $args = str_replace('*', '%', $args);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ARGS, $args, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhQueryToken $pacDwhQueryToken Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function prune($pacDwhQueryToken = null)
    {
        if ($pacDwhQueryToken) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::ID_DWH_QUERY_TOKEN, $pacDwhQueryToken->getIdDwhQueryToken(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhQueryTokenPeer::CREATED_AT);
    }
}
