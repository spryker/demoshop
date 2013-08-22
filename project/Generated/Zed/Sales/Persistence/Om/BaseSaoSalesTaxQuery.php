<?php


/**
 * Base class that represents a query for the 'sao_sales_tax' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByIdSalesTax($order = Criteria::ASC) Order by the id_sales_tax column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByName1($order = Criteria::ASC) Order by the name1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByName2($order = Criteria::ASC) Order by the name2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByName3($order = Criteria::ASC) Order by the name3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByIdSalesTax() Group by the id_sales_tax column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByZipCode() Group by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByName1() Group by the name1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByName2() Group by the name2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByName3() Group by the name3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesTaxQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesTax object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByTaxPercentage(string $tax_percentage) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the tax_percentage column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByFkMiscCountry(int $fk_misc_country) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByZipCode(string $zip_code) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByName1(string $name1) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the name1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByName2(string $name2) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the name2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByName3(string $name3) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the name3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesTax findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesTax filtered by the updated_at column
 *
 * @method array findByIdSalesTax(int $id_sales_tax) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the id_sales_tax column
 * @method array findByTaxPercentage(string $tax_percentage) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the tax_percentage column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the fk_misc_country column
 * @method array findByZipCode(string $zip_code) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the zip_code column
 * @method array findByName1(string $name1) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the name1 column
 * @method array findByName2(string $name2) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the name2 column
 * @method array findByName3(string $name3) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the name3 column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Sales_Persistence_SaoSalesTax objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesTaxQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesTaxQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesTax', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesTaxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesTaxQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesTaxQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesTaxQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesTax|Sao_Zed_Sales_Persistence_SaoSalesTax[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesTax A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesTax($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesTax A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_tax`, `tax_percentage`, `fk_misc_country`, `zip_code`, `name1`, `name2`, `name3`, `created_at`, `updated_at` FROM `sao_sales_tax` WHERE `id_sales_tax` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesTax();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesTax|Sao_Zed_Sales_Persistence_SaoSalesTax[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesTax[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesTax(1234); // WHERE id_sales_tax = 1234
     * $query->filterByIdSalesTax(array(12, 34)); // WHERE id_sales_tax IN (12, 34)
     * $query->filterByIdSalesTax(array('min' => 12)); // WHERE id_sales_tax >= 12
     * $query->filterByIdSalesTax(array('max' => 12)); // WHERE id_sales_tax <= 12
     * </code>
     *
     * @param     mixed $idSalesTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByIdSalesTax($idSalesTax = null, $comparison = null)
    {
        if (is_array($idSalesTax)) {
            $useMinMax = false;
            if (isset($idSalesTax['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $idSalesTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesTax['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $idSalesTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $idSalesTax, $comparison);
    }

    /**
     * Filter the query on the tax_percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxPercentage(1234); // WHERE tax_percentage = 1234
     * $query->filterByTaxPercentage(array(12, 34)); // WHERE tax_percentage IN (12, 34)
     * $query->filterByTaxPercentage(array('min' => 12)); // WHERE tax_percentage >= 12
     * $query->filterByTaxPercentage(array('max' => 12)); // WHERE tax_percentage <= 12
     * </code>
     *
     * @param     mixed $taxPercentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the fk_misc_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscCountry(1234); // WHERE fk_misc_country = 1234
     * $query->filterByFkMiscCountry(array(12, 34)); // WHERE fk_misc_country IN (12, 34)
     * $query->filterByFkMiscCountry(array('min' => 12)); // WHERE fk_misc_country >= 12
     * $query->filterByFkMiscCountry(array('max' => 12)); // WHERE fk_misc_country <= 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $fkMiscCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
    }

    /**
     * Filter the query on the zip_code column
     *
     * Example usage:
     * <code>
     * $query->filterByZipCode('fooValue');   // WHERE zip_code = 'fooValue'
     * $query->filterByZipCode('%fooValue%'); // WHERE zip_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByZipCode($zipCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipCode)) {
                $zipCode = str_replace('*', '%', $zipCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the name1 column
     *
     * Example usage:
     * <code>
     * $query->filterByName1('fooValue');   // WHERE name1 = 'fooValue'
     * $query->filterByName1('%fooValue%'); // WHERE name1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByName1($name1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name1)) {
                $name1 = str_replace('*', '%', $name1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::NAME1, $name1, $comparison);
    }

    /**
     * Filter the query on the name2 column
     *
     * Example usage:
     * <code>
     * $query->filterByName2('fooValue');   // WHERE name2 = 'fooValue'
     * $query->filterByName2('%fooValue%'); // WHERE name2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByName2($name2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name2)) {
                $name2 = str_replace('*', '%', $name2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::NAME2, $name2, $comparison);
    }

    /**
     * Filter the query on the name3 column
     *
     * Example usage:
     * <code>
     * $query->filterByName3('fooValue');   // WHERE name3 = 'fooValue'
     * $query->filterByName3('%fooValue%'); // WHERE name3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByName3($name3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name3)) {
                $name3 = str_replace('*', '%', $name3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::NAME3, $name3, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_PacMiscCountry) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type ProjectA_Zed_Misc_Persistence_PacMiscCountry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation PacMiscCountry object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesTax $saoSalesTax Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function prune($saoSalesTax = null)
    {
        if ($saoSalesTax) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::ID_SALES_TAX, $saoSalesTax->getIdSalesTax(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesTaxQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesTaxPeer::CREATED_AT);
    }
}
