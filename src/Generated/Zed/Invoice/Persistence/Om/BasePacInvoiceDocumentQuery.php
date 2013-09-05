<?php


/**
 * Base class that represents a query for the 'pac_invoice_document' table.
 *
 *
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByIdInvoiceDocument($order = Criteria::ASC) Order by the id_invoice_document column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByFkInvoice($order = Criteria::ASC) Order by the fk_invoice column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByLayoutType($order = Criteria::ASC) Order by the layout_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByContentType($order = Criteria::ASC) Order by the content_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByIdInvoiceDocument() Group by the id_invoice_document column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByFkInvoice() Group by the fk_invoice column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByContent() Group by the content column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByLayoutType() Group by the layout_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByContentType() Group by the content_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByFilename() Group by the filename column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery leftJoinInvoice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery rightJoinInvoice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery innerJoinInvoice($relationAlias = null) Adds a INNER JOIN clause to the query using the Invoice relation
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument matching the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument matching the query, or a new ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByFkInvoice(int $fk_invoice) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the fk_invoice column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByContent(resource $content) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the content column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByLayoutType(int $layout_type) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the layout_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByContentType(int $content_type) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the content_type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByFilename(string $filename) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the filename column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument filtered by the updated_at column
 *
 * @method array findByIdInvoiceDocument(int $id_invoice_document) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the id_invoice_document column
 * @method array findByFkInvoice(int $fk_invoice) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the fk_invoice column
 * @method array findByContent(resource $content) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the content column
 * @method array findByLayoutType(int $layout_type) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the layout_type column
 * @method array findByContentType(int $content_type) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the content_type column
 * @method array findByFilename(string $filename) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the filename column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Invoice/Persistence.om
 */
abstract class Generated_Zed_Invoice_Persistence_Om_BasePacInvoiceDocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Invoice_Persistence_Om_BasePacInvoiceDocumentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery();
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
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument|ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdInvoiceDocument($key, $con = null)
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
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_invoice_document`, `fk_invoice`, `content`, `layout_type`, `content_type`, `filename`, `created_at`, `updated_at` FROM `pac_invoice_document` WHERE `id_invoice_document` = :p0';
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
            $obj = new ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument();
            $obj->hydrate($row);
            ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument|ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_invoice_document column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInvoiceDocument(1234); // WHERE id_invoice_document = 1234
     * $query->filterByIdInvoiceDocument(array(12, 34)); // WHERE id_invoice_document IN (12, 34)
     * $query->filterByIdInvoiceDocument(array('min' => 12)); // WHERE id_invoice_document >= 12
     * $query->filterByIdInvoiceDocument(array('max' => 12)); // WHERE id_invoice_document <= 12
     * </code>
     *
     * @param     mixed $idInvoiceDocument The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByIdInvoiceDocument($idInvoiceDocument = null, $comparison = null)
    {
        if (is_array($idInvoiceDocument)) {
            $useMinMax = false;
            if (isset($idInvoiceDocument['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $idInvoiceDocument['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idInvoiceDocument['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $idInvoiceDocument['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $idInvoiceDocument, $comparison);
    }

    /**
     * Filter the query on the fk_invoice column
     *
     * Example usage:
     * <code>
     * $query->filterByFkInvoice(1234); // WHERE fk_invoice = 1234
     * $query->filterByFkInvoice(array(12, 34)); // WHERE fk_invoice IN (12, 34)
     * $query->filterByFkInvoice(array('min' => 12)); // WHERE fk_invoice >= 12
     * $query->filterByFkInvoice(array('max' => 12)); // WHERE fk_invoice <= 12
     * </code>
     *
     * @see       filterByInvoice()
     *
     * @param     mixed $fkInvoice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByFkInvoice($fkInvoice = null, $comparison = null)
    {
        if (is_array($fkInvoice)) {
            $useMinMax = false;
            if (isset($fkInvoice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FK_INVOICE, $fkInvoice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkInvoice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FK_INVOICE, $fkInvoice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FK_INVOICE, $fkInvoice, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * @param     mixed $content The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the layout_type column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutType(1234); // WHERE layout_type = 1234
     * $query->filterByLayoutType(array(12, 34)); // WHERE layout_type IN (12, 34)
     * $query->filterByLayoutType(array('min' => 12)); // WHERE layout_type >= 12
     * $query->filterByLayoutType(array('max' => 12)); // WHERE layout_type <= 12
     * </code>
     *
     * @param     mixed $layoutType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByLayoutType($layoutType = null, $comparison = null)
    {
        if (is_array($layoutType)) {
            $useMinMax = false;
            if (isset($layoutType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::LAYOUT_TYPE, $layoutType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::LAYOUT_TYPE, $layoutType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::LAYOUT_TYPE, $layoutType, $comparison);
    }

    /**
     * Filter the query on the content_type column
     *
     * @param     mixed $contentType The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByContentType($contentType = null, $comparison = null)
    {
        if (is_scalar($contentType)) {
            $contentType = ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CONTENT_TYPE, $contentType);
        } elseif (is_array($contentType)) {
            $convertedValues = array();
            foreach ($contentType as $value) {
                $convertedValues[] = ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CONTENT_TYPE, $value);
            }
            $contentType = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CONTENT_TYPE, $contentType, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FILENAME, $filename, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_PacInvoice object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoice|PropelObjectCollection $pacInvoice The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoice($pacInvoice, $comparison = null)
    {
        if ($pacInvoice instanceof ProjectA_Zed_Invoice_Persistence_PacInvoice) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FK_INVOICE, $pacInvoice->getIdInvoice(), $comparison);
        } elseif ($pacInvoice instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::FK_INVOICE, $pacInvoice->toKeyValue('PrimaryKey', 'IdInvoice'), $comparison);
        } else {
            throw new PropelException('filterByInvoice() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_PacInvoice or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Invoice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
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
     * Use the Invoice relation PacInvoice object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Invoice', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument $pacInvoiceDocument Object to remove from the list of results
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function prune($pacInvoiceDocument = null)
    {
        if ($pacInvoiceDocument) {
            $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::ID_INVOICE_DOCUMENT, $pacInvoiceDocument->getIdInvoiceDocument(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentPeer::CREATED_AT);
    }
}
