<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * @property Generated_Zed_ArtistPortal_Component_Factory $factory
 */
abstract class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract implements
     Sao_Zed_ArtistPortal_Component_Interface_ProductFieldConstant,
     Sao_Zed_ArtistPortal_Component_Interface_ProductValueConstant,
     ProjectA_Zed_Library_Dependency_Factory_Interface
{
    protected $fieldDefinitions = [
        self::USER_ID => [
            self::FLAG_MANDATORY,
            self::FLAG_INT
        ],
        self::USER_ART_ID => [
            self::FLAG_MANDATORY,
            self::FLAG_INT
        ],
        self::SKU => [
            self::FLAG_MANDATORY,
        ],
        self::URL => [
            self::FLAG_MANDATORY,
            self::FLAG_REGEX => '~^/.+~i' // URL needs to start with slash and not http
        ],
        self::TITLE => [
            self::FLAG_MANDATORY,
            self::FLAG_MAP => ProjectA_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME
        ],
        self::QUANTITY => [
            self::FLAG_MANDATORY,
            self::FLAG_INT
        ],
        self::PRICE => [
            self::FLAG_MANDATORY,
            self::FLAG_FLOAT
        ],
        self::CURRENCY => [
            self::FLAG_MANDATORY,
            self::FLAG_CONTAINS_VALUES => 'USD'
        ],
        self::ART_TINY_CROP => [
            self::FLAG_MANDATORY
        ],
        self::ART_SMALL => [
            self::FLAG_MANDATORY
        ],
        self::ARTIST_FIRST_NAME => [
            self::FLAG_MANDATORY
        ],
        self::ARTIST_LAST_NAME => [
            self::FLAG_MANDATORY
        ],
        self::ARTIST_EMAIL => [
            self::FLAG_MANDATORY
        ],
        self::ARTIST_PHONE => [
            self::FLAG_MANDATORY,
            self::FLAG_NULL_ALLOWED
        ],
        self::AVAILABLE => [
            self::FLAG_MANDATORY,
            self::FLAG_BOOL
        ],
        self::PRODUCT_SET => [
            self::FLAG_MANDATORY,
            self::FLAG_CONTAINS_VALUES => [self::SET_MARKETPLACE, self::SET_MANUFACTURE]
        ],
        self::PRODUCT_CATEGORY => [
            self::FLAG_MANDATORY
        ],
        self::PRODUCT_ID => [
            self::FLAG_MANDATORY
        ],
        self::LE_START => [
            self::FLAG_INT
        ],
        self::LE_END => [
            self::FLAG_INT
        ],
        self::LE_SOLD => [
            self::FLAG_ARRAY,
            self::FLAG_NULL_ALLOWED
        ],
        self::DUTY_CODE => [
            self::FLAG_MANDATORY,
        ],
        self::PRODUCT_NAME => [
            self::FLAG_MANDATORY
        ],
        self::TAX_RATE => [
            self::FLAG_MANDATORY,
            self::FLAG_INT
        ]
    ];

    /**
     * @return bool
     */
    protected function validateData()
    {
        $result = true;

        if ($this->data[self::PRODUCT_SET] === self::SET_MARKETPLACE && $this->data[self::PRODUCT_CATEGORY] !== self::CATEGORY_ORIGINAL && $this->data[self::PRODUCT_CATEGORY] !== self::CATEGORY_LIMITED_EDITION) {
            $this->validationMessages[] = self::PRODUCT_SET . ',' . self::PRODUCT_CATEGORY . ': unsupported combination';
            $result = false;
        }
        if ($this->data[self::PRODUCT_SET] === self::SET_MANUFACTURE && $this->data[self::PRODUCT_CATEGORY] !== self::CATEGORY_LIMITED_EDITION && $this->data[self::PRODUCT_CATEGORY] !== self::CATEGORY_OPEN_EDITION) {
            $this->validationMessages[] = self::PRODUCT_SET . ',' . self::PRODUCT_CATEGORY . ': unsupported combination';
            $result = false;
        }

        return $result;
    }

    /**
     * @param array $data
     * @return null|Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured|Sao_ArtistPortal_Model_Share_Container_Product_Marketplace
     */
    public function createFromArray(array $data)
    {
        if (isset($data[self::PRODUCT_SET])) {
            switch ($data[self::PRODUCT_SET]) {
                case self::SET_MANUFACTURE:
                    $object = $this->factory->getModelShareContainerProductManufactured();
                    break;
                case self::SET_MARKETPLACE:
                    $object = $this->factory->getModelShareContainerProductMarketplace();
                    break;
                default:
                    return null;
            }
            $object->data = $data;
            return $object;
        }
        return null;
    }

    /**
     * @return array
     */
    public function getMappedData()
    {
        $data = $this->data;
        foreach ($this->data as $key => $entry) {
            if (isset($this->fieldDefinitions[$key][self::FLAG_MAP])) {
                $data[$this->fieldDefinitions[$key][self::FLAG_MAP]] = $data[$key];
                unset($data[$key]);
            }
        }
        return $data;
    }
}
