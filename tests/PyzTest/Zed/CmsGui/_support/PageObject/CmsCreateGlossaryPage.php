<?php

namespace PyzTest\Zed\CmsGui\PageObject;

class CmsCreateGlossaryPage
{

    const URL = 'cms-gui/create-glossary/index?id-cms-page=%d';

    /**
     * @var array
     */
    protected static $localizedPlaceholders = [
        'title' => [
            'en' => 'english title',
            'de' => 'german title',
        ],
        'contents' => [
            'en' => 'english contents',
            'de' => 'german contents',
        ],
    ];

    /**
     * @param string $placeholder
     * @param string $locale
     *
     * @return string
     */
    public static function getLocalizedPlaceholderData($placeholder, $locale)
    {
        return static::$localizedPlaceholders[$placeholder][$locale];
    }

}
