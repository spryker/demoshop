<?php


/**
 * Base class that represents a query for the 'sao_sales_order_item_version' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByFkArtistSales($order = Criteria::ASC) Order by the fk_artist_sales column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByImpression($order = Criteria::ASC) Order by the impression column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByFkMiscRegion($order = Criteria::ASC) Order by the fk_misc_region column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByPoBox($order = Criteria::ASC) Order by the po_box column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByMarkedForRefund($order = Criteria::ASC) Order by the marked_for_refund column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery orderByVersionComment($order = Criteria::ASC) Order by the version_comment column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByFkArtistSales() Group by the fk_artist_sales column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByImpression() Group by the impression column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByFkMiscRegion() Group by the fk_misc_region column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupBySalutation() Group by the salutation column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByFirstName() Group by the first_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByMiddleName() Group by the middle_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByLastName() Group by the last_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByAddress1() Group by the address1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByAddress2() Group by the address2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByAddress3() Group by the address3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByCompany() Group by the company column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByCity() Group by the city column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByZipCode() Group by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByPoBox() Group by the po_box column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByPhone() Group by the phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByCellPhone() Group by the cell_phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByDescription() Group by the description column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByComment() Group by the comment column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByEmail() Group by the email column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByMarkedForRefund() Group by the marked_for_refund column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByUpdatedAt() Group by the updated_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByVersion() Group by the version column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery groupByVersionComment() Group by the version_comment column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery leftJoinSaoSalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoSalesOrderItem relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery rightJoinSaoSalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoSalesOrderItem relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery innerJoinSaoSalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoSalesOrderItem relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByIdSalesOrderItem(int $id_sales_order_item) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the id_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByFkArtistSales(int $fk_artist_sales) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the fk_artist_sales column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByImpression(int $impression) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the impression column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByFkMiscCountry(int $fk_misc_country) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the fk_misc_country column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByFkMiscRegion(int $fk_misc_region) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the fk_misc_region column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneBySalutation(int $salutation) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the salutation column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByFirstName(string $first_name) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the first_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByMiddleName(string $middle_name) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the middle_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByLastName(string $last_name) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the last_name column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByAddress1(string $address1) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the address1 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByAddress2(string $address2) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the address2 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByAddress3(string $address3) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the address3 column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByCompany(string $company) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the company column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByCity(string $city) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the city column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByZipCode(string $zip_code) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the zip_code column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByPoBox(string $po_box) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the po_box column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByPhone(string $phone) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByCellPhone(string $cell_phone) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the cell_phone column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByDescription(string $description) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the description column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByComment(string $comment) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the comment column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByEmail(string $email) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the email column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByMarkedForRefund(boolean $marked_for_refund) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the marked_for_refund column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the updated_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByVersion(int $version) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the version column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByVersionCreatedAt(string $version_created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the version_created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByVersionCreatedBy(string $version_created_by) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the version_created_by column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion findOneByVersionComment(string $version_comment) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion filtered by the version_comment column
 *
 * @method array findByIdSalesOrderItem(int $id_sales_order_item) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the id_sales_order_item column
 * @method array findByFkArtistSales(int $fk_artist_sales) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the fk_artist_sales column
 * @method array findByImpression(int $impression) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the impression column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the fk_misc_country column
 * @method array findByFkMiscRegion(int $fk_misc_region) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the fk_misc_region column
 * @method array findBySalutation(int $salutation) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the first_name column
 * @method array findByMiddleName(string $middle_name) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the middle_name column
 * @method array findByLastName(string $last_name) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the last_name column
 * @method array findByAddress1(string $address1) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the address1 column
 * @method array findByAddress2(string $address2) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the address2 column
 * @method array findByAddress3(string $address3) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the address3 column
 * @method array findByCompany(string $company) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the company column
 * @method array findByCity(string $city) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the city column
 * @method array findByZipCode(string $zip_code) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the zip_code column
 * @method array findByPoBox(string $po_box) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the po_box column
 * @method array findByPhone(string $phone) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the phone column
 * @method array findByCellPhone(string $cell_phone) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the cell_phone column
 * @method array findByDescription(string $description) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the description column
 * @method array findByComment(string $comment) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the comment column
 * @method array findByEmail(string $email) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the email column
 * @method array findByMarkedForRefund(boolean $marked_for_refund) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the marked_for_refund column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the updated_at column
 * @method array findByVersion(int $version) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the version_created_by column
 * @method array findByVersionComment(string $version_comment) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion objects filtered by the version_comment column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery();
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
                         A Primary key composition: [$id_sales_order_item, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion|Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item`, `fk_artist_sales`, `impression`, `fk_misc_country`, `fk_misc_region`, `salutation`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `address3`, `company`, `city`, `zip_code`, `po_box`, `phone`, `cell_phone`, `description`, `comment`, `email`, `marked_for_refund`, `created_at`, `updated_at`, `version`, `version_created_at`, `version_created_by`, `version_comment` FROM `sao_sales_order_item_version` WHERE `id_sales_order_item` = :p0 AND `version` = :p1';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion|Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItem(1234); // WHERE id_sales_order_item = 1234
     * $query->filterByIdSalesOrderItem(array(12, 34)); // WHERE id_sales_order_item IN (12, 34)
     * $query->filterByIdSalesOrderItem(array('min' => 12)); // WHERE id_sales_order_item >= 12
     * $query->filterByIdSalesOrderItem(array('max' => 12)); // WHERE id_sales_order_item <= 12
     * </code>
     *
     * @see       filterBySaoSalesOrderItem()
     *
     * @param     mixed $idSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_artist_sales column
     *
     * Example usage:
     * <code>
     * $query->filterByFkArtistSales(1234); // WHERE fk_artist_sales = 1234
     * $query->filterByFkArtistSales(array(12, 34)); // WHERE fk_artist_sales IN (12, 34)
     * $query->filterByFkArtistSales(array('min' => 12)); // WHERE fk_artist_sales >= 12
     * $query->filterByFkArtistSales(array('max' => 12)); // WHERE fk_artist_sales <= 12
     * </code>
     *
     * @param     mixed $fkArtistSales The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByFkArtistSales($fkArtistSales = null, $comparison = null)
    {
        if (is_array($fkArtistSales)) {
            $useMinMax = false;
            if (isset($fkArtistSales['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES, $fkArtistSales['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkArtistSales['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES, $fkArtistSales['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES, $fkArtistSales, $comparison);
    }

    /**
     * Filter the query on the impression column
     *
     * Example usage:
     * <code>
     * $query->filterByImpression(1234); // WHERE impression = 1234
     * $query->filterByImpression(array(12, 34)); // WHERE impression IN (12, 34)
     * $query->filterByImpression(array('min' => 12)); // WHERE impression >= 12
     * $query->filterByImpression(array('max' => 12)); // WHERE impression <= 12
     * </code>
     *
     * @param     mixed $impression The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByImpression($impression = null, $comparison = null)
    {
        if (is_array($impression)) {
            $useMinMax = false;
            if (isset($impression['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION, $impression['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($impression['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION, $impression['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION, $impression, $comparison);
    }

    /**
     * Filter the query on the fk_misc_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscCountry(1234); // WHERE fk_misc_country = 1234
     * $query->filterByFkMiscCountry(array(12, 34)); // WHERE fk_misc_country IN (12, 34)
     * $query->filterByFkMiscCountry(array('min' => 12)); // WHERE fk_misc_country >= 12
     * $query->filterByFkMiscCountry(array('max' => 12)); // WHERE fk_misc_country <= 12
     * </code>
     *
     * @param     mixed $fkMiscCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
    }

    /**
     * Filter the query on the fk_misc_region column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscRegion(1234); // WHERE fk_misc_region = 1234
     * $query->filterByFkMiscRegion(array(12, 34)); // WHERE fk_misc_region IN (12, 34)
     * $query->filterByFkMiscRegion(array('min' => 12)); // WHERE fk_misc_region >= 12
     * $query->filterByFkMiscRegion(array('max' => 12)); // WHERE fk_misc_region <= 12
     * </code>
     *
     * @param     mixed $fkMiscRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByFkMiscRegion($fkMiscRegion = null, $comparison = null)
    {
        if (is_array($fkMiscRegion)) {
            $useMinMax = false;
            if (isset($fkMiscRegion['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION, $fkMiscRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscRegion['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION, $fkMiscRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION, $fkMiscRegion, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION, $salutation, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the middle_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMiddleName('fooValue');   // WHERE middle_name = 'fooValue'
     * $query->filterByMiddleName('%fooValue%'); // WHERE middle_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $middleName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByMiddleName($middleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($middleName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $middleName)) {
                $middleName = str_replace('*', '%', $middleName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MIDDLE_NAME, $middleName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%'); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address3)) {
                $address3 = str_replace('*', '%', $address3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the zip_code column
     *
     * Example usage:
     * <code>
     * $query->filterByZipCode('fooValue');   // WHERE zip_code = 'fooValue'
     * $query->filterByZipCode('%fooValue%'); // WHERE zip_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByZipCode($zipCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipCode)) {
                $zipCode = str_replace('*', '%', $zipCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the po_box column
     *
     * Example usage:
     * <code>
     * $query->filterByPoBox('fooValue');   // WHERE po_box = 'fooValue'
     * $query->filterByPoBox('%fooValue%'); // WHERE po_box LIKE '%fooValue%'
     * </code>
     *
     * @param     string $poBox The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByPoBox($poBox = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poBox)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $poBox)) {
                $poBox = str_replace('*', '%', $poBox);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PO_BOX, $poBox, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the cell_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellPhone('fooValue');   // WHERE cell_phone = 'fooValue'
     * $query->filterByCellPhone('%fooValue%'); // WHERE cell_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByCellPhone($cellPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cellPhone)) {
                $cellPhone = str_replace('*', '%', $cellPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CELL_PHONE, $cellPhone, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the marked_for_refund column
     *
     * Example usage:
     * <code>
     * $query->filterByMarkedForRefund(true); // WHERE marked_for_refund = true
     * $query->filterByMarkedForRefund('yes'); // WHERE marked_for_refund = true
     * </code>
     *
     * @param     boolean|string $markedForRefund The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByMarkedForRefund($markedForRefund = null, $comparison = null)
    {
        if (is_string($markedForRefund)) {
            $markedForRefund = in_array(strtolower($markedForRefund), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MARKED_FOR_REFUND, $markedForRefund, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $version, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query on the version_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionComment('fooValue');   // WHERE version_comment = 'fooValue'
     * $query->filterByVersionComment('%fooValue%'); // WHERE version_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function filterByVersionComment($versionComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionComment)) {
                $versionComment = str_replace('*', '%', $versionComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_COMMENT, $versionComment, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItem|PropelObjectCollection $saoSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoSalesOrderItem($saoSalesOrderItem, $comparison = null)
    {
        if ($saoSalesOrderItem instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($saoSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterBySaoSalesOrderItem() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoSalesOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function joinSaoSalesOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoSalesOrderItem');

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
            $this->addJoinObject($join, 'SaoSalesOrderItem');
        }

        return $this;
    }

    /**
     * Use the SaoSalesOrderItem relation SaoSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSaoSalesOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoSalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoSalesOrderItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion $saoSalesOrderItemVersion Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery The current query, for fluid interface
     */
    public function prune($saoSalesOrderItemVersion = null)
    {
        if ($saoSalesOrderItemVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM), $saoSalesOrderItemVersion->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION), $saoSalesOrderItemVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
