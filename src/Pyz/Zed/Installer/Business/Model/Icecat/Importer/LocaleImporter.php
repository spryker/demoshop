<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Installer\Business\Exception\LocaleNotFoundException;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;

class LocaleImporter extends AbstractIcecatImporter
{
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
     * @param string $code
     *
     * @throws LocaleNotFoundException
     * @return void
     */
    protected function validateLocaleCode($code)
    {
        if (!array_key_exists($code, $this->localeData)) {
            throw new LocaleNotFoundException($code);
        }
    }

    /**
     * @param string $code
     *
     * @throws LocaleNotFoundException
     * @return array
     */
    public function getLocaleDataByCode($code)
    {
        $this->validateLocaleCode($code);

        return $this->localeData[$code];
    }

    /**
     * @param string $idIcecat
     *
     * @throws LocaleNotFoundException
     * @return array
     */
    public function getLocaleDataByIcecatId($idIcecat)
    {
        $locale = array_filter($this->localeData, function($localeData) use ($idIcecat) {
            return (int) $localeData['id'] === (int) $idIcecat;
        });

/*        foreach ($this->localeData as $code => $localeData) {
            if ((int) $localeData['id'] === (int) $idIcecat) {
                return $localeData;
            }
        }*/

        dump($locale); die;

        throw new LocaleNotFoundException(
            sprintf('Locale with icecatId: "" not found', $idIcecat)
        );
    }
}
