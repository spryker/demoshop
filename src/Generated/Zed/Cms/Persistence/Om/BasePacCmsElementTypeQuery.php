<?php


/**
 * Base class that represents a query for the 'pac_cms_element_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByIdCmsElementType($order = Criteria::ASC) Order by the id_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByElementTypeKey($order = Criteria::ASC) Order by the element_type_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByInput($order = Criteria::ASC) Order by the input column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery orderByTab($order = Criteria::ASC) Order by the tab column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByIdCmsElementType() Group by the id_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByElementTypeKey() Group by the element_type_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByInput() Group by the input column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery groupByTab() Group by the tab column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery leftJoinElement($relationAlias = null) Adds a LEFT JOIN clause to the query using the Element relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery rightJoinElement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Element relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery innerJoinElement($relationAlias = null) Adds a INNER JOIN clause to the query using the Element relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery leftJoinElementTypePageTypeConstraint($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementTypePageTypeConstraint relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery rightJoinElementTypePageTypeConstraint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementTypePageTypeConstraint relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery innerJoinElementTypePageTypeConstraint($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementTypePageTypeConstraint relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsElementType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneByElementTypeKey(string $element_type_key) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType filtered by the element_type_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneByDescription(string $description) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType filtered by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneByInput(string $input) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType filtered by the input column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementType findOneByTab(string $tab) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElementType filtered by the tab column
 *
 * @method array findByIdCmsElementType(int $id_cms_element_type) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the id_cms_element_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the name column
 * @method array findByElementTypeKey(string $element_type_key) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the element_type_key column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the description column
 * @method array findByInput(string $input) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the input column
 * @method array findByTab(string $tab) Return ProjectA_Zed_Cms_Persistence_PacCmsElementType objects filtered by the tab column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsElementTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsElementTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsElementType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementType|ProjectA_Zed_Cms_Persistence_PacCmsElementType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsElementType($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_element_type`, `name`, `element_type_key`, `description`, `input`, `tab` FROM `pac_cms_element_type` WHERE `id_cms_element_type` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsElementType();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementType|ProjectA_Zed_Cms_Persistence_PacCmsElementType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_element_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsElementType(1234); // WHERE id_cms_element_type = 1234
     * $query->filterByIdCmsElementType(array(12, 34)); // WHERE id_cms_element_type IN (12, 34)
     * $query->filterByIdCmsElementType(array('min' => 12)); // WHERE id_cms_element_type >= 12
     * $query->filterByIdCmsElementType(array('max' => 12)); // WHERE id_cms_element_type <= 12
     * </code>
     *
     * @param     mixed $idCmsElementType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByIdCmsElementType($idCmsElementType = null, $comparison = null)
    {
        if (is_array($idCmsElementType)) {
            $useMinMax = false;
            if (isset($idCmsElementType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $idCmsElementType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsElementType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $idCmsElementType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $idCmsElementType, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the element_type_key column
     *
     * Example usage:
     * <code>
     * $query->filterByElementTypeKey('fooValue');   // WHERE element_type_key = 'fooValue'
     * $query->filterByElementTypeKey('%fooValue%'); // WHERE element_type_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementTypeKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByElementTypeKey($elementTypeKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementTypeKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementTypeKey)) {
                $elementTypeKey = str_replace('*', '%', $elementTypeKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ELEMENT_TYPE_KEY, $elementTypeKey, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the input column
     *
     * Example usage:
     * <code>
     * $query->filterByInput('fooValue');   // WHERE input = 'fooValue'
     * $query->filterByInput('%fooValue%'); // WHERE input LIKE '%fooValue%'
     * </code>
     *
     * @param     string $input The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByInput($input = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($input)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $input)) {
                $input = str_replace('*', '%', $input);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::INPUT, $input, $comparison);
    }

    /**
     * Filter the query on the tab column
     *
     * Example usage:
     * <code>
     * $query->filterByTab('fooValue');   // WHERE tab = 'fooValue'
     * $query->filterByTab('%fooValue%'); // WHERE tab LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tab The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByTab($tab = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tab)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tab)) {
                $tab = str_replace('*', '%', $tab);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::TAB, $tab, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElement object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElement|PropelObjectCollection $pacCmsElement  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElement($pacCmsElement, $comparison = null)
    {
        if ($pacCmsElement instanceof ProjectA_Zed_Cms_Persistence_PacCmsElement) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $pacCmsElement->getFkCmsElementType(), $comparison);
        } elseif ($pacCmsElement instanceof PropelObjectCollection) {
            return $this
                ->useElementQuery()
                ->filterByPrimaryKeys($pacCmsElement->getPrimaryKeys())
                ->endUse();
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint|PropelObjectCollection $pacElementTypePageTypeConstraint  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementTypePageTypeConstraint($pacElementTypePageTypeConstraint, $comparison = null)
    {
        if ($pacElementTypePageTypeConstraint instanceof ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $pacElementTypePageTypeConstraint->getFkCmsElementType(), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
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
     * Filter the query by a related PacCmsPageType object
     * using the pac_cms_elementtype_pagetype_constraint table as cross reference
     *
     * @param   PacCmsPageType $pacCmsPageType the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function filterByPageType($pacCmsPageType, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useElementTypePageTypeConstraintQuery()
            ->filterByPageType($pacCmsPageType, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementType $pacCmsElementType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery The current query, for fluid interface
     */
    public function prune($pacCmsElementType = null)
    {
        if ($pacCmsElementType) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementTypePeer::ID_CMS_ELEMENT_TYPE, $pacCmsElementType->getIdCmsElementType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
