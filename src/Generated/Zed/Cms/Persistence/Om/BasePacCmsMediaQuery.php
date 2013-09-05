<?php


/**
 * Base class that represents a query for the 'pac_cms_media' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByIdCmsMedia($order = Criteria::ASC) Order by the id_cms_media column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByMimeType($order = Criteria::ASC) Order by the mime_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByUpdatedFrom($order = Criteria::ASC) Order by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByIdCmsMedia() Group by the id_cms_media column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByMimeType() Group by the mime_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByUpdatedFrom() Group by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsMedia object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneByMimeType(string $mime_type) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia filtered by the mime_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneByUpdatedFrom(int $updated_from) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia filtered by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsMedia findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsMedia filtered by the updated_at column
 *
 * @method array findByIdCmsMedia(int $id_cms_media) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the id_cms_media column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the name column
 * @method array findByMimeType(string $mime_type) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the mime_type column
 * @method array findByUpdatedFrom(int $updated_from) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the updated_from column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_PacCmsMedia objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsMediaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsMediaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsMedia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsMedia|ProjectA_Zed_Cms_Persistence_PacCmsMedia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsMedia A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsMedia($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsMedia A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_media`, `name`, `mime_type`, `updated_from`, `created_at`, `updated_at` FROM `pac_cms_media` WHERE `id_cms_media` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsMedia();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMedia|ProjectA_Zed_Cms_Persistence_PacCmsMedia[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsMedia[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_media column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsMedia(1234); // WHERE id_cms_media = 1234
     * $query->filterByIdCmsMedia(array(12, 34)); // WHERE id_cms_media IN (12, 34)
     * $query->filterByIdCmsMedia(array('min' => 12)); // WHERE id_cms_media >= 12
     * $query->filterByIdCmsMedia(array('max' => 12)); // WHERE id_cms_media <= 12
     * </code>
     *
     * @param     mixed $idCmsMedia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByIdCmsMedia($idCmsMedia = null, $comparison = null)
    {
        if (is_array($idCmsMedia)) {
            $useMinMax = false;
            if (isset($idCmsMedia['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $idCmsMedia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsMedia['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $idCmsMedia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $idCmsMedia, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the mime_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMimeType('fooValue');   // WHERE mime_type = 'fooValue'
     * $query->filterByMimeType('%fooValue%'); // WHERE mime_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mimeType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByMimeType($mimeType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mimeType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mimeType)) {
                $mimeType = str_replace('*', '%', $mimeType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::MIME_TYPE, $mimeType, $comparison);
    }

    /**
     * Filter the query on the updated_from column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedFrom(1234); // WHERE updated_from = 1234
     * $query->filterByUpdatedFrom(array(12, 34)); // WHERE updated_from IN (12, 34)
     * $query->filterByUpdatedFrom(array('min' => 12)); // WHERE updated_from >= 12
     * $query->filterByUpdatedFrom(array('max' => 12)); // WHERE updated_from <= 12
     * </code>
     *
     * @param     mixed $updatedFrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByUpdatedFrom($updatedFrom = null, $comparison = null)
    {
        if (is_array($updatedFrom)) {
            $useMinMax = false;
            if (isset($updatedFrom['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_FROM, $updatedFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedFrom['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_FROM, $updatedFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_FROM, $updatedFrom, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsMedia $pacCmsMedia Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function prune($pacCmsMedia = null)
    {
        if ($pacCmsMedia) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::ID_CMS_MEDIA, $pacCmsMedia->getIdCmsMedia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsMediaQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsMediaPeer::CREATED_AT);
    }
}
