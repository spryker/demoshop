<?php


/**
 * Base class that represents a query for the 'pac_stock_attribute_value' table.
 *
 *
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery orderByIdStockAttributeValue($order = Criteria::ASC) Order by the id_stock_attribute_value column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery orderByFkStockAttribute($order = Criteria::ASC) Order by the fk_stock_attribute column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery orderByFkStock($order = Criteria::ASC) Order by the fk_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery groupByIdStockAttributeValue() Group by the id_stock_attribute_value column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery groupByFkStockAttribute() Group by the fk_stock_attribute column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery groupByFkStock() Group by the fk_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery leftJoinStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery rightJoinStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery innerJoinStock($relationAlias = null) Adds a INNER JOIN clause to the query using the Stock relation
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValue findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttributeValue matching the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValue findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttributeValue matching the query, or a new ProjectA_Zed_Stock_Persistence_PacStockAttributeValue object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValue findOneByValue(string $value) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttributeValue filtered by the value column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValue findOneByFkStockAttribute(int $fk_stock_attribute) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttributeValue filtered by the fk_stock_attribute column
 * @method ProjectA_Zed_Stock_Persistence_PacStockAttributeValue findOneByFkStock(int $fk_stock) Return the first ProjectA_Zed_Stock_Persistence_PacStockAttributeValue filtered by the fk_stock column
 *
 * @method array findByIdStockAttributeValue(int $id_stock_attribute_value) Return ProjectA_Zed_Stock_Persistence_PacStockAttributeValue objects filtered by the id_stock_attribute_value column
 * @method array findByValue(string $value) Return ProjectA_Zed_Stock_Persistence_PacStockAttributeValue objects filtered by the value column
 * @method array findByFkStockAttribute(int $fk_stock_attribute) Return ProjectA_Zed_Stock_Persistence_PacStockAttributeValue objects filtered by the fk_stock_attribute column
 * @method array findByFkStock(int $fk_stock) Return ProjectA_Zed_Stock_Persistence_PacStockAttributeValue objects filtered by the fk_stock column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.om
 */
abstract class Generated_Zed_Stock_Persistence_Om_BasePacStockAttributeValueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Stock_Persistence_Om_BasePacStockAttributeValueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Stock_Persistence_PacStockAttributeValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery();
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
     * @return   ProjectA_Zed_Stock_Persistence_PacStockAttributeValue|ProjectA_Zed_Stock_Persistence_PacStockAttributeValue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdStockAttributeValue($key, $con = null)
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_stock_attribute_value`, `value`, `fk_stock_attribute`, `fk_stock` FROM `pac_stock_attribute_value` WHERE `id_stock_attribute_value` = :p0';
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
            $obj = new ProjectA_Zed_Stock_Persistence_PacStockAttributeValue();
            $obj->hydrate($row);
            ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValue|ProjectA_Zed_Stock_Persistence_PacStockAttributeValue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockAttributeValue[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_stock_attribute_value column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStockAttributeValue(1234); // WHERE id_stock_attribute_value = 1234
     * $query->filterByIdStockAttributeValue(array(12, 34)); // WHERE id_stock_attribute_value IN (12, 34)
     * $query->filterByIdStockAttributeValue(array('min' => 12)); // WHERE id_stock_attribute_value >= 12
     * $query->filterByIdStockAttributeValue(array('max' => 12)); // WHERE id_stock_attribute_value <= 12
     * </code>
     *
     * @param     mixed $idStockAttributeValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByIdStockAttributeValue($idStockAttributeValue = null, $comparison = null)
    {
        if (is_array($idStockAttributeValue)) {
            $useMinMax = false;
            if (isset($idStockAttributeValue['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $idStockAttributeValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStockAttributeValue['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $idStockAttributeValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $idStockAttributeValue, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the fk_stock_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkStockAttribute(1234); // WHERE fk_stock_attribute = 1234
     * $query->filterByFkStockAttribute(array(12, 34)); // WHERE fk_stock_attribute IN (12, 34)
     * $query->filterByFkStockAttribute(array('min' => 12)); // WHERE fk_stock_attribute >= 12
     * $query->filterByFkStockAttribute(array('max' => 12)); // WHERE fk_stock_attribute <= 12
     * </code>
     *
     * @see       filterByAttribute()
     *
     * @param     mixed $fkStockAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkStockAttribute($fkStockAttribute = null, $comparison = null)
    {
        if (is_array($fkStockAttribute)) {
            $useMinMax = false;
            if (isset($fkStockAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK_ATTRIBUTE, $fkStockAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkStockAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK_ATTRIBUTE, $fkStockAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK_ATTRIBUTE, $fkStockAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByFkStock(1234); // WHERE fk_stock = 1234
     * $query->filterByFkStock(array(12, 34)); // WHERE fk_stock IN (12, 34)
     * $query->filterByFkStock(array('min' => 12)); // WHERE fk_stock >= 12
     * $query->filterByFkStock(array('max' => 12)); // WHERE fk_stock <= 12
     * </code>
     *
     * @see       filterByStock()
     *
     * @param     mixed $fkStock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkStock($fkStock = null, $comparison = null)
    {
        if (is_array($fkStock)) {
            $useMinMax = false;
            if (isset($fkStock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK, $fkStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkStock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK, $fkStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK, $fkStock, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_PacStockAttribute object
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttribute|PropelObjectCollection $pacStockAttribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacStockAttribute, $comparison = null)
    {
        if ($pacStockAttribute instanceof ProjectA_Zed_Stock_Persistence_PacStockAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK_ATTRIBUTE, $pacStockAttribute->getIdStockAttribute(), $comparison);
        } elseif ($pacStockAttribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK_ATTRIBUTE, $pacStockAttribute->toKeyValue('PrimaryKey', 'IdStockAttribute'), $comparison);
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Stock_Persistence_PacStockAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function joinAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Attribute');

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
            $this->addJoinObject($join, 'Attribute');
        }

        return $this;
    }

    /**
     * Use the Attribute relation PacStockAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Stock_Persistence_PacStockAttributeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_PacStock object
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStock|PropelObjectCollection $pacStock The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStock($pacStock, $comparison = null)
    {
        if ($pacStock instanceof ProjectA_Zed_Stock_Persistence_PacStock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK, $pacStock->getIdStock(), $comparison);
        } elseif ($pacStock instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::FK_STOCK, $pacStock->toKeyValue('PrimaryKey', 'IdStock'), $comparison);
        } else {
            throw new PropelException('filterByStock() only accepts arguments of type ProjectA_Zed_Stock_Persistence_PacStock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function joinStock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stock');

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
            $this->addJoinObject($join, 'Stock');
        }

        return $this;
    }

    /**
     * Use the Stock relation PacStock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_PacStockQuery A secondary query class using the current class as primary query
     */
    public function useStockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stock', 'ProjectA_Zed_Stock_Persistence_PacStockQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStockAttributeValue $pacStockAttributeValue Object to remove from the list of results
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockAttributeValueQuery The current query, for fluid interface
     */
    public function prune($pacStockAttributeValue = null)
    {
        if ($pacStockAttributeValue) {
            $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockAttributeValuePeer::ID_STOCK_ATTRIBUTE_VALUE, $pacStockAttributeValue->getIdStockAttributeValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
