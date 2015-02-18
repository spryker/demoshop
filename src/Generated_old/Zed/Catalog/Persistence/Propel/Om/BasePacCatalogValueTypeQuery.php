<?php


/**
 * Base class that represents a query for the 'pac_catalog_value_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery orderByIdCatalogValueType($order = Criteria::ASC) Order by the id_catalog_value_type column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery orderByFkCatalogAttribute($order = Criteria::ASC) Order by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery orderByFkCatalogAttributeSet($order = Criteria::ASC) Order by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery orderByVariety($order = Criteria::ASC) Order by the variety column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery groupByIdCatalogValueType() Group by the id_catalog_value_type column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery groupByFkCatalogAttribute() Group by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery groupByFkCatalogAttributeSet() Group by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery groupByVariety() Group by the variety column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery leftJoinAttributeSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeSet relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery rightJoinAttributeSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeSet relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery innerJoinAttributeSet($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeSet relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery leftJoinAttributeSetGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeSetGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery rightJoinAttributeSetGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeSetGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery innerJoinAttributeSetGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeSetGroup relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType findOneByFkCatalogAttribute(int $fk_catalog_attribute) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType filtered by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType findOneByFkCatalogAttributeSet(int $fk_catalog_attribute_set) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType filtered by the fk_catalog_attribute_set column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType findOneByVariety(string $variety) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType filtered by the variety column
 *
 * @method array findByIdCatalogValueType(int $id_catalog_value_type) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects filtered by the id_catalog_value_type column
 * @method array findByFkCatalogAttribute(int $fk_catalog_attribute) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects filtered by the fk_catalog_attribute column
 * @method array findByFkCatalogAttributeSet(int $fk_catalog_attribute_set) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects filtered by the fk_catalog_attribute_set column
 * @method array findByVariety(string $variety) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects filtered by the variety column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueTypeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogValueType']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogValueType($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_value_type`, `fk_catalog_attribute`, `fk_catalog_attribute_set`, `variety` FROM `pac_catalog_value_type` WHERE `id_catalog_value_type` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_value_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogValueType(1234); // WHERE id_catalog_value_type = 1234
     * $query->filterByIdCatalogValueType(array(12, 34)); // WHERE id_catalog_value_type IN (12, 34)
     * $query->filterByIdCatalogValueType(array('min' => 12)); // WHERE id_catalog_value_type >= 12
     * $query->filterByIdCatalogValueType(array('max' => 12)); // WHERE id_catalog_value_type <= 12
     * </code>
     *
     * @param     mixed $idCatalogValueType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByIdCatalogValueType($idCatalogValueType = null, $comparison = null)
    {
        if (is_array($idCatalogValueType)) {
            $useMinMax = false;
            if (isset($idCatalogValueType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $idCatalogValueType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogValueType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $idCatalogValueType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $idCatalogValueType, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogAttribute(1234); // WHERE fk_catalog_attribute = 1234
     * $query->filterByFkCatalogAttribute(array(12, 34)); // WHERE fk_catalog_attribute IN (12, 34)
     * $query->filterByFkCatalogAttribute(array('min' => 12)); // WHERE fk_catalog_attribute >= 12
     * $query->filterByFkCatalogAttribute(array('max' => 12)); // WHERE fk_catalog_attribute <= 12
     * </code>
     *
     * @see       filterByAttribute()
     *
     * @param     mixed $fkCatalogAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByFkCatalogAttribute($fkCatalogAttribute = null, $comparison = null)
    {
        if (is_array($fkCatalogAttribute)) {
            $useMinMax = false;
            if (isset($fkCatalogAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_attribute_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogAttributeSet(1234); // WHERE fk_catalog_attribute_set = 1234
     * $query->filterByFkCatalogAttributeSet(array(12, 34)); // WHERE fk_catalog_attribute_set IN (12, 34)
     * $query->filterByFkCatalogAttributeSet(array('min' => 12)); // WHERE fk_catalog_attribute_set >= 12
     * $query->filterByFkCatalogAttributeSet(array('max' => 12)); // WHERE fk_catalog_attribute_set <= 12
     * </code>
     *
     * @see       filterByAttributeSet()
     *
     * @param     mixed $fkCatalogAttributeSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByFkCatalogAttributeSet($fkCatalogAttributeSet = null, $comparison = null)
    {
        if (is_array($fkCatalogAttributeSet)) {
            $useMinMax = false;
            if (isset($fkCatalogAttributeSet['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogAttributeSet['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $fkCatalogAttributeSet, $comparison);
    }

    /**
     * Filter the query on the variety column
     *
     * Example usage:
     * <code>
     * $query->filterByVariety('fooValue');   // WHERE variety = 'fooValue'
     * $query->filterByVariety('%fooValue%'); // WHERE variety LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variety The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByVariety($variety = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variety)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variety)) {
                $variety = str_replace('*', '%', $variety);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::VARIETY, $variety, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute|PropelObjectCollection $pacCatalogAttribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacCatalogAttribute, $comparison = null)
    {
        if ($pacCatalogAttribute instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $pacCatalogAttribute->getIdCatalogAttribute(), $comparison);
        } elseif ($pacCatalogAttribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $pacCatalogAttribute->toKeyValue('PrimaryKey', 'IdCatalogAttribute'), $comparison);
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
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
     * Use the Attribute relation PacCatalogAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet|PropelObjectCollection $pacCatalogAttributeSet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeSet($pacCatalogAttributeSet, $comparison = null)
    {
        if ($pacCatalogAttributeSet instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $pacCatalogAttributeSet->getIdCatalogAttributeSet(), $comparison);
        } elseif ($pacCatalogAttributeSet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $pacCatalogAttributeSet->toKeyValue('PrimaryKey', 'IdCatalogAttributeSet'), $comparison);
        } else {
            throw new PropelException('filterByAttributeSet() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function joinAttributeSet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeSet');

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
            $this->addJoinObject($join, 'AttributeSet');
        }

        return $this;
    }

    /**
     * Use the AttributeSet relation PacCatalogAttributeSet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery A secondary query class using the current class as primary query
     */
    public function useAttributeSetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeSet', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup|PropelObjectCollection $pacCatalogAttributeSetGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeSetGroup($pacCatalogAttributeSetGroup, $comparison = null)
    {
        if ($pacCatalogAttributeSetGroup instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $pacCatalogAttributeSetGroup->getFkCatalogValueType(), $comparison);
        } elseif ($pacCatalogAttributeSetGroup instanceof PropelObjectCollection) {
            return $this
                ->useAttributeSetGroupQuery()
                ->filterByPrimaryKeys($pacCatalogAttributeSetGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeSetGroup() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeSetGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function joinAttributeSetGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeSetGroup');

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
            $this->addJoinObject($join, 'AttributeSetGroup');
        }

        return $this;
    }

    /**
     * Use the AttributeSetGroup relation PacCatalogAttributeSetGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery A secondary query class using the current class as primary query
     */
    public function useAttributeSetGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeSetGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeSetGroup', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption|PropelObjectCollection $pacCatalogValueOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacCatalogValueOption, $comparison = null)
    {
        if ($pacCatalogValueOption instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $pacCatalogValueOption->getFkCatalogValueType(), $comparison);
        } elseif ($pacCatalogValueOption instanceof PropelObjectCollection) {
            return $this
                ->useOptionQuery()
                ->filterByPrimaryKeys($pacCatalogValueOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
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
     * Use the Option relation PacCatalogValueOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery');
    }

    /**
     * Filter the query by a related PacCatalogGroup object
     * using the pac_catalog_attribute_set_group table as cross reference
     *
     * @param   PacCatalogGroup $pacCatalogGroup the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function filterByGroup($pacCatalogGroup, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAttributeSetGroupQuery()
            ->filterByGroup($pacCatalogGroup, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $pacCatalogValueType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery The current query, for fluid interface
     */
    public function prune($pacCatalogValueType = null)
    {
        if ($pacCatalogValueType) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $pacCatalogValueType->getIdCatalogValueType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
