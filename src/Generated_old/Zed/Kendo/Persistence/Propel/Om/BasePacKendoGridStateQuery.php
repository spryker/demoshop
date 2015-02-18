<?php


/**
 * Base class that represents a query for the 'pac_kendo_grid_state' table.
 *
 *
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery orderByIdKendoGridState($order = Criteria::ASC) Order by the id_kendo_grid_state column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery orderByFkAclUser($order = Criteria::ASC) Order by the fk_acl_user column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery orderByIdGrid($order = Criteria::ASC) Order by the id_grid column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery orderByState($order = Criteria::ASC) Order by the state column
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery groupByIdKendoGridState() Group by the id_kendo_grid_state column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery groupByFkAclUser() Group by the fk_acl_user column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery groupByIdGrid() Group by the id_grid column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery groupByState() Group by the state column
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery leftJoinAclUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery rightJoinAclUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery innerJoinAclUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUser relation
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState matching the query
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState matching the query, or a new ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState findOneByFkAclUser(int $fk_acl_user) Return the first ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState filtered by the fk_acl_user column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState findOneByIdGrid(string $id_grid) Return the first ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState filtered by the id_grid column
 * @method ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState findOneByState(string $state) Return the first ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState filtered by the state column
 *
 * @method array findByIdKendoGridState(int $id_kendo_grid_state) Return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState objects filtered by the id_kendo_grid_state column
 * @method array findByFkAclUser(int $fk_acl_user) Return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState objects filtered by the fk_acl_user column
 * @method array findByIdGrid(string $id_grid) Return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState objects filtered by the id_grid column
 * @method array findByState(string $state) Return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState objects filtered by the state column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Kendo/Persistence/Propel.om
 */
abstract class Generated_Zed_Kendo_Persistence_Propel_Om_BasePacKendoGridStateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Kendo_Persistence_Propel_Om_BasePacKendoGridStateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacKendoGridState']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState|ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdKendoGridState($key, $con = null)
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
     * @return                 ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_kendo_grid_state`, `fk_acl_user`, `id_grid`, `state` FROM `pac_kendo_grid_state` WHERE `id_kendo_grid_state` = :p0';
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
            $obj = new ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState();
            $obj->hydrate($row);
            ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState|ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_kendo_grid_state column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKendoGridState(1234); // WHERE id_kendo_grid_state = 1234
     * $query->filterByIdKendoGridState(array(12, 34)); // WHERE id_kendo_grid_state IN (12, 34)
     * $query->filterByIdKendoGridState(array('min' => 12)); // WHERE id_kendo_grid_state >= 12
     * $query->filterByIdKendoGridState(array('max' => 12)); // WHERE id_kendo_grid_state <= 12
     * </code>
     *
     * @param     mixed $idKendoGridState The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByIdKendoGridState($idKendoGridState = null, $comparison = null)
    {
        if (is_array($idKendoGridState)) {
            $useMinMax = false;
            if (isset($idKendoGridState['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $idKendoGridState['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idKendoGridState['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $idKendoGridState['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $idKendoGridState, $comparison);
    }

    /**
     * Filter the query on the fk_acl_user column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclUser(1234); // WHERE fk_acl_user = 1234
     * $query->filterByFkAclUser(array(12, 34)); // WHERE fk_acl_user IN (12, 34)
     * $query->filterByFkAclUser(array('min' => 12)); // WHERE fk_acl_user >= 12
     * $query->filterByFkAclUser(array('max' => 12)); // WHERE fk_acl_user <= 12
     * </code>
     *
     * @see       filterByAclUser()
     *
     * @param     mixed $fkAclUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByFkAclUser($fkAclUser = null, $comparison = null)
    {
        if (is_array($fkAclUser)) {
            $useMinMax = false;
            if (isset($fkAclUser['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::FK_ACL_USER, $fkAclUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclUser['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::FK_ACL_USER, $fkAclUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::FK_ACL_USER, $fkAclUser, $comparison);
    }

    /**
     * Filter the query on the id_grid column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGrid('fooValue');   // WHERE id_grid = 'fooValue'
     * $query->filterByIdGrid('%fooValue%'); // WHERE id_grid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idGrid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByIdGrid($idGrid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idGrid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idGrid)) {
                $idGrid = str_replace('*', '%', $idGrid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_GRID, $idGrid, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%'); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $state)) {
                $state = str_replace('*', '%', $state);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::STATE, $state, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclUser|PropelObjectCollection $pacAclUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUser($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::FK_ACL_USER, $pacAclUser->getIdAclUser(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::FK_ACL_USER, $pacAclUser->toKeyValue('PrimaryKey', 'IdAclUser'), $comparison);
        } else {
            throw new PropelException('filterByAclUser() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function joinAclUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclUser');

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
            $this->addJoinObject($join, 'AclUser');
        }

        return $this;
    }

    /**
     * Use the AclUser relation PacAclUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUser', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState $pacKendoGridState Object to remove from the list of results
     *
     * @return ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery The current query, for fluid interface
     */
    public function prune($pacKendoGridState = null)
    {
        if ($pacKendoGridState) {
            $this->addUsingAlias(ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStatePeer::ID_KENDO_GRID_STATE, $pacKendoGridState->getIdKendoGridState(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
