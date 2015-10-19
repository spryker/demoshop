<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCmsPage as ChildSpyCmsPage;
use Propel\SpyCmsPageQuery as ChildSpyCmsPageQuery;
use Propel\Map\SpyCmsPageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_cms_page' table.
 *
 *
 *
 * @method     ChildSpyCmsPageQuery orderByIdCmsPage($order = Criteria::ASC) Order by the id_cms_page column
 * @method     ChildSpyCmsPageQuery orderByFkTemplate($order = Criteria::ASC) Order by the fk_template column
 * @method     ChildSpyCmsPageQuery orderByValidFrom($order = Criteria::ASC) Order by the valid_from column
 * @method     ChildSpyCmsPageQuery orderByValidTo($order = Criteria::ASC) Order by the valid_to column
 * @method     ChildSpyCmsPageQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildSpyCmsPageQuery groupByIdCmsPage() Group by the id_cms_page column
 * @method     ChildSpyCmsPageQuery groupByFkTemplate() Group by the fk_template column
 * @method     ChildSpyCmsPageQuery groupByValidFrom() Group by the valid_from column
 * @method     ChildSpyCmsPageQuery groupByValidTo() Group by the valid_to column
 * @method     ChildSpyCmsPageQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildSpyCmsPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCmsPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCmsPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCmsPageQuery leftJoinCmsTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsTemplate relation
 * @method     ChildSpyCmsPageQuery rightJoinCmsTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsTemplate relation
 * @method     ChildSpyCmsPageQuery innerJoinCmsTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsTemplate relation
 *
 * @method     ChildSpyCmsPageQuery leftJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 * @method     ChildSpyCmsPageQuery rightJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 * @method     ChildSpyCmsPageQuery innerJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 *
 * @method     ChildSpyCmsPageQuery leftJoinSpyCmsBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCmsBlock relation
 * @method     ChildSpyCmsPageQuery rightJoinSpyCmsBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCmsBlock relation
 * @method     ChildSpyCmsPageQuery innerJoinSpyCmsBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCmsBlock relation
 *
 * @method     ChildSpyCmsPageQuery leftJoinSpyUrl($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyCmsPageQuery rightJoinSpyUrl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyCmsPageQuery innerJoinSpyUrl($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUrl relation
 *
 * @method     \Propel\SpyCmsTemplateQuery|\Propel\SpyCmsGlossaryKeyMappingQuery|\Propel\SpyCmsBlockQuery|\Propel\SpyUrlQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCmsPage findOne(ConnectionInterface $con = null) Return the first ChildSpyCmsPage matching the query
 * @method     ChildSpyCmsPage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCmsPage matching the query, or a new ChildSpyCmsPage object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCmsPage findOneByIdCmsPage(int $id_cms_page) Return the first ChildSpyCmsPage filtered by the id_cms_page column
 * @method     ChildSpyCmsPage findOneByFkTemplate(int $fk_template) Return the first ChildSpyCmsPage filtered by the fk_template column
 * @method     ChildSpyCmsPage findOneByValidFrom(string $valid_from) Return the first ChildSpyCmsPage filtered by the valid_from column
 * @method     ChildSpyCmsPage findOneByValidTo(string $valid_to) Return the first ChildSpyCmsPage filtered by the valid_to column
 * @method     ChildSpyCmsPage findOneByIsActive(boolean $is_active) Return the first ChildSpyCmsPage filtered by the is_active column *

 * @method     ChildSpyCmsPage requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCmsPage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsPage requireOne(ConnectionInterface $con = null) Return the first ChildSpyCmsPage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsPage requireOneByIdCmsPage(int $id_cms_page) Return the first ChildSpyCmsPage filtered by the id_cms_page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsPage requireOneByFkTemplate(int $fk_template) Return the first ChildSpyCmsPage filtered by the fk_template column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsPage requireOneByValidFrom(string $valid_from) Return the first ChildSpyCmsPage filtered by the valid_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsPage requireOneByValidTo(string $valid_to) Return the first ChildSpyCmsPage filtered by the valid_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsPage requireOneByIsActive(boolean $is_active) Return the first ChildSpyCmsPage filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsPage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCmsPage objects based on current ModelCriteria
 * @method     ChildSpyCmsPage[]|ObjectCollection findByIdCmsPage(int $id_cms_page) Return ChildSpyCmsPage objects filtered by the id_cms_page column
 * @method     ChildSpyCmsPage[]|ObjectCollection findByFkTemplate(int $fk_template) Return ChildSpyCmsPage objects filtered by the fk_template column
 * @method     ChildSpyCmsPage[]|ObjectCollection findByValidFrom(string $valid_from) Return ChildSpyCmsPage objects filtered by the valid_from column
 * @method     ChildSpyCmsPage[]|ObjectCollection findByValidTo(string $valid_to) Return ChildSpyCmsPage objects filtered by the valid_to column
 * @method     ChildSpyCmsPage[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyCmsPage objects filtered by the is_active column
 * @method     ChildSpyCmsPage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCmsPageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCmsPageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCmsPage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCmsPageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCmsPageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCmsPageQuery) {
            return $criteria;
        }
        $query = new ChildSpyCmsPageQuery();
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
     * @return ChildSpyCmsPage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCmsPageTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCmsPageTableMap::DATABASE_NAME);
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
     * @return ChildSpyCmsPage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_cms_page, fk_template, valid_from, valid_to, is_active FROM spy_cms_page WHERE id_cms_page = :p0';
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
            /** @var ChildSpyCmsPage $obj */
            $obj = new ChildSpyCmsPage();
            $obj->hydrate($row);
            SpyCmsPageTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCmsPage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_page column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsPage(1234); // WHERE id_cms_page = 1234
     * $query->filterByIdCmsPage(array(12, 34)); // WHERE id_cms_page IN (12, 34)
     * $query->filterByIdCmsPage(array('min' => 12)); // WHERE id_cms_page > 12
     * </code>
     *
     * @param     mixed $idCmsPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByIdCmsPage($idCmsPage = null, $comparison = null)
    {
        if (is_array($idCmsPage)) {
            $useMinMax = false;
            if (isset($idCmsPage['min'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $idCmsPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsPage['max'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $idCmsPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $idCmsPage, $comparison);
    }

    /**
     * Filter the query on the fk_template column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTemplate(1234); // WHERE fk_template = 1234
     * $query->filterByFkTemplate(array(12, 34)); // WHERE fk_template IN (12, 34)
     * $query->filterByFkTemplate(array('min' => 12)); // WHERE fk_template > 12
     * </code>
     *
     * @see       filterByCmsTemplate()
     *
     * @param     mixed $fkTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByFkTemplate($fkTemplate = null, $comparison = null)
    {
        if (is_array($fkTemplate)) {
            $useMinMax = false;
            if (isset($fkTemplate['min'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_FK_TEMPLATE, $fkTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTemplate['max'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_FK_TEMPLATE, $fkTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_FK_TEMPLATE, $fkTemplate, $comparison);
    }

    /**
     * Filter the query on the valid_from column
     *
     * Example usage:
     * <code>
     * $query->filterByValidFrom('2011-03-14'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom('now'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom(array('max' => 'yesterday')); // WHERE valid_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $validFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByValidFrom($validFrom = null, $comparison = null)
    {
        if (is_array($validFrom)) {
            $useMinMax = false;
            if (isset($validFrom['min'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_FROM, $validFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validFrom['max'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_FROM, $validFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_FROM, $validFrom, $comparison);
    }

    /**
     * Filter the query on the valid_to column
     *
     * Example usage:
     * <code>
     * $query->filterByValidTo('2011-03-14'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo('now'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo(array('max' => 'yesterday')); // WHERE valid_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $validTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByValidTo($validTo = null, $comparison = null)
    {
        if (is_array($validTo)) {
            $useMinMax = false;
            if (isset($validTo['min'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_TO, $validTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validTo['max'])) {
                $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_TO, $validTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_VALID_TO, $validTo, $comparison);
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
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCmsPageTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCmsTemplate object
     *
     * @param \Propel\SpyCmsTemplate|ObjectCollection $spyCmsTemplate The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterByCmsTemplate($spyCmsTemplate, $comparison = null)
    {
        if ($spyCmsTemplate instanceof \Propel\SpyCmsTemplate) {
            return $this
                ->addUsingAlias(SpyCmsPageTableMap::COL_FK_TEMPLATE, $spyCmsTemplate->getIdCmsTemplate(), $comparison);
        } elseif ($spyCmsTemplate instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCmsPageTableMap::COL_FK_TEMPLATE, $spyCmsTemplate->toKeyValue('PrimaryKey', 'IdCmsTemplate'), $comparison);
        } else {
            throw new PropelException('filterByCmsTemplate() only accepts arguments of type \Propel\SpyCmsTemplate or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function joinCmsTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsTemplate');

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
            $this->addJoinObject($join, 'CmsTemplate');
        }

        return $this;
    }

    /**
     * Use the CmsTemplate relation SpyCmsTemplate object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsTemplateQuery A secondary query class using the current class as primary query
     */
    public function useCmsTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCmsTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsTemplate', '\Propel\SpyCmsTemplateQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCmsGlossaryKeyMapping object
     *
     * @param \Propel\SpyCmsGlossaryKeyMapping|ObjectCollection $spyCmsGlossaryKeyMapping the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterBySpyCmsGlossaryKeyMapping($spyCmsGlossaryKeyMapping, $comparison = null)
    {
        if ($spyCmsGlossaryKeyMapping instanceof \Propel\SpyCmsGlossaryKeyMapping) {
            return $this
                ->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $spyCmsGlossaryKeyMapping->getFkPage(), $comparison);
        } elseif ($spyCmsGlossaryKeyMapping instanceof ObjectCollection) {
            return $this
                ->useSpyCmsGlossaryKeyMappingQuery()
                ->filterByPrimaryKeys($spyCmsGlossaryKeyMapping->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyCmsGlossaryKeyMapping() only accepts arguments of type \Propel\SpyCmsGlossaryKeyMapping or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function joinSpyCmsGlossaryKeyMapping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCmsGlossaryKeyMapping');

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
            $this->addJoinObject($join, 'SpyCmsGlossaryKeyMapping');
        }

        return $this;
    }

    /**
     * Use the SpyCmsGlossaryKeyMapping relation SpyCmsGlossaryKeyMapping object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsGlossaryKeyMappingQuery A secondary query class using the current class as primary query
     */
    public function useSpyCmsGlossaryKeyMappingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCmsGlossaryKeyMapping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCmsGlossaryKeyMapping', '\Propel\SpyCmsGlossaryKeyMappingQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCmsBlock object
     *
     * @param \Propel\SpyCmsBlock|ObjectCollection $spyCmsBlock the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterBySpyCmsBlock($spyCmsBlock, $comparison = null)
    {
        if ($spyCmsBlock instanceof \Propel\SpyCmsBlock) {
            return $this
                ->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $spyCmsBlock->getFkPage(), $comparison);
        } elseif ($spyCmsBlock instanceof ObjectCollection) {
            return $this
                ->useSpyCmsBlockQuery()
                ->filterByPrimaryKeys($spyCmsBlock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyCmsBlock() only accepts arguments of type \Propel\SpyCmsBlock or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCmsBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function joinSpyCmsBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCmsBlock');

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
            $this->addJoinObject($join, 'SpyCmsBlock');
        }

        return $this;
    }

    /**
     * Use the SpyCmsBlock relation SpyCmsBlock object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsBlockQuery A secondary query class using the current class as primary query
     */
    public function useSpyCmsBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCmsBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCmsBlock', '\Propel\SpyCmsBlockQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyUrl object
     *
     * @param \Propel\SpyUrl|ObjectCollection $spyUrl the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function filterBySpyUrl($spyUrl, $comparison = null)
    {
        if ($spyUrl instanceof \Propel\SpyUrl) {
            return $this
                ->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $spyUrl->getFkResourcePage(), $comparison);
        } elseif ($spyUrl instanceof ObjectCollection) {
            return $this
                ->useSpyUrlQuery()
                ->filterByPrimaryKeys($spyUrl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyUrl() only accepts arguments of type \Propel\SpyUrl or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUrl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function joinSpyUrl($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUrl');

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
            $this->addJoinObject($join, 'SpyUrl');
        }

        return $this;
    }

    /**
     * Use the SpyUrl relation SpyUrl object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUrlQuery A secondary query class using the current class as primary query
     */
    public function useSpyUrlQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyUrl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUrl', '\Propel\SpyUrlQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCmsPage $spyCmsPage Object to remove from the list of results
     *
     * @return $this|ChildSpyCmsPageQuery The current query, for fluid interface
     */
    public function prune($spyCmsPage = null)
    {
        if ($spyCmsPage) {
            $this->addUsingAlias(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $spyCmsPage->getIdCmsPage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_cms_page table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCmsPageTableMap::clearInstancePool();
            SpyCmsPageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCmsPageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCmsPageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCmsPageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCmsPageQuery
