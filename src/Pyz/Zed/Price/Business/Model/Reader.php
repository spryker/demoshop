<?php

namespace Pyz\Zed\Price\Business\Model;

use Google_Client;
use Google_Service_Sheets;
use Spryker\Zed\Price\Business\Model\Reader as SprykerReader;
use Spryker\Zed\Price\Business\Model\ReaderInterface;

class Reader extends SprykerReader implements ReaderInterface
{

    /**
     * @param string $sku
     * @param string|null $priceTypeName
     *
     * @return int
     */
    public function getPriceBySku($sku, $priceTypeName = null)
    {
        $priceTypeName = $this->handleDefaultPriceType($priceTypeName);
        $priceEntity = $this->getPriceEntity($sku, $this->getPriceTypeByName($priceTypeName));

        $client = $this->getGoogleClient();
        $service = new Google_Service_Sheets($client);

        $spreadsheetId = '1-e-j9ykHk5kpJFgzesbqOo2OMb2FO6h1YrhcdqHmmVU';
        $range = 'Sheet1!A2:C';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);

        $companyId = 1;

        $values = $response->getValues();


        foreach ($values as $value) {
            if ($value[1] === $sku) {
                if (intval($value[0]) === $companyId) {
                    $price = $this->cleanMonetaryValue($value[2]);
                    $priceEntity->setPrice($price);
                    break;
                }
            }
        }

        return $priceEntity->getPrice();
    }

    protected function getGoogleClient()
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=/data/client_secret.json');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        return $client;
    }

    protected function cleanMonetaryValue($string)
    {
        $replaceChars = ['$', ',', '.'];

        return str_replace($replaceChars, '', $string);
    }


}
