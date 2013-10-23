<?php
namespace Pyz\Zed\Catalog\Component\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

class ImportProductOptions implements
    \ProjectA\Zed\Library\Dependency\Factory\FactoryInterface,
    ProductAttributeSetConstant
{

    use \ProjectA\Zed\Library\Dependency\FactoryTrait;

    const INDEX_KEY = 'identifier';
    const KEY_OPTION_TYPE = 'option_type';
    const KEY_IDENTIFIER = 'identifier';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_PRICE = 'price';
    const KEY_TAX_PERCENTAGE = 'tax_percentage';

    const FILE_NAME = 'product_options.csv';

    const CSV_DELIMITER = ",";
    const CSV_ENCLOSURE = '"';
    const CSV_ESCAPE = '\\';

    public function install()
    {
        foreach ($this->getProductOptions() as $option) {

            $optionType = (new \ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypeQuery)->filterByName($option[self::KEY_OPTION_TYPE])->findOne();
            if (!$optionType) {
                throw new \RuntimeException('invalid product option type: "' . $option[self::KEY_OPTION_TYPE] . '" in "' . self::FILE_NAME . '"');
            }

            $catalogOption = (new \ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery())
                ->filterByIdentifier($option[self::KEY_IDENTIFIER])->findOneOrCreate();

            $catalogOption->setOptionType($optionType);
            $catalogOption->setName($option[self::KEY_NAME]);
            $catalogOption->setDescription($option[self::KEY_DESCRIPTION]);
            $catalogOption->setPrice($option[self::KEY_PRICE]);
            $catalogOption->setTaxPercentage($option[self::KEY_TAX_PERCENTAGE]);
            $catalogOption->save();
        }
    }

    /**
     * @return array
     */
    protected function getProductOptions()
    {
        $data = [];
        $file = __DIR__. '/../File/' . self::FILE_NAME;
        $rowCount = 0;
        $header = [];
        if (is_file($file)) {
            $fileHandle = fopen($file, 'r');
            while ($row = fgetcsv($fileHandle, 1000, self::CSV_DELIMITER, self::CSV_ENCLOSURE, self::CSV_ESCAPE)) {
                if ($rowCount == 0) {
                    $header = $row;
                } else {
                    $tmpData = [];
                    foreach ($row as $key => $value) {
                        $tmpData[$header[$key]] = $value;
                    }
                    $data[] = $tmpData;
                }
                $rowCount++;
            }
        }

        return $data;
    }
}
