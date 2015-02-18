<?php


/**
 * Base class that represents a query for the 'pac_price_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByIdPriceProduct($order = Criteria::ASC) Order by the id_price_product column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByValidFrom($order = Criteria::ASC) Order by the valid_from column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByValidTo($order = Criteria::ASC) Order by the valid_to column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery orderByFkPriceType($order = Criteria::ASC) Order by the fk_price_type column
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByIdPriceProduct() Group by the id_price_product column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByPrice() Group by the price column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByValidFrom() Group by the valid_from column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByValidTo() Group by the valid_to column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery groupByFkPriceType() Group by the fk_price_type column
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery leftJoinPriceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceType relation
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery rightJoinPriceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceType relation
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery innerJoinPriceType($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceType relation
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct matching the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct matching the query, or a new ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneByPrice(string $price) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct filtered by the price column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneByValidFrom(string $valid_from) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct filtered by the valid_from column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneByValidTo(string $valid_to) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct filtered by the valid_to column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct filtered by the fk_catalog_product column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct findOneByFkPriceType(int $fk_price_type) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct filtered by the fk_price_type column
 *
 * @method array findByIdPriceProduct(int $id_price_product) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the id_price_product column
 * @method array findByPrice(string $price) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the price column
 * @method array findByValidFrom(string $valid_from) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the valid_from column
 * @method array findByValidTo(string $valid_to) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the valid_to column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the fk_catalog_product column
 * @method array findByFkPriceType(int $fk_price_type) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct objects filtered by the fk_price_type column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Price/Persistence/Propel.om
 */
abstract class Generated_Zed_Price_Persistence_Propel_Om_BasePacPriceProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Price_Persistence_Propel_Om_BasePacPriceProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPriceProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct|ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPriceProduct($key, $con = null)
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
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_price_product`, `price`, `valid_from`, `valid_to`, `fk_catalog_product`, `fk_price_type` FROM `pac_price_product` WHERE `id_price_product` = :p0';
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
            $obj = new ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct|ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_price_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPriceProduct(1234); // WHERE id_price_product = 1234
     * $query->filterByIdPriceProduct(array(12, 34)); // WHERE id_price_product IN (12, 34)
     * $query->filterByIdPriceProduct(array('min' => 12)); // WHERE id_price_product >= 12
     * $query->filterByIdPriceProduct(array('max' => 12)); // WHERE id_price_product <= 12
     * </code>
     *
     * @param     mixed $idPriceProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByIdPriceProduct($idPriceProduct = null, $comparison = null)
    {
        if (is_array($idPriceProduct)) {
            $useMinMax = false;
            if (isset($idPriceProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $idPriceProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPriceProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $idPriceProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $idPriceProduct, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price >= 12
     * $query->filterByPrice(array('max' => 12)); // WHERE price <= 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the valid_from column
     *
     * Example usage:
     * <code>
     * $query->filterByValidFrom('2011-03-14'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom('now'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom(array('max' => 'yesterday')); // WHERE valid_from < '2011-03-13'
     * </code>
     *
     * @param     mixed $validFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByValidFrom($validFrom = null, $comparison = null)
    {
        if (is_array($validFrom)) {
            $useMinMax = false;
            if (isset($validFrom['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_FROM, $validFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validFrom['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_FROM, $validFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_FROM, $validFrom, $comparison);
    }

    /**
     * Filter the query on the valid_to column
     *
     * Example usage:
     * <code>
     * $query->filterByValidTo('2011-03-14'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo('now'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo(array('max' => 'yesterday')); // WHERE valid_to < '2011-03-13'
     * </code>
     *
     * @param     mixed $validTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByValidTo($validTo = null, $comparison = null)
    {
        if (is_array($validTo)) {
            $useMinMax = false;
            if (isset($validTo['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_TO, $validTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validTo['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_TO, $validTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::VALID_TO, $validTo, $comparison);
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
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the fk_price_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPriceType(1234); // WHERE fk_price_type = 1234
     * $query->filterByFkPriceType(array(12, 34)); // WHERE fk_price_type IN (12, 34)
     * $query->filterByFkPriceType(array('min' => 12)); // WHERE fk_price_type >= 12
     * $query->filterByFkPriceType(array('max' => 12)); // WHERE fk_price_type <= 12
     * </code>
     *
     * @see       filterByPriceType()
     *
     * @param     mixed $fkPriceType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function filterByFkPriceType($fkPriceType = null, $comparison = null)
    {
        if (is_array($fkPriceType)) {
            $useMinMax = false;
            if (isset($fkPriceType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_PRICE_TYPE, $fkPriceType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPriceType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_PRICE_TYPE, $fkPriceType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_PRICE_TYPE, $fkPriceType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Price_Persistence_Propel_PacPriceType object
     *
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceType|PropelObjectCollection $pacPriceType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPriceType($pacPriceType, $comparison = null)
    {
        if ($pacPriceType instanceof ProjectA_Zed_Price_Persistence_Propel_PacPriceType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_PRICE_TYPE, $pacPriceType->getIdPriceType(), $comparison);
        } elseif ($pacPriceType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::FK_PRICE_TYPE, $pacPriceType->toKeyValue('PrimaryKey', 'IdPriceType'), $comparison);
        } else {
            throw new PropelException('filterByPriceType() only accepts arguments of type ProjectA_Zed_Price_Persistence_Propel_PacPriceType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PriceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function joinPriceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PriceType');

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
            $this->addJoinObject($join, 'PriceType');
        }

        return $this;
    }

    /**
     * Use the PriceType relation PacPriceType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Price_Persistence_Propel_PacPriceTypeQuery A secondary query class using the current class as primary query
     */
    public function usePriceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPriceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PriceType', 'ProjectA_Zed_Price_Persistence_Propel_PacPriceTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceProduct $pacPriceProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceProductQuery The current query, for fluid interface
     */
    public function prune($pacPriceProduct = null)
    {
        if ($pacPriceProduct) {
            $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceProductPeer::ID_PRICE_PRODUCT, $pacPriceProduct->getIdPriceProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
