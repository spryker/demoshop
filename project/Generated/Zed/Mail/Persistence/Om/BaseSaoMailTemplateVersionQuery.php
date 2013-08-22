<?php


/**
 * Base class that represents a query for the 'sao_mail_template_version' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByIdMailTemplate($order = Criteria::ASC) Order by the id_mail_template column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByHtml($order = Criteria::ASC) Order by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByWrap($order = Criteria::ASC) Order by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderByWrapVersion($order = Criteria::ASC) Order by the wrap_version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderBySaoMailTemplateIds($order = Criteria::ASC) Order by the sao_mail_template_ids column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery orderBySaoMailTemplateVersions($order = Criteria::ASC) Order by the sao_mail_template_versions column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByIdMailTemplate() Group by the id_mail_template column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByName() Group by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupBySubject() Group by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupBySender() Group by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByText() Group by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByHtml() Group by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByWrap() Group by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByDeleted() Group by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByVersion() Group by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupByWrapVersion() Group by the wrap_version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupBySaoMailTemplateIds() Group by the sao_mail_template_ids column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery groupBySaoMailTemplateVersions() Group by the sao_mail_template_versions column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery leftJoinSaoMailTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoMailTemplate relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery rightJoinSaoMailTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoMailTemplate relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery innerJoinSaoMailTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoMailTemplate relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailTemplateVersion object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByIdMailTemplate(int $id_mail_template) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the id_mail_template column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByName(string $name) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneBySubject(string $subject) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneBySender(string $sender) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByText(string $text) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByHtml(string $html) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByWrap(int $wrap) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByDeleted(boolean $deleted) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByVersion(int $version) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByVersionCreatedAt(string $version_created_at) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByVersionCreatedBy(string $version_created_by) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the version_created_by column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneByWrapVersion(int $wrap_version) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the wrap_version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneBySaoMailTemplateIds(array $sao_mail_template_ids) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the sao_mail_template_ids column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateVersion findOneBySaoMailTemplateVersions(array $sao_mail_template_versions) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplateVersion filtered by the sao_mail_template_versions column
 *
 * @method array findByIdMailTemplate(int $id_mail_template) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the id_mail_template column
 * @method array findByName(string $name) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the name column
 * @method array findBySubject(string $subject) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the subject column
 * @method array findBySender(string $sender) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the sender column
 * @method array findByText(string $text) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the text column
 * @method array findByHtml(string $html) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the html column
 * @method array findByWrap(int $wrap) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the wrap column
 * @method array findByDeleted(boolean $deleted) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the deleted column
 * @method array findByVersion(int $version) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the version_created_by column
 * @method array findByWrapVersion(int $wrap_version) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the wrap_version column
 * @method array findBySaoMailTemplateIds(array $sao_mail_template_ids) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the sao_mail_template_ids column
 * @method array findBySaoMailTemplateVersions(array $sao_mail_template_versions) Return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects filtered by the sao_mail_template_versions column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplateVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplateVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailTemplateVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id_mail_template, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplateVersion|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplateVersion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_template`, `name`, `subject`, `sender`, `text`, `html`, `wrap`, `deleted`, `version`, `version_created_at`, `version_created_by`, `wrap_version`, `sao_mail_template_ids`, `sao_mail_template_versions` FROM `sao_mail_template_version` WHERE `id_mail_template` = :p0 AND `version` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sao_Zed_Mail_Persistence_SaoMailTemplateVersion();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersion|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_mail_template column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailTemplate(1234); // WHERE id_mail_template = 1234
     * $query->filterByIdMailTemplate(array(12, 34)); // WHERE id_mail_template IN (12, 34)
     * $query->filterByIdMailTemplate(array('min' => 12)); // WHERE id_mail_template >= 12
     * $query->filterByIdMailTemplate(array('max' => 12)); // WHERE id_mail_template <= 12
     * </code>
     *
     * @see       filterBySaoMailTemplate()
     *
     * @param     mixed $idMailTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByIdMailTemplate($idMailTemplate = null, $comparison = null)
    {
        if (is_array($idMailTemplate)) {
            $useMinMax = false;
            if (isset($idMailTemplate['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailTemplate['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subject)) {
                $subject = str_replace('*', '%', $subject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the sender column
     *
     * Example usage:
     * <code>
     * $query->filterBySender('fooValue');   // WHERE sender = 'fooValue'
     * $query->filterBySender('%fooValue%'); // WHERE sender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sender The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sender)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sender)) {
                $sender = str_replace('*', '%', $sender);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SENDER, $sender, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the html column
     *
     * Example usage:
     * <code>
     * $query->filterByHtml('fooValue');   // WHERE html = 'fooValue'
     * $query->filterByHtml('%fooValue%'); // WHERE html LIKE '%fooValue%'
     * </code>
     *
     * @param     string $html The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByHtml($html = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($html)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $html)) {
                $html = str_replace('*', '%', $html);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::HTML, $html, $comparison);
    }

    /**
     * Filter the query on the wrap column
     *
     * Example usage:
     * <code>
     * $query->filterByWrap(1234); // WHERE wrap = 1234
     * $query->filterByWrap(array(12, 34)); // WHERE wrap IN (12, 34)
     * $query->filterByWrap(array('min' => 12)); // WHERE wrap >= 12
     * $query->filterByWrap(array('max' => 12)); // WHERE wrap <= 12
     * </code>
     *
     * @param     mixed $wrap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByWrap($wrap = null, $comparison = null)
    {
        if (is_array($wrap)) {
            $useMinMax = false;
            if (isset($wrap['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP, $wrap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrap['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP, $wrap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP, $wrap, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query on the wrap_version column
     *
     * Example usage:
     * <code>
     * $query->filterByWrapVersion(1234); // WHERE wrap_version = 1234
     * $query->filterByWrapVersion(array(12, 34)); // WHERE wrap_version IN (12, 34)
     * $query->filterByWrapVersion(array('min' => 12)); // WHERE wrap_version >= 12
     * $query->filterByWrapVersion(array('max' => 12)); // WHERE wrap_version <= 12
     * </code>
     *
     * @param     mixed $wrapVersion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByWrapVersion($wrapVersion = null, $comparison = null)
    {
        if (is_array($wrapVersion)) {
            $useMinMax = false;
            if (isset($wrapVersion['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP_VERSION, $wrapVersion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrapVersion['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP_VERSION, $wrapVersion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::WRAP_VERSION, $wrapVersion, $comparison);
    }

    /**
     * Filter the query on the sao_mail_template_ids column
     *
     * @param     array $saoMailTemplateIds The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySaoMailTemplateIds($saoMailTemplateIds = null, $comparison = null)
    {
        $key = $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_IDS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($saoMailTemplateIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($saoMailTemplateIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($saoMailTemplateIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_IDS, $saoMailTemplateIds, $comparison);
    }

    /**
     * Filter the query on the sao_mail_template_ids column
     * @param     mixed $saoMailTemplateIds The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySaoMailTemplateId($saoMailTemplateIds = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($saoMailTemplateIds)) {
                $saoMailTemplateIds = '%| ' . $saoMailTemplateIds . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $saoMailTemplateIds = '%| ' . $saoMailTemplateIds . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_IDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $saoMailTemplateIds, $comparison);
            } else {
                $this->addAnd($key, $saoMailTemplateIds, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_IDS, $saoMailTemplateIds, $comparison);
    }

    /**
     * Filter the query on the sao_mail_template_versions column
     *
     * @param     array $saoMailTemplateVersions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySaoMailTemplateVersions($saoMailTemplateVersions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_VERSIONS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($saoMailTemplateVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($saoMailTemplateVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($saoMailTemplateVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_VERSIONS, $saoMailTemplateVersions, $comparison);
    }

    /**
     * Filter the query on the sao_mail_template_versions column
     * @param     mixed $saoMailTemplateVersions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySaoMailTemplateVersion($saoMailTemplateVersions = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($saoMailTemplateVersions)) {
                $saoMailTemplateVersions = '%| ' . $saoMailTemplateVersions . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $saoMailTemplateVersions = '%| ' . $saoMailTemplateVersions . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_VERSIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $saoMailTemplateVersions, $comparison);
            } else {
                $this->addAnd($key, $saoMailTemplateVersions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::SAO_MAIL_TEMPLATE_VERSIONS, $saoMailTemplateVersions, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailTemplate object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplate|PropelObjectCollection $saoMailTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoMailTemplate($saoMailTemplate, $comparison = null)
    {
        if ($saoMailTemplate instanceof Sao_Zed_Mail_Persistence_SaoMailTemplate) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $saoMailTemplate->getIdMailTemplate(), $comparison);
        } elseif ($saoMailTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $saoMailTemplate->toKeyValue('PrimaryKey', 'IdMailTemplate'), $comparison);
        } else {
            throw new PropelException('filterBySaoMailTemplate() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoMailTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function joinSaoMailTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoMailTemplate');

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
            $this->addJoinObject($join, 'SaoMailTemplate');
        }

        return $this;
    }

    /**
     * Use the SaoMailTemplate relation SaoMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function useSaoMailTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoMailTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoMailTemplate', 'Sao_Zed_Mail_Persistence_SaoMailTemplateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $saoMailTemplateVersion Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery The current query, for fluid interface
     */
    public function prune($saoMailTemplateVersion = null)
    {
        if ($saoMailTemplateVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE), $saoMailTemplateVersion->getIdMailTemplate(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION), $saoMailTemplateVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
