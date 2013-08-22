<?php


/**
 * Base class that represents a query for the 'sao_catalog_sold_limited_edition' table.
 *
 *
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery orderByIdCatalogSoldLimitedEdition($order = Criteria::ASC) Order by the id_catalog_sold_limited_edition column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery orderByEditionIdentifier($order = Criteria::ASC) Order by the edition_identifier column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery groupByIdCatalogSoldLimitedEdition() Group by the id_catalog_sold_limited_edition column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery groupByEditionIdentifier() Group by the edition_identifier column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOne(PropelPDO $con = null) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition matching the query
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition matching the query, or a new Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOneByFkCatalogProduct(int $fk_catalog_product) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition filtered by the fk_catalog_product column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOneByEditionIdentifier(string $edition_identifier) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition filtered by the edition_identifier column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition filtered by the created_at column
 * @method Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition filtered by the updated_at column
 *
 * @method array findByIdCatalogSoldLimitedEdition(int $id_catalog_sold_limited_edition) Return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects filtered by the id_catalog_sold_limited_edition column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects filtered by the fk_catalog_product column
 * @method array findByEditionIdentifier(string $edition_identifier) Return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects filtered by the edition_identifier column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BaseSaoCatalogSoldLimitedEditionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BaseSaoCatalogSoldLimitedEditionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery();
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
     * @return   Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition|Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogSoldLimitedEdition($key, $con = null)
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
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_sold_limited_edition`, `fk_catalog_product`, `edition_identifier`, `created_at`, `updated_at` FROM `sao_catalog_sold_limited_edition` WHERE `id_catalog_sold_limited_edition` = :p0';
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
            $obj = new Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition();
            $obj->hydrate($row);
            Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition|Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_sold_limited_edition column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogSoldLimitedEdition(1234); // WHERE id_catalog_sold_limited_edition = 1234
     * $query->filterByIdCatalogSoldLimitedEdition(array(12, 34)); // WHERE id_catalog_sold_limited_edition IN (12, 34)
     * $query->filterByIdCatalogSoldLimitedEdition(array('min' => 12)); // WHERE id_catalog_sold_limited_edition >= 12
     * $query->filterByIdCatalogSoldLimitedEdition(array('max' => 12)); // WHERE id_catalog_sold_limited_edition <= 12
     * </code>
     *
     * @param     mixed $idCatalogSoldLimitedEdition The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByIdCatalogSoldLimitedEdition($idCatalogSoldLimitedEdition = null, $comparison = null)
    {
        if (is_array($idCatalogSoldLimitedEdition)) {
            $useMinMax = false;
            if (isset($idCatalogSoldLimitedEdition['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $idCatalogSoldLimitedEdition['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogSoldLimitedEdition['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $idCatalogSoldLimitedEdition['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $idCatalogSoldLimitedEdition, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProduct(1234); // WHERE fk_catalog_product = 1234
     * $query->filterByFkCatalogProduct(array(12, 34)); // WHERE fk_catalog_product IN (12, 34)
     * $query->filterByFkCatalogProduct(array('min' => 12)); // WHERE fk_catalog_product >= 12
     * $query->filterByFkCatalogProduct(array('max' => 12)); // WHERE fk_catalog_product <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the edition_identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByEditionIdentifier('fooValue');   // WHERE edition_identifier = 'fooValue'
     * $query->filterByEditionIdentifier('%fooValue%'); // WHERE edition_identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editionIdentifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByEditionIdentifier($editionIdentifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editionIdentifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $editionIdentifier)) {
                $editionIdentifier = str_replace('*', '%', $editionIdentifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::EDITION_IDENTIFIER, $editionIdentifier, $comparison);
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProduct) {
            return $this
                ->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition $saoCatalogSoldLimitedEdition Object to remove from the list of results
     *
     * @return Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function prune($saoCatalogSoldLimitedEdition = null)
    {
        if ($saoCatalogSoldLimitedEdition) {
            $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::ID_CATALOG_SOLD_LIMITED_EDITION, $saoCatalogSoldLimitedEdition->getIdCatalogSoldLimitedEdition(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionPeer::CREATED_AT);
    }
}
