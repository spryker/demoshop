<?php


/**
 * Base class that represents a query for the 'pac_tracking_library' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery orderByIdTrackingLibrary($order = Criteria::ASC) Order by the id_tracking_library column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery orderByFkTrackingPixelType($order = Criteria::ASC) Order by the fk_tracking_pixel_type column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery groupByIdTrackingLibrary() Group by the id_tracking_library column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery groupByFkTrackingPixelType() Group by the fk_tracking_pixel_type column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery leftJoinTrackingPixelType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPixelType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery rightJoinTrackingPixelType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPixelType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery innerJoinTrackingPixelType($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPixelType relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery leftJoinTrackingLibraryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingLibraryCode relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery rightJoinTrackingLibraryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingLibraryCode relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery innerJoinTrackingLibraryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingLibraryCode relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary findOneByName(string $name) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary filtered by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary findOneByFkTrackingPixelType(int $fk_tracking_pixel_type) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary filtered by the fk_tracking_pixel_type column
 *
 * @method array findByIdTrackingLibrary(int $id_tracking_library) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary objects filtered by the id_tracking_library column
 * @method array findByName(string $name) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary objects filtered by the name column
 * @method array findByFkTrackingPixelType(int $fk_tracking_pixel_type) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary objects filtered by the fk_tracking_pixel_type column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingLibraryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingLibraryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary|ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingLibrary($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_library`, `name`, `fk_tracking_pixel_type` FROM `pac_tracking_library` WHERE `id_tracking_library` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary|ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_library column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingLibrary(1234); // WHERE id_tracking_library = 1234
     * $query->filterByIdTrackingLibrary(array(12, 34)); // WHERE id_tracking_library IN (12, 34)
     * $query->filterByIdTrackingLibrary(array('min' => 12)); // WHERE id_tracking_library >= 12
     * $query->filterByIdTrackingLibrary(array('max' => 12)); // WHERE id_tracking_library <= 12
     * </code>
     *
     * @param     mixed $idTrackingLibrary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function filterByIdTrackingLibrary($idTrackingLibrary = null, $comparison = null)
    {
        if (is_array($idTrackingLibrary)) {
            $useMinMax = false;
            if (isset($idTrackingLibrary['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $idTrackingLibrary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingLibrary['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $idTrackingLibrary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $idTrackingLibrary, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_pixel_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingPixelType(1234); // WHERE fk_tracking_pixel_type = 1234
     * $query->filterByFkTrackingPixelType(array(12, 34)); // WHERE fk_tracking_pixel_type IN (12, 34)
     * $query->filterByFkTrackingPixelType(array('min' => 12)); // WHERE fk_tracking_pixel_type >= 12
     * $query->filterByFkTrackingPixelType(array('max' => 12)); // WHERE fk_tracking_pixel_type <= 12
     * </code>
     *
     * @see       filterByTrackingPixelType()
     *
     * @param     mixed $fkTrackingPixelType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function filterByFkTrackingPixelType($fkTrackingPixelType = null, $comparison = null)
    {
        if (is_array($fkTrackingPixelType)) {
            $useMinMax = false;
            if (isset($fkTrackingPixelType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::FK_TRACKING_PIXEL_TYPE, $fkTrackingPixelType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingPixelType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::FK_TRACKING_PIXEL_TYPE, $fkTrackingPixelType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::FK_TRACKING_PIXEL_TYPE, $fkTrackingPixelType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType|PropelObjectCollection $pacTrackingPixelType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPixelType($pacTrackingPixelType, $comparison = null)
    {
        if ($pacTrackingPixelType instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::FK_TRACKING_PIXEL_TYPE, $pacTrackingPixelType->getIdTrackingPixelType(), $comparison);
        } elseif ($pacTrackingPixelType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::FK_TRACKING_PIXEL_TYPE, $pacTrackingPixelType->toKeyValue('PrimaryKey', 'IdTrackingPixelType'), $comparison);
        } else {
            throw new PropelException('filterByTrackingPixelType() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingPixelType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPixelType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function joinTrackingPixelType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPixelType');

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
            $this->addJoinObject($join, 'TrackingPixelType');
        }

        return $this;
    }

    /**
     * Use the TrackingPixelType relation PacTrackingPixelType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPixelTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPixelType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPixelType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPixelTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode|PropelObjectCollection $pacTrackingLibraryCode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingLibraryCode($pacTrackingLibraryCode, $comparison = null)
    {
        if ($pacTrackingLibraryCode instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $pacTrackingLibraryCode->getFkTrackingLibrary(), $comparison);
        } elseif ($pacTrackingLibraryCode instanceof PropelObjectCollection) {
            return $this
                ->useTrackingLibraryCodeQuery()
                ->filterByPrimaryKeys($pacTrackingLibraryCode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingLibraryCode() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingLibraryCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function joinTrackingLibraryCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingLibraryCode');

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
            $this->addJoinObject($join, 'TrackingLibraryCode');
        }

        return $this;
    }

    /**
     * Use the TrackingLibraryCode relation PacTrackingLibraryCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingLibraryCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingLibraryCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingLibraryCode', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary $pacTrackingLibrary Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery The current query, for fluid interface
     */
    public function prune($pacTrackingLibrary = null)
    {
        if ($pacTrackingLibrary) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryPeer::ID_TRACKING_LIBRARY, $pacTrackingLibrary->getIdTrackingLibrary(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
