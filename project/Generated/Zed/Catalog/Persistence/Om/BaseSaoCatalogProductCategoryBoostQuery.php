<?php


/**
 * Base class that represents a query for the 'sao_catalog_product_category_boost' table.
 *
 *
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery orderByIdCatalogProductCategoryBoost($order = Criteria::ASC) Order by the id_catalog_product_category_boost column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery orderByFkCatalogProductCategory($order = Criteria::ASC) Order by the fk_catalog_product_category column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery orderByBoost($order = Criteria::ASC) Order by the boost column
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery groupByIdCatalogProductCategoryBoost() Group by the id_catalog_product_category_boost column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery groupByFkCatalogProductCategory() Group by the fk_catalog_product_category column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery groupByBoost() Group by the boost column
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery leftJoinProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategory relation
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery rightJoinProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategory relation
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery innerJoinProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategory relation
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost findOne(PropelPDO $con = null) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost matching the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost matching the query, or a new Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost findOneByFkCatalogProductCategory(int $fk_catalog_product_category) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost filtered by the fk_catalog_product_category column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost findOneByBoost(int $boost) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost filtered by the boost column
 *
 * @method array findByIdCatalogProductCategoryBoost(int $id_catalog_product_category_boost) Return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost objects filtered by the id_catalog_product_category_boost column
 * @method array findByFkCatalogProductCategory(int $fk_catalog_product_category) Return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost objects filtered by the fk_catalog_product_category column
 * @method array findByBoost(int $boost) Return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost objects filtered by the boost column
 *
 * @package    propel.generator.project/Sao/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BaseSaoCatalogProductCategoryBoostQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BaseSaoCatalogProductCategoryBoostQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery();
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
     * @return   Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost|Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogProductCategoryBoost($key, $con = null)
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
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product_category_boost`, `fk_catalog_product_category`, `boost` FROM `sao_catalog_product_category_boost` WHERE `id_catalog_product_category_boost` = :p0';
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
            $obj = new Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost();
            $obj->hydrate($row);
            Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost|Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_product_category_boost column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogProductCategoryBoost(1234); // WHERE id_catalog_product_category_boost = 1234
     * $query->filterByIdCatalogProductCategoryBoost(array(12, 34)); // WHERE id_catalog_product_category_boost IN (12, 34)
     * $query->filterByIdCatalogProductCategoryBoost(array('min' => 12)); // WHERE id_catalog_product_category_boost >= 12
     * $query->filterByIdCatalogProductCategoryBoost(array('max' => 12)); // WHERE id_catalog_product_category_boost <= 12
     * </code>
     *
     * @param     mixed $idCatalogProductCategoryBoost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProductCategoryBoost($idCatalogProductCategoryBoost = null, $comparison = null)
    {
        if (is_array($idCatalogProductCategoryBoost)) {
            $useMinMax = false;
            if (isset($idCatalogProductCategoryBoost['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $idCatalogProductCategoryBoost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProductCategoryBoost['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $idCatalogProductCategoryBoost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $idCatalogProductCategoryBoost, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProductCategory(1234); // WHERE fk_catalog_product_category = 1234
     * $query->filterByFkCatalogProductCategory(array(12, 34)); // WHERE fk_catalog_product_category IN (12, 34)
     * $query->filterByFkCatalogProductCategory(array('min' => 12)); // WHERE fk_catalog_product_category >= 12
     * $query->filterByFkCatalogProductCategory(array('max' => 12)); // WHERE fk_catalog_product_category <= 12
     * </code>
     *
     * @see       filterByProductCategory()
     *
     * @param     mixed $fkCatalogProductCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProductCategory($fkCatalogProductCategory = null, $comparison = null)
    {
        if (is_array($fkCatalogProductCategory)) {
            $useMinMax = false;
            if (isset($fkCatalogProductCategory['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::FK_CATALOG_PRODUCT_CATEGORY, $fkCatalogProductCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProductCategory['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::FK_CATALOG_PRODUCT_CATEGORY, $fkCatalogProductCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::FK_CATALOG_PRODUCT_CATEGORY, $fkCatalogProductCategory, $comparison);
    }

    /**
     * Filter the query on the boost column
     *
     * Example usage:
     * <code>
     * $query->filterByBoost(1234); // WHERE boost = 1234
     * $query->filterByBoost(array(12, 34)); // WHERE boost IN (12, 34)
     * $query->filterByBoost(array('min' => 12)); // WHERE boost >= 12
     * $query->filterByBoost(array('max' => 12)); // WHERE boost <= 12
     * </code>
     *
     * @param     mixed $boost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function filterByBoost($boost = null, $comparison = null)
    {
        if (is_array($boost)) {
            $useMinMax = false;
            if (isset($boost['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::BOOST, $boost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($boost['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::BOOST, $boost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::BOOST, $boost, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory|PropelObjectCollection $pacCatalogProductCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductCategory($pacCatalogProductCategory, $comparison = null)
    {
        if ($pacCatalogProductCategory instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory) {
            return $this
                ->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::FK_CATALOG_PRODUCT_CATEGORY, $pacCatalogProductCategory->getIdCatalogProductCategory(), $comparison);
        } elseif ($pacCatalogProductCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::FK_CATALOG_PRODUCT_CATEGORY, $pacCatalogProductCategory->toKeyValue('PrimaryKey', 'IdCatalogProductCategory'), $comparison);
        } else {
            throw new PropelException('filterByProductCategory() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function joinProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductCategory');

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
            $this->addJoinObject($join, 'ProductCategory');
        }

        return $this;
    }

    /**
     * Use the ProductCategory relation PacCatalogProductCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductCategory', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost $saoCatalogProductCategoryBoost Object to remove from the list of results
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostQuery The current query, for fluid interface
     */
    public function prune($saoCatalogProductCategoryBoost = null)
    {
        if ($saoCatalogProductCategoryBoost) {
            $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoostPeer::ID_CATALOG_PRODUCT_CATEGORY_BOOST, $saoCatalogProductCategoryBoost->getIdCatalogProductCategoryBoost(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
