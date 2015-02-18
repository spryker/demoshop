<?php


/**
 * Base class that represents a query for the 'pac_document' table.
 *
 *
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByIdDocument($order = Criteria::ASC) Order by the id_document column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByFkDocumentRenderEngine($order = Criteria::ASC) Order by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByFkDocumentConfiguration($order = Criteria::ASC) Order by the fk_document_configuration column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByTemplate($order = Criteria::ASC) Order by the template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByIdDocument() Group by the id_document column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByFkDocumentRenderEngine() Group by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByFkDocumentConfiguration() Group by the fk_document_configuration column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByData() Group by the data column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByTemplate() Group by the template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoinRenderEngine($relationAlias = null) Adds a LEFT JOIN clause to the query using the RenderEngine relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoinRenderEngine($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RenderEngine relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoinRenderEngine($relationAlias = null) Adds a INNER JOIN clause to the query using the RenderEngine relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoinConfiguration($relationAlias = null) Adds a LEFT JOIN clause to the query using the Configuration relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoinConfiguration($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Configuration relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoinConfiguration($relationAlias = null) Adds a INNER JOIN clause to the query using the Configuration relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoinDocumentRenderProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentRenderProcess relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoinDocumentRenderProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentRenderProcess relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoinDocumentRenderProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentRenderProcess relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery leftJoinInvoiceDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the InvoiceDocument relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery rightJoinInvoiceDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InvoiceDocument relation
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery innerJoinInvoiceDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the InvoiceDocument relation
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument matching the query
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument matching the query, or a new ProjectA_Zed_Document_Persistence_Propel_PacDocument object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the fk_sales_order column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByFkDocumentRenderEngine(int $fk_document_render_engine) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the fk_document_render_engine column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByFkDocumentConfiguration(int $fk_document_configuration) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the fk_document_configuration column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByData(string $data) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the data column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByTemplate(string $template) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the template column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the created_at column
 * @method ProjectA_Zed_Document_Persistence_Propel_PacDocument findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Document_Persistence_Propel_PacDocument filtered by the updated_at column
 *
 * @method array findByIdDocument(int $id_document) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the id_document column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the fk_sales_order column
 * @method array findByFkDocumentRenderEngine(int $fk_document_render_engine) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the fk_document_render_engine column
 * @method array findByFkDocumentConfiguration(int $fk_document_configuration) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the fk_document_configuration column
 * @method array findByData(string $data) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the data column
 * @method array findByTemplate(string $template) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the template column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Document_Persistence_Propel_PacDocument objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.om
 */
abstract class Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacDocument']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocument|ProjectA_Zed_Document_Persistence_Propel_PacDocument[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocument A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDocument($key, $con = null)
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
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocument A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_document`, `fk_sales_order`, `fk_document_render_engine`, `fk_document_configuration`, `data`, `template`, `created_at`, `updated_at` FROM `pac_document` WHERE `id_document` = :p0';
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
            $obj = new ProjectA_Zed_Document_Persistence_Propel_PacDocument();
            $obj->hydrate($row);
            ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument|ProjectA_Zed_Document_Persistence_Propel_PacDocument[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocument[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_document column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDocument(1234); // WHERE id_document = 1234
     * $query->filterByIdDocument(array(12, 34)); // WHERE id_document IN (12, 34)
     * $query->filterByIdDocument(array('min' => 12)); // WHERE id_document >= 12
     * $query->filterByIdDocument(array('max' => 12)); // WHERE id_document <= 12
     * </code>
     *
     * @param     mixed $idDocument The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByIdDocument($idDocument = null, $comparison = null)
    {
        if (is_array($idDocument)) {
            $useMinMax = false;
            if (isset($idDocument['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $idDocument['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDocument['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $idDocument['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $idDocument, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order >= 12
     * $query->filterByFkSalesOrder(array('max' => 12)); // WHERE fk_sales_order <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByFkDocumentRenderEngine($fkDocumentRenderEngine = null, $comparison = null)
    {
        if (is_array($fkDocumentRenderEngine)) {
            $useMinMax = false;
            if (isset($fkDocumentRenderEngine['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentRenderEngine['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $fkDocumentRenderEngine, $comparison);
    }

    /**
     * Filter the query on the fk_document_configuration column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDocumentConfiguration(1234); // WHERE fk_document_configuration = 1234
     * $query->filterByFkDocumentConfiguration(array(12, 34)); // WHERE fk_document_configuration IN (12, 34)
     * $query->filterByFkDocumentConfiguration(array('min' => 12)); // WHERE fk_document_configuration >= 12
     * $query->filterByFkDocumentConfiguration(array('max' => 12)); // WHERE fk_document_configuration <= 12
     * </code>
     *
     * @see       filterByConfiguration()
     *
     * @param     mixed $fkDocumentConfiguration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByFkDocumentConfiguration($fkDocumentConfiguration = null, $comparison = null)
    {
        if (is_array($fkDocumentConfiguration)) {
            $useMinMax = false;
            if (isset($fkDocumentConfiguration['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentConfiguration['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%'); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $data)) {
                $data = str_replace('*', '%', $data);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATA, $data, $comparison);
    }

    /**
     * Filter the query on the template column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplate('fooValue');   // WHERE template = 'fooValue'
     * $query->filterByTemplate('%fooValue%'); // WHERE template LIKE '%fooValue%'
     * </code>
     *
     * @param     string $template The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByTemplate($template = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($template)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $template)) {
                $template = str_replace('*', '%', $template);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::TEMPLATE, $template, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine|PropelObjectCollection $pacDocumentRenderEngine The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRenderEngine($pacDocumentRenderEngine, $comparison = null)
    {
        if ($pacDocumentRenderEngine instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $pacDocumentRenderEngine->getIdDocumentRenderEngine(), $comparison);
        } elseif ($pacDocumentRenderEngine instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $pacDocumentRenderEngine->toKeyValue('PrimaryKey', 'IdDocumentRenderEngine'), $comparison);
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration|PropelObjectCollection $pacDocumentConfiguration The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByConfiguration($pacDocumentConfiguration, $comparison = null)
    {
        if ($pacDocumentConfiguration instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $pacDocumentConfiguration->getIdDocumentConfiguration(), $comparison);
        } elseif ($pacDocumentConfiguration instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $pacDocumentConfiguration->toKeyValue('PrimaryKey', 'IdDocumentConfiguration'), $comparison);
        } else {
            throw new PropelException('filterByConfiguration() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Configuration relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function joinConfiguration($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Configuration');

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
            $this->addJoinObject($join, 'Configuration');
        }

        return $this;
    }

    /**
     * Use the Configuration relation PacDocumentConfiguration object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery A secondary query class using the current class as primary query
     */
    public function useConfigurationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinConfiguration($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Configuration', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess|PropelObjectCollection $pacDocumentRenderProcess  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentRenderProcess($pacDocumentRenderProcess, $comparison = null)
    {
        if ($pacDocumentRenderProcess instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $pacDocumentRenderProcess->getFkDocument(), $comparison);
        } elseif ($pacDocumentRenderProcess instanceof PropelObjectCollection) {
            return $this
                ->useDocumentRenderProcessQuery()
                ->filterByPrimaryKeys($pacDocumentRenderProcess->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocumentRenderProcess() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentRenderProcess relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function joinDocumentRenderProcess($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentRenderProcess');

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
            $this->addJoinObject($join, 'DocumentRenderProcess');
        }

        return $this;
    }

    /**
     * Use the DocumentRenderProcess relation PacDocumentRenderProcess object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcessQuery A secondary query class using the current class as primary query
     */
    public function useDocumentRenderProcessQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocumentRenderProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentRenderProcess', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcessQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument|PropelObjectCollection $pacInvoiceDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoiceDocument($pacInvoiceDocument, $comparison = null)
    {
        if ($pacInvoiceDocument instanceof ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $pacInvoiceDocument->getFkDocument(), $comparison);
        } elseif ($pacInvoiceDocument instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceDocumentQuery()
                ->filterByPrimaryKeys($pacInvoiceDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoiceDocument() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InvoiceDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function joinInvoiceDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InvoiceDocument');

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
            $this->addJoinObject($join, 'InvoiceDocument');
        }

        return $this;
    }

    /**
     * Use the InvoiceDocument relation PacInvoiceDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoiceDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InvoiceDocument', 'ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocument $pacDocument Object to remove from the list of results
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function prune($pacDocument = null)
    {
        if ($pacDocument) {
            $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $pacDocument->getIdDocument(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT);
    }
}
