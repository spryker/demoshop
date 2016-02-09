<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Mapper;


use Symfony\Component\Console\Output\OutputInterface;

/**

<Language Code="english" ID="1" ShortCode="EN" Sid="2">
    <Countries>
        <Country Code="GB" ID="7" System_Of_Measurement="metric"/>
        <Country Code="CA" ID="69" System_Of_Measurement="metric"/>
        <Country Code="AU" ID="39" System_Of_Measurement="metric"/>
        <Country Code="GI" ID="101" System_Of_Measurement="metric"/>
        <Country Code="IE" ID="21" System_Of_Measurement="metric"/>
        <Country Code="IM" ID="242" System_Of_Measurement="metric"/>
        <Country Code="NZ" ID="171" System_Of_Measurement="metric"/>
    </Countries>
...
</Language>
<Language Code="us english" ID="9" ShortCode="US" Sid="6182">
    <Countries>
        <Country Code="US" ID="38" System_Of_Measurement="imperial"/>
    </Countries>
...
</Language>
<Language Code="german" ID="4" ShortCode="DE" Sid="4795">
    <Countries>
        <Country Code="AT" ID="37" System_Of_Measurement="metric"/>
        <Country Code="DE" ID="8" System_Of_Measurement="metric"/>
        <Country Code="LI" ID="138" System_Of_Measurement="metric"/>
    </Countries>
...
</Language>
<Language Code="french" ID="3" ShortCode="FR" Sid="3036">
    <Countries>
        <Country Code="FR" ID="5" System_Of_Measurement="metric"/>
        <Country Code="CA" ID="69" System_Of_Measurement="metric"/>
        <Country Code="MC" ID="144" System_Of_Measurement="metric"/>
        <Country Code="CH" ID="31" System_Of_Measurement="metric"/>
        <Country Code="DZ" ID="86" System_Of_Measurement="metric"/>
    </Countries>
...
</Language>
 */
class Locale extends AbstractMapper
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
            'CountryId' => 7
        ],
        'US' => [
            'ID' => 9,
            'Sid' => 6182,
            'CountryId' => 38
        ],
        'DE' => [
            'ID' => 4,
            'Sid' => 4795,
            'CountryId' => 8
        ],
        'AT' => [
            'ID' => 4,
            'Sid' => 4795,
            'CountryId' => 37
        ],
        'FR' => [
            'ID' => 3,
            'Sid' => 3036,
            'CountryId' => 5
        ],
    ];

    protected function getIcecatData()
    {
        return [];
    }

    public function getLocaleMappingsByCode($iso2code)
    {
        $xml = $this->loadXmlFromFile($this->dataFilename);
    }

}
