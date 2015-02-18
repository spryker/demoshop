<?php


/**
 * Base class that represents a query for the 'pac_document_template' table.
 *
 *
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByIdDocumentTemplate($order = Criteria::ASC) Order by the id_document_template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByIdDocumentTemplate() Group by the id_document_template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByContent() Group by the content column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByUpdatedAt() Group by the updated_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery groupByVersion() Group by the version column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery leftJoinDocumentConfiguration($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentConfiguration relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery rightJoinDocumentConfiguration($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentConfiguration relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery innerJoinDocumentConfiguration($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentConfiguration relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery leftJoinPacDocumentTemplateVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacDocumentTemplateVersion relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery rightJoinPacDocumentTemplateVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacDocumentTemplateVersion relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery innerJoinPacDocumentTemplateVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the PacDocumentTemplateVersion relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate matching the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate matching the query, or a new ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneByName(string $name) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate filtered by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneByContent(string $content) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate filtered by the content column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate filtered by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate filtered by the updated_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate findOneByVersion(int $version) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate filtered by the version column
 *
 * @method array findByIdDocumentTemplate(int $id_document_template) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the id_document_template column
 * @method array findByName(string $name) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the name column
 * @method array findByContent(string $content) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the content column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the updated_at column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate objects filtered by the version column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.om
 */
abstract class Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentTemplateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentTemplateQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacDocumentTemplate']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate|ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDocumentTemplate($key, $con = null)
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_document_template`, `name`, `content`, `created_at`, `updated_at`, `version` FROM `pac_document_template` WHERE `id_document_template` = :p0';
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
            $obj = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate();
            $obj->hydrate($row);
            ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate|ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_document_template column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDocumentTemplate(1234); // WHERE id_document_template = 1234
     * $query->filterByIdDocumentTemplate(array(12, 34)); // WHERE id_document_template IN (12, 34)
     * $query->filterByIdDocumentTemplate(array('min' => 12)); // WHERE id_document_template >= 12
     * $query->filterByIdDocumentTemplate(array('max' => 12)); // WHERE id_document_template <= 12
     * </code>
     *
     * @param     mixed $idDocumentTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByIdDocumentTemplate($idDocumentTemplate = null, $comparison = null)
    {
        if (is_array($idDocumentTemplate)) {
            $useMinMax = false;
            if (isset($idDocumentTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $idDocumentTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDocumentTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $idDocumentTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $idDocumentTemplate, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CONTENT, $content, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration|PropelObjectCollection $pacDocumentConfiguration  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentConfiguration($pacDocumentConfiguration, $comparison = null)
    {
        if ($pacDocumentConfiguration instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $pacDocumentConfiguration->getFkDocumentTemplate(), $comparison);
        } elseif ($pacDocumentConfiguration instanceof PropelObjectCollection) {
            return $this
                ->useDocumentConfigurationQuery()
                ->filterByPrimaryKeys($pacDocumentConfiguration->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocumentConfiguration() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentConfiguration relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function joinDocumentConfiguration($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentConfiguration');

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
            $this->addJoinObject($join, 'DocumentConfiguration');
        }

        return $this;
    }

    /**
     * Use the DocumentConfiguration relation PacDocumentConfiguration object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery A secondary query class using the current class as primary query
     */
    public function useDocumentConfigurationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocumentConfiguration($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentConfiguration', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersion object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersion|PropelObjectCollection $pacDocumentTemplateVersion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacDocumentTemplateVersion($pacDocumentTemplateVersion, $comparison = null)
    {
        if ($pacDocumentTemplateVersion instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $pacDocumentTemplateVersion->getIdDocumentTemplate(), $comparison);
        } elseif ($pacDocumentTemplateVersion instanceof PropelObjectCollection) {
            return $this
                ->usePacDocumentTemplateVersionQuery()
                ->filterByPrimaryKeys($pacDocumentTemplateVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacDocumentTemplateVersion() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacDocumentTemplateVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function joinPacDocumentTemplateVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacDocumentTemplateVersion');

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
            $this->addJoinObject($join, 'PacDocumentTemplateVersion');
        }

        return $this;
    }

    /**
     * Use the PacDocumentTemplateVersion relation PacDocumentTemplateVersion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersionQuery A secondary query class using the current class as primary query
     */
    public function usePacDocumentTemplateVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacDocumentTemplateVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacDocumentTemplateVersion', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate $pacDocumentTemplate Object to remove from the list of results
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function prune($pacDocumentTemplate = null)
    {
        if ($pacDocumentTemplate) {
            $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::ID_DOCUMENT_TEMPLATE, $pacDocumentTemplate->getIdDocumentTemplate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplatePeer::CREATED_AT);
    }
}
