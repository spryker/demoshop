<?php


/**
 * Base class that represents a query for the 'pac_dwh_relation_size' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery orderByIdDwhRelationSize($order = Criteria::ASC) Order by the id_dwh_relation_size column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery orderByRelation($order = Criteria::ASC) Order by the relation column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery groupByIdDwhRelationSize() Group by the id_dwh_relation_size column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery groupByRelation() Group by the relation column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery groupBySize() Group by the size column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOneByRelation(string $relation) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize filtered by the relation column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOneBySize(string $size) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize filtered by the size column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize filtered by the updated_at column
 *
 * @method array findByIdDwhRelationSize(int $id_dwh_relation_size) Return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize objects filtered by the id_dwh_relation_size column
 * @method array findByRelation(string $relation) Return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize objects filtered by the relation column
 * @method array findBySize(string $size) Return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize objects filtered by the size column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhRelationSizeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhRelationSizeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize|ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhRelationSize($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_relation_size`, `relation`, `size`, `created_at`, `updated_at` FROM `pac_dwh_relation_size` WHERE `id_dwh_relation_size` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize|ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_relation_size column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhRelationSize(1234); // WHERE id_dwh_relation_size = 1234
     * $query->filterByIdDwhRelationSize(array(12, 34)); // WHERE id_dwh_relation_size IN (12, 34)
     * $query->filterByIdDwhRelationSize(array('min' => 12)); // WHERE id_dwh_relation_size >= 12
     * $query->filterByIdDwhRelationSize(array('max' => 12)); // WHERE id_dwh_relation_size <= 12
     * </code>
     *
     * @param     mixed $idDwhRelationSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByIdDwhRelationSize($idDwhRelationSize = null, $comparison = null)
    {
        if (is_array($idDwhRelationSize)) {
            $useMinMax = false;
            if (isset($idDwhRelationSize['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $idDwhRelationSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhRelationSize['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $idDwhRelationSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $idDwhRelationSize, $comparison);
    }

    /**
     * Filter the query on the relation column
     *
     * Example usage:
     * <code>
     * $query->filterByRelation('fooValue');   // WHERE relation = 'fooValue'
     * $query->filterByRelation('%fooValue%'); // WHERE relation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $relation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByRelation($relation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($relation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $relation)) {
                $relation = str_replace('*', '%', $relation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::RELATION, $relation, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size >= 12
     * $query->filterBySize(array('max' => 12)); // WHERE size <= 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::SIZE, $size, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhRelationSize $pacDwhRelationSize Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function prune($pacDwhRelationSize = null)
    {
        if ($pacDwhRelationSize) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::ID_DWH_RELATION_SIZE, $pacDwhRelationSize->getIdDwhRelationSize(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhRelationSizePeer::CREATED_AT);
    }
}
