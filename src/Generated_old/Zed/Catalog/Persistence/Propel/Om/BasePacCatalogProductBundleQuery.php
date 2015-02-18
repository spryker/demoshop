<?php


/**
 * Base class that represents a query for the 'pac_catalog_product_bundle' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery orderByIdCatalogProduct($order = Criteria::ASC) Order by the id_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery orderByBundleType($order = Criteria::ASC) Order by the bundle_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery groupByIdCatalogProduct() Group by the id_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery groupByBundleType() Group by the bundle_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery leftJoinProductEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery rightJoinProductEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery innerJoinProductEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductEntity relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle findOneByBundleType(string $bundle_type) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle filtered by the bundle_type column
 *
 * @method array findByIdCatalogProduct(int $id_catalog_product) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects filtered by the id_catalog_product column
 * @method array findByBundleType(string $bundle_type) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects filtered by the bundle_type column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductBundleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductBundleQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogProductBundle']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogProduct($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product`, `bundle_type` FROM `pac_catalog_product_bundle` WHERE `id_catalog_product` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogProduct(1234); // WHERE id_catalog_product = 1234
     * $query->filterByIdCatalogProduct(array(12, 34)); // WHERE id_catalog_product IN (12, 34)
     * $query->filterByIdCatalogProduct(array('min' => 12)); // WHERE id_catalog_product >= 12
     * $query->filterByIdCatalogProduct(array('max' => 12)); // WHERE id_catalog_product <= 12
     * </code>
     *
     * @see       filterByProductEntity()
     *
     * @param     mixed $idCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProduct($idCatalogProduct = null, $comparison = null)
    {
        if (is_array($idCatalogProduct)) {
            $useMinMax = false;
            if (isset($idCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $idCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $idCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $idCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the bundle_type column
     *
     * Example usage:
     * <code>
     * $query->filterByBundleType('fooValue');   // WHERE bundle_type = 'fooValue'
     * $query->filterByBundleType('%fooValue%'); // WHERE bundle_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bundleType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function filterByBundleType($bundleType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bundleType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bundleType)) {
                $bundleType = str_replace('*', '%', $bundleType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::BUNDLE_TYPE, $bundleType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductEntity($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByProductEntity() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductEntity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function joinProductEntity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductEntity');

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
            $this->addJoinObject($join, 'ProductEntity');
        }

        return $this;
    }

    /**
     * Use the ProductEntity relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductEntityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductEntity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct|PropelObjectCollection $pacCatalogProductBundleProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProduct($pacCatalogProductBundleProduct, $comparison = null)
    {
        if ($pacCatalogProductBundleProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $pacCatalogProductBundleProduct->getFkCatalogProductBundle(), $comparison);
        } elseif ($pacCatalogProductBundleProduct instanceof PropelObjectCollection) {
            return $this
                ->useBundleProductQuery()
                ->filterByPrimaryKeys($pacCatalogProductBundleProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBundleProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function joinBundleProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProduct');

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
            $this->addJoinObject($join, 'BundleProduct');
        }

        return $this;
    }

    /**
     * Use the BundleProduct relation PacCatalogProductBundleProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProduct', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery');
    }

    /**
     * Filter the query by a related PacCatalogProduct object
     * using the pac_catalog_product_bundle_product table as cross reference
     *
     * @param   PacCatalogProduct $pacCatalogProduct the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function filterByBundleProductProduct($pacCatalogProduct, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useBundleProductQuery()
            ->filterByBundleProductProduct($pacCatalogProduct, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $pacCatalogProductBundle Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery The current query, for fluid interface
     */
    public function prune($pacCatalogProductBundle = null)
    {
        if ($pacCatalogProductBundle) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $pacCatalogProductBundle->getIdCatalogProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
