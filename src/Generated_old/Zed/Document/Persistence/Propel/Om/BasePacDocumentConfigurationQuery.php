<?php


/**
 * Base class that represents a query for the 'pac_document_configuration' table.
 *
 *
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByIdDocumentConfiguration($order = Criteria::ASC) Order by the id_document_configuration column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByFkDocumentType($order = Criteria::ASC) Order by the fk_document_type column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByFkDocumentTemplate($order = Criteria::ASC) Order by the fk_document_template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByFkDocumentRenderEngine($order = Criteria::ASC) Order by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByIdDocumentConfiguration() Group by the id_document_configuration column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByFkDocumentType() Group by the fk_document_type column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByFkDocumentTemplate() Group by the fk_document_template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByFkDocumentRenderEngine() Group by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoinType($relationAlias = null) Adds a LEFT JOIN clause to the query using the Type relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoinType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Type relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoinType($relationAlias = null) Adds a INNER JOIN clause to the query using the Type relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoinTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Template relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoinTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Template relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoinTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the Template relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoinRenderEngine($relationAlias = null) Adds a LEFT JOIN clause to the query using the RenderEngine relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoinRenderEngine($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RenderEngine relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoinRenderEngine($relationAlias = null) Adds a INNER JOIN clause to the query using the RenderEngine relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery leftJoinInvoice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery rightJoinInvoice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery innerJoinInvoice($relationAlias = null) Adds a INNER JOIN clause to the query using the Invoice relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration matching the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration matching the query, or a new ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByFkDocumentType(int $fk_document_type) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the fk_document_type column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByFkDocumentTemplate(int $fk_document_template) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the fk_document_template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByFkDocumentRenderEngine(int $fk_document_render_engine) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByName(string $name) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the name column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration filtered by the updated_at column
 *
 * @method array findByIdDocumentConfiguration(int $id_document_configuration) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the id_document_configuration column
 * @method array findByFkDocumentType(int $fk_document_type) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the fk_document_type column
 * @method array findByFkDocumentTemplate(int $fk_document_template) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the fk_document_template column
 * @method array findByFkDocumentRenderEngine(int $fk_document_render_engine) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the fk_document_render_engine column
 * @method array findByName(string $name) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the name column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.om
 */
abstract class Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentConfigurationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentConfigurationQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacDocumentConfiguration']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration|ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDocumentConfiguration($key, $con = null)
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_document_configuration`, `fk_document_type`, `fk_document_template`, `fk_document_render_engine`, `name`, `created_at`, `updated_at` FROM `pac_document_configuration` WHERE `id_document_configuration` = :p0';
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
            $obj = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration();
            $obj->hydrate($row);
            ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration|ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_document_configuration column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDocumentConfiguration(1234); // WHERE id_document_configuration = 1234
     * $query->filterByIdDocumentConfiguration(array(12, 34)); // WHERE id_document_configuration IN (12, 34)
     * $query->filterByIdDocumentConfiguration(array('min' => 12)); // WHERE id_document_configuration >= 12
     * $query->filterByIdDocumentConfiguration(array('max' => 12)); // WHERE id_document_configuration <= 12
     * </code>
     *
     * @param     mixed $idDocumentConfiguration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByIdDocumentConfiguration($idDocumentConfiguration = null, $comparison = null)
    {
        if (is_array($idDocumentConfiguration)) {
            $useMinMax = false;
            if (isset($idDocumentConfiguration['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $idDocumentConfiguration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDocumentConfiguration['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $idDocumentConfiguration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $idDocumentConfiguration, $comparison);
    }

    /**
     * Filter the query on the fk_document_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDocumentType(1234); // WHERE fk_document_type = 1234
     * $query->filterByFkDocumentType(array(12, 34)); // WHERE fk_document_type IN (12, 34)
     * $query->filterByFkDocumentType(array('min' => 12)); // WHERE fk_document_type >= 12
     * $query->filterByFkDocumentType(array('max' => 12)); // WHERE fk_document_type <= 12
     * </code>
     *
     * @see       filterByType()
     *
     * @param     mixed $fkDocumentType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByFkDocumentType($fkDocumentType = null, $comparison = null)
    {
        if (is_array($fkDocumentType)) {
            $useMinMax = false;
            if (isset($fkDocumentType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $fkDocumentType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $fkDocumentType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $fkDocumentType, $comparison);
    }

    /**
     * Filter the query on the fk_document_template column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDocumentTemplate(1234); // WHERE fk_document_template = 1234
     * $query->filterByFkDocumentTemplate(array(12, 34)); // WHERE fk_document_template IN (12, 34)
     * $query->filterByFkDocumentTemplate(array('min' => 12)); // WHERE fk_document_template >= 12
     * $query->filterByFkDocumentTemplate(array('max' => 12)); // WHERE fk_document_template <= 12
     * </code>
     *
     * @see       filterByTemplate()
     *
     * @param     mixed $fkDocumentTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByFkDocumentTemplate($fkDocumentTemplate = null, $comparison = null)
    {
        if (is_array($fkDocumentTemplate)) {
            $useMinMax = false;
            if (isset($fkDocumentTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $fkDocumentTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $fkDocumentTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $fkDocumentTemplate, $comparison);
    }

    /**
     * Filter the query on the fk_document_render_engine column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDocumentRenderEngine(1234); // WHERE fk_document_render_engine = 1234
     * $query->filterByFkDocumentRenderEngine(array(12, 34)); // WHERE fk_document_render_engine IN (12, 34)
     * $query->filterByFkDocumentRenderEngine(array('min' => 12)); // WHERE fk_document_render_engine >= 12
     * $query->filterByFkDocumentRenderEngine(array('max' => 12)); // WHERE fk_document_render_engine <= 12
     * </code>
     *
     * @see       filterByRenderEngine()
     *
     * @param     mixed $fkDocumentRenderEngine The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByFkDocumentRenderEngine($fkDocumentRenderEngine = null, $comparison = null)
    {
        if (is_array($fkDocumentRenderEngine)) {
            $useMinMax = false;
            if (isset($fkDocumentRenderEngine['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentRenderEngine['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentType object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentType|PropelObjectCollection $pacDocumentType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByType($pacDocumentType, $comparison = null)
    {
        if ($pacDocumentType instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $pacDocumentType->getIdDocumentType(), $comparison);
        } elseif ($pacDocumentType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $pacDocumentType->toKeyValue('PrimaryKey', 'IdDocumentType'), $comparison);
        } else {
            throw new PropelException('filterByType() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Type relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function joinType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Type');

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
            $this->addJoinObject($join, 'Type');
        }

        return $this;
    }

    /**
     * Use the Type relation PacDocumentType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTypeQuery A secondary query class using the current class as primary query
     */
    public function useTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Type', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate|PropelObjectCollection $pacDocumentTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplate($pacDocumentTemplate, $comparison = null)
    {
        if ($pacDocumentTemplate instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $pacDocumentTemplate->getIdDocumentTemplate(), $comparison);
        } elseif ($pacDocumentTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $pacDocumentTemplate->toKeyValue('PrimaryKey', 'IdDocumentTemplate'), $comparison);
        } else {
            throw new PropelException('filterByTemplate() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Template relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function joinTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Template');

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
            $this->addJoinObject($join, 'Template');
        }

        return $this;
    }

    /**
     * Use the Template relation PacDocumentTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery A secondary query class using the current class as primary query
     */
    public function useTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Template', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine|PropelObjectCollection $pacDocumentRenderEngine The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRenderEngine($pacDocumentRenderEngine, $comparison = null)
    {
        if ($pacDocumentRenderEngine instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $pacDocumentRenderEngine->getIdDocumentRenderEngine(), $comparison);
        } elseif ($pacDocumentRenderEngine instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $pacDocumentRenderEngine->toKeyValue('PrimaryKey', 'IdDocumentRenderEngine'), $comparison);
        } else {
            throw new PropelException('filterByRenderEngine() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RenderEngine relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function joinRenderEngine($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RenderEngine');

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
            $this->addJoinObject($join, 'RenderEngine');
        }

        return $this;
    }

    /**
     * Use the RenderEngine relation PacDocumentRenderEngine object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngineQuery A secondary query class using the current class as primary query
     */
    public function useRenderEngineQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRenderEngine($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RenderEngine', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngineQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocument object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocument|PropelObjectCollection $pacDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocument($pacDocument, $comparison = null)
    {
        if ($pacDocument instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocument) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $pacDocument->getFkDocumentConfiguration(), $comparison);
        } elseif ($pacDocument instanceof PropelObjectCollection) {
            return $this
                ->useDocumentQuery()
                ->filterByPrimaryKeys($pacDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocument() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Document relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function joinDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Document');

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
            $this->addJoinObject($join, 'Document');
        }

        return $this;
    }

    /**
     * Use the Document relation PacDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Document', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration|PropelObjectCollection $pacInvoiceConfiguration  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoice($pacInvoiceConfiguration, $comparison = null)
    {
        if ($pacInvoiceConfiguration instanceof ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $pacInvoiceConfiguration->getFkDocumentConfiguration(), $comparison);
        } elseif ($pacInvoiceConfiguration instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceQuery()
                ->filterByPrimaryKeys($pacInvoiceConfiguration->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoice() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Invoice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function joinInvoice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Invoice');

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
            $this->addJoinObject($join, 'Invoice');
        }

        return $this;
    }

    /**
     * Use the Invoice relation PacInvoiceConfiguration object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Invoice', 'ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration $pacDocumentConfiguration Object to remove from the list of results
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function prune($pacDocumentConfiguration = null)
    {
        if ($pacDocumentConfiguration) {
            $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $pacDocumentConfiguration->getIdDocumentConfiguration(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT);
    }
}
