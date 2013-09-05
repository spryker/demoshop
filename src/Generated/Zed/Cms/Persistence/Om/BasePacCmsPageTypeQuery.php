<?php


/**
 * Base class that represents a query for the 'pac_cms_page_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery orderByIdCmsPageType($order = Criteria::ASC) Order by the id_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery orderByLayout($order = Criteria::ASC) Order by the layout column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery orderByView($order = Criteria::ASC) Order by the view column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery groupByIdCmsPageType() Group by the id_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery groupByLayout() Group by the layout column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery groupByView() Group by the view column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery groupByDescription() Group by the description column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery leftJoinPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Page relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery rightJoinPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Page relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery innerJoinPage($relationAlias = null) Adds a INNER JOIN clause to the query using the Page relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery leftJoinElementTypePageTypeConstraint($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementTypePageTypeConstraint relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery rightJoinElementTypePageTypeConstraint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementTypePageTypeConstraint relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery innerJoinElementTypePageTypeConstraint($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementTypePageTypeConstraint relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsPageType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOneByLayout(string $layout) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType filtered by the layout column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOneByView(string $view) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType filtered by the view column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageType findOneByDescription(string $description) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPageType filtered by the description column
 *
 * @method array findByIdCmsPageType(int $id_cms_page_type) Return ProjectA_Zed_Cms_Persistence_PacCmsPageType objects filtered by the id_cms_page_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_PacCmsPageType objects filtered by the name column
 * @method array findByLayout(string $layout) Return ProjectA_Zed_Cms_Persistence_PacCmsPageType objects filtered by the layout column
 * @method array findByView(string $view) Return ProjectA_Zed_Cms_Persistence_PacCmsPageType objects filtered by the view column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Cms_Persistence_PacCmsPageType objects filtered by the description column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsPageTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsPageTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsPageType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPageType|ProjectA_Zed_Cms_Persistence_PacCmsPageType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPageType($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page_type`, `name`, `layout`, `view`, `description` FROM `pac_cms_page_type` WHERE `id_cms_page_type` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsPageType();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType|ProjectA_Zed_Cms_Persistence_PacCmsPageType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsPageType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPageType(1234); // WHERE id_cms_page_type = 1234
     * $query->filterByIdCmsPageType(array(12, 34)); // WHERE id_cms_page_type IN (12, 34)
     * $query->filterByIdCmsPageType(array('min' => 12)); // WHERE id_cms_page_type >= 12
     * $query->filterByIdCmsPageType(array('max' => 12)); // WHERE id_cms_page_type <= 12
     * </code>
     *
     * @param     mixed $idCmsPageType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByIdCmsPageType($idCmsPageType = null, $comparison = null)
    {
        if (is_array($idCmsPageType)) {
            $useMinMax = false;
            if (isset($idCmsPageType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $idCmsPageType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPageType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $idCmsPageType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $idCmsPageType, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the layout column
     *
     * Example usage:
     * <code>
     * $query->filterByLayout('fooValue');   // WHERE layout = 'fooValue'
     * $query->filterByLayout('%fooValue%'); // WHERE layout LIKE '%fooValue%'
     * </code>
     *
     * @param     string $layout The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByLayout($layout = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($layout)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $layout)) {
                $layout = str_replace('*', '%', $layout);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::LAYOUT, $layout, $comparison);
    }

    /**
     * Filter the query on the view column
     *
     * Example usage:
     * <code>
     * $query->filterByView('fooValue');   // WHERE view = 'fooValue'
     * $query->filterByView('%fooValue%'); // WHERE view LIKE '%fooValue%'
     * </code>
     *
     * @param     string $view The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByView($view = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($view)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $view)) {
                $view = str_replace('*', '%', $view);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::VIEW, $view, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPage|PropelObjectCollection $pacCmsPage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPage($pacCmsPage, $comparison = null)
    {
        if ($pacCmsPage instanceof ProjectA_Zed_Cms_Persistence_PacCmsPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $pacCmsPage->getFkCmsPageType(), $comparison);
        } elseif ($pacCmsPage instanceof PropelObjectCollection) {
            return $this
                ->usePageQuery()
                ->filterByPrimaryKeys($pacCmsPage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPage() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacCmsPage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Page relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function joinPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Page');

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
            $this->addJoinObject($join, 'Page');
        }

        return $this;
    }

    /**
     * Use the Page relation PacCmsPage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPageQuery A secondary query class using the current class as primary query
     */
    public function usePageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Page', 'ProjectA_Zed_Cms_Persistence_PacCmsPageQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint|PropelObjectCollection $pacElementTypePageTypeConstraint  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementTypePageTypeConstraint($pacElementTypePageTypeConstraint, $comparison = null)
    {
        if ($pacElementTypePageTypeConstraint instanceof ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $pacElementTypePageTypeConstraint->getFkCmsPageType(), $comparison);
        } elseif ($pacElementTypePageTypeConstraint instanceof PropelObjectCollection) {
            return $this
                ->useElementTypePageTypeConstraintQuery()
                ->filterByPrimaryKeys($pacElementTypePageTypeConstraint->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByElementTypePageTypeConstraint() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ElementTypePageTypeConstraint relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function joinElementTypePageTypeConstraint($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ElementTypePageTypeConstraint');

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
            $this->addJoinObject($join, 'ElementTypePageTypeConstraint');
        }

        return $this;
    }

    /**
     * Use the ElementTypePageTypeConstraint relation PacElementTypePageTypeConstraint object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery A secondary query class using the current class as primary query
     */
    public function useElementTypePageTypeConstraintQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElementTypePageTypeConstraint($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ElementTypePageTypeConstraint', 'ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery');
    }

    /**
     * Filter the query by a related PacCmsElementType object
     * using the pac_cms_elementtype_pagetype_constraint table as cross reference
     *
     * @param   PacCmsElementType $pacCmsElementType the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function filterByElementType($pacCmsElementType, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useElementTypePageTypeConstraintQuery()
            ->filterByElementType($pacCmsElementType, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPageType $pacCmsPageType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery The current query, for fluid interface
     */
    public function prune($pacCmsPageType = null)
    {
        if ($pacCmsPageType) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $pacCmsPageType->getIdCmsPageType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
