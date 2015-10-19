<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPriceProduct as ChildSpyPriceProduct;
use Propel\SpyPriceProductQuery as ChildSpyPriceProductQuery;
use Propel\Map\SpyPriceProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_price_product' table.
 *
 *
 *
 * @method     ChildSpyPriceProductQuery orderByIdPriceProduct($order = Criteria::ASC) Order by the id_price_product column
 * @method     ChildSpyPriceProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSpyPriceProductQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpyPriceProductQuery orderByFkPriceType($order = Criteria::ASC) Order by the fk_price_type column
 * @method     ChildSpyPriceProductQuery orderByFkAbstractProduct($order = Criteria::ASC) Order by the fk_abstract_product column
 *
 * @method     ChildSpyPriceProductQuery groupByIdPriceProduct() Group by the id_price_product column
 * @method     ChildSpyPriceProductQuery groupByPrice() Group by the price column
 * @method     ChildSpyPriceProductQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpyPriceProductQuery groupByFkPriceType() Group by the fk_price_type column
 * @method     ChildSpyPriceProductQuery groupByFkAbstractProduct() Group by the fk_abstract_product column
 *
 * @method     ChildSpyPriceProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPriceProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPriceProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPriceProductQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildSpyPriceProductQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildSpyPriceProductQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildSpyPriceProductQuery leftJoinPriceType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceType relation
 * @method     ChildSpyPriceProductQuery rightJoinPriceType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceType relation
 * @method     ChildSpyPriceProductQuery innerJoinPriceType($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceType relation
 *
 * @method     ChildSpyPriceProductQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyPriceProductQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyPriceProductQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     \Propel\SpyProductQuery|\Propel\SpyPriceTypeQuery|\Propel\SpyAbstractProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPriceProduct findOne(ConnectionInterface $con = null) Return the first ChildSpyPriceProduct matching the query
 * @method     ChildSpyPriceProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPriceProduct matching the query, or a new ChildSpyPriceProduct object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPriceProduct findOneByIdPriceProduct(int $id_price_product) Return the first ChildSpyPriceProduct filtered by the id_price_product column
 * @method     ChildSpyPriceProduct findOneByPrice(int $price) Return the first ChildSpyPriceProduct filtered by the price column
 * @method     ChildSpyPriceProduct findOneByFkProduct(int $fk_product) Return the first ChildSpyPriceProduct filtered by the fk_product column
 * @method     ChildSpyPriceProduct findOneByFkPriceType(int $fk_price_type) Return the first ChildSpyPriceProduct filtered by the fk_price_type column
 * @method     ChildSpyPriceProduct findOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyPriceProduct filtered by the fk_abstract_product column *

 * @method     ChildSpyPriceProduct requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPriceProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceProduct requireOne(ConnectionInterface $con = null) Return the first ChildSpyPriceProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPriceProduct requireOneByIdPriceProduct(int $id_price_product) Return the first ChildSpyPriceProduct filtered by the id_price_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceProduct requireOneByPrice(int $price) Return the first ChildSpyPriceProduct filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceProduct requireOneByFkProduct(int $fk_product) Return the first ChildSpyPriceProduct filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceProduct requireOneByFkPriceType(int $fk_price_type) Return the first ChildSpyPriceProduct filtered by the fk_price_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceProduct requireOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyPriceProduct filtered by the fk_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPriceProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPriceProduct objects based on current ModelCriteria
 * @method     ChildSpyPriceProduct[]|ObjectCollection findByIdPriceProduct(int $id_price_product) Return ChildSpyPriceProduct objects filtered by the id_price_product column
 * @method     ChildSpyPriceProduct[]|ObjectCollection findByPrice(int $price) Return ChildSpyPriceProduct objects filtered by the price column
 * @method     ChildSpyPriceProduct[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyPriceProduct objects filtered by the fk_product column
 * @method     ChildSpyPriceProduct[]|ObjectCollection findByFkPriceType(int $fk_price_type) Return ChildSpyPriceProduct objects filtered by the fk_price_type column
 * @method     ChildSpyPriceProduct[]|ObjectCollection findByFkAbstractProduct(int $fk_abstract_product) Return ChildSpyPriceProduct objects filtered by the fk_abstract_product column
 * @method     ChildSpyPriceProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPriceProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPriceProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPriceProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPriceProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPriceProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPriceProductQuery) {
            return $criteria;
        }
        $query = new ChildSpyPriceProductQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyPriceProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPriceProductTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPriceProductTableMap::DATABASE_NAME);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPriceProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_price_product, price, fk_product, fk_price_type, fk_abstract_product FROM spy_price_product WHERE id_price_product = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyPriceProduct $obj */
            $obj = new ChildSpyPriceProduct();
            $obj->hydrate($row);
            SpyPriceProductTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpyPriceProduct|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_price_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPriceProduct(1234); // WHERE id_price_product = 1234
     * $query->filterByIdPriceProduct(array(12, 34)); // WHERE id_price_product IN (12, 34)
     * $query->filterByIdPriceProduct(array('min' => 12)); // WHERE id_price_product > 12
     * </code>
     *
     * @param     mixed $idPriceProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByIdPriceProduct($idPriceProduct = null, $comparison = null)
    {
        if (is_array($idPriceProduct)) {
            $useMinMax = false;
            if (isset($idPriceProduct['min'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $idPriceProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPriceProduct['max'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $idPriceProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $idPriceProduct, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product > 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_price_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPriceType(1234); // WHERE fk_price_type = 1234
     * $query->filterByFkPriceType(array(12, 34)); // WHERE fk_price_type IN (12, 34)
     * $query->filterByFkPriceType(array('min' => 12)); // WHERE fk_price_type > 12
     * </code>
     *
     * @see       filterByPriceType()
     *
     * @param     mixed $fkPriceType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByFkPriceType($fkPriceType = null, $comparison = null)
    {
        if (is_array($fkPriceType)) {
            $useMinMax = false;
            if (isset($fkPriceType['min'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRICE_TYPE, $fkPriceType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPriceType['max'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRICE_TYPE, $fkPriceType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRICE_TYPE, $fkPriceType, $comparison);
    }

    /**
     * Filter the query on the fk_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAbstractProduct(1234); // WHERE fk_abstract_product = 1234
     * $query->filterByFkAbstractProduct(array(12, 34)); // WHERE fk_abstract_product IN (12, 34)
     * $query->filterByFkAbstractProduct(array('min' => 12)); // WHERE fk_abstract_product > 12
     * </code>
     *
     * @see       filterBySpyAbstractProduct()
     *
     * @param     mixed $fkAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByFkAbstractProduct($fkAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkAbstractProduct['min'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAbstractProduct['max'])) {
                $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * Use the Product relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPriceType object
     *
     * @param \Propel\SpyPriceType|ObjectCollection $spyPriceType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterByPriceType($spyPriceType, $comparison = null)
    {
        if ($spyPriceType instanceof \Propel\SpyPriceType) {
            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRICE_TYPE, $spyPriceType->getIdPriceType(), $comparison);
        } elseif ($spyPriceType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_PRICE_TYPE, $spyPriceType->toKeyValue('PrimaryKey', 'IdPriceType'), $comparison);
        } else {
            throw new PropelException('filterByPriceType() only accepts arguments of type \Propel\SpyPriceType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PriceType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function joinPriceType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PriceType');

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
            $this->addJoinObject($join, 'PriceType');
        }

        return $this;
    }

    /**
     * Use the PriceType relation SpyPriceType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPriceTypeQuery A secondary query class using the current class as primary query
     */
    public function usePriceTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPriceType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PriceType', '\Propel\SpyPriceTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyAbstractProduct() only accepts arguments of type \Propel\SpyAbstractProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAbstractProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function joinSpyAbstractProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAbstractProduct');

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
            $this->addJoinObject($join, 'SpyAbstractProduct');
        }

        return $this;
    }

    /**
     * Use the SpyAbstractProduct relation SpyAbstractProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyAbstractProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAbstractProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPriceProduct $spyPriceProduct Object to remove from the list of results
     *
     * @return $this|ChildSpyPriceProductQuery The current query, for fluid interface
     */
    public function prune($spyPriceProduct = null)
    {
        if ($spyPriceProduct) {
            $this->addUsingAlias(SpyPriceProductTableMap::COL_ID_PRICE_PRODUCT, $spyPriceProduct->getIdPriceProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_price_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPriceProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPriceProductTableMap::clearInstancePool();
            SpyPriceProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPriceProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPriceProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPriceProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPriceProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyPriceProductQuery
