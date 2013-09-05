<?php


/**
 * Base class that represents a query for the 'pac_category_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery orderByIdCategoryAttribute($order = Criteria::ASC) Order by the id_category_attribute column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery orderByFkCategoryAttributeKey($order = Criteria::ASC) Order by the fk_category_attribute_key column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery groupByIdCategoryAttribute() Group by the id_category_attribute column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery groupByFkCategory() Group by the fk_category column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery groupByFkCategoryAttributeKey() Group by the fk_category_attribute_key column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery groupByValue() Group by the value column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery leftJoinAttributeKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeKey relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery rightJoinAttributeKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeKey relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery innerJoinAttributeKey($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeKey relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttribute matching the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttribute matching the query, or a new ProjectA_Zed_Category_Persistence_PacCategoryAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttribute findOneByFkCategory(int $fk_category) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttribute filtered by the fk_category column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttribute findOneByFkCategoryAttributeKey(int $fk_category_attribute_key) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttribute filtered by the fk_category_attribute_key column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryAttribute findOneByValue(string $value) Return the first ProjectA_Zed_Category_Persistence_PacCategoryAttribute filtered by the value column
 *
 * @method array findByIdCategoryAttribute(int $id_category_attribute) Return ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects filtered by the id_category_attribute column
 * @method array findByFkCategory(int $fk_category) Return ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects filtered by the fk_category column
 * @method array findByFkCategoryAttributeKey(int $fk_category_attribute_key) Return ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects filtered by the fk_category_attribute_key column
 * @method array findByValue(string $value) Return ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects filtered by the value column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategoryAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Om_BasePacCategoryAttributeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Category_Persistence_PacCategoryAttribute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery();
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
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryAttribute|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryAttribute($key, $con = null)
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_attribute`, `fk_category`, `fk_category_attribute_key`, `value` FROM `pac_category_attribute` WHERE `id_category_attribute` = :p0';
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
            $obj = new ProjectA_Zed_Category_Persistence_PacCategoryAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttribute|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryAttribute(1234); // WHERE id_category_attribute = 1234
     * $query->filterByIdCategoryAttribute(array(12, 34)); // WHERE id_category_attribute IN (12, 34)
     * $query->filterByIdCategoryAttribute(array('min' => 12)); // WHERE id_category_attribute >= 12
     * $query->filterByIdCategoryAttribute(array('max' => 12)); // WHERE id_category_attribute <= 12
     * </code>
     *
     * @param     mixed $idCategoryAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryAttribute($idCategoryAttribute = null, $comparison = null)
    {
        if (is_array($idCategoryAttribute)) {
            $useMinMax = false;
            if (isset($idCategoryAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategory(1234); // WHERE fk_category = 1234
     * $query->filterByFkCategory(array(12, 34)); // WHERE fk_category IN (12, 34)
     * $query->filterByFkCategory(array('min' => 12)); // WHERE fk_category >= 12
     * $query->filterByFkCategory(array('max' => 12)); // WHERE fk_category <= 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $fkCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY, $fkCategory, $comparison);
    }

    /**
     * Filter the query on the fk_category_attribute_key column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryAttributeKey(1234); // WHERE fk_category_attribute_key = 1234
     * $query->filterByFkCategoryAttributeKey(array(12, 34)); // WHERE fk_category_attribute_key IN (12, 34)
     * $query->filterByFkCategoryAttributeKey(array('min' => 12)); // WHERE fk_category_attribute_key >= 12
     * $query->filterByFkCategoryAttributeKey(array('max' => 12)); // WHERE fk_category_attribute_key <= 12
     * </code>
     *
     * @see       filterByAttributeKey()
     *
     * @param     mixed $fkCategoryAttributeKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByFkCategoryAttributeKey($fkCategoryAttributeKey = null, $comparison = null)
    {
        if (is_array($fkCategoryAttributeKey)) {
            $useMinMax = false;
            if (isset($fkCategoryAttributeKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY_ATTRIBUTE_KEY, $fkCategoryAttributeKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryAttributeKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY_ATTRIBUTE_KEY, $fkCategoryAttributeKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY_ATTRIBUTE_KEY, $fkCategoryAttributeKey, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategory object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategory|PropelObjectCollection $pacCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($pacCategory, $comparison = null)
    {
        if ($pacCategory instanceof ProjectA_Zed_Category_Persistence_PacCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY, $pacCategory->getIdCategory(), $comparison);
        } elseif ($pacCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY, $pacCategory->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation PacCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ProjectA_Zed_Category_Persistence_PacCategoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey|PropelObjectCollection $pacCategoryAttributeKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeKey($pacCategoryAttributeKey, $comparison = null)
    {
        if ($pacCategoryAttributeKey instanceof ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY_ATTRIBUTE_KEY, $pacCategoryAttributeKey->getIdCategoryAttributeKey(), $comparison);
        } elseif ($pacCategoryAttributeKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::FK_CATEGORY_ATTRIBUTE_KEY, $pacCategoryAttributeKey->toKeyValue('PrimaryKey', 'IdCategoryAttributeKey'), $comparison);
        } else {
            throw new PropelException('filterByAttributeKey() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function joinAttributeKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeKey');

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
            $this->addJoinObject($join, 'AttributeKey');
        }

        return $this;
    }

    /**
     * Use the AttributeKey relation PacCategoryAttributeKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery A secondary query class using the current class as primary query
     */
    public function useAttributeKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeKey', 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttribute $pacCategoryAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery The current query, for fluid interface
     */
    public function prune($pacCategoryAttribute = null)
    {
        if ($pacCategoryAttribute) {
            $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryAttributePeer::ID_CATEGORY_ATTRIBUTE, $pacCategoryAttribute->getIdCategoryAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
