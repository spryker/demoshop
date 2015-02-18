<?php


/**
 * Base class that represents a query for the 'pac_tax' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery orderByTaxId($order = Criteria::ASC) Order by the tax_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery orderByRate($order = Criteria::ASC) Order by the rate column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery orderByLocaleId($order = Criteria::ASC) Order by the locale_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery groupByTaxId() Group by the tax_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery groupByRate() Group by the rate column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery groupByLocaleId() Group by the locale_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery leftJoinPacLocalizedProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery rightJoinPacLocalizedProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery innerJoinPacLocalizedProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocalizedProductAttributes relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTax findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTax matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTax findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTax matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacTax object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTax findOneByRate(int $rate) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTax filtered by the rate column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTax findOneByLocaleId(int $locale_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTax filtered by the locale_id column
 *
 * @method array findByTaxId(int $tax_id) Return ProjectA_Zed_Product_Persistence_Propel_PacTax objects filtered by the tax_id column
 * @method array findByRate(int $rate) Return ProjectA_Zed_Product_Persistence_Propel_PacTax objects filtered by the rate column
 * @method array findByLocaleId(int $locale_id) Return ProjectA_Zed_Product_Persistence_Propel_PacTax objects filtered by the locale_id column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacTaxQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacTaxQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacTax']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacTax|ProjectA_Zed_Product_Persistence_Propel_PacTax[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTax A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTaxId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTax A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `tax_id`, `rate`, `locale_id` FROM `pac_tax` WHERE `tax_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacTax();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax|ProjectA_Zed_Product_Persistence_Propel_PacTax[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTax[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tax_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxId(1234); // WHERE tax_id = 1234
     * $query->filterByTaxId(array(12, 34)); // WHERE tax_id IN (12, 34)
     * $query->filterByTaxId(array('min' => 12)); // WHERE tax_id >= 12
     * $query->filterByTaxId(array('max' => 12)); // WHERE tax_id <= 12
     * </code>
     *
     * @param     mixed $taxId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function filterByTaxId($taxId = null, $comparison = null)
    {
        if (is_array($taxId)) {
            $useMinMax = false;
            if (isset($taxId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $taxId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $taxId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $taxId, $comparison);
    }

    /**
     * Filter the query on the rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate(1234); // WHERE rate = 1234
     * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
     * $query->filterByRate(array('min' => 12)); // WHERE rate >= 12
     * $query->filterByRate(array('max' => 12)); // WHERE rate <= 12
     * </code>
     *
     * @param     mixed $rate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (is_array($rate)) {
            $useMinMax = false;
            if (isset($rate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE, $rate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE, $rate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE, $rate, $comparison);
    }

    /**
     * Filter the query on the locale_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleId(1234); // WHERE locale_id = 1234
     * $query->filterByLocaleId(array(12, 34)); // WHERE locale_id IN (12, 34)
     * $query->filterByLocaleId(array('min' => 12)); // WHERE locale_id >= 12
     * $query->filterByLocaleId(array('max' => 12)); // WHERE locale_id <= 12
     * </code>
     *
     * @see       filterByLocale()
     *
     * @param     mixed $localeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function filterByLocaleId($localeId = null, $comparison = null)
    {
        if (is_array($localeId)) {
            $useMinMax = false;
            if (isset($localeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $localeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $localeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $localeId, $comparison);
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByLocale() only accepts arguments of type SprykerCore_Zed_Locale_Persistence_Propel_PacLocale or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Locale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Locale');

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
            $this->addJoinObject($join, 'Locale');
        }

        return $this;
    }

    /**
     * Use the Locale relation PacLocale object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery A secondary query class using the current class as primary query
     */
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes|PropelObjectCollection $pacLocalizedProductAttributes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocalizedProductAttributes($pacLocalizedProductAttributes, $comparison = null)
    {
        if ($pacLocalizedProductAttributes instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $pacLocalizedProductAttributes->getTaxId(), $comparison);
        } elseif ($pacLocalizedProductAttributes instanceof PropelObjectCollection) {
            return $this
                ->usePacLocalizedProductAttributesQuery()
                ->filterByPrimaryKeys($pacLocalizedProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacLocalizedProductAttributes() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacLocalizedProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function joinPacLocalizedProductAttributes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacLocalizedProductAttributes');

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
            $this->addJoinObject($join, 'PacLocalizedProductAttributes');
        }

        return $this;
    }

    /**
     * Use the PacLocalizedProductAttributes relation PacLocalizedProductAttributes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function usePacLocalizedProductAttributesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacLocalizedProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacLocalizedProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTax $pacTax Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery The current query, for fluid interface
     */
    public function prune($pacTax = null)
    {
        if ($pacTax) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $pacTax->getTaxId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
