<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\CmsGui\PageObject;

class CmsCreatePage
{
    const URL = '/cms-gui/create-page';
    const PAGE_CREATED_SUCCESS_MESSAGE = 'Page successfully created.';

    /**
     * @var array
     */
    protected static $localizedPageAttributes = [
        'en' => [
            'name' => 'english name',
            'url' => '/en/english',
        ],
        'de' => [
            'name' => 'german name',
            'url' => '/de/german',
        ]
    ];

    /**
     * @param string $locale
     *
     * @return string
     */
    public static function getLocalizedName($locale)
    {
        return static::$localizedPageAttributes[$locale]['name'];
    }


    /**
     * @param string $locale
     *
     * @return string
     */
    public static function getLocalizedUrl($locale)
    {
        return static::$localizedPageAttributes[$locale]['url'];
    }
}
