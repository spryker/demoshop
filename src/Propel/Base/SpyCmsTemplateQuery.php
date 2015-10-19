<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCmsTemplate as ChildSpyCmsTemplate;
use Propel\SpyCmsTemplateQuery as ChildSpyCmsTemplateQuery;
use Propel\Map\SpyCmsTemplateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_cms_template' table.
 *
 *
 *
 * @method     ChildSpyCmsTemplateQuery orderByIdCmsTemplate($order = Criteria::ASC) Order by the id_cms_template column
 * @method     ChildSpyCmsTemplateQuery orderByTemplateName($order = Criteria::ASC) Order by the template_name column
 * @method     ChildSpyCmsTemplateQuery orderByTemplatePath($order = Criteria::ASC) Order by the template_path column
 *
 * @method     ChildSpyCmsTemplateQuery groupByIdCmsTemplate() Group by the id_cms_template column
 * @method     ChildSpyCmsTemplateQuery groupByTemplateName() Group by the template_name column
 * @method     ChildSpyCmsTemplateQuery groupByTemplatePath() Group by the template_path column
 *
 * @method     ChildSpyCmsTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCmsTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCmsTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCmsTemplateQuery leftJoinSpyCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCmsPage relation
 * @method     ChildSpyCmsTemplateQuery rightJoinSpyCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCmsPage relation
 * @method     ChildSpyCmsTemplateQuery innerJoinSpyCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCmsPage relation
 *
 * @method     \Propel\SpyCmsPageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCmsTemplate findOne(ConnectionInterface $con = null) Return the first ChildSpyCmsTemplate matching the query
 * @method     ChildSpyCmsTemplate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCmsTemplate matching the query, or a new ChildSpyCmsTemplate object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCmsTemplate findOneByIdCmsTemplate(int $id_cms_template) Return the first ChildSpyCmsTemplate filtered by the id_cms_template column
 * @method     ChildSpyCmsTemplate findOneByTemplateName(string $template_name) Return the first ChildSpyCmsTemplate filtered by the template_name column
 * @method     ChildSpyCmsTemplate findOneByTemplatePath(string $template_path) Return the first ChildSpyCmsTemplate filtered by the template_path column *

 * @method     ChildSpyCmsTemplate requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCmsTemplate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsTemplate requireOne(ConnectionInterface $con = null) Return the first ChildSpyCmsTemplate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsTemplate requireOneByIdCmsTemplate(int $id_cms_template) Return the first ChildSpyCmsTemplate filtered by the id_cms_template column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsTemplate requireOneByTemplateName(string $template_name) Return the first ChildSpyCmsTemplate filtered by the template_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsTemplate requireOneByTemplatePath(string $template_path) Return the first ChildSpyCmsTemplate filtered by the template_path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsTemplate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCmsTemplate objects based on current ModelCriteria
 * @method     ChildSpyCmsTemplate[]|ObjectCollection findByIdCmsTemplate(int $id_cms_template) Return ChildSpyCmsTemplate objects filtered by the id_cms_template column
 * @method     ChildSpyCmsTemplate[]|ObjectCollection findByTemplateName(string $template_name) Return ChildSpyCmsTemplate objects filtered by the template_name column
 * @method     ChildSpyCmsTemplate[]|ObjectCollection findByTemplatePath(string $template_path) Return ChildSpyCmsTemplate objects filtered by the template_path column
 * @method     ChildSpyCmsTemplate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCmsTemplateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCmsTemplateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCmsTemplate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCmsTemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCmsTemplateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCmsTemplateQuery) {
            return $criteria;
        }
        $query = new ChildSpyCmsTemplateQuery();
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
     * @return ChildSpyCmsTemplate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCmsTemplateTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCmsTemplateTableMap::DATABASE_NAME);
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
     * @return ChildSpyCmsTemplate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_cms_template, template_name, template_path FROM spy_cms_template WHERE id_cms_template = :p0';
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
            /** @var ChildSpyCmsTemplate $obj */
            $obj = new ChildSpyCmsTemplate();
            $obj->hydrate($row);
            SpyCmsTemplateTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCmsTemplate|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_template column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsTemplate(1234); // WHERE id_cms_template = 1234
     * $query->filterByIdCmsTemplate(array(12, 34)); // WHERE id_cms_template IN (12, 34)
     * $query->filterByIdCmsTemplate(array('min' => 12)); // WHERE id_cms_template > 12
     * </code>
     *
     * @param     mixed $idCmsTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterByIdCmsTemplate($idCmsTemplate = null, $comparison = null)
    {
        if (is_array($idCmsTemplate)) {
            $useMinMax = false;
            if (isset($idCmsTemplate['min'])) {
                $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $idCmsTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsTemplate['max'])) {
                $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $idCmsTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $idCmsTemplate, $comparison);
    }

    /**
     * Filter the query on the template_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateName('fooValue');   // WHERE template_name = 'fooValue'
     * $query->filterByTemplateName('%fooValue%'); // WHERE template_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $templateName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterByTemplateName($templateName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($templateName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $templateName)) {
                $templateName = str_replace('*', '%', $templateName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCmsTemplateTableMap::COL_TEMPLATE_NAME, $templateName, $comparison);
    }

    /**
     * Filter the query on the template_path column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplatePath('fooValue');   // WHERE template_path = 'fooValue'
     * $query->filterByTemplatePath('%fooValue%'); // WHERE template_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $templatePath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterByTemplatePath($templatePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($templatePath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $templatePath)) {
                $templatePath = str_replace('*', '%', $templatePath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH, $templatePath, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCmsPage object
     *
     * @param \Propel\SpyCmsPage|ObjectCollection $spyCmsPage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function filterBySpyCmsPage($spyCmsPage, $comparison = null)
    {
        if ($spyCmsPage instanceof \Propel\SpyCmsPage) {
            return $this
                ->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $spyCmsPage->getFkTemplate(), $comparison);
        } elseif ($spyCmsPage instanceof ObjectCollection) {
            return $this
                ->useSpyCmsPageQuery()
                ->filterByPrimaryKeys($spyCmsPage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyCmsPage() only accepts arguments of type \Propel\SpyCmsPage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCmsPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function joinSpyCmsPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCmsPage');

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
            $this->addJoinObject($join, 'SpyCmsPage');
        }

        return $this;
    }

    /**
     * Use the SpyCmsPage relation SpyCmsPage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsPageQuery A secondary query class using the current class as primary query
     */
    public function useSpyCmsPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCmsPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCmsPage', '\Propel\SpyCmsPageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCmsTemplate $spyCmsTemplate Object to remove from the list of results
     *
     * @return $this|ChildSpyCmsTemplateQuery The current query, for fluid interface
     */
    public function prune($spyCmsTemplate = null)
    {
        if ($spyCmsTemplate) {
            $this->addUsingAlias(SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE, $spyCmsTemplate->getIdCmsTemplate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_cms_template table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsTemplateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCmsTemplateTableMap::clearInstancePool();
            SpyCmsTemplateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsTemplateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCmsTemplateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCmsTemplateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCmsTemplateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCmsTemplateQuery
