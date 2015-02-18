<?php


/**
 * Base class that represents a query for the 'pac_catalog_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByIdCatalogProduct($order = Criteria::ASC) Order by the id_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByIsItem($order = Criteria::ASC) Order by the is_item column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByVariety($order = Criteria::ASC) Order by the variety column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByFkCatalogAttributeSet($order = Criteria::ASC) Order by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByCache($order = Criteria::ASC) Order by the cache column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByIdCatalogProduct() Group by the id_catalog_product column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByIsItem() Group by the is_item column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByStatus() Group by the status column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByVariety() Group by the variety column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByFkCatalogAttributeSet() Group by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByCache() Group by the cache column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinAttributeSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeSet relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinAttributeSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeSet relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinAttributeSet($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeSet relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bundle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bundle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the Bundle relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinSingleEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the SingleEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinSingleEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SingleEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinSingleEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the SingleEntity relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinConfigEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the ConfigEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinConfigEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ConfigEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinConfigEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the ConfigEntity relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinSimpleEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the SimpleEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinSimpleEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SimpleEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinSimpleEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the SimpleEntity relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinOptionMulti($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinOptionMulti($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinOptionMulti($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionMulti relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinOptionSingle($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinOptionSingle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinOptionSingle($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionSingle relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinInteger($relationAlias = null) Adds a LEFT JOIN clause to the query using the Integer relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinInteger($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Integer relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinInteger($relationAlias = null) Adds a INNER JOIN clause to the query using the Integer relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinTimestamp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Timestamp relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinTimestamp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Timestamp relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinTimestamp($relationAlias = null) Adds a INNER JOIN clause to the query using the Timestamp relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinDecimal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Decimal relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinDecimal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Decimal relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinDecimal($relationAlias = null) Adds a INNER JOIN clause to the query using the Decimal relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinText($relationAlias = null) Adds a LEFT JOIN clause to the query using the Text relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinText($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Text relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinText($relationAlias = null) Adds a INNER JOIN clause to the query using the Text relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinBoolean($relationAlias = null) Adds a LEFT JOIN clause to the query using the Boolean relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinBoolean($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Boolean relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinBoolean($relationAlias = null) Adds a INNER JOIN clause to the query using the Boolean relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategory relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategory relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategory relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinProductOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductOption relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinProductOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductOption relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinProductOption($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductOption relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinPacCmsBlockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinPacCmsBlockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockProduct relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinPacCmsBlockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockProduct relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery leftJoinProductImage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductImage relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery rightJoinProductImage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductImage relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery innerJoinProductImage($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductImage relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneBySku(string $sku) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the sku column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByIsItem(boolean $is_item) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the is_item column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByStatus(string $status) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the status column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByVariety(string $variety) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the variety column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByFkCatalogAttributeSet(int $fk_catalog_attribute_set) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByCache(string $cache) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the cache column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct filtered by the updated_at column
 *
 * @method array findByIdCatalogProduct(int $id_catalog_product) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the id_catalog_product column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the sku column
 * @method array findByIsItem(boolean $is_item) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the is_item column
 * @method array findByStatus(string $status) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the status column
 * @method array findByVariety(string $variety) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the variety column
 * @method array findByFkCatalogAttributeSet(int $fk_catalog_attribute_set) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the fk_catalog_attribute_set column
 * @method array findByCache(string $cache) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the cache column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product`, `sku`, `is_item`, `status`, `variety`, `fk_catalog_attribute_set`, `cache`, `created_at`, `updated_at` FROM `pac_catalog_product` WHERE `id_catalog_product` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $keys, Criteria::IN);
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
     * @param     mixed $idCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProduct($idCatalogProduct = null, $comparison = null)
    {
        if (is_array($idCatalogProduct)) {
            $useMinMax = false;
            if (isset($idCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $idCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $idCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $idCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the sku column
     *
     * Example usage:
     * <code>
     * $query->filterBySku('fooValue');   // WHERE sku = 'fooValue'
     * $query->filterBySku('%fooValue%'); // WHERE sku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterBySku($sku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sku)) {
                $sku = str_replace('*', '%', $sku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the is_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIsItem(true); // WHERE is_item = true
     * $query->filterByIsItem('yes'); // WHERE is_item = true
     * </code>
     *
     * @param     boolean|string $isItem The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByIsItem($isItem = null, $comparison = null)
    {
        if (is_string($isItem)) {
            $isItem = in_array(strtolower($isItem), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::IS_ITEM, $isItem, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the variety column
     *
     * Example usage:
     * <code>
     * $query->filterByVariety('fooValue');   // WHERE variety = 'fooValue'
     * $query->filterByVariety('%fooValue%'); // WHERE variety LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variety The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByVariety($variety = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variety)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variety)) {
                $variety = str_replace('*', '%', $variety);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::VARIETY, $variety, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_attribute_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogAttributeSet(1234); // WHERE fk_catalog_attribute_set = 1234
     * $query->filterByFkCatalogAttributeSet(array(12, 34)); // WHERE fk_catalog_attribute_set IN (12, 34)
     * $query->filterByFkCatalogAttributeSet(array('min' => 12)); // WHERE fk_catalog_attribute_set >= 12
     * $query->filterByFkCatalogAttributeSet(array('max' => 12)); // WHERE fk_catalog_attribute_set <= 12
     * </code>
     *
     * @see       filterByAttributeSet()
     *
     * @param     mixed $fkCatalogAttributeSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogAttributeSet($fkCatalogAttributeSet = null, $comparison = null)
    {
        if (is_array($fkCatalogAttributeSet)) {
            $useMinMax = false;
            if (isset($fkCatalogAttributeSet['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogAttributeSet['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet, $comparison);
    }

    /**
     * Filter the query on the cache column
     *
     * Example usage:
     * <code>
     * $query->filterByCache('fooValue');   // WHERE cache = 'fooValue'
     * $query->filterByCache('%fooValue%'); // WHERE cache LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cache The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByCache($cache = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cache)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cache)) {
                $cache = str_replace('*', '%', $cache);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CACHE, $cache, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet|PropelObjectCollection $pacCatalogAttributeSet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeSet($pacCatalogAttributeSet, $comparison = null)
    {
        if ($pacCatalogAttributeSet instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $pacCatalogAttributeSet->getIdCatalogAttributeSet(), $comparison);
        } elseif ($pacCatalogAttributeSet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $pacCatalogAttributeSet->toKeyValue('PrimaryKey', 'IdCatalogAttributeSet'), $comparison);
        } else {
            throw new PropelException('filterByAttributeSet() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinAttributeSet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeSet');

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
            $this->addJoinObject($join, 'AttributeSet');
        }

        return $this;
    }

    /**
     * Use the AttributeSet relation PacCatalogAttributeSet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery A secondary query class using the current class as primary query
     */
    public function useAttributeSetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeSet', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle|PropelObjectCollection $pacCatalogProductBundle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundle($pacCatalogProductBundle, $comparison = null)
    {
        if ($pacCatalogProductBundle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductBundle->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductBundle instanceof PropelObjectCollection) {
            return $this
                ->useBundleQuery()
                ->filterByPrimaryKeys($pacCatalogProductBundle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBundle() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bundle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinBundle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bundle');

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
            $this->addJoinObject($join, 'Bundle');
        }

        return $this;
    }

    /**
     * Use the Bundle relation PacCatalogProductBundle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery A secondary query class using the current class as primary query
     */
    public function useBundleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bundle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct|PropelObjectCollection $pacCatalogProductBundleProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProduct($pacCatalogProductBundleProduct, $comparison = null)
    {
        if ($pacCatalogProductBundleProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductBundleProduct->getFkCatalogProduct(), $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle|PropelObjectCollection $pacCatalogProductSingle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySingleEntity($pacCatalogProductSingle, $comparison = null)
    {
        if ($pacCatalogProductSingle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductSingle->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductSingle instanceof PropelObjectCollection) {
            return $this
                ->useSingleEntityQuery()
                ->filterByPrimaryKeys($pacCatalogProductSingle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySingleEntity() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SingleEntity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinSingleEntity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SingleEntity');

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
            $this->addJoinObject($join, 'SingleEntity');
        }

        return $this;
    }

    /**
     * Use the SingleEntity relation PacCatalogProductSingle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingleQuery A secondary query class using the current class as primary query
     */
    public function useSingleEntityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSingleEntity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SingleEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig|PropelObjectCollection $pacCatalogProductConfig  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByConfigEntity($pacCatalogProductConfig, $comparison = null)
    {
        if ($pacCatalogProductConfig instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductConfig->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductConfig instanceof PropelObjectCollection) {
            return $this
                ->useConfigEntityQuery()
                ->filterByPrimaryKeys($pacCatalogProductConfig->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByConfigEntity() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ConfigEntity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinConfigEntity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ConfigEntity');

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
            $this->addJoinObject($join, 'ConfigEntity');
        }

        return $this;
    }

    /**
     * Use the ConfigEntity relation PacCatalogProductConfig object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfigQuery A secondary query class using the current class as primary query
     */
    public function useConfigEntityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinConfigEntity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ConfigEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfigQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple|PropelObjectCollection $pacCatalogProductSimple  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySimpleEntity($pacCatalogProductSimple, $comparison = null)
    {
        if ($pacCatalogProductSimple instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductSimple->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductSimple instanceof PropelObjectCollection) {
            return $this
                ->useSimpleEntityQuery()
                ->filterByPrimaryKeys($pacCatalogProductSimple->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySimpleEntity() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SimpleEntity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinSimpleEntity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SimpleEntity');

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
            $this->addJoinObject($join, 'SimpleEntity');
        }

        return $this;
    }

    /**
     * Use the SimpleEntity relation PacCatalogProductSimple object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimpleQuery A secondary query class using the current class as primary query
     */
    public function useSimpleEntityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSimpleEntity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SimpleEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimpleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti|PropelObjectCollection $pacCatalogValueOptionMulti  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionMulti($pacCatalogValueOptionMulti, $comparison = null)
    {
        if ($pacCatalogValueOptionMulti instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueOptionMulti->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueOptionMulti instanceof PropelObjectCollection) {
            return $this
                ->useOptionMultiQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionMulti->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionMulti() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionMulti relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinOptionMulti($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionMulti');

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
            $this->addJoinObject($join, 'OptionMulti');
        }

        return $this;
    }

    /**
     * Use the OptionMulti relation PacCatalogValueOptionMulti object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery A secondary query class using the current class as primary query
     */
    public function useOptionMultiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionMulti($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionMulti', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle|PropelObjectCollection $pacCatalogValueOptionSingle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionSingle($pacCatalogValueOptionSingle, $comparison = null)
    {
        if ($pacCatalogValueOptionSingle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueOptionSingle->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueOptionSingle instanceof PropelObjectCollection) {
            return $this
                ->useOptionSingleQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionSingle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionSingle() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionSingle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinOptionSingle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionSingle');

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
            $this->addJoinObject($join, 'OptionSingle');
        }

        return $this;
    }

    /**
     * Use the OptionSingle relation PacCatalogValueOptionSingle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery A secondary query class using the current class as primary query
     */
    public function useOptionSingleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionSingle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionSingle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger|PropelObjectCollection $pacCatalogValueInteger  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInteger($pacCatalogValueInteger, $comparison = null)
    {
        if ($pacCatalogValueInteger instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueInteger->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueInteger instanceof PropelObjectCollection) {
            return $this
                ->useIntegerQuery()
                ->filterByPrimaryKeys($pacCatalogValueInteger->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInteger() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Integer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinInteger($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Integer');

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
            $this->addJoinObject($join, 'Integer');
        }

        return $this;
    }

    /**
     * Use the Integer relation PacCatalogValueInteger object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery A secondary query class using the current class as primary query
     */
    public function useIntegerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInteger($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Integer', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp|PropelObjectCollection $pacCatalogValueTimestamp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTimestamp($pacCatalogValueTimestamp, $comparison = null)
    {
        if ($pacCatalogValueTimestamp instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueTimestamp->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueTimestamp instanceof PropelObjectCollection) {
            return $this
                ->useTimestampQuery()
                ->filterByPrimaryKeys($pacCatalogValueTimestamp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTimestamp() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Timestamp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinTimestamp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Timestamp');

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
            $this->addJoinObject($join, 'Timestamp');
        }

        return $this;
    }

    /**
     * Use the Timestamp relation PacCatalogValueTimestamp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery A secondary query class using the current class as primary query
     */
    public function useTimestampQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTimestamp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Timestamp', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal|PropelObjectCollection $pacCatalogValueDecimal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDecimal($pacCatalogValueDecimal, $comparison = null)
    {
        if ($pacCatalogValueDecimal instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueDecimal->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueDecimal instanceof PropelObjectCollection) {
            return $this
                ->useDecimalQuery()
                ->filterByPrimaryKeys($pacCatalogValueDecimal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDecimal() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Decimal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinDecimal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Decimal');

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
            $this->addJoinObject($join, 'Decimal');
        }

        return $this;
    }

    /**
     * Use the Decimal relation PacCatalogValueDecimal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery A secondary query class using the current class as primary query
     */
    public function useDecimalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDecimal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Decimal', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText|PropelObjectCollection $pacCatalogValueText  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByText($pacCatalogValueText, $comparison = null)
    {
        if ($pacCatalogValueText instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueText->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueText instanceof PropelObjectCollection) {
            return $this
                ->useTextQuery()
                ->filterByPrimaryKeys($pacCatalogValueText->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByText() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Text relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinText($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Text');

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
            $this->addJoinObject($join, 'Text');
        }

        return $this;
    }

    /**
     * Use the Text relation PacCatalogValueText object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery A secondary query class using the current class as primary query
     */
    public function useTextQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinText($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Text', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean|PropelObjectCollection $pacCatalogValueBoolean  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBoolean($pacCatalogValueBoolean, $comparison = null)
    {
        if ($pacCatalogValueBoolean instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogValueBoolean->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogValueBoolean instanceof PropelObjectCollection) {
            return $this
                ->useBooleanQuery()
                ->filterByPrimaryKeys($pacCatalogValueBoolean->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBoolean() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Boolean relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinBoolean($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Boolean');

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
            $this->addJoinObject($join, 'Boolean');
        }

        return $this;
    }

    /**
     * Use the Boolean relation PacCatalogValueBoolean object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery A secondary query class using the current class as primary query
     */
    public function useBooleanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBoolean($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Boolean', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory|PropelObjectCollection $pacCatalogProductCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductCategory($pacCatalogProductCategory, $comparison = null)
    {
        if ($pacCatalogProductCategory instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductCategory->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductCategory instanceof PropelObjectCollection) {
            return $this
                ->useProductCategoryQuery()
                ->filterByPrimaryKeys($pacCatalogProductCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductCategory() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductCategory', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption|PropelObjectCollection $pacCatalogProductOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductOption($pacCatalogProductOption, $comparison = null)
    {
        if ($pacCatalogProductOption instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductOption->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductOption instanceof PropelObjectCollection) {
            return $this
                ->useProductOptionQuery()
                ->filterByPrimaryKeys($pacCatalogProductOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductOption() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductOption relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinProductOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductOption');

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
            $this->addJoinObject($join, 'ProductOption');
        }

        return $this;
    }

    /**
     * Use the ProductOption relation PacCatalogProductOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery A secondary query class using the current class as primary query
     */
    public function useProductOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductOption', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct|PropelObjectCollection $pacCmsBlockProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockProduct($pacCmsBlockProduct, $comparison = null)
    {
        if ($pacCmsBlockProduct instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCmsBlockProduct->getFkCatalogProduct(), $comparison);
        } elseif ($pacCmsBlockProduct instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockProductQuery()
                ->filterByPrimaryKeys($pacCmsBlockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlockProduct() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockProduct');

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
            $this->addJoinObject($join, 'PacCmsBlockProduct');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockProduct relation PacCmsBlockProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacCmsBlockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockProduct', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage object
     *
     * @param   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage|PropelObjectCollection $pacCatalogProductImage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductImage($pacCatalogProductImage, $comparison = null)
    {
        if ($pacCatalogProductImage instanceof ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProductImage->getFkCatalogProduct(), $comparison);
        } elseif ($pacCatalogProductImage instanceof PropelObjectCollection) {
            return $this
                ->useProductImageQuery()
                ->filterByPrimaryKeys($pacCatalogProductImage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductImage() only accepts arguments of type ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductImage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function joinProductImage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductImage');

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
            $this->addJoinObject($join, 'ProductImage');
        }

        return $this;
    }

    /**
     * Use the ProductImage relation PacCatalogProductImage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery A secondary query class using the current class as primary query
     */
    public function useProductImageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductImage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductImage', 'ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery');
    }

    /**
     * Filter the query by a related PacCatalogProductBundle object
     * using the pac_catalog_product_bundle_product table as cross reference
     *
     * @param   PacCatalogProductBundle $pacCatalogProductBundle the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByBundleProductBundle($pacCatalogProductBundle, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useBundleProductQuery()
            ->filterByBundleProductBundle($pacCatalogProductBundle, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related PacCatalogOption object
     * using the pac_catalog_product_option table as cross reference
     *
     * @param   PacCatalogOption $pacCatalogOption the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function filterByOption($pacCatalogOption, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useProductOptionQuery()
            ->filterByOption($pacCatalogOption, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $pacCatalogProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function prune($pacCatalogProduct = null)
    {
        if ($pacCatalogProduct) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT);
    }
}
