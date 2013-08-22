<?php


/**
 * Base class that represents a query for the 'pac_catalog_group' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery orderByIdCatalogGroup($order = Criteria::ASC) Order by the id_catalog_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery groupByIdCatalogGroup() Group by the id_catalog_group column
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery leftJoinAttributeGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery rightJoinAttributeGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery innerJoinAttributeGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeGroup relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery leftJoinAttributeSetGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeSetGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery rightJoinAttributeSetGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeSetGroup relation
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery innerJoinAttributeSetGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeSetGroup relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroup findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogGroup matching the query
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroup findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogGroup matching the query, or a new ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_PacCatalogGroup findOneByName(string $name) Return the first ProjectA_Zed_Catalog_Persistence_PacCatalogGroup filtered by the name column
 *
 * @method array findByIdCatalogGroup(int $id_catalog_group) Return ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects filtered by the id_catalog_group column
 * @method array findByName(string $name) Return ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BasePacCatalogGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Catalog_Persistence_PacCatalogGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery();
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogGroup|ProjectA_Zed_Catalog_Persistence_PacCatalogGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogGroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogGroup($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogGroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_group`, `name` FROM `pac_catalog_group` WHERE `id_catalog_group` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_PacCatalogGroup();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroup|ProjectA_Zed_Catalog_Persistence_PacCatalogGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_group column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogGroup(1234); // WHERE id_catalog_group = 1234
     * $query->filterByIdCatalogGroup(array(12, 34)); // WHERE id_catalog_group IN (12, 34)
     * $query->filterByIdCatalogGroup(array('min' => 12)); // WHERE id_catalog_group >= 12
     * $query->filterByIdCatalogGroup(array('max' => 12)); // WHERE id_catalog_group <= 12
     * </code>
     *
     * @param     mixed $idCatalogGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function filterByIdCatalogGroup($idCatalogGroup = null, $comparison = null)
    {
        if (is_array($idCatalogGroup)) {
            $useMinMax = false;
            if (isset($idCatalogGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $idCatalogGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $idCatalogGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $idCatalogGroup, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup|PropelObjectCollection $pacCatalogAttributeGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeGroup($pacCatalogAttributeGroup, $comparison = null)
    {
        if ($pacCatalogAttributeGroup instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $pacCatalogAttributeGroup->getFkCatalogGroup(), $comparison);
        } elseif ($pacCatalogAttributeGroup instanceof PropelObjectCollection) {
            return $this
                ->useAttributeGroupQuery()
                ->filterByPrimaryKeys($pacCatalogAttributeGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeGroup() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery A secondary query class using the current class as primary query
     */
    public function useAttributeGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeGroup', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup|PropelObjectCollection $pacCatalogAttributeSetGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeSetGroup($pacCatalogAttributeSetGroup, $comparison = null)
    {
        if ($pacCatalogAttributeSetGroup instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $pacCatalogAttributeSetGroup->getFkCatalogGroup(), $comparison);
        } elseif ($pacCatalogAttributeSetGroup instanceof PropelObjectCollection) {
            return $this
                ->useAttributeSetGroupQuery()
                ->filterByPrimaryKeys($pacCatalogAttributeSetGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeSetGroup() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeSetGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery A secondary query class using the current class as primary query
     */
    public function useAttributeSetGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeSetGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeSetGroup', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery');
    }

    /**
     * Filter the query by a related PacCatalogAttribute object
     * using the pac_catalog_attribute_group table as cross reference
     *
     * @param   PacCatalogAttribute $pacCatalogAttribute the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function filterByAttribute($pacCatalogAttribute, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAttributeGroupQuery()
            ->filterByAttribute($pacCatalogAttribute, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related PacCatalogValueType object
     * using the pac_catalog_attribute_set_group table as cross reference
     *
     * @param   PacCatalogValueType $pacCatalogValueType the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function filterByValueType($pacCatalogValueType, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useAttributeSetGroupQuery()
            ->filterByValueType($pacCatalogValueType, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery The current query, for fluid interface
     */
    public function prune($pacCatalogGroup = null)
    {
        if ($pacCatalogGroup) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_PacCatalogGroupPeer::ID_CATALOG_GROUP, $pacCatalogGroup->getIdCatalogGroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
