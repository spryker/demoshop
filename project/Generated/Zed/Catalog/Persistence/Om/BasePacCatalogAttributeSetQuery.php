<?php


/**
 * Base class that represents a query for the 'pac_catalog_attribute_set' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery orderByIdCatalogAttributeSet($order = Criteria::ASC) Order by the id_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery groupByIdCatalogAttributeSet() Group by the id_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery leftJoinValueType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery rightJoinValueType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery innerJoinValueType($relationAlias = null) Adds a INNER JOIN clause to the query using the ValueType relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet matching the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet matching the query, or a new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet findOneByName(string $name) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet filtered by the name column
 *
 * @method array findByIdCatalogAttributeSet(int $id_catalog_attribute_set) Return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet objects filtered by the id_catalog_attribute_set column
 * @method array findByName(string $name) Return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogAttributeSetQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BasePacCatalogAttributeSetQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery();
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogAttributeSet($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_attribute_set`, `name` FROM `pac_catalog_attribute_set` WHERE `id_catalog_attribute_set` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_attribute_set column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogAttributeSet(1234); // WHERE id_catalog_attribute_set = 1234
     * $query->filterByIdCatalogAttributeSet(array(12, 34)); // WHERE id_catalog_attribute_set IN (12, 34)
     * $query->filterByIdCatalogAttributeSet(array('min' => 12)); // WHERE id_catalog_attribute_set >= 12
     * $query->filterByIdCatalogAttributeSet(array('max' => 12)); // WHERE id_catalog_attribute_set <= 12
     * </code>
     *
     * @param     mixed $idCatalogAttributeSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function filterByIdCatalogAttributeSet($idCatalogAttributeSet = null, $comparison = null)
    {
        if (is_array($idCatalogAttributeSet)) {
            $useMinMax = false;
            if (isset($idCatalogAttributeSet['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $idCatalogAttributeSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogAttributeSet['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $idCatalogAttributeSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $idCatalogAttributeSet, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $pacCatalogProduct->getFkCatalogAttributeSet(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            return $this
                ->useProductQuery()
                ->filterByPrimaryKeys($pacCatalogProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogValueType|PropelObjectCollection $pacCatalogValueType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByValueType($pacCatalogValueType, $comparison = null)
    {
        if ($pacCatalogValueType instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogValueType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $pacCatalogValueType->getFkCatalogAttributeSet(), $comparison);
        } elseif ($pacCatalogValueType instanceof PropelObjectCollection) {
            return $this
                ->useValueTypeQuery()
                ->filterByPrimaryKeys($pacCatalogValueType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByValueType() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogValueType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ValueType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function joinValueType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ValueType');

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
            $this->addJoinObject($join, 'ValueType');
        }

        return $this;
    }

    /**
     * Use the ValueType relation PacCatalogValueType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery A secondary query class using the current class as primary query
     */
    public function useValueTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinValueType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ValueType', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $pacCatalogAttributeSet Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery The current query, for fluid interface
     */
    public function prune($pacCatalogAttributeSet = null)
    {
        if ($pacCatalogAttributeSet) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $pacCatalogAttributeSet->getIdCatalogAttributeSet(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
