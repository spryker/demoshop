<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;

/*
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
class LocaleImporter extends AbstractIcecatImporter
{
    /**
     * @var string
     */
    protected $dataFilename = 'LanguageList.xml';

    /**
     * @var array
     */
    protected $localeData = [
        'de_DE' => [
            'id' => 4,
            'sid' => 4795,
            'countryId' => 8,
            'countryCode' => 'DE'
        ],
        'en_US' => [
            'id' => 9,
            'sid' => 6182,
            'countryId' => 38,
            'countryCode' => 'US'
        ],
        'fr_FR' => [
            'id' => 3,
            'sid' => 3036,
            'countryId' => 5,
            'countryCode' => 'FR'
        ],
    ];

    /**
     * @param LocaleTransfer $localeTransfer
     * @param int $icecatLangId
     *
     * @return void
     */
    public function import(LocaleTransfer $localeTransfer, $icecatLangId)
    {

    }

    /**
     * @param string $localeName
     *
     * @return int
     */
    public function getIcecatLocaleId($localeName)
    {
        return $this->localeData[$localeName]['id'];
    }

}
