<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductRaw implements
    Sao_Zed_ArtistPortal_Component_Interface_InboundProduct,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    Sao_Zed_ArtistPortal_Component_Interface_ProductFieldConstant,
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface,
    Sao_Zed_ArtistPortal_Component_Interface_ProductValueConstant,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant,
    ProjectA_Zed_Catalog_Component_Interface_GroupConstant
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const DEBUG_MODE = false;
    const DEBUG_PRINT = true;
    const DATE_FORMAT = 'Y-m-d H:i:s';
    const LOG_DATE_FORMAT = 'Y-m-d';
    const DEFAULT_STOCK_NAME  = 'DEFAULT';
    const LOG_FILE_NAME = 'catalogImport.';
    const LOG_FILE_EXTENSION = '.log';
    const COMMIT_EACH_ROWS = 100000;

    /**
     * @var Sao_Zed_ArtistPortal_Component_Factory
     */
    protected $factory;

    /**
     * @var Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured
     */
    protected $containerManufactured;

    /**
     * @var Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Marketplace
     */
    protected $containerMarketplace;

    /**
     * @var ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet
     */
    protected $attributeSetArtwork;

    //we`l get this from ProjectA_Shared_Library_Config::get('db');
    protected $databaseSrc;

    /** @var PDO */
    protected $db;

    /** @var ProjectA_Shared_Library_Config_Object */
    protected $dbConfig;

    /**
     * @var string
     */
    protected $logFileName;

    /**
     * @var string
     */
    protected $recordForLog;

    /**
     * @var array
     */
    protected $attributeToValueTypeMapping = [
        self::CONFIG_ATTRIBUTES => [],
        self::SIMPLE_ATTRIBUTES => []
    ];

    /**
     * @var ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected $attributesMap;

    /**
     * @var ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected $optionValuesMap;

    /**
     * @var ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected $priceTypesMap;

    /**
     * @var ProjectA_Zed_Price_Persistence_PacPriceType
     */
    protected $priceTypeEntity;

    /**
     * @var ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected $stocksMap;

    /**
     * @var ProjectA_Zed_Stock_Persistence_PacStock
     */
    protected $stockEntity;

    /**
     * @var array
     */
    protected $statusValues = [];

    /**
     * @var array
     */
    protected $varietyValues = [];

    /**
     * @var array
     */
    protected $framingOptionsByIdentifier = [];

    /**
     * @var DateTime
     */
    protected $dateFrom;

    /**
     * @var DateTime
     */
    protected $dateTo;

    /**
     * @var int
     */
    protected $commitCounter = 1;

    /**
     * @var array
     */
    protected $wrapOptionIds;

    /**
     * Method is called after all dependencies are injected.
     * Use this as a replacement of __contruct() if you want to use injected objects.
     */
    public function initAfterDependencyInjection()
    {
        //ini_set('memory_limit', '2G');
        ini_set('max_execution_time', '0');

        $this->logFileName = self::LOG_FILE_NAME . date(self::LOG_DATE_FORMAT) . self::LOG_FILE_EXTENSION;

        $this->db = Propel::getConnection();
        $this->dbConfig = ProjectA_Shared_Library_Config::get('db');
        $this->databaseSrc = $this->dbConfig->database;

        $this->containerMarketplace = $this->factory->getModelShareContainerProductMarketplace();
        $this->containerManufactured = $this->factory->getModelShareContainerProductManufactured();

        $this->attributeSetArtwork = $this->facadeCatalog->getAttributeSetByName(self::ATTRIBUTESET_ARTWORK);
        $this->attributesMap = $this->getAttributesMap();
        $this->optionValuesMap = $this->getOptionValuesMap();
        $this->priceTypesMap = $this->getPriceTypesMap();
        $this->stocksMap = $this->getStocksMap();
        $this->priceTypeEntity = $this->priceTypesMap->get(ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE);
        $this->stockEntity = $this->stocksMap->get(self::DEFAULT_STOCK_NAME);

        $this->wrapOptionIds = $this->getWrapOptionIds();

        $this->dateFrom = new DateTime();
        $this->dateTo = new DateTime(ProjectA_Zed_Price_Component_Interface_Pricing::MAX_VALID_TO);

        $this->framingOptionsByIdentifier = $this->getFramingOptionsByIdentifier();

        //load simple/config attributes for artwork set
        $this->attributeToValueTypeMapping[self::CONFIG_ATTRIBUTES] = $this->getValueTypesForAttributeSetByGroup(self::CONFIG_ATTRIBUTES, $this->attributeSetArtwork);
        $this->attributeToValueTypeMapping[self::SIMPLE_ATTRIBUTES] = $this->getValueTypesForAttributeSetByGroup(self::SIMPLE_ATTRIBUTES, $this->attributeSetArtwork);

        $this->statusValues =
            $this->getEnumsValuesForField(
                ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::TABLE_NAME,
                $this->getNameForField(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS)
            );
        $this->varietyValues =
            $this->getEnumsValuesForField(
                ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::TABLE_NAME,
                $this->getNameForField(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY)
            );

        $this->disableAutoCommit();
    }

    /**
     * @return array
     */
    protected function getWrapOptionIds()
    {
        $optionQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery();
        $optionQuery->useOptionTypeQuery()->filterByName('wrap')->endUse();
        $options = $optionQuery->find();
        $wrapOptionIds = array();
        /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogOption $option */
        foreach ($options as $option) {
            $wrapOptionIds[] = $option->getIdCatalogOption();
        }
        return $wrapOptionIds;
    }

    /**
     * @param $group
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @return array
     */
    protected function getValueTypesForAttributeSetByGroup($group, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet)
    {
        $attributesToValueTypeMapping = [];
        $valueTypes =
            $this->facadeCatalog->getValueTypes(
                [$group],
                $attributeSet
            );
        /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $valueType */
        foreach ($valueTypes as $valueType) {
            $attributesToValueTypeMapping[$valueType->getAttribute()->getName()] = $valueType->getVariety();
        }
        return $attributesToValueTypeMapping;
    }

    /**
     * @param array $data
     * @return string
     */
    public function prepareRecordForLog(array $data)
    {
        if(isset($data['frames']) && is_array($data['frames'])) {
            $data['frames'] = implode(';', $data['frames']);
        }
        if(isset($data['le_sold']) && is_array($data['le_sold'])) {
            $data['le_sold'] = implode(';', $data['le_sold']);
        }
        return implode(',', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function processProduct(array $data)
    {
        return $this->processProducts([$data]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function processProducts(array $data)
    {
        $this->recordForLog = $this->prepareRecordForLog($data);

        // Check if we have collection of items or only a single item
        if (array_keys($data) !== array_keys(array_keys($data))) {
            $data = array($data);
        }

        $result = [
            'response_code' => 200,
            'results' => []
        ];

        foreach ($data as $productArray) {
            $container = $this->getClearedSpecificContainer($productArray);
            if (empty($container)) {
                $result['response_code'] = 400;
                $result['results'][] = [
                    'status' => false,
                    'messages' => [
                        'Was not able to determine set of product'
                    ]
                ];
                continue;
            }
            if (!$container->validate()) {
                $result['response_code'] = 400;
                $result['results'][] = [
                    'status' => false,
                    'messages' => $container->getValidationMessages()
                ];
                continue;
            }
            $productMessage = '';
            $successful = $this->createOrUpdateCatalogProducts($container, $productMessage);
            $result['results'][] = [
                'status' => $successful,
                'messages' => [$productMessage]
            ];
        }

        //lets commit in between
        if ($this->commitCounter % self::COMMIT_EACH_ROWS == 0) {
            $this->createCommitLogEntry();
            $this->commit();
            $this->disableAutoCommit();
        }
        $this->commitCounter++;

        return $result;
    }

    /**
     * @param $data
     * @return null|Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured|Sao_ArtistPortal_Model_Share_Container_Product_Marketplace
     */
    protected function getClearedSpecificContainer($data)
    {
        if (isset($data[self::PRODUCT_SET])) {
            switch ($data[self::PRODUCT_SET]) {
                case self::SET_MANUFACTURE:
                    $object = $this->containerManufactured;
                    break;
                case self::SET_MARKETPLACE:
                    $object = $this->containerMarketplace;
                    break;
                default:
                    return null;
            }
            $object->clear();
            $object->setData($data);
            return $object;
        }
        return null;
    }

    /**
     * @param Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product $container
     * @param string $productMessage
     * @return bool
     */
    protected function createOrUpdateCatalogProducts(Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product $container, &$productMessage)
    {
        $skuModel = new Sao_Shared_Library_Legacy_Sku($container[self::SKU]);
        $configSku = $skuModel->getConfigSku();
        $simpleSku = $container[self::SKU];
        $dataArray = $container->getMappedData();

        $status = ($dataArray[self::AVAILABLE])? ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_APPROVED : ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_DELETED;

        $simpleEntityId = $this->checkSkuExistsReturnId($simpleSku);
        if (!$simpleEntityId) {
            $productMessage = 'The simple product was created with status "' . $status .'"';

            $configEntityId = $this->checkSkuExistsReturnId($configSku);
            if (!$configEntityId) {
                //create config entity and add attributes
                $configEntityId = $this->createConfigWithAttributes(
                    $configSku,
                    $this->attributeSetArtwork,
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_APPROVED, // how to determind the whole config is deleted?
                    $dataArray
                );
                $productMessage = 'The simple and config product was created with status "' . $status .'"';
            } else {
                //TODO possible  config status update here, but how to determine

                //update config attributes
                $this->createOrUpdateAttributesForProductById($configEntityId, self::CONFIG_ATTRIBUTES, $dataArray);
            }

            //create new Simple entity and add attributes
            $simpleEntityId = $this->createSimpleWithAttributes(
                $simpleSku,
                $this->attributeSetArtwork,
                $status,
                $dataArray,
                $configEntityId
            );

        } else {

            //update status of simple
            $this->updateStatusForProductById($simpleEntityId, $status);

            //update simple attributes
            $this->createOrUpdateAttributesForProductById($simpleEntityId, self::SIMPLE_ATTRIBUTES, $dataArray);

            //update simple attributes
            $configEntityId = $this->checkSkuExistsReturnId($configSku); // if we find a simple there must be a config
            $this->createOrUpdateAttributesForProductById($configEntityId, self::CONFIG_ATTRIBUTES, $dataArray);

            $productMessage = 'The product was updated with status "' . $status .'"';
        }

        //add stock and price
        $this->addPriceForProduct($simpleEntityId, $dataArray);
        $this->addStockForProduct($simpleEntityId, $dataArray);

        //add framing options
        if (!empty($dataArray[self::FRAMES])) {
            if (!$this->assignOptionsToProduct($simpleEntityId, $dataArray[self::PRODUCT_ID], $dataArray[self::FRAMES], $productMessage)) {
                return false;
            }
        }

        //add wrap options, all those with product_id between 2-31 are supposed to be be canvas products
        if (isset($dataArray[self::PRODUCT_ID]) && $dataArray[self::PRODUCT_ID] > 1 && $dataArray[self::PRODUCT_ID] < 33) {
            if (!$this->assignWrapsToProduct($simpleEntityId, $productMessage)) {
                return false;
            }
        }

        //add limited edition sold
        if (!empty($dataArray[self::LE_SOLD])) {
            $this->assignEditionToProduct($simpleEntityId, $dataArray[self::LE_SOLD]);
        }

        return true;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getAttributesMap()
    {
        $attributes = (new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeQuery())->find();
        $attributesMap = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $attributesMap->addBulk($attributes);
        return $attributesMap;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getOptionValuesMap()
    {
        $optionValues = (new ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery())->find();
        $optionValuesMap = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $optionValuesMap->addBulk($optionValues);
        return $optionValuesMap;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getPriceTypesMap()
    {
        $priceTypes = (new ProjectA_Zed_Price_Persistence_PacPriceTypeQuery())->find();
        $priceTypesMap = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $priceTypesMap->addBulk($priceTypes);
        return $priceTypesMap;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getStocksMap()
    {
        $stocks = (new ProjectA_Zed_Stock_Persistence_PacStockQuery())->find();
        $stocksMap = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $stocksMap->addBulk($stocks);
        return $stocksMap;
    }

    /**
     * @return array
     */
    protected function getFramingOptionsByIdentifier()
    {
        $framingOptionsByIdentifier = [];
        $framingOptions = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create()->find();
        /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogOption $framingOption*/
        foreach ($framingOptions as $framingOption) {
            $framingOptionsByIdentifier[$framingOption->getIdentifier()] = $framingOption->getIdCatalogOption();
        }
        return $framingOptionsByIdentifier;
    }

    /**
     * @param $tableName
     * @param $fieldName
     * @return array
     */
    protected function getEnumsValuesForField($tableName, $fieldName)
    {
        $enumValues = $this->db->query(
            "SHOW COLUMNS FROM `{$tableName}` LIKE {$this->db->quote($fieldName)};"
        )->fetchObject();
        $options = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $enumValues->Type));
        return $options;
    }

    /**
     * @param $field
     * @return string
     */
    protected function getNameForField($field)
    {
        return
            ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

    public function enableForeignKeyChecks()
    {
        $this->db->exec('SET unique_checks=1;');
        $this->db->exec('SET foreign_key_checks = 1;');
        $this->commit();
    }

    public function disableForeignKeyChecks()
    {
        $this->db->exec('SET unique_checks=0;');
        $this->db->exec('SET foreign_key_checks=0;');
    }

    public function commit()
    {
        $this->db->exec('COMMIT;');
    }

    public function disableAutoCommit()
    {
        $this->db->exec('SET autocommit=0;');
    }

    /**
     * @param $query
     * @param $debugMessage
     */
    protected function query($query, $debugMessage)
    {
        if (self::DEBUG_MODE) {
            if (self::DEBUG_PRINT) {
                Zend_Debug::dump($query, $debugMessage);
            }
        } else {
            $this->db->query($query);
        }
    }

    /**
     * @param $query
     * @param $debugMessage
     * @return int
     */
    protected function exec($query, $debugMessage)
    {
        if (self::DEBUG_MODE) {
            if (self::DEBUG_PRINT) {
                Zend_Debug::dump($query, $debugMessage);
            }
            return 1;
        } else {
            return $this->db->exec($query);
        }
    }

    /**
     * @param $sku
     * @return bool
     */
    protected function checkSkuExistsReturnId($sku)
    {
        $checkProductExistsQuery = $this->db->query("SELECT * FROM pac_catalog_product WHERE sku = '" . $sku . "'");
        $productExists = $checkProductExistsQuery->fetch();
        if($productExists) {
            return $productExists[$this->getNameForField(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT)];
        }
        return false;
    }

    /**
     * @param $sku
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @param $status
     * @param $data
     * @return string
     */
    protected function createConfigWithAttributes($sku, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet, $status, $data)
    {
        //insert product itself
        $insertQuery = sprintf(
            "INSERT INTO pac_catalog_product (id_catalog_product, sku, fk_catalog_attribute_set, is_item, status, variety, created_at, updated_at) VALUES (NULL, %s, %s, 0, %s, %s, NOW(), NOW());",
            $this->db->quote($sku),
            $attributeSet->getIdCatalogAttributeSet(),
            $this->db->quote($status),
            $this->db->quote(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY_CONFIG)
        );
        $this->query($insertQuery, '$insertQuery config');
        $id_catalog_product = $this->db->lastInsertId();

        //insert config entry
        $insertConfigEntry = "INSERT INTO pac_catalog_product_config (id_catalog_product) VALUES (". $id_catalog_product .");";
        $this->query($insertConfigEntry, '$insertConfigEntry');

        //now create attributes
        $this->createOrUpdateAttributesForProductById($id_catalog_product, self::CONFIG_ATTRIBUTES, $data);

        return $id_catalog_product;
    }

    /**
     * @param $sku
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @param $status
     * @param $data
     * @param $fk_catalog_product_config
     * @return string
     */
    protected function createSimpleWithAttributes($sku, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet, $status, $data, $fk_catalog_product_config)
    {
        //insert product itself
        $insertQuery = sprintf(
            "INSERT INTO pac_catalog_product (id_catalog_product, sku, fk_catalog_attribute_set, is_item, status, variety, created_at, updated_at) VALUES (NULL, %s, %s, 1, %s, %s, NOW(), NOW());",
            $this->db->quote($sku),
            $attributeSet->getIdCatalogAttributeSet(),
            $this->db->quote($status),
            $this->db->quote(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY_SIMPLE)
        );
        $this->query($insertQuery, '$insertQuery simple');
        $id_catalog_product = $this->db->lastInsertId();

        //insert simple entry
        $insertSimpleEntry = sprintf(
            "INSERT INTO pac_catalog_product_simple (id_catalog_product, fk_catalog_product_config) VALUES (%s, %s);",
            $id_catalog_product,
            $fk_catalog_product_config
        );
        $this->query($insertSimpleEntry, '$insertSimpleEntry');

        //now create attributes
        $this->createOrUpdateAttributesForProductById($id_catalog_product, self::SIMPLE_ATTRIBUTES, $data);

        return $id_catalog_product;
    }

    /**
     * @param $id_catalog_product
     * @param $whichAttributes
     * @param $data
     */
    protected function createOrUpdateAttributesForProductById($id_catalog_product, $whichAttributes, $data)
    {
        $whichAttributesKeys = array_flip(array_keys($this->attributeToValueTypeMapping[$whichAttributes]));
        //order is important otherwise values will get lost on intersection
        $whichAttributesData = array_intersect_key($data, $whichAttributesKeys);
        $this->addAttributesToProduct($whichAttributesData, $id_catalog_product, $whichAttributes);
    }

    /**
     * @param $id_catalog_product
     * @param $status
     */
    protected function updateStatusForProductById($id_catalog_product, $status)
    {
        $updateStatusQuery = sprintf(
            "UPDATE pac_catalog_product SET status = %s WHERE id_catalog_product = %s;",
            $this->db->quote($status),
            $id_catalog_product
        );
        $this->query($updateStatusQuery, '$updateStatusQuery');
    }

    /**
     * @param $fk_catalog_product
     * @param array $data
     */
    protected function addPriceForProduct($fk_catalog_product, array $data)
    {
        $insertPriceQuery = sprintf(
            "REPLACE INTO pac_price_product (price, valid_from, valid_to, fk_catalog_product, fk_price_type) VALUES (%s, '%s', '%s', %s, %s)",
            $data[self::PRICE] * 100,
            $this->dateFrom->format(self::DATE_FORMAT),
            $this->dateTo->format(self::DATE_FORMAT),
            $fk_catalog_product,
            $this->priceTypeEntity->getIdPriceType()
        );
        $this->query($insertPriceQuery, '$insertPriceQuery');
    }

    /**
     * @param $fk_catalog_product
     * @param array $data
     */
    protected function addStockForProduct($fk_catalog_product, array $data)
    {
        $insertStockQuery = sprintf(
            "REPLACE INTO pac_stock_product (quantity, fk_catalog_product, fk_stock) VALUES (%s, %s, %s)",
            $this->db->quote($data[self::QUANTITY]),
            $fk_catalog_product,
            $this->stockEntity->getIdStock()
        );
        $this->query($insertStockQuery, '$insertStockQuery');
    }

    /**
     * @param $fk_catalog_product
     * @param $product_id
     * @param array $frameIdentifiers
     * @param $result
     * @return bool
     */
    protected function assignOptionsToProduct($fk_catalog_product, $product_id, array $frameIdentifiers, &$result)
    {
        $tmpOptions = [];
        foreach ($frameIdentifiers as $identifier) {
            $id = 'F' . Sao_Shared_Library_Legacy_FrameOptionMapping::mapLegacyFrameToCatalogFrame(substr($identifier, 1), $product_id);
            if (isset($this->framingOptionsByIdentifier[$id])) {
                $fk_catalog_option = $this->framingOptionsByIdentifier[$id];
                $tmpOptions[] = "(" . $fk_catalog_product . "," . $fk_catalog_option . ")";
            } else {
                $result = 'The option with the identifier "' . $identifier . '" was not found';
                return false;
            }
        }
        $insertOptionsQuery = sprintf(
            "REPLACE INTO pac_catalog_product_option (fk_catalog_product, fk_catalog_option) VALUES %s;",
            implode(',', $tmpOptions)
        );
        $this->query($insertOptionsQuery, '$insertOptionsQuery');
        return true;
    }

    /**
     * @param $fk_catalog_product
     * @param $result
     * @return bool
     */
    protected function assignWrapsToProduct($fk_catalog_product, &$result)
    {
        foreach ($this->wrapOptionIds as $wrapOptionId) {
            $insertOptionsQuery = sprintf(
                "REPLACE INTO pac_catalog_product_option (fk_catalog_product, fk_catalog_option) VALUES (%s,%s);",
                $fk_catalog_product,
                $wrapOptionId
            );
            $this->query($insertOptionsQuery, '$insertOptionsQuery');
        }
        return true;
    }

    /**
     * @param $fk_catalog_product
     * @param array $soldEditions
     * @return bool
     */
    protected function assignEditionToProduct($fk_catalog_product, array $soldEditions)
    {
        // delete all TODO are we setting this or always getting from remote??!?
        $this->exec("DELETE FROM sao_catalog_sold_limited_edition WHERE fk_catalog_product = " . $fk_catalog_product, 'delete LimitedEditions Query');

        $tmpSoldLimitedEditions = [];
        foreach ($soldEditions as $edition_identifier) {
            $tmpSoldLimitedEditions[] = "(NULL," . $fk_catalog_product . "," . $edition_identifier . ",NOW(),NOW())";
        }
        $insertSoldLimitedEditionsQuery = sprintf(
            "REPLACE INTO sao_catalog_sold_limited_edition (id_catalog_sold_limited_edition, fk_catalog_product, edition_identifier, created_at, updated_at) VALUES %s;",
            implode(',', $tmpSoldLimitedEditions)
        );
        $this->query($insertSoldLimitedEditionsQuery, '$insertSoldLimitedEditionsQuery');
        return true;
    }

    /**
     * @param array $data
     * @param $fk_catalog_product
     * @param $attributeType
     */
    protected function addAttributesToProduct(array $data, $fk_catalog_product, $attributeType)
    {
        foreach($data as $attributeName => $attributeValue) {
            if (self::DEBUG_MODE && self::DEBUG_PRINT) {
                Zend_Debug::dump($attributeName, '$attributeName');
            }
            /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute $attribute */
            $attribute = $this->attributesMap->get($attributeName);
            $fk_catalog_attribute = $attribute->getIdCatalogAttribute();
            $methodName = 'runQuery' . $this->attributeToValueTypeMapping[$attributeType][$attributeName];
            $this->$methodName($attributeValue, $fk_catalog_attribute, $fk_catalog_product);
        }
    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryBoolean($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        $value = $value ? 1 : 0;
        $query = "REPLACE INTO pac_catalog_value_boolean (value, fk_catalog_attribute, fk_catalog_product) VALUES (" . $this->db->quote($value) . ", '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
        try {
            $res = $this->exec($query, '$queryBoolean');
            if($res === false) {
                echo 'Error Boolean: ' . $this->db->errorInfo() . PHP_EOL;
                echo 'Query : ' . $query . PHP_EOL;
            }
        } catch(Exception $ex) {
            $this->createLogEntry($ex, $query);
        }

    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryInteger($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        if($value) {
            $query = "REPLACE INTO pac_catalog_value_integer (value, fk_catalog_attribute, fk_catalog_product) VALUES (" . $this->db->quote($value) . ", '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
            try {
                $res = $this->exec($query, '$queryInteger');
                if($res === false) {
                    echo 'Error Integer: ' . $this->db->errorInfo() . PHP_EOL;
                }
            } catch(Exception $ex) {
                $this->createLogEntry($ex, $query);
            }

        }
    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryText($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        if($value) {
            $query = "REPLACE INTO pac_catalog_value_text (value, fk_catalog_attribute, fk_catalog_product) VALUES (" . $this->db->quote($value) . ", '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
            try {
                $res = $this->exec($query, '$queryText');
                if($res === false) {
                    echo 'Error Text: ' . $this->db->errorInfo() . PHP_EOL;
                }
            } catch(Exception $ex) {
                $this->createLogEntry($ex, $query);
            }
        }

    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryDecimal($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        if($value != '' && $value !== null) {
            $value = number_format($value, 5, '.', '');
            $query = "REPLACE INTO pac_catalog_value_decimal (value, fk_catalog_attribute, fk_catalog_product) VALUES (" . $this->db->quote($value) . ", '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
            try {
                $res = $this->exec($query, '$queryDecimal');
                if($res === false) {
                    echo 'Error Decimal: ' . $this->db->errorInfo() . PHP_EOL;
                }
            } catch(Exception $ex) {
                $this->createLogEntry($ex, $query);
            }
        }
    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryTimestamp($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        if($value) {
            $query = "REPLACE INTO pac_catalog_value_timestamp (value, fk_catalog_attribute, fk_catalog_product) VALUES (" . $this->db->quote($value) . ", '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
            try {
                $res = $this->exec($query, '$queryTimestamp');
                if($res === false) {
                    echo 'Error Timestamp: ' . $this->db->errorInfo() . PHP_EOL;
                }
            } catch(Exception $ex) {
                $this->createLogEntry($ex, $query);
            }

        }
    }

    /**
     * @param $value
     * @param $fk_catalog_attribute
     * @param $fk_catalog_product
     * @return string
     */
    protected function runQueryOptionSingle($value, $fk_catalog_attribute, $fk_catalog_product)
    {
        if ($value) {
            /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption $optionValue */
            $optionValue = null;
            try {
                $optionValue = $this->optionValuesMap->get($value);
            } catch (ErrorException $ex) {
                echo 'Non_Existing SingleOption Value "' . $value . '" for attribute with Id: ' . $fk_catalog_attribute . PHP_EOL;
                die();
            }

            if($optionValue) {
                $fk_catalog_value_option = $optionValue->getIdCatalogValueOption();
                $query = "REPLACE INTO pac_catalog_value_option_single (fk_catalog_value_option, fk_catalog_attribute, fk_catalog_product) VALUES ('" . $fk_catalog_value_option . "', '" . $fk_catalog_attribute . "', '" . $fk_catalog_product . "');";
                try {
                    $res = $this->exec($query, '$query OptionSingle');
                    if($res === false) {
                        echo 'Error OptionSingle: ' . $this->db->errorInfo() . PHP_EOL;
                    }
                } catch(Exception $ex) {
                    $this->createLogEntry($ex, $query);
                }
            }
        }
    }

    /**
     * @param Exception $ex
     * @param $query
     */
    protected function createLogEntry(Exception $ex, $query)
    {
        $message = 'Error : ' . $ex->getMessage() . PHP_EOL;
        $message.= 'Query : ' . $query . PHP_EOL;
        $message.= 'AtRow : ' . $this->recordForLog . PHP_EOL;
        ProjectA_Shared_Library_Log::log($message, $this->logFileName);
    }

    /**
     * @param $message
     * @param $errorInfo
     * @param $recordForLog
     */
    public function createLogEntryFromMessage($message, $errorInfo, $recordForLog)
    {
        $message = 'Error : ' . $message . PHP_EOL;
        $message.= 'ErrorInfo : ' . $errorInfo . PHP_EOL;
        $message.= 'AtRow : ' . $recordForLog . PHP_EOL;
        ProjectA_Shared_Library_Log::log($message, $this->logFileName);
    }

    /**
     *
     */
    protected function createCommitLogEntry()
    {
        $message = 'CommitAtRow : ' . $this->recordForLog . PHP_EOL;
        ProjectA_Shared_Library_Log::log($message, $this->logFileName);
    }
}
