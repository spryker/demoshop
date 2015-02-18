<?php


/**
 * Base class that represents a query for the 'pac_catalog_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery orderByIdCatalogAttribute($order = Criteria::ASC) Order by the id_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery groupByIdCatalogAttribute() Group by the id_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinValueType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinValueType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinValueType($relationAlias = null) Adds a INNER JOIN clause to the query using the ValueType relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinAttributeGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinAttributeGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinAttributeGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeGroup relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinOptionMulti($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinOptionMulti($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinOptionMulti($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionMulti relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinOptionSingle($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinOptionSingle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinOptionSingle($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionSingle relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinInteger($relationAlias = null) Adds a LEFT JOIN clause to the query using the Integer relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinInteger($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Integer relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinInteger($relationAlias = null) Adds a INNER JOIN clause to the query using the Integer relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinTimestamp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Timestamp relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinTimestamp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Timestamp relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinTimestamp($relationAlias = null) Adds a INNER JOIN clause to the query using the Timestamp relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinDecimal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Decimal relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinDecimal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Decimal relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinDecimal($relationAlias = null) Adds a INNER JOIN clause to the query using the Decimal relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinText($relationAlias = null) Adds a LEFT JOIN clause to the query using the Text relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinText($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Text relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinText($relationAlias = null) Adds a INNER JOIN clause to the query using the Text relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery leftJoinBoolean($relationAlias = null) Adds a LEFT JOIN clause to the query using the Boolean relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery rightJoinBoolean($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Boolean relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery innerJoinBoolean($relationAlias = null) Adds a INNER JOIN clause to the query using the Boolean relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute findOneByName(string $name) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute filtered by the name column
 *
 * @method array findByIdCatalogAttribute(int $id_catalog_attribute) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects filtered by the id_catalog_attribute column
 * @method array findByName(string $name) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects filtered by the name column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogAttributeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogAttribute']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogAttribute($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_attribute`, `name` FROM `pac_catalog_attribute` WHERE `id_catalog_attribute` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogAttribute(1234); // WHERE id_catalog_attribute = 1234
     * $query->filterByIdCatalogAttribute(array(12, 34)); // WHERE id_catalog_attribute IN (12, 34)
     * $query->filterByIdCatalogAttribute(array('min' => 12)); // WHERE id_catalog_attribute >= 12
     * $query->filterByIdCatalogAttribute(array('max' => 12)); // WHERE id_catalog_attribute <= 12
     * </code>
     *
     * @param     mixed $idCatalogAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function filterByIdCatalogAttribute($idCatalogAttribute = null, $comparison = null)
    {
        if (is_array($idCatalogAttribute)) {
            $useMinMax = false;
            if (isset($idCatalogAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $idCatalogAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $idCatalogAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $idCatalogAttribute, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType|PropelObjectCollection $pacCatalogValueType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByValueType($pacCatalogValueType, $comparison = null)
    {
        if ($pacCatalogValueType instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueType->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueType instanceof PropelObjectCollection) {
            return $this
                ->useValueTypeQuery()
                ->filterByPrimaryKeys($pacCatalogValueType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByValueType() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ValueType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinValueType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ValueType');

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
            $this->addJoinObject($join, 'ValueType');
        }

        return $this;
    }

    /**
     * Use the ValueType relation PacCatalogValueType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery A secondary query class using the current class as primary query
     */
    public function useValueTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinValueType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ValueType', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup|PropelObjectCollection $pacCatalogAttributeGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeGroup($pacCatalogAttributeGroup, $comparison = null)
    {
        if ($pacCatalogAttributeGroup instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogAttributeGroup->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogAttributeGroup instanceof PropelObjectCollection) {
            return $this
                ->useAttributeGroupQuery()
                ->filterByPrimaryKeys($pacCatalogAttributeGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeGroup() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinAttributeGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeGroup');

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
            $this->addJoinObject($join, 'AttributeGroup');
        }

        return $this;
    }

    /**
     * Use the AttributeGroup relation PacCatalogAttributeGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery A secondary query class using the current class as primary query
     */
    public function useAttributeGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeGroup', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti|PropelObjectCollection $pacCatalogValueOptionMulti  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionMulti($pacCatalogValueOptionMulti, $comparison = null)
    {
        if ($pacCatalogValueOptionMulti instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueOptionMulti->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueOptionMulti instanceof PropelObjectCollection) {
            return $this
                ->useOptionMultiQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionMulti->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionMulti() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionMulti relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinOptionMulti($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionMulti');

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
            $this->addJoinObject($join, 'OptionMulti');
        }

        return $this;
    }

    /**
     * Use the OptionMulti relation PacCatalogValueOptionMulti object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery A secondary query class using the current class as primary query
     */
    public function useOptionMultiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionMulti($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionMulti', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle|PropelObjectCollection $pacCatalogValueOptionSingle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionSingle($pacCatalogValueOptionSingle, $comparison = null)
    {
        if ($pacCatalogValueOptionSingle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueOptionSingle->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueOptionSingle instanceof PropelObjectCollection) {
            return $this
                ->useOptionSingleQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionSingle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionSingle() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionSingle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinOptionSingle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionSingle');

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
            $this->addJoinObject($join, 'OptionSingle');
        }

        return $this;
    }

    /**
     * Use the OptionSingle relation PacCatalogValueOptionSingle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery A secondary query class using the current class as primary query
     */
    public function useOptionSingleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionSingle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionSingle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger|PropelObjectCollection $pacCatalogValueInteger  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInteger($pacCatalogValueInteger, $comparison = null)
    {
        if ($pacCatalogValueInteger instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueInteger->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueInteger instanceof PropelObjectCollection) {
            return $this
                ->useIntegerQuery()
                ->filterByPrimaryKeys($pacCatalogValueInteger->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInteger() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Integer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinInteger($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Integer');

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
            $this->addJoinObject($join, 'Integer');
        }

        return $this;
    }

    /**
     * Use the Integer relation PacCatalogValueInteger object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery A secondary query class using the current class as primary query
     */
    public function useIntegerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInteger($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Integer', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp|PropelObjectCollection $pacCatalogValueTimestamp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTimestamp($pacCatalogValueTimestamp, $comparison = null)
    {
        if ($pacCatalogValueTimestamp instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueTimestamp->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueTimestamp instanceof PropelObjectCollection) {
            return $this
                ->useTimestampQuery()
                ->filterByPrimaryKeys($pacCatalogValueTimestamp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTimestamp() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Timestamp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinTimestamp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Timestamp');

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
            $this->addJoinObject($join, 'Timestamp');
        }

        return $this;
    }

    /**
     * Use the Timestamp relation PacCatalogValueTimestamp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery A secondary query class using the current class as primary query
     */
    public function useTimestampQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTimestamp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Timestamp', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal|PropelObjectCollection $pacCatalogValueDecimal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDecimal($pacCatalogValueDecimal, $comparison = null)
    {
        if ($pacCatalogValueDecimal instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueDecimal->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueDecimal instanceof PropelObjectCollection) {
            return $this
                ->useDecimalQuery()
                ->filterByPrimaryKeys($pacCatalogValueDecimal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDecimal() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Decimal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinDecimal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Decimal');

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
            $this->addJoinObject($join, 'Decimal');
        }

        return $this;
    }

    /**
     * Use the Decimal relation PacCatalogValueDecimal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery A secondary query class using the current class as primary query
     */
    public function useDecimalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDecimal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Decimal', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText|PropelObjectCollection $pacCatalogValueText  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByText($pacCatalogValueText, $comparison = null)
    {
        if ($pacCatalogValueText instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueText->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueText instanceof PropelObjectCollection) {
            return $this
                ->useTextQuery()
                ->filterByPrimaryKeys($pacCatalogValueText->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByText() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Text relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinText($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Text');

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
            $this->addJoinObject($join, 'Text');
        }

        return $this;
    }

    /**
     * Use the Text relation PacCatalogValueText object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery A secondary query class using the current class as primary query
     */
    public function useTextQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinText($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Text', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean|PropelObjectCollection $pacCatalogValueBoolean  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBoolean($pacCatalogValueBoolean, $comparison = null)
    {
        if ($pacCatalogValueBoolean instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogValueBoolean->getFkCatalogAttribute(), $comparison);
        } elseif ($pacCatalogValueBoolean instanceof PropelObjectCollection) {
            return $this
                ->useBooleanQuery()
                ->filterByPrimaryKeys($pacCatalogValueBoolean->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBoolean() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Boolean relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function joinBoolean($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Boolean');

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
            $this->addJoinObject($join, 'Boolean');
        }

        return $this;
    }

    /**
     * Use the Boolean relation PacCatalogValueBoolean object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery A secondary query class using the current class as primary query
     */
    public function useBooleanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBoolean($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Boolean', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery');
    }

    /**
     * Filter the query by a related PacCatalogGroup object
     * using the pac_catalog_attribute_group table as cross reference
     *
     * @param   PacCatalogGroup $pacCatalogGroup the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function filterByGroup($pacCatalogGroup, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAttributeGroupQuery()
            ->filterByGroup($pacCatalogGroup, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $pacCatalogAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery The current query, for fluid interface
     */
    public function prune($pacCatalogAttribute = null)
    {
        if ($pacCatalogAttribute) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $pacCatalogAttribute->getIdCatalogAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
