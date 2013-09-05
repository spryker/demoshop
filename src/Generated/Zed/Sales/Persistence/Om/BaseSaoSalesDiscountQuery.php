<?php


/**
 * Base class that represents a query for the 'sao_sales_discount' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery orderByIdSalesDiscount($order = Criteria::ASC) Order by the id_sales_discount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery orderBySaatchiAmount($order = Criteria::ASC) Order by the saatchi_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery orderByArtistAmount($order = Criteria::ASC) Order by the artist_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery groupByIdSalesDiscount() Group by the id_sales_discount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery groupBySaatchiAmount() Group by the saatchi_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery groupByArtistAmount() Group by the artist_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesDiscount object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOneBySaatchiAmount(int $saatchi_amount) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount filtered by the saatchi_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOneByArtistAmount(int $artist_amount) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount filtered by the artist_amount column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount filtered by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesDiscount findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesDiscount filtered by the updated_at column
 *
 * @method array findByIdSalesDiscount(int $id_sales_discount) Return Sao_Zed_Sales_Persistence_SaoSalesDiscount objects filtered by the id_sales_discount column
 * @method array findBySaatchiAmount(int $saatchi_amount) Return Sao_Zed_Sales_Persistence_SaoSalesDiscount objects filtered by the saatchi_amount column
 * @method array findByArtistAmount(int $artist_amount) Return Sao_Zed_Sales_Persistence_SaoSalesDiscount objects filtered by the artist_amount column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Sales_Persistence_SaoSalesDiscount objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Sales_Persistence_SaoSalesDiscount objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesDiscountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesDiscountQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesDiscount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesDiscount|Sao_Zed_Sales_Persistence_SaoSalesDiscount[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesDiscount A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesDiscount($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesDiscount A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_discount`, `saatchi_amount`, `artist_amount`, `created_at`, `updated_at` FROM `sao_sales_discount` WHERE `id_sales_discount` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesDiscount();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscount|Sao_Zed_Sales_Persistence_SaoSalesDiscount[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesDiscount[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesDiscount(1234); // WHERE id_sales_discount = 1234
     * $query->filterByIdSalesDiscount(array(12, 34)); // WHERE id_sales_discount IN (12, 34)
     * $query->filterByIdSalesDiscount(array('min' => 12)); // WHERE id_sales_discount >= 12
     * $query->filterByIdSalesDiscount(array('max' => 12)); // WHERE id_sales_discount <= 12
     * </code>
     *
     * @see       filterByDiscount()
     *
     * @param     mixed $idSalesDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByIdSalesDiscount($idSalesDiscount = null, $comparison = null)
    {
        if (is_array($idSalesDiscount)) {
            $useMinMax = false;
            if (isset($idSalesDiscount['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesDiscount['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount, $comparison);
    }

    /**
     * Filter the query on the saatchi_amount column
     *
     * Example usage:
     * <code>
     * $query->filterBySaatchiAmount(1234); // WHERE saatchi_amount = 1234
     * $query->filterBySaatchiAmount(array(12, 34)); // WHERE saatchi_amount IN (12, 34)
     * $query->filterBySaatchiAmount(array('min' => 12)); // WHERE saatchi_amount >= 12
     * $query->filterBySaatchiAmount(array('max' => 12)); // WHERE saatchi_amount <= 12
     * </code>
     *
     * @param     mixed $saatchiAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterBySaatchiAmount($saatchiAmount = null, $comparison = null)
    {
        if (is_array($saatchiAmount)) {
            $useMinMax = false;
            if (isset($saatchiAmount['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::SAATCHI_AMOUNT, $saatchiAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saatchiAmount['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::SAATCHI_AMOUNT, $saatchiAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::SAATCHI_AMOUNT, $saatchiAmount, $comparison);
    }

    /**
     * Filter the query on the artist_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistAmount(1234); // WHERE artist_amount = 1234
     * $query->filterByArtistAmount(array(12, 34)); // WHERE artist_amount IN (12, 34)
     * $query->filterByArtistAmount(array('min' => 12)); // WHERE artist_amount >= 12
     * $query->filterByArtistAmount(array('max' => 12)); // WHERE artist_amount <= 12
     * </code>
     *
     * @param     mixed $artistAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByArtistAmount($artistAmount = null, $comparison = null)
    {
        if (is_array($artistAmount)) {
            $useMinMax = false;
            if (isset($artistAmount['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ARTIST_AMOUNT, $artistAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artistAmount['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ARTIST_AMOUNT, $artistAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ARTIST_AMOUNT, $artistAmount, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_PacSalesDiscount) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $pacSalesDiscount->getIdSalesDiscount(), $comparison);
        } elseif ($pacSalesDiscount instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $pacSalesDiscount->toKeyValue('PrimaryKey', 'IdSalesDiscount'), $comparison);
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discount');

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
            $this->addJoinObject($join, 'Discount');
        }

        return $this;
    }

    /**
     * Use the Discount relation PacSalesDiscount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', 'ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesDiscount $saoSalesDiscount Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function prune($saoSalesDiscount = null)
    {
        if ($saoSalesDiscount) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::ID_SALES_DISCOUNT, $saoSalesDiscount->getIdSalesDiscount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesDiscountPeer::CREATED_AT);
    }
}
