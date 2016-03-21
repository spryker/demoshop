<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat;

use Pyz\Zed\Importer\Business\Exception\LocaleNotFoundException;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class IcecatLocaleManager
{

    /**
     * @var array
     */
    protected $icecatLocaleData = [
        'de_DE' => [
            'id' => 4,
            'sid' => 4795,
            'countryId' => 8,
            'countryCode' => 'DE',
            'code' => 'de_DE',
        ],
        'en_US' => [
            'id' => 9,
            'sid' => 6182,
            'countryId' => 38,
            'countryCode' => 'US',
            'code' => 'en_US',
        ],
        'fr_FR' => [
            'id' => 3,
            'sid' => 3036,
            'countryId' => 5,
            'countryCode' => 'FR',
            'code' => 'fr_FR',
        ],
    ];

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @var array
     */
    protected $localeTransferCollection;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade)
    {
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param int $idIcecat
     *
     * @throws \Pyz\Zed\Importer\Business\Exception\LocaleNotFoundException
     *
     * @return \Pyz\Zed\Importer\Business\Icecat\IcecatLocale
     */
    public function getLocaleByIcecatId($idIcecat)
    {
        $locale = array_filter($this->icecatLocaleData, function ($localeData) use ($idIcecat) {
            return (int)$localeData['id'] === (int)$idIcecat;
        });

        if (empty($locale)) {
            throw new LocaleNotFoundException(
                sprintf('Locale data with icecatId "%d" not found', $idIcecat)
            );
        }

        $data = current($locale);

        return new IcecatLocale($data);
    }

}
