<?php


/**
 * Base class that represents a query for the 'pac_cms_page' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByIdCmsPage($order = Criteria::ASC) Order by the id_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByFkCmsTemplate($order = Criteria::ASC) Order by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByFkCmsLayout($order = Criteria::ASC) Order by the fk_cms_layout column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByIdCmsPage() Group by the id_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByFkCmsTemplate() Group by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByFkCmsLayout() Group by the fk_cms_layout column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByUrl() Group by the url column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByStatus() Group by the status column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByHash() Group by the hash column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery leftJoinPacCmsTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsTemplate relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery rightJoinPacCmsTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsTemplate relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery innerJoinPacCmsTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsTemplate relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery leftJoinPacCmsLayout($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsLayout relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery rightJoinPacCmsLayout($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsLayout relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery innerJoinPacCmsLayout($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsLayout relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery leftJoinPacCmsPageBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery rightJoinPacCmsPageBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery innerJoinPacCmsPageBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery leftJoinPacCmsPageAttributeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageAttributeValue relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery rightJoinPacCmsPageAttributeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageAttributeValue relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery innerJoinPacCmsPageAttributeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageAttributeValue relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByFkCmsTemplate(int $fk_cms_template) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByFkCmsLayout(int $fk_cms_layout) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the fk_cms_layout column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByUrl(string $url) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the url column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByStatus(int $status) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the status column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByHash(string $hash) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the hash column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage filtered by the updated_at column
 *
 * @method array findByIdCmsPage(int $id_cms_page) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the id_cms_page column
 * @method array findByFkCmsTemplate(int $fk_cms_template) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the fk_cms_template column
 * @method array findByFkCmsLayout(int $fk_cms_layout) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the fk_cms_layout column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the name column
 * @method array findByUrl(string $url) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the url column
 * @method array findByStatus(int $status) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the status column
 * @method array findByHash(string $hash) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the hash column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsPage']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page`, `fk_cms_template`, `fk_cms_layout`, `name`, `url`, `status`, `hash`, `is_deleted`, `created_at`, `updated_at` FROM `pac_cms_page` WHERE `id_cms_page` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $keys, Criteria::IN);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByIdCmsPage($idCmsPage = null, $comparison = null)
    {
        if (is_array($idCmsPage)) {
            $useMinMax = false;
            if (isset($idCmsPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $idCmsPage, $comparison);
    }

    /**
     * Filter the query on the fk_cms_template column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsTemplate(1234); // WHERE fk_cms_template = 1234
     * $query->filterByFkCmsTemplate(array(12, 34)); // WHERE fk_cms_template IN (12, 34)
     * $query->filterByFkCmsTemplate(array('min' => 12)); // WHERE fk_cms_template >= 12
     * $query->filterByFkCmsTemplate(array('max' => 12)); // WHERE fk_cms_template <= 12
     * </code>
     *
     * @see       filterByPacCmsTemplate()
     *
     * @param     mixed $fkCmsTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByFkCmsTemplate($fkCmsTemplate = null, $comparison = null)
    {
        if (is_array($fkCmsTemplate)) {
            $useMinMax = false;
            if (isset($fkCmsTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $fkCmsTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $fkCmsTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $fkCmsTemplate, $comparison);
    }

    /**
     * Filter the query on the fk_cms_layout column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsLayout(1234); // WHERE fk_cms_layout = 1234
     * $query->filterByFkCmsLayout(array(12, 34)); // WHERE fk_cms_layout IN (12, 34)
     * $query->filterByFkCmsLayout(array('min' => 12)); // WHERE fk_cms_layout >= 12
     * $query->filterByFkCmsLayout(array('max' => 12)); // WHERE fk_cms_layout <= 12
     * </code>
     *
     * @see       filterByPacCmsLayout()
     *
     * @param     mixed $fkCmsLayout The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByFkCmsLayout($fkCmsLayout = null, $comparison = null)
    {
        if (is_array($fkCmsLayout)) {
            $useMinMax = false;
            if (isset($fkCmsLayout['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $fkCmsLayout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsLayout['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $fkCmsLayout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $fkCmsLayout, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::URL, $url, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getSqlValueForEnum(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the hash column
     *
     * Example usage:
     * <code>
     * $query->filterByHash('fooValue');   // WHERE hash = 'fooValue'
     * $query->filterByHash('%fooValue%'); // WHERE hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByHash($hash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hash)) {
                $hash = str_replace('*', '%', $hash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::HASH, $hash, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate|PropelObjectCollection $pacCmsTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsTemplate($pacCmsTemplate, $comparison = null)
    {
        if ($pacCmsTemplate instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $pacCmsTemplate->getIdCmsTemplate(), $comparison);
        } elseif ($pacCmsTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $pacCmsTemplate->toKeyValue('PrimaryKey', 'IdCmsTemplate'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsTemplate() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function joinPacCmsTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsTemplate');

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
            $this->addJoinObject($join, 'PacCmsTemplate');
        }

        return $this;
    }

    /**
     * Use the PacCmsTemplate relation PacCmsTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplateQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacCmsTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsTemplate', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout|PropelObjectCollection $pacCmsLayout The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsLayout($pacCmsLayout, $comparison = null)
    {
        if ($pacCmsLayout instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $pacCmsLayout->getIdCmsLayout(), $comparison);
        } elseif ($pacCmsLayout instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $pacCmsLayout->toKeyValue('PrimaryKey', 'IdCmsLayout'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsLayout() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsLayout relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function joinPacCmsLayout($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsLayout');

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
            $this->addJoinObject($join, 'PacCmsLayout');
        }

        return $this;
    }

    /**
     * Use the PacCmsLayout relation PacCmsLayout object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayoutQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsLayoutQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsLayout($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsLayout', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayoutQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock|PropelObjectCollection $pacCmsPageBlock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageBlock($pacCmsPageBlock, $comparison = null)
    {
        if ($pacCmsPageBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $pacCmsPageBlock->getFkCmsPage(), $comparison);
        } elseif ($pacCmsPageBlock instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsPageBlockQuery()
                ->filterByPrimaryKeys($pacCmsPageBlock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsPageBlock() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPageBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function joinPacCmsPageBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPageBlock');

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
            $this->addJoinObject($join, 'PacCmsPageBlock');
        }

        return $this;
    }

    /**
     * Use the PacCmsPageBlock relation PacCmsPageBlock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPageBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPageBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPageBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue|PropelObjectCollection $pacCmsPageAttributeValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageAttributeValue($pacCmsPageAttributeValue, $comparison = null)
    {
        if ($pacCmsPageAttributeValue instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $pacCmsPageAttributeValue->getFkCmsPage(), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage $pacCmsPage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function prune($pacCmsPage = null)
    {
        if ($pacCmsPage) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $pacCmsPage->getIdCmsPage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT);
    }
}
