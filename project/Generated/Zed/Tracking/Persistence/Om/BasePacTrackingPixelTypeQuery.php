<?php


/**
 * Base class that represents a query for the 'pac_tracking_pixel_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery orderByIdTrackingPixelType($order = Criteria::ASC) Order by the id_tracking_pixel_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery groupByIdTrackingPixelType() Group by the id_tracking_pixel_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery leftJoinTrackingLibrary($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingLibrary relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery rightJoinTrackingLibrary($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingLibrary relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery innerJoinTrackingLibrary($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingLibrary relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType findOneByName(string $name) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType filtered by the name column
 *
 * @method array findByIdTrackingPixelType(int $id_tracking_pixel_type) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType objects filtered by the id_tracking_pixel_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPixelTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPixelTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType|ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingPixelType($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_pixel_type`, `name` FROM `pac_tracking_pixel_type` WHERE `id_tracking_pixel_type` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType|ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_pixel_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingPixelType(1234); // WHERE id_tracking_pixel_type = 1234
     * $query->filterByIdTrackingPixelType(array(12, 34)); // WHERE id_tracking_pixel_type IN (12, 34)
     * $query->filterByIdTrackingPixelType(array('min' => 12)); // WHERE id_tracking_pixel_type >= 12
     * $query->filterByIdTrackingPixelType(array('max' => 12)); // WHERE id_tracking_pixel_type <= 12
     * </code>
     *
     * @param     mixed $idTrackingPixelType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     */
    public function filterByIdTrackingPixelType($idTrackingPixelType = null, $comparison = null)
    {
        if (is_array($idTrackingPixelType)) {
            $useMinMax = false;
            if (isset($idTrackingPixelType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $idTrackingPixelType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingPixelType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $idTrackingPixelType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $idTrackingPixelType, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary|PropelObjectCollection $pacTrackingLibrary  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingLibrary($pacTrackingLibrary, $comparison = null)
    {
        if ($pacTrackingLibrary instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $pacTrackingLibrary->getFkTrackingPixelType(), $comparison);
        } elseif ($pacTrackingLibrary instanceof PropelObjectCollection) {
            return $this
                ->useTrackingLibraryQuery()
                ->filterByPrimaryKeys($pacTrackingLibrary->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingLibrary() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingLibrary relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     */
    public function joinTrackingLibrary($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingLibrary');

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
            $this->addJoinObject($join, 'TrackingLibrary');
        }

        return $this;
    }

    /**
     * Use the TrackingLibrary relation PacTrackingLibrary object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery A secondary query class using the current class as primary query
     */
    public function useTrackingLibraryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingLibrary($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingLibrary', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType $pacTrackingPixelType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery The current query, for fluid interface
     */
    public function prune($pacTrackingPixelType = null)
    {
        if ($pacTrackingPixelType) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypePeer::ID_TRACKING_PIXEL_TYPE, $pacTrackingPixelType->getIdTrackingPixelType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
