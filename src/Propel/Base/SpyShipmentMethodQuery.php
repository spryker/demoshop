<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyShipmentMethod as ChildSpyShipmentMethod;
use Propel\SpyShipmentMethodQuery as ChildSpyShipmentMethodQuery;
use Propel\Map\SpyShipmentMethodTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_shipment_method' table.
 *
 *
 *
 * @method     ChildSpyShipmentMethodQuery orderByIdShipmentMethod($order = Criteria::ASC) Order by the id_shipment_method column
 * @method     ChildSpyShipmentMethodQuery orderByFkShipmentCarrier($order = Criteria::ASC) Order by the fk_shipment_carrier column
 * @method     ChildSpyShipmentMethodQuery orderByFkTaxSet($order = Criteria::ASC) Order by the fk_tax_set column
 * @method     ChildSpyShipmentMethodQuery orderByGlossaryKeyName($order = Criteria::ASC) Order by the glossary_key_name column
 * @method     ChildSpyShipmentMethodQuery orderByGlossaryKeyDescription($order = Criteria::ASC) Order by the glossary_key_description column
 * @method     ChildSpyShipmentMethodQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyShipmentMethodQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildSpyShipmentMethodQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSpyShipmentMethodQuery orderByAvailabilityPlugin($order = Criteria::ASC) Order by the availability_plugin column
 * @method     ChildSpyShipmentMethodQuery orderByPriceCalculationPlugin($order = Criteria::ASC) Order by the price_calculation_plugin column
 * @method     ChildSpyShipmentMethodQuery orderByDeliveryTimePlugin($order = Criteria::ASC) Order by the delivery_time_plugin column
 * @method     ChildSpyShipmentMethodQuery orderByTaxCalculationPlugin($order = Criteria::ASC) Order by the tax_calculation_plugin column
 *
 * @method     ChildSpyShipmentMethodQuery groupByIdShipmentMethod() Group by the id_shipment_method column
 * @method     ChildSpyShipmentMethodQuery groupByFkShipmentCarrier() Group by the fk_shipment_carrier column
 * @method     ChildSpyShipmentMethodQuery groupByFkTaxSet() Group by the fk_tax_set column
 * @method     ChildSpyShipmentMethodQuery groupByGlossaryKeyName() Group by the glossary_key_name column
 * @method     ChildSpyShipmentMethodQuery groupByGlossaryKeyDescription() Group by the glossary_key_description column
 * @method     ChildSpyShipmentMethodQuery groupByName() Group by the name column
 * @method     ChildSpyShipmentMethodQuery groupByIsActive() Group by the is_active column
 * @method     ChildSpyShipmentMethodQuery groupByPrice() Group by the price column
 * @method     ChildSpyShipmentMethodQuery groupByAvailabilityPlugin() Group by the availability_plugin column
 * @method     ChildSpyShipmentMethodQuery groupByPriceCalculationPlugin() Group by the price_calculation_plugin column
 * @method     ChildSpyShipmentMethodQuery groupByDeliveryTimePlugin() Group by the delivery_time_plugin column
 * @method     ChildSpyShipmentMethodQuery groupByTaxCalculationPlugin() Group by the tax_calculation_plugin column
 *
 * @method     ChildSpyShipmentMethodQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyShipmentMethodQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyShipmentMethodQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyShipmentMethodQuery leftJoinShipmentCarrier($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentCarrier relation
 * @method     ChildSpyShipmentMethodQuery rightJoinShipmentCarrier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentCarrier relation
 * @method     ChildSpyShipmentMethodQuery innerJoinShipmentCarrier($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentCarrier relation
 *
 * @method     ChildSpyShipmentMethodQuery leftJoinTaxSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the TaxSet relation
 * @method     ChildSpyShipmentMethodQuery rightJoinTaxSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TaxSet relation
 * @method     ChildSpyShipmentMethodQuery innerJoinTaxSet($relationAlias = null) Adds a INNER JOIN clause to the query using the TaxSet relation
 *
 * @method     ChildSpyShipmentMethodQuery leftJoinShipmentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyShipmentMethodQuery rightJoinShipmentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyShipmentMethodQuery innerJoinShipmentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentMethods relation
 *
 * @method     \Propel\SpyShipmentCarrierQuery|\Propel\SpyTaxSetQuery|\Propel\SpySalesOrderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyShipmentMethod findOne(ConnectionInterface $con = null) Return the first ChildSpyShipmentMethod matching the query
 * @method     ChildSpyShipmentMethod findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyShipmentMethod matching the query, or a new ChildSpyShipmentMethod object populated from the query conditions when no match is found
 *
 * @method     ChildSpyShipmentMethod findOneByIdShipmentMethod(int $id_shipment_method) Return the first ChildSpyShipmentMethod filtered by the id_shipment_method column
 * @method     ChildSpyShipmentMethod findOneByFkShipmentCarrier(int $fk_shipment_carrier) Return the first ChildSpyShipmentMethod filtered by the fk_shipment_carrier column
 * @method     ChildSpyShipmentMethod findOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyShipmentMethod filtered by the fk_tax_set column
 * @method     ChildSpyShipmentMethod findOneByGlossaryKeyName(string $glossary_key_name) Return the first ChildSpyShipmentMethod filtered by the glossary_key_name column
 * @method     ChildSpyShipmentMethod findOneByGlossaryKeyDescription(string $glossary_key_description) Return the first ChildSpyShipmentMethod filtered by the glossary_key_description column
 * @method     ChildSpyShipmentMethod findOneByName(string $name) Return the first ChildSpyShipmentMethod filtered by the name column
 * @method     ChildSpyShipmentMethod findOneByIsActive(boolean $is_active) Return the first ChildSpyShipmentMethod filtered by the is_active column
 * @method     ChildSpyShipmentMethod findOneByPrice(int $price) Return the first ChildSpyShipmentMethod filtered by the price column
 * @method     ChildSpyShipmentMethod findOneByAvailabilityPlugin(string $availability_plugin) Return the first ChildSpyShipmentMethod filtered by the availability_plugin column
 * @method     ChildSpyShipmentMethod findOneByPriceCalculationPlugin(string $price_calculation_plugin) Return the first ChildSpyShipmentMethod filtered by the price_calculation_plugin column
 * @method     ChildSpyShipmentMethod findOneByDeliveryTimePlugin(string $delivery_time_plugin) Return the first ChildSpyShipmentMethod filtered by the delivery_time_plugin column
 * @method     ChildSpyShipmentMethod findOneByTaxCalculationPlugin(string $tax_calculation_plugin) Return the first ChildSpyShipmentMethod filtered by the tax_calculation_plugin column *

 * @method     ChildSpyShipmentMethod requirePk($key, ConnectionInterface $con = null) Return the ChildSpyShipmentMethod by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOne(ConnectionInterface $con = null) Return the first ChildSpyShipmentMethod matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyShipmentMethod requireOneByIdShipmentMethod(int $id_shipment_method) Return the first ChildSpyShipmentMethod filtered by the id_shipment_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByFkShipmentCarrier(int $fk_shipment_carrier) Return the first ChildSpyShipmentMethod filtered by the fk_shipment_carrier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyShipmentMethod filtered by the fk_tax_set column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByGlossaryKeyName(string $glossary_key_name) Return the first ChildSpyShipmentMethod filtered by the glossary_key_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByGlossaryKeyDescription(string $glossary_key_description) Return the first ChildSpyShipmentMethod filtered by the glossary_key_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByName(string $name) Return the first ChildSpyShipmentMethod filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByIsActive(boolean $is_active) Return the first ChildSpyShipmentMethod filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByPrice(int $price) Return the first ChildSpyShipmentMethod filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByAvailabilityPlugin(string $availability_plugin) Return the first ChildSpyShipmentMethod filtered by the availability_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByPriceCalculationPlugin(string $price_calculation_plugin) Return the first ChildSpyShipmentMethod filtered by the price_calculation_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByDeliveryTimePlugin(string $delivery_time_plugin) Return the first ChildSpyShipmentMethod filtered by the delivery_time_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyShipmentMethod requireOneByTaxCalculationPlugin(string $tax_calculation_plugin) Return the first ChildSpyShipmentMethod filtered by the tax_calculation_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyShipmentMethod[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyShipmentMethod objects based on current ModelCriteria
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByIdShipmentMethod(int $id_shipment_method) Return ChildSpyShipmentMethod objects filtered by the id_shipment_method column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByFkShipmentCarrier(int $fk_shipment_carrier) Return ChildSpyShipmentMethod objects filtered by the fk_shipment_carrier column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByFkTaxSet(int $fk_tax_set) Return ChildSpyShipmentMethod objects filtered by the fk_tax_set column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByGlossaryKeyName(string $glossary_key_name) Return ChildSpyShipmentMethod objects filtered by the glossary_key_name column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByGlossaryKeyDescription(string $glossary_key_description) Return ChildSpyShipmentMethod objects filtered by the glossary_key_description column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByName(string $name) Return ChildSpyShipmentMethod objects filtered by the name column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyShipmentMethod objects filtered by the is_active column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByPrice(int $price) Return ChildSpyShipmentMethod objects filtered by the price column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByAvailabilityPlugin(string $availability_plugin) Return ChildSpyShipmentMethod objects filtered by the availability_plugin column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByPriceCalculationPlugin(string $price_calculation_plugin) Return ChildSpyShipmentMethod objects filtered by the price_calculation_plugin column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByDeliveryTimePlugin(string $delivery_time_plugin) Return ChildSpyShipmentMethod objects filtered by the delivery_time_plugin column
 * @method     ChildSpyShipmentMethod[]|ObjectCollection findByTaxCalculationPlugin(string $tax_calculation_plugin) Return ChildSpyShipmentMethod objects filtered by the tax_calculation_plugin column
 * @method     ChildSpyShipmentMethod[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyShipmentMethodQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyShipmentMethodQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyShipmentMethod', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyShipmentMethodQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyShipmentMethodQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyShipmentMethodQuery) {
            return $criteria;
        }
        $query = new ChildSpyShipmentMethodQuery();
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
     * @return ChildSpyShipmentMethod|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyShipmentMethodTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
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
     * @return ChildSpyShipmentMethod A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_shipment_method`, `fk_shipment_carrier`, `fk_tax_set`, `glossary_key_name`, `glossary_key_description`, `name`, `is_active`, `price`, `availability_plugin`, `price_calculation_plugin`, `delivery_time_plugin`, `tax_calculation_plugin` FROM `spy_shipment_method` WHERE `id_shipment_method` = :p0';
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
            /** @var ChildSpyShipmentMethod $obj */
            $obj = new ChildSpyShipmentMethod();
            $obj->hydrate($row);
            SpyShipmentMethodTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyShipmentMethod|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_shipment_method column
     *
     * Example usage:
     * <code>
     * $query->filterByIdShipmentMethod(1234); // WHERE id_shipment_method = 1234
     * $query->filterByIdShipmentMethod(array(12, 34)); // WHERE id_shipment_method IN (12, 34)
     * $query->filterByIdShipmentMethod(array('min' => 12)); // WHERE id_shipment_method > 12
     * </code>
     *
     * @param     mixed $idShipmentMethod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByIdShipmentMethod($idShipmentMethod = null, $comparison = null)
    {
        if (is_array($idShipmentMethod)) {
            $useMinMax = false;
            if (isset($idShipmentMethod['min'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $idShipmentMethod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idShipmentMethod['max'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $idShipmentMethod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $idShipmentMethod, $comparison);
    }

    /**
     * Filter the query on the fk_shipment_carrier column
     *
     * Example usage:
     * <code>
     * $query->filterByFkShipmentCarrier(1234); // WHERE fk_shipment_carrier = 1234
     * $query->filterByFkShipmentCarrier(array(12, 34)); // WHERE fk_shipment_carrier IN (12, 34)
     * $query->filterByFkShipmentCarrier(array('min' => 12)); // WHERE fk_shipment_carrier > 12
     * </code>
     *
     * @see       filterByShipmentCarrier()
     *
     * @param     mixed $fkShipmentCarrier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByFkShipmentCarrier($fkShipmentCarrier = null, $comparison = null)
    {
        if (is_array($fkShipmentCarrier)) {
            $useMinMax = false;
            if (isset($fkShipmentCarrier['min'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $fkShipmentCarrier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkShipmentCarrier['max'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $fkShipmentCarrier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $fkShipmentCarrier, $comparison);
    }

    /**
     * Filter the query on the fk_tax_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTaxSet(1234); // WHERE fk_tax_set = 1234
     * $query->filterByFkTaxSet(array(12, 34)); // WHERE fk_tax_set IN (12, 34)
     * $query->filterByFkTaxSet(array('min' => 12)); // WHERE fk_tax_set > 12
     * </code>
     *
     * @see       filterByTaxSet()
     *
     * @param     mixed $fkTaxSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByFkTaxSet($fkTaxSet = null, $comparison = null)
    {
        if (is_array($fkTaxSet)) {
            $useMinMax = false;
            if (isset($fkTaxSet['min'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $fkTaxSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTaxSet['max'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $fkTaxSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $fkTaxSet, $comparison);
    }

    /**
     * Filter the query on the glossary_key_name column
     *
     * Example usage:
     * <code>
     * $query->filterByGlossaryKeyName('fooValue');   // WHERE glossary_key_name = 'fooValue'
     * $query->filterByGlossaryKeyName('%fooValue%'); // WHERE glossary_key_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $glossaryKeyName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByGlossaryKeyName($glossaryKeyName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($glossaryKeyName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $glossaryKeyName)) {
                $glossaryKeyName = str_replace('*', '%', $glossaryKeyName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_NAME, $glossaryKeyName, $comparison);
    }

    /**
     * Filter the query on the glossary_key_description column
     *
     * Example usage:
     * <code>
     * $query->filterByGlossaryKeyDescription('fooValue');   // WHERE glossary_key_description = 'fooValue'
     * $query->filterByGlossaryKeyDescription('%fooValue%'); // WHERE glossary_key_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $glossaryKeyDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByGlossaryKeyDescription($glossaryKeyDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($glossaryKeyDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $glossaryKeyDescription)) {
                $glossaryKeyDescription = str_replace('*', '%', $glossaryKeyDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_DESCRIPTION, $glossaryKeyDescription, $comparison);
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
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_IS_ACTIVE, $isActive, $comparison);
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
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SpyShipmentMethodTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the availability_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByAvailabilityPlugin('fooValue');   // WHERE availability_plugin = 'fooValue'
     * $query->filterByAvailabilityPlugin('%fooValue%'); // WHERE availability_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $availabilityPlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByAvailabilityPlugin($availabilityPlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($availabilityPlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $availabilityPlugin)) {
                $availabilityPlugin = str_replace('*', '%', $availabilityPlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_AVAILABILITY_PLUGIN, $availabilityPlugin, $comparison);
    }

    /**
     * Filter the query on the price_calculation_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceCalculationPlugin('fooValue');   // WHERE price_calculation_plugin = 'fooValue'
     * $query->filterByPriceCalculationPlugin('%fooValue%'); // WHERE price_calculation_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $priceCalculationPlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByPriceCalculationPlugin($priceCalculationPlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priceCalculationPlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $priceCalculationPlugin)) {
                $priceCalculationPlugin = str_replace('*', '%', $priceCalculationPlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_PRICE_CALCULATION_PLUGIN, $priceCalculationPlugin, $comparison);
    }

    /**
     * Filter the query on the delivery_time_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryTimePlugin('fooValue');   // WHERE delivery_time_plugin = 'fooValue'
     * $query->filterByDeliveryTimePlugin('%fooValue%'); // WHERE delivery_time_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deliveryTimePlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByDeliveryTimePlugin($deliveryTimePlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliveryTimePlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $deliveryTimePlugin)) {
                $deliveryTimePlugin = str_replace('*', '%', $deliveryTimePlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_DELIVERY_TIME_PLUGIN, $deliveryTimePlugin, $comparison);
    }

    /**
     * Filter the query on the tax_calculation_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxCalculationPlugin('fooValue');   // WHERE tax_calculation_plugin = 'fooValue'
     * $query->filterByTaxCalculationPlugin('%fooValue%'); // WHERE tax_calculation_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taxCalculationPlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByTaxCalculationPlugin($taxCalculationPlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxCalculationPlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $taxCalculationPlugin)) {
                $taxCalculationPlugin = str_replace('*', '%', $taxCalculationPlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyShipmentMethodTableMap::COL_TAX_CALCULATION_PLUGIN, $taxCalculationPlugin, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyShipmentCarrier object
     *
     * @param \Propel\SpyShipmentCarrier|ObjectCollection $spyShipmentCarrier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByShipmentCarrier($spyShipmentCarrier, $comparison = null)
    {
        if ($spyShipmentCarrier instanceof \Propel\SpyShipmentCarrier) {
            return $this
                ->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $spyShipmentCarrier->getIdShipmentCarrier(), $comparison);
        } elseif ($spyShipmentCarrier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $spyShipmentCarrier->toKeyValue('PrimaryKey', 'IdShipmentCarrier'), $comparison);
        } else {
            throw new PropelException('filterByShipmentCarrier() only accepts arguments of type \Propel\SpyShipmentCarrier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipmentCarrier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function joinShipmentCarrier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipmentCarrier');

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
            $this->addJoinObject($join, 'ShipmentCarrier');
        }

        return $this;
    }

    /**
     * Use the ShipmentCarrier relation SpyShipmentCarrier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyShipmentCarrierQuery A secondary query class using the current class as primary query
     */
    public function useShipmentCarrierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShipmentCarrier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipmentCarrier', '\Propel\SpyShipmentCarrierQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSet object
     *
     * @param \Propel\SpyTaxSet|ObjectCollection $spyTaxSet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByTaxSet($spyTaxSet, $comparison = null)
    {
        if ($spyTaxSet instanceof \Propel\SpyTaxSet) {
            return $this
                ->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $spyTaxSet->getIdTaxSet(), $comparison);
        } elseif ($spyTaxSet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $spyTaxSet->toKeyValue('PrimaryKey', 'IdTaxSet'), $comparison);
        } else {
            throw new PropelException('filterByTaxSet() only accepts arguments of type \Propel\SpyTaxSet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TaxSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function joinTaxSet($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TaxSet');

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
            $this->addJoinObject($join, 'TaxSet');
        }

        return $this;
    }

    /**
     * Use the TaxSet relation SpyTaxSet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetQuery A secondary query class using the current class as primary query
     */
    public function useTaxSetQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTaxSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TaxSet', '\Propel\SpyTaxSetQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function filterByShipmentMethods($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $spySalesOrder->getFkShipmentMethod(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            return $this
                ->useShipmentMethodsQuery()
                ->filterByPrimaryKeys($spySalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipmentMethods() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipmentMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function joinShipmentMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipmentMethods');

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
            $this->addJoinObject($join, 'ShipmentMethods');
        }

        return $this;
    }

    /**
     * Use the ShipmentMethods relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useShipmentMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShipmentMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipmentMethods', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyShipmentMethod $spyShipmentMethod Object to remove from the list of results
     *
     * @return $this|ChildSpyShipmentMethodQuery The current query, for fluid interface
     */
    public function prune($spyShipmentMethod = null)
    {
        if ($spyShipmentMethod) {
            $this->addUsingAlias(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $spyShipmentMethod->getIdShipmentMethod(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_shipment_method table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyShipmentMethodTableMap::clearInstancePool();
            SpyShipmentMethodTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyShipmentMethodTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyShipmentMethodTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyShipmentMethodTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyShipmentMethodQuery
