<?php


/**
 * Base class that represents a query for the 'pac_stock_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery orderByIdStockAttribute($order = Criteria::ASC) Order by the id_stock_attribute column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery groupByIdStockAttribute() Group by the id_stock_attribute column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery leftJoinAttributeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeValue relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery rightJoinAttributeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeValue relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery innerJoinAttributeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeValue relation
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttribute matching the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttribute matching the query, or a new ProjectA_Zed_Stock_Persistence_PacStockAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttribute findOneByName(string $name) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttribute filtered by the name column
 *
 * @method array findByIdStockAttribute(int $id_stock_attribute) Return ProjectA_Zed_Stock_Persistence_PacStockAttribute objects filtered by the id_stock_attribute column
 * @method array findByName(string $name) Return ProjectA_Zed_Stock_Persistence_PacStockAttribute objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.om
 */
abstract class Generated_Zed_Stock_Persistence_Om_BasePacStockAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Stock_Persistence_Om_BasePacStockAttributeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Stock_Persistence_PacStockAttribute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery();
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
     * @return   ProjectA_Zed_Stock_Persistence_PacStockAttribute|ProjectA_Zed_Stock_Persistence_PacStockAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdStockAttribute($key, $con = null)
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_stock_attribute`, `name` FROM `pac_stock_attribute` WHERE `id_stock_attribute` = :p0';
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
            $obj = new ProjectA_Zed_Stock_Persistence_PacStockAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttribute|ProjectA_Zed_Stock_Persistence_PacStockAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_stock_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStockAttribute(1234); // WHERE id_stock_attribute = 1234
     * $query->filterByIdStockAttribute(array(12, 34)); // WHERE id_stock_attribute IN (12, 34)
     * $query->filterByIdStockAttribute(array('min' => 12)); // WHERE id_stock_attribute >= 12
     * $query->filterByIdStockAttribute(array('max' => 12)); // WHERE id_stock_attribute <= 12
     * </code>
     *
     * @param     mixed $idStockAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     */
    public function filterByIdStockAttribute($idStockAttribute = null, $comparison = null)
    {
        if (is_array($idStockAttribute)) {
            $useMinMax = false;
            if (isset($idStockAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $idStockAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStockAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $idStockAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $idStockAttribute, $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_PacStockAttributeValue object
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttributeValue|PropelObjectCollection $pacStockAttributeValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeValue($pacStockAttributeValue, $comparison = null)
    {
        if ($pacStockAttributeValue instanceof ProjectA_Zed_Stock_Persistence_PacStockAttributeValue) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $pacStockAttributeValue->getFkStockAttribute(), $comparison);
        } elseif ($pacStockAttributeValue instanceof PropelObjectCollection) {
            return $this
                ->useAttributeValueQuery()
                ->filterByPrimaryKeys($pacStockAttributeValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeValue() only accepts arguments of type ProjectA_Zed_Stock_Persistence_PacStockAttributeValue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     */
    public function joinAttributeValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeValue');

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
            $this->addJoinObject($join, 'AttributeValue');
        }

        return $this;
    }

    /**
     * Use the AttributeValue relation PacStockAttributeValue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery A secondary query class using the current class as primary query
     */
    public function useAttributeValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeValue', 'ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttribute $pacStockAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery The current query, for fluid interface
     */
    public function prune($pacStockAttribute = null)
    {
        if ($pacStockAttribute) {
            $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributePeer::ID_STOCK_ATTRIBUTE, $pacStockAttribute->getIdStockAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
