<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Marketplace extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product
{
    protected $specialFieldDefinitions = [
        self::SHIP_WEIGHT => [
            self::FLAG_MANDATORY,
            self::FLAG_FLOAT,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::SHIP_DEPTH => [
            self::FLAG_MANDATORY,
            self::FLAG_FLOAT,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::SHIP_WIDTH => [
            self::FLAG_MANDATORY,
            self::FLAG_FLOAT,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::SHIP_HEIGHT => [
            self::FLAG_MANDATORY,
            self::FLAG_FLOAT,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::SHIP_WEIGHT_UNIT => [
            self::FLAG_MANDATORY,
            self::FLAG_CONTAINS_VALUES => [self::SHIP_WEIGHT_UNIT_KG, self::SHIP_WEIGHT_UNIT_LBS]
        ],
        self::SHIP_SIZE_UNIT => [
            self::FLAG_MANDATORY,
            self::FLAG_CONTAINS_VALUES => [self::SHIP_SIZE_UNIT_CM, self::SHIP_SIZE_UNIT_IN]
        ],
        self::ORIGIN_ADDRESS1 => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_ADDRESS2 => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_CITY => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_STATE => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_PROVINCE => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_REGION => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_ZIPCODE => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_COUNTRY => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ],
        self::ORIGIN_COUNTRY_CODE => [
            self::FLAG_MANDATORY,
            self::FLAG_EMPTY_STRING_ALLOWED,
            self::FLAG_NULL_ALLOWED
        ]
    ];

    public function __construct()
    {
        $this->fieldDefinitions = array_merge($this->fieldDefinitions, $this->specialFieldDefinitions);
    }
}
