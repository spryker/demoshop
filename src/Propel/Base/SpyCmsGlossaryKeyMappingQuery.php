<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCmsGlossaryKeyMapping as ChildSpyCmsGlossaryKeyMapping;
use Propel\SpyCmsGlossaryKeyMappingQuery as ChildSpyCmsGlossaryKeyMappingQuery;
use Propel\Map\SpyCmsGlossaryKeyMappingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_cms_glossary_key_mapping' table.
 *
 *
 *
 * @method     ChildSpyCmsGlossaryKeyMappingQuery orderByIdCmsGlossaryKeyMapping($order = Criteria::ASC) Order by the id_cms_glossary_key_mapping column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery orderByFkPage($order = Criteria::ASC) Order by the fk_page column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery orderByFkGlossaryKey($order = Criteria::ASC) Order by the fk_glossary_key column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery orderByPlaceholder($order = Criteria::ASC) Order by the placeholder column
 *
 * @method     ChildSpyCmsGlossaryKeyMappingQuery groupByIdCmsGlossaryKeyMapping() Group by the id_cms_glossary_key_mapping column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery groupByFkPage() Group by the fk_page column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery groupByFkGlossaryKey() Group by the fk_glossary_key column
 * @method     ChildSpyCmsGlossaryKeyMappingQuery groupByPlaceholder() Group by the placeholder column
 *
 * @method     ChildSpyCmsGlossaryKeyMappingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCmsGlossaryKeyMappingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCmsGlossaryKeyMappingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCmsGlossaryKeyMappingQuery leftJoinCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsPage relation
 * @method     ChildSpyCmsGlossaryKeyMappingQuery rightJoinCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsPage relation
 * @method     ChildSpyCmsGlossaryKeyMappingQuery innerJoinCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsPage relation
 *
 * @method     ChildSpyCmsGlossaryKeyMappingQuery leftJoinGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryKey relation
 * @method     ChildSpyCmsGlossaryKeyMappingQuery rightJoinGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryKey relation
 * @method     ChildSpyCmsGlossaryKeyMappingQuery innerJoinGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryKey relation
 *
 * @method     \Propel\SpyCmsPageQuery|\Propel\SpyGlossaryKeyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCmsGlossaryKeyMapping findOne(ConnectionInterface $con = null) Return the first ChildSpyCmsGlossaryKeyMapping matching the query
 * @method     ChildSpyCmsGlossaryKeyMapping findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCmsGlossaryKeyMapping matching the query, or a new ChildSpyCmsGlossaryKeyMapping object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCmsGlossaryKeyMapping findOneByIdCmsGlossaryKeyMapping(int $id_cms_glossary_key_mapping) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the id_cms_glossary_key_mapping column
 * @method     ChildSpyCmsGlossaryKeyMapping findOneByFkPage(int $fk_page) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the fk_page column
 * @method     ChildSpyCmsGlossaryKeyMapping findOneByFkGlossaryKey(int $fk_glossary_key) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the fk_glossary_key column
 * @method     ChildSpyCmsGlossaryKeyMapping findOneByPlaceholder(string $placeholder) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the placeholder column *

 * @method     ChildSpyCmsGlossaryKeyMapping requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCmsGlossaryKeyMapping by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsGlossaryKeyMapping requireOne(ConnectionInterface $con = null) Return the first ChildSpyCmsGlossaryKeyMapping matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsGlossaryKeyMapping requireOneByIdCmsGlossaryKeyMapping(int $id_cms_glossary_key_mapping) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the id_cms_glossary_key_mapping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsGlossaryKeyMapping requireOneByFkPage(int $fk_page) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the fk_page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsGlossaryKeyMapping requireOneByFkGlossaryKey(int $fk_glossary_key) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the fk_glossary_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsGlossaryKeyMapping requireOneByPlaceholder(string $placeholder) Return the first ChildSpyCmsGlossaryKeyMapping filtered by the placeholder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsGlossaryKeyMapping[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCmsGlossaryKeyMapping objects based on current ModelCriteria
 * @method     ChildSpyCmsGlossaryKeyMapping[]|ObjectCollection findByIdCmsGlossaryKeyMapping(int $id_cms_glossary_key_mapping) Return ChildSpyCmsGlossaryKeyMapping objects filtered by the id_cms_glossary_key_mapping column
 * @method     ChildSpyCmsGlossaryKeyMapping[]|ObjectCollection findByFkPage(int $fk_page) Return ChildSpyCmsGlossaryKeyMapping objects filtered by the fk_page column
 * @method     ChildSpyCmsGlossaryKeyMapping[]|ObjectCollection findByFkGlossaryKey(int $fk_glossary_key) Return ChildSpyCmsGlossaryKeyMapping objects filtered by the fk_glossary_key column
 * @method     ChildSpyCmsGlossaryKeyMapping[]|ObjectCollection findByPlaceholder(string $placeholder) Return ChildSpyCmsGlossaryKeyMapping objects filtered by the placeholder column
 * @method     ChildSpyCmsGlossaryKeyMapping[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCmsGlossaryKeyMappingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCmsGlossaryKeyMappingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCmsGlossaryKeyMapping', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCmsGlossaryKeyMappingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCmsGlossaryKeyMappingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCmsGlossaryKeyMappingQuery) {
            return $criteria;
        }
        $query = new ChildSpyCmsGlossaryKeyMappingQuery();
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
     * @return ChildSpyCmsGlossaryKeyMapping|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCmsGlossaryKeyMappingTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCmsGlossaryKeyMappingTableMap::DATABASE_NAME);
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
     * @return ChildSpyCmsGlossaryKeyMapping A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_cms_glossary_key_mapping, fk_page, fk_glossary_key, placeholder FROM spy_cms_glossary_key_mapping WHERE id_cms_glossary_key_mapping = :p0';
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
            /** @var ChildSpyCmsGlossaryKeyMapping $obj */
            $obj = new ChildSpyCmsGlossaryKeyMapping();
            $obj->hydrate($row);
            SpyCmsGlossaryKeyMappingTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCmsGlossaryKeyMapping|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_glossary_key_mapping column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsGlossaryKeyMapping(1234); // WHERE id_cms_glossary_key_mapping = 1234
     * $query->filterByIdCmsGlossaryKeyMapping(array(12, 34)); // WHERE id_cms_glossary_key_mapping IN (12, 34)
     * $query->filterByIdCmsGlossaryKeyMapping(array('min' => 12)); // WHERE id_cms_glossary_key_mapping > 12
     * </code>
     *
     * @param     mixed $idCmsGlossaryKeyMapping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByIdCmsGlossaryKeyMapping($idCmsGlossaryKeyMapping = null, $comparison = null)
    {
        if (is_array($idCmsGlossaryKeyMapping)) {
            $useMinMax = false;
            if (isset($idCmsGlossaryKeyMapping['min'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $idCmsGlossaryKeyMapping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsGlossaryKeyMapping['max'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $idCmsGlossaryKeyMapping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $idCmsGlossaryKeyMapping, $comparison);
    }

    /**
     * Filter the query on the fk_page column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPage(1234); // WHERE fk_page = 1234
     * $query->filterByFkPage(array(12, 34)); // WHERE fk_page IN (12, 34)
     * $query->filterByFkPage(array('min' => 12)); // WHERE fk_page > 12
     * </code>
     *
     * @see       filterByCmsPage()
     *
     * @param     mixed $fkPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByFkPage($fkPage = null, $comparison = null)
    {
        if (is_array($fkPage)) {
            $useMinMax = false;
            if (isset($fkPage['min'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE, $fkPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPage['max'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE, $fkPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE, $fkPage, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_key column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryKey(1234); // WHERE fk_glossary_key = 1234
     * $query->filterByFkGlossaryKey(array(12, 34)); // WHERE fk_glossary_key IN (12, 34)
     * $query->filterByFkGlossaryKey(array('min' => 12)); // WHERE fk_glossary_key > 12
     * </code>
     *
     * @see       filterByGlossaryKey()
     *
     * @param     mixed $fkGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKey($fkGlossaryKey = null, $comparison = null)
    {
        if (is_array($fkGlossaryKey)) {
            $useMinMax = false;
            if (isset($fkGlossaryKey['min'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY, $fkGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKey['max'])) {
                $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY, $fkGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY, $fkGlossaryKey, $comparison);
    }

    /**
     * Filter the query on the placeholder column
     *
     * Example usage:
     * <code>
     * $query->filterByPlaceholder('fooValue');   // WHERE placeholder = 'fooValue'
     * $query->filterByPlaceholder('%fooValue%'); // WHERE placeholder LIKE '%fooValue%'
     * </code>
     *
     * @param     string $placeholder The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByPlaceholder($placeholder = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($placeholder)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $placeholder)) {
                $placeholder = str_replace('*', '%', $placeholder);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER, $placeholder, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCmsPage object
     *
     * @param \Propel\SpyCmsPage|ObjectCollection $spyCmsPage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByCmsPage($spyCmsPage, $comparison = null)
    {
        if ($spyCmsPage instanceof \Propel\SpyCmsPage) {
            return $this
                ->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE, $spyCmsPage->getIdCmsPage(), $comparison);
        } elseif ($spyCmsPage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE, $spyCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
        } else {
            throw new PropelException('filterByCmsPage() only accepts arguments of type \Propel\SpyCmsPage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function joinCmsPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsPage');

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
            $this->addJoinObject($join, 'CmsPage');
        }

        return $this;
    }

    /**
     * Use the CmsPage relation SpyCmsPage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsPageQuery A secondary query class using the current class as primary query
     */
    public function useCmsPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCmsPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsPage', '\Propel\SpyCmsPageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyGlossaryKey object
     *
     * @param \Propel\SpyGlossaryKey|ObjectCollection $spyGlossaryKey The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function filterByGlossaryKey($spyGlossaryKey, $comparison = null)
    {
        if ($spyGlossaryKey instanceof \Propel\SpyGlossaryKey) {
            return $this
                ->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY, $spyGlossaryKey->getIdGlossaryKey(), $comparison);
        } elseif ($spyGlossaryKey instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY, $spyGlossaryKey->toKeyValue('PrimaryKey', 'IdGlossaryKey'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryKey() only accepts arguments of type \Propel\SpyGlossaryKey or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function joinGlossaryKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryKey');

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
            $this->addJoinObject($join, 'GlossaryKey');
        }

        return $this;
    }

    /**
     * Use the GlossaryKey relation SpyGlossaryKey object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryKey', '\Propel\SpyGlossaryKeyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCmsGlossaryKeyMapping $spyCmsGlossaryKeyMapping Object to remove from the list of results
     *
     * @return $this|ChildSpyCmsGlossaryKeyMappingQuery The current query, for fluid interface
     */
    public function prune($spyCmsGlossaryKeyMapping = null)
    {
        if ($spyCmsGlossaryKeyMapping) {
            $this->addUsingAlias(SpyCmsGlossaryKeyMappingTableMap::COL_ID_CMS_GLOSSARY_KEY_MAPPING, $spyCmsGlossaryKeyMapping->getIdCmsGlossaryKeyMapping(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_cms_glossary_key_mapping table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsGlossaryKeyMappingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCmsGlossaryKeyMappingTableMap::clearInstancePool();
            SpyCmsGlossaryKeyMappingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsGlossaryKeyMappingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCmsGlossaryKeyMappingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCmsGlossaryKeyMappingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCmsGlossaryKeyMappingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCmsGlossaryKeyMappingQuery
