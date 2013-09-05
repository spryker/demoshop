<?php


/**
 * Base class that represents a query for the 'pac_tracking_exclusivity' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery orderByIdTrackingExclusivity($order = Criteria::ASC) Order by the id_tracking_exclusivity column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery orderByFkTrackingExclusivityGroup($order = Criteria::ASC) Order by the fk_tracking_exclusivity_group column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery orderByFkTrackingInstance($order = Criteria::ASC) Order by the fk_tracking_instance column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery groupByIdTrackingExclusivity() Group by the id_tracking_exclusivity column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery groupByFkTrackingExclusivityGroup() Group by the fk_tracking_exclusivity_group column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery groupByFkTrackingInstance() Group by the fk_tracking_instance column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery leftJoinTrackingPageExclusivityGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPageExclusivityGroup relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery rightJoinTrackingPageExclusivityGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPageExclusivityGroup relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery innerJoinTrackingPageExclusivityGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPageExclusivityGroup relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery leftJoinTrackingInstance($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery rightJoinTrackingInstance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery innerJoinTrackingInstance($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingInstance relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity findOneByFkTrackingExclusivityGroup(int $fk_tracking_exclusivity_group) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity filtered by the fk_tracking_exclusivity_group column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity findOneByFkTrackingInstance(int $fk_tracking_instance) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity filtered by the fk_tracking_instance column
 *
 * @method array findByIdTrackingExclusivity(int $id_tracking_exclusivity) Return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects filtered by the id_tracking_exclusivity column
 * @method array findByFkTrackingExclusivityGroup(int $fk_tracking_exclusivity_group) Return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects filtered by the fk_tracking_exclusivity_group column
 * @method array findByFkTrackingInstance(int $fk_tracking_instance) Return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects filtered by the fk_tracking_instance column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingExclusivityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingExclusivityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingExclusivity($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_exclusivity`, `fk_tracking_exclusivity_group`, `fk_tracking_instance` FROM `pac_tracking_exclusivity` WHERE `id_tracking_exclusivity` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_exclusivity column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingExclusivity(1234); // WHERE id_tracking_exclusivity = 1234
     * $query->filterByIdTrackingExclusivity(array(12, 34)); // WHERE id_tracking_exclusivity IN (12, 34)
     * $query->filterByIdTrackingExclusivity(array('min' => 12)); // WHERE id_tracking_exclusivity >= 12
     * $query->filterByIdTrackingExclusivity(array('max' => 12)); // WHERE id_tracking_exclusivity <= 12
     * </code>
     *
     * @param     mixed $idTrackingExclusivity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function filterByIdTrackingExclusivity($idTrackingExclusivity = null, $comparison = null)
    {
        if (is_array($idTrackingExclusivity)) {
            $useMinMax = false;
            if (isset($idTrackingExclusivity['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $idTrackingExclusivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingExclusivity['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $idTrackingExclusivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $idTrackingExclusivity, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_exclusivity_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingExclusivityGroup(1234); // WHERE fk_tracking_exclusivity_group = 1234
     * $query->filterByFkTrackingExclusivityGroup(array(12, 34)); // WHERE fk_tracking_exclusivity_group IN (12, 34)
     * $query->filterByFkTrackingExclusivityGroup(array('min' => 12)); // WHERE fk_tracking_exclusivity_group >= 12
     * $query->filterByFkTrackingExclusivityGroup(array('max' => 12)); // WHERE fk_tracking_exclusivity_group <= 12
     * </code>
     *
     * @see       filterByTrackingPageExclusivityGroup()
     *
     * @param     mixed $fkTrackingExclusivityGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function filterByFkTrackingExclusivityGroup($fkTrackingExclusivityGroup = null, $comparison = null)
    {
        if (is_array($fkTrackingExclusivityGroup)) {
            $useMinMax = false;
            if (isset($fkTrackingExclusivityGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_EXCLUSIVITY_GROUP, $fkTrackingExclusivityGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingExclusivityGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_EXCLUSIVITY_GROUP, $fkTrackingExclusivityGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_EXCLUSIVITY_GROUP, $fkTrackingExclusivityGroup, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_instance column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingInstance(1234); // WHERE fk_tracking_instance = 1234
     * $query->filterByFkTrackingInstance(array(12, 34)); // WHERE fk_tracking_instance IN (12, 34)
     * $query->filterByFkTrackingInstance(array('min' => 12)); // WHERE fk_tracking_instance >= 12
     * $query->filterByFkTrackingInstance(array('max' => 12)); // WHERE fk_tracking_instance <= 12
     * </code>
     *
     * @see       filterByTrackingInstance()
     *
     * @param     mixed $fkTrackingInstance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function filterByFkTrackingInstance($fkTrackingInstance = null, $comparison = null)
    {
        if (is_array($fkTrackingInstance)) {
            $useMinMax = false;
            if (isset($fkTrackingInstance['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingInstance['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroup object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroup|PropelObjectCollection $pacTrackingExclusivityGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPageExclusivityGroup($pacTrackingExclusivityGroup, $comparison = null)
    {
        if ($pacTrackingExclusivityGroup instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_EXCLUSIVITY_GROUP, $pacTrackingExclusivityGroup->getIdTrackingExclusivityGroup(), $comparison);
        } elseif ($pacTrackingExclusivityGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_EXCLUSIVITY_GROUP, $pacTrackingExclusivityGroup->toKeyValue('PrimaryKey', 'IdTrackingExclusivityGroup'), $comparison);
        } else {
            throw new PropelException('filterByTrackingPageExclusivityGroup() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPageExclusivityGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function joinTrackingPageExclusivityGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPageExclusivityGroup');

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
            $this->addJoinObject($join, 'TrackingPageExclusivityGroup');
        }

        return $this;
    }

    /**
     * Use the TrackingPageExclusivityGroup relation PacTrackingExclusivityGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroupQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPageExclusivityGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPageExclusivityGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPageExclusivityGroup', 'ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingInstance object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstance|PropelObjectCollection $pacTrackingInstance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingInstance($pacTrackingInstance, $comparison = null)
    {
        if ($pacTrackingInstance instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstance) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_INSTANCE, $pacTrackingInstance->getIdTrackingInstance(), $comparison);
        } elseif ($pacTrackingInstance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::FK_TRACKING_INSTANCE, $pacTrackingInstance->toKeyValue('PrimaryKey', 'IdTrackingInstance'), $comparison);
        } else {
            throw new PropelException('filterByTrackingInstance() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingInstance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingInstance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function joinTrackingInstance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingInstance');

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
            $this->addJoinObject($join, 'TrackingInstance');
        }

        return $this;
    }

    /**
     * Use the TrackingInstance relation PacTrackingInstance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery A secondary query class using the current class as primary query
     */
    public function useTrackingInstanceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingInstance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity $pacTrackingExclusivity Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery The current query, for fluid interface
     */
    public function prune($pacTrackingExclusivity = null)
    {
        if ($pacTrackingExclusivity) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityPeer::ID_TRACKING_EXCLUSIVITY, $pacTrackingExclusivity->getIdTrackingExclusivity(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
