<?php


/**
 * Base class that represents a query for the 'pac_price_attribute_value' table.
 *
 *
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery orderByIdPriceAttributeValue($order = Criteria::ASC) Order by the id_price_attribute_value column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery orderByFkPriceType($order = Criteria::ASC) Order by the fk_price_type column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery orderByFkPriceAttribute($order = Criteria::ASC) Order by the fk_price_attribute column
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery groupByIdPriceAttributeValue() Group by the id_price_attribute_value column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery groupByFkPriceType() Group by the fk_price_type column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery groupByFkPriceAttribute() Group by the fk_price_attribute column
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery leftJoinPriceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceType relation
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery rightJoinPriceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceType relation
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery innerJoinPriceType($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceType relation
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValue findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_PacPriceAttributeValue matching the query
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValue findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_PacPriceAttributeValue matching the query, or a new ProjectA_Zed_Price_Persistence_PacPriceAttributeValue object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValue findOneByValue(string $value) Return the first ProjectA_Zed_Price_Persistence_PacPriceAttributeValue filtered by the value column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValue findOneByFkPriceType(int $fk_price_type) Return the first ProjectA_Zed_Price_Persistence_PacPriceAttributeValue filtered by the fk_price_type column
 * @method ProjectA_Zed_Price_Persistence_PacPriceAttributeValue findOneByFkPriceAttribute(int $fk_price_attribute) Return the first ProjectA_Zed_Price_Persistence_PacPriceAttributeValue filtered by the fk_price_attribute column
 *
 * @method array findByIdPriceAttributeValue(int $id_price_attribute_value) Return ProjectA_Zed_Price_Persistence_PacPriceAttributeValue objects filtered by the id_price_attribute_value column
 * @method array findByValue(string $value) Return ProjectA_Zed_Price_Persistence_PacPriceAttributeValue objects filtered by the value column
 * @method array findByFkPriceType(int $fk_price_type) Return ProjectA_Zed_Price_Persistence_PacPriceAttributeValue objects filtered by the fk_price_type column
 * @method array findByFkPriceAttribute(int $fk_price_attribute) Return ProjectA_Zed_Price_Persistence_PacPriceAttributeValue objects filtered by the fk_price_attribute column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Price/Persistence.om
 */
abstract class Generated_Zed_Price_Persistence_Om_BasePacPriceAttributeValueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Price_Persistence_Om_BasePacPriceAttributeValueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Price_Persistence_PacPriceAttributeValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery();
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
     * @return   ProjectA_Zed_Price_Persistence_PacPriceAttributeValue|ProjectA_Zed_Price_Persistence_PacPriceAttributeValue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Price_Persistence_PacPriceAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPriceAttributeValue($key, $con = null)
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
     * @return                 ProjectA_Zed_Price_Persistence_PacPriceAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_price_attribute_value`, `value`, `fk_price_type`, `fk_price_attribute` FROM `pac_price_attribute_value` WHERE `id_price_attribute_value` = :p0';
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
            $obj = new ProjectA_Zed_Price_Persistence_PacPriceAttributeValue();
            $obj->hydrate($row);
            ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValue|ProjectA_Zed_Price_Persistence_PacPriceAttributeValue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Price_Persistence_PacPriceAttributeValue[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_price_attribute_value column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPriceAttributeValue(1234); // WHERE id_price_attribute_value = 1234
     * $query->filterByIdPriceAttributeValue(array(12, 34)); // WHERE id_price_attribute_value IN (12, 34)
     * $query->filterByIdPriceAttributeValue(array('min' => 12)); // WHERE id_price_attribute_value >= 12
     * $query->filterByIdPriceAttributeValue(array('max' => 12)); // WHERE id_price_attribute_value <= 12
     * </code>
     *
     * @param     mixed $idPriceAttributeValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function filterByIdPriceAttributeValue($idPriceAttributeValue = null, $comparison = null)
    {
        if (is_array($idPriceAttributeValue)) {
            $useMinMax = false;
            if (isset($idPriceAttributeValue['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $idPriceAttributeValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPriceAttributeValue['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $idPriceAttributeValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $idPriceAttributeValue, $comparison);
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
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::VALUE, $value, $comparison);
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
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkPriceType($fkPriceType = null, $comparison = null)
    {
        if (is_array($fkPriceType)) {
            $useMinMax = false;
            if (isset($fkPriceType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_TYPE, $fkPriceType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPriceType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_TYPE, $fkPriceType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_TYPE, $fkPriceType, $comparison);
    }

    /**
     * Filter the query on the fk_price_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPriceAttribute(1234); // WHERE fk_price_attribute = 1234
     * $query->filterByFkPriceAttribute(array(12, 34)); // WHERE fk_price_attribute IN (12, 34)
     * $query->filterByFkPriceAttribute(array('min' => 12)); // WHERE fk_price_attribute >= 12
     * $query->filterByFkPriceAttribute(array('max' => 12)); // WHERE fk_price_attribute <= 12
     * </code>
     *
     * @see       filterByAttribute()
     *
     * @param     mixed $fkPriceAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkPriceAttribute($fkPriceAttribute = null, $comparison = null)
    {
        if (is_array($fkPriceAttribute)) {
            $useMinMax = false;
            if (isset($fkPriceAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_ATTRIBUTE, $fkPriceAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPriceAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_ATTRIBUTE, $fkPriceAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_ATTRIBUTE, $fkPriceAttribute, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Price_Persistence_PacPriceType object
     *
     * @param   ProjectA_Zed_Price_Persistence_PacPriceType|PropelObjectCollection $pacPriceType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPriceType($pacPriceType, $comparison = null)
    {
        if ($pacPriceType instanceof ProjectA_Zed_Price_Persistence_PacPriceType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_TYPE, $pacPriceType->getIdPriceType(), $comparison);
        } elseif ($pacPriceType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_TYPE, $pacPriceType->toKeyValue('PrimaryKey', 'IdPriceType'), $comparison);
        } else {
            throw new PropelException('filterByPriceType() only accepts arguments of type ProjectA_Zed_Price_Persistence_PacPriceType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PriceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Price_Persistence_PacPriceTypeQuery A secondary query class using the current class as primary query
     */
    public function usePriceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPriceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PriceType', 'ProjectA_Zed_Price_Persistence_PacPriceTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Price_Persistence_PacPriceAttribute object
     *
     * @param   ProjectA_Zed_Price_Persistence_PacPriceAttribute|PropelObjectCollection $pacPriceAttribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacPriceAttribute, $comparison = null)
    {
        if ($pacPriceAttribute instanceof ProjectA_Zed_Price_Persistence_PacPriceAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_ATTRIBUTE, $pacPriceAttribute->getIdPriceAttribute(), $comparison);
        } elseif ($pacPriceAttribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::FK_PRICE_ATTRIBUTE, $pacPriceAttribute->toKeyValue('PrimaryKey', 'IdPriceAttribute'), $comparison);
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Price_Persistence_PacPriceAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
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
     * Use the Attribute relation PacPriceAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Price_Persistence_PacPriceAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Price_Persistence_PacPriceAttributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Price_Persistence_PacPriceAttributeValue $pacPriceAttributeValue Object to remove from the list of results
     *
     * @return ProjectA_Zed_Price_Persistence_PacPriceAttributeValueQuery The current query, for fluid interface
     */
    public function prune($pacPriceAttributeValue = null)
    {
        if ($pacPriceAttributeValue) {
            $this->addUsingAlias(ProjectA_Zed_Price_Persistence_PacPriceAttributeValuePeer::ID_PRICE_ATTRIBUTE_VALUE, $pacPriceAttributeValue->getIdPriceAttributeValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
