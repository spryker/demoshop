<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale;

class ProductImporter extends AbstractIcecatImporter
{

    /**
     * @var string
     */
    protected $columnHeader = 'slug,
        variantId,
        sku,
        productType,
        name.en,
        manufacturer_name,
        manufacturer_icecat_id,
        manufacturer_icecat_original_id,
        manufacturer_product_id,
        manufacturer_product_id_normal,
        ean_upc_set,
        images,
        image_url_small,
        image_url_thumb,
        category_name.en,
        category_icecat_id,
        category_uncat_it,
        categories,
        tax,
        icecat_data_quality,
        icecat_factsheet_url,
        icecat_xml_data_url,
        on_market,
        on_market_countries_set,
        icecat_last_updated';

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale $icecatLocale
     *
     * @return void
     */
    protected function importData(LocaleTransfer $localeTransfer, IcecatLocale $icecatLocale)
    {
    }

}
