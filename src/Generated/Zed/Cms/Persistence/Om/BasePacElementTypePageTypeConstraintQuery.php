<?php


/**
 * Base class that represents a query for the 'pac_cms_elementtype_pagetype_constraint' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery orderByFkCmsPageType($order = Criteria::ASC) Order by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery orderByFkCmsElementType($order = Criteria::ASC) Order by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery groupByFkCmsPageType() Group by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery groupByFkCmsElementType() Group by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery groupByIsDefault() Group by the is_default column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery leftJoinElementType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementType relation
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery rightJoinElementType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementType relation
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery innerJoinElementType($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery leftJoinPageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PageType relation
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery rightJoinPageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PageType relation
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery innerJoinPageType($relationAlias = null) Adds a INNER JOIN clause to the query using the PageType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint matching the query, or a new ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint findOneByFkCmsPageType(int $fk_cms_page_type) Return the first ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint filtered by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint findOneByFkCmsElementType(int $fk_cms_element_type) Return the first ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint filtered by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint findOneByIsDefault(int $is_default) Return the first ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint filtered by the is_default column
 *
 * @method array findByFkCmsPageType(int $fk_cms_page_type) Return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects filtered by the fk_cms_page_type column
 * @method array findByFkCmsElementType(int $fk_cms_element_type) Return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects filtered by the fk_cms_element_type column
 * @method array findByIsDefault(int $is_default) Return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects filtered by the is_default column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacElementTypePageTypeConstraintQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacElementTypePageTypeConstraintQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$fk_cms_page_type, $fk_cms_element_type]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `fk_cms_page_type`, `fk_cms_element_type`, `is_default` FROM `pac_cms_elementtype_pagetype_constraint` WHERE `fk_cms_page_type` = :p0 AND `fk_cms_element_type` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_cms_page_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsPageType(1234); // WHERE fk_cms_page_type = 1234
     * $query->filterByFkCmsPageType(array(12, 34)); // WHERE fk_cms_page_type IN (12, 34)
     * $query->filterByFkCmsPageType(array('min' => 12)); // WHERE fk_cms_page_type >= 12
     * $query->filterByFkCmsPageType(array('max' => 12)); // WHERE fk_cms_page_type <= 12
     * </code>
     *
     * @see       filterByPageType()
     *
     * @param     mixed $fkCmsPageType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function filterByFkCmsPageType($fkCmsPageType = null, $comparison = null)
    {
        if (is_array($fkCmsPageType)) {
            $useMinMax = false;
            if (isset($fkCmsPageType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $fkCmsPageType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPageType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $fkCmsPageType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $fkCmsPageType, $comparison);
    }

    /**
     * Filter the query on the fk_cms_element_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsElementType(1234); // WHERE fk_cms_element_type = 1234
     * $query->filterByFkCmsElementType(array(12, 34)); // WHERE fk_cms_element_type IN (12, 34)
     * $query->filterByFkCmsElementType(array('min' => 12)); // WHERE fk_cms_element_type >= 12
     * $query->filterByFkCmsElementType(array('max' => 12)); // WHERE fk_cms_element_type <= 12
     * </code>
     *
     * @see       filterByElementType()
     *
     * @param     mixed $fkCmsElementType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function filterByFkCmsElementType($fkCmsElementType = null, $comparison = null)
    {
        if (is_array($fkCmsElementType)) {
            $useMinMax = false;
            if (isset($fkCmsElementType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsElementType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType, $comparison);
    }

    /**
     * Filter the query on the is_default column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDefault(1234); // WHERE is_default = 1234
     * $query->filterByIsDefault(array(12, 34)); // WHERE is_default IN (12, 34)
     * $query->filterByIsDefault(array('min' => 12)); // WHERE is_default >= 12
     * $query->filterByIsDefault(array('max' => 12)); // WHERE is_default <= 12
     * </code>
     *
     * @param     mixed $isDefault The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function filterByIsDefault($isDefault = null, $comparison = null)
    {
        if (is_array($isDefault)) {
            $useMinMax = false;
            if (isset($isDefault['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::IS_DEFAULT, $isDefault['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isDefault['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::IS_DEFAULT, $isDefault['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::IS_DEFAULT, $isDefault, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElementType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementType|PropelObjectCollection $pacCmsElementType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementType($pacCmsElementType, $comparison = null)
    {
        if ($pacCmsElementType instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $pacCmsElementType->getIdCmsElementType(), $comparison);
        } elseif ($pacCmsElementType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE, $pacCmsElementType->toKeyValue('PrimaryKey', 'IdCmsElementType'), $comparison);
        } else {
            throw new PropelException('filterByElementType() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacCmsElementType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ElementType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function joinElementType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ElementType');

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
            $this->addJoinObject($join, 'ElementType');
        }

        return $this;
    }

    /**
     * Use the ElementType relation PacCmsElementType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery A secondary query class using the current class as primary query
     */
    public function useElementTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElementType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ElementType', 'ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsPageType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPageType|PropelObjectCollection $pacCmsPageType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPageType($pacCmsPageType, $comparison = null)
    {
        if ($pacCmsPageType instanceof ProjectA_Zed_Cms_Persistence_PacCmsPageType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $pacCmsPageType->getIdCmsPageType(), $comparison);
        } elseif ($pacCmsPageType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE, $pacCmsPageType->toKeyValue('PrimaryKey', 'IdCmsPageType'), $comparison);
        } else {
            throw new PropelException('filterByPageType() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacCmsPageType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PageType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function joinPageType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PageType');

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
            $this->addJoinObject($join, 'PageType');
        }

        return $this;
    }

    /**
     * Use the PageType relation PacCmsPageType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery A secondary query class using the current class as primary query
     */
    public function usePageTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPageType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PageType', 'ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint $pacElementTypePageTypeConstraint Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery The current query, for fluid interface
     */
    public function prune($pacElementTypePageTypeConstraint = null)
    {
        if ($pacElementTypePageTypeConstraint) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_PAGE_TYPE), $pacElementTypePageTypeConstraint->getFkCmsPageType(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintPeer::FK_CMS_ELEMENT_TYPE), $pacElementTypePageTypeConstraint->getFkCmsElementType(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
