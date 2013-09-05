<?php


/**
 * Base class that represents a query for the 'sao_sales_order_address' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery orderByIdSalesOrderAddress($order = Criteria::ASC) Order by the id_sales_order_address column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery orderByFkMiscRegion($order = Criteria::ASC) Order by the fk_misc_region column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery groupByIdSalesOrderAddress() Group by the id_sales_order_address column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery groupByFkMiscRegion() Group by the fk_misc_region column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddress findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderAddress matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddress findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderAddress matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesOrderAddress object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderAddress findOneByFkMiscRegion(int $fk_misc_region) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderAddress filtered by the fk_misc_region column
 *
 * @method array findByIdSalesOrderAddress(int $id_sales_order_address) Return Sao_Zed_Sales_Persistence_SaoSalesOrderAddress objects filtered by the id_sales_order_address column
 * @method array findByFkMiscRegion(int $fk_misc_region) Return Sao_Zed_Sales_Persistence_SaoSalesOrderAddress objects filtered by the fk_misc_region column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderAddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderAddressQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesOrderAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderAddress|Sao_Zed_Sales_Persistence_SaoSalesOrderAddress[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderAddress A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderAddress($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderAddress A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_address`, `fk_misc_region` FROM `sao_sales_order_address` WHERE `id_sales_order_address` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesOrderAddress();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddress|Sao_Zed_Sales_Persistence_SaoSalesOrderAddress[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderAddress[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderAddress(1234); // WHERE id_sales_order_address = 1234
     * $query->filterByIdSalesOrderAddress(array(12, 34)); // WHERE id_sales_order_address IN (12, 34)
     * $query->filterByIdSalesOrderAddress(array('min' => 12)); // WHERE id_sales_order_address >= 12
     * $query->filterByIdSalesOrderAddress(array('max' => 12)); // WHERE id_sales_order_address <= 12
     * </code>
     *
     * @see       filterByAddress()
     *
     * @param     mixed $idSalesOrderAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderAddress($idSalesOrderAddress = null, $comparison = null)
    {
        if (is_array($idSalesOrderAddress)) {
            $useMinMax = false;
            if (isset($idSalesOrderAddress['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderAddress['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress, $comparison);
    }

    /**
     * Filter the query on the fk_misc_region column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscRegion(1234); // WHERE fk_misc_region = 1234
     * $query->filterByFkMiscRegion(array(12, 34)); // WHERE fk_misc_region IN (12, 34)
     * $query->filterByFkMiscRegion(array('min' => 12)); // WHERE fk_misc_region >= 12
     * $query->filterByFkMiscRegion(array('max' => 12)); // WHERE fk_misc_region <= 12
     * </code>
     *
     * @see       filterByRegion()
     *
     * @param     mixed $fkMiscRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByFkMiscRegion($fkMiscRegion = null, $comparison = null)
    {
        if (is_array($fkMiscRegion)) {
            $useMinMax = false;
            if (isset($fkMiscRegion['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscRegion['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress|PropelObjectCollection $pacSalesOrderAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAddress($pacSalesOrderAddress, $comparison = null)
    {
        if ($pacSalesOrderAddress instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($pacSalesOrderAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterByAddress() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Address relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Address');

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
            $this->addJoinObject($join, 'Address');
        }

        return $this;
    }

    /**
     * Use the Address relation PacSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Address', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Misc_Persistence_SaoMiscRegion object
     *
     * @param   Sao_Zed_Misc_Persistence_SaoMiscRegion|PropelObjectCollection $saoMiscRegion The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($saoMiscRegion, $comparison = null)
    {
        if ($saoMiscRegion instanceof Sao_Zed_Misc_Persistence_SaoMiscRegion) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::FK_MISC_REGION, $saoMiscRegion->getIdRegion(), $comparison);
        } elseif ($saoMiscRegion instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::FK_MISC_REGION, $saoMiscRegion->toKeyValue('PrimaryKey', 'IdRegion'), $comparison);
        } else {
            throw new PropelException('filterByRegion() only accepts arguments of type Sao_Zed_Misc_Persistence_SaoMiscRegion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Region relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Region');

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
            $this->addJoinObject($join, 'Region');
        }

        return $this;
    }

    /**
     * Use the Region relation SaoMiscRegion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Misc_Persistence_SaoMiscRegionQuery A secondary query class using the current class as primary query
     */
    public function useRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Region', 'Sao_Zed_Misc_Persistence_SaoMiscRegionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderAddress $saoSalesOrderAddress Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery The current query, for fluid interface
     */
    public function prune($saoSalesOrderAddress = null)
    {
        if ($saoSalesOrderAddress) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $saoSalesOrderAddress->getIdSalesOrderAddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
