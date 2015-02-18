<?php


/**
 * Base class that represents a query for the 'pac_cms_page_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByIdCmsPageAttribute($order = Criteria::ASC) Order by the id_cms_page_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByIsMetaAttribute($order = Criteria::ASC) Order by the is_meta_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByIdCmsPageAttribute() Group by the id_cms_page_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByIsMetaAttribute() Group by the is_meta_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery leftJoinPacCmsPageAttributeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageAttributeValue relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery rightJoinPacCmsPageAttributeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageAttributeValue relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery innerJoinPacCmsPageAttributeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageAttributeValue relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneByType(string $type) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute filtered by the type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneByIsMetaAttribute(boolean $is_meta_attribute) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute filtered by the is_meta_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute filtered by the updated_at column
 *
 * @method array findByIdCmsPageAttribute(int $id_cms_page_attribute) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the id_cms_page_attribute column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the name column
 * @method array findByType(string $type) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the type column
 * @method array findByIsMetaAttribute(boolean $is_meta_attribute) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the is_meta_attribute column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageAttributeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsPageAttribute']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPageAttribute($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page_attribute`, `name`, `type`, `is_meta_attribute`, `created_at`, `updated_at` FROM `pac_cms_page_attribute` WHERE `id_cms_page_attribute` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPageAttribute(1234); // WHERE id_cms_page_attribute = 1234
     * $query->filterByIdCmsPageAttribute(array(12, 34)); // WHERE id_cms_page_attribute IN (12, 34)
     * $query->filterByIdCmsPageAttribute(array('min' => 12)); // WHERE id_cms_page_attribute >= 12
     * $query->filterByIdCmsPageAttribute(array('max' => 12)); // WHERE id_cms_page_attribute <= 12
     * </code>
     *
     * @param     mixed $idCmsPageAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByIdCmsPageAttribute($idCmsPageAttribute = null, $comparison = null)
    {
        if (is_array($idCmsPageAttribute)) {
            $useMinMax = false;
            if (isset($idCmsPageAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $idCmsPageAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPageAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $idCmsPageAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $idCmsPageAttribute, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the is_meta_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMetaAttribute(true); // WHERE is_meta_attribute = true
     * $query->filterByIsMetaAttribute('yes'); // WHERE is_meta_attribute = true
     * </code>
     *
     * @param     boolean|string $isMetaAttribute The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByIsMetaAttribute($isMetaAttribute = null, $comparison = null)
    {
        if (is_string($isMetaAttribute)) {
            $isMetaAttribute = in_array(strtolower($isMetaAttribute), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::IS_META_ATTRIBUTE, $isMetaAttribute, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue|PropelObjectCollection $pacCmsPageAttributeValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageAttributeValue($pacCmsPageAttributeValue, $comparison = null)
    {
        if ($pacCmsPageAttributeValue instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $pacCmsPageAttributeValue->getFkCmsPageAttribute(), $comparison);
        } elseif ($pacCmsPageAttributeValue instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsPageAttributeValueQuery()
                ->filterByPrimaryKeys($pacCmsPageAttributeValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsPageAttributeValue() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPageAttributeValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function joinPacCmsPageAttributeValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPageAttributeValue');

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
            $this->addJoinObject($join, 'PacCmsPageAttributeValue');
        }

        return $this;
    }

    /**
     * Use the PacCmsPageAttributeValue relation PacCmsPageAttributeValue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPageAttributeValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPageAttributeValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPageAttributeValue', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute $pacCmsPageAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function prune($pacCmsPageAttribute = null)
    {
        if ($pacCmsPageAttribute) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::ID_CMS_PAGE_ATTRIBUTE, $pacCmsPageAttribute->getIdCmsPageAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributePeer::CREATED_AT);
    }
}
