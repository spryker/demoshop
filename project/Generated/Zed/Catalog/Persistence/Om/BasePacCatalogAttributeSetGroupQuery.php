<?php


/**
 * Base class that represents a query for the 'pac_catalog_attribute_set_group' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery orderByIdCatalogAttributeSetGroup($order = Criteria::ASC) Order by the id_catalog_attribute_set_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery orderByFkCatalogGroup($order = Criteria::ASC) Order by the fk_catalog_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery orderByFkCatalogValueType($order = Criteria::ASC) Order by the fk_catalog_value_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery groupByIdCatalogAttributeSetGroup() Group by the id_catalog_attribute_set_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery groupByFkCatalogGroup() Group by the fk_catalog_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery groupByFkCatalogValueType() Group by the fk_catalog_value_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery leftJoinGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Group relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery rightJoinGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Group relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery innerJoinGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery leftJoinValueType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery rightJoinValueType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery innerJoinValueType($relationAlias = null) Adds a INNER JOIN clause to the query using the ValueType relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup matching the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup matching the query, or a new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup findOneByFkCatalogGroup(int $fk_catalog_group) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup filtered by the fk_catalog_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup findOneByFkCatalogValueType(int $fk_catalog_value_type) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup filtered by the fk_catalog_value_type column
 *
 * @method array findByIdCatalogAttributeSetGroup(int $id_catalog_attribute_set_group) Return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects filtered by the id_catalog_attribute_set_group column
 * @method array findByFkCatalogGroup(int $fk_catalog_group) Return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects filtered by the fk_catalog_group column
 * @method array findByFkCatalogValueType(int $fk_catalog_value_type) Return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects filtered by the fk_catalog_value_type column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogAttributeSetGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BasePacCatalogAttributeSetGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery();
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogAttributeSetGroup($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_attribute_set_group`, `fk_catalog_group`, `fk_catalog_value_type` FROM `pac_catalog_attribute_set_group` WHERE `id_catalog_attribute_set_group` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_attribute_set_group column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogAttributeSetGroup(1234); // WHERE id_catalog_attribute_set_group = 1234
     * $query->filterByIdCatalogAttributeSetGroup(array(12, 34)); // WHERE id_catalog_attribute_set_group IN (12, 34)
     * $query->filterByIdCatalogAttributeSetGroup(array('min' => 12)); // WHERE id_catalog_attribute_set_group >= 12
     * $query->filterByIdCatalogAttributeSetGroup(array('max' => 12)); // WHERE id_catalog_attribute_set_group <= 12
     * </code>
     *
     * @param     mixed $idCatalogAttributeSetGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function filterByIdCatalogAttributeSetGroup($idCatalogAttributeSetGroup = null, $comparison = null)
    {
        if (is_array($idCatalogAttributeSetGroup)) {
            $useMinMax = false;
            if (isset($idCatalogAttributeSetGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $idCatalogAttributeSetGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogAttributeSetGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $idCatalogAttributeSetGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $idCatalogAttributeSetGroup, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogGroup(1234); // WHERE fk_catalog_group = 1234
     * $query->filterByFkCatalogGroup(array(12, 34)); // WHERE fk_catalog_group IN (12, 34)
     * $query->filterByFkCatalogGroup(array('min' => 12)); // WHERE fk_catalog_group >= 12
     * $query->filterByFkCatalogGroup(array('max' => 12)); // WHERE fk_catalog_group <= 12
     * </code>
     *
     * @see       filterByGroup()
     *
     * @param     mixed $fkCatalogGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function filterByFkCatalogGroup($fkCatalogGroup = null, $comparison = null)
    {
        if (is_array($fkCatalogGroup)) {
            $useMinMax = false;
            if (isset($fkCatalogGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_GROUP, $fkCatalogGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_GROUP, $fkCatalogGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_GROUP, $fkCatalogGroup, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_value_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogValueType(1234); // WHERE fk_catalog_value_type = 1234
     * $query->filterByFkCatalogValueType(array(12, 34)); // WHERE fk_catalog_value_type IN (12, 34)
     * $query->filterByFkCatalogValueType(array('min' => 12)); // WHERE fk_catalog_value_type >= 12
     * $query->filterByFkCatalogValueType(array('max' => 12)); // WHERE fk_catalog_value_type <= 12
     * </code>
     *
     * @see       filterByValueType()
     *
     * @param     mixed $fkCatalogValueType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function filterByFkCatalogValueType($fkCatalogValueType = null, $comparison = null)
    {
        if (is_array($fkCatalogValueType)) {
            $useMinMax = false;
            if (isset($fkCatalogValueType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogValueType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogGroup|PropelObjectCollection $pacCatalogGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGroup($pacCatalogGroup, $comparison = null)
    {
        if ($pacCatalogGroup instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_GROUP, $pacCatalogGroup->getIdCatalogGroup(), $comparison);
        } elseif ($pacCatalogGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_GROUP, $pacCatalogGroup->toKeyValue('PrimaryKey', 'IdCatalogGroup'), $comparison);
        } else {
            throw new PropelException('filterByGroup() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Group relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function joinGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Group');

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
            $this->addJoinObject($join, 'Group');
        }

        return $this;
    }

    /**
     * Use the Group relation PacCatalogGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery A secondary query class using the current class as primary query
     */
    public function useGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Group', 'ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogValueType|PropelObjectCollection $pacCatalogValueType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByValueType($pacCatalogValueType, $comparison = null)
    {
        if ($pacCatalogValueType instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogValueType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_VALUE_TYPE, $pacCatalogValueType->getIdCatalogValueType(), $comparison);
        } elseif ($pacCatalogValueType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::FK_CATALOG_VALUE_TYPE, $pacCatalogValueType->toKeyValue('PrimaryKey', 'IdCatalogValueType'), $comparison);
        } else {
            throw new PropelException('filterByValueType() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogValueType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ValueType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery A secondary query class using the current class as primary query
     */
    public function useValueTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinValueType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ValueType', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup $pacCatalogAttributeSetGroup Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery The current query, for fluid interface
     */
    public function prune($pacCatalogAttributeSetGroup = null)
    {
        if ($pacCatalogAttributeSetGroup) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupPeer::ID_CATALOG_ATTRIBUTE_SET_GROUP, $pacCatalogAttributeSetGroup->getIdCatalogAttributeSetGroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
