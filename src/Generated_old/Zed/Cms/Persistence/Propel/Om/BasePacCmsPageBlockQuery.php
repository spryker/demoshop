<?php


/**
 * Base class that represents a query for the 'pac_cms_page_block' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery orderByIdCmsPageBlock($order = Criteria::ASC) Order by the id_cms_page_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery orderByFkCmsPage($order = Criteria::ASC) Order by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery orderByFkCmsBlock($order = Criteria::ASC) Order by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery orderByFkCmsTemplatePartial($order = Criteria::ASC) Order by the fk_cms_template_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery groupByIdCmsPageBlock() Group by the id_cms_page_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery groupByFkCmsPage() Group by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery groupByFkCmsBlock() Group by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery groupByFkCmsTemplatePartial() Group by the fk_cms_template_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery groupByIsDeleted() Group by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery leftJoinPacCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPage relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery rightJoinPacCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPage relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery innerJoinPacCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPage relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery leftJoinPacCmsBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery rightJoinPacCmsBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery innerJoinPacCmsBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery leftJoinPacCmsTemplatePartial($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsTemplatePartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery rightJoinPacCmsTemplatePartial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsTemplatePartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery innerJoinPacCmsTemplatePartial($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsTemplatePartial relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOneByFkCmsPage(int $fk_cms_page) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock filtered by the fk_cms_page column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOneByFkCmsBlock(int $fk_cms_block) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock filtered by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOneByFkCmsTemplatePartial(int $fk_cms_template_partial) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock filtered by the fk_cms_template_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock filtered by the is_deleted column
 *
 * @method array findByIdCmsPageBlock(int $id_cms_page_block) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects filtered by the id_cms_page_block column
 * @method array findByFkCmsPage(int $fk_cms_page) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects filtered by the fk_cms_page column
 * @method array findByFkCmsBlock(int $fk_cms_block) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects filtered by the fk_cms_block column
 * @method array findByFkCmsTemplatePartial(int $fk_cms_template_partial) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects filtered by the fk_cms_template_partial column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects filtered by the is_deleted column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageBlockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPageBlockQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsPageBlock']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsPageBlock($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_page_block`, `fk_cms_page`, `fk_cms_block`, `fk_cms_template_partial`, `is_deleted` FROM `pac_cms_page_block` WHERE `id_cms_page_block` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page_block column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPageBlock(1234); // WHERE id_cms_page_block = 1234
     * $query->filterByIdCmsPageBlock(array(12, 34)); // WHERE id_cms_page_block IN (12, 34)
     * $query->filterByIdCmsPageBlock(array('min' => 12)); // WHERE id_cms_page_block >= 12
     * $query->filterByIdCmsPageBlock(array('max' => 12)); // WHERE id_cms_page_block <= 12
     * </code>
     *
     * @param     mixed $idCmsPageBlock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByIdCmsPageBlock($idCmsPageBlock = null, $comparison = null)
    {
        if (is_array($idCmsPageBlock)) {
            $useMinMax = false;
            if (isset($idCmsPageBlock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $idCmsPageBlock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPageBlock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $idCmsPageBlock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $idCmsPageBlock, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByFkCmsPage($fkCmsPage = null, $comparison = null)
    {
        if (is_array($fkCmsPage)) {
            $useMinMax = false;
            if (isset($fkCmsPage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_PAGE, $fkCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_PAGE, $fkCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_PAGE, $fkCmsPage, $comparison);
    }

    /**
     * Filter the query on the fk_cms_block column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsBlock(1234); // WHERE fk_cms_block = 1234
     * $query->filterByFkCmsBlock(array(12, 34)); // WHERE fk_cms_block IN (12, 34)
     * $query->filterByFkCmsBlock(array('min' => 12)); // WHERE fk_cms_block >= 12
     * $query->filterByFkCmsBlock(array('max' => 12)); // WHERE fk_cms_block <= 12
     * </code>
     *
     * @see       filterByPacCmsBlock()
     *
     * @param     mixed $fkCmsBlock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByFkCmsBlock($fkCmsBlock = null, $comparison = null)
    {
        if (is_array($fkCmsBlock)) {
            $useMinMax = false;
            if (isset($fkCmsBlock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_BLOCK, $fkCmsBlock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsBlock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_BLOCK, $fkCmsBlock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_BLOCK, $fkCmsBlock, $comparison);
    }

    /**
     * Filter the query on the fk_cms_template_partial column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsTemplatePartial(1234); // WHERE fk_cms_template_partial = 1234
     * $query->filterByFkCmsTemplatePartial(array(12, 34)); // WHERE fk_cms_template_partial IN (12, 34)
     * $query->filterByFkCmsTemplatePartial(array('min' => 12)); // WHERE fk_cms_template_partial >= 12
     * $query->filterByFkCmsTemplatePartial(array('max' => 12)); // WHERE fk_cms_template_partial <= 12
     * </code>
     *
     * @see       filterByPacCmsTemplatePartial()
     *
     * @param     mixed $fkCmsTemplatePartial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByFkCmsTemplatePartial($fkCmsTemplatePartial = null, $comparison = null)
    {
        if (is_array($fkCmsTemplatePartial)) {
            $useMinMax = false;
            if (isset($fkCmsTemplatePartial['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_TEMPLATE_PARTIAL, $fkCmsTemplatePartial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsTemplatePartial['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_TEMPLATE_PARTIAL, $fkCmsTemplatePartial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_TEMPLATE_PARTIAL, $fkCmsTemplatePartial, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage|PropelObjectCollection $pacCmsPage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPage($pacCmsPage, $comparison = null)
    {
        if ($pacCmsPage instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_PAGE, $pacCmsPage->getIdCmsPage(), $comparison);
        } elseif ($pacCmsPage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_PAGE, $pacCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock|PropelObjectCollection $pacCmsBlock The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlock($pacCmsBlock, $comparison = null)
    {
        if ($pacCmsBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_BLOCK, $pacCmsBlock->getIdCmsBlock(), $comparison);
        } elseif ($pacCmsBlock instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_BLOCK, $pacCmsBlock->toKeyValue('PrimaryKey', 'IdCmsBlock'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsBlock() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlock');

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
            $this->addJoinObject($join, 'PacCmsBlock');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlock relation PacCmsBlock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial|PropelObjectCollection $pacCmsTemplatePartial The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsTemplatePartial($pacCmsTemplatePartial, $comparison = null)
    {
        if ($pacCmsTemplatePartial instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_TEMPLATE_PARTIAL, $pacCmsTemplatePartial->getIdCmsTemplatePartial(), $comparison);
        } elseif ($pacCmsTemplatePartial instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::FK_CMS_TEMPLATE_PARTIAL, $pacCmsTemplatePartial->toKeyValue('PrimaryKey', 'IdCmsTemplatePartial'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock $pacCmsPageBlock Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery The current query, for fluid interface
     */
    public function prune($pacCmsPageBlock = null)
    {
        if ($pacCmsPageBlock) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockPeer::ID_CMS_PAGE_BLOCK, $pacCmsPageBlock->getIdCmsPageBlock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
