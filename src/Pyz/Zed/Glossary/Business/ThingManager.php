<?php

namespace Pyz\Zed\Glossary\Business;

use Pyz\Zed\Glossary\Persistence\GlossaryQueryContainer;

class ThingManager
{
    const KEY = 'spy_glossary_keykey';
    const LOCALE_NAME = 'spy_localelocale_name';
    const TRANSLATION = 'Value';

    /**
     * @var GlossaryQueryContainer
     */
    protected $queryContainer;

    /**
     * @param GlossaryQueryContainer $queryContainer
     */
    public function __construct(GlossaryQueryContainer $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @return array
     */
    public function getAllKeysWithTranslations()
    {
        $queryResult = $this->queryContainer
            ->queryKeysWithTranslations()
            ->find()
            ->toArray();

        $locales = $this->getLocales($queryResult);

        $keys = [];
        foreach ($queryResult as $row) {
            if (isset($keys[$row[self::KEY]]) === false) {
                $key = ['key' => $row[self::KEY]];
                foreach ($locales as $locale) {
                    $key[$locale] = '';
                }
                $keys[$row[self::KEY]] = $key;
            }
            $keys[$row[self::KEY]][$row[self::LOCALE_NAME]] = $row[self::TRANSLATION];
        }

        return [
            'keys' => $keys,
            'locales' => $locales,
        ];
    }

    /**
     * @param array $queryResult
     * @return array
     */
    protected function getLocales(array $queryResult)
    {
        $getLocaleNames = function($e) {
            return $e[self::LOCALE_NAME];
        };

        return array_unique(array_map($getLocaleNames, $queryResult));
    }
}
