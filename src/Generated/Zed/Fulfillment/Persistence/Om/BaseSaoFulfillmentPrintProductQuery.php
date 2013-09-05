<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_print_product' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByIdPrintProduct($order = Criteria::ASC) Order by the id_print_product column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByLegacyProductId($order = Criteria::ASC) Order by the legacy_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByFkOption($order = Criteria::ASC) Order by the fk_option column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByFkProvider($order = Criteria::ASC) Order by the fk_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByProviderProductId($order = Criteria::ASC) Order by the provider_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByVendorPrice($order = Criteria::ASC) Order by the vendor_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByArtistCost($order = Criteria::ASC) Order by the artist_cost column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByIdPrintProduct() Group by the id_print_product column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByLegacyProductId() Group by the legacy_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByFkOption() Group by the fk_option column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByFkProvider() Group by the fk_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByProviderProductId() Group by the provider_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByVendorPrice() Group by the vendor_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByArtistCost() Group by the artist_cost column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery leftJoinFulfillmentProvider($relationAlias = null) Adds a LEFT JOIN clause to the query using the FulfillmentProvider relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery rightJoinFulfillmentProvider($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FulfillmentProvider relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery innerJoinFulfillmentProvider($relationAlias = null) Adds a INNER JOIN clause to the query using the FulfillmentProvider relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByLegacyProductId(int $legacy_product_id) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the legacy_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByFkOption(int $fk_option) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the fk_option column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByFkProvider(int $fk_provider) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the fk_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByProviderProductId(int $provider_product_id) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the provider_product_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByVendorPrice(int $vendor_price) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the vendor_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByArtistCost(int $artist_cost) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the artist_cost column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct filtered by the updated_at column
 *
 * @method array findByIdPrintProduct(int $id_print_product) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the id_print_product column
 * @method array findByLegacyProductId(int $legacy_product_id) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the legacy_product_id column
 * @method array findByFkOption(int $fk_option) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the fk_option column
 * @method array findByFkProvider(int $fk_provider) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the fk_provider column
 * @method array findByProviderProductId(int $provider_product_id) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the provider_product_id column
 * @method array findByVendorPrice(int $vendor_price) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the vendor_price column
 * @method array findByArtistCost(int $artist_cost) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the artist_cost column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery();
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
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPrintProduct($key, $con = null)
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_print_product`, `legacy_product_id`, `fk_option`, `fk_provider`, `provider_product_id`, `vendor_price`, `artist_cost`, `created_at`, `updated_at` FROM `sao_fulfillment_print_product` WHERE `id_print_product` = :p0';
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
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_print_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPrintProduct(1234); // WHERE id_print_product = 1234
     * $query->filterByIdPrintProduct(array(12, 34)); // WHERE id_print_product IN (12, 34)
     * $query->filterByIdPrintProduct(array('min' => 12)); // WHERE id_print_product >= 12
     * $query->filterByIdPrintProduct(array('max' => 12)); // WHERE id_print_product <= 12
     * </code>
     *
     * @param     mixed $idPrintProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByIdPrintProduct($idPrintProduct = null, $comparison = null)
    {
        if (is_array($idPrintProduct)) {
            $useMinMax = false;
            if (isset($idPrintProduct['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $idPrintProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPrintProduct['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $idPrintProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $idPrintProduct, $comparison);
    }

    /**
     * Filter the query on the legacy_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLegacyProductId(1234); // WHERE legacy_product_id = 1234
     * $query->filterByLegacyProductId(array(12, 34)); // WHERE legacy_product_id IN (12, 34)
     * $query->filterByLegacyProductId(array('min' => 12)); // WHERE legacy_product_id >= 12
     * $query->filterByLegacyProductId(array('max' => 12)); // WHERE legacy_product_id <= 12
     * </code>
     *
     * @param     mixed $legacyProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByLegacyProductId($legacyProductId = null, $comparison = null)
    {
        if (is_array($legacyProductId)) {
            $useMinMax = false;
            if (isset($legacyProductId['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID, $legacyProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($legacyProductId['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID, $legacyProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID, $legacyProductId, $comparison);
    }

    /**
     * Filter the query on the fk_option column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOption(1234); // WHERE fk_option = 1234
     * $query->filterByFkOption(array(12, 34)); // WHERE fk_option IN (12, 34)
     * $query->filterByFkOption(array('min' => 12)); // WHERE fk_option >= 12
     * $query->filterByFkOption(array('max' => 12)); // WHERE fk_option <= 12
     * </code>
     *
     * @see       filterByOption()
     *
     * @param     mixed $fkOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByFkOption($fkOption = null, $comparison = null)
    {
        if (is_array($fkOption)) {
            $useMinMax = false;
            if (isset($fkOption['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, $fkOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOption['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, $fkOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, $fkOption, $comparison);
    }

    /**
     * Filter the query on the fk_provider column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProvider(1234); // WHERE fk_provider = 1234
     * $query->filterByFkProvider(array(12, 34)); // WHERE fk_provider IN (12, 34)
     * $query->filterByFkProvider(array('min' => 12)); // WHERE fk_provider >= 12
     * $query->filterByFkProvider(array('max' => 12)); // WHERE fk_provider <= 12
     * </code>
     *
     * @see       filterByFulfillmentProvider()
     *
     * @param     mixed $fkProvider The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByFkProvider($fkProvider = null, $comparison = null)
    {
        if (is_array($fkProvider)) {
            $useMinMax = false;
            if (isset($fkProvider['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, $fkProvider['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProvider['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, $fkProvider['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, $fkProvider, $comparison);
    }

    /**
     * Filter the query on the provider_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderProductId(1234); // WHERE provider_product_id = 1234
     * $query->filterByProviderProductId(array(12, 34)); // WHERE provider_product_id IN (12, 34)
     * $query->filterByProviderProductId(array('min' => 12)); // WHERE provider_product_id >= 12
     * $query->filterByProviderProductId(array('max' => 12)); // WHERE provider_product_id <= 12
     * </code>
     *
     * @param     mixed $providerProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByProviderProductId($providerProductId = null, $comparison = null)
    {
        if (is_array($providerProductId)) {
            $useMinMax = false;
            if (isset($providerProductId['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID, $providerProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($providerProductId['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID, $providerProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID, $providerProductId, $comparison);
    }

    /**
     * Filter the query on the vendor_price column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorPrice(1234); // WHERE vendor_price = 1234
     * $query->filterByVendorPrice(array(12, 34)); // WHERE vendor_price IN (12, 34)
     * $query->filterByVendorPrice(array('min' => 12)); // WHERE vendor_price >= 12
     * $query->filterByVendorPrice(array('max' => 12)); // WHERE vendor_price <= 12
     * </code>
     *
     * @param     mixed $vendorPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByVendorPrice($vendorPrice = null, $comparison = null)
    {
        if (is_array($vendorPrice)) {
            $useMinMax = false;
            if (isset($vendorPrice['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE, $vendorPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vendorPrice['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE, $vendorPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE, $vendorPrice, $comparison);
    }

    /**
     * Filter the query on the artist_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistCost(1234); // WHERE artist_cost = 1234
     * $query->filterByArtistCost(array(12, 34)); // WHERE artist_cost IN (12, 34)
     * $query->filterByArtistCost(array('min' => 12)); // WHERE artist_cost >= 12
     * $query->filterByArtistCost(array('max' => 12)); // WHERE artist_cost <= 12
     * </code>
     *
     * @param     mixed $artistCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByArtistCost($artistCost = null, $comparison = null)
    {
        if (is_array($artistCost)) {
            $useMinMax = false;
            if (isset($artistCost['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST, $artistCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artistCost['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST, $artistCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST, $artistCost, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider|PropelObjectCollection $saoFulfillmentProvider The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFulfillmentProvider($saoFulfillmentProvider, $comparison = null)
    {
        if ($saoFulfillmentProvider instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, $saoFulfillmentProvider->getIdProvider(), $comparison);
        } elseif ($saoFulfillmentProvider instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, $saoFulfillmentProvider->toKeyValue('PrimaryKey', 'IdProvider'), $comparison);
        } else {
            throw new PropelException('filterByFulfillmentProvider() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FulfillmentProvider relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function joinFulfillmentProvider($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FulfillmentProvider');

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
            $this->addJoinObject($join, 'FulfillmentProvider');
        }

        return $this;
    }

    /**
     * Use the FulfillmentProvider relation SaoFulfillmentProvider object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery A secondary query class using the current class as primary query
     */
    public function useFulfillmentProviderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFulfillmentProvider($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FulfillmentProvider', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogOption object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogOption|PropelObjectCollection $pacCatalogOption The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacCatalogOption, $comparison = null)
    {
        if ($pacCatalogOption instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogOption) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, $pacCatalogOption->getIdCatalogOption(), $comparison);
        } elseif ($pacCatalogOption instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, $pacCatalogOption->toKeyValue('PrimaryKey', 'IdCatalogOption'), $comparison);
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Option');

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
            $this->addJoinObject($join, 'Option');
        }

        return $this;
    }

    /**
     * Use the Option relation PacCatalogOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct $saoFulfillmentPrintProduct Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentPrintProduct = null)
    {
        if ($saoFulfillmentPrintProduct) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $saoFulfillmentPrintProduct->getIdPrintProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT);
    }
}
