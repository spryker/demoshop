<?php


/**
 * Base class that represents a query for the 'pac_glossary_language' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery orderByIdGlossaryLanguage($order = Criteria::ASC) Order by the id_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery orderByLocale($order = Criteria::ASC) Order by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery groupByIdGlossaryLanguage() Group by the id_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery groupByLocale() Group by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery leftJoinGlossaryExplanation($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery rightJoinGlossaryExplanation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery innerJoinGlossaryExplanation($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryExplanation relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage findOneByLocale(string $locale) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage filtered by the locale column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage findOneByName(string $name) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage filtered by the name column
 *
 * @method array findByIdGlossaryLanguage(int $id_glossary_language) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage objects filtered by the id_glossary_language column
 * @method array findByLocale(string $locale) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage objects filtered by the locale column
 * @method array findByName(string $name) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage objects filtered by the name column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryLanguageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryLanguageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery();
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage|ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryLanguage($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_language`, `locale`, `name` FROM `pac_glossary_language` WHERE `id_glossary_language` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage|ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_glossary_language column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryLanguage(1234); // WHERE id_glossary_language = 1234
     * $query->filterByIdGlossaryLanguage(array(12, 34)); // WHERE id_glossary_language IN (12, 34)
     * $query->filterByIdGlossaryLanguage(array('min' => 12)); // WHERE id_glossary_language >= 12
     * $query->filterByIdGlossaryLanguage(array('max' => 12)); // WHERE id_glossary_language <= 12
     * </code>
     *
     * @param     mixed $idGlossaryLanguage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryLanguage($idGlossaryLanguage = null, $comparison = null)
    {
        if (is_array($idGlossaryLanguage)) {
            $useMinMax = false;
            if (isset($idGlossaryLanguage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $idGlossaryLanguage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryLanguage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $idGlossaryLanguage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $idGlossaryLanguage, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::LOCALE, $locale, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation|PropelObjectCollection $pacGlossaryExplanation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryExplanation($pacGlossaryExplanation, $comparison = null)
    {
        if ($pacGlossaryExplanation instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $pacGlossaryExplanation->getFkGlossaryLanguage(), $comparison);
        } elseif ($pacGlossaryExplanation instanceof PropelObjectCollection) {
            return $this
                ->useGlossaryExplanationQuery()
                ->filterByPrimaryKeys($pacGlossaryExplanation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGlossaryExplanation() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryExplanation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     */
    public function joinGlossaryExplanation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryExplanation');

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
            $this->addJoinObject($join, 'GlossaryExplanation');
        }

        return $this;
    }

    /**
     * Use the GlossaryExplanation relation PacGlossaryExplanation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryExplanationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryExplanation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage $pacGlossaryLanguage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryLanguage = null)
    {
        if ($pacGlossaryLanguage) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguagePeer::ID_GLOSSARY_LANGUAGE, $pacGlossaryLanguage->getIdGlossaryLanguage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
