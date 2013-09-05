<?php


/**
 * Base class that represents a query for the 'pac_cms_redirection' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByIdCmsRedirection($order = Criteria::ASC) Order by the id_cms_redirection column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByUrlSource($order = Criteria::ASC) Order by the url_source column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByUrlTarget($order = Criteria::ASC) Order by the url_target column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByIdCmsRedirection() Group by the id_cms_redirection column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByUrlSource() Group by the url_source column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByUrlTarget() Group by the url_target column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByStatus() Group by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByUser() Group by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsRedirection object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByUrlSource(string $url_source) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the url_source column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByUrlTarget(string $url_target) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the url_target column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByType(int $type) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByStatus(int $status) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByDescription(string $description) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByUser(string $user) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsRedirection findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsRedirection filtered by the updated_at column
 *
 * @method array findByIdCmsRedirection(int $id_cms_redirection) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the id_cms_redirection column
 * @method array findByUrlSource(string $url_source) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the url_source column
 * @method array findByUrlTarget(string $url_target) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the url_target column
 * @method array findByType(int $type) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the type column
 * @method array findByStatus(int $status) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the status column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the description column
 * @method array findByUser(string $user) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the user column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_PacCmsRedirection objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsRedirectionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsRedirectionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsRedirection', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsRedirection|ProjectA_Zed_Cms_Persistence_PacCmsRedirection[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsRedirection A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsRedirection($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsRedirection A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_redirection`, `url_source`, `url_target`, `type`, `status`, `description`, `user`, `created_at`, `updated_at` FROM `pac_cms_redirection` WHERE `id_cms_redirection` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsRedirection();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirection|ProjectA_Zed_Cms_Persistence_PacCmsRedirection[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsRedirection[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_redirection column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsRedirection(1234); // WHERE id_cms_redirection = 1234
     * $query->filterByIdCmsRedirection(array(12, 34)); // WHERE id_cms_redirection IN (12, 34)
     * $query->filterByIdCmsRedirection(array('min' => 12)); // WHERE id_cms_redirection >= 12
     * $query->filterByIdCmsRedirection(array('max' => 12)); // WHERE id_cms_redirection <= 12
     * </code>
     *
     * @param     mixed $idCmsRedirection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByIdCmsRedirection($idCmsRedirection = null, $comparison = null)
    {
        if (is_array($idCmsRedirection)) {
            $useMinMax = false;
            if (isset($idCmsRedirection['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $idCmsRedirection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsRedirection['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $idCmsRedirection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $idCmsRedirection, $comparison);
    }

    /**
     * Filter the query on the url_source column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlSource('fooValue');   // WHERE url_source = 'fooValue'
     * $query->filterByUrlSource('%fooValue%'); // WHERE url_source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlSource The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByUrlSource($urlSource = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlSource)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $urlSource)) {
                $urlSource = str_replace('*', '%', $urlSource);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::URL_SOURCE, $urlSource, $comparison);
    }

    /**
     * Filter the query on the url_target column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlTarget('fooValue');   // WHERE url_target = 'fooValue'
     * $query->filterByUrlTarget('%fooValue%'); // WHERE url_target LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlTarget The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByUrlTarget($urlTarget = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlTarget)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $urlTarget)) {
                $urlTarget = str_replace('*', '%', $urlTarget);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::URL_TARGET, $urlTarget, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_scalar($type)) {
            $type = ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::TYPE, $type);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                $convertedValues[] = ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::TYPE, $value);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%'); // WHERE user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $user The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $user)) {
                $user = str_replace('*', '%', $user);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::USER, $user, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsRedirection $pacCmsRedirection Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function prune($pacCmsRedirection = null)
    {
        if ($pacCmsRedirection) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::ID_CMS_REDIRECTION, $pacCmsRedirection->getIdCmsRedirection(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsRedirectionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsRedirectionPeer::CREATED_AT);
    }
}
