<?php


/**
 * Base class that represents a query for the 'pac_glossary_lookup' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery orderByIdGlossaryLookup($order = Criteria::ASC) Order by the id_glossary_lookup column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery orderByStore($order = Criteria::ASC) Order by the store column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery groupByIdGlossaryLookup() Group by the id_glossary_lookup column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery groupByStore() Group by the store column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery groupByLocale() Group by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery groupByText() Group by the text column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery leftJoinGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery rightJoinGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery innerJoinGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryKey relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOneByStore(string $store) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup filtered by the store column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOneByLocale(string $locale) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup filtered by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOneByName(string $name) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup filtered by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup findOneByText(string $text) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup filtered by the text column
 *
 * @method array findByIdGlossaryLookup(int $id_glossary_lookup) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects filtered by the id_glossary_lookup column
 * @method array findByStore(string $store) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects filtered by the store column
 * @method array findByLocale(string $locale) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects filtered by the locale column
 * @method array findByName(string $name) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects filtered by the name column
 * @method array findByText(string $text) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects filtered by the text column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryLookupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryLookupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery();
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup|ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryLookup($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_lookup`, `store`, `locale`, `name`, `text` FROM `pac_glossary_lookup` WHERE `id_glossary_lookup` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup|ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_glossary_lookup column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryLookup(1234); // WHERE id_glossary_lookup = 1234
     * $query->filterByIdGlossaryLookup(array(12, 34)); // WHERE id_glossary_lookup IN (12, 34)
     * $query->filterByIdGlossaryLookup(array('min' => 12)); // WHERE id_glossary_lookup >= 12
     * $query->filterByIdGlossaryLookup(array('max' => 12)); // WHERE id_glossary_lookup <= 12
     * </code>
     *
     * @param     mixed $idGlossaryLookup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryLookup($idGlossaryLookup = null, $comparison = null)
    {
        if (is_array($idGlossaryLookup)) {
            $useMinMax = false;
            if (isset($idGlossaryLookup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $idGlossaryLookup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryLookup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $idGlossaryLookup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $idGlossaryLookup, $comparison);
    }

    /**
     * Filter the query on the store column
     *
     * Example usage:
     * <code>
     * $query->filterByStore('fooValue');   // WHERE store = 'fooValue'
     * $query->filterByStore('%fooValue%'); // WHERE store LIKE '%fooValue%'
     * </code>
     *
     * @param     string $store The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByStore($store = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($store)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $store)) {
                $store = str_replace('*', '%', $store);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::STORE, $store, $comparison);
    }

    /**
     * Filter the query on the locale column
     *
     * Example usage:
     * <code>
     * $query->filterByLocale('fooValue');   // WHERE locale = 'fooValue'
     * $query->filterByLocale('%fooValue%'); // WHERE locale LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locale The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByLocale($locale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locale)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $locale)) {
                $locale = str_replace('*', '%', $locale);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::LOCALE, $locale, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKey|PropelObjectCollection $pacGlossaryKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryKey($pacGlossaryKey, $comparison = null)
    {
        if ($pacGlossaryKey instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::NAME, $pacGlossaryKey->getName(), $comparison);
        } elseif ($pacGlossaryKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::NAME, $pacGlossaryKey->toKeyValue('PrimaryKey', 'Name'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryKey() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
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
     * Use the GlossaryKey relation PacGlossaryKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup $pacGlossaryLookup Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryLookup = null)
    {
        if ($pacGlossaryLookup) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupPeer::ID_GLOSSARY_LOOKUP, $pacGlossaryLookup->getIdGlossaryLookup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
