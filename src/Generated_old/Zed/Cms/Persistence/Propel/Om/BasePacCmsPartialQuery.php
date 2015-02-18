<?php


/**
 * Base class that represents a query for the 'pac_cms_partial' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByIdCmsPartial($order = Criteria::ASC) Order by the id_cms_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByFkCmsBlockType($order = Criteria::ASC) Order by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByYvesPartialName($order = Criteria::ASC) Order by the yves_partial_name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByIdCmsPartial() Group by the id_cms_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByFkCmsBlockType() Group by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByYvesPartialName() Group by the yves_partial_name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByContent() Group by the content column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery leftJoinPacCmsBlockType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockType relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery rightJoinPacCmsBlockType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockType relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery innerJoinPacCmsBlockType($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery leftJoinPacCmsTemplatePartial($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsTemplatePartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery rightJoinPacCmsTemplatePartial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsTemplatePartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery innerJoinPacCmsTemplatePartial($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsTemplatePartial relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByFkCmsBlockType(int $fk_cms_block_type) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByYvesPartialName(string $yves_partial_name) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the yves_partial_name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByName(string $name) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the name column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByContent(string $content) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the content column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByDescription(string $description) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the description column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the is_deleted column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the created_at column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial filtered by the updated_at column
 *
 * @method array findByIdCmsPartial(int $id_cms_partial) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the id_cms_partial column
 * @method array findByFkCmsBlockType(int $fk_cms_block_type) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the fk_cms_block_type column
 * @method array findByYvesPartialName(string $yves_partial_name) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the yves_partial_name column
 * @method array findByName(string $name) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the name column
 * @method array findByContent(string $content) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the content column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the description column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPartialQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPartialQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsPartial']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPartial($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_partial`, `fk_cms_block_type`, `yves_partial_name`, `name`, `content`, `description`, `is_deleted`, `created_at`, `updated_at` FROM `pac_cms_partial` WHERE `id_cms_partial` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_partial column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPartial(1234); // WHERE id_cms_partial = 1234
     * $query->filterByIdCmsPartial(array(12, 34)); // WHERE id_cms_partial IN (12, 34)
     * $query->filterByIdCmsPartial(array('min' => 12)); // WHERE id_cms_partial >= 12
     * $query->filterByIdCmsPartial(array('max' => 12)); // WHERE id_cms_partial <= 12
     * </code>
     *
     * @param     mixed $idCmsPartial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByIdCmsPartial($idCmsPartial = null, $comparison = null)
    {
        if (is_array($idCmsPartial)) {
            $useMinMax = false;
            if (isset($idCmsPartial['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $idCmsPartial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPartial['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $idCmsPartial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $idCmsPartial, $comparison);
    }

    /**
     * Filter the query on the fk_cms_block_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsBlockType(1234); // WHERE fk_cms_block_type = 1234
     * $query->filterByFkCmsBlockType(array(12, 34)); // WHERE fk_cms_block_type IN (12, 34)
     * $query->filterByFkCmsBlockType(array('min' => 12)); // WHERE fk_cms_block_type >= 12
     * $query->filterByFkCmsBlockType(array('max' => 12)); // WHERE fk_cms_block_type <= 12
     * </code>
     *
     * @see       filterByPacCmsBlockType()
     *
     * @param     mixed $fkCmsBlockType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByFkCmsBlockType($fkCmsBlockType = null, $comparison = null)
    {
        if (is_array($fkCmsBlockType)) {
            $useMinMax = false;
            if (isset($fkCmsBlockType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsBlockType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType, $comparison);
    }

    /**
     * Filter the query on the yves_partial_name column
     *
     * Example usage:
     * <code>
     * $query->filterByYvesPartialName('fooValue');   // WHERE yves_partial_name = 'fooValue'
     * $query->filterByYvesPartialName('%fooValue%'); // WHERE yves_partial_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yvesPartialName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByYvesPartialName($yvesPartialName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yvesPartialName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $yvesPartialName)) {
                $yvesPartialName = str_replace('*', '%', $yvesPartialName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::YVES_PARTIAL_NAME, $yvesPartialName, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CONTENT, $content, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::DESCRIPTION, $description, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType|PropelObjectCollection $pacCmsBlockType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockType($pacCmsBlockType, $comparison = null)
    {
        if ($pacCmsBlockType instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::FK_CMS_BLOCK_TYPE, $pacCmsBlockType->getIdCmsBlockType(), $comparison);
        } elseif ($pacCmsBlockType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::FK_CMS_BLOCK_TYPE, $pacCmsBlockType->toKeyValue('PrimaryKey', 'IdCmsBlockType'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsBlockType() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockType');

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
            $this->addJoinObject($join, 'PacCmsBlockType');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockType relation PacCmsBlockType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlockType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockType', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial|PropelObjectCollection $pacCmsTemplatePartial  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsTemplatePartial($pacCmsTemplatePartial, $comparison = null)
    {
        if ($pacCmsTemplatePartial instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $pacCmsTemplatePartial->getFkCmsPartial(), $comparison);
        } elseif ($pacCmsTemplatePartial instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsTemplatePartialQuery()
                ->filterByPrimaryKeys($pacCmsTemplatePartial->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsTemplatePartial() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsTemplatePartial relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function joinPacCmsTemplatePartial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsTemplatePartial');

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
            $this->addJoinObject($join, 'PacCmsTemplatePartial');
        }

        return $this;
    }

    /**
     * Use the PacCmsTemplatePartial relation PacCmsTemplatePartial object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsTemplatePartialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsTemplatePartial($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsTemplatePartial', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial $pacCmsPartial Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function prune($pacCmsPartial = null)
    {
        if ($pacCmsPartial) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::ID_CMS_PARTIAL, $pacCmsPartial->getIdCmsPartial(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialPeer::CREATED_AT);
    }
}
