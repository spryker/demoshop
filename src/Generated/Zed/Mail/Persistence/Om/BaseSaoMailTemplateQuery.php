<?php


/**
 * Base class that represents a query for the 'sao_mail_template' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByIdMailTemplate($order = Criteria::ASC) Order by the id_mail_template column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByHtml($order = Criteria::ASC) Order by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByWrap($order = Criteria::ASC) Order by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByIdMailTemplate() Group by the id_mail_template column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByName() Group by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupBySubject() Group by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupBySender() Group by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByText() Group by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByHtml() Group by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByWrap() Group by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByDeleted() Group by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByVersion() Group by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery leftJoinMailTemplateWrap($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailTemplateWrap relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery rightJoinMailTemplateWrap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailTemplateWrap relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery innerJoinMailTemplateWrap($relationAlias = null) Adds a INNER JOIN clause to the query using the MailTemplateWrap relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery leftJoinMailTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailTemplate relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery rightJoinMailTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailTemplate relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery innerJoinMailTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the MailTemplate relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery leftJoinSaoMailTemplateVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoMailTemplateVersion relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery rightJoinSaoMailTemplateVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoMailTemplateVersion relation
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplateQuery innerJoinSaoMailTemplateVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoMailTemplateVersion relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailTemplate object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByName(string $name) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneBySubject(string $subject) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the subject column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneBySender(string $sender) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the sender column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByText(string $text) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the text column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByHtml(string $html) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the html column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByWrap(int $wrap) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the wrap column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByDeleted(boolean $deleted) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the deleted column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByVersion(int $version) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the version column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByVersionCreatedAt(string $version_created_at) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the version_created_at column
 * @method Sao_Zed_Mail_Persistence_SaoMailTemplate findOneByVersionCreatedBy(string $version_created_by) Return the first Sao_Zed_Mail_Persistence_SaoMailTemplate filtered by the version_created_by column
 *
 * @method array findByIdMailTemplate(int $id_mail_template) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the id_mail_template column
 * @method array findByName(string $name) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the name column
 * @method array findBySubject(string $subject) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the subject column
 * @method array findBySender(string $sender) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the sender column
 * @method array findByText(string $text) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the text column
 * @method array findByHtml(string $html) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the html column
 * @method array findByWrap(int $wrap) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the wrap column
 * @method array findByDeleted(boolean $deleted) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the deleted column
 * @method array findByVersion(int $version) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return Sao_Zed_Mail_Persistence_SaoMailTemplate objects filtered by the version_created_by column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailTemplate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailTemplateQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplate|Sao_Zed_Mail_Persistence_SaoMailTemplate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailTemplate($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_template`, `name`, `subject`, `sender`, `text`, `html`, `wrap`, `deleted`, `version`, `version_created_at`, `version_created_by` FROM `sao_mail_template` WHERE `id_mail_template` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailTemplate();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate|Sao_Zed_Mail_Persistence_SaoMailTemplate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplate[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $keys, Criteria::IN);
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
     * @param     mixed $idMailTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByIdMailTemplate($idMailTemplate = null, $comparison = null)
    {
        if (is_array($idMailTemplate)) {
            $useMinMax = false;
            if (isset($idMailTemplate['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailTemplate['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME, $name, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT, $subject, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER, $sender, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT, $text, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML, $html, $comparison);
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
     * @see       filterByMailTemplateWrap()
     *
     * @param     mixed $wrap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByWrap($wrap = null, $comparison = null)
    {
        if (is_array($wrap)) {
            $useMinMax = false;
            if (isset($wrap['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $wrap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrap['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $wrap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $wrap, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED, $deleted, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION, $version, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailTemplate object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplate|PropelObjectCollection $saoMailTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailTemplateWrap($saoMailTemplate, $comparison = null)
    {
        if ($saoMailTemplate instanceof Sao_Zed_Mail_Persistence_SaoMailTemplate) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $saoMailTemplate->getIdMailTemplate(), $comparison);
        } elseif ($saoMailTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $saoMailTemplate->toKeyValue('PrimaryKey', 'IdMailTemplate'), $comparison);
        } else {
            throw new PropelException('filterByMailTemplateWrap() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailTemplateWrap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function joinMailTemplateWrap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailTemplateWrap');

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
            $this->addJoinObject($join, 'MailTemplateWrap');
        }

        return $this;
    }

    /**
     * Use the MailTemplateWrap relation SaoMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function useMailTemplateWrapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMailTemplateWrap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailTemplateWrap', 'Sao_Zed_Mail_Persistence_SaoMailTemplateQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailTemplate object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplate|PropelObjectCollection $saoMailTemplate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailTemplate($saoMailTemplate, $comparison = null)
    {
        if ($saoMailTemplate instanceof Sao_Zed_Mail_Persistence_SaoMailTemplate) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $saoMailTemplate->getWrap(), $comparison);
        } elseif ($saoMailTemplate instanceof PropelObjectCollection) {
            return $this
                ->useMailTemplateQuery()
                ->filterByPrimaryKeys($saoMailTemplate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMailTemplate() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function joinMailTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailTemplate');

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
            $this->addJoinObject($join, 'MailTemplate');
        }

        return $this;
    }

    /**
     * Use the MailTemplate relation SaoMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function useMailTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMailTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailTemplate', 'Sao_Zed_Mail_Persistence_SaoMailTemplateQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailTemplateVersion object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplateVersion|PropelObjectCollection $saoMailTemplateVersion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoMailTemplateVersion($saoMailTemplateVersion, $comparison = null)
    {
        if ($saoMailTemplateVersion instanceof Sao_Zed_Mail_Persistence_SaoMailTemplateVersion) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $saoMailTemplateVersion->getIdMailTemplate(), $comparison);
        } elseif ($saoMailTemplateVersion instanceof PropelObjectCollection) {
            return $this
                ->useSaoMailTemplateVersionQuery()
                ->filterByPrimaryKeys($saoMailTemplateVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoMailTemplateVersion() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailTemplateVersion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoMailTemplateVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function joinSaoMailTemplateVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoMailTemplateVersion');

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
            $this->addJoinObject($join, 'SaoMailTemplateVersion');
        }

        return $this;
    }

    /**
     * Use the SaoMailTemplateVersion relation SaoMailTemplateVersion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery A secondary query class using the current class as primary query
     */
    public function useSaoMailTemplateVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoMailTemplateVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoMailTemplateVersion', 'Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplate $saoMailTemplate Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery The current query, for fluid interface
     */
    public function prune($saoMailTemplate = null)
    {
        if ($saoMailTemplate) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $saoMailTemplate->getIdMailTemplate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
