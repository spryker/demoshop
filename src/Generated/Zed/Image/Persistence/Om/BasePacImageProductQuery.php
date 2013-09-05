<?php


/**
 * Base class that represents a query for the 'pac_image_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery orderByIdImageProduct($order = Criteria::ASC) Order by the id_image_product column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery orderByFkImage($order = Criteria::ASC) Order by the fk_image column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery groupByIdImageProduct() Group by the id_image_product column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery groupByFkImage() Group by the fk_image column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery leftJoinImage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Image relation
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery rightJoinImage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Image relation
 * @method ProjectA_Zed_Image_Persistence_PacImageProductQuery innerJoinImage($relationAlias = null) Adds a INNER JOIN clause to the query using the Image relation
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImageProduct matching the query
 * @method ProjectA_Zed_Image_Persistence_PacImageProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImageProduct matching the query, or a new ProjectA_Zed_Image_Persistence_PacImageProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageProduct findOneByName(string $name) Return the first ProjectA_Zed_Image_Persistence_PacImageProduct filtered by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageProduct findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Image_Persistence_PacImageProduct filtered by the fk_catalog_product column
 * @method ProjectA_Zed_Image_Persistence_PacImageProduct findOneByFkImage(int $fk_image) Return the first ProjectA_Zed_Image_Persistence_PacImageProduct filtered by the fk_image column
 *
 * @method array findByIdImageProduct(int $id_image_product) Return ProjectA_Zed_Image_Persistence_PacImageProduct objects filtered by the id_image_product column
 * @method array findByName(string $name) Return ProjectA_Zed_Image_Persistence_PacImageProduct objects filtered by the name column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Image_Persistence_PacImageProduct objects filtered by the fk_catalog_product column
 * @method array findByFkImage(int $fk_image) Return ProjectA_Zed_Image_Persistence_PacImageProduct objects filtered by the fk_image column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Image/Persistence.om
 */
abstract class Generated_Zed_Image_Persistence_Om_BasePacImageProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Image_Persistence_Om_BasePacImageProductQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Image_Persistence_PacImageProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Image_Persistence_PacImageProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Image_Persistence_PacImageProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Image_Persistence_PacImageProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Image_Persistence_PacImageProductQuery();
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
     * @return   ProjectA_Zed_Image_Persistence_PacImageProduct|ProjectA_Zed_Image_Persistence_PacImageProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Image_Persistence_PacImageProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Image_Persistence_PacImageProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImageProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdImageProduct($key, $con = null)
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImageProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_image_product`, `name`, `fk_catalog_product`, `fk_image` FROM `pac_image_product` WHERE `id_image_product` = :p0';
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
            $obj = new ProjectA_Zed_Image_Persistence_PacImageProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Image_Persistence_PacImageProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageProduct|ProjectA_Zed_Image_Persistence_PacImageProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImageProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_image_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdImageProduct(1234); // WHERE id_image_product = 1234
     * $query->filterByIdImageProduct(array(12, 34)); // WHERE id_image_product IN (12, 34)
     * $query->filterByIdImageProduct(array('min' => 12)); // WHERE id_image_product >= 12
     * $query->filterByIdImageProduct(array('max' => 12)); // WHERE id_image_product <= 12
     * </code>
     *
     * @param     mixed $idImageProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function filterByIdImageProduct($idImageProduct = null, $comparison = null)
    {
        if (is_array($idImageProduct)) {
            $useMinMax = false;
            if (isset($idImageProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $idImageProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idImageProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $idImageProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $idImageProduct, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the fk_image column
     *
     * Example usage:
     * <code>
     * $query->filterByFkImage(1234); // WHERE fk_image = 1234
     * $query->filterByFkImage(array(12, 34)); // WHERE fk_image IN (12, 34)
     * $query->filterByFkImage(array('min' => 12)); // WHERE fk_image >= 12
     * $query->filterByFkImage(array('max' => 12)); // WHERE fk_image <= 12
     * </code>
     *
     * @see       filterByImage()
     *
     * @param     mixed $fkImage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function filterByFkImage($fkImage = null, $comparison = null)
    {
        if (is_array($fkImage)) {
            $useMinMax = false;
            if (isset($fkImage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_IMAGE, $fkImage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkImage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_IMAGE, $fkImage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_IMAGE, $fkImage, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Image_Persistence_PacImage object
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImage|PropelObjectCollection $pacImage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByImage($pacImage, $comparison = null)
    {
        if ($pacImage instanceof ProjectA_Zed_Image_Persistence_PacImage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_IMAGE, $pacImage->getIdImage(), $comparison);
        } elseif ($pacImage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::FK_IMAGE, $pacImage->toKeyValue('PrimaryKey', 'IdImage'), $comparison);
        } else {
            throw new PropelException('filterByImage() only accepts arguments of type ProjectA_Zed_Image_Persistence_PacImage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Image relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function joinImage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Image');

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
            $this->addJoinObject($join, 'Image');
        }

        return $this;
    }

    /**
     * Use the Image relation PacImage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Image_Persistence_PacImageQuery A secondary query class using the current class as primary query
     */
    public function useImageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Image', 'ProjectA_Zed_Image_Persistence_PacImageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImageProduct $pacImageProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageProductQuery The current query, for fluid interface
     */
    public function prune($pacImageProduct = null)
    {
        if ($pacImageProduct) {
            $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageProductPeer::ID_IMAGE_PRODUCT, $pacImageProduct->getIdImageProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
