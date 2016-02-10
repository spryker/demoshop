<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Mapper;

use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatMapper;

/**

</Language>
 */
class LocaleMapper extends AbstractIcecatMapper
{

    protected $dataFilename = 'LanguageList.xml';

    /**
     * Icecat mappings for locale / country
     *
     * @var array
     */
    protected $mappingsIcecat = [
        'EN' => [
            'ID' => 1,
            'Sid' => 2,
            'CountryId' => 7,
        ],
        'US' => [
            'ID' => 9,
            'Sid' => 6182,
            'CountryId' => 38,
        ],
        'DE' => [
            'ID' => 4,
            'Sid' => 4795,
            'CountryId' => 8,
        ],
        'AT' => [
            'ID' => 4,
            'Sid' => 4795,
            'CountryId' => 37,
        ],
        'FR' => [
            'ID' => 3,
            'Sid' => 3036,
            'CountryId' => 5,
        ],
    ];

}
