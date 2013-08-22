<?php


/**
 * Base class that represents a query for the 'pac_cart_item' table.
 *
 *
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByIdCartItem($order = Criteria::ASC) Order by the id_cart_item column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByFkCart($order = Criteria::ASC) Order by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByUniqueIdentifier($order = Criteria::ASC) Order by the unique_identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByDeleteCause($order = Criteria::ASC) Order by the delete_cause column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByIdCartItem() Group by the id_cart_item column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByFkCart() Group by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByUniqueIdentifier() Group by the unique_identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByQuantity() Group by the quantity column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByDeleteCause() Group by the delete_cause column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery leftJoinCart($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cart relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery rightJoinCart($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cart relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery innerJoinCart($relationAlias = null) Adds a INNER JOIN clause to the query using the Cart relation
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem matching the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem matching the query, or a new ProjectA_Zed_Cart_Persistence_PacCartItem object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByFkCart(int $fk_cart) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByUniqueIdentifier(string $unique_identifier) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the unique_identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneBySku(string $sku) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the sku column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByQuantity(int $quantity) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the quantity column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the is_deleted column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByDeleteCause(int $delete_cause) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the delete_cause column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItem findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartItem filtered by the updated_at column
 *
 * @method array findByIdCartItem(int $id_cart_item) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the id_cart_item column
 * @method array findByFkCart(int $fk_cart) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the fk_cart column
 * @method array findByUniqueIdentifier(string $unique_identifier) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the unique_identifier column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the sku column
 * @method array findByQuantity(int $quantity) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the quantity column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the is_deleted column
 * @method array findByDeleteCause(int $delete_cause) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the delete_cause column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cart_Persistence_PacCartItem objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence.om
 */
abstract class Generated_Zed_Cart_Persistence_Om_BasePacCartItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cart_Persistence_Om_BasePacCartItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cart_Persistence_PacCartItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cart_Persistence_PacCartItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cart_Persistence_PacCartItemQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cart_Persistence_PacCartItemQuery();
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
     * @return   ProjectA_Zed_Cart_Persistence_PacCartItem|ProjectA_Zed_Cart_Persistence_PacCartItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cart_Persistence_PacCartItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCartItem($key, $con = null)
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cart_item`, `fk_cart`, `unique_identifier`, `sku`, `quantity`, `is_deleted`, `delete_cause`, `created_at`, `updated_at` FROM `pac_cart_item` WHERE `id_cart_item` = :p0';
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
            $obj = new ProjectA_Zed_Cart_Persistence_PacCartItem();
            $obj->hydrate($row);
            ProjectA_Zed_Cart_Persistence_PacCartItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItem|ProjectA_Zed_Cart_Persistence_PacCartItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartItem[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cart_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCartItem(1234); // WHERE id_cart_item = 1234
     * $query->filterByIdCartItem(array(12, 34)); // WHERE id_cart_item IN (12, 34)
     * $query->filterByIdCartItem(array('min' => 12)); // WHERE id_cart_item >= 12
     * $query->filterByIdCartItem(array('max' => 12)); // WHERE id_cart_item <= 12
     * </code>
     *
     * @param     mixed $idCartItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByIdCartItem($idCartItem = null, $comparison = null)
    {
        if (is_array($idCartItem)) {
            $useMinMax = false;
            if (isset($idCartItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $idCartItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCartItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $idCartItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $idCartItem, $comparison);
    }

    /**
     * Filter the query on the fk_cart column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCart(1234); // WHERE fk_cart = 1234
     * $query->filterByFkCart(array(12, 34)); // WHERE fk_cart IN (12, 34)
     * $query->filterByFkCart(array('min' => 12)); // WHERE fk_cart >= 12
     * $query->filterByFkCart(array('max' => 12)); // WHERE fk_cart <= 12
     * </code>
     *
     * @see       filterByCart()
     *
     * @param     mixed $fkCart The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByFkCart($fkCart = null, $comparison = null)
    {
        if (is_array($fkCart)) {
            $useMinMax = false;
            if (isset($fkCart['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::FK_CART, $fkCart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCart['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::FK_CART, $fkCart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::FK_CART, $fkCart, $comparison);
    }

    /**
     * Filter the query on the unique_identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByUniqueIdentifier('fooValue');   // WHERE unique_identifier = 'fooValue'
     * $query->filterByUniqueIdentifier('%fooValue%'); // WHERE unique_identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uniqueIdentifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByUniqueIdentifier($uniqueIdentifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uniqueIdentifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uniqueIdentifier)) {
                $uniqueIdentifier = str_replace('*', '%', $uniqueIdentifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UNIQUE_IDENTIFIER, $uniqueIdentifier, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity >= 12
     * $query->filterByQuantity(array('max' => 12)); // WHERE quantity <= 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the delete_cause column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleteCause(1234); // WHERE delete_cause = 1234
     * $query->filterByDeleteCause(array(12, 34)); // WHERE delete_cause IN (12, 34)
     * $query->filterByDeleteCause(array('min' => 12)); // WHERE delete_cause >= 12
     * $query->filterByDeleteCause(array('max' => 12)); // WHERE delete_cause <= 12
     * </code>
     *
     * @param     mixed $deleteCause The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByDeleteCause($deleteCause = null, $comparison = null)
    {
        if (is_array($deleteCause)) {
            $useMinMax = false;
            if (isset($deleteCause['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::DELETE_CAUSE, $deleteCause['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deleteCause['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::DELETE_CAUSE, $deleteCause['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::DELETE_CAUSE, $deleteCause, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCart object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCart|PropelObjectCollection $pacCart The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCart($pacCart, $comparison = null)
    {
        if ($pacCart instanceof ProjectA_Zed_Cart_Persistence_PacCart) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::FK_CART, $pacCart->getIdCart(), $comparison);
        } elseif ($pacCart instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::FK_CART, $pacCart->toKeyValue('PrimaryKey', 'IdCart'), $comparison);
        } else {
            throw new PropelException('filterByCart() only accepts arguments of type ProjectA_Zed_Cart_Persistence_PacCart or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cart relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function joinCart($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cart');

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
            $this->addJoinObject($join, 'Cart');
        }

        return $this;
    }

    /**
     * Use the Cart relation PacCart object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_PacCartQuery A secondary query class using the current class as primary query
     */
    public function useCartQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCart($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cart', 'ProjectA_Zed_Cart_Persistence_PacCartQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartItemOption object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItemOption|PropelObjectCollection $pacCartItemOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacCartItemOption, $comparison = null)
    {
        if ($pacCartItemOption instanceof ProjectA_Zed_Cart_Persistence_PacCartItemOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $pacCartItemOption->getFkCartItem(), $comparison);
        } elseif ($pacCartItemOption instanceof PropelObjectCollection) {
            return $this
                ->useOptionQuery()
                ->filterByPrimaryKeys($pacCartItemOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Cart_Persistence_PacCartItemOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * Use the Option relation PacCartItemOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItem $pacCartItem Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function prune($pacCartItem = null)
    {
        if ($pacCartItem) {
            $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::ID_CART_ITEM, $pacCartItem->getIdCartItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemPeer::CREATED_AT);
    }
}
