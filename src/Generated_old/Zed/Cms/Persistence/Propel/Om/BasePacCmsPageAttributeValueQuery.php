<?php


/**
 * Base class that represents a query for the 'pac_cms_page_attribute_value' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByIdCmsPageAttributeValue($order = Criteria::ASC) Order by the id_cms_page_attribute_value column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByFkCmsPageAttribute($order = Criteria::ASC) Order by the fk_cms_page_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByFkCmsPage($order = Criteria::ASC) Order by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByIdCmsPageAttributeValue() Group by the id_cms_page_attribute_value column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByFkCmsPageAttribute() Group by the fk_cms_page_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByFkCmsPage() Group by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery leftJoinPacCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPage relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery rightJoinPacCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPage relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery innerJoinPacCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPage relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery leftJoinPacCmsPageAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageAttribute relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery rightJoinPacCmsPageAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageAttribute relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery innerJoinPacCmsPageAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageAttribute relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneByFkCmsPageAttribute(int $fk_cms_page_attribute) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue filtered by the fk_cms_page_attribute column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneByFkCmsPage(int $fk_cms_page) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue filtered by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneByValue(string $value) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue filtered by the value column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue filtered by the updated_at column
 *
 * @method array findByIdCmsPageAttributeValue(int $id_cms_page_attribute_value) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the id_cms_page_attribute_value column
 * @method array findByFkCmsPageAttribute(int $fk_cms_page_attribute) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the fk_cms_page_attribute column
 * @method array findByFkCmsPage(int $fk_cms_page) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the fk_cms_page column
 * @method array findByValue(string $value) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the value column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageAttributeValueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageAttributeValueQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsPageAttributeValue']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPageAttributeValue($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page_attribute_value`, `fk_cms_page_attribute`, `fk_cms_page`, `value`, `created_at`, `updated_at` FROM `pac_cms_page_attribute_value` WHERE `id_cms_page_attribute_value` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page_attribute_value column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPageAttributeValue(1234); // WHERE id_cms_page_attribute_value = 1234
     * $query->filterByIdCmsPageAttributeValue(array(12, 34)); // WHERE id_cms_page_attribute_value IN (12, 34)
     * $query->filterByIdCmsPageAttributeValue(array('min' => 12)); // WHERE id_cms_page_attribute_value >= 12
     * $query->filterByIdCmsPageAttributeValue(array('max' => 12)); // WHERE id_cms_page_attribute_value <= 12
     * </code>
     *
     * @param     mixed $idCmsPageAttributeValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByIdCmsPageAttributeValue($idCmsPageAttributeValue = null, $comparison = null)
    {
        if (is_array($idCmsPageAttributeValue)) {
            $useMinMax = false;
            if (isset($idCmsPageAttributeValue['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $idCmsPageAttributeValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPageAttributeValue['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $idCmsPageAttributeValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $idCmsPageAttributeValue, $comparison);
    }

    /**
     * Filter the query on the fk_cms_page_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsPageAttribute(1234); // WHERE fk_cms_page_attribute = 1234
     * $query->filterByFkCmsPageAttribute(array(12, 34)); // WHERE fk_cms_page_attribute IN (12, 34)
     * $query->filterByFkCmsPageAttribute(array('min' => 12)); // WHERE fk_cms_page_attribute >= 12
     * $query->filterByFkCmsPageAttribute(array('max' => 12)); // WHERE fk_cms_page_attribute <= 12
     * </code>
     *
     * @see       filterByPacCmsPageAttribute()
     *
     * @param     mixed $fkCmsPageAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkCmsPageAttribute($fkCmsPageAttribute = null, $comparison = null)
    {
        if (is_array($fkCmsPageAttribute)) {
            $useMinMax = false;
            if (isset($fkCmsPageAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE_ATTRIBUTE, $fkCmsPageAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPageAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE_ATTRIBUTE, $fkCmsPageAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE_ATTRIBUTE, $fkCmsPageAttribute, $comparison);
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
     * @see       filterByPacCmsPage()
     *
     * @param     mixed $fkCmsPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByFkCmsPage($fkCmsPage = null, $comparison = null)
    {
        if (is_array($fkCmsPage)) {
            $useMinMax = false;
            if (isset($fkCmsPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE, $fkCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE, $fkCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE, $fkCmsPage, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::VALUE, $value, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage|PropelObjectCollection $pacCmsPage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPage($pacCmsPage, $comparison = null)
    {
        if ($pacCmsPage instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE, $pacCmsPage->getIdCmsPage(), $comparison);
        } elseif ($pacCmsPage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE, $pacCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsPage() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function joinPacCmsPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPage');

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
            $this->addJoinObject($join, 'PacCmsPage');
        }

        return $this;
    }

    /**
     * Use the PacCmsPage relation PacCmsPage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPage', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute|PropelObjectCollection $pacCmsPageAttribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageAttribute($pacCmsPageAttribute, $comparison = null)
    {
        if ($pacCmsPageAttribute instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE_ATTRIBUTE, $pacCmsPageAttribute->getIdCmsPageAttribute(), $comparison);
        } elseif ($pacCmsPageAttribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::FK_CMS_PAGE_ATTRIBUTE, $pacCmsPageAttribute->toKeyValue('PrimaryKey', 'IdCmsPageAttribute'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsPageAttribute() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPageAttribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function joinPacCmsPageAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPageAttribute');

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
            $this->addJoinObject($join, 'PacCmsPageAttribute');
        }

        return $this;
    }

    /**
     * Use the PacCmsPageAttribute relation PacCmsPageAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPageAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPageAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPageAttribute', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue $pacCmsPageAttributeValue Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function prune($pacCmsPageAttributeValue = null)
    {
        if ($pacCmsPageAttributeValue) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::ID_CMS_PAGE_ATTRIBUTE_VALUE, $pacCmsPageAttributeValue->getIdCmsPageAttributeValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValuePeer::CREATED_AT);
    }
}
