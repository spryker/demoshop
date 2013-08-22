<?php


/**
 * Base class that represents a query for the 'pac_cms_element' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByIdCmsElement($order = Criteria::ASC) Order by the id_cms_element column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByElementKey($order = Criteria::ASC) Order by the element_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByFkCmsElementType($order = Criteria::ASC) Order by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByUpdatedFrom($order = Criteria::ASC) Order by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByIdCmsElement() Group by the id_cms_element column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByElementKey() Group by the element_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByContent() Group by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByFkCmsElementType() Group by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByUpdatedFrom() Group by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByStatus() Group by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery leftJoinElementType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementType relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery rightJoinElementType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementType relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery innerJoinElementType($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery leftJoinElementPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementPage relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery rightJoinElementPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementPage relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElementQuery innerJoinElementPage($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementPage relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsElement object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByElementKey(string $element_key) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the element_key column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByDescription(string $description) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the description column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByContent(string $content) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByFkCmsElementType(int $fk_cms_element_type) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the fk_cms_element_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByUpdatedFrom(int $updated_from) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByVersion(int $version) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByStatus(int $status) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsElement findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsElement filtered by the updated_at column
 *
 * @method array findByIdCmsElement(int $id_cms_element) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the id_cms_element column
 * @method array findByElementKey(string $element_key) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the element_key column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the name column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the description column
 * @method array findByContent(string $content) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the content column
 * @method array findByFkCmsElementType(int $fk_cms_element_type) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the fk_cms_element_type column
 * @method array findByUpdatedFrom(int $updated_from) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the updated_from column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the version column
 * @method array findByStatus(int $status) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the status column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_PacCmsElement objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsElementQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsElementQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsElement', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsElementQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsElementQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElement|ProjectA_Zed_Cms_Persistence_PacCmsElement[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElement A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsElement($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElement A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_element`, `element_key`, `name`, `description`, `content`, `fk_cms_element_type`, `updated_from`, `version`, `status`, `created_at`, `updated_at` FROM `pac_cms_element` WHERE `id_cms_element` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsElement();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElement|ProjectA_Zed_Cms_Persistence_PacCmsElement[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElement[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_element column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsElement(1234); // WHERE id_cms_element = 1234
     * $query->filterByIdCmsElement(array(12, 34)); // WHERE id_cms_element IN (12, 34)
     * $query->filterByIdCmsElement(array('min' => 12)); // WHERE id_cms_element >= 12
     * $query->filterByIdCmsElement(array('max' => 12)); // WHERE id_cms_element <= 12
     * </code>
     *
     * @param     mixed $idCmsElement The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByIdCmsElement($idCmsElement = null, $comparison = null)
    {
        if (is_array($idCmsElement)) {
            $useMinMax = false;
            if (isset($idCmsElement['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $idCmsElement['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsElement['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $idCmsElement['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $idCmsElement, $comparison);
    }

    /**
     * Filter the query on the element_key column
     *
     * Example usage:
     * <code>
     * $query->filterByElementKey('fooValue');   // WHERE element_key = 'fooValue'
     * $query->filterByElementKey('%fooValue%'); // WHERE element_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByElementKey($elementKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementKey)) {
                $elementKey = str_replace('*', '%', $elementKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ELEMENT_KEY, $elementKey, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CONTENT, $content, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByFkCmsElementType($fkCmsElementType = null, $comparison = null)
    {
        if (is_array($fkCmsElementType)) {
            $useMinMax = false;
            if (isset($fkCmsElementType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsElementType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::FK_CMS_ELEMENT_TYPE, $fkCmsElementType, $comparison);
    }

    /**
     * Filter the query on the updated_from column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedFrom(1234); // WHERE updated_from = 1234
     * $query->filterByUpdatedFrom(array(12, 34)); // WHERE updated_from IN (12, 34)
     * $query->filterByUpdatedFrom(array('min' => 12)); // WHERE updated_from >= 12
     * $query->filterByUpdatedFrom(array('max' => 12)); // WHERE updated_from <= 12
     * </code>
     *
     * @param     mixed $updatedFrom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByUpdatedFrom($updatedFrom = null, $comparison = null)
    {
        if (is_array($updatedFrom)) {
            $useMinMax = false;
            if (isset($updatedFrom['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_FROM, $updatedFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedFrom['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_FROM, $updatedFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_FROM, $updatedFrom, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElementType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementType|PropelObjectCollection $pacCmsElementType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementType($pacCmsElementType, $comparison = null)
    {
        if ($pacCmsElementType instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::FK_CMS_ELEMENT_TYPE, $pacCmsElementType->getIdCmsElementType(), $comparison);
        } elseif ($pacCmsElementType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::FK_CMS_ELEMENT_TYPE, $pacCmsElementType->toKeyValue('PrimaryKey', 'IdCmsElementType'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElementPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementPage|PropelObjectCollection $pacCmsElementPage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementPage($pacCmsElementPage, $comparison = null)
    {
        if ($pacCmsElementPage instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $pacCmsElementPage->getFkCmsElement(), $comparison);
        } elseif ($pacCmsElementPage instanceof PropelObjectCollection) {
            return $this
                ->useElementPageQuery()
                ->filterByPrimaryKeys($pacCmsElementPage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByElementPage() only accepts arguments of type ProjectA_Zed_Cms_Persistence_PacCmsElementPage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ElementPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function joinElementPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ElementPage');

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
            $this->addJoinObject($join, 'ElementPage');
        }

        return $this;
    }

    /**
     * Use the ElementPage relation PacCmsElementPage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery A secondary query class using the current class as primary query
     */
    public function useElementPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElementPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ElementPage', 'ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery');
    }

    /**
     * Filter the query by a related PacCmsPage object
     * using the pac_cms_element_page table as cross reference
     *
     * @param   PacCmsPage $pacCmsPage the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function filterByPage($pacCmsPage, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useElementPageQuery()
            ->filterByPage($pacCmsPage, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElement $pacCmsElement Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function prune($pacCmsElement = null)
    {
        if ($pacCmsElement) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::ID_CMS_ELEMENT, $pacCmsElement->getIdCmsElement(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsElementQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsElementPeer::CREATED_AT);
    }
}
