<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product
{
    protected $specialFieldDefinitions = [
        self::PRODUCT_TYPE => [
            self::FLAG_MANDATORY,
            self::FLAG_CONTAINS_VALUES => [self::TYPE_CANVAS, self::TYPE_PHOTO, self::TYPE_RAG]
        ],
        self::FRAMES => [
            self::FLAG_MANDATORY,
            self::FLAG_ARRAY,
            self::FLAG_NULL_ALLOWED
        ],
        self::WRAP_OPTION => [
            self::FLAG_CONTAINS_VALUES => [self::WRAP_OPTION_WHITE, self::WRAP_OPTION_BLACK],
            self::FLAG_NULL_ALLOWED
        ],
        self::VERIFIED_USER_ID => [
            self::FLAG_MANDATORY,
            self::FLAG_NULL_ALLOWED
        ],
        self::VERIFIED_DATE => [
            self::FLAG_MANDATORY,
            self::FLAG_NULL_ALLOWED
        ],
    ];

    public function __construct()
    {
        $this->fieldDefinitions = array_merge($this->fieldDefinitions, $this->specialFieldDefinitions);
    }

    protected function validateData()
    {
        $result = parent::validateData();

        if ($this->data[self::PRODUCT_TYPE] === self::TYPE_CANVAS &&
            (
                !isset($this->data[self::WRAP_OPTION]) ||
                    $this->data[self::WRAP_OPTION] !== self::WRAP_OPTION_BLACK &&
                    $this->data[self::WRAP_OPTION] !== self::WRAP_OPTION_WHITE
            )
        ) {
            $this->validationMessages[] = self::WRAP_OPTION . ': unsupported value';
            $result = false;
        }

        return $result;
    }
}
