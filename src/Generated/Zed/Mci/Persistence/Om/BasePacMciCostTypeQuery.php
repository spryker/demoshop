<?php


/**
 * Base class that represents a query for the 'pac_mci_cost_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery orderByIdMciCostType($order = Criteria::ASC) Order by the id_mci_cost_type column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery groupByIdMciCostType() Group by the id_mci_cost_type column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery leftJoinPacMciCostEntry($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery rightJoinPacMciCostEntry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery innerJoinPacMciCostEntry($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMciCostEntry relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostType matching the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostType matching the query, or a new ProjectA_Zed_Mci_Persistence_PacMciCostType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostType findOneByName(string $name) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostType filtered by the name column
 *
 * @method array findByIdMciCostType(int $id_mci_cost_type) Return ProjectA_Zed_Mci_Persistence_PacMciCostType objects filtered by the id_mci_cost_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Mci_Persistence_PacMciCostType objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.om
 */
abstract class Generated_Zed_Mci_Persistence_Om_BasePacMciCostTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mci_Persistence_Om_BasePacMciCostTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mci_Persistence_PacMciCostType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery();
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
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostType|ProjectA_Zed_Mci_Persistence_PacMciCostType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMciCostType($key, $con = null)
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
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mci_cost_type`, `name` FROM `pac_mci_cost_type` WHERE `id_mci_cost_type` = :p0';
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
            $obj = new ProjectA_Zed_Mci_Persistence_PacMciCostType();
            $obj->hydrate($row);
            ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostType|ProjectA_Zed_Mci_Persistence_PacMciCostType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mci_cost_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMciCostType(1234); // WHERE id_mci_cost_type = 1234
     * $query->filterByIdMciCostType(array(12, 34)); // WHERE id_mci_cost_type IN (12, 34)
     * $query->filterByIdMciCostType(array('min' => 12)); // WHERE id_mci_cost_type >= 12
     * $query->filterByIdMciCostType(array('max' => 12)); // WHERE id_mci_cost_type <= 12
     * </code>
     *
     * @param     mixed $idMciCostType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     */
    public function filterByIdMciCostType($idMciCostType = null, $comparison = null)
    {
        if (is_array($idMciCostType)) {
            $useMinMax = false;
            if (isset($idMciCostType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $idMciCostType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMciCostType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $idMciCostType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $idMciCostType, $comparison);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mci_Persistence_PacMciCostEntry object
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostEntry|PropelObjectCollection $pacMciCostEntry  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMciCostEntry($pacMciCostEntry, $comparison = null)
    {
        if ($pacMciCostEntry instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $pacMciCostEntry->getFkMciCostType(), $comparison);
        } elseif ($pacMciCostEntry instanceof PropelObjectCollection) {
            return $this
                ->usePacMciCostEntryQuery()
                ->filterByPrimaryKeys($pacMciCostEntry->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMciCostEntry() only accepts arguments of type ProjectA_Zed_Mci_Persistence_PacMciCostEntry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMciCostEntry relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     */
    public function joinPacMciCostEntry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMciCostEntry');

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
            $this->addJoinObject($join, 'PacMciCostEntry');
        }

        return $this;
    }

    /**
     * Use the PacMciCostEntry relation PacMciCostEntry object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery A secondary query class using the current class as primary query
     */
    public function usePacMciCostEntryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMciCostEntry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMciCostEntry', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostType $pacMciCostType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery The current query, for fluid interface
     */
    public function prune($pacMciCostType = null)
    {
        if ($pacMciCostType) {
            $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $pacMciCostType->getIdMciCostType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
