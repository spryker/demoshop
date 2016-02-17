<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\LocaleNotFoundException;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class IcecatLocaleManager
{

    /**
     * @var array
     */
    protected $localeData = [
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
     * @param LocaleFacadeInterface $localeFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade)
    {
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param string $code
     *
     * @throws LocaleNotFoundException
     *
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
     *
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale
     */
    public function getLocaleByCode($code)
    {
        $this->validateLocaleCode($code);

        return new IcecatLocale($this->localeData[$code]);
    }

    /**
     * @param string $idIcecat
     *
     * @throws LocaleNotFoundException
     *
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale
     */
    public function getLocaleByIcecatId($idIcecat)
    {
        $locale = array_filter($this->localeData, function ($localeData) use ($idIcecat) {
            return (int) $localeData['id'] === (int) $idIcecat;
        });

        if (empty($locale)) {
            throw new LocaleNotFoundException(
                sprintf('Locale data with icecatId "%d" not found', $idIcecat)
            );
        }

        $data = current($locale);

        return new IcecatLocale($data);
    }

    /**
     * @return \Generated\Shared\Transfer\LocaleTransfer[]
     */
    public function getLocaleTransferCollection()
    {
        $locales = Store::getInstance()->getLocales();

        $transferCollection = [];
        foreach ($locales as $localeCode) {
            $transferCollection[$localeCode] = $this->localeFacade->getLocale($localeCode);
        }

        return $transferCollection;
    }

}
