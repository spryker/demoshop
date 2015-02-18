<?php


/**
 * Base class that represents a query for the 'pac_misc_region' table.
 *
 *
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery orderByIdMiscRegion($order = Criteria::ASC) Order by the id_misc_region column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery orderByIso2Code($order = Criteria::ASC) Order by the iso2_code column
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery groupByIdMiscRegion() Group by the id_misc_region column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery groupByIso2Code() Group by the iso2_code column
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoinCustomerAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerAddress relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoinCustomerAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerAddress relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoinCustomerAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerAddress relation
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoinCustomerAddress2($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerAddress2 relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoinCustomerAddress2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerAddress2 relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoinCustomerAddress2($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerAddress2 relation
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoinSalesOrderAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddress relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoinSalesOrderAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddress relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoinSalesOrderAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddress relation
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery leftJoinSalesOrderAddressHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery rightJoinSalesOrderAddressHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery innerJoinSalesOrderAddressHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddressHistory relation
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion matching the query
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion matching the query, or a new ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion findOneByFkMiscCountry(int $fk_misc_country) Return the first ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion filtered by the fk_misc_country column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion findOneByName(string $name) Return the first ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion filtered by the name column
 * @method ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion findOneByIso2Code(string $iso2_code) Return the first ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion filtered by the iso2_code column
 *
 * @method array findByIdMiscRegion(int $id_misc_region) Return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion objects filtered by the id_misc_region column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion objects filtered by the fk_misc_country column
 * @method array findByName(string $name) Return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion objects filtered by the name column
 * @method array findByIso2Code(string $iso2_code) Return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion objects filtered by the iso2_code column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Misc/Persistence/Propel.om
 */
abstract class Generated_Zed_Misc_Persistence_Propel_Om_BasePacMiscRegionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Misc_Persistence_Propel_Om_BasePacMiscRegionQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacMiscRegion']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion|ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMiscRegion($key, $con = null)
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
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_misc_region`, `fk_misc_country`, `name`, `iso2_code` FROM `pac_misc_region` WHERE `id_misc_region` = :p0';
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
            $obj = new ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion();
            $obj->hydrate($row);
            ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion|ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_misc_region column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMiscRegion(1234); // WHERE id_misc_region = 1234
     * $query->filterByIdMiscRegion(array(12, 34)); // WHERE id_misc_region IN (12, 34)
     * $query->filterByIdMiscRegion(array('min' => 12)); // WHERE id_misc_region >= 12
     * $query->filterByIdMiscRegion(array('max' => 12)); // WHERE id_misc_region <= 12
     * </code>
     *
     * @param     mixed $idMiscRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function filterByIdMiscRegion($idMiscRegion = null, $comparison = null)
    {
        if (is_array($idMiscRegion)) {
            $useMinMax = false;
            if (isset($idMiscRegion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $idMiscRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMiscRegion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $idMiscRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $idMiscRegion, $comparison);
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the iso2_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIso2Code('fooValue');   // WHERE iso2_code = 'fooValue'
     * $query->filterByIso2Code('%fooValue%'); // WHERE iso2_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iso2Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function filterByIso2Code($iso2Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iso2Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $iso2Code)) {
                $iso2Code = str_replace('*', '%', $iso2Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ISO2_CODE, $iso2Code, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', 'ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress object
     *
     * @param   ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress|PropelObjectCollection $pacCustomerAddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerAddress($pacCustomerAddress, $comparison = null)
    {
        if ($pacCustomerAddress instanceof ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $pacCustomerAddress->getFkMiscRegion(), $comparison);
        } elseif ($pacCustomerAddress instanceof PropelObjectCollection) {
            return $this
                ->useCustomerAddressQuery()
                ->filterByPrimaryKeys($pacCustomerAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerAddress() only accepts arguments of type ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function joinCustomerAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerAddress');

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
            $this->addJoinObject($join, 'CustomerAddress');
        }

        return $this;
    }

    /**
     * Use the CustomerAddress relation PacCustomerAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useCustomerAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerAddress', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object
     *
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address|PropelObjectCollection $pacCustomer2Address  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerAddress2($pacCustomer2Address, $comparison = null)
    {
        if ($pacCustomer2Address instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $pacCustomer2Address->getFkMiscRegion(), $comparison);
        } elseif ($pacCustomer2Address instanceof PropelObjectCollection) {
            return $this
                ->useCustomerAddress2Query()
                ->filterByPrimaryKeys($pacCustomer2Address->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerAddress2() only accepts arguments of type ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerAddress2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function joinCustomerAddress2($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerAddress2');

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
            $this->addJoinObject($join, 'CustomerAddress2');
        }

        return $this;
    }

    /**
     * Use the CustomerAddress2 relation PacCustomer2Address object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery A secondary query class using the current class as primary query
     */
    public function useCustomerAddress2Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerAddress2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerAddress2', 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress|PropelObjectCollection $pacSalesOrderAddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderAddress($pacSalesOrderAddress, $comparison = null)
    {
        if ($pacSalesOrderAddress instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $pacSalesOrderAddress->getFkMiscRegion(), $comparison);
        } elseif ($pacSalesOrderAddress instanceof PropelObjectCollection) {
            return $this
                ->useSalesOrderAddressQuery()
                ->filterByPrimaryKeys($pacSalesOrderAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddress() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddress');

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
            $this->addJoinObject($join, 'SalesOrderAddress');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddress relation PacSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory|PropelObjectCollection $pacSalesOrderAddressHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderAddressHistory($pacSalesOrderAddressHistory, $comparison = null)
    {
        if ($pacSalesOrderAddressHistory instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $pacSalesOrderAddressHistory->getFkMiscRegion(), $comparison);
        } elseif ($pacSalesOrderAddressHistory instanceof PropelObjectCollection) {
            return $this
                ->useSalesOrderAddressHistoryQuery()
                ->filterByPrimaryKeys($pacSalesOrderAddressHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddressHistory() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddressHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddressHistory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddressHistory');

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
            $this->addJoinObject($join, 'SalesOrderAddressHistory');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddressHistory relation PacSalesOrderAddressHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressHistoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderAddressHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddressHistory', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion $pacMiscRegion Object to remove from the list of results
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery The current query, for fluid interface
     */
    public function prune($pacMiscRegion = null)
    {
        if ($pacMiscRegion) {
            $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $pacMiscRegion->getIdMiscRegion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
