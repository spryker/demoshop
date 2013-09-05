<?php


/**
 * Base class that represents a query for the 'pac_catalog_product_category' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery orderByIdCatalogProductCategory($order = Criteria::ASC) Order by the id_catalog_product_category column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery orderByFkCategoryName($order = Criteria::ASC) Order by the fk_category_name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery groupByIdCatalogProductCategory() Group by the id_catalog_product_category column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery groupByFkCategoryName() Group by the fk_category_name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery leftJoinCategoryName($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryName relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery rightJoinCategoryName($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryName relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery innerJoinCategoryName($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryName relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery leftJoinProductCategoryBoost($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategoryBoost relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery rightJoinProductCategoryBoost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategoryBoost relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery innerJoinProductCategoryBoost($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategoryBoost relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory matching the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory matching the query, or a new ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory filtered by the fk_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory findOneByFkCategoryName(int $fk_category_name) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory filtered by the fk_category_name column
 *
 * @method array findByIdCatalogProductCategory(int $id_catalog_product_category) Return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects filtered by the id_catalog_product_category column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects filtered by the fk_catalog_product column
 * @method array findByFkCategoryName(int $fk_category_name) Return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects filtered by the fk_category_name column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProductCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProductCategoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery();
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogProductCategory($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product_category`, `fk_catalog_product`, `fk_category_name` FROM `pac_catalog_product_category` WHERE `id_catalog_product_category` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_product_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogProductCategory(1234); // WHERE id_catalog_product_category = 1234
     * $query->filterByIdCatalogProductCategory(array(12, 34)); // WHERE id_catalog_product_category IN (12, 34)
     * $query->filterByIdCatalogProductCategory(array('min' => 12)); // WHERE id_catalog_product_category >= 12
     * $query->filterByIdCatalogProductCategory(array('max' => 12)); // WHERE id_catalog_product_category <= 12
     * </code>
     *
     * @param     mixed $idCatalogProductCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProductCategory($idCatalogProductCategory = null, $comparison = null)
    {
        if (is_array($idCatalogProductCategory)) {
            $useMinMax = false;
            if (isset($idCatalogProductCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $idCatalogProductCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProductCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $idCatalogProductCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $idCatalogProductCategory, $comparison);
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
     * @see       filterByProduct()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the fk_category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryName(1234); // WHERE fk_category_name = 1234
     * $query->filterByFkCategoryName(array(12, 34)); // WHERE fk_category_name IN (12, 34)
     * $query->filterByFkCategoryName(array('min' => 12)); // WHERE fk_category_name >= 12
     * $query->filterByFkCategoryName(array('max' => 12)); // WHERE fk_category_name <= 12
     * </code>
     *
     * @see       filterByCategoryName()
     *
     * @param     mixed $fkCategoryName The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCategoryName($fkCategoryName = null, $comparison = null)
    {
        if (is_array($fkCategoryName)) {
            $useMinMax = false;
            if (isset($fkCategoryName['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryName['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryName object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryName|PropelObjectCollection $pacCategoryName The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryName($pacCategoryName, $comparison = null)
    {
        if ($pacCategoryName instanceof ProjectA_Zed_Category_Persistence_PacCategoryName) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATEGORY_NAME, $pacCategoryName->getIdCategoryName(), $comparison);
        } elseif ($pacCategoryName instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::FK_CATEGORY_NAME, $pacCategoryName->toKeyValue('PrimaryKey', 'IdCategoryName'), $comparison);
        } else {
            throw new PropelException('filterByCategoryName() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryName or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryName relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function joinCategoryName($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryName');

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
            $this->addJoinObject($join, 'CategoryName');
        }

        return $this;
    }

    /**
     * Use the CategoryName relation PacCategoryName object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryNameQuery A secondary query class using the current class as primary query
     */
    public function useCategoryNameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryName($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryName', 'ProjectA_Zed_Category_Persistence_PacCategoryNameQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost object
     *
     * @param   Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost|PropelObjectCollection $saoCatalogProductCategoryBoost  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductCategoryBoost($saoCatalogProductCategoryBoost, $comparison = null)
    {
        if ($saoCatalogProductCategoryBoost instanceof Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $saoCatalogProductCategoryBoost->getFkCatalogProductCategory(), $comparison);
        } elseif ($saoCatalogProductCategoryBoost instanceof PropelObjectCollection) {
            return $this
                ->useProductCategoryBoostQuery()
                ->filterByPrimaryKeys($saoCatalogProductCategoryBoost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductCategoryBoost() only accepts arguments of type Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductCategoryBoost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function joinProductCategoryBoost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductCategoryBoost');

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
            $this->addJoinObject($join, 'ProductCategoryBoost');
        }

        return $this;
    }

    /**
     * Use the ProductCategoryBoost relation SaoCatalogProductCategoryBoost object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery A secondary query class using the current class as primary query
     */
    public function useProductCategoryBoostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductCategoryBoost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductCategoryBoost', 'Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory $pacCatalogProductCategory Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery The current query, for fluid interface
     */
    public function prune($pacCatalogProductCategory = null)
    {
        if ($pacCatalogProductCategory) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryPeer::ID_CATALOG_PRODUCT_CATEGORY, $pacCatalogProductCategory->getIdCatalogProductCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
