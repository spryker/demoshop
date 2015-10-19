<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySearchPageElement as ChildSpySearchPageElement;
use Propel\SpySearchPageElementQuery as ChildSpySearchPageElementQuery;
use Propel\Map\SpySearchPageElementTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_search_page_element' table.
 *
 *
 *
 * @method     ChildSpySearchPageElementQuery orderByIdSearchPageElement($order = Criteria::ASC) Order by the id_search_page_element column
 * @method     ChildSpySearchPageElementQuery orderByElementKey($order = Criteria::ASC) Order by the element_key column
 * @method     ChildSpySearchPageElementQuery orderByIsElementActive($order = Criteria::ASC) Order by the is_element_active column
 * @method     ChildSpySearchPageElementQuery orderByFkSearchDocumentAttribute($order = Criteria::ASC) Order by the fk_search_document_attribute column
 * @method     ChildSpySearchPageElementQuery orderByFkSearchPageElementTemplate($order = Criteria::ASC) Order by the fk_search_page_element_template column
 *
 * @method     ChildSpySearchPageElementQuery groupByIdSearchPageElement() Group by the id_search_page_element column
 * @method     ChildSpySearchPageElementQuery groupByElementKey() Group by the element_key column
 * @method     ChildSpySearchPageElementQuery groupByIsElementActive() Group by the is_element_active column
 * @method     ChildSpySearchPageElementQuery groupByFkSearchDocumentAttribute() Group by the fk_search_document_attribute column
 * @method     ChildSpySearchPageElementQuery groupByFkSearchPageElementTemplate() Group by the fk_search_page_element_template column
 *
 * @method     ChildSpySearchPageElementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySearchPageElementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySearchPageElementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySearchPageElementQuery leftJoinDocumentAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentAttribute relation
 * @method     ChildSpySearchPageElementQuery rightJoinDocumentAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentAttribute relation
 * @method     ChildSpySearchPageElementQuery innerJoinDocumentAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentAttribute relation
 *
 * @method     ChildSpySearchPageElementQuery leftJoinElementTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementTemplate relation
 * @method     ChildSpySearchPageElementQuery rightJoinElementTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementTemplate relation
 * @method     ChildSpySearchPageElementQuery innerJoinElementTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementTemplate relation
 *
 * @method     \Propel\SpySearchDocumentAttributeQuery|\Propel\SpySearchPageElementTemplateQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySearchPageElement findOne(ConnectionInterface $con = null) Return the first ChildSpySearchPageElement matching the query
 * @method     ChildSpySearchPageElement findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySearchPageElement matching the query, or a new ChildSpySearchPageElement object populated from the query conditions when no match is found
 *
 * @method     ChildSpySearchPageElement findOneByIdSearchPageElement(int $id_search_page_element) Return the first ChildSpySearchPageElement filtered by the id_search_page_element column
 * @method     ChildSpySearchPageElement findOneByElementKey(string $element_key) Return the first ChildSpySearchPageElement filtered by the element_key column
 * @method     ChildSpySearchPageElement findOneByIsElementActive(boolean $is_element_active) Return the first ChildSpySearchPageElement filtered by the is_element_active column
 * @method     ChildSpySearchPageElement findOneByFkSearchDocumentAttribute(int $fk_search_document_attribute) Return the first ChildSpySearchPageElement filtered by the fk_search_document_attribute column
 * @method     ChildSpySearchPageElement findOneByFkSearchPageElementTemplate(int $fk_search_page_element_template) Return the first ChildSpySearchPageElement filtered by the fk_search_page_element_template column *

 * @method     ChildSpySearchPageElement requirePk($key, ConnectionInterface $con = null) Return the ChildSpySearchPageElement by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchPageElement requireOne(ConnectionInterface $con = null) Return the first ChildSpySearchPageElement matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchPageElement requireOneByIdSearchPageElement(int $id_search_page_element) Return the first ChildSpySearchPageElement filtered by the id_search_page_element column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchPageElement requireOneByElementKey(string $element_key) Return the first ChildSpySearchPageElement filtered by the element_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchPageElement requireOneByIsElementActive(boolean $is_element_active) Return the first ChildSpySearchPageElement filtered by the is_element_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchPageElement requireOneByFkSearchDocumentAttribute(int $fk_search_document_attribute) Return the first ChildSpySearchPageElement filtered by the fk_search_document_attribute column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchPageElement requireOneByFkSearchPageElementTemplate(int $fk_search_page_element_template) Return the first ChildSpySearchPageElement filtered by the fk_search_page_element_template column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchPageElement[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySearchPageElement objects based on current ModelCriteria
 * @method     ChildSpySearchPageElement[]|ObjectCollection findByIdSearchPageElement(int $id_search_page_element) Return ChildSpySearchPageElement objects filtered by the id_search_page_element column
 * @method     ChildSpySearchPageElement[]|ObjectCollection findByElementKey(string $element_key) Return ChildSpySearchPageElement objects filtered by the element_key column
 * @method     ChildSpySearchPageElement[]|ObjectCollection findByIsElementActive(boolean $is_element_active) Return ChildSpySearchPageElement objects filtered by the is_element_active column
 * @method     ChildSpySearchPageElement[]|ObjectCollection findByFkSearchDocumentAttribute(int $fk_search_document_attribute) Return ChildSpySearchPageElement objects filtered by the fk_search_document_attribute column
 * @method     ChildSpySearchPageElement[]|ObjectCollection findByFkSearchPageElementTemplate(int $fk_search_page_element_template) Return ChildSpySearchPageElement objects filtered by the fk_search_page_element_template column
 * @method     ChildSpySearchPageElement[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySearchPageElementQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySearchPageElementQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySearchPageElement', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySearchPageElementQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySearchPageElementQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySearchPageElementQuery) {
            return $criteria;
        }
        $query = new ChildSpySearchPageElementQuery();
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
     * @return ChildSpySearchPageElement|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySearchPageElementTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySearchPageElementTableMap::DATABASE_NAME);
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
     * @return ChildSpySearchPageElement A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_search_page_element, element_key, is_element_active, fk_search_document_attribute, fk_search_page_element_template FROM spy_search_page_element WHERE id_search_page_element = :p0';
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
            /** @var ChildSpySearchPageElement $obj */
            $obj = new ChildSpySearchPageElement();
            $obj->hydrate($row);
            SpySearchPageElementTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySearchPageElement|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_search_page_element column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSearchPageElement(1234); // WHERE id_search_page_element = 1234
     * $query->filterByIdSearchPageElement(array(12, 34)); // WHERE id_search_page_element IN (12, 34)
     * $query->filterByIdSearchPageElement(array('min' => 12)); // WHERE id_search_page_element > 12
     * </code>
     *
     * @param     mixed $idSearchPageElement The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByIdSearchPageElement($idSearchPageElement = null, $comparison = null)
    {
        if (is_array($idSearchPageElement)) {
            $useMinMax = false;
            if (isset($idSearchPageElement['min'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $idSearchPageElement['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSearchPageElement['max'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $idSearchPageElement['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $idSearchPageElement, $comparison);
    }

    /**
     * Filter the query on the element_key column
     *
     * Example usage:
     * <code>
     * $query->filterByElementKey('fooValue');   // WHERE element_key = 'fooValue'
     * $query->filterByElementKey('%fooValue%'); // WHERE element_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByElementKey($elementKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementKey)) {
                $elementKey = str_replace('*', '%', $elementKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_ELEMENT_KEY, $elementKey, $comparison);
    }

    /**
     * Filter the query on the is_element_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsElementActive(true); // WHERE is_element_active = true
     * $query->filterByIsElementActive('yes'); // WHERE is_element_active = true
     * </code>
     *
     * @param     boolean|string $isElementActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByIsElementActive($isElementActive = null, $comparison = null)
    {
        if (is_string($isElementActive)) {
            $isElementActive = in_array(strtolower($isElementActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_IS_ELEMENT_ACTIVE, $isElementActive, $comparison);
    }

    /**
     * Filter the query on the fk_search_document_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSearchDocumentAttribute(1234); // WHERE fk_search_document_attribute = 1234
     * $query->filterByFkSearchDocumentAttribute(array(12, 34)); // WHERE fk_search_document_attribute IN (12, 34)
     * $query->filterByFkSearchDocumentAttribute(array('min' => 12)); // WHERE fk_search_document_attribute > 12
     * </code>
     *
     * @see       filterByDocumentAttribute()
     *
     * @param     mixed $fkSearchDocumentAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByFkSearchDocumentAttribute($fkSearchDocumentAttribute = null, $comparison = null)
    {
        if (is_array($fkSearchDocumentAttribute)) {
            $useMinMax = false;
            if (isset($fkSearchDocumentAttribute['min'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $fkSearchDocumentAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSearchDocumentAttribute['max'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $fkSearchDocumentAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $fkSearchDocumentAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_search_page_element_template column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSearchPageElementTemplate(1234); // WHERE fk_search_page_element_template = 1234
     * $query->filterByFkSearchPageElementTemplate(array(12, 34)); // WHERE fk_search_page_element_template IN (12, 34)
     * $query->filterByFkSearchPageElementTemplate(array('min' => 12)); // WHERE fk_search_page_element_template > 12
     * </code>
     *
     * @see       filterByElementTemplate()
     *
     * @param     mixed $fkSearchPageElementTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByFkSearchPageElementTemplate($fkSearchPageElementTemplate = null, $comparison = null)
    {
        if (is_array($fkSearchPageElementTemplate)) {
            $useMinMax = false;
            if (isset($fkSearchPageElementTemplate['min'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $fkSearchPageElementTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSearchPageElementTemplate['max'])) {
                $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $fkSearchPageElementTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $fkSearchPageElementTemplate, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySearchDocumentAttribute object
     *
     * @param \Propel\SpySearchDocumentAttribute|ObjectCollection $spySearchDocumentAttribute The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByDocumentAttribute($spySearchDocumentAttribute, $comparison = null)
    {
        if ($spySearchDocumentAttribute instanceof \Propel\SpySearchDocumentAttribute) {
            return $this
                ->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $spySearchDocumentAttribute->getIdSearchDocumentAttribute(), $comparison);
        } elseif ($spySearchDocumentAttribute instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $spySearchDocumentAttribute->toKeyValue('PrimaryKey', 'IdSearchDocumentAttribute'), $comparison);
        } else {
            throw new PropelException('filterByDocumentAttribute() only accepts arguments of type \Propel\SpySearchDocumentAttribute or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentAttribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function joinDocumentAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentAttribute');

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
            $this->addJoinObject($join, 'DocumentAttribute');
        }

        return $this;
    }

    /**
     * Use the DocumentAttribute relation SpySearchDocumentAttribute object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySearchDocumentAttributeQuery A secondary query class using the current class as primary query
     */
    public function useDocumentAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocumentAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentAttribute', '\Propel\SpySearchDocumentAttributeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySearchPageElementTemplate object
     *
     * @param \Propel\SpySearchPageElementTemplate|ObjectCollection $spySearchPageElementTemplate The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function filterByElementTemplate($spySearchPageElementTemplate, $comparison = null)
    {
        if ($spySearchPageElementTemplate instanceof \Propel\SpySearchPageElementTemplate) {
            return $this
                ->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $spySearchPageElementTemplate->getIdSearchPageElementTemplate(), $comparison);
        } elseif ($spySearchPageElementTemplate instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $spySearchPageElementTemplate->toKeyValue('PrimaryKey', 'IdSearchPageElementTemplate'), $comparison);
        } else {
            throw new PropelException('filterByElementTemplate() only accepts arguments of type \Propel\SpySearchPageElementTemplate or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ElementTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function joinElementTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ElementTemplate');

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
            $this->addJoinObject($join, 'ElementTemplate');
        }

        return $this;
    }

    /**
     * Use the ElementTemplate relation SpySearchPageElementTemplate object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySearchPageElementTemplateQuery A secondary query class using the current class as primary query
     */
    public function useElementTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElementTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ElementTemplate', '\Propel\SpySearchPageElementTemplateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySearchPageElement $spySearchPageElement Object to remove from the list of results
     *
     * @return $this|ChildSpySearchPageElementQuery The current query, for fluid interface
     */
    public function prune($spySearchPageElement = null)
    {
        if ($spySearchPageElement) {
            $this->addUsingAlias(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $spySearchPageElement->getIdSearchPageElement(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_search_page_element table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySearchPageElementTableMap::clearInstancePool();
            SpySearchPageElementTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySearchPageElementTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySearchPageElementTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySearchPageElementTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpySearchPageElementQuery
