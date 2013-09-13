<?php
class Pyz_Shared_Library_Storage extends ProjectA_Shared_Library_Storage
{
    const REGIONS_KEY = 'regions';
    const COUNTRIES_WITH_REGIONS_KEY = 'countries_with_regions';
    const COUNTRIES_WITH_REGIONS_KEY_JSON = 'countries_with_regions_JSON';

    /**
     * @static
     *
     * @param int $countryId
     *
     * @return string
     */
    public static function getRegionsKey($countryId)
    {
        return strtolower(self::formatStorageKey(self::REGIONS_KEY . '_' . $countryId));
    }

    /**
     * @static
     *
     * @return string
     */
    public static function getCountriesWithRegionsKey()
    {
        return strtolower(self::formatStorageKey(self::COUNTRIES_WITH_REGIONS_KEY));
    }
    /**
     * @static
     *
     * @return string
     */
    public static function getCountriesWithRegionsAsJSONKey()
    {
        return strtolower(self::formatStorageKey(self::COUNTRIES_WITH_REGIONS_KEY_JSON));
    }
}
