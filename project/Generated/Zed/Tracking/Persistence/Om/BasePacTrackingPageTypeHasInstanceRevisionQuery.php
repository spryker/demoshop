<?php


/**
 * Base class that represents a query for the 'pac_tracking_page_type_has_instance_revision' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery orderByIdTrackingPageTypeHasInstanceRevision($order = Criteria::ASC) Order by the id_tracking_page_type_has_instance_revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery orderByFkTrackingPageType($order = Criteria::ASC) Order by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery orderByFkTrackingInstanceRevision($order = Criteria::ASC) Order by the fk_tracking_instance_revision column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery groupByIdTrackingPageTypeHasInstanceRevision() Group by the id_tracking_page_type_has_instance_revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery groupByFkTrackingPageType() Group by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery groupByFkTrackingInstanceRevision() Group by the fk_tracking_instance_revision column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery leftJoinTrackingPageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPageType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery rightJoinTrackingPageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPageType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery innerJoinTrackingPageType($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPageType relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery leftJoinTrackingInstanceRevision($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery rightJoinTrackingInstanceRevision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery innerJoinTrackingInstanceRevision($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingInstanceRevision relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision findOneByFkTrackingPageType(int $fk_tracking_page_type) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision filtered by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision findOneByFkTrackingInstanceRevision(int $fk_tracking_instance_revision) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision filtered by the fk_tracking_instance_revision column
 *
 * @method array findByIdTrackingPageTypeHasInstanceRevision(int $id_tracking_page_type_has_instance_revision) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision objects filtered by the id_tracking_page_type_has_instance_revision column
 * @method array findByFkTrackingPageType(int $fk_tracking_page_type) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision objects filtered by the fk_tracking_page_type column
 * @method array findByFkTrackingInstanceRevision(int $fk_tracking_instance_revision) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision objects filtered by the fk_tracking_instance_revision column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPageTypeHasInstanceRevisionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPageTypeHasInstanceRevisionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingPageTypeHasInstanceRevision($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_page_type_has_instance_revision`, `fk_tracking_page_type`, `fk_tracking_instance_revision` FROM `pac_tracking_page_type_has_instance_revision` WHERE `id_tracking_page_type_has_instance_revision` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_page_type_has_instance_revision column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingPageTypeHasInstanceRevision(1234); // WHERE id_tracking_page_type_has_instance_revision = 1234
     * $query->filterByIdTrackingPageTypeHasInstanceRevision(array(12, 34)); // WHERE id_tracking_page_type_has_instance_revision IN (12, 34)
     * $query->filterByIdTrackingPageTypeHasInstanceRevision(array('min' => 12)); // WHERE id_tracking_page_type_has_instance_revision >= 12
     * $query->filterByIdTrackingPageTypeHasInstanceRevision(array('max' => 12)); // WHERE id_tracking_page_type_has_instance_revision <= 12
     * </code>
     *
     * @param     mixed $idTrackingPageTypeHasInstanceRevision The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByIdTrackingPageTypeHasInstanceRevision($idTrackingPageTypeHasInstanceRevision = null, $comparison = null)
    {
        if (is_array($idTrackingPageTypeHasInstanceRevision)) {
            $useMinMax = false;
            if (isset($idTrackingPageTypeHasInstanceRevision['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $idTrackingPageTypeHasInstanceRevision['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingPageTypeHasInstanceRevision['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $idTrackingPageTypeHasInstanceRevision['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $idTrackingPageTypeHasInstanceRevision, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_page_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingPageType(1234); // WHERE fk_tracking_page_type = 1234
     * $query->filterByFkTrackingPageType(array(12, 34)); // WHERE fk_tracking_page_type IN (12, 34)
     * $query->filterByFkTrackingPageType(array('min' => 12)); // WHERE fk_tracking_page_type >= 12
     * $query->filterByFkTrackingPageType(array('max' => 12)); // WHERE fk_tracking_page_type <= 12
     * </code>
     *
     * @see       filterByTrackingPageType()
     *
     * @param     mixed $fkTrackingPageType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByFkTrackingPageType($fkTrackingPageType = null, $comparison = null)
    {
        if (is_array($fkTrackingPageType)) {
            $useMinMax = false;
            if (isset($fkTrackingPageType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingPageType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_instance_revision column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingInstanceRevision(1234); // WHERE fk_tracking_instance_revision = 1234
     * $query->filterByFkTrackingInstanceRevision(array(12, 34)); // WHERE fk_tracking_instance_revision IN (12, 34)
     * $query->filterByFkTrackingInstanceRevision(array('min' => 12)); // WHERE fk_tracking_instance_revision >= 12
     * $query->filterByFkTrackingInstanceRevision(array('max' => 12)); // WHERE fk_tracking_instance_revision <= 12
     * </code>
     *
     * @see       filterByTrackingInstanceRevision()
     *
     * @param     mixed $fkTrackingInstanceRevision The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByFkTrackingInstanceRevision($fkTrackingInstanceRevision = null, $comparison = null)
    {
        if (is_array($fkTrackingInstanceRevision)) {
            $useMinMax = false;
            if (isset($fkTrackingInstanceRevision['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_INSTANCE_REVISION, $fkTrackingInstanceRevision['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingInstanceRevision['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_INSTANCE_REVISION, $fkTrackingInstanceRevision['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_INSTANCE_REVISION, $fkTrackingInstanceRevision, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingPageType object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageType|PropelObjectCollection $pacTrackingPageType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPageType($pacTrackingPageType, $comparison = null)
    {
        if ($pacTrackingPageType instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPageType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_PAGE_TYPE, $pacTrackingPageType->getIdTrackingPageType(), $comparison);
        } elseif ($pacTrackingPageType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_PAGE_TYPE, $pacTrackingPageType->toKeyValue('PrimaryKey', 'IdTrackingPageType'), $comparison);
        } else {
            throw new PropelException('filterByTrackingPageType() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingPageType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPageType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function joinTrackingPageType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPageType');

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
            $this->addJoinObject($join, 'TrackingPageType');
        }

        return $this;
    }

    /**
     * Use the TrackingPageType relation PacTrackingPageType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPageTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPageType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPageType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision|PropelObjectCollection $pacTrackingInstanceRevision The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingInstanceRevision($pacTrackingInstanceRevision, $comparison = null)
    {
        if ($pacTrackingInstanceRevision instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_INSTANCE_REVISION, $pacTrackingInstanceRevision->getIdTrackingInstanceRevision(), $comparison);
        } elseif ($pacTrackingInstanceRevision instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::FK_TRACKING_INSTANCE_REVISION, $pacTrackingInstanceRevision->toKeyValue('PrimaryKey', 'IdTrackingInstanceRevision'), $comparison);
        } else {
            throw new PropelException('filterByTrackingInstanceRevision() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingInstanceRevision relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function joinTrackingInstanceRevision($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingInstanceRevision');

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
            $this->addJoinObject($join, 'TrackingInstanceRevision');
        }

        return $this;
    }

    /**
     * Use the TrackingInstanceRevision relation PacTrackingInstanceRevision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery A secondary query class using the current class as primary query
     */
    public function useTrackingInstanceRevisionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingInstanceRevision($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision $pacTrackingPageTypeHasInstanceRevision Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery The current query, for fluid interface
     */
    public function prune($pacTrackingPageTypeHasInstanceRevision = null)
    {
        if ($pacTrackingPageTypeHasInstanceRevision) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionPeer::ID_TRACKING_PAGE_TYPE_HAS_INSTANCE_REVISION, $pacTrackingPageTypeHasInstanceRevision->getIdTrackingPageTypeHasInstanceRevision(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
