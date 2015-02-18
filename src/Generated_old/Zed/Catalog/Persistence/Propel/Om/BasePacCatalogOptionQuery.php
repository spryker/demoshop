<?php


/**
 * Base class that represents a query for the 'pac_catalog_option' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByIdCatalogOption($order = Criteria::ASC) Order by the id_catalog_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByFkCatalogOptionType($order = Criteria::ASC) Order by the fk_catalog_option_type column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByIdentifier($order = Criteria::ASC) Order by the identifier column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByIdCatalogOption() Group by the id_catalog_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByFkCatalogOptionType() Group by the fk_catalog_option_type column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByIdentifier() Group by the identifier column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByPrice() Group by the price column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery leftJoinOptionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery rightJoinOptionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery innerJoinOptionType($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionType relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery leftJoinProductOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductOption relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery rightJoinProductOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductOption relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery innerJoinProductOption($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductOption relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByFkCatalogOptionType(int $fk_catalog_option_type) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the fk_catalog_option_type column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByIdentifier(string $identifier) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the identifier column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByName(string $name) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByDescription(string $description) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the description column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByPrice(int $price) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the price column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByTaxPercentage(int $tax_percentage) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the tax_percentage column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the created_at column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption filtered by the updated_at column
 *
 * @method array findByIdCatalogOption(int $id_catalog_option) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the id_catalog_option column
 * @method array findByFkCatalogOptionType(int $fk_catalog_option_type) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the fk_catalog_option_type column
 * @method array findByIdentifier(string $identifier) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the identifier column
 * @method array findByName(string $name) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the name column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the description column
 * @method array findByPrice(int $price) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the price column
 * @method array findByTaxPercentage(int $tax_percentage) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the tax_percentage column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogOptionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogOptionQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogOption']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogOption($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_option`, `fk_catalog_option_type`, `identifier`, `name`, `description`, `price`, `tax_percentage`, `created_at`, `updated_at` FROM `pac_catalog_option` WHERE `id_catalog_option` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogOption(1234); // WHERE id_catalog_option = 1234
     * $query->filterByIdCatalogOption(array(12, 34)); // WHERE id_catalog_option IN (12, 34)
     * $query->filterByIdCatalogOption(array('min' => 12)); // WHERE id_catalog_option >= 12
     * $query->filterByIdCatalogOption(array('max' => 12)); // WHERE id_catalog_option <= 12
     * </code>
     *
     * @param     mixed $idCatalogOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByIdCatalogOption($idCatalogOption = null, $comparison = null)
    {
        if (is_array($idCatalogOption)) {
            $useMinMax = false;
            if (isset($idCatalogOption['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $idCatalogOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogOption['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $idCatalogOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $idCatalogOption, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_option_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogOptionType(1234); // WHERE fk_catalog_option_type = 1234
     * $query->filterByFkCatalogOptionType(array(12, 34)); // WHERE fk_catalog_option_type IN (12, 34)
     * $query->filterByFkCatalogOptionType(array('min' => 12)); // WHERE fk_catalog_option_type >= 12
     * $query->filterByFkCatalogOptionType(array('max' => 12)); // WHERE fk_catalog_option_type <= 12
     * </code>
     *
     * @see       filterByOptionType()
     *
     * @param     mixed $fkCatalogOptionType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByFkCatalogOptionType($fkCatalogOptionType = null, $comparison = null)
    {
        if (is_array($fkCatalogOptionType)) {
            $useMinMax = false;
            if (isset($fkCatalogOptionType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, $fkCatalogOptionType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogOptionType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, $fkCatalogOptionType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, $fkCatalogOptionType, $comparison);
    }

    /**
     * Filter the query on the identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentifier('fooValue');   // WHERE identifier = 'fooValue'
     * $query->filterByIdentifier('%fooValue%'); // WHERE identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByIdentifier($identifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identifier)) {
                $identifier = str_replace('*', '%', $identifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::IDENTIFIER, $identifier, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price >= 12
     * $query->filterByPrice(array('max' => 12)); // WHERE price <= 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::PRICE, $price, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionType object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionType|PropelObjectCollection $pacCatalogOptionType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionType($pacCatalogOptionType, $comparison = null)
    {
        if ($pacCatalogOptionType instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, $pacCatalogOptionType->getIdCatalogOptionType(), $comparison);
        } elseif ($pacCatalogOptionType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, $pacCatalogOptionType->toKeyValue('PrimaryKey', 'IdCatalogOptionType'), $comparison);
        } else {
            throw new PropelException('filterByOptionType() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function joinOptionType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionType');

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
            $this->addJoinObject($join, 'OptionType');
        }

        return $this;
    }

    /**
     * Use the OptionType relation PacCatalogOptionType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionTypeQuery A secondary query class using the current class as primary query
     */
    public function useOptionTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionType', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption|PropelObjectCollection $pacCatalogProductOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductOption($pacCatalogProductOption, $comparison = null)
    {
        if ($pacCatalogProductOption instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $pacCatalogProductOption->getFkCatalogOption(), $comparison);
        } elseif ($pacCatalogProductOption instanceof PropelObjectCollection) {
            return $this
                ->useProductOptionQuery()
                ->filterByPrimaryKeys($pacCatalogProductOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductOption() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductOption relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function joinProductOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductOption');

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
            $this->addJoinObject($join, 'ProductOption');
        }

        return $this;
    }

    /**
     * Use the ProductOption relation PacCatalogProductOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery A secondary query class using the current class as primary query
     */
    public function useProductOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductOption', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery');
    }

    /**
     * Filter the query by a related PacCatalogProduct object
     * using the pac_catalog_product_option table as cross reference
     *
     * @param   PacCatalogProduct $pacCatalogProduct the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function filterByProductEntity($pacCatalogProduct, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useProductOptionQuery()
            ->filterByProductEntity($pacCatalogProduct, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $pacCatalogOption Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function prune($pacCatalogOption = null)
    {
        if ($pacCatalogOption) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::ID_CATALOG_OPTION, $pacCatalogOption->getIdCatalogOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionPeer::CREATED_AT);
    }
}
