<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Locale;

use Orm\Zed\Locale\Persistence\SpyLocaleQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AddLocalesStep implements DataImportStepInterface
{

    const KEY_LOCALES = 'locales';

    /**
     * @var array
     */
    protected $locales = [];

    /**
     * @var array
     */
    protected $availableLocales;

    /**
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(Store $store)
    {
        $this->availableLocales = $store->getLocales();
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (empty($this->locales)) {
            $localeEntityCollection = SpyLocaleQuery::create()
                ->filterByLocaleName($this->availableLocales, Criteria::IN)
                ->find();

            foreach ($localeEntityCollection as $localeEntity) {
                $this->locales[$localeEntity->getLocaleName()] = $localeEntity->getIdLocale();
            }
        }

        $dataSet[static::KEY_LOCALES] = $this->locales;
    }

}
