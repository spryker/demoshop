<?php


/**
 * Base class that represents a query for the 'pac_catalog_product_bundle_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery orderByIdCatalogProductBundleProduct($order = Criteria::ASC) Order by the id_catalog_product_bundle_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery orderByFkCatalogProductBundle($order = Criteria::ASC) Order by the fk_catalog_product_bundle column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery groupByIdCatalogProductBundleProduct() Group by the id_catalog_product_bundle_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery groupByFkCatalogProductBundle() Group by the fk_catalog_product_bundle column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery leftJoinBundleProductBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProductBundle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery rightJoinBundleProductBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProductBundle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery innerJoinBundleProductBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProductBundle relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery leftJoinBundleProductProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProductProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery rightJoinBundleProductProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProductProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery innerJoinBundleProductProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProductProduct relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct findOneByFkCatalogProductBundle(int $fk_catalog_product_bundle) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct filtered by the fk_catalog_product_bundle column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct filtered by the fk_catalog_product column
 *
 * @method array findByIdCatalogProductBundleProduct(int $id_catalog_product_bundle_product) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects filtered by the id_catalog_product_bundle_product column
 * @method array findByFkCatalogProductBundle(int $fk_catalog_product_bundle) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects filtered by the fk_catalog_product_bundle column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects filtered by the fk_catalog_product column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductBundleProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductBundleProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogProductBundleProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogProductBundleProduct($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product_bundle_product`, `fk_catalog_product_bundle`, `fk_catalog_product` FROM `pac_catalog_product_bundle_product` WHERE `id_catalog_product_bundle_product` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_product_bundle_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogProductBundleProduct(1234); // WHERE id_catalog_product_bundle_product = 1234
     * $query->filterByIdCatalogProductBundleProduct(array(12, 34)); // WHERE id_catalog_product_bundle_product IN (12, 34)
     * $query->filterByIdCatalogProductBundleProduct(array('min' => 12)); // WHERE id_catalog_product_bundle_product >= 12
     * $query->filterByIdCatalogProductBundleProduct(array('max' => 12)); // WHERE id_catalog_product_bundle_product <= 12
     * </code>
     *
     * @param     mixed $idCatalogProductBundleProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProductBundleProduct($idCatalogProductBundleProduct = null, $comparison = null)
    {
        if (is_array($idCatalogProductBundleProduct)) {
            $useMinMax = false;
            if (isset($idCatalogProductBundleProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $idCatalogProductBundleProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProductBundleProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $idCatalogProductBundleProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $idCatalogProductBundleProduct, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product_bundle column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProductBundle(1234); // WHERE fk_catalog_product_bundle = 1234
     * $query->filterByFkCatalogProductBundle(array(12, 34)); // WHERE fk_catalog_product_bundle IN (12, 34)
     * $query->filterByFkCatalogProductBundle(array('min' => 12)); // WHERE fk_catalog_product_bundle >= 12
     * $query->filterByFkCatalogProductBundle(array('max' => 12)); // WHERE fk_catalog_product_bundle <= 12
     * </code>
     *
     * @see       filterByBundleProductBundle()
     *
     * @param     mixed $fkCatalogProductBundle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProductBundle($fkCatalogProductBundle = null, $comparison = null)
    {
        if (is_array($fkCatalogProductBundle)) {
            $useMinMax = false;
            if (isset($fkCatalogProductBundle['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT_BUNDLE, $fkCatalogProductBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProductBundle['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT_BUNDLE, $fkCatalogProductBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT_BUNDLE, $fkCatalogProductBundle, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProduct(1234); // WHERE fk_catalog_product = 1234
     * $query->filterByFkCatalogProduct(array(12, 34)); // WHERE fk_catalog_product IN (12, 34)
     * $query->filterByFkCatalogProduct(array('min' => 12)); // WHERE fk_catalog_product >= 12
     * $query->filterByFkCatalogProduct(array('max' => 12)); // WHERE fk_catalog_product <= 12
     * </code>
     *
     * @see       filterByBundleProductProduct()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle|PropelObjectCollection $pacCatalogProductBundle The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProductBundle($pacCatalogProductBundle, $comparison = null)
    {
        if ($pacCatalogProductBundle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT_BUNDLE, $pacCatalogProductBundle->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductBundle instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT_BUNDLE, $pacCatalogProductBundle->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByBundleProductBundle() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProductBundle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function joinBundleProductBundle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProductBundle');

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
            $this->addJoinObject($join, 'BundleProductBundle');
        }

        return $this;
    }

    /**
     * Use the BundleProductBundle relation PacCatalogProductBundle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductBundleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProductBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProductBundle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProductProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByBundleProductProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProductProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function joinBundleProductProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProductProduct');

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
            $this->addJoinObject($join, 'BundleProductProduct');
        }

        return $this;
    }

    /**
     * Use the BundleProductProduct relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProductProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProductProduct', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct $pacCatalogProductBundleProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery The current query, for fluid interface
     */
    public function prune($pacCatalogProductBundleProduct = null)
    {
        if ($pacCatalogProductBundleProduct) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductPeer::ID_CATALOG_PRODUCT_BUNDLE_PRODUCT, $pacCatalogProductBundleProduct->getIdCatalogProductBundleProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
