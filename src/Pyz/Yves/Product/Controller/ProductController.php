<?php

namespace Pyz\Yves\Product\Controller;

use Generated\Shared\Transfer\StorageProductTransfer;
use Google_Client;
use Google_Service_Sheets;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;


/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class ProductController extends AbstractController
{
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INCREMENTAL;

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function detailAction(StorageProductTransfer $storageProductTransfer)
    {
        $categories = $storageProductTransfer->getCategories();

        $customer = $this->getFactory()->getCustomerClient()->getCustomer();

        $productOptionGroupsTransfer = $this
            ->getFactory()
            ->getProductOptionClient()
            ->getProductOptions($storageProductTransfer->getIdProductAbstract(), $this->getLocale());

//        if($customer) {
            $client = $this->getGoogleClient();
            $service = new Google_Service_Sheets($client);

            $spreadsheetId = '1-e-j9ykHk5kpJFgzesbqOo2OMb2FO6h1YrhcdqHmmVU';
            $range = 'Sheet1!A2:C';
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);

            $companyId = 1;
            $values = $response->getValues();

            foreach ($values as $value) {
                if($value[1] === $storageProductTransfer->getSku()) {
                    if(intval($value[0]) === $companyId) {
                        $price = $this->cleanMonetaryValue($value[2]);
                        $storageProductTransfer->setPrice($price);
                        break;
                    }
                }
            }
//        }



        $productData = [
            'product' => $storageProductTransfer,
            'productCategories' => $categories,
            'category' => count($categories) ? end($categories) : null,
            'page_keywords' => $storageProductTransfer->getMetaKeywords(),
            'page_description' => $storageProductTransfer->getMetaDescription(),
            'productOptionGroups' => $productOptionGroupsTransfer,
        ];

        return $productData;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->getApplication()['request'];
    }

    protected function getGoogleClient() {
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
