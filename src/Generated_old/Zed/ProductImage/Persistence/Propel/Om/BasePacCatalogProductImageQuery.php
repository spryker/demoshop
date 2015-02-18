<?php


/**
 * Base class that represents a query for the 'pac_catalog_product_image' table.
 *
 *
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByIdCatalogProductImage($order = Criteria::ASC) Order by the id_catalog_product_image column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByFkCatalogProductImageSize($order = Criteria::ASC) Order by the fk_catalog_product_image_size column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderBySeoTitle($order = Criteria::ASC) Order by the seo_title column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderBySeoFilename($order = Criteria::ASC) Order by the seo_filename column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByOriginalImagePath($order = Criteria::ASC) Order by the original_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByProcessedImagePath($order = Criteria::ASC) Order by the processed_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByImageHash($order = Criteria::ASC) Order by the image_hash column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByIdCatalogProductImage() Group by the id_catalog_product_image column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByFkCatalogProductImageSize() Group by the fk_catalog_product_image_size column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupBySeoTitle() Group by the seo_title column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupBySeoFilename() Group by the seo_filename column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByWeight() Group by the weight column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByOriginalImagePath() Group by the original_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByProcessedImagePath() Group by the processed_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByImageHash() Group by the image_hash column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery leftJoinProductImageSize($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductImageSize relation
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery rightJoinProductImageSize($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductImageSize relation
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery innerJoinProductImageSize($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductImageSize relation
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage matching the query
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage matching the query, or a new ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the fk_catalog_product column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByFkCatalogProductImageSize(int $fk_catalog_product_image_size) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the fk_catalog_product_image_size column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneBySeoTitle(string $seo_title) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the seo_title column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneBySeoFilename(string $seo_filename) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the seo_filename column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByWeight(string $weight) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the weight column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByOriginalImagePath(string $original_image_path) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the original_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByProcessedImagePath(string $processed_image_path) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the processed_image_path column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByImageHash(string $image_hash) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the image_hash column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the created_at column
 * @method ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage filtered by the updated_at column
 *
 * @method array findByIdCatalogProductImage(int $id_catalog_product_image) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the id_catalog_product_image column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the fk_catalog_product column
 * @method array findByFkCatalogProductImageSize(int $fk_catalog_product_image_size) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the fk_catalog_product_image_size column
 * @method array findBySeoTitle(string $seo_title) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the seo_title column
 * @method array findBySeoFilename(string $seo_filename) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the seo_filename column
 * @method array findByWeight(string $weight) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the weight column
 * @method array findByOriginalImagePath(string $original_image_path) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the original_image_path column
 * @method array findByProcessedImagePath(string $processed_image_path) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the processed_image_path column
 * @method array findByImageHash(string $image_hash) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the image_hash column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductImage/Persistence/Propel.om
 */
abstract class Generated_Zed_ProductImage_Persistence_Propel_Om_BasePacCatalogProductImageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_ProductImage_Persistence_Propel_Om_BasePacCatalogProductImageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogProductImage']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogProductImage($key, $con = null)
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
     * @return                 ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_product_image`, `fk_catalog_product`, `fk_catalog_product_image_size`, `seo_title`, `seo_filename`, `weight`, `original_image_path`, `processed_image_path`, `image_hash`, `created_at`, `updated_at` FROM `pac_catalog_product_image` WHERE `id_catalog_product_image` = :p0';
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
            $obj = new ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage();
            $obj->hydrate($row);
            ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_product_image column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogProductImage(1234); // WHERE id_catalog_product_image = 1234
     * $query->filterByIdCatalogProductImage(array(12, 34)); // WHERE id_catalog_product_image IN (12, 34)
     * $query->filterByIdCatalogProductImage(array('min' => 12)); // WHERE id_catalog_product_image >= 12
     * $query->filterByIdCatalogProductImage(array('max' => 12)); // WHERE id_catalog_product_image <= 12
     * </code>
     *
     * @param     mixed $idCatalogProductImage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByIdCatalogProductImage($idCatalogProductImage = null, $comparison = null)
    {
        if (is_array($idCatalogProductImage)) {
            $useMinMax = false;
            if (isset($idCatalogProductImage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $idCatalogProductImage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogProductImage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $idCatalogProductImage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $idCatalogProductImage, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProduct(1234); // WHERE fk_catalog_product = 1234
     * $query->filterByFkCatalogProduct(array(12, 34)); // WHERE fk_catalog_product IN (12, 34)
     * $query->filterByFkCatalogProduct(array('min' => 12)); // WHERE fk_catalog_product >= 12
     * $query->filterByFkCatalogProduct(array('max' => 12)); // WHERE fk_catalog_product <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product_image_size column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProductImageSize(1234); // WHERE fk_catalog_product_image_size = 1234
     * $query->filterByFkCatalogProductImageSize(array(12, 34)); // WHERE fk_catalog_product_image_size IN (12, 34)
     * $query->filterByFkCatalogProductImageSize(array('min' => 12)); // WHERE fk_catalog_product_image_size >= 12
     * $query->filterByFkCatalogProductImageSize(array('max' => 12)); // WHERE fk_catalog_product_image_size <= 12
     * </code>
     *
     * @see       filterByProductImageSize()
     *
     * @param     mixed $fkCatalogProductImageSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProductImageSize($fkCatalogProductImageSize = null, $comparison = null)
    {
        if (is_array($fkCatalogProductImageSize)) {
            $useMinMax = false;
            if (isset($fkCatalogProductImageSize['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT_IMAGE_SIZE, $fkCatalogProductImageSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProductImageSize['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT_IMAGE_SIZE, $fkCatalogProductImageSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT_IMAGE_SIZE, $fkCatalogProductImageSize, $comparison);
    }

    /**
     * Filter the query on the seo_title column
     *
     * Example usage:
     * <code>
     * $query->filterBySeoTitle('fooValue');   // WHERE seo_title = 'fooValue'
     * $query->filterBySeoTitle('%fooValue%'); // WHERE seo_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $seoTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterBySeoTitle($seoTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($seoTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $seoTitle)) {
                $seoTitle = str_replace('*', '%', $seoTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::SEO_TITLE, $seoTitle, $comparison);
    }

    /**
     * Filter the query on the seo_filename column
     *
     * Example usage:
     * <code>
     * $query->filterBySeoFilename('fooValue');   // WHERE seo_filename = 'fooValue'
     * $query->filterBySeoFilename('%fooValue%'); // WHERE seo_filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $seoFilename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterBySeoFilename($seoFilename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($seoFilename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $seoFilename)) {
                $seoFilename = str_replace('*', '%', $seoFilename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::SEO_FILENAME, $seoFilename, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight('fooValue');   // WHERE weight = 'fooValue'
     * $query->filterByWeight('%fooValue%'); // WHERE weight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weight The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weight)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $weight)) {
                $weight = str_replace('*', '%', $weight);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::WEIGHT, $weight, $comparison);
    }

    /**
     * Filter the query on the original_image_path column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalImagePath('fooValue');   // WHERE original_image_path = 'fooValue'
     * $query->filterByOriginalImagePath('%fooValue%'); // WHERE original_image_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalImagePath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByOriginalImagePath($originalImagePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalImagePath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $originalImagePath)) {
                $originalImagePath = str_replace('*', '%', $originalImagePath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ORIGINAL_IMAGE_PATH, $originalImagePath, $comparison);
    }

    /**
     * Filter the query on the processed_image_path column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessedImagePath('fooValue');   // WHERE processed_image_path = 'fooValue'
     * $query->filterByProcessedImagePath('%fooValue%'); // WHERE processed_image_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processedImagePath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByProcessedImagePath($processedImagePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processedImagePath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processedImagePath)) {
                $processedImagePath = str_replace('*', '%', $processedImagePath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::PROCESSED_IMAGE_PATH, $processedImagePath, $comparison);
    }

    /**
     * Filter the query on the image_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByImageHash('fooValue');   // WHERE image_hash = 'fooValue'
     * $query->filterByImageHash('%fooValue%'); // WHERE image_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageHash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByImageHash($imageHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageHash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $imageHash)) {
                $imageHash = str_replace('*', '%', $imageHash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::IMAGE_HASH, $imageHash, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSize object
     *
     * @param   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSize|PropelObjectCollection $pacCatalogProductImageSize The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductImageSize($pacCatalogProductImageSize, $comparison = null)
    {
        if ($pacCatalogProductImageSize instanceof ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSize) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT_IMAGE_SIZE, $pacCatalogProductImageSize->getIdCatalogProductImageSize(), $comparison);
        } elseif ($pacCatalogProductImageSize instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT_IMAGE_SIZE, $pacCatalogProductImageSize->toKeyValue('PrimaryKey', 'IdCatalogProductImageSize'), $comparison);
        } else {
            throw new PropelException('filterByProductImageSize() only accepts arguments of type ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSize or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductImageSize relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function joinProductImageSize($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductImageSize');

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
            $this->addJoinObject($join, 'ProductImageSize');
        }

        return $this;
    }

    /**
     * Use the ProductImageSize relation PacCatalogProductImageSize object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSizeQuery A secondary query class using the current class as primary query
     */
    public function useProductImageSizeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductImageSize($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductImageSize', 'ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSizeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage $pacCatalogProductImage Object to remove from the list of results
     *
     * @return ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function prune($pacCatalogProductImage = null)
    {
        if ($pacCatalogProductImage) {
            $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::ID_CATALOG_PRODUCT_IMAGE, $pacCatalogProductImage->getIdCatalogProductImage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImagePeer::CREATED_AT);
    }
}
