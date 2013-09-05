<?php


/**
 * Base class that represents a query for the 'pac_invoice' table.
 *
 *
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByIdInvoice($order = Criteria::ASC) Order by the id_invoice column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByInvoiceNumber($order = Criteria::ASC) Order by the invoice_number column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByCurrencyCode($order = Criteria::ASC) Order by the currency_code column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByIdInvoice() Group by the id_invoice column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByInvoiceNumber() Group by the invoice_number column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByNote() Group by the note column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByCurrencyCode() Group by the currency_code column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery leftJoinInvoiceItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the InvoiceItem relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery rightJoinInvoiceItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InvoiceItem relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery innerJoinInvoiceItem($relationAlias = null) Adds a INNER JOIN clause to the query using the InvoiceItem relation
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery leftJoinInvoiceDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the InvoiceDocument relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery rightJoinInvoiceDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InvoiceDocument relation
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery innerJoinInvoiceDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the InvoiceDocument relation
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice matching the query
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice matching the query, or a new ProjectA_Zed_Invoice_Persistence_PacInvoice object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByInvoiceNumber(string $invoice_number) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the invoice_number column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the fk_sales_order column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByNote(string $note) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the note column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByCurrencyCode(string $currency_code) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the currency_code column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByType(int $type) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the type column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_PacInvoice findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Invoice_Persistence_PacInvoice filtered by the updated_at column
 *
 * @method array findByIdInvoice(int $id_invoice) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the id_invoice column
 * @method array findByInvoiceNumber(string $invoice_number) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the invoice_number column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the fk_sales_order column
 * @method array findByNote(string $note) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the note column
 * @method array findByCurrencyCode(string $currency_code) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the currency_code column
 * @method array findByType(int $type) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the type column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Invoice_Persistence_PacInvoice objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Invoice/Persistence.om
 */
abstract class Generated_Zed_Invoice_Persistence_Om_BasePacInvoiceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Invoice_Persistence_Om_BasePacInvoiceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Invoice_Persistence_PacInvoice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery();
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
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoice|ProjectA_Zed_Invoice_Persistence_PacInvoice[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoice A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdInvoice($key, $con = null)
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
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoice A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_invoice`, `invoice_number`, `fk_sales_order`, `note`, `currency_code`, `type`, `created_at`, `updated_at` FROM `pac_invoice` WHERE `id_invoice` = :p0';
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
            $obj = new ProjectA_Zed_Invoice_Persistence_PacInvoice();
            $obj->hydrate($row);
            ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoice|ProjectA_Zed_Invoice_Persistence_PacInvoice[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_PacInvoice[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_invoice column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInvoice(1234); // WHERE id_invoice = 1234
     * $query->filterByIdInvoice(array(12, 34)); // WHERE id_invoice IN (12, 34)
     * $query->filterByIdInvoice(array('min' => 12)); // WHERE id_invoice >= 12
     * $query->filterByIdInvoice(array('max' => 12)); // WHERE id_invoice <= 12
     * </code>
     *
     * @param     mixed $idInvoice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByIdInvoice($idInvoice = null, $comparison = null)
    {
        if (is_array($idInvoice)) {
            $useMinMax = false;
            if (isset($idInvoice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $idInvoice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idInvoice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $idInvoice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $idInvoice, $comparison);
    }

    /**
     * Filter the query on the invoice_number column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceNumber('fooValue');   // WHERE invoice_number = 'fooValue'
     * $query->filterByInvoiceNumber('%fooValue%'); // WHERE invoice_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invoiceNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByInvoiceNumber($invoiceNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invoiceNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $invoiceNumber)) {
                $invoiceNumber = str_replace('*', '%', $invoiceNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::INVOICE_NUMBER, $invoiceNumber, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the currency_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyCode('fooValue');   // WHERE currency_code = 'fooValue'
     * $query->filterByCurrencyCode('%fooValue%'); // WHERE currency_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currencyCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByCurrencyCode($currencyCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currencyCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $currencyCode)) {
                $currencyCode = str_replace('*', '%', $currencyCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CURRENCY_CODE, $currencyCode, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_scalar($type)) {
            $type = ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::TYPE, $type);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                $convertedValues[] = ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::TYPE, $value);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::TYPE, $type, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_PacInvoiceItem object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceItem|PropelObjectCollection $pacInvoiceItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoiceItem($pacInvoiceItem, $comparison = null)
    {
        if ($pacInvoiceItem instanceof ProjectA_Zed_Invoice_Persistence_PacInvoiceItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $pacInvoiceItem->getFkInvoice(), $comparison);
        } elseif ($pacInvoiceItem instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceItemQuery()
                ->filterByPrimaryKeys($pacInvoiceItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoiceItem() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_PacInvoiceItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InvoiceItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function joinInvoiceItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InvoiceItem');

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
            $this->addJoinObject($join, 'InvoiceItem');
        }

        return $this;
    }

    /**
     * Use the InvoiceItem relation PacInvoiceItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoiceItemQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoiceItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InvoiceItem', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument|PropelObjectCollection $pacInvoiceDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoiceDocument($pacInvoiceDocument, $comparison = null)
    {
        if ($pacInvoiceDocument instanceof ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $pacInvoiceDocument->getFkInvoice(), $comparison);
        } elseif ($pacInvoiceDocument instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceDocumentQuery()
                ->filterByPrimaryKeys($pacInvoiceDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoiceDocument() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InvoiceDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoiceDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InvoiceDocument', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoice $pacInvoice Object to remove from the list of results
     *
     * @return ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function prune($pacInvoice = null)
    {
        if ($pacInvoice) {
            $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::ID_INVOICE, $pacInvoice->getIdInvoice(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::CREATED_AT);
    }
}
