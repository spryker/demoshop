<?php


/**
 * Base class that represents a query for the 'pac_cms_page' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByIdCmsPage($order = Criteria::ASC) Order by the id_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByFkCmsPageType($order = Criteria::ASC) Order by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByUpdatedFrom($order = Criteria::ASC) Order by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByIdCmsPage() Group by the id_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByFkCmsPageType() Group by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByUrl() Group by the url column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByUser() Group by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByUpdatedFrom() Group by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByStatus() Group by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByContent() Group by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery leftJoinPageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PageType relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery rightJoinPageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PageType relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery innerJoinPageType($relationAlias = null) Adds a INNER JOIN clause to the query using the PageType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery leftJoinElementPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementPage relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery rightJoinElementPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementPage relation
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPageQuery innerJoinElementPage($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementPage relation
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage matching the query
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage matching the query, or a new ProjectA_Zed_Cms_Persistence_PacCmsPage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByFkCmsPageType(int $fk_cms_page_type) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the fk_cms_page_type column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByUrl(string $url) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the url column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByUser(string $user) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the user column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByUpdatedFrom(int $updated_from) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the updated_from column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByVersion(int $version) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the version column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByStatus(int $status) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the status column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByContent(string $content) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the content column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_PacCmsPage findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_PacCmsPage filtered by the updated_at column
 *
 * @method array findByIdCmsPage(int $id_cms_page) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the id_cms_page column
 * @method array findByFkCmsPageType(int $fk_cms_page_type) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the fk_cms_page_type column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the name column
 * @method array findByUrl(string $url) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the url column
 * @method array findByUser(string $user) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the user column
 * @method array findByUpdatedFrom(int $updated_from) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the updated_from column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the version column
 * @method array findByStatus(int $status) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the status column
 * @method array findByContent(string $content) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the content column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_PacCmsPage objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsPageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsPageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cms_Persistence_PacCmsPage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_PacCmsPageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_PacCmsPageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_PacCmsPageQuery();
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
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPage|ProjectA_Zed_Cms_Persistence_PacCmsPage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPage($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page`, `fk_cms_page_type`, `name`, `url`, `user`, `updated_from`, `version`, `status`, `content`, `created_at`, `updated_at` FROM `pac_cms_page` WHERE `id_cms_page` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_PacCmsPage();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage|ProjectA_Zed_Cms_Persistence_PacCmsPage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsPage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPage(1234); // WHERE id_cms_page = 1234
     * $query->filterByIdCmsPage(array(12, 34)); // WHERE id_cms_page IN (12, 34)
     * $query->filterByIdCmsPage(array('min' => 12)); // WHERE id_cms_page >= 12
     * $query->filterByIdCmsPage(array('max' => 12)); // WHERE id_cms_page <= 12
     * </code>
     *
     * @param     mixed $idCmsPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByIdCmsPage($idCmsPage = null, $comparison = null)
    {
        if (is_array($idCmsPage)) {
            $useMinMax = false;
            if (isset($idCmsPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByFkCmsPageType($fkCmsPageType = null, $comparison = null)
    {
        if (is_array($fkCmsPageType)) {
            $useMinMax = false;
            if (isset($fkCmsPageType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $fkCmsPageType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPageType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $fkCmsPageType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $fkCmsPageType, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::URL, $url, $comparison);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%'); // WHERE user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $user The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $user)) {
                $user = str_replace('*', '%', $user);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::USER, $user, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByUpdatedFrom($updatedFrom = null, $comparison = null)
    {
        if (is_array($updatedFrom)) {
            $useMinMax = false;
            if (isset($updatedFrom['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM, $updatedFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedFrom['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM, $updatedFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM, $updatedFrom, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS, $status, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CONTENT, $content, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsPageType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPageType|PropelObjectCollection $pacCmsPageType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPageType($pacCmsPageType, $comparison = null)
    {
        if ($pacCmsPageType instanceof ProjectA_Zed_Cms_Persistence_PacCmsPageType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $pacCmsPageType->getIdCmsPageType(), $comparison);
        } elseif ($pacCmsPageType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $pacCmsPageType->toKeyValue('PrimaryKey', 'IdCmsPageType'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_PacCmsElementPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsElementPage|PropelObjectCollection $pacCmsElementPage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementPage($pacCmsElementPage, $comparison = null)
    {
        if ($pacCmsElementPage instanceof ProjectA_Zed_Cms_Persistence_PacCmsElementPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $pacCmsElementPage->getFkCmsPage(), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
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
     * Filter the query by a related PacCmsElement object
     * using the pac_cms_element_page table as cross reference
     *
     * @param   PacCmsElement $pacCmsElement the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByElement($pacCmsElement, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useElementPageQuery()
            ->filterByElement($pacCmsElement, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_PacCmsPage $pacCmsPage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function prune($pacCmsPage = null)
    {
        if ($pacCmsPage) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $pacCmsPage->getIdCmsPage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT);
    }
}
