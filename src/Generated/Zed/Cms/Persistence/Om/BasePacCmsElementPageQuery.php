<?php


/**
 * Base class that represents a query for the 'pac_cms_element_page' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery orderByIdCmsElementPage($order = Criteria::ASC) Order by the id_cms_element_page column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery orderByFkCmsElement($order = Criteria::ASC) Order by the fk_cms_element column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery orderByFkCmsPage($order = Criteria::ASC) Order by the fk_cms_page column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery groupByIdCmsElementPage() Group by the id_cms_element_page column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery groupByFkCmsElement() Group by the fk_cms_element column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery groupByFkCmsPage() Group by the fk_cms_page column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery leftJoinPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Page relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery rightJoinPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Page relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery innerJoinPage($relationAlias = null) Adds a INNER JOIN clause to the query using the Page relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery leftJoinElement($relationAlias = null) Adds a LEFT JOIN clause to the query using the Element relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery rightJoinElement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Element relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery innerJoinElement($relationAlias = null) Adds a INNER JOIN clause to the query using the Element relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementPage matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementPage matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsElementPage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPage findOneByFkCmsElement(int $fk_cms_element) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementPage filtered by the fk_cms_element column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementPage findOneByFkCmsPage(int $fk_cms_page) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementPage filtered by the fk_cms_page column
 *
 * @method array findByIdCmsElementPage(int $id_cms_element_page) Return ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects filtered by the id_cms_element_page column
 * @method array findByFkCmsElement(int $fk_cms_element) Return ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects filtered by the fk_cms_element column
 * @method array findByFkCmsPage(int $fk_cms_page) Return ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects filtered by the fk_cms_page column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsElementPageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsElementPageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsElementPage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementPage|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementPage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsElementPage($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementPage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_element_page`, `fk_cms_element`, `fk_cms_page` FROM `pac_cms_element_page` WHERE `id_cms_element_page` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsElementPage();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPage|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_element_page column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsElementPage(1234); // WHERE id_cms_element_page = 1234
     * $query->filterByIdCmsElementPage(array(12, 34)); // WHERE id_cms_element_page IN (12, 34)
     * $query->filterByIdCmsElementPage(array('min' => 12)); // WHERE id_cms_element_page >= 12
     * $query->filterByIdCmsElementPage(array('max' => 12)); // WHERE id_cms_element_page <= 12
     * </code>
     *
     * @param     mixed $idCmsElementPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function filterByIdCmsElementPage($idCmsElementPage = null, $comparison = null)
    {
        if (is_array($idCmsElementPage)) {
            $useMinMax = false;
            if (isset($idCmsElementPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $idCmsElementPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsElementPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $idCmsElementPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $idCmsElementPage, $comparison);
    }

    /**
     * Filter the query on the fk_cms_element column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsElement(1234); // WHERE fk_cms_element = 1234
     * $query->filterByFkCmsElement(array(12, 34)); // WHERE fk_cms_element IN (12, 34)
     * $query->filterByFkCmsElement(array('min' => 12)); // WHERE fk_cms_element >= 12
     * $query->filterByFkCmsElement(array('max' => 12)); // WHERE fk_cms_element <= 12
     * </code>
     *
     * @see       filterByElement()
     *
     * @param     mixed $fkCmsElement The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function filterByFkCmsElement($fkCmsElement = null, $comparison = null)
    {
        if (is_array($fkCmsElement)) {
            $useMinMax = false;
            if (isset($fkCmsElement['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_ELEMENT, $fkCmsElement['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsElement['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_ELEMENT, $fkCmsElement['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_ELEMENT, $fkCmsElement, $comparison);
    }

    /**
     * Filter the query on the fk_cms_page column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsPage(1234); // WHERE fk_cms_page = 1234
     * $query->filterByFkCmsPage(array(12, 34)); // WHERE fk_cms_page IN (12, 34)
     * $query->filterByFkCmsPage(array('min' => 12)); // WHERE fk_cms_page >= 12
     * $query->filterByFkCmsPage(array('max' => 12)); // WHERE fk_cms_page <= 12
     * </code>
     *
     * @see       filterByPage()
     *
     * @param     mixed $fkCmsPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function filterByFkCmsPage($fkCmsPage = null, $comparison = null)
    {
        if (is_array($fkCmsPage)) {
            $useMinMax = false;
            if (isset($fkCmsPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_PAGE, $fkCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_PAGE, $fkCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_PAGE, $fkCmsPage, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPage|PropelObjectCollection $pacCmsPage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPage($pacCmsPage, $comparison = null)
    {
        if ($pacCmsPage instanceof ProjectA_Zed_Cms_Persistence_PacCmsPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_PAGE, $pacCmsPage->getIdCmsPage(), $comparison);
        } elseif ($pacCmsPage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_PAGE, $pacCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElement object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElement|PropelObjectCollection $pacCmsElement The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElement($pacCmsElement, $comparison = null)
    {
        if ($pacCmsElement instanceof ProjectA_Zed_Cms_Persistence_PacCmsElement) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_ELEMENT, $pacCmsElement->getIdCmsElement(), $comparison);
        } elseif ($pacCmsElement instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::FK_CMS_ELEMENT, $pacCmsElement->toKeyValue('PrimaryKey', 'IdCmsElement'), $comparison);
        } else {
            throw new PropelException('filterByElement() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacCmsElement or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Element relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function joinElement($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Element');

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
            $this->addJoinObject($join, 'Element');
        }

        return $this;
    }

    /**
     * Use the Element relation PacCmsElement object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementQuery A secondary query class using the current class as primary query
     */
    public function useElementQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElement($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Element', 'ProjectA_Zed_Cms_Persistence_PacCmsElementQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementPage $pacCmsElementPage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery The current query, for fluid interface
     */
    public function prune($pacCmsElementPage = null)
    {
        if ($pacCmsElementPage) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPagePeer::ID_CMS_ELEMENT_PAGE, $pacCmsElementPage->getIdCmsElementPage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
