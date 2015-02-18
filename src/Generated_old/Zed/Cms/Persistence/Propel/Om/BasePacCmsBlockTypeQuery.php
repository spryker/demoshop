<?php


/**
 * Base class that represents a query for the 'pac_cms_block_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery orderByIdCmsBlockType($order = Criteria::ASC) Order by the id_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery groupByIdCmsBlockType() Group by the id_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery leftJoinPacCmsPartial($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery rightJoinPacCmsPartial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery innerJoinPacCmsPartial($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPartial relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery leftJoinPacCmsBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery rightJoinPacCmsBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery innerJoinPacCmsBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType filtered by the name column
 *
 * @method array findByIdCmsBlockType(int $id_cms_block_type) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType objects filtered by the id_cms_block_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType objects filtered by the name column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockTypeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsBlockType']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsBlockType($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_block_type`, `name` FROM `pac_cms_block_type` WHERE `id_cms_block_type` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_block_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsBlockType(1234); // WHERE id_cms_block_type = 1234
     * $query->filterByIdCmsBlockType(array(12, 34)); // WHERE id_cms_block_type IN (12, 34)
     * $query->filterByIdCmsBlockType(array('min' => 12)); // WHERE id_cms_block_type >= 12
     * $query->filterByIdCmsBlockType(array('max' => 12)); // WHERE id_cms_block_type <= 12
     * </code>
     *
     * @param     mixed $idCmsBlockType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function filterByIdCmsBlockType($idCmsBlockType = null, $comparison = null)
    {
        if (is_array($idCmsBlockType)) {
            $useMinMax = false;
            if (isset($idCmsBlockType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $idCmsBlockType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsBlockType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $idCmsBlockType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $idCmsBlockType, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial|PropelObjectCollection $pacCmsPartial  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPartial($pacCmsPartial, $comparison = null)
    {
        if ($pacCmsPartial instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $pacCmsPartial->getFkCmsBlockType(), $comparison);
        } elseif ($pacCmsPartial instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsPartialQuery()
                ->filterByPrimaryKeys($pacCmsPartial->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsPartial() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPartial relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function joinPacCmsPartial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPartial');

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
            $this->addJoinObject($join, 'PacCmsPartial');
        }

        return $this;
    }

    /**
     * Use the PacCmsPartial relation PacCmsPartial object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPartialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPartial($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPartial', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock|PropelObjectCollection $pacCmsBlock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlock($pacCmsBlock, $comparison = null)
    {
        if ($pacCmsBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $pacCmsBlock->getFkCmsBlockType(), $comparison);
        } elseif ($pacCmsBlock instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockQuery()
                ->filterByPrimaryKeys($pacCmsBlock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlock() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function joinPacCmsBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlock');

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
            $this->addJoinObject($join, 'PacCmsBlock');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlock relation PacCmsBlock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType $pacCmsBlockType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery The current query, for fluid interface
     */
    public function prune($pacCmsBlockType = null)
    {
        if ($pacCmsBlockType) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypePeer::ID_CMS_BLOCK_TYPE, $pacCmsBlockType->getIdCmsBlockType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
