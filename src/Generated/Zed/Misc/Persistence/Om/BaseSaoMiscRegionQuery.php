<?php


/**
 * Base class that represents a query for the 'sao_misc_region' table.
 *
 *
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery orderByIdRegion($order = Criteria::ASC) Order by the id_region column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery groupByIdRegion() Group by the id_region column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery groupByName() Group by the name column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery groupByShortName() Group by the short_name column
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery leftJoinSaoAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoAddress relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery rightJoinSaoAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoAddress relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery innerJoinSaoAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoAddress relation
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery leftJoinSaoSaleOrderItemAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoSaleOrderItemAddress relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery rightJoinSaoSaleOrderItemAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoSaleOrderItemAddress relation
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegionQuery innerJoinSaoSaleOrderItemAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoSaleOrderItemAddress relation
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegion findOne(PropelPDO $con = null) Return the first Sao_Zed_Misc_Persistence_SaoMiscRegion matching the query
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegion findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Misc_Persistence_SaoMiscRegion matching the query, or a new Sao_Zed_Misc_Persistence_SaoMiscRegion object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegion findOneByFkMiscCountry(int $fk_misc_country) Return the first Sao_Zed_Misc_Persistence_SaoMiscRegion filtered by the fk_misc_country column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegion findOneByName(string $name) Return the first Sao_Zed_Misc_Persistence_SaoMiscRegion filtered by the name column
 * @method Sao_Zed_Misc_Persistence_SaoMiscRegion findOneByShortName(string $short_name) Return the first Sao_Zed_Misc_Persistence_SaoMiscRegion filtered by the short_name column
 *
 * @method array findByIdRegion(int $id_region) Return Sao_Zed_Misc_Persistence_SaoMiscRegion objects filtered by the id_region column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return Sao_Zed_Misc_Persistence_SaoMiscRegion objects filtered by the fk_misc_country column
 * @method array findByName(string $name) Return Sao_Zed_Misc_Persistence_SaoMiscRegion objects filtered by the name column
 * @method array findByShortName(string $short_name) Return Sao_Zed_Misc_Persistence_SaoMiscRegion objects filtered by the short_name column
 *
 * @package    propel.generator.project/Sao/Zed/Misc/Persistence.om
 */
abstract class Generated_Zed_Misc_Persistence_Om_BaseSaoMiscRegionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Misc_Persistence_Om_BaseSaoMiscRegionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Misc_Persistence_SaoMiscRegion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Misc_Persistence_SaoMiscRegionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Misc_Persistence_SaoMiscRegionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Misc_Persistence_SaoMiscRegionQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Misc_Persistence_SaoMiscRegionQuery();
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
     * @return   Sao_Zed_Misc_Persistence_SaoMiscRegion|Sao_Zed_Misc_Persistence_SaoMiscRegion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Misc_Persistence_SaoMiscRegion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdRegion($key, $con = null)
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
     * @return                 Sao_Zed_Misc_Persistence_SaoMiscRegion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_region`, `fk_misc_country`, `name`, `short_name` FROM `sao_misc_region` WHERE `id_region` = :p0';
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
            $obj = new Sao_Zed_Misc_Persistence_SaoMiscRegion();
            $obj->hydrate($row);
            Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegion|Sao_Zed_Misc_Persistence_SaoMiscRegion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Misc_Persistence_SaoMiscRegion[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_region column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRegion(1234); // WHERE id_region = 1234
     * $query->filterByIdRegion(array(12, 34)); // WHERE id_region IN (12, 34)
     * $query->filterByIdRegion(array('min' => 12)); // WHERE id_region >= 12
     * $query->filterByIdRegion(array('max' => 12)); // WHERE id_region <= 12
     * </code>
     *
     * @param     mixed $idRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function filterByIdRegion($idRegion = null, $comparison = null)
    {
        if (is_array($idRegion)) {
            $useMinMax = false;
            if (isset($idRegion['min'])) {
                $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $idRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRegion['max'])) {
                $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $idRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $idRegion, $comparison);
    }

    /**
     * Filter the query on the fk_misc_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscCountry(1234); // WHERE fk_misc_country = 1234
     * $query->filterByFkMiscCountry(array(12, 34)); // WHERE fk_misc_country IN (12, 34)
     * $query->filterByFkMiscCountry(array('min' => 12)); // WHERE fk_misc_country >= 12
     * $query->filterByFkMiscCountry(array('max' => 12)); // WHERE fk_misc_country <= 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $fkMiscCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
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
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the short_name column
     *
     * Example usage:
     * <code>
     * $query->filterByShortName('fooValue');   // WHERE short_name = 'fooValue'
     * $query->filterByShortName('%fooValue%'); // WHERE short_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function filterByShortName($shortName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortName)) {
                $shortName = str_replace('*', '%', $shortName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::SHORT_NAME, $shortName, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_PacMiscCountry) {
            return $this
                ->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type ProjectA_Zed_Misc_Persistence_PacMiscCountry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation PacMiscCountry object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderAddress object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderAddress|PropelObjectCollection $saoSalesOrderAddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoAddress($saoSalesOrderAddress, $comparison = null)
    {
        if ($saoSalesOrderAddress instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderAddress) {
            return $this
                ->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $saoSalesOrderAddress->getFkMiscRegion(), $comparison);
        } elseif ($saoSalesOrderAddress instanceof PropelObjectCollection) {
            return $this
                ->useSaoAddressQuery()
                ->filterByPrimaryKeys($saoSalesOrderAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoAddress() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function joinSaoAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoAddress');

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
            $this->addJoinObject($join, 'SaoAddress');
        }

        return $this;
    }

    /**
     * Use the SaoAddress relation SaoSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useSaoAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSaoAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoAddress', 'Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItem|PropelObjectCollection $saoSalesOrderItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoSaleOrderItemAddress($saoSalesOrderItem, $comparison = null)
    {
        if ($saoSalesOrderItem instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $saoSalesOrderItem->getFkMiscRegion(), $comparison);
        } elseif ($saoSalesOrderItem instanceof PropelObjectCollection) {
            return $this
                ->useSaoSaleOrderItemAddressQuery()
                ->filterByPrimaryKeys($saoSalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoSaleOrderItemAddress() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoSaleOrderItemAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function joinSaoSaleOrderItemAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoSaleOrderItemAddress');

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
            $this->addJoinObject($join, 'SaoSaleOrderItemAddress');
        }

        return $this;
    }

    /**
     * Use the SaoSaleOrderItemAddress relation SaoSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSaoSaleOrderItemAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSaoSaleOrderItemAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoSaleOrderItemAddress', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Misc_Persistence_SaoMiscRegion $saoMiscRegion Object to remove from the list of results
     *
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegionQuery The current query, for fluid interface
     */
    public function prune($saoMiscRegion = null)
    {
        if ($saoMiscRegion) {
            $this->addUsingAlias(Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $saoMiscRegion->getIdRegion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
