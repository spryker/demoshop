<?php


/**
 * Base class that represents a query for the 'pac_cms_template_partial' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByIdCmsTemplatePartial($order = Criteria::ASC) Order by the id_cms_template_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByFkCmsTemplate($order = Criteria::ASC) Order by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByFkCmsPartial($order = Criteria::ASC) Order by the fk_cms_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByRow($order = Criteria::ASC) Order by the row column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByIdCmsTemplatePartial() Group by the id_cms_template_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByFkCmsTemplate() Group by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByFkCmsPartial() Group by the fk_cms_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByRow() Group by the row column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByColumn() Group by the column column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery groupByPosition() Group by the position column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery leftJoinPacCmsTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsTemplate relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery rightJoinPacCmsTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsTemplate relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery innerJoinPacCmsTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsTemplate relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery leftJoinPacCmsPartial($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery rightJoinPacCmsPartial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPartial relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery innerJoinPacCmsPartial($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPartial relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery leftJoinPacCmsPageBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery rightJoinPacCmsPageBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery innerJoinPacCmsPageBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneByFkCmsTemplate(int $fk_cms_template) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial filtered by the fk_cms_template column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneByFkCmsPartial(int $fk_cms_partial) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial filtered by the fk_cms_partial column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneByRow(int $row) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial filtered by the row column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneByColumn(int $column) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial filtered by the column column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial findOneByPosition(int $position) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial filtered by the position column
 *
 * @method array findByIdCmsTemplatePartial(int $id_cms_template_partial) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the id_cms_template_partial column
 * @method array findByFkCmsTemplate(int $fk_cms_template) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the fk_cms_template column
 * @method array findByFkCmsPartial(int $fk_cms_partial) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the fk_cms_partial column
 * @method array findByRow(int $row) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the row column
 * @method array findByColumn(int $column) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the column column
 * @method array findByPosition(int $position) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects filtered by the position column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsTemplatePartialQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsTemplatePartialQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsTemplatePartial']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsTemplatePartial($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_template_partial`, `fk_cms_template`, `fk_cms_partial`, `row`, `column`, `position` FROM `pac_cms_template_partial` WHERE `id_cms_template_partial` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_template_partial column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsTemplatePartial(1234); // WHERE id_cms_template_partial = 1234
     * $query->filterByIdCmsTemplatePartial(array(12, 34)); // WHERE id_cms_template_partial IN (12, 34)
     * $query->filterByIdCmsTemplatePartial(array('min' => 12)); // WHERE id_cms_template_partial >= 12
     * $query->filterByIdCmsTemplatePartial(array('max' => 12)); // WHERE id_cms_template_partial <= 12
     * </code>
     *
     * @param     mixed $idCmsTemplatePartial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByIdCmsTemplatePartial($idCmsTemplatePartial = null, $comparison = null)
    {
        if (is_array($idCmsTemplatePartial)) {
            $useMinMax = false;
            if (isset($idCmsTemplatePartial['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $idCmsTemplatePartial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsTemplatePartial['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $idCmsTemplatePartial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $idCmsTemplatePartial, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByFkCmsTemplate($fkCmsTemplate = null, $comparison = null)
    {
        if (is_array($fkCmsTemplate)) {
            $useMinMax = false;
            if (isset($fkCmsTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_TEMPLATE, $fkCmsTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_TEMPLATE, $fkCmsTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_TEMPLATE, $fkCmsTemplate, $comparison);
    }

    /**
     * Filter the query on the fk_cms_partial column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsPartial(1234); // WHERE fk_cms_partial = 1234
     * $query->filterByFkCmsPartial(array(12, 34)); // WHERE fk_cms_partial IN (12, 34)
     * $query->filterByFkCmsPartial(array('min' => 12)); // WHERE fk_cms_partial >= 12
     * $query->filterByFkCmsPartial(array('max' => 12)); // WHERE fk_cms_partial <= 12
     * </code>
     *
     * @see       filterByPacCmsPartial()
     *
     * @param     mixed $fkCmsPartial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByFkCmsPartial($fkCmsPartial = null, $comparison = null)
    {
        if (is_array($fkCmsPartial)) {
            $useMinMax = false;
            if (isset($fkCmsPartial['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_PARTIAL, $fkCmsPartial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsPartial['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_PARTIAL, $fkCmsPartial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_PARTIAL, $fkCmsPartial, $comparison);
    }

    /**
     * Filter the query on the row column
     *
     * Example usage:
     * <code>
     * $query->filterByRow(1234); // WHERE row = 1234
     * $query->filterByRow(array(12, 34)); // WHERE row IN (12, 34)
     * $query->filterByRow(array('min' => 12)); // WHERE row >= 12
     * $query->filterByRow(array('max' => 12)); // WHERE row <= 12
     * </code>
     *
     * @param     mixed $row The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByRow($row = null, $comparison = null)
    {
        if (is_array($row)) {
            $useMinMax = false;
            if (isset($row['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ROW, $row['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($row['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ROW, $row['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ROW, $row, $comparison);
    }

    /**
     * Filter the query on the column column
     *
     * Example usage:
     * <code>
     * $query->filterByColumn(1234); // WHERE column = 1234
     * $query->filterByColumn(array(12, 34)); // WHERE column IN (12, 34)
     * $query->filterByColumn(array('min' => 12)); // WHERE column >= 12
     * $query->filterByColumn(array('max' => 12)); // WHERE column <= 12
     * </code>
     *
     * @param     mixed $column The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByColumn($column = null, $comparison = null)
    {
        if (is_array($column)) {
            $useMinMax = false;
            if (isset($column['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::COLUMN, $column['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($column['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::COLUMN, $column['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::COLUMN, $column, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position >= 12
     * $query->filterByPosition(array('max' => 12)); // WHERE position <= 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::POSITION, $position, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate|PropelObjectCollection $pacCmsTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsTemplate($pacCmsTemplate, $comparison = null)
    {
        if ($pacCmsTemplate instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_TEMPLATE, $pacCmsTemplate->getIdCmsTemplate(), $comparison);
        } elseif ($pacCmsTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_TEMPLATE, $pacCmsTemplate->toKeyValue('PrimaryKey', 'IdCmsTemplate'), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function joinPacCmsTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePacCmsTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsTemplate', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial|PropelObjectCollection $pacCmsPartial The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPartial($pacCmsPartial, $comparison = null)
    {
        if ($pacCmsPartial instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_PARTIAL, $pacCmsPartial->getIdCmsPartial(), $comparison);
        } elseif ($pacCmsPartial instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::FK_CMS_PARTIAL, $pacCmsPartial->toKeyValue('PrimaryKey', 'IdCmsPartial'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsPartial() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPartial relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function joinPacCmsPartial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPartial');

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
            $this->addJoinObject($join, 'PacCmsPartial');
        }

        return $this;
    }

    /**
     * Use the PacCmsPartial relation PacCmsPartial object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPartialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPartial($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPartial', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartialQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock|PropelObjectCollection $pacCmsPageBlock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageBlock($pacCmsPageBlock, $comparison = null)
    {
        if ($pacCmsPageBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $pacCmsPageBlock->getFkCmsTemplatePartial(), $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial $pacCmsTemplatePartial Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery The current query, for fluid interface
     */
    public function prune($pacCmsTemplatePartial = null)
    {
        if ($pacCmsTemplatePartial) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialPeer::ID_CMS_TEMPLATE_PARTIAL, $pacCmsTemplatePartial->getIdCmsTemplatePartial(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
