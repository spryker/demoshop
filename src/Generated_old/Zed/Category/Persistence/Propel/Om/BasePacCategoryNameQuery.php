<?php


/**
 * Base class that represents a query for the 'pac_category_name' table.
 *
 *
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery orderByIdCategoryName($order = Criteria::ASC) Order by the id_category_name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery groupByIdCategoryName() Group by the id_category_name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery groupByStatus() Group by the status column
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryName findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryName matching the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryName findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryName matching the query, or a new ProjectA_Zed_Category_Persistence_Propel_PacCategoryName object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryName findOneByName(string $name) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryName filtered by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryName findOneByStatus(int $status) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryName filtered by the status column
 *
 * @method array findByIdCategoryName(int $id_category_name) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryName objects filtered by the id_category_name column
 * @method array findByName(string $name) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryName objects filtered by the name column
 * @method array findByStatus(int $status) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryName objects filtered by the status column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Category/Persistence/Propel.om
 */
abstract class Generated_Zed_Category_Persistence_Propel_Om_BasePacCategoryNameQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Propel_Om_BasePacCategoryNameQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryName']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Category_Persistence_Propel_PacCategoryName|ProjectA_Zed_Category_Persistence_Propel_PacCategoryName[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryName A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryName($key, $con = null)
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
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryName A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_name`, `name`, `status` FROM `pac_category_name` WHERE `id_category_name` = :p0';
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
            $obj = new ProjectA_Zed_Category_Persistence_Propel_PacCategoryName();
            $obj->hydrate($row);
            ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryName|ProjectA_Zed_Category_Persistence_Propel_PacCategoryName[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_Propel_PacCategoryName[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryName(1234); // WHERE id_category_name = 1234
     * $query->filterByIdCategoryName(array(12, 34)); // WHERE id_category_name IN (12, 34)
     * $query->filterByIdCategoryName(array('min' => 12)); // WHERE id_category_name >= 12
     * $query->filterByIdCategoryName(array('max' => 12)); // WHERE id_category_name <= 12
     * </code>
     *
     * @param     mixed $idCategoryName The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function filterByIdCategoryName($idCategoryName = null, $comparison = null)
    {
        if (is_array($idCategoryName)) {
            $useMinMax = false;
            if (isset($idCategoryName['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $idCategoryName['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryName['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $idCategoryName['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $idCategoryName, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_Propel_PacCategory object
     *
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategory|PropelObjectCollection $pacCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($pacCategory, $comparison = null)
    {
        if ($pacCategory instanceof ProjectA_Zed_Category_Persistence_Propel_PacCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $pacCategory->getFkCategoryName(), $comparison);
        } elseif ($pacCategory instanceof PropelObjectCollection) {
            return $this
                ->useCategoryQuery()
                ->filterByPrimaryKeys($pacCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ProjectA_Zed_Category_Persistence_Propel_PacCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation PacCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_Propel_PacCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ProjectA_Zed_Category_Persistence_Propel_PacCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategoryName $pacCategoryName Object to remove from the list of results
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryNameQuery The current query, for fluid interface
     */
    public function prune($pacCategoryName = null)
    {
        if ($pacCategoryName) {
            $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryNamePeer::ID_CATEGORY_NAME, $pacCategoryName->getIdCategoryName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
