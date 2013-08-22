<?php


/**
 * Base class that represents a query for the 'pac_category_attribute_key' table.
 *
 *
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery orderByIdCategoryAttributeKey($order = Criteria::ASC) Order by the id_category_attribute_key column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery orderByFkCategoryScope($order = Criteria::ASC) Order by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery orderByConfig($order = Criteria::ASC) Order by the config column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery groupByIdCategoryAttributeKey() Group by the id_category_attribute_key column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery groupByFkCategoryScope() Group by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery groupByConfig() Group by the config column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery leftJoinScope($relationAlias = null) Adds a LEFT JOIN clause to the query using the Scope relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery rightJoinScope($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Scope relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery innerJoinScope($relationAlias = null) Adds a INNER JOIN clause to the query using the Scope relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey matching the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey matching the query, or a new ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOneByFkCategoryScope(int $fk_category_scope) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey filtered by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOneByName(string $name) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey filtered by the name column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOneByType(string $type) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey filtered by the type column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey findOneByConfig(string $config) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey filtered by the config column
 *
 * @method array findByIdCategoryAttributeKey(int $id_category_attribute_key) Return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects filtered by the id_category_attribute_key column
 * @method array findByFkCategoryScope(int $fk_category_scope) Return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects filtered by the fk_category_scope column
 * @method array findByName(string $name) Return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects filtered by the name column
 * @method array findByType(string $type) Return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects filtered by the type column
 * @method array findByConfig(string $config) Return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects filtered by the config column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategoryAttributeKeyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Om_BasePacCategoryAttributeKeyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery();
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
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey|ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryAttributeKey($key, $con = null)
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_attribute_key`, `fk_category_scope`, `name`, `type`, `config` FROM `pac_category_attribute_key` WHERE `id_category_attribute_key` = :p0';
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
            $obj = new ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey();
            $obj->hydrate($row);
            ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey|ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_attribute_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryAttributeKey(1234); // WHERE id_category_attribute_key = 1234
     * $query->filterByIdCategoryAttributeKey(array(12, 34)); // WHERE id_category_attribute_key IN (12, 34)
     * $query->filterByIdCategoryAttributeKey(array('min' => 12)); // WHERE id_category_attribute_key >= 12
     * $query->filterByIdCategoryAttributeKey(array('max' => 12)); // WHERE id_category_attribute_key <= 12
     * </code>
     *
     * @param     mixed $idCategoryAttributeKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByIdCategoryAttributeKey($idCategoryAttributeKey = null, $comparison = null)
    {
        if (is_array($idCategoryAttributeKey)) {
            $useMinMax = false;
            if (isset($idCategoryAttributeKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $idCategoryAttributeKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryAttributeKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $idCategoryAttributeKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $idCategoryAttributeKey, $comparison);
    }

    /**
     * Filter the query on the fk_category_scope column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryScope(1234); // WHERE fk_category_scope = 1234
     * $query->filterByFkCategoryScope(array(12, 34)); // WHERE fk_category_scope IN (12, 34)
     * $query->filterByFkCategoryScope(array('min' => 12)); // WHERE fk_category_scope >= 12
     * $query->filterByFkCategoryScope(array('max' => 12)); // WHERE fk_category_scope <= 12
     * </code>
     *
     * @see       filterByScope()
     *
     * @param     mixed $fkCategoryScope The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByFkCategoryScope($fkCategoryScope = null, $comparison = null)
    {
        if (is_array($fkCategoryScope)) {
            $useMinMax = false;
            if (isset($fkCategoryScope['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::FK_CATEGORY_SCOPE, $fkCategoryScope['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryScope['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::FK_CATEGORY_SCOPE, $fkCategoryScope['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::FK_CATEGORY_SCOPE, $fkCategoryScope, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the config column
     *
     * Example usage:
     * <code>
     * $query->filterByConfig('fooValue');   // WHERE config = 'fooValue'
     * $query->filterByConfig('%fooValue%'); // WHERE config LIKE '%fooValue%'
     * </code>
     *
     * @param     string $config The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function filterByConfig($config = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($config)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $config)) {
                $config = str_replace('*', '%', $config);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::CONFIG, $config, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryScope object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryScope|PropelObjectCollection $pacCategoryScope The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByScope($pacCategoryScope, $comparison = null)
    {
        if ($pacCategoryScope instanceof ProjectA_Zed_Category_Persistence_PacCategoryScope) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::FK_CATEGORY_SCOPE, $pacCategoryScope->getIdCategoryScope(), $comparison);
        } elseif ($pacCategoryScope instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::FK_CATEGORY_SCOPE, $pacCategoryScope->toKeyValue('PrimaryKey', 'IdCategoryScope'), $comparison);
        } else {
            throw new PropelException('filterByScope() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryScope or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Scope relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function joinScope($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Scope');

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
            $this->addJoinObject($join, 'Scope');
        }

        return $this;
    }

    /**
     * Use the Scope relation PacCategoryScope object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery A secondary query class using the current class as primary query
     */
    public function useScopeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinScope($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Scope', 'ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryAttribute object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttribute|PropelObjectCollection $pacCategoryAttribute  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacCategoryAttribute, $comparison = null)
    {
        if ($pacCategoryAttribute instanceof ProjectA_Zed_Category_Persistence_PacCategoryAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $pacCategoryAttribute->getFkCategoryAttributeKey(), $comparison);
        } elseif ($pacCategoryAttribute instanceof PropelObjectCollection) {
            return $this
                ->useAttributeQuery()
                ->filterByPrimaryKeys($pacCategoryAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
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
     * Use the Attribute relation PacCategoryAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey $pacCategoryAttributeKey Object to remove from the list of results
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery The current query, for fluid interface
     */
    public function prune($pacCategoryAttributeKey = null)
    {
        if ($pacCategoryAttributeKey) {
            $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyPeer::ID_CATEGORY_ATTRIBUTE_KEY, $pacCategoryAttributeKey->getIdCategoryAttributeKey(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
