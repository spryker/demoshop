<?php


/**
 * Base class that represents a query for the 'pac_tracking_setting' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery orderByIdTrackingSetting($order = Criteria::ASC) Order by the id_tracking_setting column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery groupByIdTrackingSetting() Group by the id_tracking_setting column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery groupByValue() Group by the value column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSetting findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingSetting matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSetting findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingSetting matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingSetting object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSetting findOneByName(string $name) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingSetting filtered by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingSetting findOneByValue(string $value) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingSetting filtered by the value column
 *
 * @method array findByIdTrackingSetting(int $id_tracking_setting) Return ProjectA_Zed_Tracking_Persistence_PacTrackingSetting objects filtered by the id_tracking_setting column
 * @method array findByName(string $name) Return ProjectA_Zed_Tracking_Persistence_PacTrackingSetting objects filtered by the name column
 * @method array findByValue(string $value) Return ProjectA_Zed_Tracking_Persistence_PacTrackingSetting objects filtered by the value column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingSettingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingSettingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingSetting', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingSetting|ProjectA_Zed_Tracking_Persistence_PacTrackingSetting[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingSetting A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingSetting($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingSetting A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_setting`, `name`, `value` FROM `pac_tracking_setting` WHERE `id_tracking_setting` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingSetting();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSetting|ProjectA_Zed_Tracking_Persistence_PacTrackingSetting[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingSetting[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_setting column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingSetting(1234); // WHERE id_tracking_setting = 1234
     * $query->filterByIdTrackingSetting(array(12, 34)); // WHERE id_tracking_setting IN (12, 34)
     * $query->filterByIdTrackingSetting(array('min' => 12)); // WHERE id_tracking_setting >= 12
     * $query->filterByIdTrackingSetting(array('max' => 12)); // WHERE id_tracking_setting <= 12
     * </code>
     *
     * @param     mixed $idTrackingSetting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
     */
    public function filterByIdTrackingSetting($idTrackingSetting = null, $comparison = null)
    {
        if (is_array($idTrackingSetting)) {
            $useMinMax = false;
            if (isset($idTrackingSetting['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $idTrackingSetting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingSetting['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $idTrackingSetting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $idTrackingSetting, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingSetting $pacTrackingSetting Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingSettingQuery The current query, for fluid interface
     */
    public function prune($pacTrackingSetting = null)
    {
        if ($pacTrackingSetting) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingSettingPeer::ID_TRACKING_SETTING, $pacTrackingSetting->getIdTrackingSetting(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
