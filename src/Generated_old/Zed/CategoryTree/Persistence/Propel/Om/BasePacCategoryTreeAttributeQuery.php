<?php


/**
 * Base class that represents a query for the 'pac_category_tree_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByIdCategoryAttribute($order = Criteria::ASC) Order by the id_category_attribute column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByLocaleId($order = Criteria::ASC) Order by the locale_id column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByUrlKey($order = Criteria::ASC) Order by the url_key column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByCategoryImageName($order = Criteria::ASC) Order by the category_image_name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByIdCategoryAttribute() Group by the id_category_attribute column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByFkCategory() Group by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByLocaleId() Group by the locale_id column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByUrlKey() Group by the url_key column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByMetaTitle() Group by the meta_title column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByMetaDescription() Group by the meta_description column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByMetaKeywords() Group by the meta_keywords column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByCategoryImageName() Group by the category_image_name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute matching the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute matching the query, or a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByFkCategory(int $fk_category) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByName(string $name) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByLocaleId(int $locale_id) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the locale_id column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByUrlKey(string $url_key) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the url_key column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByMetaTitle(string $meta_title) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the meta_title column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByMetaDescription(string $meta_description) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the meta_description column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByMetaKeywords(string $meta_keywords) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the meta_keywords column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByCategoryImageName(string $category_image_name) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the category_image_name column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the created_at column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute filtered by the updated_at column
 *
 * @method array findByIdCategoryAttribute(int $id_category_attribute) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the id_category_attribute column
 * @method array findByFkCategory(int $fk_category) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the fk_category column
 * @method array findByName(string $name) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the name column
 * @method array findByLocaleId(int $locale_id) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the locale_id column
 * @method array findByUrlKey(string $url_key) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the url_key column
 * @method array findByMetaTitle(string $meta_title) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the meta_title column
 * @method array findByMetaDescription(string $meta_description) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the meta_description column
 * @method array findByMetaKeywords(string $meta_keywords) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the meta_keywords column
 * @method array findByCategoryImageName(string $category_image_name) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the category_image_name column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTreeAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTreeAttributeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryTreeAttribute']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_attribute`, `fk_category`, `name`, `locale_id`, `url_key`, `meta_title`, `meta_description`, `meta_keywords`, `category_image_name`, `created_at`, `updated_at` FROM `pac_category_tree_attribute` WHERE `id_category_attribute` = :p0';
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
            $obj = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $keys, Criteria::IN);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryAttribute($idCategoryAttribute = null, $comparison = null)
    {
        if (is_array($idCategoryAttribute)) {
            $useMinMax = false;
            if (isset($idCategoryAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute, $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $fkCategory, $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the locale_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleId(1234); // WHERE locale_id = 1234
     * $query->filterByLocaleId(array(12, 34)); // WHERE locale_id IN (12, 34)
     * $query->filterByLocaleId(array('min' => 12)); // WHERE locale_id >= 12
     * $query->filterByLocaleId(array('max' => 12)); // WHERE locale_id <= 12
     * </code>
     *
     * @see       filterByLocale()
     *
     * @param     mixed $localeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByLocaleId($localeId = null, $comparison = null)
    {
        if (is_array($localeId)) {
            $useMinMax = false;
            if (isset($localeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $localeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $localeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $localeId, $comparison);
    }

    /**
     * Filter the query on the url_key column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlKey('fooValue');   // WHERE url_key = 'fooValue'
     * $query->filterByUrlKey('%fooValue%'); // WHERE url_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByUrlKey($urlKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $urlKey)) {
                $urlKey = str_replace('*', '%', $urlKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::URL_KEY, $urlKey, $comparison);
    }

    /**
     * Filter the query on the meta_title column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
     * $query->filterByMetaTitle('%fooValue%'); // WHERE meta_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaTitle)) {
                $metaTitle = str_replace('*', '%', $metaTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_TITLE, $metaTitle, $comparison);
    }

    /**
     * Filter the query on the meta_description column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
     * $query->filterByMetaDescription('%fooValue%'); // WHERE meta_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaDescription)) {
                $metaDescription = str_replace('*', '%', $metaDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_DESCRIPTION, $metaDescription, $comparison);
    }

    /**
     * Filter the query on the meta_keywords column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaKeywords('fooValue');   // WHERE meta_keywords = 'fooValue'
     * $query->filterByMetaKeywords('%fooValue%'); // WHERE meta_keywords LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaKeywords The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaKeywords($metaKeywords = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeywords)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaKeywords)) {
                $metaKeywords = str_replace('*', '%', $metaKeywords);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_KEYWORDS, $metaKeywords, $comparison);
    }

    /**
     * Filter the query on the category_image_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryImageName('fooValue');   // WHERE category_image_name = 'fooValue'
     * $query->filterByCategoryImageName('%fooValue%'); // WHERE category_image_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryImageName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByCategoryImageName($categoryImageName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryImageName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $categoryImageName)) {
                $categoryImageName = str_replace('*', '%', $categoryImageName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CATEGORY_IMAGE_NAME, $categoryImageName, $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByLocale() only accepts arguments of type SprykerCore_Zed_Locale_Persistence_Propel_PacLocale or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Locale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Locale');

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
            $this->addJoinObject($join, 'Locale');
        }

        return $this;
    }

    /**
     * Use the Locale relation PacLocale object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery A secondary query class using the current class as primary query
     */
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree|PropelObjectCollection $pacCategoryTree The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($pacCategoryTree, $comparison = null)
    {
        if ($pacCategoryTree instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $pacCategoryTree->getIdCategory(), $comparison);
        } elseif ($pacCategoryTree instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $pacCategoryTree->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
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
     * Use the Category relation PacCategoryTree object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute $pacCategoryTreeAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function prune($pacCategoryTreeAttribute = null)
    {
        if ($pacCategoryTreeAttribute) {
            $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $pacCategoryTreeAttribute->getIdCategoryAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT);
    }
}
