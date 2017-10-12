<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Locale\Repository;

interface LocaleRepositoryInterface
{
    /**
     * @param string $locale
     *
     * @return int
     */
    public function getIdLocaleByLocale($locale);
}
